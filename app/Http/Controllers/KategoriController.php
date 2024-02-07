<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori_buku;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori_buku::all();
        return view('kategori.index', compact('kategori')) ;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'kategori' => 'required'
        ]);

        Kategori_buku::create([
            'kategori'=> $request->kategori
        ]);

        return redirect()->route('kategori.index')->with('success', 'Menambahakan Kategori Selesai.' );
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
        $kategori = Kategori_buku::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
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
        $this->validate($request, ['kategori'=>'required|max:255']);

        $kategori = Kategori_buku::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Merubah Kategori Selesai.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kategori_id)
    {
        $kategori = Kategori_buku::findOrFail($kategori_id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', ('Menghapus Kategori Selesai.'));
    }
}
