<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtasanLangsung extends Model
{
    use HasFactory;

    protected $table = 'atasan_langsung';
    protected $fillable = [
        "user_id",
        "user_has_atasan_id"
    ];
}
