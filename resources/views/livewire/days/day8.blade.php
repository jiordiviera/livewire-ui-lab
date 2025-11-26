<x-ui.day-container :dayNumber="$dayNumber" title="Skeleton Loader & Avatar">
    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        {{-- Skeleton Loader Section --}}
        <x-ui.day-section icon="loader" title="Skeleton Loader">
            {{-- Description --}}
            <p class="text-sm text-muted-foreground">
                Loading state component to improve perceived user experience.
            </p>

            {{-- Features list --}}
            <div class="space-y-2">
                <p class="text-sm font-medium text-foreground">Features:</p>
                <ul class="space-y-1 text-sm text-muted-foreground">
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                        <span>Pulse animation (native Tailwind)</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                        <span>Predefined variants (text, title, avatar, card)</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                        <span>Customizable sizes</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                        <span>Support wire:loading</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                        <span>Accessible (aria-hidden)</span>
                    </li>
                </ul>
            </div>

            {{-- Skeleton Examples --}}
            <div class="space-y-6">
                {{-- Basic Variants --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Basic Variants</h3>
                    <div class="p-4 bg-muted/30 rounded-lg space-y-4">
                        <div class="space-y-2">
                            <span class="text-xs text-muted-foreground">Text:</span>
                            <x-ui.skeleton variant="text" />
                        </div>
                        <div class="space-y-2">
                            <span class="text-xs text-muted-foreground">Title:</span>
                            <x-ui.skeleton variant="title" />
                        </div>
                        <div class="flex gap-4">
                            <div class="space-y-2">
                                <span class="text-xs text-muted-foreground">Avatar:</span>
                                <x-ui.skeleton variant="avatar" />
                            </div>
                            <div class="space-y-2">
                                <span class="text-xs text-muted-foreground">Avatar SM:</span>
                                <x-ui.skeleton variant="avatar-sm" />
                            </div>
                            <div class="space-y-2">
                                <span class="text-xs text-muted-foreground">Avatar LG:</span>
                                <x-ui.skeleton variant="avatar-lg" />
                            </div>
                        </div>
                        <div class="space-y-2">
                            <span class="text-xs text-muted-foreground">Button:</span>
                            <x-ui.skeleton variant="button" />
                        </div>
                    </div>
                </div>

                {{-- Paragraph Example --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Paragraph</h3>
                    <div class="p-4 bg-muted/30 rounded-lg space-y-3">
                        <x-ui.skeleton variant="title" />
                        <x-ui.skeleton variant="text" />
                        <x-ui.skeleton variant="text" class="w-4/5" />
                    </div>
                </div>

                {{-- Multiple Lines --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Multiple Lines</h3>
                    <div class="p-4 bg-muted/30 rounded-lg">
                        <x-ui.skeleton variant="text" :count="4" />
                    </div>
                </div>

                {{-- Card Skeleton --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Card Skeleton</h3>
                    <div class="p-4 bg-muted/30 rounded-lg">
                        <div class="space-y-4">
                            <x-ui.skeleton variant="image" />
                            <div class="space-y-2">
                                <x-ui.skeleton variant="title" />
                                <x-ui.skeleton variant="text" :count="2" />
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Custom Sizes --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Custom Sizes</h3>
                    <div class="p-4 bg-muted/30 rounded-lg flex flex-wrap gap-4">
                        <x-ui.skeleton class="size-24" rounded="lg" />
                        <x-ui.skeleton class="w-36 h-5" />
                        <x-ui.skeleton class="size-20" rounded="full" />
                    </div>
                </div>
            </div>
        </x-ui.day-section>

        {{-- Avatar Section --}}
        <x-ui.day-section icon="user-circle" title="Avatar & Avatar Group">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Identity display component with automatic fallback handling.
                </p>

                {{-- Features list --}}
                <div class="space-y-2">
                    <p class="text-sm font-medium text-foreground">Features:</p>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Automatic fallback (initials or icon)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Status indicator (online, offline, busy, away)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Multiple sizes (xs to 2xl)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Shapes (circle, square, rounded)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Avatar Group with +X badge</span>
                        </li>
                    </ul>
                </div>

                {{-- Avatar Examples --}}
                <div class="space-y-6">
                    {{-- Basic Avatars --}}
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-foreground">Sizes</h3>
                        <div class="p-4 bg-muted/30 rounded-lg flex items-end gap-4 flex-wrap">
                            <div class="text-center">
                                <x-ui.avatar size="xs" name="Ngono Marie" src="https://i.pravatar.cc/150?img=1" />
                                <span class="text-xs text-muted-foreground mt-1 block">xs</span>
                            </div>
                            <div class="text-center">
                                <x-ui.avatar size="sm" name="Mbarga Paul" src="https://i.pravatar.cc/150?img=2" />
                                <span class="text-xs text-muted-foreground mt-1 block">sm</span>
                            </div>
                            <div class="text-center">
                                <x-ui.avatar size="md" name="Fotso Jean" src="https://i.pravatar.cc/150?img=3" />
                                <span class="text-xs text-muted-foreground mt-1 block">md</span>
                            </div>
                            <div class="text-center">
                                <x-ui.avatar size="lg" name="Nkeng Carine" src="https://i.pravatar.cc/150?img=4" />
                                <span class="text-xs text-muted-foreground mt-1 block">lg</span>
                            </div>
                            <div class="text-center">
                                <x-ui.avatar size="xl" name="Tchinda Roger" src="https://i.pravatar.cc/150?img=5" />
                                <span class="text-xs text-muted-foreground mt-1 block">xl</span>
                            </div>
                            <div class="text-center">
                                <x-ui.avatar size="2xl" name="Biya Sandrine" src="https://i.pravatar.cc/150?img=6" />
                                <span class="text-xs text-muted-foreground mt-1 block">2xl</span>
                            </div>
                        </div>
                    </div>

                    {{-- Shapes --}}
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-foreground">Shapes</h3>
                        <div class="p-4 bg-muted/30 rounded-lg flex items-center gap-4">
                            <div class="text-center">
                                <x-ui.avatar shape="circle" name="Circle" src="https://i.pravatar.cc/150?img=10" />
                                <span class="text-xs text-muted-foreground mt-1 block">circle</span>
                            </div>
                            <div class="text-center">
                                <x-ui.avatar shape="rounded" name="Rounded" src="https://i.pravatar.cc/150?img=11" />
                                <span class="text-xs text-muted-foreground mt-1 block">rounded</span>
                            </div>
                            <div class="text-center">
                                <x-ui.avatar shape="square" name="Square" src="https://i.pravatar.cc/150?img=12" />
                                <span class="text-xs text-muted-foreground mt-1 block">square</span>
                            </div>
                        </div>
                    </div>

                    {{-- Fallback States --}}
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-foreground">Fallback States</h3>
                        <div class="p-4 bg-muted/30 rounded-lg flex items-center gap-4">
                            <div class="text-center">
                                <x-ui.avatar name="Kamga Alain" />
                                <span class="text-xs text-muted-foreground mt-1 block">Initials</span>
                            </div>
                            <div class="text-center">
                                <x-ui.avatar name="Jean" />
                                <span class="text-xs text-muted-foreground mt-1 block">Short name</span>
                            </div>
                            <div class="text-center">
                                <x-ui.avatar />
                                <span class="text-xs text-muted-foreground mt-1 block">Default</span>
                            </div>
                            <div class="text-center">
                                <x-ui.avatar src="https://invalid-url.com/image.jpg" name="Eyenga Rose" />
                                <span class="text-xs text-muted-foreground mt-1 block">Invalid image</span>
                            </div>
                        </div>
                    </div>

                    {{-- Status Indicators --}}
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-foreground">Status Indicators</h3>
                        <div class="p-4 bg-muted/30 rounded-lg flex items-center gap-4">
                            <div class="text-center">
                                <x-ui.avatar status="online" name="Online" src="https://i.pravatar.cc/150?img=20" />
                                <span class="text-xs text-muted-foreground mt-1 block">online</span>
                            </div>
                            <div class="text-center">
                                <x-ui.avatar status="offline" name="Offline" src="https://i.pravatar.cc/150?img=21" />
                                <span class="text-xs text-muted-foreground mt-1 block">offline</span>
                            </div>
                            <div class="text-center">
                                <x-ui.avatar status="busy" name="Busy" src="https://i.pravatar.cc/150?img=22" />
                                <span class="text-xs text-muted-foreground mt-1 block">busy</span>
                            </div>
                            <div class="text-center">
                                <x-ui.avatar status="away" name="Away" src="https://i.pravatar.cc/150?img=23" />
                                <span class="text-xs text-muted-foreground mt-1 block">away</span>
                            </div>
                        </div>
                    </div>

                    {{-- Avatar Group --}}
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-foreground">Avatar Group</h3>
                        <div class="p-4 bg-muted/30 rounded-lg space-y-4">
                            <div>
                                <span class="text-xs text-muted-foreground block mb-2">Default (max 4):</span>
                                <x-ui.avatar-group :avatars="$this->avatars" />
                            </div>
                            <div>
                                <span class="text-xs text-muted-foreground block mb-2">Max 3:</span>
                                <x-ui.avatar-group :avatars="$this->avatars" :max="3" />
                            </div>
                            <div>
                                <span class="text-xs text-muted-foreground block mb-2">Large size:</span>
                                <x-ui.avatar-group :avatars="$this->avatars" :max="5" size="lg" />
                            </div>
                            <div>
                                <span class="text-xs text-muted-foreground block mb-2">Square shape:</span>
                                <x-ui.avatar-group :avatars="$this->avatars" :max="4" :shape="'square'" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>

    {{-- Interactive Demo Section --}}
    <x-ui.day-section icon="play-circle" title="Interactive Demo" class="mt-8">
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-semibold text-foreground">User Profile - Loading simulation</h3>
                    <p class="text-xs text-muted-foreground mt-1">Click to toggle between loading state and content</p>
                </div>
                <button
                    wire:click="toggleLoading"
                    class="px-4 py-2 text-sm bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors"
                    data-test="toggle-loading-btn"
                >
                    {{ $isLoading ? 'Show content' : 'Simulate loading' }}
                </button>
            </div>

            <div class="p-6 border border-border rounded-lg bg-card">
                @if($isLoading)
                    {{-- Skeleton State --}}
                    <div class="flex items-start gap-4" data-test="skeleton-state">
                        <x-ui.skeleton variant="avatar-lg" />
                        <div class="flex-1 space-y-3">
                            <x-ui.skeleton variant="title" class="w-1/3" />
                            <x-ui.skeleton variant="text" class="w-1/4" />
                            <x-ui.skeleton variant="text" :count="2" />
                        </div>
                    </div>
                @else
                    {{-- Loaded Content --}}
                    <div class="flex items-start gap-4" data-test="loaded-state">
                        <x-ui.avatar
                            size="lg"
                            name="Ngono Marie"
                            src="https://i.pravatar.cc/150?img=1"
                            status="online"
                        />
                        <div class="flex-1">
                            <h4 class="font-semibold text-foreground">Ngono Marie</h4>
                            <p class="text-sm text-muted-foreground">Full Stack Developer</p>
                            <p class="text-sm text-muted-foreground mt-2">
                                Based in Yaounde, Cameroon. Passionate about modern web development
                                and elegant user interfaces.
                            </p>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Team Members Example --}}
            <div class="p-6 border border-border rounded-lg bg-card">
                <h4 class="text-sm font-semibold text-foreground mb-4">Development Team</h4>
                @if($isLoading)
                    <div class="flex items-center gap-4" data-test="team-skeleton">
                        <div class="flex -space-x-2">
                            @for($i = 0; $i < 5; $i++)
                                <x-ui.skeleton variant="avatar" class="ring-2 ring-background" />
                            @endfor
                        </div>
                        <x-ui.skeleton class="w-20 h-4" />
                    </div>
                @else
                    <div class="flex items-center gap-4" data-test="team-loaded">
                        <x-ui.avatar-group :avatars="$this->avatars" :max="5" />
                        <span class="text-sm text-muted-foreground">{{ count($this->avatars) }} members</span>
                    </div>
                @endif
            </div>
        </div>
    </x-ui.day-section>

    {{-- Usage Examples Section --}}
    <x-ui.day-section title="Usage Examples" class="mt-8">
        <div class="space-y-4">
            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Skeleton Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/skeleton-usage.blade.md')" />
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Avatar Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/avatar-usage.blade.md')" />
                </div>
            </div>
        </div>
    </x-ui.day-section>
</x-ui.day-container>
