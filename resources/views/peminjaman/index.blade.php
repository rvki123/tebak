@extends('home')

@section('content')

    <h1>Daftar Peminjaman</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container mt-5">
<form action="{{ route('peminjaman.index') }}" method="GET" class="mb-3">
    
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search Peminjaman" value="{{ request('search') }}">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </div>
</form>

    <div class="container mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Judul</th>
                    <th>Kode Buku</th>
                    <th>Denda</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal_peminjaman }}</td>
                        <td>{{ $item->tanggal_pengembalian }}</td>
                        <td>{{ $item->buku['judul']}}</td>
                        <td>{{ $item->isbn }}</td>
                        <td>{{ $item->denda }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
   
    </div>
@endsection
