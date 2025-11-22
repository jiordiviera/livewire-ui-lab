<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

new class extends Component {
    use WithFileUploads;

    public int $dayNumber;

    // File Upload states
    #[Validate('nullable|mimes:jpg,jpeg,png,gif,webp,svg|max:2048')]
    public $photo;

    #[Validate('nullable|mimes:pdf,doc,docx|max:2048')]
    public $document;

    #[Validate('nullable')]
    public $photos = [];

    // Progress Bar state
    public int $manualProgress = 0;

    public function updatedPhoto()
    {
        $this->validate(['photo' => 'mimes:jpg,jpeg,png,gif,webp,svg|max:2048']);
    }

    public function updatedDocument()
    {
        $this->validate(['document' => 'mimes:pdf,doc,docx|max:2048']);
    }

    public function updatedPhotos()
    {
        $this->validate(['photos.*' => 'mimes:jpg,jpeg,png,gif,webp,svg|max:1024']);
    }

    public function simulateProgress()
    {
        $this->manualProgress = 0;
        for ($i = 0; $i <= 100; $i += 10) {
            $this->manualProgress = $i;
            usleep(100000); // 100ms delay
        }
    }
};
?>

<x-ui.day-container :dayNumber="$dayNumber" title="File Upload & Progress Bar"
    description="FilePond-style file upload with drag-and-drop, image previews, and real-time progress tracking">
    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Progress Bar Component Showcase -->
        <x-ui.day-section icon="bar-chart-3" title="Progress Bar"
            subtitle="Visual progress indicators with variants and sizes">
            <div class="space-y-6">
                <!-- Color Variants -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Color Variants</h3>
                    <x-ui.progress-bar :percentage="25" variant="primary" label="Primary Progress" size="md" />

                    <x-ui.progress-bar :percentage="50" variant="success" label="Success Progress" size="md" />

                    <x-ui.progress-bar :percentage="75" variant="warning" label="Warning Progress" size="md" />

                    <x-ui.progress-bar :percentage="90" variant="danger" label="Danger Progress" size="md" />

                    <x-ui.progress-bar :percentage="60" variant="info" label="Info Progress" size="md" />
                </div>

                <!-- Size Variations -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Size Variations</h3>
                    <x-ui.progress-bar :percentage="60" variant="primary" size="sm" label="Small" />
                    <x-ui.progress-bar :percentage="60" variant="primary" size="md" label="Medium" />
                    <x-ui.progress-bar :percentage="60" variant="primary" size="lg" label="Large" />
                    <x-ui.progress-bar :percentage="60" variant="primary" size="xl" label="Extra Large" />
                </div>

                <!-- Dynamic Progress -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Simulated Upload</h3>
                    <div class="p-6 bg-card border border-border rounded-lg">
                        <x-ui.progress-bar :percentage="$manualProgress" variant="info" label="Upload Progress"
                            size="lg" />

                        <button wire:click="simulateProgress" wire:loading.attr="disabled"
                            class="mt-4 px-4 py-2 bg-primary text-primary-foreground rounded-lg hover:opacity-90 transition-opacity disabled:opacity-50"
                            data-test="simulate-progress-btn">
                            <span wire:loading.remove>Start Simulation</span>
                            <span wire:loading>Processing...</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Features List -->
            <div class="pt-4 border-t border-border">
                <h3 class="text-sm font-semibold text-foreground mb-3">Features</h3>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>5 color variants</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>4 size options</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Smooth animations</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>ARIA accessible</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Optional labels</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Percentage display</span>
                    </div>
                </div>
            </div>
        </x-ui.day-section>

        <!-- File Upload Component Showcase -->
        <x-ui.day-section icon="upload-cloud" title="File Upload" subtitle="FilePond-style upload with drag-and-drop">
            <div class="space-y-6">
                <!-- Single Image Upload -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Single Image Upload</h3>
                    <x-ui.file-upload wire-model="photo" label="Upload Profile Photo" accept="image/*" max-size="2MB"
                        description="PNG, JPG, GIF up to 2MB" />

                    @if ($photo)
                        <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg"
                            data-test="photo-success">
                            <p class="text-sm text-green-800 dark:text-green-200">
                                ✓ Photo: <strong>{{ $photo->getClientOriginalName() }}</strong>
                                ({{ number_format($photo->getSize() / 1024, 2) }} KB)
                            </p>
                        </div>
                    @endif
                </div>

                <!-- Document Upload -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Document Upload</h3>
                    <x-ui.file-upload wire-model="document" label="Upload Document" accept=".pdf,.doc,.docx"
                        max-size="2MB" description="PDF or Word documents" />

                    @if ($document)
                        <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg"
                            data-test="document-success">
                            <p class="text-sm text-green-800 dark:text-green-200">
                                ✓ Document: <strong>{{ $document->getClientOriginalName() }}</strong>
                                ({{ number_format($document->getSize() / 1024, 2) }} KB)
                            </p>
                        </div>
                    @endif
                </div>

                <!-- Multiple Images Upload -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Multiple Images</h3>
                    <x-ui.file-upload wire-model="photos" label="Upload Multiple Photos" accept="image/*"
                        :multiple="true" max-size="1MB each" description="Multiple images (PNG, JPG, GIF)" />

                    @if (!empty($photos))
                        <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg"
                            data-test="photos-success">
                            <p class="text-sm text-green-800 dark:text-green-200 mb-2">
                                ✓ {{ count($photos) }} photo(s) uploaded
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Features List -->
            <div class="pt-4 border-t border-border">
                <h3 class="text-sm font-semibold text-foreground mb-3">Features</h3>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Drag & drop</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Image previews</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Real-time progress</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Multiple files</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>File filtering</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Validation</span>
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>

    <!-- Combined Usage Example -->
    <x-ui.day-section title="Combined Usage Example">
        <div class="bg-gradient-to-br from-primary/5 to-secondary/5 rounded-xl p-6 space-y-6">
            <h3 class="text-lg font-semibold text-foreground">Document Submission Form</h3>
            <p class="text-sm text-muted-foreground">
                Exemple typique pour une inscription administrative au Cameroun
            </p>

            <div class="grid md:grid-cols-2 gap-6">
                <x-ui.file-upload label="Carte Nationale d'Identité (CNI)" accept="image/*,.pdf" max-size="2MB"
                    description="Photo ou scan de votre CNI" />

                <x-ui.file-upload label="Acte de Naissance" accept="image/*,.pdf" max-size="2MB"
                    description="Copie légalisée de votre acte" />
            </div>

            <div>
                <x-ui.file-upload label="Documents Complémentaires" accept="image/*,.pdf" :multiple="true"
                    max-size="1MB each" description="Bulletins, certificats, attestations" />
            </div>

            <div class="pt-4">
                <h4 class="text-sm font-semibold text-foreground mb-3">Progression du téléchargement</h4>
                <x-ui.progress-bar :percentage="45" variant="success" label="Documents envoyés" size="lg" />
            </div>
        </div>
    </x-ui.day-section>

    <!-- Usage Examples Section -->
    {{-- <x-ui.day-section title="Usage Examples">
        <div class="space-y-4">
            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Progress Bar Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/progress-bar-usage.blade.md')" />
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">File Upload Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/file-upload-usage.blade.md')" />
                </div>
            </div>
        </div>
    </x-ui.day-section> --}}
</x-ui.day-container>