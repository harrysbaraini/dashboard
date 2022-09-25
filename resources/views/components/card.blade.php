<div {{ $attributes->merge(['class' => 'card rounded-md flex flex-col h-full p-2']) }}>
    <div class="flex justify-between items-center space-x-2 pb-2">
        @if (!blank($heading))
            <h4 class="text-slate-500">{{ $heading }}</h4>
        @endif
        @isset ($badge)
            {{ $badge }}
        @endisset
    </div>

    {{ $slot }}
</div>
