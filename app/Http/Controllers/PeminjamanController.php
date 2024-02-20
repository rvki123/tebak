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
        $buku = Buku::all(); // Ambil semua buku
        return view('peminjaman.create', compact('buku'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'tanggal_pengembalian' => 'required',
            'isbn' => 'required',
            'nisn' => 'required',
            'status' => 'required',
        ]);
        
        
        // Membuat data peminjaman dengan menggunakan nisn dari pengguna yang login
        Peminjaman::create([
            'tanggal_peminjaman' => Carbon::now(),
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'isbn' => $request->isbn,
            'nisn' => $request->nisn,
            'status' => $request->status,
        ]);
        
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
        $peminjaman = Peminjaman::findOrFail($id);
        return view('peminjaman.edit',compact('peminjaman','buku'));
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
            'denda' => 'required',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        // Memperbarui setiap kolom secara terpisah
        $peminjaman->status = $request->status;
        $peminjaman->denda = $request->denda;
    
        // Menyimpan perubahan
        $peminjaman->save();

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
