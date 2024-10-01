<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\AlamatdanKontak;
use App\Models\Keluarga;
use App\Models\Kepegawaian;
use App\Models\Kependudukan;
use App\Models\Lainlain;
use App\Models\pangkat_golongan;
use App\Models\PegawaiFungsional;
use App\Models\PegawaiHasStruktural;
use App\Models\TandaTangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPegawaiController extends Controller
{
    public function index(){
        $pegawai = User::all();
        // dd($pegawai);
        return view('admin.kepegawaian.data_pegawai.data_pegawai', compact('pegawai'));
    }

    public function detail_pegawai(Request $request, $id)
    {
        // dd($request->input('tahun'));
        $user = User::find($id);
        $kependudukan = Kependudukan::where('user_id', $user->id)->first();
        $keluarga = Keluarga::where('user_id', $user->id)->first();
        $kepegawaian = Kepegawaian::where('user_id', $user->id)->first();
        $alamatdankontak = AlamatdanKontak::where('user_id', $user->id)->first();
        $lainlain = Lainlain::where('user_id', $user->id)->first();
        $pangkatgolongan = pangkat_golongan::where('user_id', $user->id)->first();
        $tandaTangan = TandaTangan::where('user_id', $user->id)->first();

        $pegawaiFungsional = PegawaiFungsional::with('unit_kerja_has_jabatan_fungsional.unitkerja')->where('user_id',$user->id)->first();
        $pegawaiStruktural = PegawaiHasStruktural::with('jabatanStruktural')->where('users_id',$user->id)->first();
    //    dd($pegawaiStruktural);
        $unitkerjaPegawai = "";
        $jabatanFungsionalPegawai = "";
        $jabatanStrukturalPegawai = "";
        if($pegawaiFungsional){
            $unitkerjaPegawai = $pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unitkerja->name;
            $jabatanFungsionalPegawai = $pegawaiFungsional->unit_kerja_has_jabatan_fungsional->name;
        }
        if($pegawaiStruktural){
            if($pegawaiStruktural->jabatanStruktural){
                $jabatanStrukturalPegawai = $pegawaiStruktural->jabatanStruktural->name;

            }
        }

        
        // dd($pegawaiFungsional);
        //  dd($kepegawaian);
        return view('admin.kepegawaian.data_pegawai.detail_pegawai', [
            'user' => $user,
            'kependudukan' => $kependudukan,
            'keluarga' => $keluarga,
            'kepegawaian' => $kepegawaian,
            'alamatdankontak' => $alamatdankontak,
            'lainlain'=>$lainlain,
            'pangkat'=>$pangkatgolongan,
            'tandaTangan' => $tandaTangan,
            'unitkerjaPegawai' => $unitkerjaPegawai,
            'jabatanFungsionalPegawai' => $jabatanFungsionalPegawai,
            'jabatanStrukturalPegawai' => $jabatanStrukturalPegawai
        ]);
    }

}
