<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\PerizinanCuti;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ManagementPerizinanAdminController extends Controller
{
    public function index(){
        $perizinan = PerizinanCuti::with(['user','jeniscuti'])->paginate(8);
        return view('admin.kepegawaian.management_perizinan.index', compact('perizinan'));
    }

    
    public function verifikasi($id)
{
    $perizinan = PerizinanCuti::with('unitkerja')->find($id);
    // dd($perizinan);

    if (!$perizinan) {
        return redirect()->route('management-perizinan.index')->with('error', 'Perizinan tidak ditemukan');
    }
    if($perizinan->unitkerja->atasan_langsung_id == 
        $perizinan->unitkerja->jabatan_berwenang_id
        ){
    $perizinan->pertimbangan_atasan_langsung = 'diizinkan'
;
        }

    $perizinan->verifikasi_admin = Carbon::now();

    // Menyimpan perubahan pada model
    $perizinan->save();

    return redirect()->route('management-perizinan.index')->with('success', 'Perizinan diverifikasi');
}


}
