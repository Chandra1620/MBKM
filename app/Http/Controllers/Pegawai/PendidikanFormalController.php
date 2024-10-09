<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\PendidikanFormal;
use App\Models\SuratKeputusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendidikanFormalController extends Controller
{
    public function index(){
        $user = Auth::user();

        // $surattugas = SuratKeputusan::with('penerima.user')
        //     ->whereHas('penerima', function ($query) use ($user) {
        //         $query->where('user_id', $user->id);
        //     })
        //     ->paginate(8);
        $pendidikan = PendidikanFormal::where('user_id', $user->id)->paginate(8);
        // dd($pendidikan);

        return view('pegawai.kualifikasi.pendidikan_formal', compact('pendidikan'));
    }


    public function store(Request $request ){
        // TOTAL DATA 16
        // YG WAJIB 10

        // dd($request->all());
        $attrs = $request->validate([
            'nama_perguruan_tinggi' => 'required',
            'program_studi' => 'required',
            'gelar_akademik' => 'required',

            'bidang_studi' => 'required',
            'tahun_masuk' => 'required|max:4|min:4',
            'tahun_lulus' => 'required|max:4|min:4',
            'tanggal_kelulusan' => 'required',
            'nim' => 'required',
            'jumlah_sks_kelulusan' => 'required',
            'ipk_kelulusan' => 'required',

            'jumlah_semester_tempuh' => 'required',
            'nomor_ijazah' => 'required',

            
            'file_pendukung' => 'required',
        ]);
        PendidikanFormal::create([
            'user_id' =>  Auth::user()->id,
            'nama_perguruan_tinggi' => $attrs['nama_perguruan_tinggi'],
            'program_studi' => $attrs['program_studi'],
            'bidang_studi' => $attrs['bidang_studi'],
            'tahun_masuk' => $attrs['tahun_masuk'],
            'tahun_lulus' => $attrs['tahun_lulus'],
            'tanggal_kelulusan' => $attrs['tanggal_kelulusan'],
            'nim' => $attrs['nim'],
            'jumlah_sks_kelulusan' => $attrs['jumlah_sks_kelulusan'],
            'ipk_kelulusan' => $attrs['ipk_kelulusan'],
            'nomor_ijazah' => $attrs['nomor_ijazah'],
            'file_pendukung' => $attrs['file_pendukung'],
            // // gaj wajib dibawah
            'gelar_akademik' => $request->gelar_akademik,
            'jumlah_semester_tempuh' => $request->jumlah_semester_tempuh,
            'nomor_sk_penyetaraan' => $request->nomor_sk_penyetaraan,
            'tanggal_sk_penyetaraan' => $request->tanggal_sk_penyetaraan,
            'judul_tesis' => $request->judul_tesis,
        ]);

        return redirect()->route('pendidikanformal.index')->with('success','berhasil menambah data pendidikan formal');
    }

    public function update(Request $request, $id ){
        // TOTAL DATA 16
        // YG WAJIB 10

        // dd($request->all());
        $attrs = $request->validate([
            'nama_perguruan_tinggi' => 'required',
            'program_studi' => 'required',
            'gelar_akademik' => 'required',

            'bidang_studi' => 'required',
            'tahun_masuk' => 'required|max:4|min:4',
            'tahun_lulus' => 'required|max:4|min:4',
            'tanggal_kelulusan' => 'required',
            'nim' => 'required',
            'jumlah_sks_kelulusan' => 'required',
            'ipk_kelulusan' => 'required',

            'jumlah_semester_tempuh' => 'required',

        ]);
        $pendidikan = PendidikanFormal::find($id);
        if(!$pendidikan){
            return redirect()->route('pendidikanformal.index')->with('error','gagal');
        }
        if($pendidikan != 'pengajuan'){
            return redirect()->route('pendidikanformal.index')->with('error','gagal');
        }

        $pendidikan->nama_perguruan_tinggi = $attrs['nama_perguruan_tinggi'];
        $pendidikan->program_studi = $attrs['program_studi'];
        $pendidikan->bidang_studi = $attrs['bidang_studi'];
        $pendidikan->tahun_masuk = $attrs['tahun_masuk'];

        $pendidikan->tahun_lulus = $attrs['tahun_lulus'] ;
        $pendidikan->tanggal_kelulusan = $attrs['tanggal_kelulusan'];
        $pendidikan->nim = $attrs['nim'];
        $pendidikan->jumlah_sks_kelulusan = $attrs['jumlah_sks_kelulusan'];
        $pendidikan->gelar_akademik = $attrs['gelar_akademik'];
        $pendidikan->ipk_kelulusan = $attrs['ipk_kelulusan'];
        $pendidikan->jumlah_semester_tempuh = $attrs['jumlah_semester_tempuh'];
        $pendidikan->nomor_sk_penyetaraan = $request->nomor_sk_penyetaraan;
        $pendidikan->judul_tesis = $request->judul_tesis;
        $pendidikan->update();

        return redirect()->route('pendidikanformal.index')->with('success','berhasil menambah data pendidikan formal');
    }

    public function edit($id){
        $pendidikan = PendidikanFormal::find($id);

        if(!$pendidikan){
            return redirect()->route('pendidikanformal.index')->with('error','gagal');
        }
        // dd($pendidikan);

        return view('pegawai.kualifikasi.pendidikan_formal_edit', compact('pendidikan'));
    }

    public function delete(Request $request, $id){
        $pendidikanFormal = PendidikanFormal::find($id);
        if(!$pendidikanFormal){
            return redirect()->route('pendidikanformal.index')->with('error','gagal');
        }

        $pendidikanFormal->delete();
        return redirect()->route('pendidikanformal.index')->with('success','berhasil');

    }

}
