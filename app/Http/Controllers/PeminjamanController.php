<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman;
use App\Buku;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::orderBy('created_at', 'desc')->paginate(5);
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function peminjamanLaporanpdf(Request $request)
    {
        $tanggal_mulai = session('tanggal_mulai');
        $tanggal_selesai = session('tanggal_selesai');

        $peminjaman = Peminjaman::query();

        if ($tanggal_mulai && $tanggal_selesai) {
            $peminjaman->whereDate('tanggal_peminjaman', '>=', $tanggal_mulai)
                ->whereDate('tanggal_peminjaman', '<=', $tanggal_selesai);
        }

        $peminjaman = $peminjaman->get();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->setPaper('A4', 'landscape');

        $html = view('peminjaman.cetak_laporan', compact('peminjaman'))->render();
        $dompdf->loadHtml($html);
        $dompdf->render();

        return $dompdf->stream('cetak-laporan');
    }

    public function admin()
    {
        $peminjaman = Peminjaman::orderBy('created_at', 'desc')->paginate(5);
        return view('peminjaman.admin', compact('peminjaman'));
    }

    public function tanggal(Request $request)
    {
        $tanggal_mulai = $request->tanggal_mulai;
        $tanggal_selesai = $request->tanggal_selesai;

        session(['tanggal_mulai' => $tanggal_mulai, 'tanggal_selesai' => $tanggal_selesai]);

        $peminjaman = Peminjaman::whereBetween('tanggal_peminjaman', [$tanggal_mulai, $tanggal_selesai])->get();

        return view('peminjaman.admin', compact('peminjaman'));
    }

    public function create()
    {
        $buku = Buku::all();
        return view('peminjaman.create', compact('buku'));
    }

    public function store(Request $request)
    {
        $buku = Buku::find($request->isbn);

        if (!$buku) {
            return redirect()->back()->with('error', 'Buku tidak ditemukan.');
        }

        if ($buku->stock <= 0) {
            return redirect()->back()->with('error', 'Stok buku habis.');
        }

        $tanggal_pengembalian = Carbon::now()->addDays(7);

        Peminjaman::create([
            'tanggal_peminjaman' => Carbon::now(),
            'tanggal_pengembalian' => $tanggal_pengembalian,
            'isbn' => $buku->isbn,
            'nisn' => $request->nisn,
            'status' => 'pinjam',
            'denda' => 0, // Set nilai default untuk denda
        ]);

        $buku->decrement('stock');

        return redirect()->route('peminjaman.index')->with('success', 'Buku berhasil dipinjam.');
    }

    public function edit($id)
    {
        $buku = Buku::all();
        $peminjamans = Peminjaman::findOrFail($id);
        return view('peminjaman.edit', compact('peminjamans', 'buku'));
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->status = 'kembali';

        $tanggal_pengembalian = Carbon::parse($peminjaman->tanggal_pengembalian);
        $tanggalAktual = Carbon::now();

        if ($tanggalAktual->gt($tanggal_pengembalian)) {
            $selisihHari = $tanggalAktual->diffInDays($tanggal_pengembalian, false);
            $dendaPerHari = 1000;
            $dendaTotal = $selisihHari * $dendaPerHari;
            $peminjaman->denda = $dendaTotal;
        } else {
            $peminjaman->denda = 0;
        }

        $peminjaman->tanggal_aktual = $tanggalAktual;
        $peminjaman->save();

        $buku = Buku::where('isbn', $peminjaman->isbn)->first();
        if ($buku) {
            $buku->increment('stock');
            $peminjaman->is_retuurned = true;
            $peminjaman->save();
        }

        if ($buku && $buku->stock > 0) {
            $buku->update(['status' => 'Tersedia']);
        }

        return redirect()->route('peminjaman.index')->with('success', 'Buku berhasil dikembalikan.');
    }



    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect()->route('peminjaman.admin')->with('success', 'Peminjaman berhasil dihapus.');
    }
}
