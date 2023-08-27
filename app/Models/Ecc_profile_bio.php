<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ecc_profile_bio extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_bio';
    public function profile(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
