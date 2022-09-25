<?php

namespace App\Http\Livewire;

use App\Widget;
use App\DTO\Link;
use JetBrains\PhpStorm\ArrayShape;

class LinksList extends Widget
{
    public string|null $heading = null;

    public array $links = [];

    public function render()
    {
        return view('livewire.links-list');
    }
}
