@props([
    'variant' => 'default',
    'animation' => 'pulse',
    'rounded' => 'md',
    'width' => null,
    'height' => null,
    'count' => 1,
    'gap' => '2',
])

@php
    $baseClasses = 'bg-muted';

    $roundedClasses = match($rounded) {
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'xl' => 'rounded-xl',
        'full' => 'rounded-full',
        default => 'rounded-md',
    };

    $animationClasses = match($animation) {
        'pulse' => 'animate-pulse',
        'wave' => 'skeleton-wave',
        'none' => '',
        default => 'animate-pulse',
    };

    $variantClasses = match($variant) {
        'text' => 'h-4 w-full',
        'title' => 'h-6 w-3/4',
        'avatar' => 'size-10 rounded-full',
        'avatar-sm' => 'size-8 rounded-full',
        'avatar-lg' => 'size-14 rounded-full',
        'button' => 'h-10 w-24',
        'card' => 'h-48 w-full',
        'image' => 'h-40 w-full',
        'thumbnail' => 'size-20',
        default => '',
    };

    $sizeStyle = '';
    if ($width) {
        $sizeStyle .= "width: {$width};";
    }
    if ($height) {
        $sizeStyle .= "height: {$height};";
    }

    $classes = \Illuminate\Support\Arr::toCssClasses([
        $baseClasses,
        $roundedClasses,
        $animationClasses,
        $variantClasses,
    ]);
@endphp

@if($count > 1)
    <div class="flex flex-col gap-{{ $gap }}" data-test="skeleton-group">
        @for($i = 0; $i < $count; $i++)
            <div
                {{ $attributes->merge(['class' => $classes]) }}
                @if($sizeStyle) style="{{ $sizeStyle }}" @endif
                aria-hidden="true"
                data-test="skeleton-item"
            ></div>
        @endfor
    </div>
@else
    <div
        {{ $attributes->merge(['class' => $classes]) }}
        @if($sizeStyle) style="{{ $sizeStyle }}" @endif
        aria-hidden="true"
        data-test="skeleton-item"
    ></div>
@endif
