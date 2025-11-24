# Breadcrumbs Component Usage

A flexible breadcrumb navigation component with icon separators and ARIA accessibility.

## Features

- ✅ Icon-based separators (Lucide icons)
- ✅ Active page indication (non-clickable)
- ✅ Flexible item format (array or string)
- ✅ ARIA accessible navigation
- ✅ Hover effects on links
- ✅ Customizable separator icons

## Basic Usage

### Simple Array Format

```blade
<x-ui.breadcrumbs :items="[
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Products', 'url' => '/products'],
    ['label' => 'Laptop']
]" />
```

### Using 'name' and 'href' Keys

```blade
<x-ui.breadcrumbs :items="[
    ['name' => 'Dashboard', 'href' => '/dashboard'],
    ['name' => 'Settings', 'href' => '/settings'],
    ['name' => 'Profile']
]" />
```

## Separator Options

The component uses Lucide icons for separators. Change the separator with the `separator` prop:

### Default (Chevron Right)

```blade
<x-ui.breadcrumbs :items="$items" />
```

### Slash Separator

```blade
<x-ui.breadcrumbs
    separator="slash"
    :items="$items"
/>
```

### Circle Separator

```blade
<x-ui.breadcrumbs
    separator="circle"
    :items="$items"
/>
```

### Other Options

Any Lucide icon name works:
- `chevron-right` (default)
- `slash`
- `circle`
- `arrow-right`
- `minus`
- `chevron-left`
- `dot`

## Dynamic Breadcrumbs

### From Route Segments

```php
public function getBreadcrumbsProperty()
{
    $segments = request()->segments();
    $items = [['label' => 'Home', 'url' => '/']];

    $path = '';
    foreach ($segments as $segment) {
        $path .= '/' . $segment;
        $items[] = [
            'label' => ucfirst($segment),
            'url' => $path
        ];
    }

    return $items;
}
```

```blade
<x-ui.breadcrumbs :items="$this->breadcrumbs" />
```

### From Model Hierarchy

```php
// For a nested category system
public function getBreadcrumbsForCategory($category)
{
    $items = [['label' => 'Home', 'url' => '/']];

    foreach ($category->ancestors as $ancestor) {
        $items[] = [
            'label' => $ancestor->name,
            'url' => route('category.show', $ancestor)
        ];
    }

    $items[] = ['label' => $category->name];

    return $items;
}
```

## Real-World Examples

### E-commerce Navigation

```blade
<x-ui.breadcrumbs :items="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Electronics', 'url' => route('category', 'electronics')],
    ['label' => 'Laptops', 'url' => route('category.sub', ['electronics', 'laptops'])],
    ['label' => 'MacBook Pro 14"']
]" />
```

### Administrative Hierarchy (Cameroon Example)

```blade
<x-ui.breadcrumbs :items="[
    ['label' => 'Accueil', 'url' => '/'],
    ['label' => 'Régions', 'url' => route('regions.index')],
    ['label' => 'Centre', 'url' => route('regions.show', 'centre')],
    ['label' => 'Départements', 'url' => route('regions.departments', 'centre')],
    ['label' => 'Mfoundi']
]" />
```

### Documentation Navigation

```blade
<x-ui.breadcrumbs
    separator="slash"
    :items="[
        ['label' => 'Docs', 'url' => '/docs'],
        ['label' => 'Components', 'url' => '/docs/components'],
        ['label' => 'Navigation', 'url' => '/docs/components/navigation'],
        ['label' => 'Breadcrumbs']
    ]"
/>
```

### Settings Navigation

```blade
<x-ui.breadcrumbs
    separator="arrow-right"
    :items="[
        ['label' => 'Settings', 'url' => route('settings')],
        ['label' => 'Account', 'url' => route('settings.account')],
        ['label' => 'Security']
    ]"
/>
```

## Styling Customization

### Custom Classes

```blade
<x-ui.breadcrumbs
    class="my-4 px-6"
    :items="$items"
/>
```

### Within Containers

```blade
<div class="bg-muted/30 p-4 rounded-lg">
    <x-ui.breadcrumbs :items="$items" />
</div>
```

## Props

| Prop | Type | Required | Default | Description |
|------|------|----------|---------|-------------|
| `items` | `array` | Yes | `[]` | Array of breadcrumb items |
| `separator` | `string` | No | `'chevron-right'` | Lucide icon name for separator |

## Item Format

Each item can be:

### Object with 'label' and 'url'
```php
['label' => 'Products', 'url' => '/products']
```

### Object with 'name' and 'href'
```php
['name' => 'Products', 'href' => '/products']
```

### Last item (no URL)
```php
['label' => 'Current Page']
```

## ARIA Attributes

- `role="navigation"`: Navigation landmark
- `aria-label="Breadcrumb"`: Descriptive label
- `role="list"`: Ordered list of items
- `aria-current="page"`: Marks current page

## Testing

The component includes data-test attributes:

- `data-test="breadcrumbs-container"`: Main container
- `data-test="breadcrumb-item"`: Each breadcrumb item
- `data-test="breadcrumb-link"`: Clickable links
- `data-test="breadcrumb-current"`: Current page
- `data-test="breadcrumb-separator"`: Separator icons

## Best Practices

1. **Keep it short**: Max 4-5 levels for readability
2. **Use descriptive labels**: Clear, concise names
3. **Home first**: Start with home/root page
4. **Last item non-clickable**: Current page shouldn't link
5. **Mobile consideration**: Hide on small screens if needed

## Integration with Pagination

```blade
<div class="space-y-4">
    {{-- Breadcrumb navigation --}}
    <x-ui.breadcrumbs :items="[
        ['label' => 'Dashboard', 'url' => '/'],
        ['label' => 'Users', 'url' => '/users'],
        ['label' => 'List']
    ]" />

    {{-- Content --}}
    @foreach($users as $user)
        <div>{{ $user->name }}</div>
    @endforeach

    {{-- Pagination --}}
    <x-ui.pagination :paginator="$users" />
</div>
```

## Notes

- Automatically detects last item (non-clickable)
- Separator not shown after last item
- Supports any Lucide icon for separators
- Hover effects on clickable links
- Responsive text sizing
