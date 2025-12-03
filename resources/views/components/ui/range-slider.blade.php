@props([
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'showValue' => true,
    'showLabels' => true,
    'size' => 'md',
    'variant' => 'default', // default, primary, success
    'type' => 'single', // single, double
])

@php
    $trackHeight = match($size) {
        'sm' => 'h-1',
        'lg' => 'h-2',
        default => 'h-1.5',
    };

    $thumbSize = match($size) {
        'sm' => 'size-3',
        'lg' => 'size-5',
        default => 'size-4',
    };

    $textSize = match($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $trackColors = match($variant) {
        'primary' => 'bg-primary',
        'success' => 'bg-green-500',
        default => 'bg-primary',
    };

    $wireModel = $attributes->wire('model')->value();
@endphp

<div
    x-data="rangeSlider(@if($wireModel) @entangle($attributes->wire('model')).live @else {{ $type === 'double' ? '[25, 75]' : '50' }} @endif, {
        min: {{ $min }},
        max: {{ $max }},
        step: {{ $step }},
        type: '{{ $type }}'
    })"
    class="w-full"
    {{ $attributes->whereDoesntStartWith('wire:model') }}
>
    {{-- Value display --}}
    @if($showValue)
        <div class="flex items-center justify-between mb-3">
            <template x-if="type === 'single'">
                <span class="font-semibold text-foreground {{ $textSize }}">
                    Value: <span x-text="value"></span>
                </span>
            </template>
            <template x-if="type === 'double'">
                <div class="flex items-center gap-4 w-full justify-between">
                    <span class="font-medium text-muted-foreground {{ $textSize }}">
                        Min: <span class="text-foreground font-semibold" x-text="value[0]"></span>
                    </span>
                    <span class="font-medium text-muted-foreground {{ $textSize }}">
                        Max: <span class="text-foreground font-semibold" x-text="value[1]"></span>
                    </span>
                </div>
            </template>
        </div>
    @endif

    {{-- Slider container --}}
    <div class="relative pt-2 pb-6">
        {{-- Track background --}}
        <div class="relative {{ $trackHeight }} bg-muted rounded-full">
            {{-- Active range --}}
            <div
                class="absolute {{ $trackHeight }} {{ $trackColors }} rounded-full transition-all"
                :style="type === 'single'
                    ? `left: 0; width: ${getPercentage(value)}%`
                    : `left: ${getPercentage(value[0])}%; width: ${getPercentage(value[1]) - getPercentage(value[0])}%`"
            ></div>

            {{-- Single slider --}}
            <template x-if="type === 'single'">
                <input
                    type="range"
                    :min="min"
                    :max="max"
                    :step="step"
                    x-model="value"
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                />
            </template>

            {{-- Double slider (min thumb) --}}
            <template x-if="type === 'double'">
                <div>
                    <input
                        type="range"
                        :min="min"
                        :max="max"
                        :step="step"
                        x-model="value[0]"
                        @input="updateMin($event.target.value)"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10 pointer-events-auto"
                    />
                </div>
            </template>

            {{-- Double slider (max thumb) --}}
            <template x-if="type === 'double'">
                <div>
                    <input
                        type="range"
                        :min="min"
                        :max="max"
                        :step="step"
                        x-model="value[1]"
                        @input="updateMax($event.target.value)"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20 pointer-events-auto"
                    />
                </div>
            </template>

            {{-- Custom thumb for single --}}
            <template x-if="type === 'single'">
                <div
                    class="absolute top-1/2 -translate-y-1/2 {{ $thumbSize }} rounded-full bg-background border-2 {{ str_replace('bg-', 'border-', $trackColors) }} shadow-md pointer-events-none transition-all"
                    :style="`left: calc(${getPercentage(value)}% - ${getThumbOffset()}px)`"
                ></div>
            </template>

            {{-- Custom thumbs for double --}}
            <template x-if="type === 'double'">
                <div>
                    <div
                        class="absolute top-1/2 -translate-y-1/2 {{ $thumbSize }} rounded-full bg-background border-2 {{ str_replace('bg-', 'border-', $trackColors) }} shadow-md pointer-events-none transition-all z-30"
                        :style="`left: calc(${getPercentage(value[0])}% - ${getThumbOffset()}px)`"
                    ></div>
                    <div
                        class="absolute top-1/2 -translate-y-1/2 {{ $thumbSize }} rounded-full bg-background border-2 {{ str_replace('bg-', 'border-', $trackColors) }} shadow-md pointer-events-none transition-all z-30"
                        :style="`left: calc(${getPercentage(value[1])}% - ${getThumbOffset()}px)`"
                    ></div>
                </div>
            </template>
        </div>

        {{-- Min/Max labels --}}
        @if($showLabels)
            <div class="flex items-center justify-between mt-2 text-xs text-muted-foreground">
                <span>{{ $min }}</span>
                <span>{{ $max }}</span>
            </div>
        @endif
    </div>
</div>
