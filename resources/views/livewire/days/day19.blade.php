<x-ui.day-container :dayNumber="$dayNumber" title="Context Menu & Spoiler"
    description="Right-click context menu with precise positioning and hide/reveal content with transitions">

    {{-- Toast Container --}}
    <x-ui.toast position="bottom-right" />

    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        {{-- Context Menu Section --}}
        <x-ui.day-section icon="mouse-pointer-click" title="Context Menu">
            <div class="space-y-4 sm:space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Custom right-click context menu with Alpine.js positioning, keyboard shortcuts, and nested submenus.
                </p>

                {{-- Features list --}}
                <div class="p-3 sm:p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Right-click trigger with x-on:contextmenu.prevent</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Precise positioning at cursor location</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Nested submenu support</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Keyboard shortcuts display</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Click-away and escape to close</span>
                        </li>
                    </ul>
                </div>

                {{-- File Context Menu Demo --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">File Explorer Menu</h3>
                    <x-ui.context-menu :items="$fileContextMenu" wire:contextAction="handleContextAction">
                        <div class="p-6 border-2 border-dashed border-border rounded-lg bg-card hover:bg-muted/50 transition-colors cursor-context-menu">
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                                    <x-lucide-file-text class="size-8 text-blue-600 dark:text-blue-400" />
                                </div>
                                <div>
                                    <h4 class="font-medium text-foreground">project-proposal.pdf</h4>
                                    <p class="text-sm text-muted-foreground">Right-click to see options</p>
                                </div>
                            </div>
                        </div>
                    </x-ui.context-menu>
                </div>

                {{-- Text Editor Context Menu Demo --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Text Editor Menu</h3>
                    <x-ui.context-menu :items="$textContextMenu" wire:contextAction="handleContextAction">
                        <div class="p-4 border border-border rounded-lg bg-card">
                            <p class="text-foreground leading-relaxed select-text">
                                The douala city is the economic capital of Cameroon, famous for its vibrant markets and bustling port.
                                <span class="bg-primary/20 px-1 rounded">Right-click on this text</span>
                                to see formatting options and actions available.
                            </p>
                        </div>
                    </x-ui.context-menu>
                </div>
            </div>
        </x-ui.day-section>

        {{-- Spoiler / Accordion Section --}}
        <x-ui.day-section icon="eye-off" title="Spoiler / Accordion">
            <div class="space-y-4 sm:space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Hide and reveal content with smooth transitions using Alpine.js x-collapse.
                </p>

                {{-- Features list --}}
                <div class="p-3 sm:p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Smooth collapse/expand animation</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Multiple variants (warning, info, success, danger)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>FAQ accordion with single/multiple open</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Rotated icon indicator</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Default open state option</span>
                        </li>
                    </ul>
                </div>

                {{-- Spoiler Examples --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Spoiler Variants</h3>
                    <div class="space-y-3">
                        @foreach($spoilerExamples as $spoiler)
                            <x-ui.spoiler
                                :title="$spoiler['title']"
                                :variant="$spoiler['variant']"
                            >
                                {{ $spoiler['content'] }}
                            </x-ui.spoiler>
                        @endforeach
                    </div>
                </div>

                {{-- FAQ Accordion Demo --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">FAQ Accordion</h3>
                    <x-ui.accordion :items="$faqItems" :multiple="false" />
                </div>

                {{-- Multiple Open Accordion --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Multiple Open Allowed</h3>
                    <x-ui.accordion
                        :items="[
                            ['title' => 'First Section', 'content' => 'This accordion allows multiple sections to be open at the same time.'],
                            ['title' => 'Second Section', 'content' => 'Try opening this while the first one is still open!'],
                            ['title' => 'Third Section', 'content' => 'All three can be expanded simultaneously.'],
                        ]"
                        :multiple="true"
                    />
                </div>
            </div>
        </x-ui.day-section>
    </div>

    {{-- Usage Examples --}}
    <div class="mt-6 sm:mt-8">
        <x-ui.day-section icon="book-open" title="Usage Examples">
            <div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
                <div class="space-y-3 min-w-0">
                    <h3 class="text-sm font-semibold text-foreground">Context Menu Usage</h3>
                    <div class="overflow-x-auto">
                        <x-markdown-content :content="get_resource_content('examples/context-menu-usage.blade.md')" />
                    </div>
                </div>
                <div class="space-y-3 min-w-0">
                    <h3 class="text-sm font-semibold text-foreground">Spoiler & Accordion Usage</h3>
                    <div class="overflow-x-auto">
                        <x-markdown-content :content="get_resource_content('examples/spoiler-usage.blade.md')" />
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>
</x-ui.day-container>
