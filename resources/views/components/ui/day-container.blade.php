@props([
    'dayNumber',
    'title',
    'description' => null,
])

<div class="min-h-screen bg-gradient-to-br from-primary/5 to-secondary/5 p-8 space-y-8">
    <x-ui.day-header
        :dayNumber="$dayNumber"
        :title="$title"
        :description="$description"
    />

    <div {{ $attributes->merge(['class' => 'max-w-7xl mx-auto space-y-8']) }}>
        {{ $slot }}
    </div>
</div>
