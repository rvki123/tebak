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

    <style>
        h1 {
    font-size: 50px; /* Ubah ukuran font sesuai keinginan Anda */
    font-family: Stencil; /* Ganti jenis font dengan jenis font yang Anda inginkan */
}

    </style>
    <center> <h1>Daftar Peminjaman</h1></center>

    <div class="container mt-5">
        <form action="{{ route('peminjaman.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search Peminjaman" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit">Search</button>
                </div>
            </div>
        </form>

        <div class="container mt-5">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th class="bg-info" style="color: black;">No</th>
                        <th class="bg-info" style="color: black;">Judul</th>
                        <th class="bg-info" style="color: black;">Kode Buku</th>
                        <th class="bg-info" style="color: black;">Tanggal Peminjaman</th>
                        <th class="bg-info" style="color: black;">Tanggal Aktual</th>
                        <th class="bg-info" style="color: black;">Tanggal Pengembalian</th>
                        <th class="bg-info" style="color: black;">Denda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjaman as $item)
                        <tr>
                            <td class="bg-light">{{ $loop->iteration }}</td>
                            <td class="bg-light">{{ $item->buku['judul']}}</td>
                            <td class="bg-light">{{ $item->isbn }}</td>
                            <td class="bg-light">{{ $item->tanggal_peminjaman }}</td>
                            <td class="bg-light">{{ $item->tanggal_aktual }}</td>
                            <td class="bg-light">{{ $item->tanggal_pengembalian }}</td>
                            <td class="bg-light">{{ $item->denda }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

                <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $peminjaman->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $peminjaman->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                    <!-- Tampilkan nomor halaman -->
                    @for ($i = 1; $i <= $peminjaman->lastPage(); $i++)
                        <li class="page-item {{ $peminjaman->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $peminjaman->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $peminjaman->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $peminjaman->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul>
                </nav>
  
            </div>
        </div>
    </div>
@endsection
</body>
</html>
