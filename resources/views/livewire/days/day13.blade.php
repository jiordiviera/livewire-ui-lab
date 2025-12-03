<x-ui.day-container :dayNumber="$dayNumber" title="Range Slider & Rating"
    description="Interactive range sliders and star rating with real-time feedback">

    {{-- Toast Container --}}
    <x-ui.toast position="bottom-right" />

    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        {{-- Range Slider Section --}}
        <x-ui.day-section icon="sliders-horizontal" title="Range Slider">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Pure Alpine.js range sliders with real-time value display. Single or double slider support.
                </p>

                {{-- Features list --}}
                <div class="p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Single & double range support</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Real-time value updates</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Customizable min/max/step</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Livewire binding support</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>3 size variants</span>
                        </li>
                    </ul>
                </div>

                {{-- Single Slider --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Single Slider (Volume)</h3>
                    <x-ui.range-slider
                        wire:model.live="volume"
                        :min="0"
                        :max="100"
                        :step="1"
                    />
                </div>

                {{-- Double Slider --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Double Slider (Price Range)</h3>
                    <x-ui.range-slider
                        wire:model.live="price"
                        :min="0"
                        :max="100"
                        :step="5"
                        type="double"
                    />
                    <p class="text-xs text-muted-foreground">
                        Range: {{ $price[0] }} - {{ $price[1] }} FCFA
                    </p>
                </div>

                {{-- Temperature Slider --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Temperature Control</h3>
                    <x-ui.range-slider
                        wire:model.live="temperature"
                        :min="-10"
                        :max="40"
                        :step="0.5"
                        variant="success"
                    />
                </div>

                {{-- Sizes --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Sizes</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-xs text-muted-foreground mb-2">Small</p>
                            <x-ui.range-slider size="sm" :min="0" :max="100" />
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground mb-2">Medium (default)</p>
                            <x-ui.range-slider size="md" :min="0" :max="100" />
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground mb-2">Large</p>
                            <x-ui.range-slider size="lg" :min="0" :max="100" />
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.day-section>

        {{-- Rating Section --}}
        <x-ui.day-section icon="star" title="Rating / Star Input">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Interactive star rating component with hover effects and real-time feedback.
                </p>

                {{-- Features list --}}
                <div class="p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Hover preview effects</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Click to rate</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Readonly mode for display</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Customizable max stars</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Color variants</span>
                        </li>
                    </ul>
                </div>

                {{-- Interactive Rating --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Rate Your Experience</h3>
                    <div class="p-4 border border-border rounded-lg bg-card">
                        <x-ui.rating
                            wire:model.live="rating"
                            :showValue="true"
                        />
                        <p class="text-xs text-muted-foreground mt-2">
                            Your rating: {{ $rating }} / 5
                        </p>
                    </div>
                </div>

                {{-- Readonly Display --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Product Rating (Readonly)</h3>
                    <div class="p-4 border border-border rounded-lg bg-card">
                        <div class="flex items-center justify-between">
                            <x-ui.rating
                                :value="$productRating"
                                :readonly="true"
                                :showValue="true"
                            />
                            <span class="text-xs text-muted-foreground">(1,234 reviews)</span>
                        </div>
                    </div>
                </div>

                {{-- Color Variants --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Color Variants</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-muted-foreground w-20">Default</span>
                            <x-ui.rating :value="4" :readonly="true" variant="default" />
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-muted-foreground w-20">Primary</span>
                            <x-ui.rating :value="4" :readonly="true" variant="primary" />
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-muted-foreground w-20">Red</span>
                            <x-ui.rating :value="4" :readonly="true" variant="red" />
                        </div>
                    </div>
                </div>

                {{-- Sizes --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Sizes</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-muted-foreground w-20">Small</span>
                            <x-ui.rating :value="5" :readonly="true" size="sm" />
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-muted-foreground w-20">Medium</span>
                            <x-ui.rating :value="5" :readonly="true" size="md" />
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-muted-foreground w-20">Large</span>
                            <x-ui.rating :value="5" :readonly="true" size="lg" />
                        </div>
                    </div>
                </div>

                {{-- Max Stars --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Custom Max Stars</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-muted-foreground w-20">3 Stars</span>
                            <x-ui.rating :value="2" :max="3" :readonly="true" />
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-muted-foreground w-20">10 Stars</span>
                            <x-ui.rating :value="7" :max="10" :readonly="true" size="sm" />
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>

    {{-- Usage Examples Section --}}
    <x-ui.day-section icon="book-open" title="Usage Examples" class="mt-8">
        <div class="grid lg:grid-cols-2 gap-6">
            {{-- Range Slider Usage --}}
            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-foreground">Range Slider Usage</h3>
                <div class="prose prose-sm dark:prose-invert max-w-none">
                    <x-markdown-content :content="get_resource_content('examples/range-slider-usage.blade.md')" />
                </div>
            </div>

            {{-- Rating Usage --}}
            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-foreground">Rating Usage</h3>
                <div class="prose prose-sm dark:prose-invert max-w-none">
                    <x-markdown-content :content="get_resource_content('examples/rating-usage.blade.md')" />
                </div>
            </div>
        </div>
    </x-ui.day-section>
</x-ui.day-container>
