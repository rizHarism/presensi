<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Departemen;
use App\Models\User;
use Database\Seeders\Presensi\GeneralSettingSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Rizqi Harisma',
            'email' => 'Admin@mail.com',
            'username' => 'Administrator',
            'gender' => "Laki-laki",
            'position' => "Staff IT",
            'phone' => '0812345678',
            'avatar' => 'avatar-default',
            'departement_id' => 1,
            'role' => "Administrator",
            'password' => bcrypt('password'),
        ]);

        Departemen::create([
            'name' => 'Manajemen Information And Technical',
            'code' => '0.1',
        ]);

        $this->call([
            GeneralSettingSeeder::class
        ]);
    }
}
