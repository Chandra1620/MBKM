<?php

namespace App\Http\Controllers\Pegawai;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SisaCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $count = DB::table("cuti_sisas")->count();

        $user = Auth::user();
        $year = Carbon::now()->year;

        if ($user->role == "pegawai") {
            $sisaCuti = DB::table("cuti_sisas")
                ->join("users", "cuti_sisas.user_id", "=", "users.id")
                ->where("user_id", $user->id)
                ->select("cuti_sisas.*", "users.*")
                ->paginate(8);
        } else {
            $sisaCuti = DB::table("cuti_sisas")
                ->join("users", "cuti_sisas.user_id", "=", "users.id")
                ->paginate(8);
        }

        // dd($sisaCuti);
        
        $year = Carbon::now()->year;

        return view('pegawai.perizinan.sisaCuti', compact("sisaCuti", "year"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
