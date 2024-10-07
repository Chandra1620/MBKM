<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatPendidikanController extends Controller
{
    public function index(){

        return view('pegawai.riwayat_pendidikan.index');
    }
}
