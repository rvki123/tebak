@extends('partial.template')
@section('content')
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
        <label for="nama_penerbit"> Nama Penerbit</label>
        <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" value="{{ old('nama_penerbit', $penerbit->nama_penerbit) }}" required>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $penerbit->alamat) }}" required>
    </div>


    <button type="submit" class="btn btn-primary">Edit</button>
    <a href="{{ route('penerbit.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
