<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPekerjaan extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'user_id',
        'bidang_usaha',
        'jenis_pekerjaan',
        'jabatan',
        'instansi',
        'divisi',
        'deskripsi_kerja',
        'mulai_bekerja',
        'selesai_bekerja',
        'area_pekerjaan',
        'file_pendukung',
        'status'
    ];



}
