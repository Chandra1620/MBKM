<?php

namespace App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai;

use App\Http\Controllers\Controller;
use App\Models\RiwayatFungsional;
use App\Models\RiwayatProfile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function index(){
        $riwayat_fungsional = RiwayatProfile::with(['user'])->orderBy('created_at','desc')->paginate(8);
        // dd($riwayat_fungsional);
        return view('admin.kepegawaian.update_pegawai.profile.profile', compact('riwayat_fungsional'));
    }
    public function verifikasi(Request $request,$id){
        $riwayat_fungsional = RiwayatProfile::find($id);
        
        if (!$riwayat_fungsional) {
            return redirect()->route('update-profile.index')->with('error', 'gagal');
        }
        if($riwayat_fungsional->status != 'pengajuan'){
            return redirect()->route('update-profile.index')->with('error', 'gagal');
        }

        $riwayat_fungsional->status = 'diverifikasi';
        $riwayat_fungsional->save();


        $user = User::find($request->user_id);
        // dd($user);
        $user->nip = $riwayat_fungsional->nip;
        $user->name = $riwayat_fungsional->name;
        $user->email = $riwayat_fungsional->email;
        $user->jenis_kelamin = $riwayat_fungsional->jenis_kelamin;
        $user->tempat_lahir = $riwayat_fungsional->tempat_lahir;
        $user->tanggal_lahir = $riwayat_fungsional->tanggal_lahir;
        $user->nama_ibu = $riwayat_fungsional->nama_ibu;
        $user->photo = $riwayat_fungsional->photo;
        $user->save();
        return redirect()->route('update-profile.index')->with('siccess', 'berhasil');

    }

    public function ditolak(Request $request,$id){
        $riwayat_fungsional = RiwayatProfile::find($id);
        
        if (!$riwayat_fungsional) {
            return redirect()->route('update-profile.index')->with('error', 'gagal');
        }
        if($riwayat_fungsional->status != 'pengajuan'){
            return redirect()->route('update-profile.index')->with('error', 'gagal');
        }

        $riwayat_fungsional->status = 'ditolak';
        $riwayat_fungsional->save();
        return redirect()->route('update-profile.index')->with('siccess', 'berhasil');

    }

    
}
