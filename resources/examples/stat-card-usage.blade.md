## Stat Card Component

The `<x-ui.stat-card>` component displays key metrics with trend indicators. 100% Tailwind CSS.

### Basic Usage

```blade
<x-ui.stat-card
    title="Total Revenue"
    value="2.450.000 FCFA"
    icon="wallet"
/>
```

### With Trend Indicator

```blade
<x-ui.stat-card
    title="New Users"
    value="1,247"
    icon="users"
    trend="up"
    trendValue="+12.5%"
    trendLabel="vs last month"
/>

<x-ui.stat-card
    title="Bounce Rate"
    value="32.5%"
    icon="trending-down"
    trend="down"
    trendValue="-5.2%"
/>
```

### Variants

```blade
{{-- Default --}}
<x-ui.stat-card title="Default" value="100" variant="default" />

{{-- Primary --}}
<x-ui.stat-card title="Primary" value="200" variant="primary" icon="star" />

{{-- Success --}}
<x-ui.stat-card title="Success" value="300" variant="success" icon="check" />

{{-- Warning --}}
<x-ui.stat-card title="Warning" value="400" variant="warning" icon="alert-triangle" />

{{-- Danger --}}
<x-ui.stat-card title="Danger" value="500" variant="danger" icon="x-circle" />
```

### With Extra Content (Slot)

```blade
<x-ui.stat-card
    title="Daily Sales"
    value="845.000 FCFA"
    icon="credit-card"
    trend="up"
    trendValue="+23%"
    variant="success"
>
    {{-- Progress bar --}}
    <div class="flex items-center justify-between text-sm">
        <span class="text-muted-foreground">Daily Goal</span>
        <span class="font-medium">1.000.000 FCFA</span>
    </div>
    <div class="mt-2 h-2 bg-muted rounded-full overflow-hidden">
        <div class="h-full bg-green-500" style="width: 84.5%"></div>
    </div>
</x-ui.stat-card>
```

### Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | string | `''` | Card title |
| `value` | string | `'0'` | Main metric value |
| `icon` | string | `'activity'` | Lucide icon name |
| `trend` | string | `null` | `'up'`, `'down'`, or `null` |
| `trendValue` | string | `''` | Trend percentage text |
| `trendLabel` | string | `''` | Additional trend context |
| `variant` | string | `'default'` | Color variant |
