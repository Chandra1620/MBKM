<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Tes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TesController extends Controller
{

    public function index() {
        $tes = Tes::where('user_id', Auth::user()->id)->paginate(8);
        return view('pegawai.kompetensi.tes', compact('tes'));
    }
    

    public function create(){
 
        $tes = Tes::all();
        // dd($tes);
        return view('pegawai.kompetensi.tes_create', compact('tes'));
    }

    public function store(Request $request){
        // test
//    dd($request->all());
       
    $attrs = $request->validate([
            'nama_tes' => 'required',
            'skor' => 'required',
            'jenis_tes' => 'required',
            'penyelenggara' => 'required',
            'tahun' => 'required',
            
        ]);

                Tes::create([
            'user_id' => Auth::user()->id,
            'nama_tes' => $request->nama_tes,
            'skor' => $request->skor,
            'jenis_tes' => $request->jenis_tes,
            'penyelenggara' => $request->penyelenggara,
            'tahun' => $request->tahun,
           
        ]);

        return redirect()->route('tes.index');

    }

    public function edit($id){
        $tes = Tes::find($id);
        // dd($sertifikasi);
        if (!$tes) {
            dd('Gagal Menemukan Tes');
        }

            return view ('pegawai.kompetensi.tes_edit', compact('tes'));
    }

    public function update(Request $request, $id){

        $attrs = $request->validate([
            'nama_tes' => 'required',
            'skor' => 'required',
            'jenis_tes' => 'required',
            'penyelenggara' => 'required',
            'tahun' => 'required',
        ]);
    
        $tes = Tes::find($id);
        if (!$tes) {
            dd('Gagal Menemukan tes');
        }
        if ($tes->status != 'pengajuan') {
            return redirect()->route('tes.index');
        }
        $tes->update([
            'nama_tes' => $attrs['nama_tes'],
            'skor' => $attrs['skor'],
            'jenis_tes' => $attrs['jenis_tes'],
            'penyelenggara' => $attrs['penyelenggara'],
            'tahun' => $attrs['tahun'],
        ]);
    
        return redirect()->route('tes.index');
    }

    
    public function destroy($id)
    {
        $tes = Tes::find($id);
       
        $tes->delete();
    
        return redirect()->route('tes.index')->with('success', 'Tes berhasil dihapus');
    }


}
