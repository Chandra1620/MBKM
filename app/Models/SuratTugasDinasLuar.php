<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugasDinasLuar extends Model
{
    use HasFactory;

    protected $fillable = [
        // Atur atribut yang sesuai dengan jenis surat STPD
        'jenis_surat',
        'judul',
        'deskripsi',
        'nomor_surat',
        'tgl_berangkat',
        'tgl_kembali',
        'tempat_berangkat',
        'tempat_tujuan',
        'transportasi',
        'biaya',
        'catatan',
        'file_pendukung',
        'pengirim_id',
        'ketua_id',
        'anggota',
        'pembuatkomitmen_id',
    ];

    public function pengirim()
    {
        return $this->belongsTo(User::class, 'pengirim_id');
    }

    public function ketua()
    {
        return $this->belongsTo(User::class, 'ketua_id');
    }
    public function pembuatkomitmen()
    {
        return $this->belongsTo(User::class, 'pembuatkomitmen_id');
    }

}
