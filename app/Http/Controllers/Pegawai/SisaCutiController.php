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

            $carbonStart = null;
            $carbonEnd = null;
        } else {

            $sisaCuti = DB::table("cuti_sisas")
                ->join("users", "cuti_sisas.user_id", "=", "users.id")
                ->get();

            // dd($sisaCuti);

            foreach ($sisaCuti as $sisaCutiPerson) {

                $carbonNow = Carbon::now();
                $carbonStart = Carbon::createFromFormat('Y-m-d H:i:s', $sisaCutiPerson->waktu_mulai_pergantian);
                $carbonEnd = Carbon::createFromFormat('Y-m-d H:i:s', $sisaCutiPerson->waktu_selesai_pergantian);

                if ($carbonNow->timestamp >= $carbonEnd->timestamp) {

                    $newStart = $carbonStart->copy()->addHours(1);
                    // dd($newStart);

                    $newEnd = $newStart->copy()->addHours(1);
                    // dd($newEnd);

                    // dd($newStart->timestamp, $newEnd->timestamp);

                    // Hitung nilai baru untuk n, n_minus_1, dan n_minus_2
                    $n_previous = $sisaCutiPerson->n;            // Nilai n saat ini
                    $n_minus_1 = $sisaCutiPerson->n_minus_1;     // Nilai n_minus_1 (1 periode sebelumnya)
                    $n_minus_2 = $sisaCutiPerson->n_minus_2;     // Nilai n_minus_2 (2 periode sebelumnya)

                    // Simulasi tambahan cuti baru (12)
                    $tambahanCuti = 12;

                    $n_new = $n_previous + $tambahanCuti;

                    $updatedCuti = DB::table('cuti_sisas')->update([
                        "waktu_mulai_pergantian" => $newStart->toDateTimeString(),
                        "waktu_selesai_pergantian" => $newEnd->toDateTimeString(),
                        "n" => $n_new,
                        "n_minus_1" => $n_previous,
                        "n_minus_2" => $n_minus_1,
                        "cuti_dipakai" => 0
                    ]);
                }
            }

            $sisaCuti = DB::table("cuti_sisas")
                ->join("users", "cuti_sisas.user_id", "=", "users.id")
                ->where("users.name", "!=", "admin")
                ->orderBy("users.name", "ASC")
                ->paginate(8);
        }


        $year = Carbon::now()->year;

        return view('pegawai.perizinan.sisaCuti', compact("sisaCuti", "year", "carbonStart", "carbonEnd"));
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
