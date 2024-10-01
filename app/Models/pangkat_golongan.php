<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pangkat_golongan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pangkat_golongan',
        'nomor_sk',
        'tanggal_sk',
        'tanggal_mulai',
        'masakerja_tahun',
        'masakerja_bulan',
        'kredit',
        'status',
        'verifikasi_admin',
        'dokumen_pendukung',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
