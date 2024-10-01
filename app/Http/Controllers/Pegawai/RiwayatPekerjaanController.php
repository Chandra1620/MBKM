<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPekerjaanController extends Controller
{
    public function index(){
        $riwayatPekerjaan = RiwayatPekerjaan::where('user_id',Auth::user()->id)->get();
        return view('pegawai.riwayat_pekerjaan.index',compact('riwayatPekerjaan'));
    }

    public function create(){
        return view('pegawai.riwayat_pekerjaan.create');
    }
    public function store(Request $request){
        // dd($request->all());
        // return view('pegawai.riwayat_pekerjaan.create');

        $attrs = $request->validate([
            'bidang_usaha' => 'required',
            'jenis_pekerjaan' => 'required',
            'jabatan' => 'required',
            'instansi' => 'required',
            'divisi' => 'required',
            'deskripsi' => 'required',
            'mulai_bekerja' => 'required',
            'selesai_bekerja' => 'required',
            'area_pekerjaan' => 'required',
        ]);

        $fileDocumentName = null; // Inisialisasi nama file menjadi null

        if ($request->hasFile('file')) {
            $fileDocumentName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('riwayatpekerjaan/'), $fileDocumentName);
        }
        // 'user_id',
        // 'jabatan',
        // 'instansi',
        // 'divisi',
        // 'deskripsi_kerja',
        // 'mulai_bekerja',
        // 'selesai_bekerja',
        // 'area_pekerjaan',
        // 'file_pendukung',

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
            'file_pendukung' => $fileDocumentName, // Menggunakan $fileDocumentName yang sudah diinisialisasi
        ]);

        return redirect()->route('riwayat-pekerjaan.index');
    }
    public function delete($id){
        $diklat = RiwayatPekerjaan::find($id);
        if(!$diklat){
            return redirect()->route('riwayat-pekerjaan.index');
        }
        $diklat->delete();
        return redirect()->route('riwayat-pekerjaan.index')->with('success','berhasil');

    }
}
