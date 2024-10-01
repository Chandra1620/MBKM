<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tes extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_tes',
        'skor',
        'jenis_tes',
        'penyelenggara',
        'tahun',
        'status'
      
    ];

}
