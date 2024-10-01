<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatFungsional extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jabatan_fungsional',
        'nomor_sk',
        'tanggal_mulai',
        'dokumen_pendukung',
        'status',
        'verifikasi_admin',
        'alasan_penolakan',
        'unit_kerja_has_jabatan_fungsional_id',

        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jabatanfungsional()
    {
        return $this->belongsTo(UnitKerjaHasJabatanFungsional::class,'unit_kerja_has_jabatan_fungsional_id' );
    }
}
