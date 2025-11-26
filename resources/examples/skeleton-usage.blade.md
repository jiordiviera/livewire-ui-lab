## Skeleton Loader Component

Le composant `<x-ui.skeleton>` affiche un placeholder animé pendant le chargement. 100% Tailwind CSS.

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

### Multiple Lines

```blade
{{-- Generate 4 text lines --}}
<x-ui.skeleton variant="text" :count="4" />

{{-- With custom gap --}}
<x-ui.skeleton variant="text" :count="3" gap="4" />
```

### Custom Sizes (Tailwind Classes)

```blade
{{-- Square 96px --}}
<x-ui.skeleton class="size-24" rounded="lg" />

{{-- Custom width/height --}}
<x-ui.skeleton class="w-36 h-5" />

{{-- Circle 80px --}}
<x-ui.skeleton class="size-20" rounded="full" />

{{-- Full width, fixed height --}}
<x-ui.skeleton class="w-full h-12" />
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
    <x-ui.skeleton variant="image" class="mb-4" />
    <x-ui.skeleton variant="title" class="mb-2" />
    <x-ui.skeleton variant="text" :count="2" />
    <x-ui.skeleton variant="button" class="mt-4" />
</div>
```

### Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | `default` | Predefined variant (text, title, avatar, button, card, image, thumbnail) |
| `rounded` | string | `md` | Border radius (none, sm, md, lg, xl, full) |
| `count` | int | `1` | Number of skeleton items to render |
| `gap` | string | `2` | Gap between items when count > 1 (1-6) |
| `class` | string | `''` | Custom Tailwind classes for sizing |

### Testing Attributes

| Attribute | Description |
|-----------|-------------|
| `data-test="skeleton-item"` | Individual skeleton element |
| `data-test="skeleton-group"` | Container when count > 1 |
