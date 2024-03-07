@extends('partial.template')
@section('content')
@if(session('success'))
<div class="alert alert-success" >{{session('success')}}</div>
@endif


<center><h1>Kategori Buku</h1></center>

<div class="container mt-5">
<form action="{{ route('kategori.index')}}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="search-kategori" value="{{request('search')}}">

        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </div> 
</form>
<div class="container mt-5">
        <table class="table text-center">
    <thead>
        <tr>
        
            <th>Nama Kategori</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
   
        @foreach($kategori as $category)
        <tr>
            
            <td>{{$category->kategori}}</td>
            <td>
                <a href="{{ route('kategori.edit', $category->kategori_id)}}" class="btn btn-sm btn-info">Edit</a>
                <form action="{{ route('kategori.destroy', $category->kategori_id)}}" method="POST" class="d-inline">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="delete"/>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

<div class="container mt-5">
<a href="{{route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
</div>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item {{ $kategori->onFirstPage() ? 'disabled' : '' }}">
      <a class="page-link" href="{{ $kategori->previousPageUrl() }}" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <!-- Tampilkan nomor halaman -->
    @for ($i = 1; $i <= $kategori->lastPage(); $i++)
        <li class="page-item {{ $kategori->currentPage() == $i ? 'active' : '' }}">
            <a class="page-link" href="{{ $kategori->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
    <li class="page-item {{ $kategori->hasMorePages() ? '' : 'disabled' }}">
      <a class="page-link" href="{{ $kategori->nextPageUrl() }}" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
@endsection