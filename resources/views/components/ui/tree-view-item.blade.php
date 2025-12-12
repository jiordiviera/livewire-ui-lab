@props([
    'item' => [],
    'variant' => 'default',
    'showLines' => true,
    'animated' => true,
    'level' => 0,
])

@php
    $hasChildren = !empty($item['children']);
    $isFolder = ($item['type'] ?? '') === 'folder' || $hasChildren;
    $itemId = $item['id'] ?? uniqid();
    $paddingLeft = $level * 1.25; // rem

    // File icons based on extension/type
    $fileIcons = [
        'folder' => 'folder',
        'vue' => 'file-code',
        'js' => 'file-code',
        'ts' => 'file-code',
        'php' => 'file-code',
        'html' => 'file-code',
        'css' => 'file-code',
        'json' => 'file-json',
        'md' => 'file-text',
        'image' => 'image',
        'default' => 'file',
    ];

    $iconName = $fileIcons[$item['icon'] ?? ($isFolder ? 'folder' : 'default')] ?? $fileIcons['default'];
@endphp

<li
    x-data="{ expanded: defaultExpanded, selected: false }"
    role="treeitem"
    :aria-expanded="expanded"
    class="relative"
>
    {{-- Connection lines --}}
    @if($showLines && $level > 0)
        <div
            class="absolute left-0 top-0 bottom-0 border-l border-border"
            style="left: {{ ($level - 1) * 1.25 + 0.5 }}rem;"
        ></div>
        <div
            class="absolute border-t border-border"
            style="left: {{ ($level - 1) * 1.25 + 0.5 }}rem; top: 0.875rem; width: 0.75rem;"
        ></div>
    @endif

    {{-- Item content --}}
    <div
        class="group flex items-center gap-2 py-1.5 px-2 rounded-md cursor-pointer transition-colors hover:bg-muted/50"
        :class="{
            'bg-primary/10 text-primary': selected && selectable,
            'hover:bg-muted/50': !selected
        }"
        style="padding-left: {{ $paddingLeft + 0.5 }}rem;"
        @click="
            @if($hasChildren)
                expanded = !expanded
            @endif
            @if($selectable ?? false)
                selected = !selected
            @endif
        "
    >
        {{-- Expand/Collapse icon for folders --}}
        @if($hasChildren)
            <span
                class="flex-shrink-0 size-4 flex items-center justify-center transition-transform duration-200"
                :class="{ 'rotate-90': expanded }"
            >
                <x-lucide-chevron-right class="size-4 text-muted-foreground" />
            </span>
        @else
            <span class="flex-shrink-0 size-4"></span>
        @endif

        {{-- Icon based on variant --}}
        @if($variant === 'files')
            @if($isFolder)
                <x-lucide-folder
                    class="flex-shrink-0 size-4 transition-colors"
                    x-bind:class="expanded ? 'text-yellow-500' : 'text-yellow-600'"
                />
            @else
                @switch($item['icon'] ?? 'default')
                    @case('vue')
                        <span class="flex-shrink-0 size-4 text-green-500 font-bold text-xs">V</span>
                        @break
                    @case('js')
                        <span class="flex-shrink-0 size-4 text-yellow-400 font-bold text-xs bg-yellow-400/20 rounded flex items-center justify-center">JS</span>
                        @break
                    @case('ts')
                        <span class="flex-shrink-0 size-4 text-blue-500 font-bold text-xs bg-blue-500/20 rounded flex items-center justify-center">TS</span>
                        @break
                    @case('php')
                        <span class="flex-shrink-0 size-4 text-purple-500 font-bold text-xs">P</span>
                        @break
                    @case('html')
                        <x-lucide-file-code class="flex-shrink-0 size-4 text-orange-500" />
                        @break
                    @case('json')
                        <x-lucide-braces class="flex-shrink-0 size-4 text-yellow-600" />
                        @break
                    @case('md')
                        <x-lucide-file-text class="flex-shrink-0 size-4 text-blue-400" />
                        @break
                    @case('image')
                        <x-lucide-image class="flex-shrink-0 size-4 text-pink-500" />
                        @break
                    @default
                        <x-lucide-file class="flex-shrink-0 size-4 text-muted-foreground" />
                @endswitch
            @endif
        @elseif($variant === 'org')
            <div class="flex-shrink-0 size-8 rounded-full bg-primary/20 text-primary text-xs font-semibold flex items-center justify-center">
                {{ $item['avatar'] ?? substr($item['name'] ?? '?', 0, 2) }}
            </div>
        @else
            @if($isFolder)
                <x-lucide-folder class="flex-shrink-0 size-4 text-muted-foreground" />
            @else
                <x-lucide-file class="flex-shrink-0 size-4 text-muted-foreground" />
            @endif
        @endif

        {{-- Label --}}
        <div class="flex-1 min-w-0">
            <span class="text-sm font-medium text-foreground truncate block">
                {{ $item['name'] ?? 'Unnamed' }}
            </span>
            @if($variant === 'org' && isset($item['role']))
                <span class="text-xs text-muted-foreground">{{ $item['role'] }}</span>
            @endif
        </div>

        {{-- Optional badge/count --}}
        @if($hasChildren && $variant !== 'org')
            <span class="flex-shrink-0 text-xs text-muted-foreground opacity-0 group-hover:opacity-100 transition-opacity">
                {{ count($item['children']) }}
            </span>
        @endif
    </div>

    {{-- Children (recursive) --}}
    @if($hasChildren)
        <ul
            x-show="expanded"
            x-collapse{{ $animated ? '' : '.duration.0ms' }}
            role="group"
            class="space-y-0.5"
        >
            @foreach($item['children'] as $child)
                <x-ui.tree-view-item
                    :item="$child"
                    :variant="$variant"
                    :show-lines="$showLines"
                    :animated="$animated"
                    :level="$level + 1"
                />
            @endforeach
        </ul>
    @endif
</li>
