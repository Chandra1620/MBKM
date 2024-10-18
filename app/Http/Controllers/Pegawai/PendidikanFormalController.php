<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\PendidikanFormal;
use App\Models\SuratKeputusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendidikanFormalController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // $surattugas = SuratKeputusan::with('penerima.user')
        //     ->whereHas('penerima', function ($query) use ($user) {
        //         $query->where('user_id', $user->id);
        //     })
        //     ->paginate(8);
        // $pendidikan = PendidikanFormal::where('user_id', $user->id)->paginate(8);
        // dd($pendidikan);
        $pendidikan = PendidikanFormal::all();

        return view('pegawai.kualifikasi.pendidikan_formal', compact('pendidikan'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari permintaan
        $attrs = $request->validate([
            'nama_perguruan_tinggi' => 'required',
            'program_studi' => 'required',
            'gelar_akademik' => 'required',
            'bidang_studi' => 'required',
            'tahun_masuk' => 'required|digits:4',
            'tahun_lulus' => 'required|digits:4',
            'tanggal_kelulusan' => 'required|date',
            'nim' => 'required',
            'jumlah_sks_kelulusan' => 'required|integer',
            'ipk_kelulusan' => 'required|numeric',
            'nomor_ijazah' => 'required',
            'jumlah_semester_tempuh' => 'required|integer',
            'file_pendukung' => 'required', // Menggunakan validasi file
            'nomor_sk_penyetaraan' => 'nullable', // Field opsional
            'tanggal_sk_penyetaraan' => 'nullable|date', // Field opsional
            'judul_tesis' => 'nullable|string', // Field opsional
        ]);

        // Membuat data pendidikan formal baru
        PendidikanFormal::create([
            'user_id' => Auth::id(), // Menggunakan Auth::id() untuk mendapatkan ID pengguna saat ini
            'nama_perguruan_tinggi' => $attrs['nama_perguruan_tinggi'],
            'program_studi' => $attrs['program_studi'],
            'gelar_akademik' => $attrs['gelar_akademik'],
            'bidang_studi' => $attrs['bidang_studi'],
            'tahun_masuk' => $attrs['tahun_masuk'],
            'tahun_lulus' => $attrs['tahun_lulus'],
            'tanggal_kelulusan' => $attrs['tanggal_kelulusan'],
            'nim' => $attrs['nim'],
            'jumlah_sks_kelulusan' => $attrs['jumlah_sks_kelulusan'],
            'ipk_kelulusan' => $attrs['ipk_kelulusan'],
            'nomor_ijazah' => $attrs['nomor_ijazah'],
            'jumlah_semester_tempuh' => $attrs['jumlah_semester_tempuh'],
            'file_pendukung' => $attrs['file_pendukung'],
            'nomor_sk_penyetaraan' => $request->nomor_sk_penyetaraan,
            'tanggal_sk_penyetaraan' => $request->tanggal_sk_penyetaraan,
            'judul_tesis' => $request->judul_tesis,
        ]);

        return redirect()->route('pendidikanformal.index')->with('success', 'Berhasil menambah data pendidikan formal.');
    }

    public function update(Request $request, $id)
    {
        // TOTAL DATA 16
        // YG WAJIB 10

        // dd($request->all());
        $attrs = $request->validate([
            'nama_perguruan_tinggi' => 'required',
            'program_studi' => 'required',
            'gelar_akademik' => 'required',
            'bidang_studi' => 'required',
            'tahun_masuk' => 'required|max:4|min:4',
            'tahun_lulus' => 'required|max:4|min:4',
            'tanggal_kelulusan' => 'required',
            'nim' => 'required',
            'jumlah_sks_kelulusan' => 'required',
            'ipk_kelulusan' => 'required',
            'nomor_ijazah' => 'required',
            'jumlah_semester_tempuh' => 'required',
            'file_pendukung' => 'required',
        ]);

        $pendidikan = PendidikanFormal::find($id);

        // dd($pendidikan);

        // if (!$pendidikan) {
        //     return redirect()->route('pendidikanformal.index')->with('error', 'gagal');
        // }
        // if ($pendidikan != 'pengajuan') {
        //     return redirect()->route('pendidikanformal.index')->with('error', 'gagal');
        // }

        $pendidikan->nama_perguruan_tinggi = $attrs['nama_perguruan_tinggi'];
        $pendidikan->program_studi = $attrs['program_studi'];
        $pendidikan->bidang_studi = $attrs['bidang_studi'];
        $pendidikan->tahun_masuk = $attrs['tahun_masuk'];
        $pendidikan->tahun_lulus = $attrs['tahun_lulus'];
        $pendidikan->tanggal_kelulusan = $attrs['tanggal_kelulusan'];
        $pendidikan->nim = $attrs['nim'];
        $pendidikan->jumlah_sks_kelulusan = $attrs['jumlah_sks_kelulusan'];
        $pendidikan->gelar_akademik = $attrs['gelar_akademik'];
        $pendidikan->ipk_kelulusan = $attrs['ipk_kelulusan'];
        $pendidikan->nomor_ijazah = $attrs['nomor_ijazah'];
        $pendidikan->jumlah_semester_tempuh = $attrs['jumlah_semester_tempuh'];
        $pendidikan->nomor_sk_penyetaraan = $request->nomor_sk_penyetaraan;
        $pendidikan->judul_tesis = $request->judul_tesis;
        $pendidikan->file_pendukung = $attrs['file_pendukung'];

        $pendidikan->save();

        return redirect()->route('pendidikanformal.index')->with('success', 'berhasil mengubah data pendidikan formal');
    }

    // app/Http/Controllers/PendidikanFormalController.php
    public function info($id)
    {
        $pendidikan = PendidikanFormal::find($id);

        if (!$pendidikan) {
            return redirect()->route('pendidikanformal')->with('error', 'Data tidak ditemukan');
        }

        return view('pegawai.kualifikasi.pendidikan_formal_info', compact('pendidikan'));
    }

    public function edit($id)
    {
        // Mencari data PendidikanFormal berdasarkan ID
        $pendidikan = PendidikanFormal::find($id);

        // Jika data tidak ditemukan, redirect ke halaman index dengan pesan error
        if (!$pendidikan) {
            return redirect()->route('pendidikanformal.index')->with('error', 'Data pendidikan tidak ditemukan.');
        }

        // Mengembalikan tampilan edit dengan data pendidikan yang ditemukan
        return view('pegawai.kualifikasi.pendidikan_formal_edit', compact('pendidikan'));
    }

    public function delete(Request $request, $id)
    {
        $pendidikanFormal = PendidikanFormal::find($id);
        if (!$pendidikanFormal) {
            return redirect()->route('pendidikanformal.index')->with('error', 'gagal');
        }

        $pendidikanFormal->delete();
        return redirect()->route('pendidikanformal.index')->with('success', 'berhasil');
    }
}
