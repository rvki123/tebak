<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('home')

@section('content')

   
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <center> <h1>Daftar Peminjaman</h1></center>

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
                        <th>Judul</th>
                        <th>Kode Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Denda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjaman as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->buku['judul']}}</td>
                            <td>{{ $item->isbn }}</td>
                            <td>{{ $item->tanggal_peminjaman }}</td>
                            <td>{{ $item->tanggal_pengembalian }}</td>
                            <td>{{ $item->denda }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
<div class="d-flex justify-content-center mt-3">
    @if ($peminjaman instanceof \Illuminate\Pagination\AbstractPaginator && $peminjaman->hasPages())
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($peminjaman->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $peminjaman->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($peminjaman as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $peminjaman->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($peminjaman->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $peminjaman->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>
    @endif
</div>
            </div>
        </div>
    </div>
@endsection
</body>
</html>
