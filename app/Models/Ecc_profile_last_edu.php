<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecc_profile_last_edu extends Model
{
    protected $primaryKey = 'id_edu';
    use HasFactory;
    public function profile()
    {
        return $this->belongsTo(User::class);
    }
}
