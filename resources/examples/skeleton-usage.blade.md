## Skeleton Loader Component

Le composant `<x-ui.skeleton>` affiche un placeholder animé pendant le chargement.

### Basic Usage

```blade
<x-ui.skeleton />
```

### Variants

```blade
{{-- Text line --}}
<x-ui.skeleton variant="text" />

{{-- Title (larger, 75% width) --}}
<x-ui.skeleton variant="title" />

{{-- Avatar sizes --}}
<x-ui.skeleton variant="avatar" />
<x-ui.skeleton variant="avatar-sm" />
<x-ui.skeleton variant="avatar-lg" />

{{-- Button --}}
<x-ui.skeleton variant="button" />

{{-- Card/Image --}}
<x-ui.skeleton variant="card" />
<x-ui.skeleton variant="image" />

{{-- Thumbnail --}}
<x-ui.skeleton variant="thumbnail" />
```

### Animations

```blade
{{-- Pulse animation (default) --}}
<x-ui.skeleton animation="pulse" />

{{-- Wave animation (shimmer effect) --}}
<x-ui.skeleton animation="wave" />

{{-- No animation --}}
<x-ui.skeleton animation="none" />
```

### Multiple Lines

```blade
{{-- Generate 4 text lines --}}
<x-ui.skeleton variant="text" :count="4" />

{{-- With custom gap --}}
<x-ui.skeleton variant="text" :count="3" gap="4" />
```

### Custom Sizes

```blade
{{-- Using width and height props --}}
<x-ui.skeleton width="200px" height="100px" />

{{-- Square with rounded corners --}}
<x-ui.skeleton width="80px" height="80px" rounded="lg" />

{{-- Circle --}}
<x-ui.skeleton width="60px" height="60px" rounded="full" />
```

### Rounded Options

```blade
<x-ui.skeleton rounded="none" />
<x-ui.skeleton rounded="sm" />
<x-ui.skeleton rounded="md" />   {{-- default --}}
<x-ui.skeleton rounded="lg" />
<x-ui.skeleton rounded="xl" />
<x-ui.skeleton rounded="full" />
```

### With Livewire wire:loading

```blade
<div>
    {{-- Show skeleton during loading --}}
    <div wire:loading>
        <x-ui.skeleton variant="title" />
        <x-ui.skeleton variant="text" :count="3" />
    </div>

    {{-- Show content when loaded --}}
    <div wire:loading.remove>
        <h2>{{ $title }}</h2>
        <p>{{ $content }}</p>
    </div>
</div>
```

### Card Loading Example

```blade
<div class="p-4 border rounded-lg">
    <x-ui.skeleton variant="image" animation="wave" class="mb-4" />
    <x-ui.skeleton variant="title" class="mb-2" />
    <x-ui.skeleton variant="text" :count="2" />
    <x-ui.skeleton variant="button" class="mt-4" />
</div>
```

### Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | `default` | Predefined variant (text, title, avatar, button, card, image, thumbnail) |
| `animation` | string | `pulse` | Animation type (pulse, wave, none) |
| `rounded` | string | `md` | Border radius (none, sm, md, lg, xl, full) |
| `width` | string | `null` | Custom width (e.g., "200px", "100%") |
| `height` | string | `null` | Custom height (e.g., "50px") |
| `count` | int | `1` | Number of skeleton items to render |
| `gap` | string | `2` | Gap between items when count > 1 |

### Testing Attributes

| Attribute | Description |
|-----------|-------------|
| `data-test="skeleton-item"` | Individual skeleton element |
| `data-test="skeleton-group"` | Container when count > 1 |
