<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Symfony\Component\Console\Question\Question;

class Answer extends Model
{
    protected $fillable = [
        'response_id',
        'test_question_id',
        'value',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(TestQuestion::class);
    }
}
