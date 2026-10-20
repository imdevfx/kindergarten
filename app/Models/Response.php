<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Response extends Model
{
    protected $fillable = [
        'user_id',
        'test_category_id',
        'total_score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\TestCategory::class, 'test_category_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
