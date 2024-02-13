@extends('partial.template')

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
                    <th>Buku</th>
                    <th>Nisn</th>
                    <th>Status</th>
                    <th>Denda</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal_peminjaman }}</td>
                        <td>{{ $item->tanggal_pengembalian }}</td>
                        <td>{{ $item->buku->judul }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->denda }}</td>
                        <td>
                <a href="{{ route('peminjaman.edit', $item->peminjaman_id) }}" class="btn btn-sm btn-info">Edit</a>
                <form action="{{ route('peminjaman.destroy', $item->peminjaman_id) }}" method="POST" class="d-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete"/>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
