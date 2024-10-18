<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Diklat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiklatController extends Controller
{
    public function index()
    {
        $diklat = Diklat::paginate(8);
        // dd($diklat);
        return view('pegawai.diklat.pelatihan', compact('diklat'));
    }

    public function store(Request $request)
    {
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
            'nomor_sk_penugasan' => 'required',
            'tanggal_sk_penugasan' => 'required',
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
            'nomor_sk_penugasan' => $attrs['nomor_sk_penugasan'],
            'tanggal_sk_penugasan' => $attrs['tanggal_sk_penugasan'],
        ]);

        return redirect()->route('diklat.index')->with('success', 'berhasil');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $attrs = $request->validate([
            'jenis' => 'required|string',
            'nama' => 'required|string',
            'penyelenggara' => 'required|string',
            'peran' => 'required|string',
            'tingkat_diklat' => 'required|string',
            'jumlah_jam' => 'required|integer',
            'no_sertifikat' => 'required|string',
            'tingkat_diklat' => 'required|string',
            'tgl_sertifikat' => 'required|date',
            'tahun_penyelenggaraan' => 'required|integer',
            'tempat' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'nomor_sk_penugasan' => 'required|string',
            'tanggal_sk_penugasan' => 'required|date',
        ]);

        // Cek apakah data diklat ditemukan
        $diklat = Diklat::find($id);

        if (!$diklat) {
            return abort(404, 'Data Diklat tidak ditemukan');
        }

        // Update data diklat
        $diklat->jenis = $attrs['jenis'];
        $diklat->nama = $attrs['nama'];
        $diklat->penyelenggara = $attrs['penyelenggara'];
        $diklat->peran = $attrs['peran'];
        $diklat->tingkat_diklat = $attrs['tingkat_diklat'];
        $diklat->jumlah_jam = $attrs['jumlah_jam'];
        $diklat->no_sertifikat = $attrs['no_sertifikat'];
        $diklat->tingkat_diklat = $attrs['tingkat_diklat'];
        $diklat->tgl_sertifikat = $attrs['tgl_sertifikat'];
        $diklat->tahun_penyelenggaraan = $attrs['tahun_penyelenggaraan'];
        $diklat->tempat = $attrs['tempat'];
        $diklat->tanggal_mulai = $attrs['tanggal_mulai'];
        $diklat->tanggal_selesai = $attrs['tanggal_selesai'];
        $diklat->nomor_sk_penugasan = $attrs['nomor_sk_penugasan'];
        $diklat->tanggal_sk_penugasan = $attrs['tanggal_sk_penugasan'];

        // Simpan perubahan
        $diklat->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('diklat.index')->with('success', 'Berhasil mengubah data pelatihan');
    }

    public function info($id)
    {
        $diklat = Diklat::find($id);

        if (!$diklat) {
            return redirect()->route('diklat')->with('error', 'Data tidak ditemukan');
        }

        return view('pegawai.diklat.info', compact('diklat'));
    }

    public function delete($id)
    {
        $diklat = Diklat::find($id);
        if (!$diklat) {
            return redirect()->route('diklat.index');
        }
        $diklat->delete();
        return redirect()->route('diklat.index')->with('success', 'berhasil');
    }

    public function edit($id)
    {
        $diklat = Diklat::find($id);

        // Jika data tidak ditemukan, redirect ke halaman index dengan pesan error
        if (!$diklat) {
            return redirect()->route('diklat.index')->with('error', 'Data pelatihan tidak ditemukan.');
        }

        // Mengembalikan tampilan edit dengan data pendidikan yang ditemukan
        return view('pegawai.diklat.edit', compact('diklat'));
    }
}
