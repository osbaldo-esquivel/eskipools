<?php

namespace App\Domains\Games\Models;

use App\Domains\Picks\Models\Pick;
use App\Domains\Weeks\Models\Week;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    protected $fillable = [
        'home_team',
        'away_team',
        'city',
        'time',
    ];

    protected $casts = [
        'time' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected function id(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value
        );
    }

    protected function homeTeam(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => $value,
        );
    }

    protected function awayTeam(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => $value,
        );
    }

    protected function city(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => $value,
        );
    }

    protected function time(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => Carbon::parse($value),
        );
    }

    public function week(): BelongsTo
    {
        return $this->belongsTo(Week::class);
    }

    public function picks(): HasMany
    {
        return $this->hasMany(Pick::class);
    }
}