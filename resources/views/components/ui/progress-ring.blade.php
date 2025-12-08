@props([
    'value' => 0,
    'max' => 100,
    'size' => 'md', // sm, md, lg, xl
    'strokeWidth' => null,
    'color' => 'primary', // primary, success, warning, danger, info
    'showValue' => true,
    'showLabel' => false,
    'label' => null,
    'animate' => true,
])

@php
    $percentage = min(100, max(0, ($value / $max) * 100));

    $sizeConfig = match($size) {
        'sm' => ['size' => 60, 'stroke' => 4, 'text' => 'text-xs', 'label' => 'text-[8px]'],
        'lg' => ['size' => 120, 'stroke' => 8, 'text' => 'text-2xl', 'label' => 'text-xs'],
        'xl' => ['size' => 160, 'stroke' => 10, 'text' => 'text-3xl', 'label' => 'text-sm'],
        default => ['size' => 80, 'stroke' => 6, 'text' => 'text-lg', 'label' => 'text-[10px]'],
    };

    $svgSize = $sizeConfig['size'];
    $stroke = $strokeWidth ?? $sizeConfig['stroke'];
    $radius = ($svgSize - $stroke) / 2;
    $circumference = 2 * pi() * $radius;
    $offset = $circumference - ($percentage / 100) * $circumference;

    $colorClasses = match($color) {
        'success' => 'text-green-500',
        'warning' => 'text-yellow-500',
        'danger' => 'text-red-500',
        'info' => 'text-blue-500',
        default => 'text-primary',
    };

    $trackColor = 'text-muted';

    $wireModel = $attributes->wire('model')->value();
@endphp

<div
    x-data="{
        value: @if($wireModel) @entangle($attributes->wire('model')).live @else {{ $value }} @endif,
        max: {{ $max }},
        circumference: {{ $circumference }},
        radius: {{ $radius }},
        get percentage() {
            return Math.min(100, Math.max(0, (this.value / this.max) * 100));
        },
        get offset() {
            return this.circumference - (this.percentage / 100) * this.circumference;
        }
    }"
    class="inline-flex flex-col items-center"
    {{ $attributes->whereDoesntStartWith('wire:model') }}
>
    <div class="relative" style="width: {{ $svgSize }}px; height: {{ $svgSize }}px;">
        <svg
            class="transform -rotate-90"
            width="{{ $svgSize }}"
            height="{{ $svgSize }}"
        >
            {{-- Background Circle (Track) --}}
            <circle
                class="{{ $trackColor }}"
                stroke="currentColor"
                stroke-width="{{ $stroke }}"
                fill="none"
                cx="{{ $svgSize / 2 }}"
                cy="{{ $svgSize / 2 }}"
                r="{{ $radius }}"
            />

            {{-- Progress Circle --}}
            <circle
                class="{{ $colorClasses }} {{ $animate ? 'transition-all duration-700 ease-out' : '' }}"
                stroke="currentColor"
                stroke-width="{{ $stroke }}"
                stroke-linecap="round"
                fill="none"
                cx="{{ $svgSize / 2 }}"
                cy="{{ $svgSize / 2 }}"
                r="{{ $radius }}"
                :stroke-dasharray="circumference"
                :stroke-dashoffset="offset"
            />
        </svg>

        {{-- Center Content --}}
        @if($showValue || $slot->isNotEmpty())
            <div class="absolute inset-0 flex flex-col items-center justify-center">
                @if($slot->isNotEmpty())
                    {{ $slot }}
                @else
                    <span
                        class="{{ $sizeConfig['text'] }} font-bold text-foreground"
                        x-text="Math.round(percentage) + '%'"
                    ></span>
                    @if($showLabel && $label)
                        <span class="{{ $sizeConfig['label'] }} text-muted-foreground mt-0.5">
                            {{ $label }}
                        </span>
                    @endif
                @endif
            </div>
        @endif
    </div>
</div>
