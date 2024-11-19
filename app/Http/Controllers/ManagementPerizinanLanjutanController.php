<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagementPerizinanLanjutanController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        // dd($user->id);

        $perizinan = DB::table("perizinan_cuti_to_wadirs")
            ->join("users as wadir_user", "wadir_user.id", "=", "perizinan_cuti_to_wadirs.wadir_id")
            ->join("perizinan_cutis", "perizinan_cutis.id", "=", "perizinan_cuti_to_wadirs.perizinan_cuti_id")
            ->join("users as applicant_user", "applicant_user.id", "=", "perizinan_cutis.user_id")
            ->join("jenis_cutis", "jenis_cutis.id", "=", "perizinan_cutis.jenis_cuti_id")
            ->where("perizinan_cuti_to_wadirs.wadir_id", "=", $user->id)
            ->select([
                "perizinan_cuti_to_wadirs.*",
                "wadir_user.name as wadir_name",
                "applicant_user.name as applicant_name",
                "applicant_user.nip as applicant_nip",
                "jenis_cutis.name as cuti_name",
                "perizinan_cutis.*"
            ])
            ->paginate(8);

        // dd($perizinan);

        return view('management_perizinan_lanjutan.index', compact('perizinan'));
    }
    public function verifikasi($id_perizinan) {
        dd($id_perizinan);
    }
}
