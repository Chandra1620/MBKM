<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diklat extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jenis',
        'nama',
        'penyelenggara',
        'peran',
        'tingkat_diklat',
        'jumlah_jam',
        'no_sertifikat',
        'tingkat_diklat',
        'tgl_sertifikat',
        'tahun_penyelenggaraan',
        'tempat',
        'tanggal_mulai',
        'tanggal_selesai',
        'nomor_sk_penugasan',
        'tanggal_sk_penugasan',
        'status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
