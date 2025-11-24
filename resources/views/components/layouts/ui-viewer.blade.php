<!DOCTYPE html>
<html lang="en" class="h-full" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">

<head>
    @include('partials.head')
</head>

<body class="h-full transition-colors duration-200" x-data="{ fullscreen: false }"
    @keydown.escape.window="fullscreen = false">
    <div class="min-h-full flex flex-col">
        <!-- Header -->
        <header class="bg-card shadow-sm border-b border-border" x-show="!fullscreen" x-transition x-cloak>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">

                    <!-- Navigation centrale -->
                    <div class="hidden md:flex items-center space-x-2">
                        @if($hasPreviousDay)
                            <a href="{{ route('ui.day', ['day' => max(1, $dayNumber - 1)]) }}"
                                class="inline-flex items-center px-4 py-2 border border-input rounded-lg text-sm font-medium text-foreground bg-card hover:bg-accent hover:text-accent-foreground focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ring transition-colors {{ $dayNumber <= 1 ? 'opacity-50 cursor-not-allowed' : '' }}">
                                <x-lucide-arrow-left class="w-4 h-4 mr-2" />
                                <span>Prev</span>
                            </a>
                        @endif

                        <div class="px-6 py-2 bg-muted rounded-lg">
                            <span class="text-sm text-muted-foreground">Day {{ $dayNumber }}</span>
                        </div>

                        @if($hasNextDay)
                            <a href="{{ route('ui.day', ['day' => min(100, $dayNumber + 1)]) }}"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg text-sm font-medium text-primary-foreground bg-primary hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ring transition-all {{ $dayNumber >= 100 ? 'opacity-50 cursor-not-allowed' : '' }}">
                                Next
                                <x-lucide-arrow-right class="w-4 h-4 ml-2" />
                            </a>
                        @endif
                    </div>

                    <!-- Actions (Dark mode + Progression) -->
                    <div class="hidden lg:flex items-center space-x-4">
                        <!-- Dark mode toggle -->
                        <button @click="darkMode = !darkMode"
                            class="p-2 rounded-lg text-muted-foreground hover:text-foreground hover:bg-accent focus:outline-none focus:ring-2 focus:ring-ring transition-colors"
                            title="Toggle dark mode" aria-label="Toggle dark mode">
                            <x-lucide-moon x-show="!darkMode" class="w-5 h-5" x-cloak />
                            <x-lucide-sun x-show="darkMode" class="w-5 h-5" x-cloak />
                        </button>
                    </div>
                </div>
                {{-- @dd($hasPreviousDay, $hasNextDay) --}}
                <!-- Navigation mobile -->
                <div class="md:hidden pb-4 flex items-center justify-between space-x-2">
                    @if($hasPreviousDay)
                        <a href="{{ route('ui.day', ['day' => max(1, $dayNumber - 1)]) }}"
                            class="flex-1 inline-flex items-center justify-center px-3 py-2 border border-input rounded-lg text-sm font-medium text-foreground bg-card hover:bg-accent"
                            aria-label="Previous day">
                            <x-lucide-arrow-left class="w-4 h-4 mr-2" />
                            Prev
                        </a>
                    @endif
                    <div class="px-4 py-2 bg-muted rounded-lg">
                        <span class="text-lg font-bold text-muted-foreground">{{ $dayNumber }}</span>
                    </div>

                    <!-- Dark mode toggle mobile -->
                    <button @click="darkMode = !darkMode"
                        class="p-2 rounded-lg text-muted-foreground hover:text-foreground hover:bg-accent"
                        aria-label="Toggle dark mode">
                        <x-lucide-moon x-show="!darkMode" class="w-5 h-5" x-cloak />
                        <x-lucide-sun x-show="darkMode" class="w-5 h-5" x-cloak />
                    </button>

                    @if($hasNextDay)
                        <a href="{{ route('ui.day', ['day' => min(100, $dayNumber + 1)]) }}"
                            class="flex-1 inline-flex items-center justify-center px-3 py-2 rounded-lg text-sm font-medium text-primary-foreground bg-primary hover:opacity-90"
                            aria-label="Next day">
                            Next
                            <x-lucide-arrow-right class="w-4 h-4 ml-2" />
                        </a>
                    @endif
                </div>
            </div>
        </header>

        <!-- Contenu principal -->
        <main class="flex-1 overflow-y-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" :class="{ 'max-w-full px-0 py-0': fullscreen }">
                <!-- Zone de prévisualisation -->
                <div class="bg-card rounded-2xl shadow-lg border border-border overflow-hidden"
                    :class="{ 'rounded-none shadow-none border-0': fullscreen }">
                    <!-- En-tête de la carte -->
                    <div class="bg-card border-b border-border px-6 py-4" x-show="!fullscreen" x-transition x-cloak>
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-lg font-semibold text-foreground">Component round {{ $dayNumber }} - Day
                                    {{ $dayNumber }}
                                </h2>
                                <p class="text-sm text-muted-foreground mt-1">Challenge UI with Livewire & Alpine.js</p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <!-- View Source Code -->
                                <a href="https://github.com/jiordiviera/livewire-ui-lab/blob/main/resources/views/components/days/day{{ $dayNumber }}.blade.php"
                                    target="_blank"
                                    class="inline-flex items-center px-3 py-2 rounded-lg bg-muted hover:bg-accent text-foreground transition-colors text-sm font-medium"
                                    title="View source code on GitHub" aria-label="View source code on GitHub">
                                    <x-lucide-code class="w-4 h-4 mr-2" />
                                    <span class="hidden sm:inline">Source</span>
                                </a>

                                <button @click="fullscreen = true"
                                    class="p-2 rounded-lg bg-accent hover:bg-accent/80 text-accent-foreground transition-colors"
                                    title="Fullscreen" aria-label="Enter fullscreen">
                                    <x-lucide-maximize class="w-5 h-5" />
                                </button>
                                <div class="md:flex items-center space-x-2 hidden">
                                    <span
                                        class="px-3 py-1 bg-primary text-primary-foreground text-xs font-medium rounded-full">
                                        Livewire 4
                                    </span>
                                    <span
                                        class="px-3 py-1 bg-primary text-primary-foreground text-xs font-medium rounded-full">
                                        Alpine.js
                                    </span>
                                    <span
                                        class="px-3 py-1 bg-primary text-primary-foreground text-xs font-medium rounded-full">
                                        Tailwind CSS
                                    </span>
                                    <span
                                        class="px-3 py-1 bg-primary text-primary-foreground text-xs font-medium rounded-full">
                                        Lucide Icons
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fullscreen control bar -->
                    <div x-show="fullscreen" x-transition x-cloak
                        class="fixed top-0 left-0 right-0 z-50 bg-card border-b border-border px-6 py-3 flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <button @click="fullscreen = false"
                                class="p-2 rounded-lg bg-accent hover:bg-accent/80 text-accent-foreground transition-colors"
                                title="Exit fullscreen" aria-label="Exit fullscreen">
                                <x-lucide-x class="w-5 h-5" />
                            </button>
                            <div>
                                <h3 class="text-sm font-semibold text-foreground">Day {{ $dayNumber }} - Fullscreen mode
                                </h3>
                                <p class="text-xs text-muted-foreground">Press ESC or click × to exit fullscreen mode
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <!-- View Source Code -->
                            <a href="https://github.com/jiordiviera/livewire-ui-lab/blob/main/resources/views/components/days/day{{ $dayNumber }}.blade.php"
                                target="_blank"
                                class="inline-flex items-center px-3 py-2 rounded-lg bg-muted hover:bg-accent text-foreground transition-colors text-sm font-medium"
                                title="View source code on GitHub" aria-label="View source code on GitHub">
                                <x-lucide-code class="w-4 h-4 mr-2" />
                                Source
                            </a>

                            <button @click="darkMode = !darkMode"
                                class="p-2 rounded-lg bg-accent hover:bg-accent/80 text-accent-foreground transition-colors"
                                title="Toggle dark mode" aria-label="Toggle dark mode">
                                <x-lucide-moon x-show="!darkMode" class="w-5 h-5" x-cloak />
                                <x-lucide-sun x-show="darkMode" class="w-5 h-5" x-cloak />
                            </button>
                        </div>
                    </div>

                    <!-- Zone du composant -->
                    <div class="p-8 md:p-12 flex items-center justify-center bg-muted/30"
                        :class="{ 'min-h-[500px]': !fullscreen, 'min-h-screen': fullscreen, 'pt-20': fullscreen }">
                        <div class="w-full flex items-center justify-center">
                            @livewire($componentPath, ['dayNumber' => $dayNumber])
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-card border-t border-border mt-auto" x-show="!fullscreen" x-transition x-cloak>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex flex-col md:flex-row items-center justify-between text-sm text-muted-foreground">
                    <p>100 Days of UI Challenge - Made with ❤️ by <a href="https://github.com/jiordiviera"
                            target="_blank" class="text-primary">Jiordi viera</a></p>
                    <p class="mt-2 md:mt-0">Powered by Laravel Livewire</p>
                </div>
            </div>
        </footer>
    </div>

</body>

</html>