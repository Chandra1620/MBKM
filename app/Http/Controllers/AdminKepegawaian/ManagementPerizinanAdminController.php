<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\PerizinanCuti;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagementPerizinanAdminController extends Controller
{
    public function index()
    {
        // $perizinan = DB::table('perizinan_cutis')
        //     ->join('jenis_cutis', 'jenis_cutis.id', '=', 'perizinan_cutis.jenis_cuti_id')
        //     ->join('users', 'users.id', '=', 'perizinan_cutis.user_id')
        //     ->select(
        //         'perizinan_cutis.*',
        //         'jenis_cutis.name as nama_jenis_cuti',  // Nama jenis cuti
        //         'users.name as nama_user'               // Nama user
        //     )
        //     ->paginate(8);
        $perizinan = PerizinanCuti::with(['user', 'jeniscuti'])->paginate(8);
        // dd($perizinan);

        return view('admin.kepegawaian.management_perizinan.index', compact('perizinan'));
    }


    public function verifikasi($id)
    {
        $perizinan = PerizinanCuti::with('unitkerja')->find($id);

        if (!$perizinan) {
            return redirect()->route('management-perizinan.index')->with('error', 'Perizinan tidak ditemukan');
        }
        if ($perizinan->unitkerja->atasan_langsung_id == $perizinan->unitkerja->jabatan_berwenang_id) {
            $perizinan->pertimbangan_atasan_langsung = 'diizinkan';
        }

        $perizinan->verifikasi_admin = Carbon::now();

        // Menyimpan perubahan pada model
        $perizinan->save();

        return redirect()->route('management-perizinan.index')->with('success', 'Perizinan diverifikasi');
    }

    public function ditolak(Request $request)
    {
        dd($request->all());
    }


}
