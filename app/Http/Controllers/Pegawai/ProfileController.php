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

        // $getUser = $user->toArray();

        $kependudukan = Kependudukan::where('user_id', $user->id)->first();

        // dd($user->toArray());

        // dd($kependudukan);

        $keluarga = Keluarga::where('user_id', $user->id)->first();

        // dd($keluarga);

        $kepegawaian = Kepegawaian::where('user_id', $user->id)->first();

        // dd($kepegawaian);

        $alamatdankontak = AlamatdanKontak::where('user_id', $user->id)->first();

        // dd($alamatdankontak);

        $lainlain = Lainlain::where('user_id', $user->id)->first();

        // dd($lainlain);

        $pangkatgolongan = pangkat_golongan::where('user_id', $user->id)->latest()->first();

        // dd($pangkatgolongan);

        $tandaTangan = TandaTangan::where('user_id', $user->id)->first();

        $pegawaiFungsional = PegawaiFungsional::with('unit_kerja_has_jabatan_fungsional.unitkerja')->where('user_id', $user->id)->first();
        $pegawaiStruktural = PegawaiHasStruktural::with('jabatanStruktural')->where('users_id', $user->id)->first();

        //    dd($pegawaiStruktural);
        if ($tandaTangan->link) {
            $qrCodeTandaTangan = base64_encode(
                QrCode::format('svg')
                    ->size(200)
                    ->errorCorrection('H')
                    ->generate($tandaTangan->link),
            );
        } else {
            $qrCodeTandaTangan = "";
        }

        // Ignore Sementara


        $unitkerjaPegawai = "";
        $jabatanFungsionalPegawai = "";
        $jabatanStrukturalPegawai = "";
        if ($pegawaiFungsional) {
            $unitkerjaPegawai = $pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unitkerja->name;
            $jabatanFungsionalPegawai = $pegawaiFungsional->unit_kerja_has_jabatan_fungsional->name;
        }
        if ($pegawaiStruktural) {
            if ($pegawaiStruktural->jabatanStruktural) {
                $jabatanStrukturalPegawai = $pegawaiStruktural->jabatanStruktural->name;
            }
        }


        // dd($pegawaiFungsional);
        // dd($kepegawaian);
        // dd($getUser);
        // Inireturn

        return view('pegawai.profile.index', [
            'user' => $user,
            'kependudukan' => $kependudukan,
            'keluarga' => $keluarga,
            'kepegawaian' => $kepegawaian,
            'alamatdankontak' => $alamatdankontak,
            'lainlain' => $lainlain,
            'pangkat' => $pangkatgolongan,
            'tandaTangan' => $tandaTangan,
            'unitkerjaPegawai' => $unitkerjaPegawai,
            'jabatanFungsionalPegawai' => $jabatanFungsionalPegawai,
            'jabatanStrukturalPegawai' => $jabatanStrukturalPegawai,
            'qrCodeTandaTangan' => $qrCodeTandaTangan
        ]);
    }


    // PROFILE
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

        if ($request->file("photo")) {
            $imageName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('images/photo/'), $imageName);

            $attrs['photo'] = $imageName;
        }

        User::where('id', Auth::user()->id)->update($attrs);

        return redirect()
            ->route('profile.index')
            ->with('success', 'Profil berhasil diperbarui!');
    }
    // END PROFILE


    // KEDUDUKAN
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
            'file_pendukung' => 'max:2048'
        ]);


        $imageName = '';

        if ($request->hasFile('file_pendukung')) {
            $imageName = time() . '.' . $request->file('file_pendukung')->getClientOriginalExtension();
            $request->file('file_pendukung')->move(public_path('document/file_pendukung/'), $imageName);

            $attrs['file_pendukung'] = $imageName;
        }

        $user = Auth::user();
        Kependudukan::where('user_id', Auth::user()->id)->update($attrs);

        return redirect()
            ->route('profile.index')
            ->with('success', 'Kependudukan diperbarui atau dibuat jika tidak ada sebelumnya!');
    }
    // END KEDUDUKAN


    // KEPEGAWAIAN
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


    // END KEPEGAWAIAN


    // KELUARGA
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
            'file' => 'nullable'
        ]);


        $user = Auth::user();

        // Cari data keluarga berdasarkan user_id
        $keluarga = Keluarga::where('user_id', $user->id)->first();

        // Jika data tidak ditemukan, buat entri baru, jika ditemukan, update
        if (!$keluarga) {
            $keluarga = new Keluarga;
            $keluarga->user_id = $user->id;
        }

        // Jika status perkawinan tidak menikah, kosongkan nama pasangan dan pekerjaannya
        if ($attrs['status_perkawinan'] != 'menikah') {
            $keluarga->nama_pasangan = null;
            $keluarga->pekerjaan_pasangan = null;
        } else {
            $keluarga->nama_pasangan = $request->input('nama_pasangan');
            $keluarga->pekerjaan_pasangan = $request->input('pekerjaan_pasangan');
        }

        // Update status perkawinan
        $keluarga->status_perkawinan = $attrs['status_perkawinan'];

        // Jika ada file yang diupload, update file pendukung
        if ($request->hasFile('file_pendukung')) {
            $imageName = time() . '.' . $request->file('file_pendukung')->getClientOriginalExtension();
            $request->file('file_pendukung')->move(public_path('document/file_pendukung/'), $imageName);

            $attrs['file_pendukung'] = $imageName;
        }

        // Simpan perubahan (update atau insert jika entri baru)
        $keluarga->save();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Data keluarga berhasil diperbarui!');
    }
    // END KELUARGA


    // ALAMAT DAN KONTAK
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

        // Mencari data alamat dan kontak berdasarkan user_id
        $alamatKontak = AlamatdanKontak::where('user_id', $user->id)->first();

        // Jika data ditemukan, update dengan input yang baru
        if ($alamatKontak) {
            $alamatKontak->update([
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
        } else {
            // Jika data tidak ditemukan, Anda bisa memilih untuk membuat entri baru
            AlamatdanKontak::create([
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
        }

        return redirect()
            ->route('profile.index')
            ->with('success', 'Alamat dan kontak berhasil diperbarui!');
    }
    // END ALAMAT KONTAK


    // LAIN-LAIN
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

        // Cek apakah data sudah ada
        $user = Auth::user();
        $lainlain = Lainlain::where('user_id', $user->id)->first();

        $imageName = $lainlain->file_pendukung ?? ''; // Jika file lama ada, tetap simpan

        // Jika ada file yang di-upload, simpan file baru dan ganti nama file
        if ($request->file()) {
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('document/file_pendukung/'), $imageName);
        }

        // Jika data sudah ada, lakukan update
        if ($lainlain) {
            $lainlain->update([
                'npwp' => $attrs['npwp'],
                'nama_wajib_pajak' => $attrs['nama_wajib_pajak'],
                'file_pendukung' => $imageName
            ]);
        } else {
            // Jika data belum ada, buat entri baru
            Lainlain::create([
                'user_id' => $user->id,
                'npwp' => $attrs['npwp'],
                'nama_wajib_pajak' => $attrs['nama_wajib_pajak'],
                'file_pendukung' => $imageName
            ]);
        }

        return redirect()
            ->route('profile.index')
            ->with('success', 'Data lain-lain diperbarui atau dibuat jika tidak ada sebelumnya!');
    }
    // END LAIN-LAIN


    // TTD
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
        // validasi
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'required'
        ]);

        $user = Auth::user();

        $tandaTangan = TandaTangan::firstOrNew(['user_id' => $user->id]);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Check if an old image exists and delete it
            if ($tandaTangan->image) {
                $oldImage = public_path('images/tandatangan/' . $tandaTangan->image);
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            // Upload and store the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/tandatangan/'), $imageName);

            // Update the tandaTangan model with the new image name
            $tandaTangan->image = $imageName;
        }

        // Update the link (this happens regardless of image)
        $tandaTangan->link = $request->link;
        $tandaTangan->save();

        return redirect()->route('profile.index')->with('success', 'Tanda tangan diperbarui dengan sukses');
    }

    public function deleteTandaTangan()
    {
        $user = Auth::user();

        // 
        $tandaTangan = TandaTangan::where('user_id', $user->id)->first();

        // 
        if ($tandaTangan && $tandaTangan->image) {
            $oldImage = public_path('images/tandatangan/' . $tandaTangan->image);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            // Set the image field to null
            $tandaTangan->image = null;
            $tandaTangan->save();
        }

        return redirect()->route('profile.index')->with('success', 'Tanda tangan dihapus dengan sukses');
    }

    // END TTD



    public function downloadFilePendukung($name) {}
}
