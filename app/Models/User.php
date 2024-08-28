<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users'; // Nama tabel di database
    protected $primaryKey = 'id_login'; // Kunci primer tabel
    protected $fillable = ['username', 'password']; // Kolom yang dapat diisi
    public $timestamps = false; // Tidak menggunakan timestamp

    // Jika menggunakan password hashing
    protected $hidden = [
        'password',
    ];

    // Jika menggunakan username daripada email
    public function getAuthPassword()
    {
        return $this->password;
    }
}
