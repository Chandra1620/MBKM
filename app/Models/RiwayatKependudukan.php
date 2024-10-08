<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKependudukan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nik', 
        'agama', 
        'kewarganegaraan',
        'file_pendukung',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
