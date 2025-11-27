## Data Table Component

The `<x-ui.data-table>` component displays interactive data with search, sorting, filtering and pagination. 100% Tailwind CSS + Alpine.js.

### Basic Usage

```blade
<x-ui.data-table
    :columns="[
        ['key' => 'name', 'label' => 'Name'],
        ['key' => 'email', 'label' => 'Email'],
        ['key' => 'role', 'label' => 'Role'],
    ]"
    :data="[
        ['name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Admin'],
        ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'Editor'],
    ]"
/>
```

### Column Configuration

```blade
@php
$columns = [
    // Basic column
    ['key' => 'id', 'label' => 'ID'],

    // Sortable column
    ['key' => 'name', 'label' => 'Name', 'sortable' => true],

    // Filterable column (shows dropdown filter)
    ['key' => 'status', 'label' => 'Status', 'filterable' => true],

    // Both sortable and filterable
    ['key' => 'role', 'label' => 'Role', 'sortable' => true, 'filterable' => true],

    // Disable sorting for specific column
    ['key' => 'actions', 'label' => 'Actions', 'sortable' => false],
];
@endphp

<x-ui.data-table :columns="$columns" :data="$data" />
```

### Pagination

```blade
{{-- Default 10 items per page --}}
<x-ui.data-table :columns="$columns" :data="$data" />

{{-- Custom items per page --}}
<x-ui.data-table :columns="$columns" :data="$data" :per-page="5" />

{{-- Disable pagination --}}
<x-ui.data-table :columns="$columns" :data="$data" :paginated="false" />
```

### Search

```blade
{{-- With search (default) --}}
<x-ui.data-table :columns="$columns" :data="$data" />

{{-- Custom placeholder --}}
<x-ui.data-table
    :columns="$columns"
    :data="$data"
    search-placeholder="Find users..."
/>

{{-- Disable search --}}
<x-ui.data-table :columns="$columns" :data="$data" :searchable="false" />
```

### Sorting

```blade
{{-- With sorting (default) --}}
<x-ui.data-table :columns="$columns" :data="$data" />

{{-- Disable global sorting --}}
<x-ui.data-table :columns="$columns" :data="$data" :sortable="false" />
```

### Filtering

```blade
{{-- With filtering (default) --}}
<x-ui.data-table :columns="$columns" :data="$data" />

{{-- Disable filtering --}}
<x-ui.data-table :columns="$columns" :data="$data" :filterable="false" />
```

### Loading State

```blade
{{-- Static loading --}}
<x-ui.data-table :columns="$columns" :data="[]" :loading="true" />

{{-- Dynamic loading with Alpine --}}
<div x-data="{ loading: true }">
    <x-ui.data-table :columns="$columns" :data="$data" ::loading="loading" />
</div>
```

### Empty State

```blade
{{-- Custom empty message --}}
<x-ui.data-table
    :columns="$columns"
    :data="[]"
    empty-message="No results found"
/>
```

### Full Example (Livewire Component)

```php
<?php
use Livewire\Volt\Component;

new class extends Component {
    public array $users = [];

    public function mount(): void
    {
        $this->users = [
            ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'role' => 'Admin', 'status' => 'Active'],
            ['id' => 2, 'name' => 'Jane', 'email' => 'jane@example.com', 'role' => 'Editor', 'status' => 'Active'],
            ['id' => 3, 'name' => 'Bob', 'email' => 'bob@example.com', 'role' => 'Viewer', 'status' => 'Inactive'],
        ];
    }

    public function getColumns(): array
    {
        return [
            ['key' => 'id', 'label' => 'ID', 'sortable' => true],
            ['key' => 'name', 'label' => 'Name', 'sortable' => true],
            ['key' => 'email', 'label' => 'Email', 'sortable' => true],
            ['key' => 'role', 'label' => 'Role', 'sortable' => true, 'filterable' => true],
            ['key' => 'status', 'label' => 'Status', 'sortable' => true, 'filterable' => true],
        ];
    }
};
?>

<x-ui.data-table
    :columns="$this->getColumns()"
    :data="$users"
    :per-page="10"
    search-placeholder="Search users..."
/>
```

### Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `columns` | array | `[]` | Column definitions |
| `data` | array | `[]` | Data rows |
| `searchable` | bool | `true` | Enable search |
| `filterable` | bool | `true` | Enable filters |
| `sortable` | bool | `true` | Enable sorting |
| `paginated` | bool | `true` | Enable pagination |
| `perPage` | int | `10` | Items per page |
| `loading` | bool | `false` | Show loading state |
| `emptyMessage` | string | `No data available` | Empty state message |
| `searchPlaceholder` | string | `Search...` | Search input placeholder |

### Column Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `key` | string | required | Data key |
| `label` | string | required | Column header |
| `sortable` | bool | `true` | Enable sorting |
| `filterable` | bool | `false` | Enable filter dropdown |

### Testing Attributes

| Attribute | Description |
|-----------|-------------|
| `data-test="data-table-container"` | Main wrapper |
| `data-test="data-table-toolbar"` | Search/filter toolbar |
| `data-test="data-table-search"` | Search input |
| `data-test="data-table-filters"` | Filter dropdowns |
| `data-test="data-table-reset"` | Reset button |
| `data-test="data-table-wrapper"` | Table wrapper |
| `data-test="data-table"` | Table element |
| `data-test="data-table-row"` | Data row |
| `data-test="data-table-pagination"` | Pagination wrapper |
| `data-test="data-table-info"` | Showing X of Y info |
| `data-test="data-table-page-controls"` | Page controls |
