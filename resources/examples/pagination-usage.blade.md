# Pagination Component Usage

A custom pagination component with full Livewire integration for navigating paginated data.

## Features

- ✅ Livewire `WithPagination` trait integration
- ✅ Smart ellipsis logic for large page counts
- ✅ Previous/Next navigation buttons
- ✅ Disabled states for first/last pages
- ✅ Results counter display
- ✅ ARIA accessible navigation
- ✅ Smooth transitions and hover effects

## Basic Usage

### 1. In Your Livewire Component

```php
<?php

use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public function render()
    {
        return view('livewire.users', [
            'users' => User::paginate(10),
        ]);
    }
};
```

### 2. In Your Blade View

```blade
<div>
    {{-- Your content --}}
    @foreach($users as $user)
        <div>{{ $user->name }}</div>
    @endforeach

    {{-- Pagination --}}
    <x-ui.pagination :paginator="$users" />
</div>
```

## Advanced Usage

### Custom Per Page

```php
public int $perPage = 15;

public function render()
{
    return view('livewire.products', [
        'products' => Product::paginate($this->perPage),
    ]);
}
```

### With Filtering

```php
use Livewire\WithPagination;

public string $search = '';

public function updatingSearch()
{
    $this->resetPage(); // Reset to page 1 when search changes
}

public function render()
{
    return view('livewire.items', [
        'items' => Item::query()
            ->when($this->search, fn($query) =>
                $query->where('name', 'like', '%' . $this->search . '%')
            )
            ->paginate(10),
    ]);
}
```

### Using LengthAwarePaginator

```php
use Illuminate\Pagination\LengthAwarePaginator;

public function getDataProperty()
{
    $allItems = collect([/* your data */]);
    $perPage = 10;
    $currentPage = $this->getPage();

    $items = $allItems->forPage($currentPage, $perPage);

    return new LengthAwarePaginator(
        $items,
        $allItems->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url()]
    );
}
```

## Pagination Logic

The component automatically handles:

- **7 or fewer pages**: Shows all page numbers
- **Current page near start**: `[1, 2, 3, 4, ..., Last]`
- **Current page near end**: `[1, ..., N-3, N-2, N-1, N]`
- **Current page in middle**: `[1, ..., N-1, N, N+1, ..., Last]`

## Props

| Prop | Type | Required | Description |
|------|------|----------|-------------|
| `paginator` | `LengthAwarePaginator` | Yes | Laravel paginator instance |

## Styling

The component uses Tailwind CSS with these key classes:

- `border-border`: Border colors
- `bg-primary`: Active page background
- `text-primary-foreground`: Active page text
- `hover:bg-accent`: Hover state
- `disabled:opacity-50`: Disabled state

## ARIA Attributes

- `role="navigation"`: Navigation landmark
- `aria-label="Pagination Navigation"`: Descriptive label
- `aria-current="page"`: Marks current page
- `disabled`: Disables prev/next when appropriate

## Example: Cameroon Cities

```php
$cities = City::where('country', 'Cameroon')
    ->orderBy('population', 'desc')
    ->paginate(5);
```

```blade
<table>
    <thead>
        <tr>
            <th>Ville</th>
            <th>Région</th>
            <th>Population</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cities as $city)
            <tr>
                <td>{{ $city->name }}</td>
                <td>{{ $city->region }}</td>
                <td>{{ $city->population }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-ui.pagination :paginator="$cities" />
```

## Testing

The component includes data-test attributes:

- `data-test="pagination-container"`: Main container
- `data-test="pagination-info"`: Results counter
- `data-test="pagination-previous"`: Previous button
- `data-test="pagination-next"`: Next button
- `data-test="pagination-pages"`: Page numbers container
- `data-test="pagination-page"`: Individual page button
- `data-test="pagination-ellipsis"`: Ellipsis indicator

## Notes

- Uses `wire:click` for Livewire navigation
- No full page reloads
- Preserves query parameters
- Mobile responsive design
- Smooth transitions on state changes
