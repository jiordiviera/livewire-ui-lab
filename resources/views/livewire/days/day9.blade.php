<x-ui.day-container :dayNumber="$dayNumber" title="Data Table & Tooltip" description="Interactive data management with contextual information display">
    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        {{-- Tooltip Section --}}
        <x-ui.day-section icon="message-circle" title="Tooltip & Popover">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Contextual information display on hover or click for enhanced user experience.
                </p>

                {{-- Features list --}}
                <div class="p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Multiple positions (top, bottom, left, right)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Configurable delay for hover trigger</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Click or hover trigger modes</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Smooth enter/leave transitions</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>100% Tailwind CSS</span>
                        </li>
                    </ul>
                </div>

                {{-- Tooltip Positions --}}
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-4">Tooltip Positions</h3>
                    <div class="flex flex-wrap justify-center gap-8 p-8 bg-muted/30 rounded-lg">
                        <x-ui.tooltip content="I appear on top!" position="top">
                            <button class="px-4 py-2 bg-primary text-primary-foreground rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors">
                                Top
                            </button>
                        </x-ui.tooltip>

                        <x-ui.tooltip content="I appear below!" position="bottom">
                            <button class="px-4 py-2 bg-primary text-primary-foreground rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors">
                                Bottom
                            </button>
                        </x-ui.tooltip>

                        <x-ui.tooltip content="On the left!" position="left">
                            <button class="px-4 py-2 bg-primary text-primary-foreground rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors">
                                Left
                            </button>
                        </x-ui.tooltip>

                        <x-ui.tooltip content="On the right!" position="right">
                            <button class="px-4 py-2 bg-primary text-primary-foreground rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors">
                                Right
                            </button>
                        </x-ui.tooltip>
                    </div>
                </div>

                {{-- Icon Tooltips --}}
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-4">Icon Tooltips</h3>
                    <div class="flex flex-wrap items-center gap-4 p-4 bg-muted/30 rounded-lg">
                        <x-ui.tooltip content="Settings">
                            <button class="p-2 rounded-lg hover:bg-accent transition-colors">
                                <x-lucide-settings class="size-5 text-muted-foreground" />
                            </button>
                        </x-ui.tooltip>

                        <x-ui.tooltip content="Notifications">
                            <button class="p-2 rounded-lg hover:bg-accent transition-colors">
                                <x-lucide-bell class="size-5 text-muted-foreground" />
                            </button>
                        </x-ui.tooltip>

                        <x-ui.tooltip content="Help & Support">
                            <button class="p-2 rounded-lg hover:bg-accent transition-colors">
                                <x-lucide-help-circle class="size-5 text-muted-foreground" />
                            </button>
                        </x-ui.tooltip>

                        <x-ui.tooltip content="Delete (Ctrl+D)" position="bottom">
                            <button class="p-2 rounded-lg hover:bg-destructive/10 transition-colors">
                                <x-lucide-trash-2 class="size-5 text-destructive" />
                            </button>
                        </x-ui.tooltip>
                    </div>
                </div>

                {{-- Popover Examples --}}
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-4">Popover (Click Trigger)</h3>
                    <div class="flex flex-wrap gap-4 p-4 bg-muted/30 rounded-lg">
                        <x-ui.popover position="bottom" align="start" width="md">
                            <button class="px-4 py-2 bg-secondary text-secondary-foreground rounded-lg text-sm font-medium hover:bg-secondary/80 transition-colors">
                                User Profile
                            </button>

                            <x-slot:content>
                                <div class="space-y-3">
                                    <div class="flex items-center gap-3">
                                        <x-ui.avatar name="Jean-Paul Kamga" size="lg" />
                                        <div>
                                            <p class="font-semibold text-foreground">Jean-Paul Kamga</p>
                                            <p class="text-sm text-muted-foreground">Admin</p>
                                        </div>
                                    </div>
                                    <hr class="border-border" />
                                    <div class="space-y-1">
                                        <button class="w-full text-left px-2 py-1.5 text-sm rounded hover:bg-accent transition-colors">
                                            View Profile
                                        </button>
                                        <button class="w-full text-left px-2 py-1.5 text-sm rounded hover:bg-accent transition-colors">
                                            Settings
                                        </button>
                                        <button class="w-full text-left px-2 py-1.5 text-sm text-destructive rounded hover:bg-destructive/10 transition-colors">
                                            Sign Out
                                        </button>
                                    </div>
                                </div>
                            </x-slot:content>
                        </x-ui.popover>

                        <x-ui.popover position="bottom" align="center" width="sm">
                            <button class="inline-flex items-center gap-2 px-4 py-2 bg-secondary text-secondary-foreground rounded-lg text-sm font-medium hover:bg-secondary/80 transition-colors">
                                <x-lucide-share-2 class="size-4" />
                                Share
                            </button>

                            <x-slot:content>
                                <div class="space-y-2">
                                    <p class="text-sm font-medium text-foreground">Share via</p>
                                    <div class="flex gap-2">
                                        <button class="p-2 rounded-lg bg-blue-500/10 hover:bg-blue-500/20 transition-colors">
                                            <x-lucide-facebook class="size-5 text-blue-500" />
                                        </button>
                                        <button class="p-2 rounded-lg bg-sky-500/10 hover:bg-sky-500/20 transition-colors">
                                            <x-lucide-twitter class="size-5 text-sky-500" />
                                        </button>
                                        <button class="p-2 rounded-lg bg-green-500/10 hover:bg-green-500/20 transition-colors">
                                            <x-lucide-link class="size-5 text-green-500" />
                                        </button>
                                    </div>
                                </div>
                            </x-slot:content>
                        </x-ui.popover>
                    </div>
                </div>

                {{-- Hover Popover --}}
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-4">Popover (Hover Trigger)</h3>
                    <div class="flex flex-wrap gap-4 p-4 bg-muted/30 rounded-lg">
                        <x-ui.popover position="right" trigger="hover" width="md">
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-accent rounded-full cursor-pointer">
                                <x-ui.avatar name="Marie Eyenga" size="xs" />
                                <span class="text-sm font-medium">Marie Eyenga</span>
                            </div>

                            <x-slot:content>
                                <div class="space-y-2">
                                    <p class="font-semibold text-foreground">Marie Eyenga</p>
                                    <p class="text-sm text-muted-foreground">Editor at Livewire UI Lab</p>
                                    <div class="flex items-center gap-4 text-xs text-muted-foreground">
                                        <span class="flex items-center gap-1">
                                            <x-lucide-map-pin class="size-3" />
                                            Yaoundé
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <x-lucide-calendar class="size-3" />
                                            Joined 2024
                                        </span>
                                    </div>
                                </div>
                            </x-slot:content>
                        </x-ui.popover>
                    </div>
                </div>
            </div>
        </x-ui.day-section>

        {{-- Data Table Section --}}
        <x-ui.day-section icon="table-2" title="Data Table">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Interactive data table with search, sorting, filtering, and pagination.
                </p>

                {{-- Features list --}}
                <div class="p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Global search across all columns</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Column-based sorting (asc/desc)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Dropdown filters per column</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Integrated pagination</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Skeleton loader during loading</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>100% Alpine.js state management</span>
                        </li>
                    </ul>
                </div>
            </div>
        </x-ui.day-section>
    </div>

    {{-- Full Width Data Table Demo --}}
    <x-ui.day-section icon="database" title="Users Directory" subtitle="Search, filter, and sort through user data">
        <x-ui.data-table
            :columns="$this->getTableColumns()"
            :data="$users"
            :per-page="5"
            search-placeholder="Search users..."
            empty-message="No users found"
        />
    </x-ui.day-section>

    {{-- Loading State Demo --}}
    <x-ui.day-section icon="loader" title="Loading State Demo" subtitle="Table with skeleton loader">
        <div class="space-y-4">
            <div class="flex gap-4">
                <button
                    id="show-loading"
                    onclick="document.getElementById('loading-table').classList.remove('hidden'); document.getElementById('data-table').classList.add('hidden');"
                    class="px-4 py-2 bg-primary text-primary-foreground rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors"
                >
                    Show Loading
                </button>
                <button
                    id="show-data"
                    onclick="document.getElementById('loading-table').classList.add('hidden'); document.getElementById('data-table').classList.remove('hidden');"
                    class="px-4 py-2 bg-secondary text-secondary-foreground rounded-lg text-sm font-medium hover:bg-secondary/80 transition-colors"
                >
                    Show Data
                </button>
            </div>

            {{-- Loading State --}}
            <div id="loading-table">
                <x-ui.data-table
                    :columns="[
                        ['key' => 'product', 'label' => 'Product', 'sortable' => true],
                        ['key' => 'price', 'label' => 'Price', 'sortable' => true],
                        ['key' => 'stock', 'label' => 'Stock', 'sortable' => true],
                        ['key' => 'category', 'label' => 'Category', 'sortable' => true, 'filterable' => true],
                    ]"
                    :data="[]"
                    :loading="true"
                    :searchable="false"
                    :filterable="false"
                    :paginated="false"
                />
            </div>

            {{-- Data State --}}
            <div id="data-table" class="hidden">
                <x-ui.data-table
                    :columns="[
                        ['key' => 'product', 'label' => 'Product', 'sortable' => true],
                        ['key' => 'price', 'label' => 'Price', 'sortable' => true],
                        ['key' => 'stock', 'label' => 'Stock', 'sortable' => true],
                        ['key' => 'category', 'label' => 'Category', 'sortable' => true, 'filterable' => true],
                    ]"
                    :data="[
                        ['product' => 'Ndolé Mix', 'price' => '2,500 FCFA', 'stock' => 45, 'category' => 'Food'],
                        ['product' => 'Palm Oil (5L)', 'price' => '5,000 FCFA', 'stock' => 20, 'category' => 'Food'],
                        ['product' => 'Pagne Toghu', 'price' => '15,000 FCFA', 'stock' => 12, 'category' => 'Clothing'],
                        ['product' => 'Café Cameroun', 'price' => '3,500 FCFA', 'stock' => 80, 'category' => 'Beverages'],
                        ['product' => 'Miel de Oku', 'price' => '4,000 FCFA', 'stock' => 35, 'category' => 'Food'],
                    ]"
                    :per-page="10"
                    :searchable="false"
                />
            </div>
        </div>
    </x-ui.day-section>

    {{-- Usage Examples Section --}}
    <x-ui.day-section title="Usage Examples" class="mt-8">
        <div class="space-y-4">
            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Tooltip Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/tooltip-usage.blade.md')" />
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Popover Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/popover-usage.blade.md')" />
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Data Table Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/data-table-usage.blade.md')" />
                </div>
            </div>
        </div>
    </x-ui.day-section>
</x-ui.day-container>
