@extends('partial.template')
@section('content')
@if(session('success'))
<div class="alert alert-success" >{{session('success')}}</div>
@endif


<div class="container mt-5">
<form action="{{ route('buku.index')}}" method="GET" class="mt-5">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="search-buku" value="{{request('search')}}">

        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </div> 
</form>

    <table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>NO</th>
            <th>judul</th>
            <th>stock</th>
            <th>penulis</th>
            <th>penerbit</th>
            <th>kategori</th>
            <th>photo</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($buku as $buku => $u)
        <tr>
            <td>{{$buku+1}}</td>
            <td>{{$u->judul}}</td>
            <td>{{$u->stock}}</td>
            <td>{{$u->penulis}}</td>
            <td>{{$u->penerbit['nama_penerbit']}}</td>
            <td>{{$u->kategori_buku->kategori}}</td>
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
</div>
@endsection
