<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\SuratKeputusan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SKController extends Controller
{

    public function indexSK()
    {
        $user = User::whereIn('role', ['admin-pegawai', 'atasan-langsung', 'wadir', 'pegawai'])->get();
        // dd($user);
        $surat = SuratKeputusan::orderBy('created_at', 'desc')->paginate(8);
        // dd($SuratKeputusan);
        return view('pegawai.kegiatan.surat_keputusan', compact(['surat', 'user']));
    }

    public function downloadFile($id)
    {
        $user = Auth::user();
        $surat = SuratKeputusan::findOrFail($id);

        // Pastikan pengguna adalah pengirim atau penerima surat
        if ($user->id != $surat->pengirim_id && $user->id != $surat->penerima_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengunduh file surat ini.');
        }

        // Pastikan file_pendukung ada sebelum mencoba mengunduh
        if (!$surat->file_pendukung) {
            return redirect()->back()->with('error', 'File surat tidak ditemukan.');
        }

        $filePath = public_path("document/Surat/SK/" . $surat->file_pendukung);

        // Pastikan file ada sebelum mencoba mengunduh
        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File surat tidak ditemukan.');
        }

        return response()->download($filePath);
    }


    public function destroy($id)
    {
        $user = Auth::user();
        $surat = SuratKeputusan::where('id', $id)
            ->where('pengirim_id', $user->id)
            ->first();

        if (!$surat) {
            // Surat tidak ditemukan atau tidak diizinkan untuk dihapus
            return redirect()->back()->with('error', 'Surat tidak ditemukan atau Anda tidak memiliki izin untuk menghapus surat ini.');
        }

        // Check if an old file_pendukung exists and delete it
        if ($surat->file_pendukung) {
            $oldfile_pendukung = public_path("document/Surat/SK/" . $surat->file_pendukung);

            if (file_exists($oldfile_pendukung)) {
                unlink($oldfile_pendukung);
            }
        }

        $surat->delete();

        return redirect()->route('sk.index')->with('success', 'Surat berhasil dihapus');
    }

    public function detail($id)
    {
        $surat = SuratKeputusan::findOrFail($id);
        $user = Auth::user();

        // // Pastikan pengguna adalah pengirim atau penerima surat
        // if ($user->id != $surat->pengirim_id && $user->id != $surat->penerima_id) {
        //     return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melihat detail surat ini.');
        // }

        $penerimaid = json_decode($surat->penerima, true);

        // Inisialisasi array untuk menyimpan data anggota
        $penerima = [];

        // Mendapatkan data anggota dari tabel Users berdasarkan ID
        foreach ($penerimaid as $penerimaId) {
            // Menggunakan explode untuk memisahkan ID
            $individualIds = explode(',', trim($penerimaId, '[]'));

            foreach ($individualIds as $id) {
                // Mengambil data anggota dari tabel Users berdasarkan ID
                $user = User::find($id);

                if ($user) {
                    $penerima[] = $user;
                }
            }
        }

        return view('pegawai.kegiatan.detail_surat', compact('surat', 'penerima'));
    }
}
