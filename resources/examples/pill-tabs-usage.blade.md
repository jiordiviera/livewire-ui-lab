```blade
{{-- Simple Tabs --}}
<x-ui.pill-tabs :tabs="[
    'overview' => 'Overview',
    'analytics' => 'Analytics',
    'reports' => 'Reports',
]" />

{{-- With Icons and Badges --}}
<x-ui.pill-tabs :tabs="[
    'inbox' => [
        'label' => 'Inbox',
        'icon' => 'inbox',
        'badge' => 12
    ],
    'sent' => [
        'label' => 'Sent',
        'icon' => 'send'
    ],
    'drafts' => [
        'label' => 'Drafts',
        'icon' => 'file-text',
        'badge' => 3
    ],
]" />

{{-- With Livewire Binding --}}
<x-ui.pill-tabs
    wire:model.live="activeTab"
    :tabs="$tabs"
/>

{{-- Size Variants --}}
<x-ui.pill-tabs size="sm" :tabs="$tabs" />
<x-ui.pill-tabs size="md" :tabs="$tabs" />
<x-ui.pill-tabs size="lg" :tabs="$tabs" />

{{-- With Disabled Tab --}}
<x-ui.pill-tabs :tabs="[
    'active' => ['label' => 'Active', 'icon' => 'check'],
    'locked' => ['label' => 'Locked', 'icon' => 'lock', 'disabled' => true],
]" />

{{-- With Content Slot --}}
<x-ui.pill-tabs :tabs="$tabs" activeTab="profile">
    <div class="p-4 border rounded-lg">
        Tab content area
    </div>
</x-ui.pill-tabs>
```
