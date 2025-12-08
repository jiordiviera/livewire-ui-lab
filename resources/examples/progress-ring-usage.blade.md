```blade
{{-- Basic Progress Ring --}}
<x-ui.progress-ring :value="75" />

{{-- With Livewire Binding --}}
<x-ui.progress-ring wire:model.live="progress" />

{{-- Size Variants --}}
<x-ui.progress-ring :value="60" size="sm" />
<x-ui.progress-ring :value="75" size="md" />
<x-ui.progress-ring :value="85" size="lg" />
<x-ui.progress-ring :value="90" size="xl" />

{{-- Color Variants --}}
<x-ui.progress-ring :value="75" color="primary" />
<x-ui.progress-ring :value="85" color="success" />
<x-ui.progress-ring :value="45" color="warning" />
<x-ui.progress-ring :value="25" color="danger" />

{{-- With Label --}}
<x-ui.progress-ring
    :value="75"
    :showLabel="true"
    label="Profile"
/>

{{-- Custom Center Content --}}
<x-ui.progress-ring :value="45" size="lg">
    <x-lucide-hard-drive class="size-6 text-primary" />
</x-ui.progress-ring>

{{-- Custom Max Value --}}
<x-ui.progress-ring
    :value="8"
    :max="12"
    color="success"
>
    <span class="text-sm font-bold">8/12</span>
</x-ui.progress-ring>

{{-- Without Animation --}}
<x-ui.progress-ring :value="50" :animate="false" />
```
