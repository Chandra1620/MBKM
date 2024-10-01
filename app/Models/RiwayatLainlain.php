<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatLainlain extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'npwp', 
        'nama_wajib_pajak',
        'status',
        'file_pendukung'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
