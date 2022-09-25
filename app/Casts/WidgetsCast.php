<?php

namespace App\Casts;

use App\View\Components\WidgetRenderer;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class WidgetsCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        $decoded = json_decode($value, true, 512, JSON_THROW_ON_ERROR);

        return collect($decoded)
            ->filter(fn($widget) => data_get($widget, 'active', false))
            ->map(function ($widget) {
                if (! $class = data_get($widget, 'class')) {
                    abort(500, 'No class defined in the widget');
                }

                return new WidgetRenderer(
                    widgetComponent: $class,
                    config: data_get($widget, 'config', []),
                    active: data_get($widget, 'active', false),
                    x: data_get($widget, 'position.0', 1),
                    y: data_get($widget, 'position.1', 1),
                    width: data_get($widget, 'size.0', 1),
                    height: data_get($widget, 'size.1', 1),
                    bg: data_get($widget, 'bg'),
                );
            });
    }

    /**
     * Prepare the given value for storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return collect($value)->toJson();
    }
}
