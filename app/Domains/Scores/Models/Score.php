<?php

namespace App\Domains\Scores\Models;

use App\Domains\Weeks\Models\Week;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    protected $table = "scores";

    protected $keyType = 'string';

    protected $primaryKey = 'id';

    protected $fillable = [
        'week_id',
        'user_id',
        'score',
        'id',
    ];

    public $timestamps = true;

    public function week(): BelongsTo
    {
        return $this->belongsTo(Week::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}