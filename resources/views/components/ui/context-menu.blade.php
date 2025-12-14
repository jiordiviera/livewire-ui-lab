@props([
    'items' => [],
    'trigger' => 'contextmenu',
])

<div
    x-data="contextMenu({ items: {{ json_encode($items) }} })"
    x-on:contextmenu.prevent="open($event)"
    x-on:click.away="close()"
    x-on:keydown.escape.window="close()"
    {{ $attributes->merge(['class' => 'relative']) }}
>
    {{-- Trigger Area --}}
    <div class="context-menu-trigger">
        {{ $slot }}
    </div>

    {{-- Context Menu --}}
    <template x-teleport="body">
        <div
            x-show="isOpen"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            :style="{ top: position.y + 'px', left: position.x + 'px' }"
            class="fixed z-50 min-w-48 rounded-lg border border-gray-200 bg-white py-1 shadow-lg dark:border-gray-700 dark:bg-gray-800"
            x-cloak
        >
            <template x-for="(item, index) in items" :key="index">
                <div>
                    {{-- Separator --}}
                    <template x-if="item.type === 'separator'">
                        <div class="my-1 border-t border-gray-200 dark:border-gray-700"></div>
                    </template>

                    {{-- Menu Item with Children (Submenu) --}}
                    <template x-if="!item.type && item.children">
                        <div
                            class="relative"
                            x-data="{ submenuOpen: false }"
                            @mouseenter="submenuOpen = true"
                            @mouseleave="submenuOpen = false"
                        >
                            <button
                                type="button"
                                class="flex w-full items-center justify-between px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                            >
                                <span class="flex items-center gap-2">
                                    <template x-if="item.icon">
                                        <span class="inline-flex">
                                            <template x-if="item.icon === 'share-2'"><x-lucide-share-2 class="h-4 w-4" /></template>
                                            <template x-if="item.icon === 'folder'"><x-lucide-folder class="h-4 w-4" /></template>
                                            <template x-if="item.icon === 'more-horizontal'"><x-lucide-more-horizontal class="h-4 w-4" /></template>
                                        </span>
                                    </template>
                                    <span x-text="item.label"></span>
                                </span>
                                <x-lucide-chevron-right class="h-4 w-4" />
                            </button>

                            {{-- Submenu --}}
                            <div
                                x-show="submenuOpen"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 translate-x-1"
                                x-transition:enter-end="opacity-100 translate-x-0"
                                class="absolute left-full top-0 ml-1 min-w-40 rounded-lg border border-gray-200 bg-white py-1 shadow-lg dark:border-gray-700 dark:bg-gray-800"
                            >
                                <template x-for="(child, childIndex) in item.children" :key="childIndex">
                                    <button
                                        type="button"
                                        @click="$dispatch('context-action', { action: child.action })"
                                        class="flex w-full items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                                    >
                                        <span class="inline-flex">
                                            <template x-if="child.icon === 'link'"><x-lucide-link class="h-4 w-4" /></template>
                                            <template x-if="child.icon === 'mail'"><x-lucide-mail class="h-4 w-4" /></template>
                                            <template x-if="child.icon === 'download'"><x-lucide-download class="h-4 w-4" /></template>
                                            <template x-if="child.icon === 'copy'"><x-lucide-copy class="h-4 w-4" /></template>
                                        </span>
                                        <span x-text="child.label"></span>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </template>

                    {{-- Regular Menu Item --}}
                    <template x-if="!item.type && !item.children">
                        <button
                            type="button"
                            @click="executeAction(item.action); close()"
                            :class="{
                                'text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20': item.variant === 'danger',
                                'text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700': item.variant !== 'danger'
                            }"
                            class="flex w-full items-center justify-between px-3 py-2 text-sm"
                        >
                            <span class="flex items-center gap-2">
                                <template x-if="item.icon">
                                    <span class="inline-flex">
                                        <template x-if="item.icon === 'eye'"><x-lucide-eye class="h-4 w-4" /></template>
                                        <template x-if="item.icon === 'pencil'"><x-lucide-pencil class="h-4 w-4" /></template>
                                        <template x-if="item.icon === 'copy'"><x-lucide-copy class="h-4 w-4" /></template>
                                        <template x-if="item.icon === 'scissors'"><x-lucide-scissors class="h-4 w-4" /></template>
                                        <template x-if="item.icon === 'folder'"><x-lucide-folder class="h-4 w-4" /></template>
                                        <template x-if="item.icon === 'share-2'"><x-lucide-share-2 class="h-4 w-4" /></template>
                                        <template x-if="item.icon === 'trash-2'"><x-lucide-trash-2 class="h-4 w-4" /></template>
                                        <template x-if="item.icon === 'clipboard'"><x-lucide-clipboard class="h-4 w-4" /></template>
                                        <template x-if="item.icon === 'bold'"><x-lucide-bold class="h-4 w-4" /></template>
                                        <template x-if="item.icon === 'italic'"><x-lucide-italic class="h-4 w-4" /></template>
                                        <template x-if="item.icon === 'underline'"><x-lucide-underline class="h-4 w-4" /></template>
                                        <template x-if="item.icon === 'search'"><x-lucide-search class="h-4 w-4" /></template>
                                        <template x-if="item.icon === 'link'"><x-lucide-link class="h-4 w-4" /></template>
                                        <template x-if="item.icon === 'mail'"><x-lucide-mail class="h-4 w-4" /></template>
                                        <template x-if="item.icon === 'download'"><x-lucide-download class="h-4 w-4" /></template>
                                    </span>
                                </template>
                                <span x-text="item.label"></span>
                            </span>
                            <template x-if="item.shortcut">
                                <kbd class="ml-4 rounded bg-gray-100 px-1.5 py-0.5 text-xs text-gray-500 dark:bg-gray-700 dark:text-gray-400" x-text="item.shortcut"></kbd>
                            </template>
                        </button>
                    </template>
                </div>
            </template>
        </div>
    </template>
</div>
