@props([
    'title' => null,
    'icon' => null,
    'subtitle' => null,
])

<section {{ $attributes->merge(['class' => 'bg-card border border-border rounded-xl sm:rounded-2xl p-4 sm:p-6 md:p-8 space-y-4 sm:space-y-6']) }}>
    @if($title || $icon)
        <div class="flex items-center gap-2 sm:gap-3">
            @if($icon)
                <div class="p-1.5 sm:p-2 bg-primary/10 rounded-lg shrink-0">
                    <x-dynamic-component :component="'lucide-' . $icon" class="size-5 sm:size-6 text-primary" />
                </div>
            @endif

            @if($title)
                <div class="min-w-0">
                    <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-foreground truncate">{{ $title }}</h2>
                    @if($subtitle)
                        <p class="text-xs sm:text-sm text-muted-foreground line-clamp-2">{{ $subtitle }}</p>
                    @endif
                </div>
            @endif
        </div>
    @endif

    {{ $slot }}
</section>
