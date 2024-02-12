<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Peminjaman;
use App\Buku;


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
            'tanggal_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required',
            'isbn' => 'required',
            'nisn' => 'required',
            'denda' => 'required',
            'status' => 'required',
        ]);
        
        Peminjaman::create([
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'isbn' => $request->isbn,
            'nisn' => $request->nisn,
            'denda' => $request->denda, 
            'status' => $request->status, 
        ]);
        
        return redirect()->route('peminjaman.index')->with('success', 'Product category create successfully.' );
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
        $peminjaman = Peminjaman::all();
        return view('peminjaman.edit',compact('peminjaman'));
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
            'tgl_peminjaman' => 'required',
            'tgl_pengembalian' => 'required',
            'isbn' => 'required',
            'nisn' => 'required',
            'denda' => 'required',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Product category create successfully.' );
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

        return redirect()->route('peminjaman.index')->with('success', ('Product kategorikategori deleted successfully.'));
    }
}
