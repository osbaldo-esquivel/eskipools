<?php

namespace App\Domains\Picks\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property string $week_id
 * @property int    $user_id
 * @property string $teams
 * @property string $game_id
 * 
 */
class Pick extends Model
{
    use HasFactory;

    protected $table = 'picks';

    protected $keyType = 'string';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'week_id',
        'user_id',
        'teams',
        'game_id',
        'id'
    ];

    protected function teams(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value),
            set: fn ($value) => json_encode($value)
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('users');
    }

    public function week(): BelongsTo
    {
        return $this->belongsTo('weeks');
    }
}