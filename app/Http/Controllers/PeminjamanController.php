<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Peminjaman;
use App\Buku;
use App\User;
use Auth;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::all(); 
        return view('peminjaman.index', compact('peminjaman')) ;

    }

    public function peminjamanLaporanpdf(Request $request)
    {
        $tanggal_mulai = session('tanggal_mulai');
        $tanggal_selesai = session('tanggal_selesai');

        $peminjaman = Peminjaman::query();

        // Tambahkan filter tanggal jika tanggal_mulai dan tanggal_selesai diisi
        if ($tanggal_mulai && $tanggal_selesai) {
            $peminjaman->whereDate('tanggal_peminjaman', '>=', $tanggal_mulai)
                ->whereDate('tanggal_peminjaman', '<=', $tanggal_selesai);
        }

        $peminjaman = $peminjaman->get();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        // Set paper size and orientation (landscape)
        $dompdf->setPaper('A4', 'landscape');

        // Load HTML content
        $html = view('peminjaman.cetak_laporan', compact('peminjaman'))->render();
        $dompdf->loadHtml($html);

        // Render the PDF
        $dompdf->render();

        // Output the generated PDF (inline or attachment)
        return $dompdf->stream('cetak-laporan');

    }
  
    public function admin()
    {
        $peminjaman = Peminjaman::all();
        return view('peminjaman.admin', compact('peminjaman')) ;

    }

    public function tanggal(Request $request)
    {
    
        $tanggal_mulai = $request->tanggal_mulai;
        $tanggal_selesai = $request->tanggal_selesai;
    
        // Simpan dalam sesi
        session(['tanggal_mulai' => $tanggal_mulai, 'tanggal_selesai' => $tanggal_selesai]);
    
        // Ambil data peminjaman berdasarkan tanggal
        $peminjaman = Peminjaman::where('tanggal_peminjaman', '>=', $tanggal_mulai)
            ->where('tanggal_peminjaman', '<=', $tanggal_selesai)
            ->get();
    
        return view('peminjaman.admin', compact('peminjaman'));
    }
    
        

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = Buku::all(); 
        return view('peminjaman.create', compact('buku'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request, $id)
{
    // Temukan buku berdasarkan ID
    
    $buku = Buku::find($id);

    // Periksa apakah buku ada
    if (!$buku) {
        return redirect()->back()->with('error', 'Buku tidak ditemukan.');
    }

    // Periksa apakah stok buku cukup
    if ($buku->stock <= 0) {
        return redirect()->back()->with('error', 'Stok buku habis.');
    }
    
    // Mengatur tanggal pengembalian 7 hari ke depan dari hari ini
    $tanggal_pengembalian = Carbon::now()->addDays(-1);

    // Membuat data peminjaman dengan menggunakan nisn dari pengguna yang login
    Peminjaman::create([
        'tanggal_peminjaman' => Carbon::now(),
        'tanggal_pengembalian' => $tanggal_pengembalian,
        'isbn' => $request->isbn, // Menggunakan ISBN dari buku yang ditemukan
        'nisn' => $request->nisn,
        'status' => "pinjam",
    ]);
    $buku->stock--;
    $buku->save();

    return redirect()->route('peminjaman.index')->with('success', 'Buku berhasil dipinjam.' );
}


         

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = buku::all();
        $peminjamans = Peminjaman::findOrFail($id);
        return view('peminjaman.edit',compact('peminjamans','buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id)
{
    $peminjaman = Peminjaman::findOrFail($id);

    // Memperbarui status peminjaman
    $peminjaman->status = "kembalikan";

    // Menghitung denda jika tanggal pengembalian lewat
    $tanggal_pengembalian = Carbon::parse($peminjaman->tanggal_pengembalian);
    $tanggalAktual = Carbon::now(); // Menggunakan waktu dan tanggal aktual

    // Jika tanggal aktual melewati tanggal pengembalian, baru hitung denda
    if ($tanggalAktual->gt($tanggal_pengembalian)) {
        $selisihHari = $tanggalAktual->diffInDays($tanggal_pengembalian, false); // Menentukan selisih hari dengan tanggal pengembalian
        $dendaPerHari = 1000; // Denda per hari
        $dendaTotal = $selisihHari * $dendaPerHari;
        $peminjaman->denda = $dendaTotal;
    } else {
        $peminjaman->denda = null; // Set denda menjadi null jika belum lewat tanggal pengembalian
    }

    // Menyimpan tanggal aktual ke dalam database
    $peminjaman->tanggal_aktual = $tanggalAktual; // Assign the current date to tanggal_aktual field

    // Menyimpan perubahan
    $peminjaman->save();

    // Menandai bahwa buku sudah dikembalikan
    $buku = Buku::find($peminjaman->isbn);
    if ($peminjaman->is_returned) {
        $buku->increment('stock');
        // Tandai bahwa buku sudah dikembalikan
        $peminjaman->is_returned = true;
        $peminjaman->save();
    }

    if ($buku->stock > 0) {
        // Jika stok masih tersedia, ubah status buku menjadi Tersedia
        $buku->update(['status' => 'Tersedia']);
    }
    return redirect()->back();
}

     

     




    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect()->route('peminjaman.admin')->with('success', ('Product kategorikategori deleted successfully.'));
    }
}
