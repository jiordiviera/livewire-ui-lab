```blade
{{-- Basic Tabs --}}
<x-ui.tabs default="account">
    <x-ui.tabs.list>
        <x-ui.tabs.trigger tab="account">Account</x-ui.tabs.trigger>
        <x-ui.tabs.trigger tab="settings">Settings</x-ui.tabs.trigger>
    </x-ui.tabs.list>

    <x-ui.tabs.content tab="account">
        <p>Account content here...</p>
    </x-ui.tabs.content>

    <x-ui.tabs.content tab="settings">
        <p>Settings content here...</p>
    </x-ui.tabs.content>
</x-ui.tabs>

{{-- Pills Style --}}
<x-ui.tabs default="overview">
    <x-ui.tabs.list variant="pills">
        <x-ui.tabs.trigger tab="overview" variant="pills" icon="layout-grid">
            Overview
        </x-ui.tabs.trigger>
    </x-ui.tabs.list>

    <x-ui.tabs.content tab="overview">
        <p>Overview content...</p>
    </x-ui.tabs.content>
</x-ui.tabs>
```

### Components

- `<x-ui.tabs>` - Main wrapper with `default` prop
- `<x-ui.tabs.list>` - Tab buttons container with `variant` prop
- `<x-ui.tabs.trigger>` - Tab button with `tab` and `icon` props
- `<x-ui.tabs.content>` - Tab panel with `tab` prop

### Variants

- **underline**: Default style with bottom border
- **pills**: Rounded pill buttons
- **enclosed**: Enclosed tabs with border
