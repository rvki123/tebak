<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Peminjaman;
use App\Buku;
use App\User;
use Auth;
use Carbon\Carbon;
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


    public function admin()
    {
        $peminjaman = Peminjaman::all();
        return view('peminjaman.admin', compact('peminjaman')) ;

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
    $tanggal_pengembalian = Carbon::now()->addDays(7);

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

    return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan.' );
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
        $this->validate($request,[
            'status' => 'required',
           
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        // Memperbarui setiap kolom secara terpisah
        $peminjaman->status = $request->status;
        $peminjaman->denda = $request->denda;
    
        // Menyimpan perubahan
        $peminjaman->save();

        $buku = Buku::find($peminjaman->isbn);
        $buku->increment('Stock');
        if ($buku->Stock >= 0) {
            // Jika stok habis, ubah status buku menjadi tidak tersedia
            $buku->update(['Status' => 'Tersedia']);
        }

        return redirect()->route('peminjaman.admin')->with('success', 'Product category create successfully.' );
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
