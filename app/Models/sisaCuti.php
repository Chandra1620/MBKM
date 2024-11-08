<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sisaCuti extends Model
{
    use HasFactory;

    protected $table = 'sisa_cutis'; // Nama tabel di database, pastikan sesuai dengan migrasi
    
    protected $fillable = [
        'user_id',
        'n',
        'n_minus_1',
        'n_minus_2',
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
