<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ecc_career_readiness_statements_choise extends Model
{
    protected $priamaryKey = 'id_choise';
    use HasFactory;
    public function test_input(): HasMany
    {
        return $this->hasMany(Ecc_career_readiness_test_input::class, '', '');
    }
}
