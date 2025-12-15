@props([
    'data' => [],
    'variant' => 'blue',
    'showHours' => true,
    'showDays' => true,
])

@php
    $days = array_keys($data);
    $hours = range(0, 23);

    $colorScale = match($variant) {
        'green' => [
            0 => 'bg-gray-100 dark:bg-gray-800',
            1 => 'bg-green-200 dark:bg-green-900',
            2 => 'bg-green-300 dark:bg-green-700',
            3 => 'bg-green-400 dark:bg-green-600',
            4 => 'bg-green-500 dark:bg-green-500',
        ],
        'blue' => [
            0 => 'bg-gray-100 dark:bg-gray-800',
            1 => 'bg-blue-200 dark:bg-blue-900',
            2 => 'bg-blue-300 dark:bg-blue-700',
            3 => 'bg-blue-400 dark:bg-blue-600',
            4 => 'bg-blue-500 dark:bg-blue-500',
        ],
        'purple' => [
            0 => 'bg-gray-100 dark:bg-gray-800',
            1 => 'bg-purple-200 dark:bg-purple-900',
            2 => 'bg-purple-300 dark:bg-purple-700',
            3 => 'bg-purple-400 dark:bg-purple-600',
            4 => 'bg-purple-500 dark:bg-purple-500',
        ],
        default => [
            0 => 'bg-gray-100 dark:bg-gray-800',
            1 => 'bg-blue-200 dark:bg-blue-900',
            2 => 'bg-blue-300 dark:bg-blue-700',
            3 => 'bg-blue-400 dark:bg-blue-600',
            4 => 'bg-blue-500 dark:bg-blue-500',
        ],
    };
@endphp

<div {{ $attributes->merge(['class' => 'overflow-x-auto']) }}>
    <div class="inline-block min-w-full">
        {{-- Hour Labels --}}
        @if($showHours)
            <div class="flex mb-1" style="margin-left: {{ $showDays ? '3rem' : '0' }}">
                @foreach($hours as $hour)
                    @if($hour % 3 === 0)
                        <span class="w-4 text-xs text-muted-foreground text-center">{{ sprintf('%02d', $hour) }}</span>
                    @else
                        <span class="w-4"></span>
                    @endif
                @endforeach
            </div>
        @endif

        {{-- Grid --}}
        @foreach($days as $day)
            <div class="flex items-center gap-1 mb-1">
                {{-- Day Label --}}
                @if($showDays)
                    <span class="w-10 text-xs text-muted-foreground text-right pr-2">{{ $day }}</span>
                @endif

                {{-- Hour Cells --}}
                @foreach($data[$day] as $hourIndex => $value)
                    @php
                        $level = match(true) {
                            $value === 0 => 0,
                            $value <= 2 => 1,
                            $value <= 5 => 2,
                            $value <= 8 => 3,
                            default => 4,
                        };
                    @endphp
                    <div
                        class="h-4 w-4 {{ $colorScale[$level] }} rounded-sm cursor-pointer transition-transform hover:scale-125"
                        x-data
                        x-tooltip.raw="{{ $day }} {{ sprintf('%02d', $hourIndex) }}:00 - {{ $value }} activities"
                    ></div>
                @endforeach
            </div>
        @endforeach

        {{-- Legend --}}
        <div class="flex items-center justify-end mt-3 gap-2 text-xs text-muted-foreground">
            <span>Less</span>
            @foreach($colorScale as $level => $color)
                <div class="h-4 w-4 {{ $color }} rounded-sm"></div>
            @endforeach
            <span>More</span>
        </div>
    </div>
</div>
