<?php

namespace App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateRiwayatPekerjaanController extends Controller
{
    public function index(){
        $riwayatPekerjaan = RiwayatPekerjaan::where('user_id',Auth::user()->id)->get();
        return view('admin.kepegawaian.update_pegawai.kualifikasi.riwayat_pekerjaan',compact('riwayatPekerjaan'));
    }
    public function verifikasi($id){
        $riwayatpekerjaan = RiwayatPekerjaan::find($id);
        
        if (!$riwayatpekerjaan) {
            return redirect()->route('update-riwayatpekerjaan.index')->with('error', 'gagal');
        }
        if($riwayatpekerjaan->status != 'pengajuan'){
            return redirect()->route('update-riwayatpekerjaan.index')->with('error', 'gagal');
        }

        $riwayatpekerjaan->status = 'diverifikasi';
        $riwayatpekerjaan->save();
        return redirect()->route('update-riwayatpekerjaan.index')->with('siccess', 'berhasil');
    }
    public function ditolak($id){
        $riwayatpekerjaan = RiwayatPekerjaan::find($id);
        
        if (!$riwayatpekerjaan) {
            return redirect()->route('update-riwayatpekerjaan.index')->with('error', 'gagal');
        }
        if($riwayatpekerjaan->status != 'pengajuan'){
            return redirect()->route('update-riwayatpekerjaan.index')->with('error', 'gagal');
        }

        $riwayatpekerjaan->status = 'ditolak';
        $riwayatpekerjaan->save();
        return redirect()->route('update-riwayatpekerjaan.index')->with('siccess', 'berhasil');
    }
}
