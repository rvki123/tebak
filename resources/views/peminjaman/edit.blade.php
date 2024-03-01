@extends('partial.template')

@section('content')

<!-- <center><h1>Edit Peminjaman</h1></center>
<div class="container mt-5">
<form action="{{ route('peminjaman.update', $peminjamans->peminjaman_id) }}" method="POST"> -->
    {{csrf_field()}}
        
    <!-- <div class="form-group">
        <select name="status" class="form-control" id="status">
            <option value="">Pilih Status</option>
                <option value="{{ $peminjamans->status }}">Dipinjam</option>
                <option value="{{ $peminjamans->status }}">Dikembali</option>
                <option value="{{ $peminjamans->status }}">Buku Rusak</option>
                <option value="{{ $peminjamans->status }}">Buku Hilang</option>
                <option value="{{ $peminjamans->status }}">Telat Pengembalian</option>
        </select>
    </div> -->
        <!-- <div class="form-group">
            <label for="denda">Denda:</label>
            <input type="text" class="form-control" id="denda" name="denda">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form> -->
    @endsection
