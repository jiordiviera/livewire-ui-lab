<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day5 extends Component
{
    public int $dayNumber;

    public function render(): View
    {
        return view('livewire.days.day5');
    }
}
