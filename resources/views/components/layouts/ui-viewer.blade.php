<!DOCTYPE html>
<html lang="en" class="h-full" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">

<head>
    @include('partials.head')
</head>

<body class="h-full scroll-smooth transition-colors duration-200" x-data="{ fullscreen: false }"
    @keydown.escape.window="fullscreen = false">
    <div class="min-h-full flex flex-col">
        <!-- Header -->
        <header class="bg-card shadow-sm border-b border-border sticky top-0 z-40" x-show="!fullscreen" x-transition
            x-cloak>
            <div class="max-w-7xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
                <!-- Desktop Navigation -->
                <div class="hidden sm:flex items-center justify-between h-14 md:h-16">
                    <!-- Navigation -->
                    <div class="flex items-center gap-2">
                        @if($hasPreviousDay)
                            <a href="{{ route('ui.day', ['day' => max(1, $dayNumber - 1)]) }}"
                                class="inline-flex items-center px-3 py-1.5 md:px-4 md:py-2 border border-input rounded-lg text-sm font-medium text-foreground bg-card hover:bg-accent hover:text-accent-foreground transition-colors"
                                aria-label="Previous day">
                                <x-lucide-arrow-left class="size-4 mr-1.5" />
                                <span class="hidden md:inline">Prev</span>
                            </a>
                        @endif

                        <div class="px-4 py-1.5 md:px-6 md:py-2 bg-muted rounded-lg">
                            <span class="text-sm font-medium text-foreground">{{ $dayNumber }}</span>
                        </div>

                        @if($hasNextDay)
                            <a href="{{ route('ui.day', ['day' => min(100, $dayNumber + 1)]) }}"
                                class="inline-flex items-center px-3 py-1.5 md:px-4 md:py-2 rounded-lg text-sm font-medium text-primary-foreground bg-primary hover:bg-primary/90 transition-colors"
                                aria-label="Next day">
                                <span class="hidden md:inline">Next</span>
                                <x-lucide-arrow-right class="size-4 ml-1.5" />
                            </a>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-2">
                        <button @click="darkMode = !darkMode"
                            class="p-2 rounded-lg text-muted-foreground hover:text-foreground hover:bg-accent transition-colors"
                            title="Toggle dark mode" aria-label="Toggle dark mode">
                            <x-lucide-moon x-show="!darkMode" class="size-5" x-cloak />
                            <x-lucide-sun x-show="darkMode" class="size-5" x-cloak />
                        </button>
                    </div>
                </div>

                <!-- Mobile Navigation -->
                <div class="sm:hidden flex items-center justify-between gap-2 py-3">
                    @if($hasPreviousDay)
                        <a href="{{ route('ui.day', ['day' => max(1, $dayNumber - 1)]) }}"
                            class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 border border-input rounded-lg text-sm font-medium text-foreground bg-card active:bg-accent"
                            aria-label="Previous day">
                            <x-lucide-arrow-left class="size-4" />
                            Prev
                        </a>
                    @else
                        <div class="flex-1"></div>
                    @endif

                    <div class="px-4 py-2 bg-muted rounded-lg shrink-0">
                        <span class="text-base font-bold text-foreground">{{ $dayNumber }}</span>
                    </div>

                    <button @click="darkMode = !darkMode"
                        class="p-2 rounded-lg text-muted-foreground hover:text-foreground active:bg-accent shrink-0"
                        aria-label="Toggle dark mode">
                        <x-lucide-moon x-show="!darkMode" class="size-5" x-cloak />
                        <x-lucide-sun x-show="darkMode" class="size-5" x-cloak />
                    </button>

                    @if($hasNextDay)
                        <a href="{{ route('ui.day', ['day' => min(100, $dayNumber + 1)]) }}"
                            class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg text-sm font-medium text-primary-foreground bg-primary active:bg-primary/90"
                            aria-label="Next day">
                            Next
                            <x-lucide-arrow-right class="size-4" />
                        </a>
                    @else
                        <div class="flex-1"></div>
                    @endif
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <div class="max-w-7xl mx-auto px-2 sm:px-4 md:px-6 lg:px-8 py-3 sm:py-4 md:py-6 lg:py-8"
                :class="{ 'max-w-full !px-0 !py-0': fullscreen }">
                <!-- Preview Card -->
                <div class="bg-card rounded-xl sm:rounded-2xl shadow-lg border border-border overflow-hidden"
                    :class="{ '!rounded-none !shadow-none !border-0': fullscreen }">

                    <!-- Card Header -->
                    <div class="bg-card border-b border-border px-3 sm:px-4 md:px-6 py-3 sm:py-4" x-show="!fullscreen"
                        x-transition x-cloak>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <div class="min-w-0">
                                <h2 class="text-base sm:text-lg font-semibold text-foreground truncate">
                                    Day {{ $dayNumber }} - Component Challenge
                                </h2>
                                <p class="text-xs sm:text-sm text-muted-foreground mt-0.5">
                                    Challenge UI with Livewire & Alpine.js
                                </p>
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                <!-- View Source Code -->
                                <a href="https://github.com/jiordiviera/livewire-ui-lab/blob/main/resources/views/components/days/day{{ $dayNumber }}.blade.php"
                                    target="_blank"
                                    class="inline-flex items-center gap-1.5 px-2.5 sm:px-3 py-1.5 sm:py-2 rounded-lg bg-muted hover:bg-accent text-foreground transition-colors text-xs sm:text-sm font-medium"
                                    title="View source code" aria-label="View source code on GitHub">
                                    <x-lucide-code class="size-4" />
                                    <span>Source</span>
                                </a>

                                <button @click="fullscreen = true"
                                    class="p-1.5 sm:p-2 rounded-lg bg-accent hover:bg-accent/80 text-accent-foreground transition-colors cursor-pointer"
                                    title="Fullscreen" aria-label="Enter fullscreen">
                                    <x-lucide-maximize class="size-4 sm:size-5" />
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Fullscreen Control Bar -->
                    <div x-show="fullscreen" x-transition x-cloak
                        class="fixed top-0 left-0 right-0 z-50 bg-card/95 backdrop-blur-sm border-b border-border px-3 sm:px-6 py-2 sm:py-3">
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex items-center gap-2 sm:gap-4 min-w-0">
                                <button @click="fullscreen = false"
                                    class="p-1.5 sm:p-2 rounded-lg bg-accent hover:bg-accent/80 text-accent-foreground transition-colors shrink-0"
                                    title="Exit fullscreen" aria-label="Exit fullscreen">
                                    <x-lucide-x class="size-4 sm:size-5" />
                                </button>
                                <div class="min-w-0">
                                    <h3 class="text-sm font-semibold text-foreground truncate">Day {{ $dayNumber }}</h3>
                                    <p class="text-xs text-muted-foreground hidden sm:block">Press ESC to exit</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                <a href="https://github.com/jiordiviera/livewire-ui-lab/blob/main/resources/views/components/days/day{{ $dayNumber }}.blade.php"
                                    target="_blank"
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-muted hover:bg-accent text-foreground transition-colors text-xs sm:text-sm font-medium"
                                    title="View source code" aria-label="View source code on GitHub">
                                    <x-lucide-code class="size-4" />
                                    <span class="hidden sm:inline">Source</span>
                                </a>

                                <button @click="darkMode = !darkMode"
                                    class="p-1.5 sm:p-2 rounded-lg bg-accent hover:bg-accent/80 text-accent-foreground transition-colors"
                                    title="Toggle dark mode" aria-label="Toggle dark mode">
                                    <x-lucide-moon x-show="!darkMode" class="size-4 sm:size-5" x-cloak />
                                    <x-lucide-sun x-show="darkMode" class="size-4 sm:size-5" x-cloak />
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Component Zone -->
                    <div class="p-0 bg-muted/30" :class="{ 'min-h-screen pt-14 sm:pt-16': fullscreen }">
                        <div class="w-full">
                            @livewire($componentPath, ['dayNumber' => $dayNumber])
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-card border-t border-border mt-auto" x-show="!fullscreen" x-transition x-cloak>
            <div class="max-w-7xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8 py-3 sm:py-4">
                <div
                    class="flex flex-col sm:flex-row items-center justify-between gap-2 text-xs sm:text-sm text-muted-foreground text-center sm:text-left">
                    <p>100 Days of UI Challenge - Made with ❤️ by
                        <a href="https://github.com/jiordiviera" target="_blank" class="text-primary hover:underline">
                            Jiordi Viera
                        </a>
                    </p>
                    <p>Powered by Laravel Livewire</p>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>