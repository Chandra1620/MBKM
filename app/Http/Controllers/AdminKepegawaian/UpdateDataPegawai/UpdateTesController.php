<?php

namespace App\Http\Controllers\AdminKepegawaian\UpdateDataPegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tes;


class UpdateTesController extends Controller
{
    public function index() {
        $tes = Tes::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.kepegawaian.update_pegawai.kompetensi.tes', compact('tes'));
    }
    public function verifikasi($id){
        $tes = Tes::find($id);
        
        if (!$tes) {
            return redirect()->route('update-tes.index')->with('error', 'gagal');
        }
        if($tes->status != 'pengajuan'){
            return redirect()->route('update-tes.index')->with('error', 'gagal');
        }

        $tes->status = 'diverifikasi';
        $tes->save();
        return redirect()->route('update-tes.index')->with('siccess', 'berhasil');
    }
    public function ditolak($id){
        $tes = Tes::find($id);
        
        if (!$tes) {
            return redirect()->route('update-tes.index')->with('error', 'gagal');
        }
        if($tes->status != 'pengajuan'){
            return redirect()->route('update-tes.index')->with('error', 'gagal');
        }

        $tes->status = 'ditolak';
        $tes->save();
        return redirect()->route('update-tes.index')->with('siccess', 'berhasil');
    }
}
