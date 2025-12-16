<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day4 extends Component
{
    public int $dayNumber;

    // Dropdown state
    public string $country = '';

    public string $city = '';

    public string $framework = 'laravel';

    // Toggle states
    public bool $notifications = true;

    public bool $darkMode = false;

    public bool $autoSave = true;

    public bool $twoFactor = false;

    // Dropdown options
    public function getCountryOptionsProperty(): array
    {
        return [
            ['value' => 'cm', 'label' => 'Cameroon'],
            ['value' => 'ng', 'label' => 'Nigeria'],
            ['value' => 'gh', 'label' => 'Ghana'],
            ['value' => 'ke', 'label' => 'Kenya'],
            ['value' => 'za', 'label' => 'South Africa'],
            ['value' => 'tz', 'label' => 'Tanzania'],
            ['value' => 'ug', 'label' => 'Uganda'],
            ['value' => 'rw', 'label' => 'Rwanda'],
        ];
    }

    public function getCityOptionsProperty(): array
    {
        return [
            ['value' => 'yde', 'label' => 'Yaoundé'],
            ['value' => 'dla', 'label' => 'Douala'],
            ['value' => 'baf', 'label' => 'Bafoussam'],
            ['value' => 'nga', 'label' => 'Ngaoundéré'],
            ['value' => 'gra', 'label' => 'Garoua'],
            ['value' => 'mra', 'label' => 'Maroua'],
            ['value' => 'bam', 'label' => 'Bamenda'],
            ['value' => 'lbe', 'label' => 'Limbé'],
        ];
    }

    public function getFrameworkOptionsProperty(): array
    {
        return [
            ['value' => 'laravel', 'label' => 'Laravel'],
            ['value' => 'symfony', 'label' => 'Symfony'],
            ['value' => 'rails', 'label' => 'Ruby on Rails'],
            ['value' => 'django', 'label' => 'Django'],
            ['value' => 'express', 'label' => 'Express.js'],
            ['value' => 'nestjs', 'label' => 'NestJS'],
            ['value' => 'spring', 'label' => 'Spring Boot'],
            ['value' => 'fastapi', 'label' => 'FastAPI'],
        ];
    }

    public function render(): View
    {
        return view('livewire.days.day4');
    }
}
