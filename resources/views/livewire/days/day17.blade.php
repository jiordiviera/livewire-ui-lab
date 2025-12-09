<x-ui.day-container :dayNumber="$dayNumber" title="Sortable List & Timeline"
    description="Drag-and-drop reorderable list and activity timeline visualization">

    {{-- Toast Container --}}
    <x-ui.toast position="bottom-right" />

    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        {{-- Sortable List Section --}}
        <x-ui.day-section icon="grip-vertical" title="Sortable List">
            <div class="space-y-4 sm:space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Liste réordonnçable par glisser-déposer avec synchronisation Livewire.
                </p>

                {{-- Features list --}}
                <div class="p-3 sm:p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Drag-and-drop natif avec Sortable.js</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Synchronisation Livewire</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Handle de drag personnalisable</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Animation fluide</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Support mobile (touch)</span>
                        </li>
                    </ul>
                </div>

                {{-- Interactive Demo --}}
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-semibold text-foreground">Liste de tâches</h3>
                        <span class="text-xs text-muted-foreground">{{ count($tasks) }} tâches</span>
                    </div>

                    {{-- Add Task Form --}}
                    <div
                        x-data="{ newTask: '' }"
                        class="flex gap-2"
                    >
                        <input
                            type="text"
                            x-model="newTask"
                            @keydown.enter="$wire.addTask(newTask); newTask = ''"
                            placeholder="Nouvelle tâche..."
                            class="flex-1 px-3 py-2 text-sm bg-background border border-input rounded-lg focus:outline-none focus:ring-2 focus:ring-ring"
                        />
                        <button
                            @click="$wire.addTask(newTask); newTask = ''"
                            class="px-3 py-2 bg-primary text-primary-foreground text-sm font-medium rounded-lg hover:bg-primary/90 transition-colors"
                        >
                            <x-lucide-plus class="size-4" />
                        </button>
                    </div>

                    {{-- Sortable List --}}
                    <div
                        x-data="sortableList({
                            items: @js($tasks),
                            itemKey: 'id',
                            onUpdate: (orderedIds) => $wire.updateTaskOrder(orderedIds)
                        })"
                        class="space-y-2"
                    >
                        <ul x-ref="sortableList" class="space-y-2">
                            @foreach($tasks as $index => $task)
                                <li
                                    data-id="{{ $task['id'] }}"
                                    class="sortable-item group flex items-center gap-3 p-3 bg-card border border-border rounded-lg transition-all duration-200 hover:border-primary/50 hover:shadow-sm"
                                >
                                    {{-- Handle --}}
                                    <div class="sortable-handle cursor-grab active:cursor-grabbing p-1 rounded hover:bg-muted transition-colors">
                                        <x-lucide-grip-vertical class="size-5 text-muted-foreground" />
                                    </div>

                                    {{-- Status checkbox --}}
                                    <button
                                        wire:click="toggleTaskStatus({{ $task['id'] }})"
                                        class="flex-shrink-0 size-5 rounded border-2 flex items-center justify-center transition-colors
                                            {{ $task['status'] === 'completed' ? 'bg-green-500 border-green-500' : ($task['status'] === 'in_progress' ? 'bg-blue-500 border-blue-500' : 'border-muted-foreground/50 hover:border-primary') }}"
                                    >
                                        @if($task['status'] === 'completed')
                                            <x-lucide-check class="size-3 text-white" />
                                        @elseif($task['status'] === 'in_progress')
                                            <x-lucide-loader-2 class="size-3 text-white animate-spin" />
                                        @endif
                                    </button>

                                    {{-- Content --}}
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-foreground truncate {{ $task['status'] === 'completed' ? 'line-through text-muted-foreground' : '' }}">
                                            {{ $task['title'] }}
                                        </p>
                                        <div class="flex items-center gap-2 mt-1">
                                            <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium rounded-full
                                                {{ $task['priority'] === 'high' ? 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400' :
                                                   ($task['priority'] === 'medium' ? 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400' :
                                                   'bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-400') }}">
                                                {{ ucfirst($task['priority']) }}
                                            </span>
                                            <span class="text-xs text-muted-foreground">
                                                {{ $task['status'] === 'completed' ? 'Terminé' : ($task['status'] === 'in_progress' ? 'En cours' : 'En attente') }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Delete button --}}
                                    <button
                                        wire:click="removeTask({{ $task['id'] }})"
                                        class="flex-shrink-0 p-1.5 text-muted-foreground hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded transition-colors opacity-0 group-hover:opacity-100"
                                    >
                                        <x-lucide-trash-2 class="size-4" />
                                    </button>

                                    {{-- Index --}}
                                    <span class="flex-shrink-0 size-6 flex items-center justify-center text-xs font-medium text-muted-foreground bg-muted rounded-full">
                                        {{ $index + 1 }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>

                        {{-- Empty state --}}
                        @if(empty($tasks))
                            <div class="flex flex-col items-center justify-center py-12 text-center border-2 border-dashed border-border rounded-lg">
                                <x-lucide-clipboard-list class="size-12 text-muted-foreground/50 mb-3" />
                                <p class="text-sm text-muted-foreground">Aucune tâche</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </x-ui.day-section>

        {{-- Timeline Section --}}
        <x-ui.day-section icon="git-branch" title="Timeline">
            <div class="space-y-4 sm:space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Fil chronologique pour afficher l'historique d'activités ou d'événements.
                </p>

                {{-- Features list --}}
                <div class="p-3 sm:p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Mode vertical et horizontal</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Icônes par type d'événement</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Mode alternant gauche/droite</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Animations d'apparition</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Tailles personnalisables</span>
                        </li>
                    </ul>
                </div>

                {{-- Timeline Demos --}}
                <div class="space-y-6">
                    {{-- Vertical Standard --}}
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-foreground">Timeline verticale</h3>
                        <div class="p-4 border border-border rounded-lg bg-card max-h-[400px] overflow-y-auto">
                            <x-ui.timeline :items="$timelineEvents" variant="vertical" size="md" />
                        </div>
                    </div>

                    {{-- Alternating --}}
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-foreground">Timeline alternante</h3>
                        <div class="p-4 border border-border rounded-lg bg-card max-h-[500px] overflow-y-auto">
                            <x-ui.timeline :items="$timelineEvents" variant="vertical" :alternating="true" size="sm" />
                        </div>
                    </div>

                    {{-- Horizontal --}}
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-foreground">Timeline horizontale</h3>
                        <div class="p-4 border border-border rounded-lg bg-card">
                            <x-ui.timeline :items="array_slice($timelineEvents, 0, 4)" variant="horizontal" size="sm" />
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>

    {{-- Usage Examples --}}
    <div class="mt-6 sm:mt-8">
        <x-ui.day-section icon="code" title="Usage Examples">
            <div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
                <div class="space-y-3 min-w-0">
                    <h3 class="text-sm font-semibold text-foreground">Sortable List Usage</h3>
                    <div class="overflow-x-auto">
                        <x-markdown-content :content="get_resource_content('examples/sortable-list-usage.blade.md')" />
                    </div>
                </div>
                <div class="space-y-3 min-w-0">
                    <h3 class="text-sm font-semibold text-foreground">Timeline Usage</h3>
                    <div class="overflow-x-auto">
                        <x-markdown-content :content="get_resource_content('examples/timeline-usage.blade.md')" />
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>
</x-ui.day-container>
