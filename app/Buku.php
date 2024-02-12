<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'bukus';
    protected $fillable = ['judul', 'stock', 'penulis', 'photo', 'penerbit_id', 'kategori_id'];
    protected $primaryKey = 'isbn';

    public function penerbit()
    {
        return $this->belongsTo('App\Penerbit','penerbit_id');
    }

    public function kategori_buku()
    {
        return $this->belongsTo('App\Kategori_buku','kategori_id');
    }

    public function peminjaman()
    {
        return $this->belongsTo('App\Peminjaman','peminjaman_id');
    }

}
