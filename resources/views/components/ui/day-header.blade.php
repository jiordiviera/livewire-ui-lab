@props([
    'dayNumber',
    'title',
    'description' => null,
])

<header class="text-center space-y-2 sm:space-y-4">
    <div class="inline-flex items-center gap-1.5 sm:gap-2 px-3 sm:px-4 py-1.5 sm:py-2 bg-primary/10 border border-primary/20 rounded-full">
        <x-dynamic-component component="lucide-calendar" class="size-3.5 sm:size-4 text-primary" />
        <span class="text-xs sm:text-sm font-semibold text-primary">Day {{ $dayNumber }}</span>
    </div>

    <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-foreground px-2">
        {{ $title }}
    </h1>

    @if($description)
        <p class="text-sm sm:text-base md:text-lg text-muted-foreground max-w-2xl mx-auto px-2">
            {{ $description }}
        </p>
    @endif
</header>
