<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamen';
    protected $fillable = ['tanggal_peminjaman','tanggal_pengembalian','isbn','nisn','denda','status','judul'];
    protected $primaryKey = 'peminjaman_id';


    public function user()
    {
        return $this->belongsTo('App\User', 'nisn', 'nisn');
    }

    public function buku()
    {
        return $this->belongsTo('App\Buku','isbn');
    }

}
