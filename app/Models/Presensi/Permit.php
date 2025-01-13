<?php

namespace App\Models\Presensi;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'admin_id',
        'apply_date',
        'duration',
        'information',
        'photo',
        'approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
