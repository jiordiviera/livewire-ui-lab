<x-ui.day-container :dayNumber="$dayNumber" title="Tree View & Code Snippet"
    description="Recursive nested list structure and code block with copy functionality">

    {{-- Toast Container --}}
    <x-ui.toast position="bottom-right" />

    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        {{-- Tree View Section --}}
        <x-ui.day-section icon="folder-tree" title="Tree View">
            <div class="space-y-4 sm:space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Structure arborescente récursive avec état déplié/replié géré par Alpine.js.
                </p>

                {{-- Features list --}}
                <div class="p-3 sm:p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Composant Blade récursif</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>État déplié/replié avec Alpine.js</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Variants: fichiers, organisation</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Lignes de connexion optionnelles</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Animation collapse/expand</span>
                        </li>
                    </ul>
                </div>

                {{-- File Tree Demo --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Explorateur de fichiers</h3>
                    <div class="p-4 border border-border rounded-lg bg-card max-h-[350px] overflow-y-auto">
                        <x-ui.tree-view
                            :items="$fileTree"
                            variant="files"
                            :show-lines="true"
                            :default-expanded="false"
                        />
                    </div>
                </div>

                {{-- Organization Tree Demo --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Organigramme</h3>
                    <div class="p-4 border border-border rounded-lg bg-card max-h-[350px] overflow-y-auto">
                        <x-ui.tree-view
                            :items="$orgTree"
                            variant="org"
                            :show-lines="false"
                            :default-expanded="true"
                        />
                    </div>
                </div>
            </div>
        </x-ui.day-section>

        {{-- Code Snippet Section --}}
        <x-ui.day-section icon="code" title="Code Snippet">
            <div class="space-y-4 sm:space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Bloc de code avec numéros de ligne et fonctionnalité "Copier dans le presse-papiers".
                </p>

                {{-- Features list --}}
                <div class="p-3 sm:p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Copier dans le presse-papiers</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Numéros de ligne</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Surlignage de lignes spécifiques</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Icônes par langage</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Header avec nom de fichier</span>
                        </li>
                    </ul>
                </div>

                {{-- Code Examples --}}
                <div class="space-y-4">
                    {{-- PHP Example --}}
                    <div class="space-y-2">
                        <h3 class="text-sm font-semibold text-foreground">PHP / Laravel</h3>
                        <x-ui.code-snippet
                            :code="$codeExamples['php']['code']"
                            language="php"
                            :filename="$codeExamples['php']['filename']"
                            :highlight-lines="[10, 11, 12]"
                            max-height="250px"
                        />
                    </div>

                    {{-- JavaScript Example --}}
                    <div class="space-y-2">
                        <h3 class="text-sm font-semibold text-foreground">JavaScript</h3>
                        <x-ui.code-snippet
                            :code="$codeExamples['javascript']['code']"
                            language="javascript"
                            :filename="$codeExamples['javascript']['filename']"
                            max-height="200px"
                        />
                    </div>

                    {{-- Bash Example --}}
                    <div class="space-y-2">
                        <h3 class="text-sm font-semibold text-foreground">Bash Script</h3>
                        <x-ui.code-snippet
                            :code="$codeExamples['bash']['code']"
                            language="bash"
                            :filename="$codeExamples['bash']['filename']"
                            :show-line-numbers="true"
                            max-height="200px"
                        />
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
                    <h3 class="text-sm font-semibold text-foreground">Tree View Usage</h3>
                    <div class="overflow-x-auto">
                        <x-markdown-content :content="get_resource_content('examples/tree-view-usage.blade.md')" />
                    </div>
                </div>
                <div class="space-y-3 min-w-0">
                    <h3 class="text-sm font-semibold text-foreground">Code Snippet Usage</h3>
                    <div class="overflow-x-auto">
                        <x-markdown-content :content="get_resource_content('examples/code-snippet-usage.blade.md')" />
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>
</x-ui.day-container>
