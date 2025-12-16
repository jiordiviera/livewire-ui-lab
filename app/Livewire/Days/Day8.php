<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day8 extends Component
{
    public int $dayNumber;

    public bool $isLoading = true;

    // Sample users for avatar examples (Cameroonian names)
    public function getAvatarsProperty(): array
    {
        return [
            ['name' => 'Ngono Marie', 'src' => 'https://i.pravatar.cc/150?img=1', 'status' => 'online'],
            ['name' => 'Mbarga Paul', 'src' => 'https://i.pravatar.cc/150?img=2', 'status' => 'offline'],
            ['name' => 'Fotso Jean', 'src' => 'https://i.pravatar.cc/150?img=3', 'status' => 'busy'],
            ['name' => 'Nkeng Carine', 'src' => 'https://i.pravatar.cc/150?img=4', 'status' => 'away'],
            ['name' => 'Tchinda Roger', 'src' => 'https://i.pravatar.cc/150?img=5', 'status' => 'online'],
            ['name' => 'Biya Sandrine', 'src' => 'https://i.pravatar.cc/150?img=6'],
            ['name' => 'Kamga Alain', 'src' => 'https://i.pravatar.cc/150?img=7'],
            ['name' => 'Eyenga Rose', 'src' => 'https://i.pravatar.cc/150?img=8'],
        ];
    }

    public function toggleLoading(): void
    {
        $this->isLoading = ! $this->isLoading;
    }

    public function render(): View
    {
        return view('livewire.days.day8');
    }
}
