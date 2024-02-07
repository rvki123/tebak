<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<h1>Edit Kategori</h1>

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