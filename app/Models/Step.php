<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string  $name
 * @property string  $description
 * @property array   $default_content
 * @property integer $previous_step_id
 * @property integer $next_step_id
 * @property Carbon  $deleted_at
 */
class Step extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'default_content',
        'previous_step',
        'next_step',
    ];

    protected $casts = [
        'default_content' => 'array',
    ];

    public function previousStep(): BelongsTo
    {
        return $this->belongsTo(self::class, 'previous_step_id');
    }

    public function nextStep(): BelongsTo
    {
        return $this->belongsTo(self::class, 'next_step_id');
    }

    public function userStep(): HasMany
    {
        return $this->hasMany(UserStep::class);
    }
}
