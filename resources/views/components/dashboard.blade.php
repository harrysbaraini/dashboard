<div class="w-full h-[calc(100vh-96px)] gap-2 grid grid-flow-col grid-rows-{{ $dashboard->gridRows() }} grid-cols-{{ $dashboard->gridCols() }}">
    @foreach($dashboard->widgets as $widget)
        {{ $widget }}
    @endforeach
</div>
