<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\SuratTugas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class STController extends Controller
{

    public function indexST()
    {
        $surat = SuratTugas::with('ketua')->orderBy('created_at', 'desc')->paginate(8);
        // dd($SuratTugas);
        return view('pegawai.kegiatan.surat_tugas', compact(['surat']));
    }

    public function downloadFile($id)
    {
        $surat = SuratTugas::findOrFail($id);

        if ($surat->file_pendukung) {
            $filePath = public_path("document/Surat/ST/" . $surat->file_pendukung);

            return response()->download($filePath, $surat->file_pendukung);
        } else {
            return back()->with('error', 'File pendukung tidak ditemukan');
        }
    }


    public function destroy($id)
    {
        $user = Auth::user();
        $surat = SuratTugas::where('id', $id)
            ->where('pengirim_id', $user->id)
            ->first();

        if (!$surat) {
            // Surat tidak ditemukan atau tidak diizinkan untuk dihapus
            return redirect()->back()->with('error', 'Surat tidak ditemukan atau Anda tidak memiliki izin untuk menghapus surat ini.');
        }

        // Check if an old file_pendukung exists and delete it
        if ($surat->file_pendukung) {
            $oldfile_pendukung = public_path("document/Surat/ST/" . $surat->file_pendukung);

            if (file_exists($oldfile_pendukung)) {
                unlink($oldfile_pendukung);
            }
        }

        $surat->delete();

        return redirect()->route('st.index')->with('success', 'Surat berhasil dihapus');
    }

    public function detail($id)
    {
        $user = Auth::user();
        $role = null;

        $surat = SuratTugas::findOrFail($id);

        // Menentukan peran pengguna berdasarkan kondisi
        if ($user->id == $surat->ketua_id) {
            $role = 'ketua';
        } elseif ($user->id == $surat->pengirim_id) {
            $role = 'pengirim';
        }

        // Mengambil data anggota dan mengonversi ke dalam array
        $anggotaIds = json_decode($surat->anggota, true);

        // Inisialisasi array untuk menyimpan data anggota
        $anggota = [];

        // Mendapatkan data anggota dari tabel Users berdasarkan ID
        foreach ($anggotaIds as $anggotaId) {
            // Menggunakan explode untuk memisahkan ID
            $individualIds = explode(',', trim($anggotaId, '[]'));

            foreach ($individualIds as $id) {
                // Mengambil data anggota dari tabel Users berdasarkan ID
                $user = User::find($id);

                if ($user) {
                    $anggota[] = $user;
                }
            }
        }

        // Load relasi berdasarkan peran yang telah ditentukan
        $surat->load($role);

        return view('pegawai.kegiatan.detail_surat', compact('surat', 'role', 'anggota'));
    }
}
