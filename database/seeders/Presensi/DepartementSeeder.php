<?php

namespace Database\Seeders\Presensi;

use App\Models\Departemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departemen::truncate();

        $csvFile = fopen(base_path("database/data-seeder/user-seeder.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Departemen::create([
                    'name' => $data["1"],
                    'code' => $data["2"],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
