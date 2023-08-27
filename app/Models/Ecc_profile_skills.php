<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ecc_profile_skills extends Model
{
    protected $primaryKey = 'id_skill';
    use HasFactory;
    public function profile(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
