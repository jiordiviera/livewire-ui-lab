## Range Slider Component

The `<x-ui.range-slider>` component provides interactive range selection with single or double sliders. 100% Alpine.js with real-time value display.

### Basic Usage (Single Slider)

```blade
<x-ui.range-slider
    :min="0"
    :max="100"
    :step="1"
/>
```

### With Livewire Binding

```blade
{{-- In your Livewire component --}}
public $volume = 50;

{{-- In your blade view --}}
<x-ui.range-slider
    wire:model.live="volume"
    :min="0"
    :max="100"
/>
```

### Double Slider (Range)

```blade
{{-- In your Livewire component --}}
public $price = [25, 75];

{{-- In your blade view --}}
<x-ui.range-slider
    wire:model.live="price"
    :min="0"
    :max="100"
    :step="5"
    type="double"
/>
```

### With Custom Labels

```blade
<x-ui.range-slider
    :min="-10"
    :max="40"
    :step="0.5"
    :showLabels="true"
    :showValue="true"
/>
```

### Color Variants

```blade
<x-ui.range-slider variant="default" />
<x-ui.range-slider variant="primary" />
<x-ui.range-slider variant="success" />
```

### Sizes

```blade
<x-ui.range-slider size="sm" />
<x-ui.range-slider size="md" />
<x-ui.range-slider size="lg" />
```

## Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `min` | int | `0` | Minimum value |
| `max` | int | `100` | Maximum value |
| `step` | int\|float | `1` | Step increment |
| `showValue` | bool | `true` | Display current value |
| `showLabels` | bool | `true` | Show min/max labels |
| `size` | string | `'md'` | `'sm'`, `'md'`, `'lg'` |
| `variant` | string | `'default'` | `'default'`, `'primary'`, `'success'` |
| `type` | string | `'single'` | `'single'`, `'double'` |

## Use Cases

- **Volume Control**: Audio, video playback settings
- **Price Range Filter**: E-commerce filtering
- **Temperature Settings**: Climate control interfaces
- **Progress Indicators**: Interactive progress bars
- **Opacity/Transparency**: Image/design tools
- **Age/Date Ranges**: Form filters
