<?php

namespace Database\Seeders\Presensi;

use App\Models\Presensi\GeneralSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //make generalSettingSeeder
        GeneralSetting::create([
            'office' => "Arunika Corporation",
            'address' => "Kuningan Blitar",
            'location' => "-8.111178600953243, 112.1846269571759",
            'radius' => 90,
            'time_in' => "08:00:00",
            'time_out' => "16:00:00",
            'tolerance_time' => 30,
            'admin_id' => 1,
        ]);
    }
}
