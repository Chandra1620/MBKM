<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\JabatanFungsional;
use App\Models\JenisCuti;
use App\Models\PegawaiFungsional;
use App\Models\PerizinanCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PerizinanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $year = now()->year; // Mengambil tahun saat ini
        // $perizinanCuti = PerizinanCuti::with(['user.tandaTangan', 'unitkerja.atasanlangsung.pegawaiStruktural.users.tandaTangan', 'unitkerja.jabatanberwenang.pegawaiStruktural'])->find($id);

        $totalRiwayatCuti = PerizinanCuti::where('user_id', $user->id)
            ->where('keputusan_pejabat_berwenang', 'diizinkan')
            ->whereYear('tgl_mulai', $year)
            ->get();

        $cutiTahunIni = 0;
        foreach ($totalRiwayatCuti as $cuti) {
            $start_date = new \DateTime($cuti->tgl_mulai);
            $end_date = new \DateTime($cuti->tgl_selesai);

            // Calculate the number of days between start and end dates
            $interval = $start_date->diff($end_date);
            $total_days = $interval->days + 1;

            // Exclude weekends (Saturday and Sunday)
            for ($i = 0; $i < $total_days; $i++) {
                $current_day = $start_date->format('N'); // 1 (Monday) to 7 (Sunday)
                if ($current_day != 6 && $current_day != 7) {
                    $cutiTahunIni++;
                }
                $start_date->add(new \DateInterval('P1D')); // Increment the date by 1 day
            }
        }

        // dd($cutiTahunIni);
        // //! tahun n -1
        $totalRiwayatCutiN1 = PerizinanCuti::where('user_id', $user->id)
            ->where('keputusan_pejabat_berwenang', 'diizinkan')
            ->whereYear('tgl_mulai', $year - 1)
            ->get();
        $cutiTahunIniN1 = 0;
        foreach ($totalRiwayatCutiN1 as $cuti) {
            $start_date = new \DateTime($cuti->tgl_mulai);
            $end_date = new \DateTime($cuti->tgl_selesai);

            // Calculate the number of days between start and end dates
            $interval = $start_date->diff($end_date);
            $total_days = $interval->days + 1;

            // Exclude weekends (Saturday and Sunday)
            for ($i = 0; $i < $total_days; $i++) {
                $current_day = $start_date->format('N'); // 1 (Monday) to 7 (Sunday)
                if ($current_day != 6 && $current_day != 7) {
                    $cutiTahunIniN1++;
                }
                $start_date->add(new \DateInterval('P1D')); // Increment the date by 1 day
            }
        }

        $sisaCutiN1 = 12 - $cutiTahunIniN1; //59
        if ($sisaCutiN1 >= 6) {
            $sisaCutiN1 = 6;
        } elseif ($sisaCutiN1 <= 0) {
            $sisaCutiN1 = 0;
        } else {
            $sisaCutiN1 = 12 - $cutiTahunIniN1; //59
        }

        // dd($cutiTahunIniN1);
        // //! end tahun n - 1

        // dd($cutiTahunIniN1);

        $sisaCuti = 12 - $cutiTahunIni;

        //59
        $totalCutiDiambil = $cutiTahunIni; //59
        // dd($totalRiwayatCuti);
        $perizinan = PerizinanCuti::where('user_id', $user->id)
            ->with('jeniscuti')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('pegawai.perizinan.index', compact(['perizinan', 'sisaCuti', 'totalCutiDiambil']));
    }

    public function create()
    {
        $jeniscuti = JenisCuti::all();
        return view('pegawai.perizinan.create', compact('jeniscuti'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $pegawaiFungsional = PegawaiFungsional::with('unit_kerja_has_jabatan_fungsional.unitkerja')
            ->where('user_id', $user->id)
            ->first();
        // dd($pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unitkerja->name);
        if (!$pegawaiFungsional) {
            // dd('buat jabatan fungsional terleih dalu');
            return redirect()
                ->route('perizinan-cuti.index')
                ->with('error', 'Anda Harus Memiliki Jabatan Fungsional dulu');
        }
        
        $attrs = $request->validate([
            'alasan' => 'required',
            'alamat_selama_cuti' => 'required',
            'jenis_cuti' => 'required|exists:jenis_cutis,id', // Pastikan jenis_cuti adalah ID yang valid
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'no_telp_bisa_dihubungi' => 'required'
        ]);

        $year = now()->year; // Mengambil tahun saat ini
        $totalRiwayatCuti = PerizinanCuti::where('user_id', $user->id)
            ->whereYear('tgl_mulai', $year)
            ->count();
        if ($totalRiwayatCuti > 60) {
            return redirect()
                ->route('perizinan-cuti.index')
                ->with('error', 'Anda Sudah Mengambil Jatah Cuti');
        }

        $perizinanCuti = new PerizinanCuti();

        $perizinanCuti->user_id = $user->id;
        $perizinanCuti->unit_kerja_id = $pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unitkerja->id;

        $perizinanCuti->alasan = $attrs['alasan'];
        $perizinanCuti->alamat_selama_cuti = $attrs['alamat_selama_cuti'];
        $perizinanCuti->jenis_cuti_id = $attrs['jenis_cuti'];
        $perizinanCuti->tgl_mulai = $attrs['tgl_mulai'];
        $perizinanCuti->tgl_selesai = $attrs['tgl_selesai'];
        $perizinanCuti->no_telp_bisa_dihubungi = $attrs['no_telp_bisa_dihubungi'];

        $perizinanCuti->save();
            
        $results = DB::table('riwayat_fungsionals')
        ->join('unit_kerja_has_jabatan_fungsionals', 'riwayat_fungsionals.unit_kerja_has_jabatan_fungsional_id', '=', 'unit_kerja_has_jabatan_fungsionals.id')
        ->select('riwayat_fungsionals.*', 'unit_kerja_has_jabatan_fungsionals.*')
        ->where("riwayat_fungsionals.user_id", "=", "$user->id")
        ->get()
        ->first();

        $data = [
            'name' => $user->name,
            'unit_kerja' => $pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unitkerja->name,
            'jabatan_fungsional' => $results->name,
            'nip' => $user->nip,
            'jenis_cuti' => $attrs["jenis_cuti"],
            'tax' => 20,
            'total' => 220,
            'images' => public_path('assets/test/pngwing.com.png'),
            'icon' => public_path('assets/icon/check.svg')
        ];
        
        // dd($data);

        $pdf = FacadePdf::loadView('pdf.test', data: $data);
        return $pdf->stream('Form Cuti.pdf');

        // return redirect()->route('perizinan-cuti.index');
    }

    public function edit($id)
    {
        $jabatan = JabatanFungsional::find($id);
        // dd($jabatan);
        if (!$jabatan) {
            return redirect()->route('jabatan-fungsional.index');
        }

        return view('admin.kepegawaian.jabatan_fungsional.edit', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
        $jabatan = JabatanFungsional::find($id);
        // dd($pegawai);
        if (!$jabatan) {
            dd('not found');
        }
        $attrs = $request->validate([
            'name' => 'required|unique:jabatan_fungsionals',
        ]);
        $jabatan->name = $attrs['name'];
        $jabatan->save();
        return redirect()->route('jabatan-fungsional.index');
    }

    public function destroy(Request $request, $id)
    {
        $perizinan = PerizinanCuti::find($id);
        if (!$perizinan) {
            return redirect()->route('perizinan-cuti.index');
        }
        $perizinan->delete();
        return redirect()->route('perizinan-cuti.index');
    }
    public function exportPdf($id)
    {
        $perizinanCuti = PerizinanCuti::with(['user.tandaTangan', 'unitkerja.atasanlangsung.pegawaiStruktural.users.tandaTangan', 'unitkerja.jabatanberwenang.pegawaiStruktural'])->find($id);
        // dd($perizinanCuti);
        if (!$perizinanCuti) {
            dd('nothing');
        }
        $jeniscuti = JenisCuti::all();

        $tandaTanganUser = $perizinanCuti->user->tandaTangan->link;

        $namaAtasanLangsung = '';
        $nipAtasanLangsung = '';
        if ($perizinanCuti->unitkerja->atasanlangsung) {
            if ($perizinanCuti->unitkerja->atasanlangsung->pegawaiStruktural) {
                if ($perizinanCuti->unitkerja->atasanlangsung->pegawaiStruktural->users) {
                    $namaAtasanLangsung = $perizinanCuti->unitkerja->atasanlangsung->pegawaiStruktural->users->name;
                    $nipAtasanLangsung = $perizinanCuti->unitkerja->atasanlangsung->pegawaiStruktural->users->nip;
                }
            }
        }
        // dd($tandaTanganAtasanLangsung);

        $namaPejabatBerwenang = '';
        $nipPejabatBerwenang = '';
        if ($perizinanCuti->unitkerja->jabatanberwenang) {
            if ($perizinanCuti->unitkerja->jabatanberwenang->pegawaiStruktural) {
                if ($perizinanCuti->unitkerja->jabatanberwenang->pegawaiStruktural->users) {
                    $namaPejabatBerwenang = $perizinanCuti->unitkerja->jabatanberwenang->pegawaiStruktural->users->name;
                    $nipPejabatBerwenang = $perizinanCuti->unitkerja->jabatanberwenang->pegawaiStruktural->users->nip;
                }
            }
        }
        // dd($tandaTanganWadir);

        $user = Auth::user();
        $year = now()->year; // Mengambil tahun saat ini

        //! tahun now
        $totalRiwayatCuti = PerizinanCuti::where('user_id', $user->id)
            ->where('keputusan_pejabat_berwenang', 'diizinkan')
            ->whereYear('tgl_mulai', $year)
            ->get();
        $cutiTahunIni = 0;
        foreach ($totalRiwayatCuti as $cuti) {
            $start_date = new \DateTime($cuti->tgl_mulai);
            $end_date = new \DateTime($cuti->tgl_selesai);

            // Calculate the number of days between start and end dates
            $interval = $start_date->diff($end_date);
            $total_days = $interval->days + 1;

            // Exclude weekends (Saturday and Sunday)
            for ($i = 0; $i < $total_days; $i++) {
                $current_day = $start_date->format('N'); // 1 (Monday) to 7 (Sunday)
                if ($current_day != 6 && $current_day != 7) {
                    $cutiTahunIni++;
                }
                $start_date->add(new \DateInterval('P1D')); // Increment the date by 1 day
            }
        }
        $totalLamanyaCuti = 1;
        $tgl_mulai = Carbon::parse($perizinanCuti->tgl_mulai);
        $tgl_selesai = Carbon::parse($perizinanCuti->tgl_selesai);
        // Menggunakan diffInDays untuk menghitung perbedaan dalam hari
        $totalLamanyaCuti += $tgl_mulai->diffInDays($tgl_selesai);
        $sisaCuti = 12 - $cutiTahunIni; //59
        $totalCutiDiambil = $cutiTahunIni; //59
        //! end tahun now

        // //! tahun n -1
        $totalRiwayatCutiN1 = PerizinanCuti::where('user_id', $user->id)
            ->where('keputusan_pejabat_berwenang', 'diizinkan')
            ->whereYear('tgl_mulai', $year - 1)
            ->get();
        $cutiTahunIniN1 = 0;
        foreach ($totalRiwayatCutiN1 as $cuti) {
            $start_date = new \DateTime($cuti->tgl_mulai);
            $end_date = new \DateTime($cuti->tgl_selesai);

            // Calculate the number of days between start and end dates
            $interval = $start_date->diff($end_date);
            $total_days = $interval->days + 1;

            // Exclude weekends (Saturday and Sunday)
            for ($i = 0; $i < $total_days; $i++) {
                $current_day = $start_date->format('N'); // 1 (Monday) to 7 (Sunday)
                if ($current_day != 6 && $current_day != 7) {
                    $cutiTahunIniN1++;
                }
                $start_date->add(new \DateInterval('P1D')); // Increment the date by 1 day
            }
        }
        $totalLamanyaCutiN1 = 1;
        $tgl_mulaiN1 = Carbon::parse($perizinanCuti->tgl_mulai);
        $tgl_selesaiN1 = Carbon::parse($perizinanCuti->tgl_selesai);
        // Menggunakan diffInDays untuk menghitung perbedaan dalam hari
        $totalLamanyaCutiN1 += $tgl_mulaiN1->diffInDays($tgl_selesaiN1);
        $sisaCutiN1 = 12 - $cutiTahunIniN1; //59
        if ($sisaCutiN1 >= 6) {
            $sisaCutiN1 = 6;
        } elseif ($sisaCutiN1 <= 0) {
            $sisaCutiN1 = 0;
        } else {
            $sisaCutiN1 = 12 - $cutiTahunIniN1; //59
        }
        // //! end tahun n - 1

        // //! tahun n - 2
        $totalRiwayatCutiN2 = PerizinanCuti::where('user_id', $user->id)
            ->where('keputusan_pejabat_berwenang', 'diizinkan')
            ->whereYear('tgl_mulai', $year - 2)
            ->get();
        $cutiTahunIniN2 = 0;
        foreach ($totalRiwayatCutiN2 as $cuti) {
            $start_date = new \DateTime($cuti->tgl_mulai);
            $end_date = new \DateTime($cuti->tgl_selesai);

            // Calculate the number of days between start and end dates
            $interval = $start_date->diff($end_date);
            $total_days = $interval->days + 1;

            // Exclude weekends (Saturday and Sunday)
            for ($i = 0; $i < $total_days; $i++) {
                $current_day = $start_date->format('N'); // 1 (Monday) to 7 (Sunday)
                if ($current_day != 6 && $current_day != 7) {
                    $cutiTahunIniN1++;
                }
                $start_date->add(new \DateInterval('P1D')); // Increment the date by 1 day
            }
        }
        $totalLamanyaCutiN2 = 1;
        $tgl_mulaiN2 = Carbon::parse($perizinanCuti->tgl_mulai);
        $tgl_selesaiN2 = Carbon::parse($perizinanCuti->tgl_selesai);
        // Menggunakan diffInDays untuk menghitung perbedaan dalam hari
        $totalLamanyaCutiN2 += $tgl_mulaiN2->diffInDays($tgl_selesaiN1);
        $sisaCutiN2 = 12 - $cutiTahunIniN2; //59
        if ($sisaCutiN2 >= 6) {
            $sisaCutiN2 = 6;
        } elseif ($sisaCutiN2 >= 1) {
            $sisaCutiN2 = 0;
        } else {
            $sisaCutiN2 = 12 - $cutiTahunIniN1; //59
        }
        // //! end tahun n - 2
        // dd($sisaCutiN2,$sisaCutiN1, $sisaCuti);

        // dd($tandaTanganAtasanLangsung);
        // gabole null
        // if ($tandaTanganUser) {
        //     $qrCodeUser = base64_encode(
        //         QrCode::format('svg')
        //             ->size(200)
        //             ->errorCorrection('H')
        //             ->generate($tandaTanganUser),
        //     );
        // } else {
        //     $qrCodeUser = '';
        // }
        // tanda tangan user

        // $tandaTanganUser
        // tanda tangan atasan langsung
        // if ($tandaTanganAtasanLangsung) {
        //     $qrCodeAtasanLangsung = base64_encode(
        //         QrCode::format('svg')
        //             ->size(200)
        //             ->errorCorrection('H')
        //             ->generate($tandaTanganAtasanLangsung),
        //     );
        // } else {
        //     $qrCodeAtasanLangsung = '';
        // }
        // tanda tangan wadir
        // if ($tandaTanganWadir) {
        //     $qrCodeWadir = base64_encode(
        //         QrCode::format('svg')
        //             ->size(200)
        //             ->errorCorrection('H')
        //             ->generate($tandaTanganWadir),
        //     );
        // } else {
        //     $qrCodeWadir = '';
        // }

        $carbonDate = Carbon::parse($perizinanCuti->created_at)->locale('id');

        $createdAtIndo = $carbonDate->format('d-m-Y H:i:s');
        // var_dump($perizinanCuti->created_at);

        // dd($createdAtIndo);

        // Pass the QR code to the view
        $host = request()->getHost();
        $port = request()->getPort();

        $qrCodeUrl = 'http://' . $host . ':' . $port . '/perizinan-cuti/' . $perizinanCuti->id . '/scan';
        // dd($qrCodeUrl);

        $qrCodePerizinan = base64_encode(
            QrCode::format('svg')
                ->size(200)
                ->errorCorrection('H')
                ->generate($qrCodeUrl),
        );


        // $qrCodeUser = $host.'/'.$perizinanCuti->id.'/scan';
        // $qrCodeAtasanLangsung = $host.'/'.$perizinanCuti->id.'/scan';
        // $qrCodeWadir =  $host.'/'.$perizinanCuti->id.'/scan';

        // dd($qrCodeUser);

        $pdf = PDF::loadView('admin.template.pdf_perizinan', compact('namaAtasanLangsung', 'nipAtasanLangsung', 'namaPejabatBerwenang', 'nipPejabatBerwenang', 'qrCodePerizinan', 'createdAtIndo', 'perizinanCuti', 'jeniscuti', 'sisaCuti', 'sisaCutiN1', 'sisaCutiN2', 'totalLamanyaCuti'));
        // Download the PDF
        return $pdf->download('periznan-cuti.pdf');
    }

    public function overview($id)
    {
        $perizinanCuti = PerizinanCuti::with(['user.pegawaiFungsional.unit_kerja_has_jabatan_fungsional'])->find($id);
        // dd($perizinanCuti);
        if (!$perizinanCuti) {
            dd('nothing');
        }
        $jeniscuti = JenisCuti::all();
        $tandaTanganAtasanLangsung = 'https://github.com/SimpleSoftwareIO/simple-qrcode';

        // Generate QR code
        $qrCode = base64_encode(
            QrCode::format('svg')
                ->size(200)
                ->errorCorrection('H')
                ->generate($tandaTanganAtasanLangsung),
        );
        // return $qrCode;

        // Pass the QR code and link to the view
        $user = Auth::user();
        $year = now()->year; // Mengambil tahun saat ini
        $totalRiwayatCuti = PerizinanCuti::where('user_id', $user->id)
            ->where('keputusan_pejabat_berwenang', 'diizinkan')
            ->whereYear('tgl_mulai', $year)
            ->get();

        $cutiTahunIni = 0;

        foreach ($totalRiwayatCuti as $cuti) {
            $start_date = new \DateTime($cuti->tgl_mulai);
            $end_date = new \DateTime($cuti->tgl_selesai);

            // Calculate the number of days between start and end dates
            $interval = $start_date->diff($end_date);
            $total_days = $interval->days + 1;

            // Exclude weekends (Saturday and Sunday)
            for ($i = 0; $i < $total_days; $i++) {
                $current_day = $start_date->format('N'); // 1 (Monday) to 7 (Sunday)
                if ($current_day != 6 && $current_day != 7) {
                    $cutiTahunIni++;
                }
                $start_date->add(new \DateInterval('P1D')); // Increment the date by 1 day
            }
        }

        $totalLamanyaCuti = 1;
        // $lamanyaCuti = PerizinanCuti::where('user_id', $user->id)
        // ->where('keputusan_pejabat_berwenang', 'diizinkan')
        // ->whereYear('tgl_mulai', $year)
        // ->get();

        $tgl_mulai = Carbon::parse($perizinanCuti->tgl_mulai);
        $tgl_selesai = Carbon::parse($perizinanCuti->tgl_selesai);

        // Menggunakan diffInDays untuk menghitung perbedaan dalam hari
        $totalLamanyaCuti += $tgl_mulai->diffInDays($tgl_selesai);

        // dd($cutiTahunIni);

        $sisaCuti = 12 - $cutiTahunIni; //59
        $totalCutiDiambil = $cutiTahunIni; //59

        return view('admin.template.pdf_perizinan', compact('qrCode', 'perizinanCuti', 'jeniscuti', 'sisaCuti', 'totalLamanyaCuti'));
    }

    public function outputScan($id)
    {
        $perizinanCuti = PerizinanCuti::with(['user.tandaTangan', 'unitkerja.atasanlangsung.pegawaiStruktural.users.tandaTangan', 'unitkerja.jabatanberwenang.pegawaiStruktural'])->find($id);
        if (!$perizinanCuti) {
            dd('nothing');
        }
        $year = now()->year;
        //! tahun now
        $totalRiwayatCuti = PerizinanCuti::where('user_id', $perizinanCuti->user_id)
            ->where('keputusan_pejabat_berwenang', 'diizinkan')
            ->whereYear('tgl_mulai', $year)
            ->get();
        $cutiTahunIni = 0;
        foreach ($totalRiwayatCuti as $cuti) {
            $start_date = new \DateTime($cuti->tgl_mulai);
            $end_date = new \DateTime($cuti->tgl_selesai);

            // Calculate the number of days between start and end dates
            $interval = $start_date->diff($end_date);
            $total_days = $interval->days + 1;

            // Exclude weekends (Saturday and Sunday)
            for ($i = 0; $i < $total_days; $i++) {
                $current_day = $start_date->format('N'); // 1 (Monday) to 7 (Sunday)
                if ($current_day != 6 && $current_day != 7) {
                    $cutiTahunIni++;
                }
                $start_date->add(new \DateInterval('P1D')); // Increment the date by 1 day
            }
        }
        $sisaCutiTahunIni = 12 - $cutiTahunIni;
        //! tahun now
        //! tahun 1 sbelumnya
        $totalRiwayatCutiN1 = PerizinanCuti::where('user_id', $perizinanCuti->user_id)
            ->where('keputusan_pejabat_berwenang', 'diizinkan')
            ->whereYear('tgl_mulai', $year - 1)
            ->get();
        $cutiTahunN1 = 0;
        foreach ($totalRiwayatCutiN1 as $cuti) {
            $start_date = new \DateTime($cuti->tgl_mulai);
            $end_date = new \DateTime($cuti->tgl_selesai);

            // Calculate the number of days between start and end dates
            $interval = $start_date->diff($end_date);
            $total_days = $interval->days + 1;

            // Exclude weekends (Saturday and Sunday)
            for ($i = 0; $i < $total_days; $i++) {
                $current_day = $start_date->format('N'); // 1 (Monday) to 7 (Sunday)
                if ($current_day != 6 && $current_day != 7) {
                    $cutiTahunIni++;
                }
                $start_date->add(new \DateInterval('P1D')); // Increment the date by 1 day
            }
        }
        $sisaCutiTahunN1 = 12 - $cutiTahunN1;
        if ($sisaCutiTahunN1 >= 6) {
            $sisaCutiTahunN1 = 6;
        } else if ($sisaCutiTahunN1 <= 0) {
            $sisaCutiTahunN1 = 0;
        } else {
            $sisaCutiTahunN1 = $cutiTahunN1;
        }
        //! tahun 1 sebelum now
        //! tahun 2 sbelumnya
        $totalRiwayatCutiN2 = PerizinanCuti::where('user_id', $perizinanCuti->user_id)
            ->where('keputusan_pejabat_berwenang', 'diizinkan')
            ->whereYear('tgl_mulai', $year - 2)
            ->get();
        $cutiTahunN2 = 0;
        foreach ($totalRiwayatCutiN1 as $cuti) {
            $start_date = new \DateTime($cuti->tgl_mulai);
            $end_date = new \DateTime($cuti->tgl_selesai);

            // Calculate the number of days between start and end dates
            $interval = $start_date->diff($end_date);
            $total_days = $interval->days + 1;

            // Exclude weekends (Saturday and Sunday)
            for ($i = 0; $i < $total_days; $i++) {
                $current_day = $start_date->format('N'); // 1 (Monday) to 7 (Sunday)
                if ($current_day != 6 && $current_day != 7) {
                    $cutiTahunIni++;
                }
                $start_date->add(new \DateInterval('P1D')); // Increment the date by 1 day
            }
        }
        $sisaCutiTahunN2 = 12 - $cutiTahunN2;
        if ($sisaCutiTahunN2 >= 6) {
            $sisaCutiTahunN2 = 6;
        } else if ($sisaCutiTahunN2 <= 0) {
            $sisaCutiTahunN2 = 0;
        } else {
            $sisaCutiTahunN2 = $cutiTahunN2;
        }
        //! tahun 1 sebelum now
        // dd($sisaCutiTahunN2);

        return view('pegawai.perizinan.scan', compact('perizinanCuti', 'sisaCutiTahunIni', 'sisaCutiTahunN1', 'sisaCutiTahunN2'));
    }

}
