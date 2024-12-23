<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\JenisCuti;
use App\Models\PegawaiFungsional;
use App\Models\PerizinanCuti;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // dd($request->alasan);
        // dd($request->alamat_selama_cuti);
        // dd($request->jenis_cuti);
        // dd($request->tgl_mulai);
        // dd($request->tgl_selesai);
        // dd($request->no_telp_bisa_dihubungi);
        // dd($request->user_id);
        // dd($request->unit_kerja_id);

        // Validasi Input
//         $attrs = $request->validate([
//             'alasan' => 'required|string',
//             'alamat_selama_cuti' => 'required|string',
//             'jenis_cuti' => 'required|exists:jenis_cutis,id',
//             'tgl_mulai' => 'required|date',
//             'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
//             'no_telp_bisa_dihubungi' => 'required|string',
//             'user_id' => 'required|exists:users,id',
//             'unit_kerja_id' => 'required|exists:unit_kerjas,id',
//         ]);
// // 
//         // dd($attrs);

//         // Hitung jumlah hari cuti yang diajukan
//         $jumlahHariCuti = Carbon::parse($attrs['tgl_selesai'])->diffInDays(Carbon::parse($attrs['tgl_mulai'])) + 1;

//         // Ambil data sisa cuti pengguna
//         $sisaCuti = \App\Models\CutiSisa::where('user_id', $attrs['user_id'])->first();

//         if (!$sisaCuti) {
//             return redirect()->route('perizinan-manual.index')
//                 ->with('error', 'Data sisa cuti pengguna tidak ditemukan.');
//         }

//         // Cek ketersediaan cuti
//         $totalSisaCuti = $sisaCuti->n + $sisaCuti->n_minus_1 + $sisaCuti->n_minus_2;

//         if ($jumlahHariCuti > $totalSisaCuti) {
//             return redirect()->route('perizinan-manual.index')
//                 ->with('error', 'Jumlah hari cuti melebihi sisa cuti yang tersedia.');
//         }

//         // Prioritaskan pengurangan cuti tahun N, lalu N-1, lalu N-2
//         $hariCutiTersisa = $jumlahHariCuti;

//         if ($hariCutiTersisa <= $sisaCuti->n) {
//             $sisaCuti->n -= $hariCutiTersisa;
//         } else {
//             $hariCutiTersisa -= $sisaCuti->n;
//             $sisaCuti->n = 0;

//             if ($hariCutiTersisa <= $sisaCuti->n_minus_1) {
//                 $sisaCuti->n_minus_1 -= $hariCutiTersisa;
//             } else {
//                 $hariCutiTersisa -= $sisaCuti->n_minus_1;
//                 $sisaCuti->n_minus_1 = 0;

//                 $sisaCuti->n_minus_2 -= $hariCutiTersisa;
//             }
//         }

//         $sisaCuti->save();

//         // Simpan Data Cuti
//         $perizinanCuti = new PerizinanCuti();
//         $perizinanCuti->user_id = $attrs['user_id'];
//         $perizinanCuti->unit_kerja_id = $attrs['unit_kerja_id'];
//         $perizinanCuti->alasan = $attrs['alasan'];
//         $perizinanCuti->alamat_selama_cuti = $attrs['alamat_selama_cuti'];
//         $perizinanCuti->jenis_cuti_id = $attrs['jenis_cuti'];
//         $perizinanCuti->tgl_mulai = $attrs['tgl_mulai'];
//         $perizinanCuti->tgl_selesai = $attrs['tgl_selesai'];
//         $perizinanCuti->no_telp_bisa_dihubungi = $attrs['no_telp_bisa_dihubungi'];

//         // Set Status dan Keputusan Otomatis
//         $perizinanCuti->perizinan_admin_pegawai = 'disetujui';

//         $perizinanCuti->save();

//         return redirect()->route('perizinan-manual.index')
//             ->with('success', 'Pengajuan cuti berhasil diajukan.');

        // Validasi Input
        $attrs = $request->validate([
            'alasan' => 'required',
            'alamat_selama_cuti' => 'required',
            'jenis_cuti' => 'required|exists:jenis_cutis,id',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'no_telp_bisa_dihubungi' => 'required',
            'ttd_pegawai' => 'required|mimes:png,image/x-png|max:2048',
            'user_id' => 'required|exists:users,id',
        ]);

        $user = $request->user_id;
        
        $pegawaiFungsional = PegawaiFungsional::with('unit_kerja_has_jabatan_fungsional.unitkerja')
            ->where('user_id', "=", $user)
            ->first();

        if (!$pegawaiFungsional) {
            return redirect()
                ->route('perizinan-cuti.index')
                ->with('error', 'Dosen atau Pegawai Harus Memiliki Jabatan Fungsional terlebih dahulu');
        }

        // Hitung Total Cuti Tahunan
        $year = now()->year;
        $totalRiwayatCuti = PerizinanCuti::where('user_id', $user)
            ->whereYear('tgl_mulai', $year)
            ->count();

        $izinCutiSisa = DB::table("cuti_sisas")
            ->join("users", "cuti_sisas.user_id", "=", "users.id")
            ->where('cuti_sisas.user_id', $user)
            ->select(["cuti_sisas.*"])
            ->get()
            ->first();

        // dd($izinCutiSisa);

        if ($izinCutiSisa->n == 0) {
            return redirect()
                ->route('perizinan-cuti.index')
                ->with('error', 'Anda Sudah Mengambil Jatah Cuti');
        }

        // Simpan Data Cuti
        $perizinanCuti = new PerizinanCuti();
        $perizinanCuti->user_id = $user;
        $perizinanCuti->unit_kerja_id = $pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unitkerja->id;
        $perizinanCuti->alasan = $attrs['alasan'];
        $perizinanCuti->alamat_selama_cuti = $attrs['alamat_selama_cuti'];
        $perizinanCuti->jenis_cuti_id = $attrs['jenis_cuti'];
        $perizinanCuti->tgl_mulai = $attrs['tgl_mulai'];
        $perizinanCuti->tgl_selesai = $attrs['tgl_selesai'];
        $perizinanCuti->no_telp_bisa_dihubungi = $attrs['no_telp_bisa_dihubungi'];

        // Proses Upload Tanda Tangan
        if ($request->hasFile('ttd_pegawai')) {
            $file = $request->file('ttd_pegawai');
            $fileName = 'ttd_pegawai_' . $user . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/ttd_pegawai'), $fileName);
            $perizinanCuti->ttd_pegawai = 'uploads/ttd_pegawai/' . $fileName;
        }

        $perizinanCuti->save();

        return redirect()->route('perizinan_manual.index')
            ->with('success', 'Pengajuan Cuti berhasil dibuat');
    }



    public function destroy($id)
    {
        $izin = PerizinanCuti::findOrFail($id);
        $izin->delete();

        return redirect()->route('perizinan-manual.index')->with('success', 'Cuti berhasil dihapus!');
    }
}
