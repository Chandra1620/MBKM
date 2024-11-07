<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\SuratTugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagementSuratTugasController extends Controller
{
    public function index()
    {
        $user = User::whereIn('role', ['admin-pegawai', 'atasan-langsung', 'wadir', 'pegawai'])->get();
        // dd($user);
        $surat = SuratTugas::with('ketua')->orderBy('created_at', 'desc')->paginate(8);
        // dd($SuratTugas);
        return view('admin.kepegawaian.management_kegiatan.surat_tugas', compact(['surat', 'user']));
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
        // dd($request->all());
        $pengirimId = Auth::user()->id;

        $attrs = $request->validate([
            'jenis_surat' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'nomor_surat' => 'required',
            'leadersSelected' => 'required',
            'membersSelected' => 'nullable',
            'tgl_berangkat' => 'nullable',
            'tgl_kembali' => 'nullable',
            'file_pendukung' => 'nullable|file|mimes:doc,docx,pdf|max:10240',
        ]);

        // dd($request->input("membersSelected"));

        $surat = new SuratTugas([
            'jenis_surat' => 'ST',
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'nomor_surat' => $request->input('nomor_surat'),
            'pengirim_id' => $pengirimId,
            'tempat_berangkat' => $request->input('tgl_berangkat'),
            'tgl_kembali' => $request->input('tgl_kembali'),
            'ketua_id' => $request->input('leadersSelected'),
            'anggota' => json_encode($request->input('membersSelected')),
        ]);

        if ($request->File('file_pendukung')) {
            $fileDocumentName = time() . '_' . $request->file('file_pendukung')->getClientOriginalName();

            $destinationPath = public_path("document/Surat/ST/");

            // Pastikan direktori tujuan tersedia, jika tidak, buat direktori
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $request->file('file_pendukung')->move($destinationPath, $fileDocumentName);
            $surat->file_pendukung = $fileDocumentName;
        }

        // Simpan surat ke database
        $surat->save();

        return redirect()->route('management-surat-tugas.index')->with('success', 'Surat berhasil dikirim');
    }

    public function update(Request $request, $id)
    {
        dd($request);
        // Validasi input
        $attrs = $request->validate([
            'jenis_surat' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'nomor_surat' => 'required',
            'leader' => 'required',
            'member' => 'nullable',
            'tempat_berangkat' => 'nullable',
            'tgl_kembali' => 'nullable',
            'file_pendukung' => 'required',
        ]);

        dd($attrs);

        // Cek apakah data diklat ditemukan
        $surat = SuratTugas::find($id);

        if (!$surat) {
            return abort(404, 'Data Surat Tugas tidak ditemukan');
        }

        // Update data diklat
        $surat->jenis_surat = $attrs['jenis_surat'];
        $surat->judul = $attrs['judul'];
        $surat->deskripsi = $attrs['deskripsi'];
        $surat->nomor_surat = $attrs['nomor_surat'];
        $surat->tgl_berangkat = $attrs['tempat_berangkat'];
        $surat->tgl_kembali = $attrs['tgl_kembali'];
        $surat->file_pendukung = $attrs['file_pendukung'];
        $surat->ketua_id = $attrs['leader'];
        $surat->anggota = $attrs['member'];
        

        // Simpan perubahan
        $surat->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('management-surat-tugas.index')->with('success', 'Berhasil mengubah data Surat Tugas');
    }

    public function downloadFile($id)
    {
        $surat = SuratTugas::findOrFail($id);

        if ($surat->file_pendukung) {
            $filePath = public_path('document/Surat/ST/' . $surat->file_pendukung);

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
            $oldfile_pendukung = public_path('document/Surat/ST/' . $surat->file_pendukung);

            if (file_exists($oldfile_pendukung)) {
                unlink($oldfile_pendukung);
            }
        }

        $surat->delete();

        return redirect()->route('management-surat-tugas.index')->with('success', 'Surat berhasil dihapus');
    }

    public function detail($id)
    {         
        $query = DB::table('surat_tugas')->select("anggota")
        ->get();

        $anggota = trim($query[0]->anggota, '"');
        $anggota = explode(",", $anggota);

        // dd($or);

        # code...
        $anggotaBrimob = DB::table('users')
            ->whereIn('id', $anggota)
            ->get();

        $user = Auth::user();
        $role = null;
        $anggota = User::all();

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
        // Cek dan ubah $anggotaIds menjadi array jika masih berbentuk string
        // Cek apakah $anggotaIds berupa string, lalu ubah ke array jika perlu
        if (is_string($anggotaIds)) {
            $decoded = json_decode($anggotaIds, true);

            // Pastikan hasil json_decode adalah array
            if (is_array($decoded)) {
                $anggotaIds = $decoded;
            } else {
                $anggotaIds = []; // Set sebagai array kosong jika json_decode gagal
            }
        }

        // Pastikan $anggotaIds adalah array sebelum di-loop
        if (is_array($anggotaIds)) {
            foreach ($anggotaIds as $anggotaId) {
                // Menggunakan explode untuk memisahkan ID jika formatnya masih string
                $individualIds = explode(',', trim($anggotaId, '[]'));

                foreach ($individualIds as $id) {
                    // Mengambil data anggota dari tabel Users berdasarkan ID
                    $user = User::find($id);

                    if ($user) {
                        $anggota[] = $user;
                    }
                }
            }
        }

        // Load relasi berdasarkan peran yang telah ditentukan
        $surat->load($role);

        return view('admin.kepegawaian.management_kegiatan.detail_surat', compact('surat', 'role', 'anggota', 'anggotaBrimob'));
    }

    public function edit($id)
    {
        // Mencari data PendidikanFormal berdasarkan ID
        $surat = SuratTugas::find($id);

        // Jika data tidak ditemukan, redirect ke halaman index dengan pesan error
        if (!$surat) {
            return redirect()->route('management-surat-tugas.index')->with('error', 'Data pendidikan tidak ditemukan.');
        }

        // Mengembalikan tampilan edit dengan data pendidikan yang ditemukan
        return view('admin.kepegawaian.management_kegiatan.edit_surat_tugas', compact('surat'));
    }
}
