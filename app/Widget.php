<?php declare(strict_types=1);

namespace App;

use Nette\Utils\Html;
use Livewire\Component;
use App\View\Components\WidgetRenderer;
use Illuminate\Contracts\Support\Htmlable;

class Widget extends Component
{
    public WidgetRenderer $container;
}
