<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\SuratTugasDinasLuar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ManagementSuratTugasDinasController extends Controller
{
    public function index()
    {
        $user = User::whereIn('role', ['admin-pegawai', 'atasan-langsung', 'wadir', 'pegawai'])->get();
        // dd($user);
        $surat = SuratTugasDinasLuar::with('ketua', 'pembuatkomitmen')->orderBy('created_at', 'desc')->paginate(8);
        // dd($surattugas);
        return view('admin.kepegawaian.management_kegiatan.surat_tugas_perjalanan_dinas', compact(['surat', 'user']));
    }

    public function searchuser(Request $request)
    {
        $input = $request->input('input');

        // Cari pengguna dalam database berdasarkan input (case-insensitive)
        $users = User::where('name', 'like', '%' . $input . '%')->get();

        return response()->json($users);
    }

    public function store(Request $request)
    {
        $pengirimId = Auth::user()->id;
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'nomor_surat' => 'required',
            'tgl_berangkat' => 'required',
            'tgl_kembali' => 'required',
            'tempat_berangkat' => 'required',
            'tempat_tujuan' => 'required',
            'transportasi' => 'required',
            // 'biaya' => 'required',
            'catatan' => 'nullable',
            'file_pendukung' => 'nullable|file|mimes:doc,docx,pdf|max:10240',
            'leadersSelected' => 'required',
            'membersSelected' => 'array', // Ubah nama input sesuai dengan formulir Anda
        ]);

        $surat = new SuratTugasDinasLuar([
            'jenis_surat' => 'STPD',
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'nomor_surat' => $request->input('nomor_surat'),
            'tgl_berangkat' => $request->input('tgl_berangkat'),
            'tgl_kembali' => $request->input('tgl_kembali'),
            'tempat_berangkat' => $request->input('tempat_berangkat'),
            'tempat_tujuan' => $request->input('tempat_tujuan'),
            'transportasi' => $request->input('transportasi'),
            // 'biaya' => $request->input('biaya'),
            'catatan' => $request->input('catatan'),
            'file_pendukung' => null,
            'pengirim_id' => $pengirimId,
            'pembuatkomitmen_id' => $request->input('creatorsSelected'),
            'ketua_id' => $request->input('leadersSelected'),
            'anggota' => json_encode($request->input('membersSelected')),
        ]);

        if ($request->file('file_pendukung')) {
            $fileDocumentName = time() . '_' . $request->file('file_pendukung')->getClientOriginalName();

            $destinationPath = public_path("document/Surat/STPD/");

            // Pastikan direktori tujuan tersedia, jika tidak, buat direktori
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $request->file('file_pendukung')->move($destinationPath, $fileDocumentName);
            $surat->file_pendukung = $fileDocumentName;
        }

        $surat->save();

        return redirect()->route('management-surat-tugas-dinas.index')->with('success', 'Surat berhasil dikirim');
    }

        public function downloadFileSTPD($id)
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
            $oldfile_pendukung = public_path("document/Surat/STPD/" . $surat->file_pendukung);

            if (file_exists($oldfile_pendukung)) {
                unlink($oldfile_pendukung);
            }
        }

        $surat->delete();

        return redirect()->route('management-surat-tugas-dinas.index')->with('success', 'Surat berhasil dihapus');
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

        return view('admin.kepegawaian.management_kegiatan.detail_surat', compact('surat', 'role', 'anggota'));
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
