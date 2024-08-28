<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;
    protected $table = 'sertifikat';
    protected $primaryKey = 'id_sertifikat';
    protected $fillable = ['id_sertifikat', 'no_sertifikat', 'pelatihan_name', 'peserta_name', 'gambar'];
    public function getTanggalMulaiAttribute($tanggal_mulai)
    {
        return \Carbon\Carbon::parse($tanggal_mulai)->format('d-m-Y');
    }

    public function getTanggalTutupAttribute($tanggal_tutup)
    {
        return \Carbon\Carbon::parse($tanggal_tutup)->format('d-m-Y');
    }

    public function getMasaBerlakuAttribute($masa_berlaku)
    {
        return \Carbon\Carbon::parse($masa_berlaku)->format('d-m-Y');
    }
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id_kategori');
    }
}
