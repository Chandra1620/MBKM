<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lainlain extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'npwp', 
        'nama_wajib_pajak',
        'file_pendukung'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
