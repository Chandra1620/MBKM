<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Imports\UserImport;
use App\Models\Berita;
use App\Models\PegawaiHasAbsensi;
use App\Models\User;
use Illuminate\Http\Request;
// use Excel;
use Maatwebsite\Excel\Facades\Excel;

class ManagementAbsensi extends Controller
{
    public function index()
    {
        $berita = PegawaiHasAbsensi::with('user')->paginate(8);
        return view('admin.kepegawaian.presensi.index', compact('berita'));
    }
    public function create()
    {
        $user = User::where('role', '!=', 'admin')->get();
        return view('admin.kepegawaian.presensi.create', compact('user'));
    }
    public function store(Request $request)
    {
        $attrs = $request->validate([
            'penerima_id' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'tanggal_kehadiran' => 'required',
            'status' => 'required',
        ]);
        PegawaiHasAbsensi::create([
            'user_id' => $attrs['penerima_id'],
            'jam_masuk' => $attrs['jam_mulai'],
            'jam_keluar' => $attrs['jam_selesai'],
            'tanggal_kehadiran' => $attrs['tanggal_kehadiran'],
            'status' => $attrs['status'],
            'tags' => $request->tags ,
        ]);
        return redirect()->route('managementpresensi');
        // dd($request->all());
    }
    public function storeexcel(Request $request){
        Excel::import(new UserImport(), $request->file('file'), null, \Maatwebsite\Excel\Excel::XLSX);
        return redirect()->route('managementpresensi')->with('success','berhasil memperbarui');
        
        // dd('hello world');
    }

    public function destroy($id){
        $pegawaiAbsen = PegawaiHasAbsensi::find($id);
        if(!$pegawaiAbsen){
            return redirect()->route('managementpresensi')->with('error','pegawai tidak ada'); 
        }
        $pegawaiAbsen->delete();
        return redirect()->route('managementpresensi')->with('success','berhasil menghapus'); 

    }
    public function edit($id)
    {
        $user = User::where('role', '!=', 'admin')->get();
        $pegawaiAbsen = PegawaiHasAbsensi::find($id);
        if(!$pegawaiAbsen){
            return redirect()->route('managementpresensi')->with('error','pegawai tidak ada'); 
        }
        return view('admin.kepegawaian.presensi.edit', compact(['pegawaiAbsen','user']));
    }
}
