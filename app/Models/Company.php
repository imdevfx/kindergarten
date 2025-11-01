<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = [
        'neighborhood_id',
        'name'
    ];

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function profiles(): HasMany
    {
        return $this->hasMany(UserProfile::class);
    }
}
