<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\AlamatdanKontak;
use App\Models\Keluarga;
use App\Models\Kepegawaian;
use App\Models\Kependudukan;
use App\Models\Lainlain;
use App\Models\pangkat_golongan;
use App\Models\PegawaiFungsional;
use App\Models\PegawaiHasStruktural;
use App\Models\RiwayatAlamatdanKontak;
use App\Models\RiwayatKeluarga;
use App\Models\RiwayatKependudukan;
use App\Models\RiwayatLainlain;
use App\Models\RiwayatProfile;
use App\Models\TandaTangan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Colors\Profile;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->input('tahun'));

        $user = Auth::user();

        $getUser = $user->toArray();

        // $kependudukan = Kependudukan::where('user_id', $user->id)->first();

        // dd($user->toArray());

        // dd($kependudukan);

        // $keluarga = Keluarga::where('user_id', $user->id)->first();

        // dd($keluarga);

        // $kepegawaian = Kepegawaian::where('user_id', $user->id)->first();

        // dd($kepegawaian);

        // $alamatdankontak = AlamatdanKontak::where('user_id', $user->id)->first();

        // dd($alamatdankontak);

        // $lainlain = Lainlain::where('user_id', $user->id)->first();

        // dd($lainlain);

        // $pangkatgolongan = pangkat_golongan::where('user_id', $user->id)->latest()->first();

        // dd($pangkatgolongan);

        // $tandaTangan = TandaTangan::where('user_id', $user->id)->first();

        $pegawaiFungsional = PegawaiFungsional::with('unit_kerja_has_jabatan_fungsional.unitkerja')->where('user_id',$user->id)->first();
        $pegawaiStruktural = PegawaiHasStruktural::with('jabatanStruktural')->where('users_id',$user->id)->first();
    //    dd($pegawaiStruktural);

        // if($tandaTangan->link){
        //     $qrCodeTandaTangan = base64_encode(
        //         QrCode::format('svg')
        //             ->size(200)
        //             ->errorCorrection('H')
        //             ->generate($tandaTangan->link),
        //     );
        // }else{
        //     $qrCodeTandaTangan = "";
        // }


        // Ignore Sementara


        $unitkerjaPegawai = "";
        $jabatanFungsionalPegawai = "";
        $jabatanStrukturalPegawai = "";
        if($pegawaiFungsional){
            $unitkerjaPegawai = $pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unitkerja->name;
            $jabatanFungsionalPegawai = $pegawaiFungsional->unit_kerja_has_jabatan_fungsional->name;
        }
        if($pegawaiStruktural){
            if($pegawaiStruktural->jabatanStruktural){
                $jabatanStrukturalPegawai = $pegawaiStruktural->jabatanStruktural->name;

            }
        }


        // dd($pegawaiFungsional);
        // dd($kepegawaian);

        // dd($getUser);
        // Inireturn

        // return view('pegawai.profile.index', [
        //     'user' => $user,
        //     'kependudukan' => $kependudukan,
        //     'keluarga' => $keluarga,
        //     'kepegawaian' => $kepegawaian,
        //     'alamatdankontak' => $alamatdankontak,
        //     'lainlain'=>$lainlain,
        //     'pangkat'=>$pangkatgolongan,
        //     'tandaTangan' => $tandaTangan,
        //     'unitkerjaPegawai' => $unitkerjaPegawai,
        //     'jabatanFungsionalPegawai' => $jabatanFungsionalPegawai,
        //     'jabatanStrukturalPegawai' => $jabatanStrukturalPegawai,
        //     'qrCodeTandaTangan' => $qrCodeTandaTangan
        // ]);
    }

    public function editProfile(Request $request)
    {
        $user = Auth::user();

        return view('pegawai.profile.edit_profil', [
            'user' => $user,
        ]);
    }

    public function storeProfile(Request $request)
    {
        // dd($request->file_pendukung);
        // dd($request->all());
        
        $attrs = $request->validate([
            'name' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nama_ibu' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required'
        ]);


        //!start
        $imageName = '';
        if ($request->file()) {
            if ($request->file) {
                $imageName = time() . '.' . $request->file->extension();
                $request->file->move(public_path('images/photo/'), $imageName);
            }
        }

        // Tugas: Ini nanti diganti ke Update Tabel yang dari user

        User::where('id', Auth::user()->id)->update($attrs);

        //!end


        // $userid = Auth::user()->id;
        // $user = User::find($userid);
        // $user->nip = $attrs['nip'];
        // $user->name = $attrs['name'];
        // $user->email = $attrs['email'];
        // $user->jenis_kelamin = $attrs['jk'];
        // $user->tempat_lahir = $attrs['tempat_lahir'];
        // $user->tanggal_lahir = $attrs['tanggal_lahir'];
        // $user->nama_ibu = $attrs['nama_ibu'];
        // if($request->file()){
        //     if($request->file){
        //         if ($user->photo) {
        //             $oldImage = public_path('images/photo/' . $user->photo);
        //             if (file_exists($oldImage)) {
        //                 unlink($oldImage);
        //             }
        //         }

        //         $imageName = time() . '.' . $request->file->extension();
        //         $request->file->move(public_path('images/photo/'), $imageName);
        //         $user->photo = $imageName;
        //     }
        // }

        // $user->update();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Profil berhasil diperbarui!');
        
    }

    public function editKedudukan()
    {
        $user = Auth::user();
        $kependudukan = Kependudukan::where('user_id', $user->id)->first();

        return view('pegawai.profile.edit_kedudukan', [
            'kependudukan' => $kependudukan
        ]);
    }

    public function updateKedudukan(Request $request)
    {

        $attrs = $request->validate([
            'nik' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'file' => 'max:2048'
        ]);


        $imageName = '';

        if ($request->file()) {
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('document/file_pendukung/'), $imageName);
        }

        $user = Auth::user();

        RiwayatKependudukan::create([
            'user_id' => $user->id,
            'nik' => $attrs['nik'],
            'agama' => $attrs['agama'],
            'kewarganegaraan' => $attrs['kewarganegaraan'],
            'file_pendukung' => $imageName
        ]);




        // $kedudukan = Kependudukan::where('user_id', $user->id)->first();
        // $kedudukan->nik = $request->input('nik');
        // $kedudukan->agama = $request->input('agama');
        // $kedudukan->kewarganegaraan = $request->input('kewarganegaraan');
        // if($request->file()){
        //     if ($kedudukan->file_pendukung) {
        //         $oldImage = public_path('document/file_pendukung/' . $kedudukan->file_pendukung);
        //         if (file_exists($oldImage)) {
        //             unlink($oldImage);
        //         }
        //     }
        //     $imageName = time() . '.' . $request->file->extension();
        //     $request->file->move(public_path('document/file_pendukung/'), $imageName);
        //     $kedudukan->file_pendukung = $imageName;
        // }
        // $kedudukan->save();
        return redirect()
            ->route('profile.index')
            ->with('success', 'Kependudukan diperbarui atau dibuat jika tidak ada sebelumnya!');
    }

    public function editKepegawaian()
    {

        $user = Auth::user();
        $kepegawaian = Kepegawaian::where('user_id', $user->id)->first();

        return view('pegawai.profile.edit_kepegawaian', [
            'kepegawaian' => $kepegawaian
        ]);
    }

    public function updateKepegawaian(Request $request)
    {

        $user = Auth::user();
        $kepegawaian = Kepegawaian::where('user_id', $user->id)->first();
        // dd($request->all());
        $kepegawaian->jabatan_fungsional = $request->input('jabatan_fungsional');
        $kepegawaian->unit_jurusan = $request->input('unit_jurusan');
        $kepegawaian->jabatan_struktural = $request->input('jabatan_struktural');

        $kepegawaian->update();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Kependudukan diperbarui atau dibuat jika tidak ada sebelumnya!');

    }

    public function editKeluarga()
    {

        $user = Auth::user();
        $keluarga = Keluarga::where('user_id', $user->id)->first();

        return view('pegawai.profile.edit_keluarga', [
            'keluarga' => $keluarga
        ]);
    }

    public function updateKeluarga(Request $request)
    {
        $attrs = $request->validate([
            'status_perkawinan' => 'required',
        ]);
        $user = Auth::user();

        $keluarga = new RiwayatKeluarga;
        if ($attrs['status_perkawinan'] != 'menikah') {
            $keluarga->nama_pasangan = "";
            $keluarga->pekerjaan_pasangan = "";
        } else {
            $keluarga->nama_pasangan = $request->input('nama_pasangan');
            $keluarga->pekerjaan_pasangan = $request->input('pekerjaan_pasangan');
        }
        $keluarga->status_perkawinan = $request->input('status_perkawinan');
        if ($request->file()) {
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('document/file_pendukung/'), $imageName);
            $keluarga->file_pendukung = $imageName;
        }
        $keluarga->user_id = $user->id;
        $keluarga->save();


        // $keluarga = Keluarga::where('user_id', $user->id)->first();
        // if( $attrs['status_perkawinan'] != 'menikah' ){
        //     $keluarga->nama_pasangan = "";
        //     $keluarga->pekerjaan_pasangan = "";
        // }else{
        //     $keluarga->nama_pasangan = $request->input('nama_pasangan');
        //     $keluarga->pekerjaan_pasangan = $request->input('pekerjaan_pasangan');
        // }
        // $keluarga->status_perkawinan = $request->input('status_perkawinan');
        // if($request->file()){
        //     if ($keluarga->file_pendukung) {
        //         $oldImage = public_path('document/file_pendukung/' . $keluarga->file_pendukung);
        //         if (file_exists($oldImage)) {
        //             unlink($oldImage);
        //         }
        //     }
        //     $imageName = time() . '.' . $request->file->extension();
        //     $request->file->move(public_path('document/file_pendukung/'), $imageName);
        //     $keluarga->file_pendukung = $imageName;
        // }
        // $keluarga->update();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Kependudukan diperbarui atau dibuat jika tidak ada sebelumnya!');
    }


    public function editAlamatkontak()
    {

        $user = Auth::user();
        $alamatdankontak = AlamatdanKontak::where('user_id', $user->id)->first();

        return view('pegawai.profile.edit_alamatkontak', [
            'alamatdankontak' => $alamatdankontak
        ]);
    }

    public function updateAlamatkontak(Request $request)
    {
        $user = Auth::user();
        // dd($request->all());

        RiwayatAlamatdanKontak::create([
            'user_id' => $user->id,
            'provinsi' => $request->input('nama_provinsi'),
            'kota' => $request->input('nama_kabupaten'),
            'kecamatan' => $request->input('nama_kecamatan'),
            'desa_kelurahan' => $request->input('nama_desa'),
            'rt' => $request->input('rt'),
            'rw' => $request->input('rw'),
            'kodepos' => $request->input('kodepos'),
            'alamat' => $request->input('alamat'),
            'no_telp_rumah' => $request->input('no_telp_rumah'),
            'no_hp' => $request->input('no_hp'),
        ]);

        // $alamatdankontak = AlamatdanKontak ::where('user_id', $user->id)->first();
        // $alamatdankontak->provinsi = $request->input('nama_provinsi'); // clear
        // $alamatdankontak->kota = $request->input('nama_kabupaten'); // clear
        // $alamatdankontak->kecamatan = $request->input('nama_kecamatan');
        // $alamatdankontak->desa_kelurahan = $request->input('nama_desa');
        // $alamatdankontak->rt = $request->input('rt');
        // $alamatdankontak->rw = $request->input('rw');
        // $alamatdankontak->alamat = $request->input('alamat');
        // $alamatdankontak->kodepos = $request->input('kodepos');
        // $alamatdankontak->no_telp_rumah = $request->input('no_telp_rumah');
        // $alamatdankontak->no_hp = $request->input('no_hp');

        // $alamatdankontak->update();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Kependudukan diperbarui atau dibuat jika tidak ada sebelumnya!');
    }


    public function editLainlain()
    {

        $user = Auth::user();
        $lainlain = Lainlain::where('user_id', $user->id)->first();

        return view('pegawai.profile.edit_lainlain', [
            'lainlain' => $lainlain
        ]);
    }

    public function updateLainlain(Request $request)
    {
        $attrs = $request->validate([
            'npwp' => 'required',
            'nama_wajib_pajak' => 'required',
        ]);
        // dd($request->all());
        // $user = Auth::user();
        $imageName = '';
        if ($request->file()) {

            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('document/file_pendukung/'), $imageName);
        }
        RiwayatLainlain::create([
            'user_id' => Auth::user()->id,
            'npwp' => $attrs['npwp'],
            'nama_wajib_pajak' => $attrs['nama_wajib_pajak'],
            'file_pendukung' => $imageName
        ]);
        // $lainlain = Lainlain ::where('user_id', $user->id)->first();

        // $lainlain->npwp = $request->input('npwp');
        // $lainlain->nama_wajib_pajak = $request->input('nama_wajib_pajak');
        // if($request->file()){
        //     if ($lainlain->file_pendukung) {
        //         $oldImage = public_path('document/file_pendukung/' . $lainlain->file_pendukung);
        //         if (file_exists($oldImage)) {
        //             unlink($oldImage);
        //         }
        //     }
        //     $imageName = time() . '.' . $request->file->extension();
        //     $request->file->move(public_path('document/file_pendukung/'), $imageName);
        //     $lainlain->file_pendukung = $imageName;
        // }
        // $lainlain->update();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Kependudukan diperbarui atau dibuat jika tidak ada sebelumnya!');
    }

    public function editTandaTangan()
    {

        $user = Auth::user();
        $tandaTangan = TandaTangan::where('user_id', $user->id)->first();
        return view('pegawai.profile.edit_tandatangan', [
            'tandaTangan' => $tandaTangan
        ]);
    }
    public function updateTandaTangan(Request $request)
    {
        // dd($request->all());

        // Validate the request
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'required'
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Find the user's existing tandaTangan or create a new one
        $tandaTangan = TandaTangan::firstOrNew(['user_id' => $user->id]);

        // // Check if an old image exists and delete it
        // if ($tandaTangan->image) {
        //     $oldImage = public_path('images/tandatangan/' . $tandaTangan->image);
        //     if (file_exists($oldImage)) {
        //         unlink($oldImage);
        //     }
        // }

        // // Upload and store the new image
        // $imageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images/tandatangan/'), $imageName);

        // // Update the tandaTangan model with the new image name
        // $tandaTangan->image = $imageName;
        $tandaTangan->link = $request->link;
        $tandaTangan->save();

        return redirect()->route('profile.index')->with('success', 'Profile image updated successfully');
    }

    public function deleteTandaTangan()
    {
        $user = Auth::user();

        // Find the user's existing tandaTangan or create a new one
        $tandaTangan = TandaTangan::firstOrNew(['user_id' => $user->id]);

        // Check if an old image exists and delete it
        if ($tandaTangan->image) {
            $oldImage = public_path('images/tandatangan/' . $tandaTangan->image);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }

        $tandaTangan->image = null;
        $tandaTangan->save();

        return redirect()->route('profile.index')->with('success', 'Profile image updated successfully');
    }



    public function downloadFilePendukung($name)
    {

    }



}
