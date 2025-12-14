@props([
    'title' => 'Click to reveal',
    'variant' => 'default',
    'defaultOpen' => false,
    'icon' => true,
])

@php
    $variants = [
        'default' => [
            'container' => 'border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-800',
            'header' => 'text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700',
            'icon' => 'text-gray-500',
        ],
        'warning' => [
            'container' => 'border-amber-200 bg-amber-50 dark:border-amber-800 dark:bg-amber-900/20',
            'header' => 'text-amber-700 hover:bg-amber-100 dark:text-amber-300 dark:hover:bg-amber-900/40',
            'icon' => 'text-amber-500',
        ],
        'info' => [
            'container' => 'border-blue-200 bg-blue-50 dark:border-blue-800 dark:bg-blue-900/20',
            'header' => 'text-blue-700 hover:bg-blue-100 dark:text-blue-300 dark:hover:bg-blue-900/40',
            'icon' => 'text-blue-500',
        ],
        'success' => [
            'container' => 'border-green-200 bg-green-50 dark:border-green-800 dark:bg-green-900/20',
            'header' => 'text-green-700 hover:bg-green-100 dark:text-green-300 dark:hover:bg-green-900/40',
            'icon' => 'text-green-500',
        ],
        'danger' => [
            'container' => 'border-red-200 bg-red-50 dark:border-red-800 dark:bg-red-900/20',
            'header' => 'text-red-700 hover:bg-red-100 dark:text-red-300 dark:hover:bg-red-900/40',
            'icon' => 'text-red-500',
        ],
    ];
    $currentVariant = $variants[$variant] ?? $variants['default'];
@endphp

<div
    x-data="{ open: {{ $defaultOpen ? 'true' : 'false' }} }"
    {{ $attributes->merge(['class' => 'overflow-hidden rounded-lg border ' . $currentVariant['container']]) }}
>
    {{-- Header / Toggle Button --}}
    <button
        type="button"
        @click="open = !open"
        class="{{ $currentVariant['header'] }} flex w-full items-center justify-between px-4 py-3 text-left font-medium transition-colors"
    >
        <span class="flex items-center gap-2">
            @if($icon)
                <span :class="{ 'rotate-90': open }" class="{{ $currentVariant['icon'] }} transition-transform duration-200">
                    <x-lucide-chevron-right class="h-5 w-5" />
                </span>
            @endif
            <span>{{ $title }}</span>
        </span>

        <span
            x-show="!open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            class="text-sm opacity-60"
        >
            Click to reveal
        </span>
    </button>

    {{-- Content --}}
    <div
        x-show="open"
        x-collapse
        x-cloak
    >
        <div class="border-t {{ str_replace('bg-', 'border-', explode(' ', $currentVariant['container'])[0]) }} px-4 py-3">
            <div class="prose prose-sm max-w-none dark:prose-invert">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
