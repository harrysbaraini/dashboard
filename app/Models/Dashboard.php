<?php

namespace App\Models;

use App\Casts\WidgetsCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property array $settings
 */
class Dashboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'name',
        'settings',
        'widgets',
    ];

    protected $casts = [
        'active' => 'boolean',
        'settings' => 'array',
        'widgets' => WidgetsCast::class,
    ];

    protected $attributes = [
        'active' => true,
        'settings' => '{}',
        'widgets' => '{}',
    ];

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function gridCols(): int
    {
        return (int) data_get($this->settings, 'grid.0', 8);
    }

    public function gridRows(): int
    {
        return (int) data_get($this->settings, 'grid.1', 6);
    }
}
