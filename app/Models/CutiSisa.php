<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutiSisa extends Model
{
    use HasFactory;

    protected $table = 'cuti_sisas'; // Nama tabel di database, pastikan sesuai dengan migrasi
    public $timestamps = false; // Aktifkan timestamps di database, jika diperlukan
    protected $fillable = [
        'user_id',
        'n',
        'n_minus_1',
        'n_minus_2',
        'waktu_mulai_pergantian',
        'waktu_selesai_pergantian',
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected static function booted()
    {
        static::creating(function ($model) {
            // Set the your_timestamp_column to 1 year ahead of the current time
            $model->waktu_selesai_pergantian = Carbon::now()->addHours(1);
        });
    }
}

