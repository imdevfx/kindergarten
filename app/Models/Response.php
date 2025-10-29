<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Response extends Model
{
    protected $fillable = [
        'user_id',
        'total_score',
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
