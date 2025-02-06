<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'university_id',
    ];

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class , 'university_id' , 'id');
    }
}
