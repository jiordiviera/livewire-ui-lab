<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day11 extends Component
{
    public int $dayNumber = 11;

    // Date picker value
    public string $selectedDate = '';

    // Stats data
    public array $stats = [
        [
            'title' => 'Revenus Total',
            'value' => '2.450.000 FCFA',
            'icon' => 'wallet',
            'trend' => 'up',
            'trendValue' => '+12.5%',
            'trendLabel' => 'vs mois dernier',
            'variant' => 'primary',
        ],
        [
            'title' => 'Nouveaux Clients',
            'value' => '1,247',
            'icon' => 'users',
            'trend' => 'up',
            'trendValue' => '+8.2%',
            'trendLabel' => 'vs mois dernier',
            'variant' => 'success',
        ],
        [
            'title' => 'Commandes',
            'value' => '3,892',
            'icon' => 'shopping-cart',
            'trend' => 'down',
            'trendValue' => '-3.1%',
            'trendLabel' => 'vs mois dernier',
            'variant' => 'warning',
        ],
        [
            'title' => 'Taux de Conversion',
            'value' => '4.28%',
            'icon' => 'percent',
            'trend' => 'up',
            'trendValue' => '+0.5%',
            'trendLabel' => 'vs mois dernier',
            'variant' => 'default',
        ],
    ];

    public function updatedSelectedDate(string $value): void
    {
        $this->dispatch('toast', [
            'type' => 'info',
            'title' => 'Date sélectionnée',
            'message' => "Vous avez choisi : {$value}",
        ]);
    }

    public function render(): View
    {
        return view('livewire.days.day11');
    }
}
