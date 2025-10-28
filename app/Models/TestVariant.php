<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestVariant extends Model
{
    protected $fillable = [
        'test_question_id',
        'name',
        'answer'
    ];
}
