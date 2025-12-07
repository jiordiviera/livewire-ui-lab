@props([
    'value' => '#3b82f6',
    'label' => null,
    'showInput' => true,
    'showPresets' => true,
    'presets' => null,
    'format' => 'hex', // hex, rgb, hsl
    'size' => 'md', // sm, md, lg
])

@php
    $sizeClasses = match($size) {
        'sm' => 'size-6',
        'lg' => 'size-10',
        default => 'size-8',
    };

    $inputSize = match($size) {
        'sm' => 'text-xs px-2 py-1',
        'lg' => 'text-base px-4 py-2.5',
        default => 'text-sm px-3 py-2',
    };

    $defaultPresets = $presets ?? [
        '#ef4444', '#f97316', '#f59e0b', '#eab308',
        '#84cc16', '#22c55e', '#10b981', '#14b8a6',
        '#06b6d4', '#0ea5e9', '#3b82f6', '#6366f1',
        '#8b5cf6', '#a855f7', '#d946ef', '#ec4899',
        '#f43f5e', '#78716c', '#737373', '#000000',
    ];

    $wireModel = $attributes->wire('model')->value();
@endphp

<div
    x-data="colorPicker(@if($wireModel) @entangle($attributes->wire('model')).live @else '{{ $value }}' @endif)"
    x-init="init()"
    class="relative"
    {{ $attributes->whereDoesntStartWith('wire:model') }}
>
    @if($label)
        <label class="block text-sm font-medium text-foreground mb-1.5">{{ $label }}</label>
    @endif

    <div class="flex items-center gap-2 sm:gap-3">
        {{-- Color Preview Button --}}
        <button
            type="button"
            @click="open = !open"
            class="{{ $sizeClasses }} rounded-md sm:rounded-lg border-2 border-border shadow-sm cursor-pointer transition-all hover:scale-105 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 flex-shrink-0"
            :style="`background-color: ${color}`"
            :aria-label="`Selected color: ${color}`"
        ></button>

        {{-- Color Input --}}
        @if($showInput)
            <div class="relative flex-1 min-w-0">
                <input
                    type="text"
                    x-model="color"
                    @input="validateAndUpdate($event.target.value)"
                    class="w-full {{ $inputSize }} bg-background border border-input rounded-md sm:rounded-lg text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:border-transparent font-mono uppercase"
                    placeholder="#000000"
                    maxlength="7"
                />
            </div>
        @endif

        {{-- Native Color Picker --}}
        <label class="relative cursor-pointer flex-shrink-0">
            <input
                type="color"
                x-model="color"
                class="absolute inset-0 opacity-0 cursor-pointer w-full h-full"
            />
            <div class="{{ $sizeClasses }} flex items-center justify-center rounded-md sm:rounded-lg border border-input bg-background hover:bg-accent transition-colors">
                <x-lucide-pipette class="size-3 sm:size-4 text-muted-foreground" />
            </div>
        </label>
    </div>

    {{-- Dropdown Panel --}}
    <div
        x-show="open"
        x-cloak
        @click.outside="open = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        class="absolute z-50 mt-2 left-0 right-0 sm:left-auto sm:right-auto sm:w-64 p-3 sm:p-4 bg-popover border border-border rounded-lg sm:rounded-xl shadow-xl"
    >
        @if($showPresets)
            <div class="mb-3">
                <p class="text-xs font-medium text-muted-foreground mb-2">Presets</p>
                <div class="grid grid-cols-10 sm:grid-cols-5 gap-1.5 sm:gap-2">
                    @foreach($defaultPresets as $preset)
                        <button
                            type="button"
                            @click="selectColor('{{ $preset }}')"
                            class="size-5 sm:size-6 rounded border border-border/50 cursor-pointer transition-all hover:scale-110 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-1"
                            :class="color.toLowerCase() === '{{ strtolower($preset) }}' ? 'ring-2 ring-primary ring-offset-1' : ''"
                            style="background-color: {{ $preset }}"
                            title="{{ $preset }}"
                        ></button>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- RGB Sliders --}}
        <div class="space-y-2 sm:space-y-3">
            <p class="text-xs font-medium text-muted-foreground">RGB Values</p>

            {{-- Red --}}
            <div class="flex items-center gap-2">
                <span class="text-[10px] sm:text-xs font-medium text-red-500 w-3">R</span>
                <input
                    type="range"
                    min="0"
                    max="255"
                    x-model="rgb.r"
                    @input="updateFromRgb()"
                    class="flex-1 h-1.5 sm:h-2 rounded-full appearance-none cursor-pointer bg-gradient-to-r from-black via-red-500 to-red-500 [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:size-3 [&::-webkit-slider-thumb]:sm:size-4 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-white [&::-webkit-slider-thumb]:border-2 [&::-webkit-slider-thumb]:border-red-500 [&::-webkit-slider-thumb]:shadow"
                />
                <span class="text-[10px] sm:text-xs text-muted-foreground w-6 sm:w-8 text-right" x-text="rgb.r"></span>
            </div>

            {{-- Green --}}
            <div class="flex items-center gap-2">
                <span class="text-[10px] sm:text-xs font-medium text-green-500 w-3">G</span>
                <input
                    type="range"
                    min="0"
                    max="255"
                    x-model="rgb.g"
                    @input="updateFromRgb()"
                    class="flex-1 h-1.5 sm:h-2 rounded-full appearance-none cursor-pointer bg-gradient-to-r from-black via-green-500 to-green-500 [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:size-3 [&::-webkit-slider-thumb]:sm:size-4 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-white [&::-webkit-slider-thumb]:border-2 [&::-webkit-slider-thumb]:border-green-500 [&::-webkit-slider-thumb]:shadow"
                />
                <span class="text-[10px] sm:text-xs text-muted-foreground w-6 sm:w-8 text-right" x-text="rgb.g"></span>
            </div>

            {{-- Blue --}}
            <div class="flex items-center gap-2">
                <span class="text-[10px] sm:text-xs font-medium text-blue-500 w-3">B</span>
                <input
                    type="range"
                    min="0"
                    max="255"
                    x-model="rgb.b"
                    @input="updateFromRgb()"
                    class="flex-1 h-1.5 sm:h-2 rounded-full appearance-none cursor-pointer bg-gradient-to-r from-black via-blue-500 to-blue-500 [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:size-3 [&::-webkit-slider-thumb]:sm:size-4 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-white [&::-webkit-slider-thumb]:border-2 [&::-webkit-slider-thumb]:border-blue-500 [&::-webkit-slider-thumb]:shadow"
                />
                <span class="text-[10px] sm:text-xs text-muted-foreground w-6 sm:w-8 text-right" x-text="rgb.b"></span>
            </div>
        </div>

        {{-- Color Info --}}
        <div class="mt-3 sm:mt-4 pt-3 border-t border-border">
            <div class="flex items-center gap-2">
                <div
                    class="size-8 sm:size-10 rounded-md sm:rounded-lg border border-border shadow-inner"
                    :style="`background-color: ${color}`"
                ></div>
                <div class="flex-1 min-w-0">
                    <p class="text-[10px] sm:text-xs text-muted-foreground">Selected</p>
                    <p class="text-xs sm:text-sm font-mono font-medium text-foreground uppercase truncate" x-text="color"></p>
                </div>
                <button
                    type="button"
                    @click="copyToClipboard()"
                    class="p-1.5 sm:p-2 rounded-md hover:bg-accent transition-colors"
                    title="Copy to clipboard"
                >
                    <x-lucide-copy class="size-3 sm:size-4 text-muted-foreground" />
                </button>
            </div>
        </div>
    </div>
</div>
