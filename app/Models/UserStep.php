<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserStep extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'step_id',
        'content',
        'value',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function step(): BelongsTo
    {
        return $this->belongsTo(Step::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
