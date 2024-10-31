<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\PegawaiHasAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatKehadiranController extends Controller
{
    public function index()
    {
        $kehadiran = PegawaiHasAbsensi::with('user')->where('user_id', Auth::user()->id)->paginate(8);
        return view('pegawai.presensi.riwayat_kehadiran.index', compact('kehadiran'));
    }

    public function absence()
    {
        return response()->json([
            'data' => PegawaiHasAbsensi::with('user')->where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function storeAttendance(Request $request)
    {
        $user = Auth::user();

        // Check if attendance for today already exists
        $existingAttendance = PegawaiHasAbsensi::where('user_id', $user->id)
                            ->whereDate('tanggal_kehadiran', now()->toDateString())
                            ->first();

        if ($existingAttendance) {
            return response()->json(['status' => 'error', 'message' => 'Kehadiran sudah dicatat untuk hari ini.'], 400);
        }

        // Create a new attendance record
        $attendance = new PegawaiHasAbsensi();
        $attendance->user_id = $user->id;
        $attendance->tanggal_kehadiran = now();
        $attendance->status = 'hadir';
        $attendance->jam_masuk = now();
        $attendance->save();

        return response()->json(['status' => 'success', 'message' => 'Kehadiran berhasil dicatat.']);
    }
}

