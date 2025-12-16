<?php

namespace App\Livewire\Days;

use Livewire\Component;

class Day1 extends Component
{
    public int $dayNumber;

    public string $email = '';

    public string $username = '';

    public string $password = '';

    public string $search = '';

    public string $website = '';

    public string $phone = '';

    public function render()
    {
        return view('livewire.days.day1');
    }
}
