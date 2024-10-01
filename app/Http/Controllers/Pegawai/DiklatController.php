<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Diklat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiklatController extends Controller
{
    public function index(){
        $diklat = Diklat::paginate(8);
        // dd($diklat);
        return view('pegawai.diklat.index', compact('diklat'));
    }

    public function create(){
        // dd('hello world');
        return view('pegawai.diklat.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $attrs = $request->validate([
            'jenis' => 'required',
            'nama' => 'required',
            'penyelenggara' => 'required',
            'peran' => 'required',
            'tingkat_diklat' => 'required',
            'jumlah_jam' => 'required',
            'no_sertifikat' => 'required',
            'tingkat_diklat' => 'required',
            'tgl_sertifikat' => 'required',
            'tahun_penyelenggaraan' => 'required',
            'tempat' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'no_sk_penugasan' => 'required',
            'tgl_sk_penugasan' => 'required',
        ]);

        Diklat::create([
            'user_id' => Auth::user()->id,
            'jenis' => $attrs['jenis'],
            'nama' => $attrs['nama'],
            'penyelenggara' => $attrs['penyelenggara'],
            'peran' => $attrs['peran'],
            'tingkat_diklat' => $attrs['tingkat_diklat'],
            'jumlah_jam' => $attrs['jumlah_jam'],
            'no_sertifikat' => $attrs['no_sertifikat'],
            'tingkat_diklat' => $attrs['tingkat_diklat'],
            'tgl_sertifikat' => $attrs['tgl_sertifikat'],
            'tahun_penyelenggaraan' => $attrs['tahun_penyelenggaraan'],
            'tempat' => $attrs['tempat'],
            'tanggal_mulai' => $attrs['tanggal_mulai'],
            'tanggal_selesai' => $attrs['tanggal_selesai'],
            'nomor_sk_penugasan' => $attrs['no_sk_penugasan'],
            'tanggal_sk_penugasan' => $attrs['tgl_sk_penugasan']
        ]);


        return redirect()->route('diklat.index')->with('success','berhasil');





    }

    public function delete($id){
        $diklat = Diklat::find($id);
        if(!$diklat){
            return redirect()->route('diklat.index');
        }
        $diklat->delete();
        return redirect()->route('diklat.index')->with('success','berhasil');

    }

    public function edit($id){
        $diklat = Diklat::find($id);
        if(!$diklat){
            return redirect()->route('diklat.index')->with('error','gagal');
        }
        return view('pegawai.diklat.edit', compact('diklat'));
    }
}
