<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('partial.template')
@section('content')
@if(session('success'))
<div class="alert alert-success" >{{session('success')}}</div>
@endif
<center><h1>Daftar Buku</h1></center>
<div class="container mt-6">
<form action="{{ route('buku.index')}}" method="GET" class="mt-5">
    <div class="input-group mb-5">
        <input type="text" name="search" class="form-control" placeholder="search-buku" value="{{request('search')}}">

        <div class="input-group-append  ">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </div> 
</form>

    <table class="table text-center table-bordered" >
    <thead>
        <tr>
            <th>NO</th>
            <th>judul</th>
            <th>penulis</th>
            <th>penerbit</th>
            <th>kategori</th>
            <th>stok</th>
            <th>photo</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($buku as $p => $u)
        <tr>
            <td>{{$p+1}}</td>
            <td>{{$u->judul}}</td>
            <td>{{$u->penulis}}</td>
            <td>{{$u->penerbit['nama_penerbit']}}</td>
            <td>{{$u->kategori_buku->kategori}}</td>
            <td>{{$u->stock}}</td>
            <td><img src="{{asset('image/'.$u->photo)}}" alt="" width="50" height="50"></td>
            <td>

            
                <a href="{{ route('buku.edit', $u->isbn)}}" class="btn btn-sm btn-info">Edit</a>
                <form action="{{ route('buku.destroy', $u->isbn)}}" method="POST" class="d-inline">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="delete"/>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
       <div class="mb-5">
        <a href="{{route('buku.create') }}" class="btn btn-primary mt-5">Tambah Buku</a>
        </div>
        
        <div class="pagination">
    @if ($buku->onFirstPage())
        <button class="btn btn-secondary" disabled>Previous</button>
    @else
        <a href="{{ $buku->previousPageUrl() }}" class="btn btn-secondary">Previous</a>
    @endif

    @php
        $halfTotalLinks = floor(config('pagination.default') / 2);
        $from = $buku->currentPage() - $halfTotalLinks;
        $to = $buku->currentPage() + $halfTotalLinks;
        if ($buku->currentPage() < $halfTotalLinks) {
            $to += $halfTotalLinks - $buku->currentPage();
        }
        if ($buku->lastPage() - $buku->currentPage() < $halfTotalLinks) {
            $from -= $halfTotalLinks - ($buku->lastPage() - $buku->currentPage()) - 1;
        }
    @endphp

    @for ($i = $from; $i <= $to; $i++)
        @if ($i > 0 && $i <= $buku->lastPage())
            @if ($i == $buku->currentPage())
                <span class="btn btn-primary">{{ $i }}</span>
            @else
                <a href="{{ $buku->url($i) }}" class="btn btn-secondary">{{ $i }}</a>
            @endif
        @endif
    @endfor

    @if ($buku->hasMorePages())
        <a href="{{ $buku->nextPageUrl() }}" class="btn btn-secondary">Next</a>
    @else
        <button class="btn btn-secondary" disabled>Next</button>
    @endif
</div>

</div>

        
</div>
@endsection

</body>
</html>