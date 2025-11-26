@props([
    'dayNumber',
    'title',
    'description' => null,
])

<div class="min-h-screen bg-gradient-to-br from-primary/5 to-secondary/5 p-4 sm:p-6 md:p-8 space-y-4 sm:space-y-6 md:space-y-8">
    <x-ui.day-header
        :dayNumber="$dayNumber"
        :title="$title"
        :description="$description"
    />

    <div {{ $attributes->merge(['class' => 'max-w-7xl mx-auto space-y-4 sm:space-y-6 md:space-y-8']) }}>
        {{ $slot }}
    </div>
</div>
