@extends('partial.template')
@section('content')
<h1>Penerbit</h1>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif


<div class="container mt-5">
<form action="{{ route('penerbit.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search Penerbit" value="{{ request('search') }}">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </div>
</form>

<table class="table table-bordered text-center">

    <thead>
        <tr>
            <th>No</th>
            <th>Nama Penerbit</th>
            <th>Alamat</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($penerbit as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_penerbit }}</td>
            <td>{{ $item->alamat }}</td>

            <td>
                <a href="{{ route('penerbit.edit', $item->penerbit_id) }}" class="btn btn-sm btn-info">Edit</a>
                <form action="{{ route('penerbit.destroy', $item->penerbit_id) }}" method="POST" class="d-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete"/>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="container mt-5">
    <a href="{{ route('penerbit.create') }}" class="btn btn-primary">Tambah</a>
</div>
</div>
@endsection