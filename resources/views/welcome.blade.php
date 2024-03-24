<!-- @extends('home')
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
            height: 100%;
            margin: 0;
            background-color: black; /* Warna latar belakang */
            background-image: url('images/perpus.jpg');
        }

        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Menggunakan tinggi viewport untuk membuat kartu terpusat di tengah layar */
        }

        .card {
            width: 70%; /* Atur lebar kartu sesuai kebutuhan Anda */
            max-width: 600px; /* Lebar maksimum kartu */
            padding: 35px; /* Atur padding untuk memisahkan teks dari tepi kartu */
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan */
            background-color: #ffffff; /* Warna latar belakang kartu */
            color: #333; /* Warna teks */
        }

        .card h4 {
            margin-top: 10; /* Menghapus margin atas dari judul */
            font-size: 30px; /* Ukuran font untuk judul */
            text-align: center; /* Pusatkan teks */
            color: #333; /* Warna teks judul */
        }

        .card p {
            font-size: 19px; /* Ukuran font untuk konten */
            line-height: 1.6; /* Jarak antara baris */
            margin-bottom: 25px; /* Jarak antara paragraf */
        }

        .card p:last-child {
            margin-bottom: 0; /* Hapus margin bawah dari paragraf terakhir */
        }
    </style>
</head>
<body>
    <div class="card-container">
        <div class="card">
            <h4>
            <p>1. Mengembalikan Buku Terlambat: Anggota tidak diperkenankan mengembalikan buku terlambat tanpa membayar denda sesuai dengan kebijakan perpustakaan.</p>
            <p>2. Kerusakan Buku: Anggota dilarang merusak buku. Jika buku mengalami kerusakan saat dalam peminjaman, anggota akan dikenakan biaya penggantian atau perbaikan sesuai dengan kebijakan perpustakaan.</p>
            <p>3. Peminjaman untuk Orang Lain: Anggota dilarang meminjamkan kartu pustakaannya kepada orang lain untuk digunakan dalam peminjaman.</p>
            <p>4. Peminjaman dalam Jumlah Besar: Anggota dilarang melakukan peminjaman dalam jumlah besar yang melebihi batas yang ditentukan oleh perpustakaan.</p>
            </h4>
        </div>
    </div>
</body>
</html>
@endsection 