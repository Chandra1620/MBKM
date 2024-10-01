<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeputusan extends Model
{
    use HasFactory;

    protected $fillable = [
        // Atur atribut yang sesuai dengan jenis surat SK
        'jenis_surat',
        'judul',
        'deskripsi',
        'nomor_surat',
        'file_pendukung',
        'pengirim_id',
        'penerima',
        // Tambahkan atribut khusus SK jika ada
    ];

    public function pengirim()
    {
        return $this->belongsTo(User::class, 'pengirim_id');
    }

    // public function penerima()
    // {
    //     return $this->belongsTo(User::class, 'penerima_id');
    // }
}
