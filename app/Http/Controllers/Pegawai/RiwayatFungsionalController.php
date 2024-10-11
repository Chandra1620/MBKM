<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\PegawaiFungsional;
use App\Models\RiwayatFungsional;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RiwayatFungsionalController extends Controller
{
    public function index()
    {
        $riwayat_fungsional = RiwayatFungsional::with('jabatanfungsional.unitkerja')->where('user_id', Auth::user()->id)->get();
        //    dd($riwayat_fungsional);
        return view('pegawai.jabatan.jabatan_fungsional.index', compact('riwayat_fungsional'));
    }


    public function create()
    {
        $riwayat_fungsional = RiwayatFungsional::all();
        $unitKerja = UnitKerja::with('jabatanfungsional')->get();

        // dd($riwayat_fungsional);
        return view('pegawai.jabatan.jabatan_fungsional.create', compact('riwayat_fungsional', 'unitKerja'));
    }


    public function store(Request $request)
    {
        $attrs = $request->validate([
            'jabatan_fungsional' => 'required',
            'jabatan_id' => 'required',
            'nomor_sk' => 'required',
            'tanggal_mulai' => 'required',
            'dokumen_pendukung' => 'required',

        ]);

        if ($request->file('dokumen_pendukung')) {
            $fileDocumentName = time() . '.' . $request->file('dokumen_pendukung')->extension();
            $request->file('dokumen_pendukung')->move(public_path('document/riwayat_fungsional/'), $fileDocumentName);
        }

        RiwayatFungsional::create([
            'user_id' => Auth::user()->id,
            'unit_kerja_has_jabatan_fungsional_id' => $attrs['jabatan_id'],
            'jabatan_fungsional' => $attrs['jabatan_fungsional'],
            'nomor_sk' => $attrs['nomor_sk'],
            'tanggal_mulai' => $attrs['tanggal_mulai'],
            'dokumen_pendukung' => $fileDocumentName,

        ]);

        PegawaiFungsional::create([
            'user_id' => Auth::user()->id,
            'unit_kerja_has_jabatan_fungsional_id' => $attrs['jabatan_id'],
        ]);

        return redirect()->route('riwayat-fungsional');
    }

    public function lihatDokumen($id)
    {
        $riwayat_fungsional = RiwayatFungsional::find($id);

        if (!$riwayat_fungsional) {
            return redirect()->back()->with('error', 'Riwayat Fungsional tidak ditemukan.');
        }

        $filePath = $riwayat_fungsional->dokumen;

        if (!$filePath || !Storage::exists($filePath)) {
            return redirect()->back()->with('error', 'Dokumen tidak tersedia untuk Riwayat Fungsional ini.');
        }

        $mimeType = Storage::mimeType($filePath);

        if ($mimeType !== 'application/pdf') {
            return redirect()->back()->with('error', 'Hanya file PDF yang dapat ditampilkan.');
        }

        return response()->file(storage_path('app/' . $filePath));
    }


    // public function lihatDokumen($id)
    // {
    //     $riwayat_fungsional = RiwayatFungsional::find($id);

    //     if (!$riwayat_fungsional) {
    //         abort(404, 'Riwayat Fungsional tidak ditemukan.');
    //     }

    //     $pathToFile = storage_path('app/' . $riwayat_fungsional->dokumen);

    //     if (!Storage::exists($pathToFile)) {
    //         abort(404, 'Dokumen tidak tersedia untuk Riwayat Fungsional ini.');
    //     }

    //     $mimeType = Storage::mimeType($pathToFile);

    //     if ($mimeType !== 'application/pdf') {
    //         return redirect()->back()->with('error', 'Hanya file PDF yang dapat ditampilkan.');
    //     }

    //     return response()->file($pathToFile);
    // }




    //     public function lihatDokumen($id)
// {
//     $riwayat_fungsional = RiwayatFungsional::find($id);

    //     if (!$riwayat_fungsional) {
//         return redirect()->back()->with('error', 'Riwayat Fungsional tidak ditemukan.');
//     }

    //     if ($riwayat_fungsional->dokumen) {
//         $pathToFile = storage_path('app/' . $riwayat_fungsional->dokumen);

    //         // Mengambil ekstensi file untuk memeriksa jenis file
//         $fileExtension = pathinfo($pathToFile, PATHINFO_EXTENSION);

    //         if (strtolower($fileExtension) === 'pdf') {
//             // Jika dokumen adalah file PDF, kirimkan file sebagai respons
//             return response()->file($pathToFile);
//         } else {
//             return redirect()->back()->with('error', 'Hanya file PDF yang dapat ditampilkan.');
//         }
//     } else {
//         return redirect()->back()->with('error', 'Dokumen tidak tersedia untuk Riwayat Fungsional ini.');
//     }
// }
    // public function lihatDokumen($id){

    //     $riwayat_fungsional = RiwayatFungsional::find($id);
    //     if (!$riwayat_fungsional) {
    //         // Jika riwayat fungsional dengan ID yang diberikan tidak ditemukan
    //         return redirect()->back()->with('error', 'Riwayat Fungsional tidak ditemukan.');
    //     }

    //     // Mengecek apakah dokumen ada atau tidak
    //     if ($riwayat_fungsional->dokumen) {
    //         // Jika ada dokumen terkait, lakukan logika untuk menampilkan dokumen
    //         $pathToFile = storage_path('app/' . $riwayat_fungsional->dokumen);

    //         // Contoh: Jika dokumen berupa file PDF, kirimkan file sebagai respons
    //         return response()->file($pathToFile);

    //         // Anda perlu mengganti logika ini sesuai dengan jenis dokumen dan struktur penyimpanan Anda
    //     } else {
    //         return redirect()->back()->with('error', 'Dokumen tidak tersedia untuk Riwayat Fungsional ini.');
    //     }
    // }


    public function delete($id)
    {
        $riwayat_fungsional = RiwayatFungsional::find($id);
        // dd($sertifikasi);
        // Hapus data sertifikasi dari basis data
        $riwayat_fungsional->delete();

        return redirect()->route('riwayat-fungsional')->with('success', 'Riwayat jabatan fungsional berhasil dihapus');
    }

}
