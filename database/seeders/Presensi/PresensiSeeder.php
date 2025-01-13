<?php

namespace Database\Seeders\Presensi;

use App\Models\Presensi\Presensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Presensi::truncate();

        $csvFile = fopen(base_path("database/data-seeder/presensi-seeder.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Presensi::create([
                    'user_id' => $data["1"],
                    'check_in' => $data["2"],
                    'check_out' => $data["3"],
                    'location_in' => $data["6"],
                    'status_attendance' => $data["8"],
                    'approved' => $data["9"],
                    'information' => $data["10"],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
