<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['id_kategori', 'nama_kategori'];
    public $timestamps = false;

    public function sertifikat(){
        return $this->hasMany(Sertifikat::class, 'kategori_id', 'id_kategori');
    }
}
