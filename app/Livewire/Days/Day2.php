<?php

namespace App\Livewire\Days;

use Livewire\Component;

class Day2 extends Component
{
    public int $dayNumber;

    public bool $loading = false;

    public function handleClick(): void
    {
        $this->loading = true;
        sleep(2); // Simulate API call
        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.days.day2');
    }
}
