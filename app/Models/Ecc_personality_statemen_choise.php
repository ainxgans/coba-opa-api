<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ecc_personality_statemen_choise extends Model
{
    use HasFactory;
    public function page(): BelongsTo
    {
        return $this->belongsTo(Ecc_personality_statemen_page::class);
    }
}
