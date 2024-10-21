<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPekerjaanController extends Controller
{
    public function index()
    {
        // Mendapatkan riwayat pekerjaan dari user yang sedang login
        $riwayatPekerjaan = RiwayatPekerjaan::where('user_id', Auth::user()->id)->get();
        return view('pegawai.riwayat_pekerjaan.index', compact('riwayatPekerjaan'));
    }

    public function store(Request $request)
    {
        // Validasi input

        $attrs = $request->validate([
            'bidang_usaha' => 'required|string|max:255',
            'jenis_pekerjaan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'divisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'mulai_bekerja' => 'required|date',
            'selesai_bekerja' => 'required',
            'area_pekerjaan' => 'required|string|max:255',
            'file_pendukung' => 'required', // Pastikan input ini menerima file
        ]);

        // dd($attrs);
        // Menyimpan file pendukung jika ada
        if ($request->hasFile('file_pendukung')) {
            $fileDocumentName = time() . '.' . $request->file('file_pendukung')->extension();
            $request->file('file_pendukung')->move(public_path('riwayatpekerjaan/'), $fileDocumentName);
            $attrs['file_pendukung'] = $fileDocumentName;
        }

        // Menyimpan riwayat pekerjaan
        RiwayatPekerjaan::create([
            'user_id' => Auth::user()->id,
            'bidang_usaha' => $attrs['bidang_usaha'],
            'jenis_pekerjaan' => $attrs['jenis_pekerjaan'],
            'jabatan' => $attrs['jabatan'],
            'instansi' => $attrs['instansi'],
            'divisi' => $attrs['divisi'],
            'deskripsi_kerja' => $attrs['deskripsi'],
            'mulai_bekerja' => $attrs['mulai_bekerja'],
            'selesai_bekerja' => $attrs['selesai_bekerja'],
            'area_pekerjaan' => $attrs['area_pekerjaan'],
            'status' => 'pengajuan',
            'file_pendukung' => $attrs['file_pendukung'],
        ]);

        // Redirect ke halaman index setelah penyimpanan berhasil
        return redirect()->route('riwayat-pekerjaan.index')->with('success', 'Riwayat pekerjaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Mencari riwayat pekerjaan berdasarkan ID
        $riwayatPekerjaan = RiwayatPekerjaan::find($id);

        // Jika data tidak ditemukan, redirect ke halaman index
        if (!$riwayatPekerjaan) {
            return redirect()->route('riwayat-pekerjaan.index')->with('error', 'Data pekerjaan tidak ditemukan.');
        }

        // Tampilkan halaman edit dengan data yang ditemukan
        return view('pegawai.riwayat_pekerjaan.edit', compact('riwayatPekerjaan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $attrs = $request->validate([
            'bidang_usaha' => 'required|string|max:255',
            'jenis_pekerjaan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'divisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'mulai_bekerja' => 'required|date',
            'selesai_bekerja' => 'required|date',
            'area_pekerjaan' => 'required|string|max:255',
            'file_pendukung' => 'sometimes|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Cari data pekerjaan
        $riwayatPekerjaan = RiwayatPekerjaan::find($id);

        // Jika data tidak ditemukan, abort dengan pesan error
        if (!$riwayatPekerjaan) {
            return abort(404, 'Data pekerjaan tidak ditemukan');
        }

        // Handle file upload jika ada file baru
        if ($request->hasFile('file_pendukung')) {
            $fileDocumentName = time() . '.' . $request->file('file_pendukung')->extension();
            $request->file('file_pendukung')->move(public_path('riwayatpekerjaan/'), $fileDocumentName);
            $attrs['file_pendukung'] = $fileDocumentName;
        } else {
            unset($attrs['file_pendukung']);
        }

        // Update data pekerjaan
        $riwayatPekerjaan->update([
            'bidang_usaha' => $attrs['bidang_usaha'],
            'jenis_pekerjaan' => $attrs['jenis_pekerjaan'],
            'jabatan' => $attrs['jabatan'],
            'instansi' => $attrs['instansi'],
            'divisi' => $attrs['divisi'],
            'deskripsi_kerja' => $attrs['deskripsi'],
            'mulai_bekerja' => $attrs['mulai_bekerja'],
            'selesai_bekerja' => $attrs['selesai_bekerja'],
            'area_pekerjaan' => $attrs['area_pekerjaan'],
            'file_pendukung' => $attrs['file_pendukung'] ?? $riwayatPekerjaan->file_pendukung, // keep old file if not updated
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('riwayat-pekerjaan.index')->with('success', 'Data pekerjaan berhasil diupdate.');
    }



    public function delete($id)
    {
        // Mencari riwayat pekerjaan berdasarkan ID
        $riwayatPekerjaan = RiwayatPekerjaan::find($id);

        if (!$riwayatPekerjaan) {
            return redirect()->route('riwayat-pekerjaan.index')->with('error', 'Data pekerjaan tidak ditemukan.');
        }

        // Hapus data pekerjaan
        $riwayatPekerjaan->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('riwayat-pekerjaan.index')->with('success', 'Data pekerjaan berhasil dihapus.');
    }

    public function info($id)
    {
        // Ambil data riwayat pekerjaan berdasarkan user_id yang sedang login
        $riwayatPekerjaan = RiwayatPekerjaan::where('user_id', Auth::user()->id)->get();

        // Kirim data ke view
        return view('pegawai.riwayat_pekerjaan.info', compact('riwayatPekerjaan'));
    }
}
