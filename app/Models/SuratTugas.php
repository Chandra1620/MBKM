<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugas extends Model
{
    use HasFactory;

    protected $fillable = [
        // Atur atribut yang sesuai dengan jenis surat ST
        'jenis_surat',
        'judul',
        'deskripsi',
        'nomor_surat',
        'tgl_berangkat',
        'tgl_kembali',
        'file_pendukung',
        'pengirim_id',
        'ketua_id',
        'anggota',
        // Tambahkan atribut khusus ST jika ada
    ];

    public function pengirim()
    {
        return $this->belongsTo(User::class, 'pengirim_id');
    }

    public function ketua()
    {
        return $this->belongsTo(User::class, 'ketua_id');
    }

    public function unitkerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }
}
