@props([
    'items' => [],
    'variant' => 'default', // default, files, org
    'selectable' => false,
    'defaultExpanded' => false,
    'showLines' => true,
    'animated' => true,
])

@php
    $uniqueId = 'tree-' . uniqid();
@endphp

<div
    x-data="treeView({
        defaultExpanded: @json($defaultExpanded),
        selectable: @json($selectable)
    })"
    {{ $attributes->merge(['class' => 'tree-view']) }}
>
    <ul role="tree" class="space-y-1">
        @foreach($items as $item)
            <x-ui.tree-view-item
                :item="$item"
                :variant="$variant"
                :show-lines="$showLines"
                :animated="$animated"
                :level="0"
            />
        @endforeach
    </ul>
</div>
