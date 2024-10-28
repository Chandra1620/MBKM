<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\PegawaiHasAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatKehadiranController extends Controller
{
    public function index()
    {
        $kehadiran = PegawaiHasAbsensi::with('user')->where('user_id',Auth::user()->id)->paginate(8);
        return view('pegawai.presensi.riwayat_kehadiran.index', compact('kehadiran'));
    }

    function absence(){
        return response()->json([
            'data'  => PegawaiHasAbsensi::with('user')->where('user_id',Auth::user()->id)->get()
        ]);
    }
}

