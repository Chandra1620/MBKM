<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\pangkat_golongan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPangkatGolonganController extends Controller
{
    public function index(){
        $pangkatGolongans = pangkat_golongan::all();
        return view('admin.kepegawaian.pangkat.index', compact('pangkatGolongans'));
    }

    public function detail($id)
    {
        $pangkatGolongan = pangkat_golongan::findOrFail($id);
        return view('admin.kepegawaian.pangkat.detail', compact('pangkatGolongan'));
    }
    
    public function verifikasi(Request $request ,$id){
        // dd($request->all());
        $pangkatGolongans = pangkat_golongan::find($id);
        
        if (!$pangkatGolongans) {
            return redirect()->route('admin-pangkat-golongan.index')->with('error', 'Riwayat Fungsional tidak ditemukan');
        }

        $pangkatGolongans->verifikasi_admin = Carbon::now();

        $pangkatGolongans->status = 'diverifikasi';



        $pangkatGolongans->save();

        // $pegawaiFungsional = PegawaiFungsional::where('id', $request->user_id)->first();

        // if ($pegawaiFungsional){
        //     $pegawaiFungsional->unit_kerja_has_jabatan_fungsional_id = $riwayat_fungsional->unit_kerja_has_jabatan_fungsional_id;
        //     $pegawaiFungsional->save();
        // }else{
        //     PegawaiFungsional::create([
        //        'user_id' => $request->user_id,
        //        'unit_kerja_has_jabatan_fungsional_id' => $riwayat_fungsional->unit_kerja_has_jabatan_fungsional_id

        //     ]);

        // }

        return redirect()->route('admin-pangkat-golongan.index')->with('success', 'Pangkat Golongan diverifikasi');
    }

    public function tolakVerifikasi($id)
    {
        
        $pangkatGolongan = pangkat_golongan::find($id);
        
        if (!$pangkatGolongan) {
            return redirect()->route('pegawai-fungsional.index')->with('error', 'Riwayat Fungsional tidak ditemukan');
        }

        $pangkatGolongan->verifikasi_admin = Carbon::now();
        $pangkatGolongan->status = 'ditolak';


        $pangkatGolongan->save();

        return redirect()->route('admin-pangkat-golongan.index');
    }

    public function create()
    {
        return view('admin.kepegawaian.pangkat.create');
    }

    // Menyimpan data pangkat_golongan baru
    public function store(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'pangkat_golongan' => 'nullable',
            'nomor_sk' => 'nullable',
            'tanggal_sk' => 'nullable',
            'tanggal_mulai' => 'nullable',
            'masakerja_tahun' => 'nullable',
            'masakerja_bulan' => 'nullable',
            'kredit' => 'nullable',
            'usersSelected' => 'require'
        ]);

        // $pangkatGolongan = pangkat_golongan::findOrFail($id);
        $pangkatGolongan = new pangkat_golongan([
            'user_id' => $request->input('userSelected'),
            'pangkat_golongan' => $request->input('pangkat_golongan'),
            'nomor_sk' => $request->input('nomor_sk'),
            'tanggal_sk' => $request->input('tanggal_sk'),
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'masakerja_tahun' => $request->input('masakerja_tahun'),
            'masakerja_bulan' => $request->input('masakerja_bulan'),
            'kredit' => $request->input('kredit'),
        ]);
        // $pangkatGolongan->verifikasi_admin = Carbon::now();

        $pangkatGolongan->status = 'diverifikasi';

        // Update file dokumen_pendukung jika ada perubahan
        if ($request->File('dokumen_pendukung')) {
            $fileDocumentName = time() . '_' . $request->file('dokumen_pendukung')->getClientOriginalName();

        $destinationPath = public_path("document/PangkatGolongan/");

        // Pastikan direktori tujuan tersedia, jika tidak, buat direktori
        if (!File_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        $request->file('dokumen_pendukung')->move($destinationPath, $fileDocumentName);
        $pangkatGolongan->dokumen_pendukung = $fileDocumentName;
        }

        $pangkatGolongan->save();

        return redirect()->route('admin-pangkat-golongan.index')->with('success', 'Data pangkat/golongan berhasil ditambahkan');
    }

    public function downloadFile($id)
    {
        // $user = Auth::user();
        $pangkatGolongan = pangkat_golongan::findOrFail($id);

        // Pastikan file_pendukung ada sebelum mencoba mengunduh
        if (!$pangkatGolongan->dokumen_pendukung) {
            return redirect()->back()->with('error', 'File surat tidak ditemukan.');
        }

        $filePath = public_path("document/PangkatGolongan/" . $pangkatGolongan->dokumen_pendukung);

        // Pastikan file ada sebelum mencoba mengunduh
        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File surat tidak ditemukan.');
        }

        return response()->download($filePath);
    }

    // Menampilkan form edit data pangkat_golongan
    public function edit($id)
    {
        $pangkatGolongan = pangkat_golongan::findOrFail($id);
        return view('admin.kepegawaian.pangkat.edit', compact('pangkatGolongan'));
    }

    // Mengupdate data pangkat_golongan
    public function update(Request $request, $id)
{
    $request->validate([
        'pangkat_golongan' => 'nullable',
        'nomor_sk' => 'nullable',
        'tanggal_sk' => 'nullable',
        'tanggal_mulai' => 'nullable',
        'masakerja_tahun' => 'nullable',
        'masakerja_bulan' => 'nullable',
        'kredit' => 'nullable',
    ]);

    // Ambil objek pangkat_golongan dari database berdasarkan ID
    $pangkatGolongan = pangkat_golongan::findOrFail($id);

    // Update nilai-nilai atribut berdasarkan input formulir
    $pangkatGolongan->user_id = User::find($id);
    $pangkatGolongan->pangkat_golongan = $request->input('pangkat_golongan');
    $pangkatGolongan->nomor_sk = $request->input('nomor_sk');
    $pangkatGolongan->tanggal_sk = $request->input('tanggal_sk');
    $pangkatGolongan->tanggal_mulai = $request->input('tanggal_mulai');
    $pangkatGolongan->masakerja_tahun = $request->input('masakerja_tahun');
    $pangkatGolongan->masakerja_bulan = $request->input('masakerja_bulan');
    $pangkatGolongan->kredit = $request->input('kredit');
    $pangkatGolongan->status = 'pengajuan';

    // Update file dokumen_pendukung jika ada perubahan
    if ($request->File('dokumen_pendukung')) {
        $fileDocumentName = time() . '_' . $request->file('dokumen_pendukung')->getClientOriginalName();

    $destinationPath = public_path("document/PangkatGolongan/");

    // Pastikan direktori tujuan tersedia, jika tidak, buat direktori
    if (!File_exists($destinationPath)) {
        mkdir($destinationPath, 0777, true);
    }
    $request->file('dokumen_pendukung')->move($destinationPath, $fileDocumentName);
    $pangkatGolongan->dokumen_pendukung = $fileDocumentName;
    }

    $pangkatGolongan->save(); // Simpan perubahan ke database

    return redirect()->route('admin-pangkat-golongan.index')->with('success', 'Data pangkat/golongan berhasil diupdate');
}


    // Menghapus data pangkat_golongan
    public function destroy($id)
    {
        $pangkatGolongan = pangkat_golongan::findOrFail($id);

        // Hapus file dokumen_pendukung jika ada
        if ($pangkatGolongan->dokumen_pendukung) {
            $olddokumen_pendukung = public_path("document/PangkatGolongan/" . $pangkatGolongan->dokumen_pendukung);

            if (file_exists($olddokumen_pendukung)) {
                unlink($olddokumen_pendukung);
            }
        }

        $pangkatGolongan->delete();

        return redirect()->route('admin-pangkat-golongan.index')->with('success', 'Data pangkat/golongan berhasil dihapus');
    }


}
