<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Penerbit;
use App\Kategori_buku;
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $search = $request->input('search');
    $buku = Buku::query();

    if ($search) {
        $buku->where('judul', 'LIKE', '%' . $search . '%');
    }

    $buku = $buku->orderBy('created_at', 'desc')->paginate(5);

    return view('buku.index', compact('buku', 'search'));
}


    public function aturan()
    {
        $buku = Buku::all();
        return view('buku.aturan', compact('buku')) ; 
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori_buku::all();
        return view('buku.create',compact('kategori','penerbit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi',
            'stock' => 'required|numeric',
            'penulis' => 'required',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
            'photo' => 'required|image'
        ]);
    
        // Simpan gambar
        if ($request->hasFile('photo')) {
            $imgName = $request->photo->getClientOriginalName() . '-' . time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('image'), $imgName);
        }
    
        // Buat dan simpan buku baru ke dalam database
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->deskripsi = $request->deskripsi;
        $buku->stock = $request->stock;
        $buku->penulis = $request->penulis;
        $buku->kategori_id = $request->kategori_id;
        $buku->penerbit_id = $request->penerbit_id;
        $buku->photo = $imgName;
    
        $buku->save();
    
        // Redirect kembali ke halaman indeks buku
        return redirect()->route('buku.index')->with('success', 'Menambahkan Buku Selesai.');
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));

        // Ambil jumlah stok buku sebelumnya
$stok_sebelumnya = $buku->stock;

// Lakukan proses pengembalian buku

// Misalnya, tambahkan kembali 1 ke stok buku
$buku->stock = $stok_sebelumnya + 1;

// Simpan perubahan
$buku->save();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori_buku::all();
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku','penerbit','kategori'));
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
            'judul' => 'required',
            'stock' => 'required',   
            'penulis' => 'required',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
        
            
        ]);

        $buku = Buku::findOrFail($id);
        if ($request->hasFile('photo')) {
            $imgName = $request->photo->getClientOriginalName() . '-' . time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('image'), $imgName);
        }
        $buku->update([
            'judul' => $request->judul,
            'stock' => $request->stock,
            'penulis' => $request->penulis,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id,
        

        ]);

        return redirect()->route('buku.index')->with('success', 'Edit Buku Selesai.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', ('Menghapus Buku Selesai.'));
    }
}