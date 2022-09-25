<div wire:poll.60000ms class="h-full">
    <x-card heading="Calendar">
        <div class="flex-1 flex flex-col h-full divide-y-2 divide-base-300 overflow-hidden">
            @foreach($this->events as $event)
                <div class="py-1">
                    <a href="{{ $event['link'] }}" target="_blank" class="block w-full p-2 rounded hover:bg-base-200">
                        <div class="text-base text-base-content font-semibold">
                            {{ $event['summary'] }}
                        </div>
                        <div class="flex items-center justify-between space-x-3 mt-1 text-sm font-normal">
                            <span class="{{ $event['start_at_classes'] }}">{{ $event['start_at'] }}</span>
                            @if ($event['indicator'])
                                <div class="flex items-center">
                                    <span class="text-slate-500 dark:text-slate-300">{{ $event['timeDiff'] }}</span>
                                    <span class="w-3 h-3 ml-2 rounded-full {{ $event['indicator'] }}"></span>
                                </div>
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </x-card>

</div>
