<?php

namespace App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai;

use App\Http\Controllers\Controller;
use App\Models\Sertifikasi;
use Illuminate\Http\Request;

class UpdateSertifikasiController extends Controller
{
    public function index(){

        $sertifikasi = Sertifikasi::with('user')->orderBy('created_at','desc')->get();
        return view('admin.kepegawaian.update_pegawai.kompetensi.sertifikasi',compact('sertifikasi'));
    }

    public function verifikasi($id){
        $sertifikasi = Sertifikasi::find($id);
        
        if (!$sertifikasi) {
            return redirect()->route('update-sertifikasi.index')->with('error', 'gagal');
        }
        if($sertifikasi->status != 'pengajuan'){
            return redirect()->route('update-sertifikasi.index')->with('error', 'gagal');
        }

        $sertifikasi->status = 'diverifikasi';
        $sertifikasi->save();
        return redirect()->route('update-sertifikasi.index')->with('siccess', 'berhasil');
    }

    public function ditolak($id){
        $sertifikasi = Sertifikasi::find($id);
        
        if (!$sertifikasi) {
            return redirect()->route('update-sertifikasi.index')->with('error', 'gagal');
        }
        if($sertifikasi->status != 'pengajuan'){
            return redirect()->route('update-sertifikasi.index')->with('error', 'gagal');
        }

        $sertifikasi->status = 'ditolak';
        $sertifikasi->save();
        return redirect()->route('update-sertifikasi.index')->with('siccess', 'berhasil');
    }
}
