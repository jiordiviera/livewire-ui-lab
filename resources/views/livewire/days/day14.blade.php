<x-ui.day-container :dayNumber="$dayNumber" title="Carousel & Pill Tabs"
    description="Image carousel with transitions and scrollable pill navigation">

    {{-- Toast Container --}}
    <x-ui.toast position="bottom-right" />

    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        {{-- Carousel Section --}}
        <x-ui.day-section icon="images" title="Image Carousel">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Smooth image slider with navigation arrows, dots indicator, and optional autoplay.
                </p>

                {{-- Features list --}}
                <div class="p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Smooth CSS transitions</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Arrow navigation (hover)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Dots indicator</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Autoplay with interval</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Image captions</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Aspect ratio options</span>
                        </li>
                    </ul>
                </div>

                {{-- Main Carousel --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Default Carousel</h3>
                    <x-ui.carousel :images="$carouselImages" />
                </div>

                {{-- Autoplay --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">With Autoplay (3s)</h3>
                    <x-ui.carousel
                        :images="$carouselImages"
                        :autoplay="true"
                        :interval="3000"
                    />
                </div>

                {{-- Aspect Ratios --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Aspect Ratios</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-muted-foreground mb-2">Square (1:1)</p>
                            <x-ui.carousel
                                :images="array_slice($carouselImages, 0, 2)"
                                aspectRatio="1/1"
                                :showDots="false"
                            />
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground mb-2">Portrait (4:3)</p>
                            <x-ui.carousel
                                :images="array_slice($carouselImages, 0, 2)"
                                aspectRatio="4/3"
                                :showDots="false"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.day-section>

        {{-- Pill Tabs Section --}}
        <x-ui.day-section icon="layout-list" title="Pill Navigation">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Compact pill-style tabs with horizontal scrolling support for mobile devices.
                </p>

                {{-- Features list --}}
                <div class="p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Horizontal scroll on mobile</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Icon support per tab</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Badge indicators</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Livewire binding</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Disabled state support</span>
                        </li>
                    </ul>
                </div>

                {{-- Scrollable Tabs with Livewire --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Scrollable Tabs (Livewire)</h3>
                    <x-ui.pill-tabs wire:model.live="activeTab" :tabs="$tabs" />
                    <p class="text-xs text-muted-foreground">
                        Active: <span class="font-mono text-foreground">{{ $activeTab }}</span>
                    </p>
                </div>

                {{-- Simple Tabs --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Simple Tabs (no icons)</h3>
                    <x-ui.pill-tabs :tabs="[
                        'overview' => 'Overview',
                        'analytics' => 'Analytics',
                        'reports' => 'Reports',
                        'settings' => 'Settings',
                    ]" />
                </div>

                {{-- With Content --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">With Tab Content</h3>
                    <x-ui.pill-tabs
                        :tabs="[
                            'profile' => ['label' => 'Profile', 'icon' => 'user'],
                            'account' => ['label' => 'Account', 'icon' => 'settings'],
                            'notifications' => ['label' => 'Notifications', 'icon' => 'bell', 'badge' => 3],
                        ]"
                        activeTab="profile"
                    >
                        <div class="p-4 border border-border rounded-lg bg-card">
                            <p class="text-sm text-muted-foreground">
                                Tab content area. Content changes based on selected tab.
                            </p>
                        </div>
                    </x-ui.pill-tabs>
                </div>

                {{-- Sizes --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Sizes</h3>
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs text-muted-foreground mb-2">Small</p>
                            <x-ui.pill-tabs size="sm" :tabs="['tab1' => 'First', 'tab2' => 'Second', 'tab3' => 'Third']" />
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground mb-2">Medium</p>
                            <x-ui.pill-tabs size="md" :tabs="['tab1' => 'First', 'tab2' => 'Second', 'tab3' => 'Third']" />
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground mb-2">Large</p>
                            <x-ui.pill-tabs size="lg" :tabs="['tab1' => 'First', 'tab2' => 'Second', 'tab3' => 'Third']" />
                        </div>
                    </div>
                </div>

                {{-- With Disabled --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">With Disabled Tab</h3>
                    <x-ui.pill-tabs :tabs="[
                        'active' => ['label' => 'Active', 'icon' => 'check'],
                        'disabled' => ['label' => 'Disabled', 'icon' => 'lock', 'disabled' => true],
                        'another' => ['label' => 'Another', 'icon' => 'star'],
                    ]" />
                </div>
            </div>
        </x-ui.day-section>
    </div>

    {{-- Usage Examples Section --}}
    <x-ui.day-section icon="book-open" title="Usage Examples" class="mt-8">
        <div class="grid lg:grid-cols-2 gap-6">
            {{-- Carousel Usage --}}
            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-foreground">Carousel Usage</h3>
                <div class="prose prose-sm dark:prose-invert max-w-none">
                    <x-markdown-content :content="get_resource_content('examples/carousel-usage.blade.md')" />
                </div>
            </div>

            {{-- Pill Tabs Usage --}}
            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-foreground">Pill Tabs Usage</h3>
                <div class="prose prose-sm dark:prose-invert max-w-none">
                    <x-markdown-content :content="get_resource_content('examples/pill-tabs-usage.blade.md')" />
                </div>
            </div>
        </div>
    </x-ui.day-section>
</x-ui.day-container>
