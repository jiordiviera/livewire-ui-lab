<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day12 extends Component
{
    public int $dayNumber = 12;

    public array $tags = [];

    public array $emails = [];

    public array $skills = [];

    public bool $hasData = true;

    public function updatedTags($value): void
    {
        $this->dispatch('toast', [
            'type' => 'success',
            'title' => 'Tags mis à jour',
            'message' => count($value).' tag(s) : '.implode(', ', $value),
        ]);
    }

    public function updatedEmails($value): void
    {
        $this->dispatch('toast', [
            'type' => 'info',
            'title' => 'Emails mis à jour',
            'message' => count($value).' email(s) ajouté(s)',
        ]);
    }

    public function toggleEmptyState(): void
    {
        $this->hasData = ! $this->hasData;
    }

    public function loadData(): void
    {
        $this->hasData = true;
        $this->dispatch('toast', [
            'type' => 'success',
            'title' => 'Données chargées',
            'message' => 'Les données ont été chargées avec succès',
        ]);
    }

    public function render(): View
    {
        return view('livewire.days.day12');
    }
}
