<?php

namespace App\Domains\Weeks\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    protected $table = 'weeks';

    protected $fillable = [
        'number',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected function number(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => "Week $value",
            set: fn ($value) => $value,
        );
    }
}