<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatAlamatdanKontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'provinsi',
        'kota',
        'kecamatan',
        'desa_kelurahan',
        'rt', 
        'rw',
        'kodepos',
        'alamat', 
        'no_telp_rumah',
        'no_hp',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
