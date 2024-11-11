<?php

namespace App\Http\Controllers\AtasanLangsung;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PerizinanCuti;
use Illuminate\Routing\Controller;

class managementperizinanatasanlangsung extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perizinan = PerizinanCuti::with(['user', 'jeniscuti'])->paginate(8);
        return view('atasan_langsung.request_perizinan.management_perizinan.index', compact('perizinan'));
    }

    public function verifikasi($id)
    {
        $perizinan = PerizinanCuti::with('unitkerja')->find($id);

        if (!$perizinan) {
            return redirect()->route('management-perizinan-atasan.index')->with('error', 'Perizinan tidak ditemukan');
        }
        if ($perizinan->unitkerja->atasan_langsung_id == $perizinan->unitkerja->jabatan_berwenang_id) {
            $perizinan->pertimbangan_atasan_langsung = 'diizinkan';
        }

        $perizinan->verifikasi_admin = Carbon::now();

        // Menyimpan perubahan pada model
        $perizinan->save();

        return redirect()->route('management-perizinan-atasan.index')->with('success', 'Perizinan diverifikasi');
    }

    public function ditolak(Request $request)
    {
        dd($request->all());
    }
}
