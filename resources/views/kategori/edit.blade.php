@extends('partial.template')
@section('content')
<center><h1>Edit Kategori</h1></center>

<form method="POST" action="{{ route('kategori.update', $kategori->kategori_id)}}">
{{csrf_field()}}
<input type="hidden" name="_method" value="post"/>
<div class="form-group">
    <label for="kategori">Nama Kategori</label>
    <input type="text" class="form-control" id="kategori_id" name="kategori" value="{{$kategori->kategori}}" required>
</div>
<button type="submit" class="btn btn-primary">Edit</button>
<a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>

</form> 
@endsection