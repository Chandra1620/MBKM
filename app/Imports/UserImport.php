<?php

namespace App\Imports;

use App\Models\PegawaiHasAbsensi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        $hitung = 0;
        foreach ($collection as $index => $item) {
            // Skip the first row (index 0)
            if ($index === 0) {
                continue;
            }
    
            $tanggal = $item[5];
    
            // Base date for Excel's epoch (1900-01-01)
            $baseDate = Carbon::createFromDate(1899, 12, 30);
    
            // Adding the number of days to the base date
            try {
                $dateObj = $baseDate->addDays($tanggal);
            } catch (\Exception $e) {
                // Handle the error, log it, or skip the iteration
                continue;
            }
    
            // Format the date if needed
            $formattedDate = $dateObj->format('Y-m-d');
            // dd($formattedDate);

    
            // Check NIP
            $user = User::where('nip', $item[2])->first();
            if ($user) {
                // Uncomment the condition if you want to check for a specific NIP
                // if ($user->nip == '2105006') {
                //     dd('digital alliance');
                // }
                $hitung++;
                $userHasAbsence = PegawaiHasAbsensi::where('tanggal_kehadiran', $formattedDate)->where('user_id',$user->id) ->first();
                if ($userHasAbsence) {
                    // Edit
                    $userHasAbsence->jam_masuk = $item[7];
                    $userHasAbsence->jam_keluar = $item[8];
                    $userHasAbsence->status = $item[6];
                    $userHasAbsence->save();
                } else {
                    // Create new data
                    PegawaiHasAbsensi::create([
                        'user_id' => $user->id,
                        'jam_masuk' => $item[7],
                        'jam_keluar' => $item[8],
                        'tanggal_kehadiran' => $formattedDate,
                        'status' => $item[6],
                    ]);
                }
            }

        }

        // dd($hitung);
    }
    
}
