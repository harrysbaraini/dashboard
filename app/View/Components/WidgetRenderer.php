<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\Support\Arrayable;

class WidgetRenderer extends Component implements Htmlable, Arrayable
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $widgetComponent,
        public array  $config = [],
        public bool   $active = true,
        public int    $x = 1,
        public int    $y = 1,
        public int    $width = 1,
        public int    $height = 1,
        public string|null $bg = null,
    )
    {
        //
    }

    public function at(int $x, int $y): static
    {
        $this->x = $x;
        $this->y = $y;
        return $this;
    }

    public function size(int $width, int $height): static
    {
        $this->width = $width;
        $this->height = $height;
        return $this;
    }

    public function bgColor(string $bgColor): static
    {
        $this->bg = $bgColor;
        return $this;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getBg(): string
    {
        return $this->bg ?? 'base-100';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widget-renderer', [
            'classes' => $this->getContainerClasses(),
            'widget' => $this->widgetComponent,
            'config' => array_merge($this->config, [
                'renderer' => $this,
            ]),
        ]);
    }

    protected function getContainerClasses(): string
    {
        return implode(' ', [
            sprintf(
                'rounded-md col-start-%s col-span-%s row-start-%s row-span-%s %s',
                $this->x,
                $this->width,
                $this->y,
                $this->height,
                "bg-{$this->getBg()}",
            ),
        ]);
    }

    public function shouldRender()
    {
        return $this->active;
    }

    public function toHtml()
    {
        return $this->render()->render();
    }

    public function toArray(): array
    {
        return [
            'class' => $this->widgetComponent,
            'config' => $this->config,
            'active' => $this->active,
            'position' => [$this->x, $this->y],
            'size' => [$this->width, $this->height],
            'bg' => $this->bg,
        ];
    }
}
