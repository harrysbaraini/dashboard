<x-card heading="{{ $heading ?? '' }}">
    <div class="flex-1 flex flex-col h-full space-y-2 overflow-hidden">
        @foreach($links as $link)
            <a href="{{ $link['url'] }}" target="_blank" class="p-2 rounded border border-base-300 hover:bg-base-200">
                {{ $link['label'] }}
            </a>
        @endforeach
    </div>
</x-card>
