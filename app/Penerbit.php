<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'penerbits';
    protected $fillable = ['nama_penerbit', 'alamat'];
    protected $primaryKey = 'penerbit_id';

    public function buku()
    {
        return $this->hasMany('App\Buku','penerbit_id','isbn','alamat','nama_penerbit');
    }

}
