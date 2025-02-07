<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, SoftDeletes ;

    protected $fillable = [
        'name',
        'is_enable',
    ];

    public function classifies(): HasMany
    {
        return $this->hasMany(Classify::class , 'category_id' , 'id');
    }
}
