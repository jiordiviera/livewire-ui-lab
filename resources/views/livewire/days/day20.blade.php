<x-ui.day-container :dayNumber="$dayNumber" title="Progress Steps & Heatmap"
    description="Linear progress bar with steps and calendar heatmap visualization">

    {{-- Toast Container --}}
    <x-ui.toast position="bottom-right" />

    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        {{-- Progress Stepped Bar Section --}}
        <x-ui.day-section icon="git-branch" title="Progress Stepped Bar">
            <div class="space-y-6 sm:space-y-8">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Linear progress bar showing completed, active, and future steps with smooth transitions.
                </p>

                {{-- Features list --}}
                <div class="p-3 sm:p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Completed, active, and pending states</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Animated progress bar fill</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Multiple variants (default, success, blue)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Custom icons per step</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Labels and descriptions</span>
                        </li>
                    </ul>
                </div>

                {{-- Order Tracking Demo --}}
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Order Tracking</h3>
                    <div class="p-4 border border-border rounded-lg bg-card">
                        {{-- @dd($orderSteps) --}}
                        <x-ui.progress-steps
                            :steps="$orderSteps"
                            :current="$currentOrderStep"
                            variant="success"
                            size="md"
                        />
                    </div>
                    <div class="flex justify-center gap-3 pt-6">
                        <button
                            wire:click="prevOrderStep"
                            class="px-4 py-2 text-sm bg-muted hover:bg-muted/80 rounded-lg transition-colors"
                            @disabled($currentOrderStep <= 1)
                        >
                            Previous
                        </button>
                        <button
                            wire:click="nextOrderStep"
                            class="px-4 py-2 text-sm bg-primary text-primary-foreground hover:bg-primary/90 rounded-lg transition-colors"
                            @disabled($currentOrderStep >= count($orderSteps))
                        >
                            Next Step
                        </button>
                    </div>
                </div>

                {{-- Project Milestones Demo --}}
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Project Milestones</h3>
                    <div class="p-4 border border-border rounded-lg bg-card">
                        <x-ui.progress-steps
                            :steps="$projectSteps"
                            :current="$currentProjectStep"
                            variant="blue"
                            size="lg"
                            :show-descriptions="false"
                        />
                    </div>
                </div>

                {{-- Compact Variant --}}
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Compact Size</h3>
                    <div class="p-4 border border-border rounded-lg bg-card">
                        <x-ui.progress-steps
                            :steps="[
                                ['label' => 'Cart'],
                                ['label' => 'Shipping'],
                                ['label' => 'Payment'],
                                ['label' => 'Done'],
                            ]"
                            :current="2"
                            variant="default"
                            size="sm"
                            :show-descriptions="false"
                        />
                    </div>
                </div>
            </div>
        </x-ui.day-section>

        {{-- Heatmap Section --}}
        <x-ui.day-section icon="grid-3x3" title="Heatmap / Calendar View">
            <div class="space-y-6 sm:space-y-8">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Visualize chronological data as a color grid, similar to GitHub contribution graphs.
                </p>

                {{-- Features list --}}
                <div class="p-3 sm:p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>365-day contribution calendar</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Multiple color variants</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Tooltips with detailed info</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Activity heatmap by hour</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Responsive with scroll</span>
                        </li>
                    </ul>
                </div>

                {{-- GitHub-style Contribution Graph --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Contribution Calendar (GitHub Style)</h3>
                    <div class="p-4 border border-border rounded-lg bg-card">
                        {{-- @dd($contributionData) --}}
                        <x-ui.heatmap
                            :data="$contributionData"
                            variant="github"
                            cell-size="sm"
                        />
                    </div>
                </div>

                {{-- Different Color Variants --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Color Variants</h3>
                    <div class="grid gap-4">
                        <div class="p-3 border border-border rounded-lg bg-card">
                            <p class="text-xs text-muted-foreground mb-2">Blue Variant</p>
                            <x-ui.heatmap
                                :data="array_slice($contributionData, -91)"
                                variant="blue"
                                cell-size="sm"
                                :show-months="false"
                            />
                        </div>
                        <div class="p-3 border border-border rounded-lg bg-card">
                            <p class="text-xs text-muted-foreground mb-2">Purple Variant</p>
                            <x-ui.heatmap
                                :data="array_slice($contributionData, -91)"
                                variant="purple"
                                cell-size="sm"
                                :show-months="false"
                            />
                        </div>
                    </div>
                </div>

                {{-- Activity Heatmap by Hour --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Weekly Activity by Hour</h3>
                    <div class="p-4 border border-border rounded-lg bg-card">
                        <x-ui.activity-heatmap
                            :data="$activityData"
                            variant="blue"
                        />
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>

    {{-- Usage Examples --}}
    <div class="mt-6 sm:mt-8">
        <x-ui.day-section icon="book-open" title="Usage Examples">
            <div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
                <div class="space-y-3 min-w-0">
                    <h3 class="text-sm font-semibold text-foreground">Progress Steps Usage</h3>
                    <div class="overflow-x-auto">
                        <x-markdown-content :content="get_resource_content('examples/progress-steps-usage.blade.md')" />
                    </div>
                </div>
                <div class="space-y-3 min-w-0">
                    <h3 class="text-sm font-semibold text-foreground">Heatmap Usage</h3>
                    <div class="overflow-x-auto">
                        <x-markdown-content :content="get_resource_content('examples/heatmap-usage.blade.md')" />
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>
</x-ui.day-container>
