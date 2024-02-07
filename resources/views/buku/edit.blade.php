<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<h1>Edit Buku</h1>

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
        <label for="judul"> nama judul</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}" required>
    </div>

    <div class="form-group">
        <label for="stock">stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $buku->stock) }}" required>
    </div>

    <div class="form-group">
        <label for="penulis"> nama penulis</label>
        <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis', $buku->penulis) }}" required>
    </div>

    <div class="form-group">
        <label for="penerbit_id">Penerbit</label>
        <select name="penerbit_id" class="form-control" id="penerbit_id">
            <option value="">--Select Category--</option>
            @foreach ($penerbit as $penerbit)
                <option value="{{ $penerbit->penerbit_id }}" {{ $buku->penerbit_id == $buku->penerbit_id ? 'selected' : '' }}>{{ $penerbit->nama_penerbit }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="penerbit_id">Kategori</label>
        <select name="penerbit_id" class="form-control" id="penerbit_id">
            <option value="">--Select Category--</option>
            @foreach ($penerbit as $penerbit)
                <option value="{{ $penerbit->penerbit_id }}" {{ $buku->penerbit_id == $buku->penerbit_id ? 'selected' : '' }}>{{ $penerbit->alamat }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="photo">photo</label>
        <input type="file" class="form-control" id="photo" name="photo" value="{{ old('photo') }}" required>
    </div>


    <button type="submit" class="btn btn-primary">Edit</button>
    <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
</form>
