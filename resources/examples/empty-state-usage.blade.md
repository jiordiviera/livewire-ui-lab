## Empty State Component

The `<x-ui.empty-state>` component provides user-friendly messaging when there's no data to display. Essential for good UX.

### Basic Usage

```blade
<x-ui.empty-state
    title="No results found"
    description="Try adjusting your search criteria."
    icon="search-x"
/>
```

### With Action Button

```blade
<x-ui.empty-state
    title="No orders yet"
    description="Start selling by creating your first order."
    icon="shopping-cart"
    actionLabel="Create Order"
    actionUrl="/orders/create"
/>
```

### With Custom Action (Slot)

```blade
<x-ui.empty-state
    title="No products found"
    description="Add your first product to get started."
    icon="package-search"
>
    <button wire:click="createProduct" class="btn btn-primary">
        <x-lucide-plus class="size-4" />
        Add Product
    </button>
</x-ui.empty-state>
```

### Different Icons

```blade
{{-- No search results --}}
<x-ui.empty-state
    title="No results"
    icon="search-x"
/>

{{-- No data --}}
<x-ui.empty-state
    title="No data"
    icon="database"
/>

{{-- No files --}}
<x-ui.empty-state
    title="No files"
    icon="file-x"
/>

{{-- No messages --}}
<x-ui.empty-state
    title="No messages"
    icon="mail-x"
/>

{{-- Empty inbox --}}
<x-ui.empty-state
    title="Empty inbox"
    icon="inbox"
/>
```

### Sizes

```blade
<x-ui.empty-state size="sm" title="Small" />
<x-ui.empty-state size="md" title="Medium" />
<x-ui.empty-state size="lg" title="Large" />
```

### In Data Tables

```blade
@if($items->isEmpty())
    <x-ui.empty-state
        title="No items found"
        description="Try clearing filters or adding new items."
        icon="inbox"
    >
        <button wire:click="clearFilters" class="btn">
            Clear Filters
        </button>
    </x-ui.empty-state>
@else
    {{-- Display data table --}}
@endif
```

## Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | string | `'Aucun résultat'` | Main title |
| `description` | string | `'Aucune donnée à afficher pour le moment.'` | Description text |
| `icon` | string | `'inbox'` | Lucide icon name |
| `actionLabel` | string\|null | `null` | Action button label |
| `actionUrl` | string\|null | `null` | Action button URL |
| `size` | string | `'md'` | `'sm'`, `'md'`, `'lg'` |

## Common Use Cases

- **Empty search results**: Guide users to refine search
- **No data available**: Explain why there's no data
- **Empty lists/tables**: Prompt users to add items
- **No messages**: Show inbox is clean
- **No files uploaded**: Encourage file upload
- **Filter returns nothing**: Suggest clearing filters
