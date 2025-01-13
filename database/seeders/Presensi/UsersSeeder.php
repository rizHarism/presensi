<?php

namespace Database\Seeders\Presensi;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::truncate();

        $csvFile = fopen(base_path("database/data-seeder/user-seeder.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                User::create([
                    'name' => $data["1"],
                    'email' => $data["2"],
                    'username' => $data["3"],
                    'gender' => $data["4"],
                    'position' => $data["5"],
                    'phone' => $data["6"],
                    'avatar' => $data["7"],
                    'departement_id' => $data["8"],
                    'role' => $data["9"],
                    'password' => bcrypt('password'),
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
