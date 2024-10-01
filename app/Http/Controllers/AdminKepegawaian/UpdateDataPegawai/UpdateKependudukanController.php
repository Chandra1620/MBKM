<?php

namespace App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai;

use App\Http\Controllers\Controller;
use App\Models\Kependudukan;
use App\Models\RiwayatKependudukan;
use App\Models\RiwayatProfile;
use Illuminate\Http\Request;

class UpdateKependudukanController extends Controller
{
    public function index(){
        $riwayat_fungsional = RiwayatKependudukan::with(['user'])->orderBy('created_at','desc')->paginate(8);
        // dd($riwayat_fungsional);
        return view('admin.kepegawaian.update_pegawai.profile.kependudukan', compact('riwayat_fungsional'));
    }
    public function verifikasi(Request $request,$id){
        // dd('helo');
        $riwayat_fungsional = RiwayatKependudukan::find($id);
        
        if (!$riwayat_fungsional) {
        // dd('helo');

            return redirect()->route('update-kependudukan.index')->with('error', 'gagal');
        }
        if($riwayat_fungsional->status != 'pengajuan'){
        // dd('helo 2');

            return redirect()->route('update-kependudukan.index')->with('error', 'gagal');
        }

        $riwayat_fungsional->status = 'diverifikasi';
        $riwayat_fungsional->save();

        // dd('o');
        $user = Kependudukan::where('user_id',$request->user_id)->first();
        // dd($user);
        $user->nik = $riwayat_fungsional->nik;
        $user->agama = $riwayat_fungsional->agama;
        $user->kewarganegaraan = $riwayat_fungsional->kewarganegaraan;
        $user->file_pendukung = $riwayat_fungsional->file_pendukung;
        $user->save();
        return redirect()->route('update-kependudukan.index')->with('siccess', 'berhasil');

    }

    public function ditolak(Request $request,$id){
        $riwayat_fungsional = RiwayatKependudukan::find($id);
        
        if (!$riwayat_fungsional) {
            return redirect()->route('update-kependudukan.index')->with('error', 'gagal');
        }
        if($riwayat_fungsional->status != 'pengajuan'){
            return redirect()->route('update-profile.index')->with('error', 'gagal');
        }

        $riwayat_fungsional->status = 'ditolak';
        $riwayat_fungsional->save();
        return redirect()->route('update-kependudukan.index')->with('siccess', 'berhasil');

    }
}
