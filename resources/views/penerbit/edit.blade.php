<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<h1>Edit Penerbit</h1>

@if($errors->any())
<div class="alert alert-danger">
    
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('penerbit.update', $penerbit->penerbit_id) }}">
{{ csrf_field() }}
    <div class="form-group">
        <label for="nama_penerbit"> nama penerbit</label>
        <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" value="{{ old('nama_penerbit', $penerbit->nama_penerbit) }}" required>
    </div>

    <div class="form-group">
        <label for="alamat">Price</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $penerbit->alamat) }}" required>
    </div>


    <button type="submit" class="btn btn-primary">Edit</button>
    <a href="{{ route('penerbit.index') }}" class="btn btn-secondary">Kembali</a>
</form>
