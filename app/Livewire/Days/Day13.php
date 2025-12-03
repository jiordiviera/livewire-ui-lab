<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day13 extends Component
{
    public int $dayNumber = 13;

    public $volume = 50;
    public $price = [25, 75];
    public $temperature = 20;

    public $rating = 0;
    public $productRating = 4.5;
    public $serviceRating = 3;

    public function updatedVolume($value): void
    {
        $this->dispatch('toast', [
            'type' => 'info',
            'title' => 'Volume updated',
            'message' => "Volume set to {$value}%"
        ]);
    }

    public function updatedPrice($value): void
    {
        $this->dispatch('toast', [
            'type' => 'success',
            'title' => 'Price range updated',
            'message' => "Range: {$value[0]} - {$value[1]} FCFA"
        ]);
    }

    public function updatedRating($value): void
    {
        $this->dispatch('toast', [
            'type' => 'success',
            'title' => 'Rating submitted',
            'message' => "You rated {$value} stars"
        ]);
    }

    public function render(): View
    {
        return view('livewire.days.day13');
    }
}
