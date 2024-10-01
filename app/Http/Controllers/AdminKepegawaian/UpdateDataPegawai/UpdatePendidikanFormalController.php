<?php

namespace App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai;

use App\Http\Controllers\Controller;
use App\Models\PendidikanFormal;
use Illuminate\Http\Request;

class UpdatePendidikanFormalController extends Controller
{
    public function index(){
        $pendidikan = PendidikanFormal::with('user')->paginate(8);
        // dd($pendidikan);

        return view('admin.kepegawaian.update_pegawai.kualifikasi.pendidikan_formal', compact('pendidikan'));
    }
    public function verifikasi($id){
        $pendidikanformal = PendidikanFormal::find($id);
        
        if (!$pendidikanformal) {
            return redirect()->route('update-pendidikanformal.index')->with('error', 'gagal');
        }
        if($pendidikanformal->status != 'pengajuan'){
            return redirect()->route('update-pendidikanformal.index')->with('error', 'gagal');
        }

        $pendidikanformal->status = 'diverifikasi';
        $pendidikanformal->save();
        return redirect()->route('update-pendidikanformal.index')->with('siccess', 'berhasil');
    }
    public function ditolak($id){
        $pendidikanformal = PendidikanFormal::find($id);
        
        if (!$pendidikanformal) {
            return redirect()->route('update-pendidikanformal.index')->with('error', 'gagal');
        }
        if($pendidikanformal->status != 'pengajuan'){
            return redirect()->route('update-pendidikanformal.index')->with('error', 'gagal');
        }

        $pendidikanformal->status = 'ditolak';
        $pendidikanformal->save();
        return redirect()->route('update-pendidikanformal.index')->with('siccess', 'berhasil');
    }
}
