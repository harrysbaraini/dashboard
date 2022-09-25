<?php

namespace App\Http\Livewire;

use App\Widget;

class Clock extends Widget
{
    public const DIR_HORIZONTAL = 'h';
    public const DIR_VERTICAL = 'v';

    public array $timezones;

    public string $direction = 'v';

    public function render()
    {
        return view('livewire.clock', [
            'config' => [
                'timezones' => $this->timezones,
                'isVertical' => $this->isVertical(),
            ],
        ]);
    }

    protected function isVertical(): bool
    {
        return $this->direction === static::DIR_VERTICAL;
    }
}
