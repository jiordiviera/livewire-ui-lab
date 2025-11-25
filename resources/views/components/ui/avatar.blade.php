@props([
    'src' => null,
    'alt' => '',
    'name' => null,
    'size' => 'md',
    'shape' => 'circle',
    'status' => null,
    'fallbackIcon' => 'user',
])

@php
    $sizeClasses = match($size) {
        'xs' => 'size-6 text-xs',
        'sm' => 'size-8 text-sm',
        'md' => 'size-10 text-base',
        'lg' => 'size-12 text-lg',
        'xl' => 'size-14 text-xl',
        '2xl' => 'size-16 text-2xl',
        default => 'size-10 text-base',
    };

    $iconSizes = match($size) {
        'xs' => 'size-3',
        'sm' => 'size-4',
        'md' => 'size-5',
        'lg' => 'size-6',
        'xl' => 'size-7',
        '2xl' => 'size-8',
        default => 'size-5',
    };

    $shapeClasses = match($shape) {
        'circle' => 'rounded-full',
        'square' => 'rounded-md',
        'rounded' => 'rounded-lg',
        default => 'rounded-full',
    };

    $statusClasses = match($status) {
        'online' => 'bg-green-500',
        'offline' => 'bg-gray-400',
        'busy' => 'bg-red-500',
        'away' => 'bg-yellow-500',
        default => '',
    };

    $statusSizeClasses = match($size) {
        'xs' => 'size-1.5',
        'sm' => 'size-2',
        'md' => 'size-2.5',
        'lg' => 'size-3',
        'xl' => 'size-3.5',
        '2xl' => 'size-4',
        default => 'size-2.5',
    };

    // Generate initials from name
    $initials = null;
    if ($name) {
        $words = explode(' ', trim($name));
        if (count($words) >= 2) {
            $initials = strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
        } else {
            $initials = strtoupper(substr($name, 0, 2));
        }
    }

    $baseClasses = "relative inline-flex items-center justify-center overflow-hidden bg-muted {$sizeClasses} {$shapeClasses}";
@endphp

<div
    {{ $attributes->merge(['class' => $baseClasses]) }}
    data-test="avatar-container"
>
    @if($src)
        <img
            src="{{ $src }}"
            alt="{{ $alt ?: $name }}"
            class="size-full object-cover"
            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
            data-test="avatar-image"
        />
        {{-- Fallback container (hidden by default, shown on image error) --}}
        <span
            class="hidden items-center justify-center size-full bg-muted text-muted-foreground font-medium"
            data-test="avatar-fallback"
        >
            @if($initials)
                {{ $initials }}
            @else
                <x-dynamic-component :component="'lucide-' . $fallbackIcon" class="{{ $iconSizes }}" />
            @endif
        </span>
    @elseif($initials)
        <span class="font-medium text-muted-foreground" data-test="avatar-initials">
            {{ $initials }}
        </span>
    @else
        <x-dynamic-component
            :component="'lucide-' . $fallbackIcon"
            class="{{ $iconSizes }} text-muted-foreground"
            data-test="avatar-icon"
        />
    @endif

    @if($status)
        <span
            class="absolute bottom-0 right-0 block {{ $statusSizeClasses }} {{ $statusClasses }} rounded-full ring-2 ring-background"
            data-test="avatar-status"
            aria-label="{{ ucfirst($status) }}"
        ></span>
    @endif
</div>
