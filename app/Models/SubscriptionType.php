<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'expire_at',
        'note',
    ];

    protected function casts(): array
    {
        return [
            'expire_at' => 'date',
        ];
    }
}
