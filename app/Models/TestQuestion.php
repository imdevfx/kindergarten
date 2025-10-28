<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestQuestion extends Model
{
    protected $fillable = [
        'test_category_id',
        'name'
    ];

    public function variants(): HasMany
    {
        return $this->hasMany(TestVariant::class);
    }
}
