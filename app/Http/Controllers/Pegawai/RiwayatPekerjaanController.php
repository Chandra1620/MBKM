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
        return view('pegawai.riwayat_pekerjaan.index',compact('riwayat-Pekerjaan'));
    }

    public function store(Request $request){
        // return view('pegawai.riwayat_pekerjaan.create');
        // dd($request->all());

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
            'file_pendukung' => 'required',
        ]);     
        
        // dd($attrs);
        
        $fileDocumentName = null; // Inisialisasi nama file menjadi null
        
        if ($request->hasFile('file_pendukung')) {
            $fileDocumentName = time() . '.' . $request->file('file_pendukung')->extension();
            $request->file('file_pendukung')->move(public_path('riwayatpekerjaan/'), $fileDocumentName);
            $attrs['file_pendukung'] = $fileDocumentName;
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
        
        // dd($request->all());

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
            'file_pendukung' => $attrs['file_pendukung'], // Menggunakan $fileDocumentName yang sudah diinisialisasi
        ]);

        return redirect()->route('riwayat-pekerjaan.index');
    }

    public function update( Request $request, $id ){

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
            'file_pendukung' => 'required',
        ]);  

        $riwayatPekerjaan = RiwayatPekerjaan::find($id);

        if (!$riwayatPekerjaan) {
            return abort(404, 'Data Diklat tidak ditemukan');
        }

        // Update data diklat
        $riwayatPekerjaan->nama = $attrs['nama'];
        $riwayatPekerjaan->jenis = $attrs['jenis'];
        $riwayatPekerjaan->penyelenggara = $attrs['penyelenggara'];
        $riwayatPekerjaan->peran = $attrs['peran'];
        $riwayatPekerjaan->tingkat_diklat = $attrs['tingkat_diklat'];
        $riwayatPekerjaan->jumlah_jam = $attrs['jumlah_jam'];
        $riwayatPekerjaan->no_sertifikat = $attrs['no_sertifikat'];
        $riwayatPekerjaan->tingkat_diklat = $attrs['tingkat_diklat'];
        $riwayatPekerjaan->tgl_sertifikat = $attrs['tgl_sertifikat'];
        $riwayatPekerjaan->tahun_penyelenggaraan = $attrs['tahun_penyelenggaraan'];
        $riwayatPekerjaan->tempat = $attrs['tempat'];
        $riwayatPekerjaan->tanggal_mulai = $attrs['tanggal_mulai'];
        $riwayatPekerjaan->tanggal_selesai = $attrs['tanggal_selesai'];
        $riwayatPekerjaan->nomor_sk_penugasan = $attrs['nomor_sk_penugasan'];
        $riwayatPekerjaan->tanggal_sk_penugasan = $attrs['tanggal_sk_penugasan'];
        
        // Simpan perubahan
        $riwayatPekerjaan->save();

        return view('pegawai.riwayat_pekerjaan.update');
    }

    public function delete($id){
        $riwayatPekerjaan = RiwayatPekerjaan::find($id);
        if(!$riwayatPekerjaan){
            return redirect()->route('riwayat-pekerjaan.index');
        }
        $riwayatPekerjaan->delete();
        return redirect()->route('riwayat-pekerjaan.index')->with('success','berhasil');

    }

    public function edit($id)
    {
        $riwayatPekerjaan = RiwayatPekerjaan::find($id);

        // Jika data tidak ditemukan, redirect ke halaman index dengan pesan error
        if (!$riwayatPekerjaan) {
            return redirect()->route('riwayat-pekerjaan.index')->with('error', 'Data pelatihan tidak ditemukan.');
        }

        // Mengembalikan tampilan edit dengan data pendidikan yang ditemukan
        return view('pegawai.riwayat-pekerjaan.edit', compact('riwayat-pekerjaan'));
    }
}
