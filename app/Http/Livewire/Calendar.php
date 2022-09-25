<?php

namespace App\Http\Livewire;

use App\Widget;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;
use Illuminate\Support\Collection;

class Calendar extends Widget
{
    public string $calendarId;
    public int $max = 1;

    public function render()
    {
        return view('livewire.calendar');
    }

    public function getEventsProperty(): Collection
    {
        return Event::get(
            now()->subHours(1)->startOfHour(),
            now()->addDays(7)->endOfDay(),
            ['maxResults' => $this->max],
            $this->calendarId,
        )   
            ->take($this->max)
            ->map(function (Event $event) {
                $startAt = Carbon::parse($event->googleEvent->getStart()->getDateTime());

                $startAtFormatted = $startAt->isToday()
                    ? sprintf('Today at %s', $startAt->format('g:i A'))
                    : ($startAt->isTomorrow()
                        ? sprintf('Tomorrow at %s', $startAt->format('g:i A'))
                        : $startAt->format('j M, h:i:s A'));

                return [
                    'start_at' => $startAtFormatted,
                    'start_at_classes' => $startAt->isToday() ? 'text-blue-600' : 'text-slate-600',
                    'summary' => $event->googleEvent->getSummary(),
                    'link' => $event->googleEvent->getHtmlLink(),
                    'indicator' => $startAt->lte(now()->addHours(2))
                        ? ($startAt->lte(now()) ? 'bg-red-500' : 'bg-yellow-500')
                        : null,
                    'timeDiff' => $startAt->shortRelativeToNowDiffForHumans(),
                ];
            });
    }
}
