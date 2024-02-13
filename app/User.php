<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

     /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'nisn';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'nisn', 'nama_siswa','kelas', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function peminjaman()
    {
        return $this->belongsTo('App\Peminjaman','peminjaman_id','nisn');
    }
}
