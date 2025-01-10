<?php

namespace App\Models\Presensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    public $fillable = [
        'office',
        'address',
        'location',
        'radius',
        'time_in',
        'time_out',
        'tolerance_time',
        'admin_id',
    ];
}
