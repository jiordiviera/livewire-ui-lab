## Popover Component

The `<x-ui.popover>` component displays rich content in a floating panel. 100% Tailwind CSS.

### Basic Usage

```blade
<x-ui.popover>
    <button>Click me</button>

    <x-slot:content>
        <p>Popover content here</p>
    </x-slot:content>
</x-ui.popover>
```

### Positions

```blade
{{-- Bottom (default) --}}
<x-ui.popover position="bottom">
    <button>Bottom</button>
    <x-slot:content>Content</x-slot:content>
</x-ui.popover>

{{-- Top --}}
<x-ui.popover position="top">
    <button>Top</button>
    <x-slot:content>Content</x-slot:content>
</x-ui.popover>

{{-- Left --}}
<x-ui.popover position="left">
    <button>Left</button>
    <x-slot:content>Content</x-slot:content>
</x-ui.popover>

{{-- Right --}}
<x-ui.popover position="right">
    <button>Right</button>
    <x-slot:content>Content</x-slot:content>
</x-ui.popover>
```

### Alignment

```blade
{{-- Start aligned --}}
<x-ui.popover position="bottom" align="start">
    <button>Start</button>
    <x-slot:content>Aligned to start</x-slot:content>
</x-ui.popover>

{{-- Center aligned (default) --}}
<x-ui.popover position="bottom" align="center">
    <button>Center</button>
    <x-slot:content>Centered</x-slot:content>
</x-ui.popover>

{{-- End aligned --}}
<x-ui.popover position="bottom" align="end">
    <button>End</button>
    <x-slot:content>Aligned to end</x-slot:content>
</x-ui.popover>
```

### Trigger Modes

```blade
{{-- Click trigger (default) --}}
<x-ui.popover trigger="click">
    <button>Click me</button>
    <x-slot:content>Click-triggered</x-slot:content>
</x-ui.popover>

{{-- Hover trigger --}}
<x-ui.popover trigger="hover">
    <button>Hover me</button>
    <x-slot:content>Hover-triggered</x-slot:content>
</x-ui.popover>
```

### Width Options

```blade
{{-- Auto width (default) --}}
<x-ui.popover width="auto">...</x-ui.popover>

{{-- Small (12rem) --}}
<x-ui.popover width="sm">...</x-ui.popover>

{{-- Medium (16rem) --}}
<x-ui.popover width="md">...</x-ui.popover>

{{-- Large (20rem) --}}
<x-ui.popover width="lg">...</x-ui.popover>

{{-- Full width --}}
<x-ui.popover width="full">...</x-ui.popover>
```

### User Profile Example

```blade
<x-ui.popover position="bottom" align="start" width="md">
    <button class="flex items-center gap-2">
        <x-ui.avatar name="John Doe" size="sm" />
        <span>John Doe</span>
    </button>

    <x-slot:content>
        <div class="space-y-3">
            <div class="flex items-center gap-3">
                <x-ui.avatar name="John Doe" size="lg" />
                <div>
                    <p class="font-semibold">John Doe</p>
                    <p class="text-sm text-muted-foreground">Admin</p>
                </div>
            </div>
            <hr class="border-border" />
            <button class="w-full text-left px-2 py-1.5 text-sm rounded hover:bg-accent">
                View Profile
            </button>
            <button class="w-full text-left px-2 py-1.5 text-sm text-destructive rounded hover:bg-destructive/10">
                Sign Out
            </button>
        </div>
    </x-slot:content>
</x-ui.popover>
```

### Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `position` | string | `bottom` | Position (top, bottom, left, right) |
| `trigger` | string | `click` | Trigger mode (click, hover) |
| `align` | string | `center` | Alignment (start, center, end) |
| `width` | string | `auto` | Width (auto, sm, md, lg, full) |
