@extends('partial.template')
@section('content')
<center><h1>Buat Kategori </h1></center>
<form method="POST" action="{{route('kategori.store')}}">

    {{csrf_field()}}
    <div class="form-group">
        <label for="kategori">Nama Kategori</label>
        <input type="text" class="form-control" id="kategori_id" name="kategori" required>
    </div>
    <button type="submit" class="btn btn-primary">Buat</button>
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection