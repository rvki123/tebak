<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori_buku extends Model
{
    protected $table = 'kategori_bukus';
    protected $fillable = ['kategori'];
    protected $primaryKey = 'kategori_id';

    public function buku()
    {
        return $this->hasMany('App\Buku','kategori_id','isbn');
    }
}
