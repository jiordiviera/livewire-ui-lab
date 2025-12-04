@props([
    'tabs' => [],
    'activeTab' => null,
    'size' => 'md',
    'variant' => 'default', // default, outline, solid
    'scrollable' => true,
])

@php
    $sizeClasses = match($size) {
        'sm' => 'text-xs px-3 py-1.5 gap-1',
        'lg' => 'text-base px-5 py-2.5 gap-2',
        default => 'text-sm px-4 py-2 gap-1.5',
    };

    $iconSize = match($size) {
        'sm' => 'size-3',
        'lg' => 'size-5',
        default => 'size-4',
    };

    $containerPadding = match($size) {
        'sm' => 'p-1',
        'lg' => 'p-1.5',
        default => 'p-1',
    };

    $wireModel = $attributes->wire('model')->value();
    $defaultActive = $activeTab ?? (count($tabs) > 0 ? array_key_first($tabs) : null);
@endphp

<div
    x-data="pillTabs(@if($wireModel) @entangle($attributes->wire('model')).live @else '{{ $defaultActive }}' @endif)"
    class="w-full"
    {{ $attributes->whereDoesntStartWith('wire:model') }}
>
    {{-- Tabs Container --}}
    <div class="relative">
        {{-- Scroll Shadow Left --}}
        @if($scrollable)
            <div
                x-show="canScrollLeft"
                x-cloak
                class="absolute left-0 top-0 bottom-0 w-8 bg-gradient-to-r from-background to-transparent z-10 pointer-events-none"
            ></div>
        @endif

        {{-- Tabs Wrapper --}}
        <div
            @if($scrollable)
                x-ref="tabsContainer"
                @scroll="updateScrollState()"
                class="flex items-center gap-1 overflow-x-auto scrollbar-hide {{ $containerPadding }} bg-muted/50 rounded-xl"
                style="-webkit-overflow-scrolling: touch;"
            @else
                class="flex items-center gap-1 {{ $containerPadding }} bg-muted/50 rounded-xl"
            @endif
        >
            @foreach($tabs as $key => $tab)
                @php
                    $label = is_array($tab) ? ($tab['label'] ?? $key) : $tab;
                    $icon = is_array($tab) ? ($tab['icon'] ?? null) : null;
                    $badge = is_array($tab) ? ($tab['badge'] ?? null) : null;
                    $disabled = is_array($tab) ? ($tab['disabled'] ?? false) : false;
                @endphp

                <button
                    type="button"
                    @click="!{{ $disabled ? 'true' : 'false' }} && selectTab('{{ $key }}')"
                    :disabled="{{ $disabled ? 'true' : 'false' }}"
                    class="relative flex-shrink-0 inline-flex items-center justify-center font-medium rounded-lg transition-all whitespace-nowrap {{ $sizeClasses }}"
                    :class="{
                        'bg-background text-foreground shadow-sm': active === '{{ $key }}',
                        'text-muted-foreground hover:text-foreground hover:bg-background/50': active !== '{{ $key }}' && !{{ $disabled ? 'true' : 'false' }},
                        'opacity-50 cursor-not-allowed': {{ $disabled ? 'true' : 'false' }}
                    }"
                >
                    @if($icon)
                        <x-dynamic-component :component="'lucide-' . $icon" class="{{ $iconSize }}" />
                    @endif
                    <span>{{ $label }}</span>
                    @if($badge !== null)
                        <span class="inline-flex items-center justify-center min-w-[1.25rem] h-5 px-1.5 text-xs font-semibold rounded-full bg-primary text-primary-foreground">
                            {{ $badge }}
                        </span>
                    @endif
                </button>
            @endforeach
        </div>

        {{-- Scroll Shadow Right --}}
        @if($scrollable)
            <div
                x-show="canScrollRight"
                x-cloak
                class="absolute right-0 top-0 bottom-0 w-8 bg-gradient-to-l from-background to-transparent z-10 pointer-events-none"
            ></div>
        @endif
    </div>

    {{-- Tab Content Slot --}}
    @if($slot->isNotEmpty())
        <div class="mt-4">
            {{ $slot }}
        </div>
    @endif
</div>
