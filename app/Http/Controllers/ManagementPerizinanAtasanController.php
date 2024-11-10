<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagementPerizinanAtasanController extends Controller
{
    public function index() {
        $user = Auth::user();

        $perizinan = DB::table('perizinan_cutis')
            ->join('users', 'users.id', '=', 'perizinan_cutis.user_id')
            ->join('atasan_langsung', 'atasan_langsung.user_id', '=', 'perizinan_cutis.user_id')
            ->where('atasan_langsung.user_has_atasan_id', $user->id)
            ->where('perizinan_cutis.verifikasi_admin', "!=", null)
            ->select('perizinan_cutis.*', 'users.*', 'atasan_langsung.*')
            ->paginate(8);

        // dd($perizinan);
        return view("atasan.index", compact('perizinan'));
    }
    public function verifikasi($id) {
        /**
         * Verifikasi perizinan cuti atasan langsung
         */
        return $id;
    }
    public function stream($id) {
        
    }
    public function ditolak($id) {

    }
}
