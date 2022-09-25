<div wire:poll.10000ms class="fle flex-col h-full">
    <x-card heading="Slack">
        @slot('badge')
            <div class="flex items-center space-x-2 text-base text-slate-500">
                <span class="w-3 h-3 rounded-full bg-green-600"></span>
                <div class="text-sm text-slate-500">Active</div>
            </div>
        @endslot

        <div class="flex-1 flex flex-col overflow-y-auto">
            @foreach ($this->starredChannels as $channel)
                <a href="{{ $channel['link'] }}" class="flex justify-between space-x-2">
                    <div class="{{ ($channel['unread'] > 0) ? 'font-bold' : '' }}"># {{ $channel['label'] }}</div>
                    @if ($channel['unread'] > 0)
                        <div class="badge badge-primary">{{ $channel['unread'] }}</div>
                    @endif
                </a>
            @endforeach
        </div>
    </x-card>
</div>
