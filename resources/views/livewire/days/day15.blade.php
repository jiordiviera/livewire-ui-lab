<x-ui.day-container :dayNumber="$dayNumber" title="Color Picker & KBD"
    description="Color picker with presets and keyboard shortcut display component">

    {{-- Toast Container --}}
    <x-ui.toast position="bottom-right" />

    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        {{-- Color Picker Section --}}
        <x-ui.day-section icon="palette" title="Color Picker">
            <div class="space-y-4 sm:space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Advanced color picker with preset palette, RGB sliders, and hex input.
                </p>

                {{-- Features list --}}
                <div class="p-3 sm:p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Preset color palette</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>RGB sliders</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Hex input with validation</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Native color picker integration</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Copy to clipboard</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Livewire binding</span>
                        </li>
                    </ul>
                </div>

                {{-- With Livewire Binding --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">With Livewire Binding</h3>
                    <x-ui.color-picker wire:model.live="selectedColor" label="Choose a color" />
                    <div class="flex items-center gap-2 p-3 bg-muted/30 rounded-lg">
                        <div class="size-6 rounded border border-border" style="background-color: {{ $selectedColor }}"></div>
                        <p class="text-xs sm:text-sm text-muted-foreground">
                            Selected: <span class="font-mono text-foreground">{{ $selectedColor }}</span>
                        </p>
                    </div>
                </div>

                {{-- Sizes --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Sizes</h3>
                    <div class="flex flex-wrap items-end gap-4 sm:gap-6">
                        <div>
                            <p class="text-xs text-muted-foreground mb-2">Small</p>
                            <x-ui.color-picker size="sm" value="#ef4444" />
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground mb-2">Medium</p>
                            <x-ui.color-picker size="md" value="#22c55e" />
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground mb-2">Large</p>
                            <x-ui.color-picker size="lg" value="#3b82f6" />
                        </div>
                    </div>
                </div>

                {{-- Without presets --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Minimal (no presets)</h3>
                    <x-ui.color-picker value="#8b5cf6" :showPresets="false" />
                </div>

                {{-- Theme Color Example --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Theme Color Selector</h3>
                    <div class="p-3 sm:p-4 border border-border rounded-lg bg-card">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-sm font-medium text-foreground">Primary Color</p>
                                <p class="text-xs text-muted-foreground">Choose your brand color</p>
                            </div>
                            <x-ui.color-picker wire:model.live="themeColor" :showInput="false" size="lg" />
                        </div>
                        <div class="mt-4 p-3 rounded-lg" style="background-color: {{ $themeColor }}20">
                            <p class="text-sm" style="color: {{ $themeColor }}">
                                Preview with your selected theme color
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.day-section>

        {{-- KBD Section --}}
        <x-ui.day-section icon="keyboard" title="Keyboard Shortcuts (KBD)">
            <div class="space-y-4 sm:space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Stylish keyboard shortcut display for documentation and UX improvement.
                </p>

                {{-- Features list --}}
                <div class="p-3 sm:p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Automatic key symbol conversion</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Icon support for special keys</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Multiple size variants</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Style variants</span>
                        </li>
                    </ul>
                </div>

                {{-- Common Shortcuts --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Common Shortcuts</h3>
                    <div class="space-y-2 sm:space-y-3">
                        <div class="flex flex-wrap items-center justify-between gap-2 p-2 sm:p-3 bg-muted/30 rounded-lg">
                            <span class="text-xs sm:text-sm text-foreground">Save</span>
                            <x-ui.kbd keys="cmd + s" />
                        </div>
                        <div class="flex flex-wrap items-center justify-between gap-2 p-2 sm:p-3 bg-muted/30 rounded-lg">
                            <span class="text-xs sm:text-sm text-foreground">Copy</span>
                            <x-ui.kbd keys="cmd + c" />
                        </div>
                        <div class="flex flex-wrap items-center justify-between gap-2 p-2 sm:p-3 bg-muted/30 rounded-lg">
                            <span class="text-xs sm:text-sm text-foreground">Paste</span>
                            <x-ui.kbd keys="cmd + v" />
                        </div>
                        <div class="flex flex-wrap items-center justify-between gap-2 p-2 sm:p-3 bg-muted/30 rounded-lg">
                            <span class="text-xs sm:text-sm text-foreground">Undo</span>
                            <x-ui.kbd keys="cmd + z" />
                        </div>
                        <div class="flex flex-wrap items-center justify-between gap-2 p-2 sm:p-3 bg-muted/30 rounded-lg">
                            <span class="text-xs sm:text-sm text-foreground">Find</span>
                            <x-ui.kbd keys="cmd + f" />
                        </div>
                    </div>
                </div>

                {{-- Arrow Keys --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Navigation Keys</h3>
                    <div class="flex flex-wrap items-center gap-2 sm:gap-3">
                        <x-ui.kbd keys="up" />
                        <x-ui.kbd keys="down" />
                        <x-ui.kbd keys="left" />
                        <x-ui.kbd keys="right" />
                        <x-ui.kbd keys="enter" />
                        <x-ui.kbd keys="tab" />
                        <x-ui.kbd keys="esc" />
                    </div>
                </div>

                {{-- Sizes --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Sizes</h3>
                    <div class="space-y-2 sm:space-y-3">
                        <div class="flex flex-wrap items-center gap-2 sm:gap-4">
                            <span class="text-xs text-muted-foreground w-14">Small</span>
                            <x-ui.kbd keys="ctrl + shift + p" size="sm" />
                        </div>
                        <div class="flex flex-wrap items-center gap-2 sm:gap-4">
                            <span class="text-xs text-muted-foreground w-14">Medium</span>
                            <x-ui.kbd keys="ctrl + shift + p" size="md" />
                        </div>
                        <div class="flex flex-wrap items-center gap-2 sm:gap-4">
                            <span class="text-xs text-muted-foreground w-14">Large</span>
                            <x-ui.kbd keys="ctrl + shift + p" size="lg" />
                        </div>
                    </div>
                </div>

                {{-- Variants --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Variants</h3>
                    <div class="space-y-2 sm:space-y-3">
                        <div class="flex flex-wrap items-center gap-2 sm:gap-4">
                            <span class="text-xs text-muted-foreground w-14">Default</span>
                            <x-ui.kbd keys="cmd + k" variant="default" />
                        </div>
                        <div class="flex flex-wrap items-center gap-2 sm:gap-4">
                            <span class="text-xs text-muted-foreground w-14">Outline</span>
                            <x-ui.kbd keys="cmd + k" variant="outline" />
                        </div>
                        <div class="flex flex-wrap items-center gap-2 sm:gap-4">
                            <span class="text-xs text-muted-foreground w-14">Ghost</span>
                            <x-ui.kbd keys="cmd + k" variant="ghost" />
                        </div>
                    </div>
                </div>

                {{-- In Context --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">In Context</h3>
                    <div class="p-3 sm:p-4 border border-border rounded-lg bg-card">
                        <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">
                            Press <x-ui.kbd keys="cmd + k" size="sm" /> to open the command palette,
                            or <x-ui.kbd keys="cmd + shift + p" size="sm" /> for quick actions.
                            Use <x-ui.kbd keys="esc" size="sm" /> to close any dialog.
                        </p>
                    </div>
                </div>

                {{-- Single Keys --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Single Keys</h3>
                    <div class="flex flex-wrap gap-1.5 sm:gap-2">
                        @foreach(['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L'] as $key)
                            <x-ui.kbd :keys="[$key]" />
                        @endforeach
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>

    {{-- Usage Examples Section --}}
    <x-ui.day-section icon="book-open" title="Usage Examples" class="mt-6 sm:mt-8">
        <div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
            {{-- Color Picker Usage --}}
            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-foreground">Color Picker Usage</h3>
                <div class="prose prose-sm dark:prose-invert max-w-none">
                    <x-markdown-content :content="get_resource_content('examples/color-picker-usage.blade.md')" />
                </div>
            </div>

            {{-- KBD Usage --}}
            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-foreground">KBD Usage</h3>
                <div class="prose prose-sm dark:prose-invert max-w-none">
                    <x-markdown-content :content="get_resource_content('examples/kbd-usage.blade.md')" />
                </div>
            </div>
        </div>
    </x-ui.day-section>
</x-ui.day-container>
