<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pangkat_golongan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PangkatGolonganController extends Controller
{

    public function index()
    {
        $pangkatGolongans = pangkat_golongan::all();
        return view('pegawai.pangkat.index', compact('pangkatGolongans'));
    }

    // Menampilkan form tambah data pangkat_golongan
    public function create()
    {
        return view('pegawai.pangkat.create');
    }

    // Menyimpan data pangkat_golongan baru
    public function store(Request $request)
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

        // $pangkatGolongan = pangkat_golongan::findOrFail($id);
        $pangkatGolongan = new pangkat_golongan([
            'user_id' => Auth::user()->id,
            'pangkat_golongan' => $request->input('pangkat_golongan'),
            'nomor_sk' => $request->input('nomor_sk'),
            'tanggal_sk' => $request->input('tanggal_sk'),
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'masakerja_tahun' => $request->input('masakerja_tahun'),
            'masakerja_bulan' => $request->input('masakerja_bulan'),
            'kredit' => $request->input('kredit'),
        ]);

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

        return redirect()->route('pangkat-golongan.index')->with('success', 'Data pangkat/golongan berhasil ditambahkan');
    }

    public function detail($id)
    {
        $pangkatGolongan = pangkat_golongan::findOrFail($id);
        return view('pegawai.pangkat.detail', compact('pangkatGolongan'));
    }

    public function downloadFile($id)
    {
        $user = Auth::user();
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
        return view('pegawai.pangkat.edit', compact('pangkatGolongan'));
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
    $pangkatGolongan->user_id = Auth::user()->id;
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

    return redirect()->route('pangkat-golongan.index')->with('success', 'Data pangkat/golongan berhasil diupdate');
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

        return redirect()->route('pangkat-golongan.index')->with('success', 'Data pangkat/golongan berhasil dihapus');
    }
}
