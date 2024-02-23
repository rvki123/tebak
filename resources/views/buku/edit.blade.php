@extends('partial.template')
@section('content')


<center><h1>Edit Buku</h1></center>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('buku.update', $buku->isbn) }}" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="form-group">
        <label for="judul"> <h6>Nama Judul</h6></label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}" required>
    </div>

    <div class="form-group">
        <label for="stock"><h6>Stock</h6></label>
        <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $buku->stock) }}" required>
    </div>

    <div class="form-group">
        <label for="penulis"><h6>Nama Penulis</h6></label>
        <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis', $buku->penulis) }}" required>
    </div>

    <div class="form-group">
        <label for="penerbit_id"><h6>Penerbit</h6></label>
        <select name="penerbit_id" class="form-control" id="penerbit_id">
            <option value="">--Select Category--</option>
            @foreach ($penerbit as $penerbit)
                <option value="{{ $penerbit->penerbit_id }}" {{ $buku->penerbit_id == $buku->penerbit_id ? 'selected' : '' }}>{{ $penerbit->nama_penerbit }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="kategori_id"><h6>Kategori</h6></label>
        <select name="kategori_id" class="form-control" id="kategori_id">
            <option value="">--Select Category--</option>
            @foreach ($kategori as $penerbit)
                <option value="{{ $penerbit->kategori_id }}" {{ $buku->kategori_id == $buku->kategori_id ? 'selected' : '' }}>{{ $penerbit->kategori     }}</option>
            @endforeach
        </select>
    </div>

    


    <button type="submit" class="btn btn-primary">Edit</button>
    <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
