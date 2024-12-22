<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\JenisCuti;
use App\Models\PegawaiFungsional;
use App\Models\PerizinanCuti;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ManualPerizinanController extends Controller
{
    public function index()
    {
        $perizinan = PerizinanCuti::latest()->get();
        return view('pegawai.perizinan_manual.index', compact('perizinan'));
    }


    public function create()
    {
        $jenisCuti = JenisCuti::all(); // Ambil data jenis cuti
        $pegawai = User::select('id', 'name')->get(); // Ambil data pegawai
        $unitKerja = \App\Models\UnitKerja::all(); // Ambil data unit kerja

        // Kirim data ke view
        return view('pegawai.perizinan_manual.create', compact('jenisCuti', 'pegawai', 'unitKerja'));
    }



    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'unit_kerja_id' => 'required|integer',
    //         'alasan' => 'required|string|max:255',
    //         'alamat_selama_cuti' => 'required|string|max:255',
    //         'no_telp_bisa_dihubungi' => 'nullable|string|max:255',
    //         'jenis_cuti_id' => 'required|integer',
    //         'tgl_mulai' => 'required|date',
    //         'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
    //         // 'file_pendukung' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
    //     ]);

    //     // Upload file pendukung jika ada
    //     // $filePendukung = null;
    //     // if ($request->hasFile('file_pendukung')) {
    //     //     $filePendukung = $request->file('file_pendukung')->store('file_pendukung', 'public');
    //     // }

    //     PerizinanCuti::create([
    //         'user_id' => auth()->id(),
    //         'unit_kerja_id' => $request->unit_kerja_id,
    //         'alasan' => $request->alasan,
    //         'alamat_selama_cuti' => $request->alamat_selama_cuti,
    //         'no_telp_bisa_dihubungi' => $request->no_telp_bisa_dihubungi,
    //         'jenis_cuti_id' => $request->jenis_cuti_id,
    //         'tgl_mulai' => $request->tgl_mulai,
    //         'tgl_selesai' => $request->tgl_selesai,
    //         'status' => 'approved',
    //         'keputusan_pejabat_berwenang' => 'disetujui', // Set otomatis disetujui
    //         // 'file_pendukung' => $filePendukung,
    //     ]);

    //     return redirect()->route('perizinan-manual.index')->with('success', 'Cuti berhasil diajukan!');
    // }


    public function store(Request $request)
    {
        // Validasi Input
        $attrs = $request->validate([
            'alasan' => 'required|string',
            'alamat_selama_cuti' => 'required|string',
            'jenis_cuti' => 'required|exists:jenis_cutis,id',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'no_telp_bisa_dihubungi' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'unit_kerja_id' => 'required|exists:unit_kerjas,id',
        ]);

        // Hitung jumlah hari cuti yang diajukan
        $jumlahHariCuti = Carbon::parse($attrs['tgl_selesai'])->diffInDays(Carbon::parse($attrs['tgl_mulai'])) + 1;

        // Ambil data sisa cuti pengguna
        $sisaCuti = \App\Models\CutiSisa::where('user_id', $attrs['user_id'])->first();

        if (!$sisaCuti) {
            return redirect()->route('perizinan-manual.index')
                ->with('error', 'Data sisa cuti pengguna tidak ditemukan.');
        }

        // Cek ketersediaan cuti
        $totalSisaCuti = $sisaCuti->n + $sisaCuti->n_minus_1 + $sisaCuti->n_minus_2;

        if ($jumlahHariCuti > $totalSisaCuti) {
            return redirect()->route('perizinan-manual.index')
                ->with('error', 'Jumlah hari cuti melebihi sisa cuti yang tersedia.');
        }

        // Prioritaskan pengurangan cuti tahun N, lalu N-1, lalu N-2
        $hariCutiTersisa = $jumlahHariCuti;

        if ($hariCutiTersisa <= $sisaCuti->n) {
            $sisaCuti->n -= $hariCutiTersisa;
        } else {
            $hariCutiTersisa -= $sisaCuti->n;
            $sisaCuti->n = 0;

            if ($hariCutiTersisa <= $sisaCuti->n_minus_1) {
                $sisaCuti->n_minus_1 -= $hariCutiTersisa;
            } else {
                $hariCutiTersisa -= $sisaCuti->n_minus_1;
                $sisaCuti->n_minus_1 = 0;

                $sisaCuti->n_minus_2 -= $hariCutiTersisa;
            }
        }

        $sisaCuti->save();

        // Simpan Data Cuti
        $perizinanCuti = new PerizinanCuti();
        $perizinanCuti->user_id = $attrs['user_id'];
        $perizinanCuti->unit_kerja_id = $attrs['unit_kerja_id'];
        $perizinanCuti->alasan = $attrs['alasan'];
        $perizinanCuti->alamat_selama_cuti = $attrs['alamat_selama_cuti'];
        $perizinanCuti->jenis_cuti_id = $attrs['jenis_cuti'];
        $perizinanCuti->tgl_mulai = $attrs['tgl_mulai'];
        $perizinanCuti->tgl_selesai = $attrs['tgl_selesai'];
        $perizinanCuti->no_telp_bisa_dihubungi = $attrs['no_telp_bisa_dihubungi'];

        // Set Status dan Keputusan Otomatis
        $perizinanCuti->status = 'approved';
        $perizinanCuti->keputusan_pejabat_berwenang = 'disetujui';

        $perizinanCuti->save();

        return redirect()->route('pegawai.perizinan-manual.index')
            ->with('success', 'Pengajuan cuti berhasil diajukan.');
    }



    public function destroy($id)
    {
        $izin = PerizinanCuti::findOrFail($id);
        $izin->delete();

        return redirect()->route('perizinan-manual.index')->with('success', 'Cuti berhasil dihapus!');
    }
}
