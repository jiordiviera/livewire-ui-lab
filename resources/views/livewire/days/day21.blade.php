<x-ui.day-container :dayNumber="$dayNumber" title="Command Palette & File Icons"
    description="Global search modal with Cmd+K shortcut and file type icon display">

    {{-- Toast Container --}}
    <x-ui.toast position="bottom-right" />

    {{-- Command Palette Modal --}}
    <x-ui.command-palette placeholder="Search commands, files...">
        @if(!empty($filteredResults['recent']))
            <div class="p-2">
                <h3 class="px-3 py-1.5 text-xs font-semibold text-gray-500 dark:text-gray-400">Recent Files</h3>
                <ul>
                    @foreach($filteredResults['recent'] as $file)
                        <li>
                            <button
                                wire:click="openFile({{ $file['id'] }})"
                                class="group flex w-full cursor-pointer select-none items-center gap-3 rounded-lg px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-800"
                            >
                                <x-ui.file-icon :extension="$file['extension']" size="sm" />
                                <div class="flex-1 text-left">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $file['name'] }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $file['path'] }}</p>
                                </div>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(!empty($filteredResults['commands']))
            <div class="p-2 border-t border-gray-100 dark:border-gray-800">
                <h3 class="px-3 py-1.5 text-xs font-semibold text-gray-500 dark:text-gray-400">Commands</h3>
                <ul>
                    @foreach($filteredResults['commands'] as $command)
                        <li>
                            <button
                                wire:click="executeCommand({{ $command['id'] }})"
                                class="group flex w-full cursor-pointer select-none items-center gap-3 rounded-lg px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-800"
                            >
                                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-800">
                                    @switch($command['icon'])
                                        @case('file-plus')
                                            <x-lucide-file-plus class="h-4 w-4 text-gray-500" />
                                            @break
                                        @case('folder-plus')
                                            <x-lucide-folder-plus class="h-4 w-4 text-gray-500" />
                                            @break
                                        @case('save')
                                            <x-lucide-save class="h-4 w-4 text-gray-500" />
                                            @break
                                        @case('download')
                                            <x-lucide-download class="h-4 w-4 text-gray-500" />
                                            @break
                                        @case('settings')
                                            <x-lucide-settings class="h-4 w-4 text-gray-500" />
                                            @break
                                        @case('palette')
                                            <x-lucide-palette class="h-4 w-4 text-gray-500" />
                                            @break
                                        @case('terminal')
                                            <x-lucide-terminal class="h-4 w-4 text-gray-500" />
                                            @break
                                        @case('layout-grid')
                                            <x-lucide-layout-grid class="h-4 w-4 text-gray-500" />
                                            @break
                                        @case('git-branch')
                                            <x-lucide-git-branch class="h-4 w-4 text-gray-500" />
                                            @break
                                        @case('git-commit')
                                            <x-lucide-git-commit class="h-4 w-4 text-gray-500" />
                                            @break
                                        @default
                                            <x-lucide-command class="h-4 w-4 text-gray-500" />
                                    @endswitch
                                </span>
                                <div class="flex-1 text-left">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $command['title'] }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $command['category'] }}</p>
                                </div>
                                @if($command['shortcut'])
                                    <kbd class="hidden rounded bg-gray-100 px-2 py-1 text-xs text-gray-500 dark:bg-gray-800 dark:text-gray-400 sm:block">
                                        {{ $command['shortcut'] }}
                                    </kbd>
                                @endif
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(empty($filteredResults['recent']) && empty($filteredResults['commands']))
            <div class="p-8 text-center">
                <x-lucide-search-x class="mx-auto h-10 w-10 text-gray-300 dark:text-gray-600" />
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">No results found for "{{ $searchQuery }}"</p>
            </div>
        @endif
    </x-ui.command-palette>

    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        {{-- Command Palette Section --}}
        <x-ui.day-section icon="command" title="Command Palette">
            <div class="space-y-4 sm:space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Global search modal with keyboard shortcut (Cmd+K / Ctrl+K) and live filtered results.
                </p>

                {{-- Features list --}}
                <div class="p-3 sm:p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Global keyboard shortcut (Cmd+K / Ctrl+K)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Live search with Livewire debounce</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>File and command suggestions</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Keyboard shortcuts display</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Backdrop blur and smooth transitions</span>
                        </li>
                    </ul>
                </div>

                {{-- Demo Button --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Try It</h3>
                    <div class="flex flex-col gap-3">
                        <button
                            wire:click="openCommandPalette"
                            class="flex items-center justify-between px-4 py-3 bg-card border border-border rounded-lg hover:bg-muted/50 transition-colors"
                        >
                            <span class="flex items-center gap-3">
                                <x-lucide-search class="h-5 w-5 text-muted-foreground" />
                                <span class="text-muted-foreground">Search commands, files...</span>
                            </span>
                            <kbd class="hidden sm:flex items-center gap-1 rounded bg-muted px-2 py-1 text-xs text-muted-foreground">
                                <span class="text-base">⌘</span>K
                            </kbd>
                        </button>
                        <p class="text-xs text-muted-foreground text-center">
                            Or press <kbd class="rounded bg-muted px-1.5 py-0.5">Cmd+K</kbd> / <kbd class="rounded bg-muted px-1.5 py-0.5">Ctrl+K</kbd> anywhere
                        </p>
                    </div>
                </div>

                {{-- Available Commands --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Available Commands</h3>
                    <div class="grid gap-2">
                        @foreach(array_slice($commands, 0, 4) as $command)
                            <div class="flex items-center justify-between px-3 py-2 bg-card border border-border rounded-lg">
                                <span class="flex items-center gap-2 text-sm">
                                    <span class="text-muted-foreground">{{ $command['category'] }}:</span>
                                    <span class="font-medium">{{ $command['title'] }}</span>
                                </span>
                                @if($command['shortcut'])
                                    <kbd class="text-xs text-muted-foreground">{{ $command['shortcut'] }}</kbd>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </x-ui.day-section>

        {{-- File Icons Section --}}
        <x-ui.day-section icon="file-type" title="File Icon / Mime Type">
            <div class="space-y-4 sm:space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Display appropriate icons based on file extension with color-coded categories.
                </p>

                {{-- Features list --}}
                <div class="p-3 sm:p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>30+ file extension support</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Color-coded by file category</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Multiple sizes (xs, sm, md, lg, xl)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Dark mode support</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Fallback for unknown extensions</span>
                        </li>
                    </ul>
                </div>

                {{-- Icon Sizes Demo --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Icon Sizes</h3>
                    <div class="flex items-end gap-4 p-4 bg-card border border-border rounded-lg">
                        <div class="text-center">
                            <x-ui.file-icon extension="pdf" size="xs" />
                            <p class="text-xs text-muted-foreground mt-1">xs</p>
                        </div>
                        <div class="text-center">
                            <x-ui.file-icon extension="pdf" size="sm" />
                            <p class="text-xs text-muted-foreground mt-1">sm</p>
                        </div>
                        <div class="text-center">
                            <x-ui.file-icon extension="pdf" size="md" />
                            <p class="text-xs text-muted-foreground mt-1">md</p>
                        </div>
                        <div class="text-center">
                            <x-ui.file-icon extension="pdf" size="lg" />
                            <p class="text-xs text-muted-foreground mt-1">lg</p>
                        </div>
                        <div class="text-center">
                            <x-ui.file-icon extension="pdf" size="xl" />
                            <p class="text-xs text-muted-foreground mt-1">xl</p>
                        </div>
                    </div>
                </div>

                {{-- File List Demo --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">File List Example</h3>
                    <div class="border border-border rounded-lg divide-y divide-border overflow-hidden">
                        @foreach($sampleFiles as $file)
                            <div class="flex items-center gap-3 px-4 py-3 bg-card hover:bg-muted/30 transition-colors">
                                <x-ui.file-icon :extension="$file['extension']" size="md" />
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-foreground truncate">{{ $file['name'] }}</p>
                                    <p class="text-xs text-muted-foreground uppercase">{{ $file['extension'] }}</p>
                                </div>
                                <span class="text-xs text-muted-foreground">{{ $file['size'] }}</span>
                            </div>
                        @endforeach
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
                    <h3 class="text-sm font-semibold text-foreground">Command Palette Usage</h3>
                    <div class="overflow-x-auto">
                        <x-markdown-content :content="get_resource_content('examples/command-palette-usage.blade.md')" />
                    </div>
                </div>
                <div class="space-y-3 min-w-0">
                    <h3 class="text-sm font-semibold text-foreground">File Icon Usage</h3>
                    <div class="overflow-x-auto">
                        <x-markdown-content :content="get_resource_content('examples/file-icon-usage.blade.md')" />
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>
</x-ui.day-container>
