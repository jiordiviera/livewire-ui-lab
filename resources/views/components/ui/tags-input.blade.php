@props([
    'placeholder' => 'Add a tag...',
    'disabled' => false,
    'maxTags' => null,
    'allowDuplicates' => false,
    'validateEmail' => false,
    'size' => 'md',
])

@php
    $sizeClasses = match($size) {
        'sm' => 'min-h-8 text-sm gap-1 px-2 py-1',
        'lg' => 'min-h-12 text-base gap-2 px-4 py-2',
        default => 'min-h-10 text-sm gap-1.5 px-3 py-1.5',
    };

    $inputSize = match($size) {
        'sm' => 'text-sm py-0.5',
        'lg' => 'text-base py-1',
        default => 'text-sm py-1',
    };

    $tagSize = match($size) {
        'sm' => 'text-xs px-1.5 py-0.5',
        'lg' => 'text-sm px-3 py-1.5',
        default => 'text-xs px-2 py-1',
    };

    $wireModel = $attributes->wire('model')->value();
@endphp

<div
    x-data="tagsInput(@if($wireModel) @entangle($attributes->wire('model')).live @else [] @endif, {
        maxTags: {{ $maxTags ? "'$maxTags'" : 'null' }},
        allowDuplicates: {{ $allowDuplicates ? 'true' : 'false' }},
        validateEmail: {{ $validateEmail ? 'true' : 'false' }}
    })"
    class="relative"
    {{ $attributes->whereDoesntStartWith('wire:model') }}
>
    <div
        @click="$refs.input.focus()"
        class="flex flex-wrap items-center w-full rounded-lg border border-input bg-background text-foreground cursor-text focus-within:ring-2 focus-within:ring-ring focus-within:ring-offset-2 focus-within:ring-offset-background transition-shadow {{ $sizeClasses }}"
        :class="{ 'opacity-50 cursor-not-allowed': {{ $disabled ? 'true' : 'false' }} }"
    >
        {{-- Tags --}}
        <template x-for="(tag, index) in tags" :key="index">
            <span
                class="inline-flex items-center rounded-md bg-primary/10 text-primary font-medium gap-1 {{ $tagSize }}"
            >
                <span x-text="tag"></span>
                <button
                    type="button"
                    @click.stop="removeTag(index)"
                    @disabled($disabled)
                    class="inline-flex items-center justify-center hover:bg-primary/20 rounded-sm transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                    :class="{ 'size-3': '{{ $size }}' === 'sm', 'size-4': '{{ $size }}' === 'lg', 'size-3.5': '{{ $size }}' === 'md' }"
                >
                    <x-lucide-x class="size-full" />
                </button>
            </span>
        </template>

        {{-- Input --}}
        <input
            x-ref="input"
            type="text"
            x-model="inputValue"
            @keydown.enter.prevent="addTag"
            @keydown.comma.prevent="addTag"
            @keydown.backspace="handleBackspace"
            :placeholder="tags.length === 0 ? '{{ $placeholder }}' : ''"
            @disabled($disabled)
            class="flex-1 min-w-[120px] bg-transparent border-0 outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed {{ $inputSize }}"
        />
    </div>

    {{-- Error message --}}
    <p
        x-show="error"
        x-text="error"
        x-cloak
        class="mt-1 text-sm text-destructive"
    ></p>

    {{-- Tag count --}}
    @if($maxTags)
        <p class="mt-1 text-xs text-muted-foreground">
            <span x-text="tags.length"></span> / {{ $maxTags }} tags
        </p>
    @endif
</div>
