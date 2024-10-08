<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiHasAbsensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jam_masuk',
        'jam_keluar',
        'tanggal_kehadiran',
        'status',
        'tags'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
