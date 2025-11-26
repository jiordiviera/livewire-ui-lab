
<x-ui.day-container
    :dayNumber="$dayNumber"
    title="Button Component Showcase"
    description="Complete button system with variants, sizes, icons, and loading states"
>

    <!-- Variants -->
    <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-foreground">Button Variants</h2>
        <div class="flex flex-wrap gap-4">
            <x-ui.button variant="primary">Primary</x-ui.button>
            <x-ui.button variant="secondary">Secondary</x-ui.button>
            <x-ui.button variant="destructive">Destructive</x-ui.button>
            <x-ui.button variant="outline">Outline</x-ui.button>
            <x-ui.button variant="ghost">Ghost</x-ui.button>
            <x-ui.button variant="link">Link</x-ui.button>
        </div>
    </section>

    <!-- Sizes -->
    <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-foreground">Button Sizes</h2>
        <div class="flex flex-wrap items-center gap-4">
            <x-ui.button size="xs">Extra Small</x-ui.button>
            <x-ui.button size="sm">Small</x-ui.button>
            <x-ui.button size="md">Medium</x-ui.button>
            <x-ui.button size="lg">Large</x-ui.button>
            <x-ui.button size="xl">Extra Large</x-ui.button>
        </div>
    </section>

    <!-- Icons Left -->
    <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-foreground">Buttons with Left Icons</h2>
        <div class="flex flex-wrap gap-4">
            <x-ui.button icon="mail">Send Email</x-ui.button>
            <x-ui.button icon="download" variant="secondary">Download</x-ui.button>
            <x-ui.button icon="trash" variant="destructive">Delete</x-ui.button>
            <x-ui.button icon="settings" variant="outline">Settings</x-ui.button>
            <x-ui.button icon="user-plus" variant="ghost">Add User</x-ui.button>
        </div>
    </section>

    <!-- Icons Right -->
    <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-foreground">Buttons with Right Icons</h2>
        <div class="flex flex-wrap gap-4">
            <x-ui.button icon-right="arrow-right">Continue</x-ui.button>
            <x-ui.button icon-right="external-link" variant="secondary">Open Link</x-ui.button>
            <x-ui.button icon-right="chevron-down" variant="outline">Dropdown</x-ui.button>
            <x-ui.button icon-right="log-in" variant="ghost">Login</x-ui.button>
        </div>
    </section>

    <!-- Icon Only Buttons -->
    <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-foreground">Icon Only Buttons</h2>

        <div class="space-y-4">
            <div>
                <p class="text-sm text-muted-foreground mb-3">Different Variants</p>
                <div class="flex flex-wrap gap-3">
                    <x-ui.button icon="heart" :icon-only="true" variant="primary" title="Like" />
                    <x-ui.button icon="share-2" :icon-only="true" variant="secondary" title="Share" />
                    <x-ui.button icon="trash-2" :icon-only="true" variant="destructive" title="Delete" />
                    <x-ui.button icon="edit" :icon-only="true" variant="outline" title="Edit" />
                    <x-ui.button icon="more-vertical" :icon-only="true" variant="ghost" title="More" />
                </div>
            </div>

            <div>
                <p class="text-sm text-muted-foreground mb-3">Different Sizes</p>
                <div class="flex flex-wrap items-center gap-3">
                    <x-ui.button icon="star" :icon-only="true" size="xs" title="Star (xs)" />
                    <x-ui.button icon="star" :icon-only="true" size="sm" title="Star (sm)" />
                    <x-ui.button icon="star" :icon-only="true" size="md" title="Star (md)" />
                    <x-ui.button icon="star" :icon-only="true" size="lg" title="Star (lg)" />
                    <x-ui.button icon="star" :icon-only="true" size="xl" title="Star (xl)" />
                </div>
            </div>
        </div>
    </section>

    <!-- Pill Buttons -->
    <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-foreground">Pill Buttons (Rounded Full)</h2>
        <div class="flex flex-wrap gap-4">
            <x-ui.button :pill="true">Pill Button</x-ui.button>
            <x-ui.button icon="message-circle" :pill="true" variant="secondary">Chat</x-ui.button>
            <x-ui.button icon="bell" :icon-only="true" :pill="true" variant="outline" title="Notifications" />
            <x-ui.button icon-right="arrow-right" :pill="true" variant="ghost">Next</x-ui.button>
        </div>
    </section>

    <!-- Loading States -->
    <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-foreground">Loading States</h2>
        <div class="flex flex-wrap gap-4">
            <x-ui.button :loading="true">Loading</x-ui.button>
            <x-ui.button :loading="true" variant="secondary">Processing</x-ui.button>
            <x-ui.button :loading="true" variant="destructive">Deleting</x-ui.button>
            <x-ui.button :loading="true" :icon-only="true" variant="outline" title="Loading" />
            <x-ui.button :loading="$loading" action="handleClick" wire:click="handleClick">
                Click to Load
            </x-ui.button>
        </div>
    </section>

    <!-- Livewire Integration -->
    <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-foreground">Livewire Integration (wire:loading)</h2>
        <p class="text-sm text-muted-foreground">Click buttons to see automatic loading states with wire:target</p>
        <div class="flex flex-wrap gap-4">
            <x-ui.button action="handleClick" wire:click="handleClick">
                Auto Loading
            </x-ui.button>
            <x-ui.button action="handleClick" wire:click="handleClick" icon="save" variant="secondary">
                Save with Icon
            </x-ui.button>
            <x-ui.button action="handleClick" wire:click="handleClick" icon-right="arrow-right" variant="outline">
                Next Step
            </x-ui.button>
            <x-ui.button action="handleClick" wire:click="handleClick" icon="heart" :icon-only="true"
                         variant="ghost" title="Like" />
        </div>
    </section>

    <!-- Disabled States -->
    <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-foreground">Disabled States</h2>
        <div class="flex flex-wrap gap-4">
            <x-ui.button :disabled="true">Disabled Primary</x-ui.button>
            <x-ui.button :disabled="true" variant="secondary">Disabled Secondary</x-ui.button>
            <x-ui.button :disabled="true" variant="destructive">Disabled Destructive</x-ui.button>
            <x-ui.button :disabled="true" variant="outline">Disabled Outline</x-ui.button>
            <x-ui.button :disabled="true" icon="lock">Disabled with Icon</x-ui.button>
        </div>
    </section>

    <!-- Block Buttons -->
    <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-foreground">Block Buttons (Full Width)</h2>
        <div class="space-y-3">
            <x-ui.button :block="true">Full Width Primary</x-ui.button>
            <x-ui.button :block="true" variant="secondary" icon="download">Full Width with Icon</x-ui.button>
            <x-ui.button :block="true" variant="outline" icon-right="arrow-right">Full Width with Right
                Icon</x-ui.button>
        </div>
    </section>

    <!-- Button Groups -->
    <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-foreground">Button Groups</h2>

        <div class="space-y-6">
            <div>
                <p class="text-sm text-muted-foreground mb-3">Text Formatting</p>
                <div class="inline-flex rounded-lg shadow-sm" role="group">
                    <x-ui.button variant="outline" class="rounded-r-none border-r-0">
                        Bold
                    </x-ui.button>
                    <x-ui.button variant="outline" class="rounded-none border-r-0">
                        Italic
                    </x-ui.button>
                    <x-ui.button variant="outline" class="rounded-l-none">
                        Underline
                    </x-ui.button>
                </div>
            </div>

            <div>
                <p class="text-sm text-muted-foreground mb-3">Text Alignment</p>
                <div class="inline-flex rounded-lg shadow-sm" role="group">
                    <x-ui.button icon="align-left" :icon-only="true" variant="outline"
                                 class="rounded-r-none border-r-0" title="Align Left" />
                    <x-ui.button icon="align-center" :icon-only="true" variant="outline"
                                 class="rounded-none border-r-0" title="Align Center" />
                    <x-ui.button icon="align-right" :icon-only="true" variant="outline" class="rounded-l-none"
                                 title="Align Right" />
                </div>
            </div>

            <div>
                <p class="text-sm text-muted-foreground mb-3">Pagination</p>
                <div class="inline-flex rounded-lg shadow-sm" role="group">
                    <x-ui.button icon="chevron-left" :icon-only="true" variant="outline"
                                 class="rounded-r-none border-r-0" title="Previous" />
                    <x-ui.button variant="outline" class="rounded-none border-r-0">1</x-ui.button>
                    <x-ui.button variant="primary" class="rounded-none border-r-0">2</x-ui.button>
                    <x-ui.button variant="outline" class="rounded-none border-r-0">3</x-ui.button>
                    <x-ui.button icon="chevron-right" :icon-only="true" variant="outline" class="rounded-l-none"
                                 title="Next" />
                </div>
            </div>
        </div>
    </section>

    <!-- Buttons as Links -->
    <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-foreground">Buttons as Links</h2>
        <div class="flex flex-wrap gap-4">
            <x-ui.button href="https://laravel.com" target="_blank">Laravel Docs</x-ui.button>
            <x-ui.button href="https://livewire.laravel.com" variant="secondary" icon="zap" target="_blank">
                Livewire Docs
            </x-ui.button>
            <x-ui.button href="https://tailwindcss.com" variant="outline" icon-right="external-link"
                         target="_blank">
                Tailwind CSS
            </x-ui.button>
            <x-ui.button href="#" variant="link">Simple Link</x-ui.button>
        </div>
    </section>

    <!-- Real World Examples -->
    <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-foreground">Real World Examples</h2>

        <div class="space-y-6">
            <!-- Form Actions -->
            <div class="p-6 bg-muted/30 rounded-lg space-y-4">
                <h3 class="font-semibold text-foreground">Form Actions</h3>
                <div class="flex gap-3">
                    <x-ui.button type="submit" icon="check">Save Changes</x-ui.button>
                    <x-ui.button type="button" variant="outline">Cancel</x-ui.button>
                    <x-ui.button type="reset" variant="ghost">Reset</x-ui.button>
                </div>
            </div>

            <!-- Alert/Notification -->
            <div class="p-6 bg-muted/30 rounded-lg space-y-4">
                <h3 class="font-semibold text-foreground">Alert with Actions</h3>
                <div class="flex items-center justify-between">
                    <p class="text-sm text-muted-foreground">Product successfully added to cart</p>
                    <div class="flex gap-2">
                        <x-ui.button size="sm" icon="shopping-cart">View Cart</x-ui.button>
                        <x-ui.button size="sm" variant="outline">Continue Shopping</x-ui.button>
                    </div>
                </div>
            </div>

            <!-- Toolbar -->
            <div class="p-6 bg-muted/30 rounded-lg space-y-4">
                <h3 class="font-semibold text-foreground">Editor Toolbar</h3>
                <div class="flex items-center gap-2 flex-wrap">
                    <x-ui.button icon="file-plus" size="sm" variant="outline">New</x-ui.button>
                    <x-ui.button icon="folder-open" size="sm" variant="outline">Open</x-ui.button>
                    <x-ui.button icon="save" size="sm" variant="outline">Save</x-ui.button>
                    <div class="w-px h-6 bg-border mx-1"></div>
                    <x-ui.button icon="undo" :icon-only="true" size="sm" variant="ghost" title="Undo" />
                    <x-ui.button icon="redo" :icon-only="true" size="sm" variant="ghost" title="Redo" />
                    <div class="w-px h-6 bg-border mx-1"></div>
                    <x-ui.button icon="printer" :icon-only="true" size="sm" variant="ghost" title="Print" />
                    <x-ui.button icon="share-2" :icon-only="true" size="sm" variant="ghost" title="Share" />
                </div>
            </div>

            <!-- Social Media Card -->
            <div class="p-6 bg-muted/30 rounded-lg space-y-4">
                <h3 class="font-semibold text-foreground">Social Actions</h3>
                <div class="flex gap-2">
                    <x-ui.button icon="heart" :icon-only="true" variant="ghost" :pill="true" title="Like" />
                    <x-ui.button icon="message-circle" :icon-only="true" variant="ghost" :pill="true"
                                 title="Comment" />
                    <x-ui.button icon="repeat" :icon-only="true" variant="ghost" :pill="true" title="Repost" />
                    <x-ui.button icon="bookmark" :icon-only="true" variant="ghost" :pill="true" title="Save" />
                    <x-ui.button icon="share" :icon-only="true" variant="ghost" :pill="true" title="Share" />
                </div>
            </div>

            <!-- Call to Action -->
            <div class="p-6 bg-muted/30 rounded-lg space-y-4">
                <h3 class="font-semibold text-foreground">Call to Action</h3>
                <div class="flex flex-col sm:flex-row gap-3">
                    <x-ui.button size="lg" icon-right="arrow-right" :block="true" class="sm:flex-1">
                        Get Started Free
                    </x-ui.button>
                    <x-ui.button size="lg" variant="outline" icon="video" :block="true" class="sm:flex-1">
                        Watch Demo
                    </x-ui.button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <div class="text-center text-sm text-muted-foreground pt-8 border-t border-border">
        <p>Built with Livewire v4, Tailwind CSS & Lucide Icons</p>
        <p class="mt-2">Day 2 - Reusable Button Component 🚀</p>
    </div>
</x-ui.day-container>
