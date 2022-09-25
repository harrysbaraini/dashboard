<?php

namespace App\Http\Livewire;

use Livewire\Component;

class KeepAuth extends Component
{
    public function render()
    {
        return <<<HTML
            <div wire:poll.keep-alive.600000ms class="w-0 h-0"></div>
            HTML;
    }
}
