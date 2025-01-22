<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'text',
        'answer_1',
        'answer_2',
        'answer_3',
        'answer_4',
        'correct_answer',
        'summary_answer',
        'code',
        'classify_id',
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->code = Str::random(13);
        });
    }

    public function classify(): BelongsTo
    {
        return $this->belongsTo(Classify::class);
    }

    public function getCorrectAnswerAttribute($value)
    {
        return $this->attributes['correct_answer'] = $value;
    }

}
