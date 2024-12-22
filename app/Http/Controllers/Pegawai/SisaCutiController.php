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

   
    public function edit(string $id)
    {
        $year = Carbon::now()->year;
        
        $cuti = DB::table("cuti_sisas")
            ->join("users", "cuti_sisas.user_id", "=", "users.id")
            ->where("cuti_sisas.id", $id)
            ->select("cuti_sisas.*", "users.name", "users.nip")
            ->first();
        
        if (!$cuti) {
            return redirect()->route('sisa-cuti.index')->withErrors('Data tidak ditemukan.');
        }

        return view('pegawai.perizinan.editSisaCuti', compact('cuti' ,'year'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'n' => 'required|numeric|min:0',
            'n_minus_1' => 'required|numeric|min:0',
            'n_minus_2' => 'required|numeric|min:0',
        ]);

        $updated = DB::table("cuti_sisas")->where("id", $id)->update([
            "n" => $request->input("n"),
            "n_minus_1" => $request->input("n_minus_1"),
            "n_minus_2" => $request->input("n_minus_2"),
        ]);

        if ($updated) {
            return redirect()->route('sisa-cuti.index')->with('success', 'Data Sisa Cuti berhasil diperbarui.');
        } else {
            return redirect()->route('sisa-cuti.index')->withErrors('Gagal memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
