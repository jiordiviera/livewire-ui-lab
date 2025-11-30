## Date Picker Component

The `<x-ui.date-picker>` component provides native date selection with Alpine.js. 100% Tailwind CSS, no external dependencies.

### Basic Usage

```blade
<x-ui.date-picker placeholder="Select a date" />
```

### With Livewire Binding

```blade
{{-- In your Livewire component --}}
public string $selectedDate = '';

{{-- In your blade view --}}
<x-ui.date-picker
    wire:model.live="selectedDate"
    placeholder="Choose a date"
/>
```

### With Date Constraints

```blade
{{-- Only future dates --}}
<x-ui.date-picker
    minDate="{{ now()->format('Y-m-d') }}"
    placeholder="Future dates only"
/>

{{-- Date range --}}
<x-ui.date-picker
    minDate="2025-01-01"
    maxDate="2025-12-31"
    placeholder="2025 only"
/>
```

### Sizes

```blade
<x-ui.date-picker size="sm" placeholder="Small" />
<x-ui.date-picker size="md" placeholder="Medium" />
<x-ui.date-picker size="lg" placeholder="Large" />
```

### Custom Icon

```blade
<x-ui.date-picker
    icon="calendar-check"
    placeholder="With custom icon"
/>
```

### Disabled State

```blade
<x-ui.date-picker
    :disabled="true"
    placeholder="Disabled"
/>
```

### Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `placeholder` | string | `'Sélectionner une date'` | Input placeholder |
| `disabled` | bool | `false` | Disable input |
| `icon` | string | `'calendar'` | Lucide icon name |
| `clearable` | bool | `true` | Show clear button |
| `size` | string | `'md'` | `'sm'`, `'md'`, `'lg'` |
| `minDate` | string | `null` | Minimum date (Y-m-d format) |
| `maxDate` | string | `null` | Maximum date (Y-m-d format) |

### Events

```blade
{{-- Listen to change event --}}
<x-ui.date-picker
    @change="console.log($event.detail)"
/>

{{-- Listen to clear event --}}
<x-ui.date-picker
    @clear="handleClear()"
/>
```
