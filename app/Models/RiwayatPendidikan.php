<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    use HasFactory;
    protected $fillable =
    [
    'user_id',
    'nama_perkerjaan',
    'waktu',
    'ln/dn',
   
    ];
}
