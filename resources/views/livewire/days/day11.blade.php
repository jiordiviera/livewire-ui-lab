<x-ui.day-container :dayNumber="$dayNumber" title="Date Picker & Stat Card"
    description="Native Alpine.js date picker and dashboard statistics cards">
    {{-- Toast Container --}}
    <x-ui.toast position="bottom-right" />

    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        {{-- Stat Card Section --}}
        <x-ui.day-section icon="bar-chart-3" title="Stat Cards">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Dashboard statistics cards for displaying key metrics with trend indicators.
                </p>

                {{-- Features list --}}
                <div class="p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Dynamic icon support (Lucide)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Trend indicators (up/down)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>5 color variants</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Optional slot for extra content</span>
                        </li>
                    </ul>
                </div>

                {{-- Stats Grid --}}
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-4">Dashboard Example</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($stats as $stat)
                            <x-ui.stat-card
                                :title="$stat['title']"
                                :value="$stat['value']"
                                :icon="$stat['icon']"
                                :trend="$stat['trend']"
                                :trendValue="$stat['trendValue']"
                                :trendLabel="$stat['trendLabel']"
                                :variant="$stat['variant']"
                            />
                        @endforeach
                    </div>
                </div>

                {{-- Stat with extra content --}}
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-4">With Extra Content</h3>
                    <x-ui.stat-card
                        title="Ventes du Jour"
                        value="845.000 FCFA"
                        icon="credit-card"
                        trend="up"
                        trendValue="+23%"
                        variant="success"
                    >
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-muted-foreground">Objectif journalier</span>
                            <span class="font-medium text-foreground">1.000.000 FCFA</span>
                        </div>
                        <div class="mt-2 h-2 bg-muted rounded-full overflow-hidden">
                            <div class="h-full bg-green-500 rounded-full" style="width: 84.5%"></div>
                        </div>
                    </x-ui.stat-card>
                </div>
            </div>
        </x-ui.day-section>

        {{-- Date Picker Section --}}
        <x-ui.day-section icon="calendar" title="Date Picker">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Native Alpine.js date picker with French locale - no external dependencies.
                </p>

                {{-- Features list --}}
                <div class="p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>100% Alpine.js (no dependencies)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>wire:model support</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>French locale by default</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Min/Max date constraints</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Today button</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Clearable input</span>
                        </li>
                    </ul>
                </div>

                {{-- Single Date with Livewire --}}
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-4">With Livewire Binding</h3>
                    <div class="p-4 bg-muted/30 rounded-lg space-y-3">
                        <x-ui.date-picker
                            wire:model.live="selectedDate"
                            placeholder="Choisir une date"
                        />
                        <p class="text-xs text-muted-foreground">
                            Valeur: <span class="font-mono">{{ $selectedDate ?: 'Aucune' }}</span>
                        </p>
                    </div>
                </div>

                {{-- With Min/Max constraints --}}
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-4">With Date Constraints</h3>
                    <div class="p-4 bg-muted/30 rounded-lg space-y-3">
                        <x-ui.date-picker
                            placeholder="Dates futures uniquement"
                            minDate="{{ now()->format('Y-m-d') }}"
                            icon="calendar-check"
                        />
                        <p class="text-xs text-muted-foreground">
                            minDate: aujourd'hui (dates passées désactivées)
                        </p>
                    </div>
                </div>

                {{-- Sizes --}}
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-4">Sizes</h3>
                    <div class="p-4 bg-muted/30 rounded-lg space-y-3">
                        <x-ui.date-picker size="sm" placeholder="Small" />
                        <x-ui.date-picker size="md" placeholder="Medium (default)" />
                        <x-ui.date-picker size="lg" placeholder="Large" />
                    </div>
                </div>

                {{-- Disabled State --}}
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-4">Disabled State</h3>
                    <div class="p-4 bg-muted/30 rounded-lg">
                        <x-ui.date-picker placeholder="Disabled" :disabled="true" />
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>

    {{-- Usage Examples Section --}}
    <x-ui.day-section title="Usage Examples" class="mt-8">
        <div class="space-y-4">
            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Stat Card Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/stat-card-usage.blade.md')" />
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Date Picker Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/date-picker-usage.blade.md')" />
                </div>
            </div>
        </div>
    </x-ui.day-section>
</x-ui.day-container>
