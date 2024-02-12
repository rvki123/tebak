<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamen';
    protected $fillable = ['tanggal_peminjaman','tanggal_pengembalian','isbn','nisn'.'denda','status'];
    protected $primaryKey = 'peminjaman_id';

    public function buku()
    {
        return $this->hasMany('App\Buku','peminjaman_id','isbn');
    }
}
