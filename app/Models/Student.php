<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'university_id',
        'college_id',
        'department_id',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class , 'university_id' , 'id');
    }

    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class , 'college_id' , 'id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class , 'department_id' , 'id');
    }

}
