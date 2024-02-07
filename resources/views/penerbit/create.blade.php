<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<h1>Tambah Penerbit</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('penerbit.store') }}">
{{ csrf_field() }}
    <div class="form-group">
        <label for="nama_penerbit"> nama penerbit</label>
        <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" value="{{ old('nama_penerbit') }}" required>
    </div>

    <div class="form-group">
        <label for="alamat">alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
    </div>


    <button type="submit" class="btn btn-primary">Buat</button>
    <a href="{{ route('penerbit.index') }}" class="btn btn-secondary">Kembali</a>
</form>
