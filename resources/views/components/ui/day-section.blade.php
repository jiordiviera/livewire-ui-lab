@props([
    'title' => null,
    'icon' => null,
    'subtitle' => null,
])

<section {{ $attributes->merge(['class' => 'bg-card border border-border rounded-2xl p-8 space-y-6']) }}>
    @if($title || $icon)
        <div class="flex items-center gap-3">
            @if($icon)
                <div class="p-2 bg-primary/10 rounded-lg">
                    <x-dynamic-component :component="'lucide-' . $icon" class="h-6 w-6 text-primary" />
                </div>
            @endif

            @if($title)
                <div>
                    <h2 class="text-2xl font-bold text-foreground">{{ $title }}</h2>
                    @if($subtitle)
                        <p class="text-sm text-muted-foreground">{{ $subtitle }}</p>
                    @endif
                </div>
            @endif
        </div>
    @endif

    {{ $slot }}
</section>
