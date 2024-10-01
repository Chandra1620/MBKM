<?php

namespace App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai;

use App\Http\Controllers\Controller;
use App\Models\Lainlain;
use App\Models\Riwayatlainlain;
use Illuminate\Http\Request;

class UpdateLainlainController extends Controller
{
    public function index(){
        $riwayat_fungsional = RiwayatLainlain::with(['user'])->orderBy('created_at','desc')->paginate(8);
        return view('admin.kepegawaian.update_pegawai.profile.lainlain', compact('riwayat_fungsional'));
    }
    public function verifikasi(Request $request,$id){
        // dd('helo');
        $riwayat_fungsional = RiwayatLainlain::find($id);
        
        if (!$riwayat_fungsional) {
        // dd('helo');

            return redirect()->route('update-lainlain.index')->with('error', 'gagal');
        }
        if($riwayat_fungsional->status != 'pengajuan'){
        // dd('helo 2');

            return redirect()->route('update-lainlain.index')->with('error', 'gagal');
        }

        $riwayat_fungsional->status = 'diverifikasi';
        $riwayat_fungsional->save();

        // dd('o');
        $user = Lainlain::where('user_id',$request->user_id)->first();
        // dd($user);
        $user->npwp = $riwayat_fungsional->npwp;
        $user->nama_wajib_pajak = $riwayat_fungsional->nama_wajib_pajak;
        $user->file_pendukung = $riwayat_fungsional->file_pendukung;
        $user->save();
        return redirect()->route('update-lainlain.index')->with('siccess', 'berhasil');

    }

    public function ditolak(Request $request,$id){
        $riwayat_fungsional = RiwayatLainlain::find($id);
        
        if (!$riwayat_fungsional) {
            return redirect()->route('update-lainlain.index')->with('error', 'gagal');
        }
        if($riwayat_fungsional->status != 'pengajuan'){
            return redirect()->route('update-profile.index')->with('error', 'gagal');
        }

        $riwayat_fungsional->status = 'ditolak';
        $riwayat_fungsional->save();
        return redirect()->route('update-lainlain.index')->with('siccess', 'berhasil');

    }
}
