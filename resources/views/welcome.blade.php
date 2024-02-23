<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Card</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* CSS untuk tampilan card */
        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Menggunakan tinggi viewport untuk membuat kartu terpusat di tengah layar */
        }

        .card {
            width: 700px; /* Atur lebar kartu sesuai kebutuhan Anda */
            padding: 20px; /* Atur padding untuk memisahkan teks dari tepi kartu */
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
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
