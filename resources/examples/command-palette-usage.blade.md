```blade
{{-- In your Livewire component --}}
public bool $showCommandPalette = false;
public string $searchQuery = '';
public array $filteredResults = [];

public function openCommandPalette(): void
{
    $this->showCommandPalette = true;
}

public function closeCommandPalette(): void
{
    $this->showCommandPalette = false;
}

{{-- In your Blade view --}}
<x-ui.command-palette
    placeholder="Search..."
>
    {{-- Results content --}}
    @foreach($filteredResults as $result)
        <button wire:click="selectResult(...)">
            {{ $result['title'] }}
        </button>
    @endforeach
</x-ui.command-palette>

{{-- Keyboard shortcut opens modal --}}
{{-- Cmd+K / Ctrl+K --}}

{{-- Live search with debounce --}}
wire:model.live.debounce.150ms="searchQuery"
```
