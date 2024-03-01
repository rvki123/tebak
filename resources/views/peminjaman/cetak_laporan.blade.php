<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Cetaak Laporan</title>
</head>
<body>
@if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <center><h1>Daftar Peminjaman</h1></center>

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
                        <td>{{ $item->user->nama_siswa }}</td>
                        <td>{{ $item->buku->judul}}</td>
                        <td>{{ $item->tanggal_peminjaman }}</td>
                        <td>{{ $item->tanggal_aktual }}</td>
                        <td>{{ $item->tanggal_pengembalian }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->denda }}</td>
                        <td>
                        <form action="{{ route('peminjaman.update', $item->peminjaman_id) }}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name='status' value='{{$item->status}}'>
                        
                        </form>

                        
                <!-- <a href="{{ route('peminjaman.edit', $item->peminjaman_id) }}" class="btn btn-sm btn-info">Edit</a> -->
                <form action="{{ route('peminjaman.destroy', $item->peminjaman_id) }}" method="POST" class="d-inline">
                    {{ csrf_field() }}
                </form>
            </td>
        </tr>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>
</html>