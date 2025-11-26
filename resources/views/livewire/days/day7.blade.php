<x-ui.day-container :dayNumber="$dayNumber" title="Pagination & Breadcrumbs">
    <div class="grid lg:grid-cols-2 gap-8">
        {{-- Pagination Section --}}
        <x-ui.day-section icon="chevrons-right" title="Pagination">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Composant de pagination personnalisé avec intégration Livewire complète pour la navigation des
                    données.
                </p>

                {{-- Features list --}}
                <div class="space-y-2">
                    <p class="text-sm font-medium text-foreground">Features:</p>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Livewire integration</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Smart ellipsis logic</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Previous/Next buttons</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Disabled states</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Results counter</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>ARIA accessible</span>
                        </li>
                    </ul>
                </div>

                {{-- Sample Data Table --}}
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Villes du Cameroun</h3>

                    {{-- Table --}}
                    <div class="overflow-hidden border border-border rounded-lg" data-test="cities-table">
                        <table class="w-full text-sm">
                            <thead class="bg-muted/50">
                            <tr>
                                <th class="px-4 py-3 text-left font-medium text-foreground">Ville</th>
                                <th class="px-4 py-3 text-left font-medium text-foreground">Région</th>
                                <th class="px-4 py-3 text-left font-medium text-foreground">Population</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-border">
                            @foreach($this->paginatedData as $city)
                                <tr class="hover:bg-muted/30 transition-colors" data-test="city-row">
                                    <td class="px-4 py-3 text-foreground">{{ $city['name'] }}</td>
                                    <td class="px-4 py-3 text-muted-foreground">{{ $city['region'] }}</td>
                                    <td class="px-4 py-3 text-muted-foreground">{{ $city['population'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination Component --}}
                    <x-ui.pagination :paginator="$this->paginatedData" />
                </div>
            </div>
        </x-ui.day-section>

        {{-- Breadcrumbs Section --}}
        <x-ui.day-section icon="arrow-right" title="Breadcrumbs">
            <div class="space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Fil d'Ariane pour afficher la hiérarchie de navigation et améliorer l'expérience utilisateur.
                </p>

                {{-- Features list --}}
                <div class="space-y-2">
                    <p class="text-sm font-medium text-foreground">Features:</p>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Icon separators</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Active page indication</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Flexible item format</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>ARIA accessible</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Hover effects</span>
                        </li>
                    </ul>
                </div>

                {{-- Examples --}}
                <div class="space-y-6">
                    <div class="space-y-2">
                        <h3 class="text-sm font-semibold text-foreground">Basic Navigation</h3>
                        <div class="p-4 bg-muted/30 rounded-lg">
                            <x-ui.breadcrumbs :items="[
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'Products', 'url' => '/products'],
        ['label' => 'Electronics', 'url' => '/products/electronics'],
        ['label' => 'Laptop']
    ]" />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <h3 class="text-sm font-semibold text-foreground">Administrative Navigation (Cameroon)</h3>
                        <div class="p-4 bg-muted/30 rounded-lg">
                            <x-ui.breadcrumbs :items="[
        ['label' => 'Accueil', 'url' => '/'],
        ['label' => 'Régions', 'url' => '/regions'],
        ['label' => 'Centre', 'url' => '/regions/centre'],
        ['label' => 'Yaoundé']
    ]" />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <h3 class="text-sm font-semibold text-foreground">Slash Separator</h3>
                        <div class="p-4 bg-muted/30 rounded-lg">
                            <x-ui.breadcrumbs separator="slash" :items="[
        ['label' => 'Documents', 'url' => '/documents'],
        ['label' => 'Administrative', 'url' => '/documents/administrative'],
        ['label' => 'CNI Request']
    ]" />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <h3 class="text-sm font-semibold text-foreground">Dot Separator</h3>
                        <div class="p-4 bg-muted/30 rounded-lg">
                            <x-ui.breadcrumbs separator="circle" :items="[
        ['label' => 'Settings', 'url' => '/settings'],
        ['label' => 'Profile', 'url' => '/settings/profile'],
        ['label' => 'Security']
    ]" />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <h3 class="text-sm font-semibold text-foreground">Deep Hierarchy</h3>
                        <div class="p-4 bg-muted/30 rounded-lg overflow-auto hide-scrollbar">
                            <x-ui.breadcrumbs :items="[
        ['label' => 'Cameroun', 'url' => '/'],
        ['label' => 'Régions', 'url' => '/regions'],
        ['label' => 'Littoral', 'url' => '/regions/littoral'],
        ['label' => 'Départements', 'url' => '/regions/littoral/departements'],
        ['label' => 'Wouri', 'url' => '/regions/littoral/departements/wouri'],
        ['label' => 'Douala']
    ]" />
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>

    {{-- Combined Usage Example --}}
    <x-ui.day-section icon="layout" title="Combined Usage Example" class="mt-8">
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-semibold text-foreground">Liste des Étudiants - Université de Yaoundé I</h3>
                    <p class="text-xs text-muted-foreground mt-1">Exemple d'intégration pagination et breadcrumbs</p>
                </div>
            </div>

            {{-- Breadcrumb navigation --}}
            <x-ui.breadcrumbs :items="[
        ['label' => 'Université', 'url' => '#'],
        ['label' => 'Étudiants', 'url' => '#'],
        ['label' => 'Liste complète']
    ]" />

            {{-- Content placeholder --}}
            <div class="p-8 border border-border rounded-lg bg-muted/20 text-center">
                <x-lucide-users class="size-12 mx-auto text-muted-foreground mb-3" />
                <p class="text-sm text-muted-foreground">
                    Contenu paginé avec breadcrumb de navigation
                </p>
            </div>

            {{-- Pagination for the example --}}
            <x-ui.pagination :paginator="$this->paginatedData" />
        </div>
    </x-ui.day-section>

    {{-- Usage Examples Section --}}
    <x-ui.day-section title="Usage Examples" class="mt-8">
        <div class="space-y-4">
            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Pagination Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/pagination-usage.blade.md')" />
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Breadcrumbs Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/breadcrumbs-usage.blade.md')" />
                </div>
            </div>
        </div>
    </x-ui.day-section>
</x-ui.day-container>
