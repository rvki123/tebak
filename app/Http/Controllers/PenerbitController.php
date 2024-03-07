<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penerbit;
class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbit = Penerbit::paginate(5); // 10 adalah jumlah item yang ingin ditampilkan per halaman

        return view('penerbit.index', compact('penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerbit.create');
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
            'nama_penerbit' => 'required',
            'alamat' => 'required' 
        ]);

        Penerbit::create([
            'nama_penerbit' => $request->nama_penerbit,
            'alamat' => $request->alamat

        ]);

        return redirect()->route('penerbit.index')->with('success', 'Menambahkan Penerbit Selesai.' );
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
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.edit', compact('penerbit'));
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
            'nama_penerbit' => 'required',
            'alamat' => 'required' 
        ]);

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update([
            'nama_penerbit' => $request->nama_penerbit,
            'alamat' => $request->alamat

        ]);

        return redirect()->route('penerbit.index')->with('success', 'Merubah Penerbit Selesai.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();

        return redirect()->route('penerbit.index')->with('success', ('Menghapus Penerbit Selesai.'));
    }
}
