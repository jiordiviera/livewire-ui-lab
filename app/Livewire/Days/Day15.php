<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day15 extends Component
{
    public int $dayNumber = 15;
    public string $selectedColor = '#3b82f6';
    public string $themeColor = '#22c55e';

    public function updatedSelectedColor($value): void
    {
        $this->dispatch('toast', [
            'message' => "Color changed to {$value}",
            'type' => 'info',
        ]);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.days.day15');
    }
}
