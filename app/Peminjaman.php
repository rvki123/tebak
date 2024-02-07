<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamen';
    protected $fillable = ['tgl_peminjaman','tgl_pengembalian','buku_id','nisn'.'denda'];
    protected $primaryKey = 'peminjaman_id';

    public function buku()
    {
        return $this->hasMany('App\Buku','peminjaman_id','isbn');
    }
}
