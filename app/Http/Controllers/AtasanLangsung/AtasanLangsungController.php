<?php

namespace App\Http\Controllers\AtasanLangsung;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AtasanLangsungController extends Controller
{
    public function index()
    {
        $atasan = User::where('role_khusus_2', "=", 'Atasan Langsung')->paginate(8);
        return view('admin.system.atasan_langsung.index', compact('atasan'));
    }
}
