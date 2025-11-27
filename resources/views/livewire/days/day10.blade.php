<x-ui.day-container :dayNumber="$dayNumber" title="Drawer & Toast" description="Navigation panels and notification system for modern applications">
    {{-- Toast Container --}}
    <x-ui.toast position="bottom-right" />

    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        {{-- Toast Section --}}
        <x-ui.day-section icon="bell" title="Toast Notifications">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Non-intrusive notifications that appear temporarily and auto-dismiss.
                </p>

                {{-- Features list --}}
                <div class="p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Multiple positions (6 options)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Auto-dismiss with progress bar</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>4 types: success, error, warning, info</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Livewire event integration</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Manual close button</span>
                        </li>
                    </ul>
                </div>

                {{-- Toast Types --}}
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-4">Toast Types</h3>
                    <div class="grid grid-cols-2 gap-3">
                        <button
                            wire:click="showSuccessToast"
                            class="px-4 py-2.5 bg-green-500/10 text-green-600 dark:text-green-400 border border-green-500/30 rounded-lg text-sm font-medium hover:bg-green-500/20 transition-colors"
                        >
                            <x-lucide-check-circle class="size-4 inline mr-2" />
                            Success
                        </button>

                        <button
                            wire:click="showErrorToast"
                            class="px-4 py-2.5 bg-destructive/10 text-destructive border border-destructive/30 rounded-lg text-sm font-medium hover:bg-destructive/20 transition-colors"
                        >
                            <x-lucide-x-circle class="size-4 inline mr-2" />
                            Error
                        </button>

                        <button
                            wire:click="showWarningToast"
                            class="px-4 py-2.5 bg-yellow-500/10 text-yellow-600 dark:text-yellow-400 border border-yellow-500/30 rounded-lg text-sm font-medium hover:bg-yellow-500/20 transition-colors"
                        >
                            <x-lucide-alert-triangle class="size-4 inline mr-2" />
                            Warning
                        </button>

                        <button
                            wire:click="showInfoToast"
                            class="px-4 py-2.5 bg-primary/10 text-primary border border-primary/30 rounded-lg text-sm font-medium hover:bg-primary/20 transition-colors"
                        >
                            <x-lucide-info class="size-4 inline mr-2" />
                            Info
                        </button>
                    </div>
                </div>

                {{-- Alpine.js Toast Demo --}}
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-4">Alpine.js Trigger</h3>
                    <div class="p-4 bg-muted/30 rounded-lg">
                        <button
                            @click="$dispatch('toast', { type: 'success', title: 'Alpine.js', message: 'Toast triggered directly from Alpine!' })"
                            class="px-4 py-2 bg-primary text-primary-foreground rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors"
                        >
                            Trigger via Alpine.js
                        </button>
                    </div>
                </div>
            </div>
        </x-ui.day-section>

        {{-- Drawer Section --}}
        <x-ui.day-section icon="panel-left" title="Drawer / Sidebar">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Slide-in panels for navigation, settings, or additional content.
                </p>

                {{-- Features list --}}
                <div class="p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>4 positions (left, right, top, bottom)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Multiple width/height options</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Escape key to close</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Click outside to close</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Header, content, footer slots</span>
                        </li>
                    </ul>
                </div>

                {{-- Drawer Positions --}}
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-4">Drawer Positions</h3>
                    <div class="grid grid-cols-2 gap-3">
                        {{-- Left Drawer --}}
                        <x-ui.drawer position="left" width="md">
                            <x-slot:trigger>
                                <button class="w-full px-4 py-2.5 bg-secondary text-secondary-foreground rounded-lg text-sm font-medium hover:bg-secondary/80 transition-colors">
                                    <x-lucide-panel-left class="size-4 inline mr-2" />
                                    Left
                                </button>
                            </x-slot:trigger>

                            <x-slot:header>Navigation</x-slot:header>

                            <div class="p-4 space-y-2">
                                @foreach($navItems as $item)
                                    <a
                                        href="{{ $item['href'] }}"
                                        @class([
                                            'flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors',
                                            'bg-primary/10 text-primary' => $item['active'] ?? false,
                                            'text-muted-foreground hover:bg-accent hover:text-foreground' => !($item['active'] ?? false),
                                        ])
                                    >
                                        <x-dynamic-component :component="'lucide-' . $item['icon']" class="size-5" />
                                        <span class="flex-1">{{ $item['label'] }}</span>
                                        @if(isset($item['badge']))
                                            <span class="px-2 py-0.5 text-xs bg-primary text-primary-foreground rounded-full">
                                                {{ $item['badge'] }}
                                            </span>
                                        @endif
                                    </a>
                                @endforeach
                            </div>

                            <x-slot:footer>
                                <div class="flex items-center gap-3">
                                    <x-ui.avatar name="Jean Kamga" size="sm" />
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-foreground truncate">Jean Kamga</p>
                                        <p class="text-xs text-muted-foreground truncate">admin@example.com</p>
                                    </div>
                                    <button class="p-2 hover:bg-accent rounded-lg transition-colors">
                                        <x-lucide-log-out class="size-4 text-muted-foreground" />
                                    </button>
                                </div>
                            </x-slot:footer>
                        </x-ui.drawer>

                        {{-- Right Drawer --}}
                        <x-ui.drawer position="right" width="lg">
                            <x-slot:trigger>
                                <button class="w-full px-4 py-2.5 bg-secondary text-secondary-foreground rounded-lg text-sm font-medium hover:bg-secondary/80 transition-colors">
                                    <x-lucide-panel-right class="size-4 inline mr-2" />
                                    Right
                                </button>
                            </x-slot:trigger>

                            <x-slot:header>Settings</x-slot:header>

                            <div class="p-6 space-y-6">
                                <div class="space-y-4">
                                    <h4 class="text-sm font-semibold text-foreground">Appearance</h4>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-muted-foreground">Dark mode</span>
                                        <x-ui.toggle />
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-muted-foreground">Compact view</span>
                                        <x-ui.toggle />
                                    </div>
                                </div>

                                <hr class="border-border" />

                                <div class="space-y-4">
                                    <h4 class="text-sm font-semibold text-foreground">Notifications</h4>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-muted-foreground">Email alerts</span>
                                        <x-ui.toggle checked />
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-muted-foreground">Push notifications</span>
                                        <x-ui.toggle checked />
                                    </div>
                                </div>
                            </div>

                            <x-slot:footer>
                                <div class="flex gap-3">
                                    <button @click="close()" class="flex-1 px-4 py-2 bg-secondary text-secondary-foreground rounded-lg text-sm font-medium hover:bg-secondary/80 transition-colors">
                                        Cancel
                                    </button>
                                    <button class="flex-1 px-4 py-2 bg-primary text-primary-foreground rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors">
                                        Save
                                    </button>
                                </div>
                            </x-slot:footer>
                        </x-ui.drawer>

                        {{-- Top Drawer --}}
                        <x-ui.drawer position="top" height="md">
                            <x-slot:trigger>
                                <button class="w-full px-4 py-2.5 bg-secondary text-secondary-foreground rounded-lg text-sm font-medium hover:bg-secondary/80 transition-colors">
                                    <x-lucide-panel-top class="size-4 inline mr-2" />
                                    Top
                                </button>
                            </x-slot:trigger>

                            <x-slot:header>Search</x-slot:header>

                            <div class="p-6">
                                <x-ui.input
                                    icon="search"
                                    placeholder="Search for anything..."
                                    size="lg"
                                />
                                <div class="mt-4 flex flex-wrap gap-2">
                                    <span class="text-xs text-muted-foreground">Recent:</span>
                                    <button class="px-2 py-1 text-xs bg-accent rounded hover:bg-accent/80">Dashboard</button>
                                    <button class="px-2 py-1 text-xs bg-accent rounded hover:bg-accent/80">Users</button>
                                    <button class="px-2 py-1 text-xs bg-accent rounded hover:bg-accent/80">Settings</button>
                                </div>
                            </div>
                        </x-ui.drawer>

                        {{-- Bottom Drawer --}}
                        <x-ui.drawer position="bottom" height="md">
                            <x-slot:trigger>
                                <button class="w-full px-4 py-2.5 bg-secondary text-secondary-foreground rounded-lg text-sm font-medium hover:bg-secondary/80 transition-colors">
                                    <x-lucide-panel-bottom class="size-4 inline mr-2" />
                                    Bottom
                                </button>
                            </x-slot:trigger>

                            <x-slot:header>Quick Actions</x-slot:header>

                            <div class="p-6">
                                <div class="grid grid-cols-4 gap-4">
                                    <button class="flex flex-col items-center gap-2 p-4 rounded-lg hover:bg-accent transition-colors">
                                        <div class="size-12 bg-primary/10 rounded-full flex items-center justify-center">
                                            <x-lucide-plus class="size-6 text-primary" />
                                        </div>
                                        <span class="text-xs text-muted-foreground">New</span>
                                    </button>
                                    <button class="flex flex-col items-center gap-2 p-4 rounded-lg hover:bg-accent transition-colors">
                                        <div class="size-12 bg-green-500/10 rounded-full flex items-center justify-center">
                                            <x-lucide-upload class="size-6 text-green-500" />
                                        </div>
                                        <span class="text-xs text-muted-foreground">Upload</span>
                                    </button>
                                    <button class="flex flex-col items-center gap-2 p-4 rounded-lg hover:bg-accent transition-colors">
                                        <div class="size-12 bg-blue-500/10 rounded-full flex items-center justify-center">
                                            <x-lucide-share class="size-6 text-blue-500" />
                                        </div>
                                        <span class="text-xs text-muted-foreground">Share</span>
                                    </button>
                                    <button class="flex flex-col items-center gap-2 p-4 rounded-lg hover:bg-accent transition-colors">
                                        <div class="size-12 bg-yellow-500/10 rounded-full flex items-center justify-center">
                                            <x-lucide-download class="size-6 text-yellow-500" />
                                        </div>
                                        <span class="text-xs text-muted-foreground">Export</span>
                                    </button>
                                </div>
                            </div>
                        </x-ui.drawer>
                    </div>
                </div>

                {{-- Programmatic Control --}}
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-4">Event-based Control</h3>
                    <div class="p-4 bg-muted/30 rounded-lg space-y-3">
                        <p class="text-xs text-muted-foreground">Control drawers via Alpine.js events:</p>
                        <div class="flex gap-2">
                            <button
                                @click="$dispatch('open-drawer')"
                                class="px-3 py-1.5 text-xs bg-accent text-foreground rounded hover:bg-accent/80 transition-colors"
                            >
                                $dispatch('open-drawer')
                            </button>
                            <button
                                @click="$dispatch('close-drawer')"
                                class="px-3 py-1.5 text-xs bg-accent text-foreground rounded hover:bg-accent/80 transition-colors"
                            >
                                $dispatch('close-drawer')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>

    {{-- Usage Examples Section --}}
    <x-ui.day-section title="Usage Examples" class="mt-8">
        <div class="space-y-4">
            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Toast Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/toast-usage.blade.md')" />
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Drawer Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/drawer-usage.blade.md')" />
                </div>
            </div>
        </div>
    </x-ui.day-section>
</x-ui.day-container>
