```blade
{{-- Basic Tree View --}}
<x-ui.tree-view :items="$items" />

{{-- File Explorer Variant --}}
<x-ui.tree-view
    :items="$fileTree"
    variant="files"
    :show-lines="true"
/>

{{-- Organization Chart --}}
<x-ui.tree-view
    :items="$orgTree"
    variant="org"
    :default-expanded="true"
/>

{{-- Data Structure --}}
@php
$items = [
    [
        'id' => 1,
        'name' => 'Parent',
        'type' => 'folder',
        'children' => [
            [
                'id' => 2,
                'name' => 'Child 1',
                'type' => 'file',
                'icon' => 'js', // vue, ts, php...
            ],
            [
                'id' => 3,
                'name' => 'Child 2',
                'type' => 'folder',
                'children' => [...],
            ],
        ],
    ],
];
@endphp

{{-- Organization Structure --}}
@php
$org = [
    [
        'id' => 1,
        'name' => 'CEO',
        'role' => 'Director',
        'avatar' => 'JD',
        'children' => [...],
    ],
];
@endphp

{{-- Props --}}
variant: default|files|org
showLines: true|false
defaultExpanded: true|false
selectable: true|false
animated: true|false
```
