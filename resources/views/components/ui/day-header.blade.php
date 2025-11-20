@props([
    'dayNumber',
    'title',
    'description' => null,
])

<header class="text-center space-y-4">
    <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 border border-primary/20 rounded-full">
        <x-dynamic-component component="lucide-calendar" class="h-4 w-4 text-primary" />
        <span class="text-sm font-semibold text-primary">Day {{ $dayNumber }}</span>
    </div>

    <h1 class="text-4xl md:text-5xl font-bold text-foreground">
        {{ $title }}
    </h1>

    @if($description)
        <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
            {{ $description }}
        </p>
    @endif
</header>
