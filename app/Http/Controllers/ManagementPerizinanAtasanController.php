<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class ManagementPerizinanAtasanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // dd($user->id);

        $perizinan = DB::table('perizinan_cutis')
            ->join('users', 'users.id', '=', 'perizinan_cutis.user_id')
            ->join('atasan_langsung', 'atasan_langsung.user_id', '=', 'perizinan_cutis.user_id')
            ->where('atasan_langsung.user_has_atasan_id', $user->id)
            ->where('perizinan_cutis.verifikasi_admin', "!=", null)
            ->select('perizinan_cutis.*', 'users.*', 'atasan_langsung.*', 'perizinan_cutis.id AS id_perizinan', 'atasan_langsung.user_has_atasan_id AS id_atasan')
            ->paginate(8);

        // dd($perizinan);
        return view("atasan.index", compact('perizinan'));
    }
    public function verifikasi(Request $request, $id, $id_atasan)
    {
        // dd($id_atasan);
        /**
         * Verifikasi perizinan cuti atasan langsung
         */

        $request->validate([
            'ttd_atasan' => 'required|mimes:png,image/x-png|max:2048'
        ]);

        $user = Auth::user();

        DB::table("perizinan_cutis")
            ->where("id", "=", $id)
            ->update(["pertimbangan_atasan_langsung" => "disetujui"]);

        /**
         * Seleksi Wadir berdasarkan atasan
         */
        $getWadir = DB::table("atasan_langsung")
            ->where("user_id", "=", $id_atasan)
            ->get()
            ->first();

        // dd($getWadir->user_has_atasan_id);

        DB::table("perizinan_cuti_to_wadirs")
            ->insert([
                "perizinan_cuti_id" => $id,
                "wadir_id" => $getWadir->user_has_atasan_id
            ]);

        if ($request->hasFile('ttd_atasan')) {
            $file = $request->file('ttd_atasan');
            $fileName = 'ttd_atasan_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/ttd_atasan'), $fileName);

            DB::table("perizinan_cutis")
                ->where("id", "=", $id)
                ->update(["ttd_atasan" => "uploads/ttd_atasan/$fileName"]);
            ;
        }

        return redirect()->route("management-perizinan-atasan.index");
    }
    public function stream($id)
    {

        // dd($id);

        $results = DB::table('riwayat_fungsionals')
            ->join('unit_kerja_has_jabatan_fungsionals', 'riwayat_fungsionals.unit_kerja_has_jabatan_fungsional_id', '=', 'unit_kerja_has_jabatan_fungsionals.id')
            ->join("unit_kerjas", "unit_kerja_has_jabatan_fungsionals.unit_kerja_id", "=", "unit_kerjas.id")
            ->select('riwayat_fungsionals.*', 'unit_kerja_has_jabatan_fungsionals.name AS jabatan', 'unit_kerjas.name AS unit_kerja')
            ->where("riwayat_fungsionals.user_id", "=", $id)
            ->get()
            ->first();

        $results2 = DB::table('perizinan_cutis')
            ->join('jenis_cutis', 'jenis_cutis.id', '=', 'perizinan_cutis.jenis_cuti_id')
            ->where('perizinan_cutis.user_id', '=', $id)
            ->get()
            ->first();

        $results3 = DB::table('users')
            ->join("cuti_sisas", "cuti_sisas.user_id", "=", "users.id")
            ->where('users.id', '=', $id)
            ->get()
            ->first();
        // dd($user->id);
        // dd($results2);

        $results4 = DB::table("atasan_langsung")
            ->join("users", "users.id", "=", "atasan_langsung.user_id")
            ->where('atasan_langsung.user_id', '=', $id)
            ->get()
            ->first();

        // dd($results4->user_has_atasan_id);

        $results5 = DB::table("users")
            ->where("id", "=", $results4->user_has_atasan_id)
            ->get()
            ->first();

        // dd($results5);

        $start = Carbon::parse($results2->tgl_mulai);
        $end = Carbon::parse($results2->tgl_selesai);

        $totalDays = $start->diffInDays($end);

        $data = [
            "name" => $results3->name,
            'nip' => $results3->nip,
            "unit_kerja" => $results->unit_kerja,
            "tanggal_dibuat" => Carbon::parse($results2->created_at)->format('j F Y'),
            'jabatan_fungsional' => $results->jabatan,
            'jenis_cuti' => $results2->jenis_cuti_id,
            'alasan' => $results2->alasan,
            'alamat_cuti' => $results2->alamat_selama_cuti,
            'hari_total' => $totalDays,
            "no_telp" => $results2->no_telp_bisa_dihubungi,
            'tgl_mulai' => Carbon::createFromFormat('Y-m-d', $results2->tgl_mulai)->format('d-m-Y'),
            'tgl_selesai' => Carbon::createFromFormat('Y-m-d', $results2->tgl_selesai)->format('d-m-Y'),
            // 'images' => public_path('assets/test/pngwing.com.png'),
            'icon' => public_path('assets/icon/check.svg'),
            "n" => $results3->n,
            "n_minus_1" => $results3->n_minus_1,
            "n_minus_2" => $results3->n_minus_2,
            "ttd_pegawai" => $results2->ttd_pegawai,
            "atasan_name" => $results5->name,
            "atasan_nip" => $results5->nip,
            "atasan_disetujui" => $results2->pertimbangan_atasan_langsung,
            "ttd_atasan_langsung" => $results2->ttd_atasan,
        ];

        // dd($results2);

        $pdf = FacadePdf::loadView('pdf.test', data: $data);
        return $pdf->stream('Form Cuti.pdf');
    }
    public function ditolak($id)
    {

    }
}
