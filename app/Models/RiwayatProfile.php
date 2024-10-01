<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'nip',
        'email',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_ibu',
        'photo',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
