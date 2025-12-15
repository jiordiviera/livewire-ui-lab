@props([
    'data' => [],
    'variant' => 'github',
    'showDays' => true,
    'cellSize' => 'sm',
])

@php
    $cellSizes = [
        'xs' => 'h-2 w-2 gap-0.5',
        'sm' => 'h-3 w-3 gap-1',
        'md' => 'h-4 w-4 gap-1',
    ];

    $cellClass = $cellSizes[$cellSize] ?? $cellSizes['sm'];

    // Group data by weeks
    $weeks = [];
    $months = [];
    $currentMonth = null;

    foreach ($data as $index => $day) {
        $weekIndex = floor($index / 7);
        if (!isset($weeks[$weekIndex])) {
            $weeks[$weekIndex] = [];
        }
        $weeks[$weekIndex][] = $day;

        // Track months for labels
        if ($currentMonth !== $day['monthNum']) {
            $currentMonth = $day['monthNum'];
            $months[$weekIndex] = $day['month'];
        }
    }

    $dayLabels = ['Mon', '', 'Wed', '', 'Fri', '', ''];

    // Color scales based on variant
    $colorScale = match($variant) {
        'github' => [
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
        'orange' => [
            0 => 'bg-gray-100 dark:bg-gray-800',
            1 => 'bg-orange-200 dark:bg-orange-900',
            2 => 'bg-orange-300 dark:bg-orange-700',
            3 => 'bg-orange-400 dark:bg-orange-600',
            4 => 'bg-orange-500 dark:bg-orange-500',
        ],
        default => [
            0 => 'bg-gray-100 dark:bg-gray-800',
            1 => 'bg-green-200 dark:bg-green-900',
            2 => 'bg-green-300 dark:bg-green-700',
            3 => 'bg-green-400 dark:bg-green-600',
            4 => 'bg-green-500 dark:bg-green-500',
        ],
    };
@endphp

<div {{ $attributes->merge(['class' => 'overflow-x-auto']) }}>
    <div class="inline-block">
        {{-- Month Labels --}}

        <div class="flex">
            {{-- Day Labels --}}
            @if($showDays)
                <div class="flex flex-col justify-around pr-2 text-xs text-muted-foreground" style="gap: {{ $cellSize === 'xs' ? '2px' : '4px' }}">
                    @foreach($dayLabels as $label)
                        <span class="{{ explode(' ', $cellClass)[0] }} flex items-center">{{ $label }}</span>
                    @endforeach
                </div>
            @endif

            {{-- Heatmap Grid --}}
            <div class="flex" style="gap: {{ $cellSize === 'xs' ? '2px' : '4px' }}">
                @foreach($weeks as $weekIndex => $week)
                    <div class="flex flex-col" style="gap: {{ $cellSize === 'xs' ? '2px' : '4px' }}">
                        @foreach($week as $day)
                            @php
                                $level = match(true) {
                                    $day['count'] === 0 => 0,
                                    $day['count'] <= 3 => 1,
                                    $day['count'] <= 7 => 2,
                                    $day['count'] <= 12 => 3,
                                    default => 4,
                                };
                            @endphp
                            <div
                                class="{{ explode(' ', $cellClass)[0] }} {{ explode(' ', $cellClass)[1] }} {{ $colorScale[$level] }} rounded-sm cursor-pointer transition-transform hover:scale-125"
                                x-data
                                x-tooltip.raw="{{ $day['date'] }}: {{ $day['count'] }} contributions"
                            ></div>
                        @endforeach

                        {{-- Fill empty days at the end of incomplete weeks --}}
                        @for($i = count($week); $i < 7; $i++)
                            <div class="{{ explode(' ', $cellClass)[0] }} {{ explode(' ', $cellClass)[1] }}"></div>
                        @endfor
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Legend --}}
        <div class="flex items-center justify-end mt-3 gap-2 text-xs text-muted-foreground">
            <span>Less</span>
            @foreach($colorScale as $level => $color)
                <div class="{{ explode(' ', $cellClass)[0] }} {{ explode(' ', $cellClass)[1] }} {{ $color }} rounded-sm"></div>
            @endforeach
            <span>More</span>
        </div>
    </div>
</div>
