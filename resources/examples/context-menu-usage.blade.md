```blade
{{-- Basic Context Menu --}}
<x-ui.context-menu :items="$menuItems">
    <div class="p-4 border rounded-lg">
        Right-click here to see the menu
    </div>
</x-ui.context-menu>

{{-- Menu Items Array Structure --}}
@php
$menuItems = [
    // Regular item with icon
    [
        'icon' => 'copy',
        'label' => 'Copy',
        'action' => 'copy',
        'shortcut' => 'Ctrl+C'
    ],

    // Separator
    ['type' => 'separator'],

    // Item with submenu
    [
        'icon' => 'share-2',
        'label' => 'Share',
        'action' => 'share',
        'children' => [
            ['icon' => 'link', 'label' => 'Copy link', 'action' => 'copy-link'],
            ['icon' => 'mail', 'label' => 'Send by email', 'action' => 'email'],
        ]
    ],

    // Danger variant
    [
        'icon' => 'trash-2',
        'label' => 'Delete',
        'action' => 'delete',
        'variant' => 'danger'
    ],
];
@endphp

{{-- Handle Action in Livewire --}}
{{-- In your Livewire component: --}}
public function handleContextAction(string $action): void
{
    match($action) {
        'copy' => $this->copyToClipboard(),
        'delete' => $this->deleteItem(),
        default => null,
    };
}
```
