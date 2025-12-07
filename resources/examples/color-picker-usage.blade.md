```blade
{{-- Basic Color Picker --}}
<x-ui.color-picker value="#3b82f6" />

{{-- With Label --}}
<x-ui.color-picker
    label="Brand Color"
    value="#22c55e"
/>

{{-- With Livewire Binding --}}
<x-ui.color-picker wire:model.live="color" />

{{-- Size Variants --}}
<x-ui.color-picker size="sm" value="#ef4444" />
<x-ui.color-picker size="md" value="#3b82f6" />
<x-ui.color-picker size="lg" value="#8b5cf6" />

{{-- Without Presets --}}
<x-ui.color-picker
    value="#f59e0b"
    :showPresets="false"
/>

{{-- Without Input Field --}}
<x-ui.color-picker
    value="#ec4899"
    :showInput="false"
/>

{{-- Custom Presets --}}
<x-ui.color-picker
    :presets="['#ff0000', '#00ff00', '#0000ff']"
/>
```
