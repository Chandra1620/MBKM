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
            ->orderBy("perizinan_cutis.id", "DESC")
            ->paginate(8);

        // dd($perizinan);

        return view('management_perizinan_lanjutan.index', compact('perizinan'));
    }
    public function verifikasi(Request $request, $id_perizinan, $id_pegawai)
    {

        // dd("ok");
        // dd($id_perizinan);
        // dd($id_atasan);
        // dd($id_pegawai);
        /**
         * Verifikasi perizinan cuti atasan langsung
         */

        $request->validate([
            'ttd_wadir' => 'required|mimes:png,image/x-png|max:2048'
        ]);

        $user = Auth::user();

        DB::transaction(function () use ($id_perizinan, $id_pegawai, $request, $user) {
            DB::table("perizinan_cutis")
                ->where("id", "=", $id_perizinan)
                ->update(["keputusan_pejabat_berwenang" => "disetujui"]);

            if ($request->hasFile('ttd_wadir')) {
                $file = $request->file('ttd_wadir');
                $fileName = 'ttd_wadir_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/ttd_wadir'), $fileName);

                DB::table("perizinan_cutis")
                    ->where("id", "=", $id_perizinan)
                    ->update(["ttd_wadir" => "uploads/ttd_wadir/$fileName"]);
                ;
            }

            $checkJenisCuti = DB::table("perizinan_cutis")
                ->where("id", "=", $id_perizinan)
                ->first();

            // Decrement Cuti
            if ($checkJenisCuti && $checkJenisCuti->jenis_cuti_id == 1) {
                DB::table("cuti_sisas")
                    ->where("user_id", "=", $id_pegawai)
                    ->decrement("n", 1);
            }
        });

        return redirect()->route("management-perizinan-lanjutan.index");
    }
}
