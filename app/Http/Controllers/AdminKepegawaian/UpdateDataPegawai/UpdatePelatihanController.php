<?php

namespace App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai;

use App\Http\Controllers\Controller;
use App\Models\Diklat;
use Illuminate\Http\Request;

class UpdatePelatihanController extends Controller
{
    public function index(){
        $diklat = Diklat::paginate(8);
        // dd($diklat);
        return view('admin.kepegawaian.update_pegawai.kualifikasi.pelatihan', compact('diklat'));
    }
    public function verifikasi($id){
        $pelatihan = Diklat::find($id);
        
        if (!$pelatihan) {
            return redirect()->route('update-pelatihan.index')->with('error', 'gagal');
        }
        if($pelatihan->status != 'pengajuan'){
            return redirect()->route('update-pelatihan.index')->with('error', 'gagal');
        }

        $pelatihan->status = 'diverifikasi';
        $pelatihan->save();
        return redirect()->route('update-pelatihan.index')->with('siccess', 'berhasil');
    }
    public function ditolak($id){
        $pelatihan = Diklat::find($id);
        
        if (!$pelatihan) {
            return redirect()->route('update-pelatihan.index')->with('error', 'gagal');
        }
        if($pelatihan->status != 'pengajuan'){
            return redirect()->route('update-pelatihan.index')->with('error', 'gagal');
        }

        $pelatihan->status = 'ditolak';
        $pelatihan->save();
        return redirect()->route('update-pelatihan.index')->with('siccess', 'berhasil');
    }
}
