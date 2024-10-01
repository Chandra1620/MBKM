<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\SuratKeputusan;
use App\Models\SuratTugas;
use App\Models\User;
use App\Models\SuratTugasDinasLuar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class STPDController extends Controller
{

    public function indexSTPD()
    {
        $surat = SuratTugasDinasLuar::with(['ketua', 'pembuatkomitmen'])
            // ->where('penerima_id', Auth::user()->id)
            // ->orderBy('created_at', 'desc')
            ->get();

        return view('pegawai.kegiatan.surat_tugas_dinas_luar', compact('surat'));
    }

    public function downloadFile($id)
    {
        $surat = SuratTugasDinasLuar::findOrFail($id);

        // Pastikan file_pendukung ada sebelum mencoba mendownload
        if ($surat->file_pendukung) {
            $filePath = public_path("document/Surat/STPD/" . $surat->file_pendukung);

            return response()->download($filePath, $surat->file_pendukung);
        } else {
            return back()->with('error', 'File pendukung tidak ditemukan');
        }
    }


    public function destroy($id)
    {
        $user = Auth::user();
        $surat = SuratTugasDinasLuar::where('id', $id)
            ->where('pengirim_id', $user->id)
            ->first();

        if (!$surat) {
            // Surat tidak ditemukan atau tidak diizinkan untuk dihapus
            return redirect()->back()->with('error', 'Surat tidak ditemukan atau Anda tidak memiliki izin untuk menghapus surat ini.');
        }

        // Check if an old file_pendukung exists and delete it
        if ($surat->file_pendukung) {
            $oldfile_pendukung = public_path("document/Surat/{$user->name}/STPD/{$surat->file_pendukung}");

            if (file_exists($oldfile_pendukung)) {
                unlink($oldfile_pendukung);
            }
        }

        $surat->delete();

        return redirect()->route('stpd.index')->with('success', 'Surat berhasil dihapus');
    }

    public function detail($id)
    {
        $user = Auth::user();
        $role = null;

        $surat = SuratTugasDinasLuar::findOrFail($id);

        // Menentukan peran pengguna berdasarkan kondisi
        if ($user->id == $surat->ketua_id) {
            $role = 'ketua';
        } elseif ($user->id == $surat->pembuatkomitmen_id) {
            $role = 'pembuatkomitmen';
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

    public function exportPdf($id)
    {
        $surat = SuratTugasDinasLuar::with(['ketua', 'pembuatkomitmen'])->find($id);
        if (!$surat) {
            dd('nothing');
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

        // Pass the QR code to the view
        $pdf = Pdf::loadView('admin.template.pdf_stpd', compact('surat', 'anggota'));
        $pdf->setPaper('A4', 'portrait');

        // Download the PDF
        return $pdf->download('STPD.pdf');
    }
}
