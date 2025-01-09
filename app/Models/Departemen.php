<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'departement_id', 'id');
    }
}
