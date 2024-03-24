@extends('partial.template')
@section('content')
<h1>Tambah Buku</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach 
    </ul>
</div>
@endif

<form method="POST" action="{{ route('buku.store') }}"enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="form-group">
        <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" required>
    </div>

    <div class="form-group">
    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" placeholder="Deskripsi"></textarea>
    </div>


    <div class="form-group">
        <input type="number" class="form-control" id="stock" name="stock" placeholder="Stok" value="{{ old('stock') }}" required>
    </div>
    
    <div class="form-group">
        <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Penulis" value="{{ old('penulis') }}" required>
    </div>

    <div class="form-group">
        <select name="penerbit_id" class="form-control" id="penerbit_id">
            <option value="">Penerbit</option>
            @foreach ($penerbit as $penerbit)
                <option value="{{ $penerbit->penerbit_id }}">{{ $penerbit->nama_penerbit }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <select name="kategori_id" class="form-control" id="kategori_id" >
            <option value="">Kategori</option>
            @foreach ($kategori as $kategori)
                <option value="{{ $kategori->kategori_id }}">{{ $kategori->kategori }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="photo">photo</label>
        <input type="file" class="form-control" id="photo" name="photo" value="{{ old('photo') }}" required>
    </div>


    <button type="submit" class="btn btn-primary">Buat</button>
    <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection



<!-- <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="">
          Check me out
          <span class="form-check-sign">
            <span class="check"></span>
          </span>
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form> -->