@props([
    'id' => 'modal',
    'size' => 'md',
    'closeable' => true,
    'title' => null,
    'footer' => null,
])

@php
    // Size classes
    $sizeClasses = match($size) {
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
        '3xl' => 'max-w-3xl',
        '4xl' => 'max-w-4xl',
        'full' => 'max-w-full mx-4',
        default => 'max-w-md',
    };
@endphp

<div
    x-data="{ open: false }"
    x-on:open-modal-{{ $id }}.window="open = true"
    x-on:close-modal-{{ $id }}.window="open = false"
    @if($closeable)
        x-on:keydown.escape.window="open = false"
    @endif
    x-show="open"
    class="fixed inset-0 z-50 overflow-y-auto"
    style="display: none;"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true"
>
    <!-- Backdrop -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm"
        @if($closeable)
            @click="open = false"
        @endif
        aria-hidden="true"
    ></div>

    <!-- Modal container -->
    <div class="fixed inset-0 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <!-- Modal panel -->
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 transform scale-95 translate-y-4"
                @if($closeable)
                    @click.away="open = false"
                @endif
                {{ $attributes->class([
                    'relative w-full bg-card border-2 border-border rounded-2xl shadow-2xl transform transition-all',
                    $sizeClasses
                ]) }}
            >
                <!-- Header -->
                @if($title || $closeable)
                    <div class="flex items-center justify-between px-6 py-4 border-b border-border">
                        @if($title)
                            <h2 id="modal-title" class="text-xl font-bold text-foreground">
                                {{ $title }}
                            </h2>
                        @endif

                        @if($closeable)
                            <button
                                type="button"
                                @click="open = false"
                                class="ml-auto inline-flex items-center justify-center w-8 h-8 rounded-lg text-muted-foreground hover:text-foreground hover:bg-accent transition-all duration-200"
                                aria-label="Close modal"
                            >
                                <x-dynamic-component
                                    component="lucide-x"
                                    class="w-5 h-5"
                                />
                            </button>
                        @endif
                    </div>
                @endif

                <!-- Body -->
                <div class="px-6 py-4">
                    {{ $slot }}
                </div>

                <!-- Footer -->
                @if($footer)
                    <div class="px-6 py-4 border-t border-border bg-muted/30">
                        {{ $footer }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
