<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Neighborhood extends Model
{
    protected $fillable = [
        'district_id',
        'name'
    ];

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
