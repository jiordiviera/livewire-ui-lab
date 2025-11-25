@props([
    'avatars' => [],
    'max' => 4,
    'size' => 'md',
    'shape' => 'circle',
    'spacing' => '-2',
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

    $shapeClasses = match($shape) {
        'circle' => 'rounded-full',
        'square' => 'rounded-md',
        'rounded' => 'rounded-lg',
        default => 'rounded-full',
    };

    $spacingClass = "ml-{$spacing}";

    $visibleAvatars = array_slice($avatars, 0, $max);
    $hiddenCount = max(0, count($avatars) - $max);

    // Convert to collection for easier handling
    $avatarsCollection = collect($avatars);
@endphp

<div
    {{ $attributes->merge(['class' => 'flex items-center']) }}
    data-test="avatar-group"
    role="group"
    aria-label="Group of {{ count($avatars) }} avatars"
>
    @foreach($avatarsCollection->take($max) as $index => $avatar)
        @php
            $avatarSrc = is_array($avatar) ? ($avatar['src'] ?? $avatar['image'] ?? null) : $avatar;
            $avatarName = is_array($avatar) ? ($avatar['name'] ?? $avatar['alt'] ?? null) : null;
            $avatarAlt = is_array($avatar) ? ($avatar['alt'] ?? $avatar['name'] ?? '') : '';
            $avatarStatus = is_array($avatar) ? ($avatar['status'] ?? null) : null;
        @endphp

        <div
            class="{{ $index > 0 ? $spacingClass : '' }} relative ring-2 ring-background {{ $shapeClasses }}"
            style="z-index: {{ count($visibleAvatars) - $index }}"
            data-test="avatar-group-item"
        >
            <x-ui.avatar
                :src="$avatarSrc"
                :name="$avatarName"
                :alt="$avatarAlt"
                :size="$size"
                :shape="$shape"
                :status="$avatarStatus"
            />
        </div>
    @endforeach

    @if($hiddenCount > 0)
        <div
            class="{{ $spacingClass }} relative inline-flex items-center justify-center {{ $sizeClasses }} {{ $shapeClasses }} bg-muted ring-2 ring-background"
            style="z-index: 0"
            data-test="avatar-group-overflow"
        >
            <span class="font-medium text-muted-foreground" data-test="avatar-group-count">
                +{{ $hiddenCount }}
            </span>
        </div>
    @endif
</div>
