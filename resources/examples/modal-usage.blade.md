```blade
<!-- Trigger -->
<x-ui.button x-on:click="$dispatch('open-modal-example')">
    Open Modal
</x-ui.button>

<!-- Modal -->
<x-ui.modal id="example" size="md" title="Example Modal">
    <p class="text-muted-foreground">
        This is a modal dialog with Alpine.js state management.
    </p>

    <x-slot:footer>
        <div class="flex items-center justify-end gap-2">
            <x-ui.button
                variant="ghost"
                x-on:click="$dispatch('close-modal-example')"
            >
                Cancel
            </x-ui.button>
            <x-ui.button
                variant="primary"
                x-on:click="$dispatch('close-modal-example')"
            >
                Confirm
            </x-ui.button>
        </div>
    </x-slot:footer>
</x-ui.modal>
```
