<div x-data="ClockComponent({{ json_encode($config) }})" class="flex flex-col items-center justify-center h-full">
    <div class="stats w-full h-full {{ $config['isVertical'] ? 'stats-vertical' : 'stats-horizontal' }}">
        <template x-for="timezone in timezones" hidden>
            <div class="stat flex flex-col justify-center h-full p-2">
                <div class="stat-title" x-text="timezone.label"></div>
                <div class="stat-value text-3xl" x-text="timezone.value"></div>
            </div>
        </template>
    </div>
</div>
