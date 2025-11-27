## Drawer Component

The `<x-ui.drawer>` component creates slide-in panels. 100% Tailwind CSS + Alpine.js.

### Basic Usage

```blade
<x-ui.drawer>
    <x-slot:trigger>
        <button>Open Drawer</button>
    </x-slot:trigger>

    <x-slot:header>Drawer Title</x-slot:header>

    <div class="p-4">
        Drawer content here
    </div>

    <x-slot:footer>
        <button @click="close()">Close</button>
    </x-slot:footer>
</x-ui.drawer>
```

### Positions

```blade
{{-- Left (default) --}}
<x-ui.drawer position="left">...</x-ui.drawer>

{{-- Right --}}
<x-ui.drawer position="right">...</x-ui.drawer>

{{-- Top --}}
<x-ui.drawer position="top">...</x-ui.drawer>

{{-- Bottom --}}
<x-ui.drawer position="bottom">...</x-ui.drawer>
```

### Width Options (left/right)

```blade
<x-ui.drawer position="left" width="sm">...</x-ui.drawer>  {{-- 16rem --}}
<x-ui.drawer position="left" width="md">...</x-ui.drawer>  {{-- 20rem (default) --}}
<x-ui.drawer position="left" width="lg">...</x-ui.drawer>  {{-- 24rem --}}
<x-ui.drawer position="left" width="xl">...</x-ui.drawer>  {{-- 28rem --}}
<x-ui.drawer position="left" width="full">...</x-ui.drawer>
```

### Height Options (top/bottom)

```blade
<x-ui.drawer position="bottom" height="sm">...</x-ui.drawer>  {{-- 12rem --}}
<x-ui.drawer position="bottom" height="md">...</x-ui.drawer>  {{-- 18rem --}}
<x-ui.drawer position="bottom" height="lg">...</x-ui.drawer>  {{-- 24rem --}}
<x-ui.drawer position="bottom" height="full">...</x-ui.drawer>
```

### Event-based Control

```blade
{{-- Open drawer --}}
<button @click="$dispatch('open-drawer')">Open</button>

{{-- Close drawer --}}
<button @click="$dispatch('close-drawer')">Close</button>

{{-- Toggle drawer --}}
<button @click="$dispatch('toggle-drawer')">Toggle</button>

{{-- Target specific drawer by ID --}}
<x-ui.drawer id="settings-drawer">...</x-ui.drawer>
<button @click="$dispatch('open-drawer', { id: 'settings-drawer' })">
    Open Settings
</button>
```

### Navigation Sidebar Example

```blade
<x-ui.drawer position="left" width="md">
    <x-slot:trigger>
        <button class="p-2">
            <x-lucide-menu class="size-6" />
        </button>
    </x-slot:trigger>

    <x-slot:header>Navigation</x-slot:header>

    <nav class="p-4 space-y-1">
        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 text-primary">
            <x-lucide-home class="size-5" />
            Dashboard
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-accent">
            <x-lucide-users class="size-5" />
            Users
        </a>
        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-accent">
            <x-lucide-settings class="size-5" />
            Settings
        </a>
    </nav>

    <x-slot:footer>
        <div class="flex items-center gap-3">
            <x-ui.avatar name="John Doe" size="sm" />
            <span class="text-sm">John Doe</span>
        </div>
    </x-slot:footer>
</x-ui.drawer>
```

### Disable Close Behaviors

```blade
{{-- Keep open on escape key --}}
<x-ui.drawer :close-on-escape="false">...</x-ui.drawer>

{{-- Keep open on click outside --}}
<x-ui.drawer :close-on-click-outside="false">...</x-ui.drawer>

{{-- No overlay --}}
<x-ui.drawer :overlay="false">...</x-ui.drawer>
```

### Props Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `position` | string | `left` | left, right, top, bottom |
| `width` | string | `md` | sm, md, lg, xl, full |
| `height` | string | `auto` | sm, md, lg, full |
| `overlay` | bool | `true` | Show backdrop overlay |
| `closeOnEscape` | bool | `true` | Close on Escape key |
| `closeOnClickOutside` | bool | `true` | Close on overlay click |

### Slots

| Slot | Description |
|------|-------------|
| `trigger` | Button/element that opens the drawer |
| `header` | Header content with close button |
| `default` | Main drawer content |
| `footer` | Footer content |
