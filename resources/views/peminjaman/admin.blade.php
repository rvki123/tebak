@extends('partial.template')

@section('content')
    

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <center><h1>Daftar Peminjaman</h1></center>

    <form action="{{ route('tanggal') }}" method="GET">
        <div class="row pb-3 justify-content-start"> <!-- Mengubah justify-content-end menjadi justify-content-start -->
            <div class="col-md-3">
                <label for="tanggal_mulai"> Tanggal Mulai: </label>
                <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="tanggal_selesai"> Tanggal Selesai: </label>
                <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="form-control" required>
            </div>
            <div class="col-md-1 pt-4">
                <button type="submit" class="btn btn-primary btn-sm">Cari</button>
            </div>
        </div>
    </form>

    <div class="d-flex justify-content-start mb-3"> <!-- Mengubah justify-content-end menjadi justify-content-start -->
    <a href="{{ route('cetak-laporan') }}" target="_blank" class="btn btn-danger m-2">Cetak Pdf</a>
    <a href="{{ route('peminjaman.admin') }}" class="btn btn-primary m-2">Kembali</a>    
</div>
            
    <div class="container mt-5">
<form action="{{ route('peminjaman.admin') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search Peminjaman" value="{{ request('search') }}">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </div>
</form>

    <div class="container mt-5">
        <table class="table  text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Judul</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Aktual</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Denda</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user['nama_siswa'] }}</td>
                        <td>{{ $item->buku['judul']}}</td>
                        <td>{{ $item->tanggal_peminjaman }}</td>
                        <td>{{ $item->tanggal_aktual }}</td>
                        <td>{{ $item->tanggal_pengembalian }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->denda }}</td>
                        <td>
                        <form action="{{ route('peminjaman.update', $item->peminjaman_id) }}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name='status' value='{{$item->status}}'>
                        <button type="submit" class="btn btn-sm btn-info">Update</button>
                        </form>

                        
                <!-- <a href="{{ route('peminjaman.edit', $item->peminjaman_id) }}" class="btn btn-sm btn-info">Edit</a> -->
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
