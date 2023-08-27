<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ecc_personality_statemen_page extends Model
{
    use HasFactory;
    public function choices(): HasMany
    {
        return $this->hasMany(Ecc_personality_statemen_choisee::class);
    }
}
