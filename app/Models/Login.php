<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{

    protected $table = 'login'; // Nama tabel di database
    protected $primaryKey = 'id_login'; // Kunci primer tabel
    protected $fillable = ['username', 'password']; // Kolom yang dapat diisi
    public $timestamps = false; // Tidak menggunakan timestamp
}
