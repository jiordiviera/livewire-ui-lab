## Rating / Star Input Component

The `<x-ui.rating>` component provides interactive star rating with hover effects. Perfect for reviews and feedback forms.

### Basic Usage

```blade
<x-ui.rating />
```

### With Livewire Binding

```blade
{{-- In your Livewire component --}}
public $rating = 0;

{{-- In your blade view --}}
<x-ui.rating
    wire:model.live="rating"
    :showValue="true"
/>
```

### Readonly Display

```blade
<x-ui.rating
    :value="4.5"
    :readonly="true"
    :showValue="true"
/>
```

### Custom Max Stars

```blade
<x-ui.rating :max="3" />
<x-ui.rating :max="10" />
```

### Color Variants

```blade
<x-ui.rating variant="default" />  {{-- Yellow stars --}}
<x-ui.rating variant="primary" />  {{-- Primary color --}}
<x-ui.rating variant="red" />      {{-- Red stars --}}
```

### Sizes

```blade
<x-ui.rating size="sm" />
<x-ui.rating size="md" />
<x-ui.rating size="lg" />
```

### With Value Display

```blade
<x-ui.rating
    :value="4"
    :readonly="true"
    :showValue="true"
/>
<span class="text-sm">(1,234 reviews)</span>
```

## Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `max` | int | `5` | Maximum number of stars |
| `readonly` | bool | `false` | Disable interaction |
| `size` | string | `'md'` | `'sm'`, `'md'`, `'lg'` |
| `showValue` | bool | `false` | Display numeric value |
| `allowHalf` | bool | `false` | Allow half-star ratings |
| `variant` | string | `'default'` | `'default'`, `'primary'`, `'red'` |

## Use Cases

- **Product Reviews**: E-commerce ratings
- **Service Feedback**: Customer satisfaction
- **Content Rating**: Blog posts, videos
- **Skill Assessment**: Profile ratings
- **Quality Indicators**: Performance metrics
- **User Preferences**: Favorite items
