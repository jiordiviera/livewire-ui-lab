```blade
{{-- Basic Badge --}}
<x-ui.badge variant="success">Active</x-ui.badge>
<x-ui.badge variant="warning">Pending</x-ui.badge>
<x-ui.badge variant="error">Failed</x-ui.badge>

{{-- With Icon --}}
<x-ui.badge variant="success" icon="check-circle">
    Completed
</x-ui.badge>

{{-- Different Sizes --}}
<x-ui.badge variant="primary" size="sm">Small</x-ui.badge>
<x-ui.badge variant="primary" size="md">Medium</x-ui.badge>
<x-ui.badge variant="primary" size="lg">Large</x-ui.badge>

{{-- Pill Shape --}}
<x-ui.badge variant="info" icon="zap" :pill="true">
    Premium
</x-ui.badge>

{{-- Removable Tags --}}
<x-ui.badge variant="primary" :removable="true">
    Laravel
</x-ui.badge>
```

### Props

- `variant` - Color variant: `default`, `primary`, `secondary`, `success`, `warning`, `error`, `info`, `outline`
- `size` - Size: `sm`, `md` (default), `lg`
- `icon` - Lucide icon name
- `pill` - Boolean for rounded-full shape
- `removable` - Boolean to show X button
