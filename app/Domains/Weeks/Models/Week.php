<?php

namespace App\Domains\Weeks\Models;

use App\Domains\Games\Models\Game;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Week extends Model
{
    use HasFactory;

    protected $table = 'weeks';

    protected $primaryKey = 'id';


    protected $keyType = 'string';

    protected $fillable = [
        'number',
        'is_active'
    ];

    protected $casts = [
        'id' => 'string',
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

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}