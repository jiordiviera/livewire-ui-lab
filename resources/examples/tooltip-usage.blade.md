## Tooltip Component

The `<x-ui.tooltip>` component displays contextual information on hover. 100% Tailwind CSS.

### Basic Usage

```blade
<x-ui.tooltip content="This is a tooltip">
    <button>Hover me</button>
</x-ui.tooltip>
```

### Positions

```blade
{{-- Top (default) --}}
<x-ui.tooltip content="Top tooltip" position="top">
    <button>Top</button>
</x-ui.tooltip>

{{-- Bottom --}}
<x-ui.tooltip content="Bottom tooltip" position="bottom">
    <button>Bottom</button>
</x-ui.tooltip>

{{-- Left --}}
<x-ui.tooltip content="Left tooltip" position="left">
    <button>Left</button>
</x-ui.tooltip>

{{-- Right --}}
<x-ui.tooltip content="Right tooltip" position="right">
    <button>Right</button>
</x-ui.tooltip>
```

### Custom Delay

```blade
{{-- Instant (0ms) --}}
<x-ui.tooltip content="No delay" :delay="0">
    <button>Instant</button>
</x-ui.tooltip>

{{-- Slow (500ms) --}}
<x-ui.tooltip content="Slow tooltip" :delay="500">
    <button>Slow</button>
</x-ui.tooltip>
```

### Without Arrow

```blade
<x-ui.tooltip content="No arrow" :arrow="false">
    <button>Hover me</button>
</x-ui.tooltip>
```

### Icon Tooltips

```blade
<x-ui.tooltip content="Settings">
    <button class="p-2 rounded-lg hover:bg-accent">
        <x-lucide-settings class="size-5" />
    </button>
</x-ui.tooltip>
```

### Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `content` | string | `''` | Tooltip text content |
| `position` | string | `top` | Position (top, bottom, left, right) |
| `delay` | int | `200` | Delay before showing (ms) |
| `arrow` | bool | `true` | Show arrow pointer |

### Testing Attributes

| Attribute | Description |
|-----------|-------------|
| `data-test="tooltip-container"` | Main wrapper |
| `data-test="tooltip-trigger"` | Trigger element |
| `data-test="tooltip-content"` | Tooltip content |
| `data-test="tooltip-arrow"` | Arrow element |
