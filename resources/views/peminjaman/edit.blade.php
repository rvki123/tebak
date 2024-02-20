@extends('partial.template')

@section('content')

<center><h1>Edit Peminjaman</h1></center>
<form action="{{ route('peminjaman.update', $peminjaman->peminjaman_id) }}" method="POST">
    {{csrf_field()}}
        
        
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>
        <div class="form-group">
            <label for="denda">Denda:</label>
            <input type="number" class="form-control" id="denda" name="denda" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
    @endsection
