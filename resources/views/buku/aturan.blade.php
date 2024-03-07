@extends('home')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aturan Peminjaman</title>
   
    <style>
        /* CSS untuk tampilan card */
        html, body {
    height: 100pvh;
    margin: 0;
    background-image: url('images/perpus.jpg');
    background-repeat: no-repeat; /* Menghentikan pengulangan gambar latar belakang */
    background-size: cover; /* Memastikan gambar latar belakang mencakup seluruh area */
    background-position: center; /* Pusatkan gambar latar belakang */
}
    </style>
</head>
<body>


<div class="card">
    <div class="card-body">
        <h5 class="card-title">Judul Kartu</h5>
        <p class="card-text">Beberapa contoh teks singkat yang akan muncul dalam konten kartu.</p>
        <a href="{{ route('peminjaman.index') }}" class="btn btn-primary">Tombol</a>
    </div>
</div>
</body>
</html>
@endsection