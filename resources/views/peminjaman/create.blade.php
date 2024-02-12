@extends('partial.template')

@section('content')
    <h1>Tambah Peminjaman</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peminjaman.store') }}" method="POST">
    {{csrf_field()}}
        
        <div class="form-group">
            <label for="tanggal_peminjaman">Tanggal Peminjaman:</label>
            <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" required>
        </div>
        <div class="form-group">
            <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
            <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <select class="form-control" id="isbn" name="isbn" required>
                @foreach($buku as $item)
                    <option value="{{ $item->isbn }}">{{ $item->isbn }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nisn">NISN:</label>
            <input type="number" class="form-control" id="nisn" name="nisn" value="{{ old('nisn') }}" required>
        </div>
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