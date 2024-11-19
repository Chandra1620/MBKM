<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagementPerizinanLanjutanController extends Controller
{
    public function index(){

        $user = Auth::user();
        // dd($user->id);

        $perizinan = DB::table("perizinan_cuti_to_wadirs")
            ->join("users", "users.id", "=", "perizinan_cuti_to_wadirs.wadir_id")
            ->where("perizinan_cuti_to_wadirs.wadir_id", "=", $user->id)
            ->get();

        dd($perizinan);
            
        return view('management_perizinan_lanjutan.index', compact('perizinan'));
    }
}
