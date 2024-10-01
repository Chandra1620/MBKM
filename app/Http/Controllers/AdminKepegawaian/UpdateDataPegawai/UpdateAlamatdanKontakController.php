<?php

namespace App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai;

use App\Http\Controllers\Controller;
use App\Models\AlamatdanKontak;
use App\Models\RiwayatAlamatdanKontak;
use Illuminate\Http\Request;

class UpdateAlamatdanKontakController extends Controller
{
    public function index(){
        $riwayat_fungsional = RiwayatAlamatdanKontak::with(['user'])->orderBy('created_at','desc')->paginate(8);
        return view('admin.kepegawaian.update_pegawai.profile.alamat_dan_kontak', compact('riwayat_fungsional'));
    }
    public function verifikasi(Request $request,$id){
        // dd('helo');
        $riwayat_fungsional = RiwayatAlamatdanKontak::find($id);
        
        if (!$riwayat_fungsional) {
        // dd('helo');

            return redirect()->route('update-alamatdankontak.index')->with('error', 'gagal');
        }
        if($riwayat_fungsional->status != 'pengajuan'){
        // dd('helo 2');

            return redirect()->route('update-alamatdankontak.index')->with('error', 'gagal');
        }

        $riwayat_fungsional->status = 'diverifikasi';
        $riwayat_fungsional->save();

        // dd('o');
        $alamatdankontak = AlamatdanKontak ::where('user_id', $riwayat_fungsional->user_id)->first();
        $alamatdankontak->provinsi = $riwayat_fungsional->provinsi; // clear
        $alamatdankontak->kota = $riwayat_fungsional->kota ; // clear
        $alamatdankontak->kecamatan = $riwayat_fungsional->kecamatan;
        $alamatdankontak->desa_kelurahan = $riwayat_fungsional->desa_kelurahan;
        $alamatdankontak->rt = $riwayat_fungsional->rt;
        $alamatdankontak->rw = $riwayat_fungsional->rw;
        $alamatdankontak->alamat = $riwayat_fungsional->alamat;
        $alamatdankontak->kodepos = $riwayat_fungsional->kodepos;
        $alamatdankontak->no_telp_rumah = $riwayat_fungsional->no_telp_rumah;
        $alamatdankontak->no_hp = $riwayat_fungsional->no_hp;

        $alamatdankontak->update();
        return redirect()->route('update-alamatdankontak.index')->with('siccess', 'berhasil');

    }

    public function ditolak(Request $request,$id){
        $riwayat_fungsional = Riwayatalamatdankontak::find($id);
        
        if (!$riwayat_fungsional) {
            return redirect()->route('update-alamatdankontak.index')->with('error', 'gagal');
        }
        if($riwayat_fungsional->status != 'pengajuan'){
            return redirect()->route('update-profile.index')->with('error', 'gagal');
        }

        $riwayat_fungsional->status = 'ditolak';
        $riwayat_fungsional->save();
        return redirect()->route('update-alamatdankontak.index')->with('siccess', 'berhasil');

    }
}
