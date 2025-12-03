<x-ui.day-container :dayNumber="$dayNumber" title="Tags Input & Empty State"
    description="Dynamic tags input with validation and user-friendly empty states">

    {{-- Toast Container --}}
    <x-ui.toast position="bottom-right" />

    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        {{-- Tags Input Section --}}
        <x-ui.day-section icon="tags" title="Tags Input">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Le Tags Input permet aux utilisateurs de saisir des listes dynamiques (mots-clés, catégories, etc.).
                    Validez avec <kbd class="px-1.5 py-0.5 bg-muted rounded text-xs font-mono">Entrée</kbd> ou
                    <kbd class="px-1.5 py-0.5 bg-muted rounded text-xs font-mono">,</kbd>
                </p>

                {{-- Features list --}}
                <div class="p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Ajout avec Entrée ou Virgule</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Suppression avec X ou Backspace</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Validation email optionnelle</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Limite max de tags</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Prévention des doublons</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Liaison Livewire complète</span>
                        </li>
                    </ul>
                </div>

                {{-- Basic Tags --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Tags Basiques</h3>
                    <x-ui.tags-input
                        wire:model.live="tags"
                        placeholder="Type and press Enter..."
                    />
                    <!--<p class="text-xs text-muted-foreground">
                        Valeur : <span class="font-mono text-foreground">{{ json_encode($tags) }}</span>
                    </p>-->
                </div>

                {{-- Email Validation --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Validation Email</h3>
                    <x-ui.tags-input
                        wire:model.live="emails"
                        placeholder="email@example.com"
                        :validateEmail="true"
                    />
                    <!--<p class="text-xs text-muted-foreground">
                        Emails : <span class="font-mono text-foreground">{{ json_encode($emails) }}</span>
                    </p>-->
                </div>

                {{-- Max Tags --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Limite de 5 Tags (sans doublons)</h3>
                    <x-ui.tags-input
                        wire:model.live="skills"
                        placeholder="Professional skills..."
                        :maxTags="5"
                        :allowDuplicates="false"
                    />
                </div>

                {{-- Sizes --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Tailles</h3>
                    <div class="space-y-2">
                        <x-ui.tags-input size="sm" placeholder="Small" />
                        <x-ui.tags-input size="md" placeholder="Medium (default)" />
                        <x-ui.tags-input size="lg" placeholder="Large" />
                    </div>
                </div>

                {{-- Disabled --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">État Désactivé</h3>
                    <x-ui.tags-input placeholder="Disabled input" :disabled="true" />
                </div>
            </div>
        </x-ui.day-section>

        {{-- Empty State Section --}}
        <x-ui.day-section icon="inbox" title="Empty State">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Les Empty States guident l'utilisateur lorsqu'il n'y a pas de données à afficher.
                    Composant essentiel pour une bonne UX.
                </p>

                {{-- Features list --}}
                <div class="p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Icônes Lucide personnalisables</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Actions avec boutons ou slots</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Trois tailles (sm, md, lg)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Réutilisable partout</span>
                        </li>
                    </ul>
                </div>

                {{-- Interactive Demo --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Exemple Interactif</h3>
                    <div class="flex items-center gap-2">
                        <button
                            wire:click="toggleEmptyState"
                            class="px-3 py-1.5 text-sm rounded-lg bg-primary text-primary-foreground hover:bg-primary/90 font-medium transition-colors"
                        >
                            {{ $hasData ? 'Masquer les données' : 'Afficher les données' }}
                        </button>
                    </div>

                    <div class="border border-border rounded-lg overflow-hidden">
                        @if($hasData)
                            <div class="p-4 space-y-2">
                                <div class="flex items-center justify-between p-3 bg-muted rounded-lg">
                                    <span class="text-sm font-medium">Produit Camerounais A</span>
                                    <span class="text-sm text-muted-foreground">15.000 FCFA</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-muted rounded-lg">
                                    <span class="text-sm font-medium">Produit Camerounais B</span>
                                    <span class="text-sm text-muted-foreground">25.000 FCFA</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-muted rounded-lg">
                                    <span class="text-sm font-medium">Produit Camerounais C</span>
                                    <span class="text-sm text-muted-foreground">18.500 FCFA</span>
                                </div>
                            </div>
                        @else
                            <x-ui.empty-state
                                title="No products found"
                                description="Try modifying your search criteria or add a new product to get started."
                                icon="package-search"
                                size="sm"
                            >
                                <button
                                    wire:click="loadData"
                                    class="inline-flex items-center gap-2 px-3 py-1.5 text-sm rounded-lg bg-primary text-primary-foreground hover:bg-primary/90 font-medium transition-colors"
                                >
                                    <x-lucide-plus class="size-4" />
                                    Load products
                                </button>
                            </x-ui.empty-state>
                        @endif
                    </div>
                </div>

                {{-- Variants --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Variantes d'Icons</h3>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="border border-border rounded-lg overflow-hidden">
                            <x-ui.empty-state
                                title="No results"
                                description="Try adjusting your search."
                                icon="search-x"
                                size="sm"
                            />
                        </div>
                        <div class="border border-border rounded-lg overflow-hidden">
                            <x-ui.empty-state
                                title="No data"
                                description="Data coming soon."
                                icon="database"
                                size="sm"
                            />
                        </div>
                        <div class="border border-border rounded-lg overflow-hidden">
                            <x-ui.empty-state
                                title="No files"
                                description="Drag and drop files here."
                                icon="file-x"
                                size="sm"
                            />
                        </div>
                        <div class="border border-border rounded-lg overflow-hidden">
                            <x-ui.empty-state
                                title="No messages"
                                description="Your inbox is empty."
                                icon="mail-x"
                                size="sm"
                            />
                        </div>
                    </div>
                </div>

                {{-- Sizes --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Tailles</h3>
                    <div class="space-y-3">
                        <div class="border border-border rounded-lg overflow-hidden">
                            <x-ui.empty-state title="Small" icon="inbox" size="sm" />
                        </div>
                        <div class="border border-border rounded-lg overflow-hidden">
                            <x-ui.empty-state title="Medium" icon="inbox" size="md" />
                        </div>
                        <div class="border border-border rounded-lg overflow-hidden">
                            <x-ui.empty-state title="Large" icon="inbox" size="lg" />
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>

    {{-- Usage Examples Section --}}
    <x-ui.day-section icon="book-open" title="Usage Examples" class="mt-8">
        <div class="grid lg:grid-cols-2 gap-6">
            {{-- Tags Input Usage --}}
            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-foreground">Tags Input Usage</h3>
                <div class="prose prose-sm dark:prose-invert max-w-none">
                    <x-markdown-content :content="get_resource_content('examples/tags-input-usage.blade.md')" />
                </div>
            </div>

            {{-- Empty State Usage --}}
            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-foreground">Empty State Usage</h3>
                <div class="prose prose-sm dark:prose-invert max-w-none">
                    <x-markdown-content :content="get_resource_content('examples/empty-state-usage.blade.md')" />
                </div>
            </div>
        </div>
    </x-ui.day-section>
</x-ui.day-container>
