## Tags Input Component

The `<x-ui.tags-input>` component allows users to input multiple values as tags. 100% Alpine.js with Livewire binding support.

### Basic Usage

```blade
<x-ui.tags-input placeholder="Add tags..." />
```

### With Livewire Binding

```blade
{{-- In your Livewire component --}}
public array $tags = [];

{{-- In your blade view --}}
<x-ui.tags-input
    wire:model.live="tags"
    placeholder="Type and press Enter..."
/>
```

### Email Validation

```blade
<x-ui.tags-input
    wire:model.live="emails"
    placeholder="email@example.com"
    :validateEmail="true"
/>
```

### Max Tags Limit

```blade
<x-ui.tags-input
    wire:model.live="skills"
    :maxTags="5"
    :allowDuplicates="false"
    placeholder="Max 5 skills..."
/>
```

### Sizes

```blade
<x-ui.tags-input size="sm" placeholder="Small" />
<x-ui.tags-input size="md" placeholder="Medium" />
<x-ui.tags-input size="lg" placeholder="Large" />
```

### Disabled State

```blade
<x-ui.tags-input :disabled="true" placeholder="Disabled" />
```

## Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `placeholder` | string | `'Ajouter un tag...'` | Input placeholder |
| `disabled` | bool | `false` | Disable input |
| `maxTags` | int\|null | `null` | Maximum number of tags |
| `allowDuplicates` | bool | `false` | Allow duplicate tags |
| `validateEmail` | bool | `false` | Validate email format |
| `size` | string | `'md'` | `'sm'`, `'md'`, `'lg'` |

## Keyboard Shortcuts

- **Enter** or **Comma (,)**: Add tag
- **Backspace** (when input empty): Remove last tag
- **X button**: Remove specific tag

## Features

- Add tags with Enter or Comma
- Remove tags with X button or Backspace
- Email validation (optional)
- Max tags limit (optional)
- Duplicate prevention (optional)
- Full Livewire binding support
- Error messages for validation
- Three size variants
