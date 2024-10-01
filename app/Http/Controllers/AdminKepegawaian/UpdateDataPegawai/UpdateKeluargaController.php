<?php

namespace App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\RiwayatKeluarga;
use Illuminate\Http\Request;

class UpdateKeluargaController extends Controller
{
    public function index(){
        $riwayat_fungsional = RiwayatKeluarga::with(['user'])->orderBy('created_at','desc')->paginate(8);
        // dd($riwayat_fungsional);
        return view('admin.kepegawaian.update_pegawai.profile.keluarga', compact('riwayat_fungsional'));
    }
    public function verifikasi(Request $request,$id){
        // dd('helo');
        $riwayat_fungsional = RiwayatKeluarga::find($id);
        
        if (!$riwayat_fungsional) {
        // dd('helo');

            return redirect()->route('update-keluarga.index')->with('error', 'gagal');
        }
        if($riwayat_fungsional->status != 'pengajuan'){
        // dd('helo 2');

            return redirect()->route('update-keluarga.index')->with('error', 'gagal');
        }

        $riwayat_fungsional->status = 'diverifikasi';
        $riwayat_fungsional->save();

        // dd('o');
        $user = Keluarga::where('user_id',$request->user_id)->first();
        // dd($user);
        $user->status_perkawinan = $riwayat_fungsional->status_perkawinan;
        $user->nama_pasangan = $riwayat_fungsional->nama_pasangan;
        $user->pekerjaan_pasangan = $riwayat_fungsional->pekerjaan_pasangan;
        $user->file_pendukung = $riwayat_fungsional->file_pendukung;
        $user->save();
        return redirect()->route('update-keluarga.index')->with('siccess', 'berhasil');

    }

    public function ditolak(Request $request,$id){
        $riwayat_fungsional = RiwayatKeluarga::find($id);
        
        if (!$riwayat_fungsional) {
            return redirect()->route('update-keluarga.index')->with('error', 'gagal');
        }
        if($riwayat_fungsional->status != 'pengajuan'){
            return redirect()->route('update-profile.index')->with('error', 'gagal');
        }

        $riwayat_fungsional->status = 'ditolak';
        $riwayat_fungsional->save();
        return redirect()->route('update-keluarga.index')->with('siccess', 'berhasil');

    }
}
