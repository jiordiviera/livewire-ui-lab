## Toast Component

The `<x-ui.toast>` component displays temporary notifications. 100% Tailwind CSS + Alpine.js.

### Basic Setup

Add the toast container once in your layout:

```blade
{{-- In your layout file --}}
<x-ui.toast position="bottom-right" />
```

### Trigger from Livewire

```php
// In your Livewire component
public function save()
{
    // ... save logic

    $this->dispatch('toast', [
        'type' => 'success',
        'title' => 'Saved!',
        'message' => 'Your changes have been saved.',
    ]);
}
```

### Trigger from Alpine.js

```blade
<button @click="$dispatch('toast', {
    type: 'info',
    title: 'Hello!',
    message: 'This is a toast notification.'
})">
    Show Toast
</button>
```

### Toast Types

```blade
{{-- Success --}}
$dispatch('toast', { type: 'success', message: 'Operation successful!' })

{{-- Error --}}
$dispatch('toast', { type: 'error', message: 'Something went wrong.' })

{{-- Warning --}}
$dispatch('toast', { type: 'warning', message: 'Please review your input.' })

{{-- Info --}}
$dispatch('toast', { type: 'info', message: 'New update available.' })
```

### Positions

```blade
{{-- Available positions --}}
<x-ui.toast position="top-left" />
<x-ui.toast position="top-center" />
<x-ui.toast position="top-right" />
<x-ui.toast position="bottom-left" />
<x-ui.toast position="bottom-center" />
<x-ui.toast position="bottom-right" />  {{-- default --}}
```

### Custom Duration

```blade
{{-- Container default duration --}}
<x-ui.toast :duration="5000" />

{{-- Per-toast duration --}}
$dispatch('toast', {
    type: 'info',
    message: 'This stays for 10 seconds.',
    duration: 10000
})

{{-- Persistent (no auto-dismiss) --}}
$dispatch('toast', {
    type: 'error',
    message: 'Click X to dismiss.',
    duration: 0
})
```

### Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `position` | string | `bottom-right` | Toast position |
| `duration` | int | `4000` | Auto-dismiss delay (ms) |
| `maxToasts` | int | `5` | Maximum visible toasts |

### Event Payload

| Key | Type | Description |
|-----|------|-------------|
| `type` | string | success, error, warning, info |
| `title` | string | Optional title |
| `message` | string | Toast message |
| `duration` | int | Override default duration |
