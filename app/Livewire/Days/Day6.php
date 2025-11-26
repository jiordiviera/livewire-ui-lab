<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Day6 extends Component
{
    use WithFileUploads;

    public int $dayNumber;

    // File Upload states
    #[Validate('nullable|mimes:jpg,jpeg,png,gif,webp,svg|max:2048')]
    public $photo;

    #[Validate('nullable|mimes:pdf,doc,docx|max:2048')]
    public $document;

    #[Validate('nullable')]
    public $photos = [];

    // Progress Bar state
    public int $manualProgress = 0;

    public function updatedPhoto(): void
    {
        $this->validate(['photo' => 'mimes:jpg,jpeg,png,gif,webp,svg|max:2048']);
    }

    public function updatedDocument(): void
    {
        $this->validate(['document' => 'mimes:pdf,doc,docx|max:2048']);
    }

    public function updatedPhotos(): void
    {
        $this->validate(['photos.*' => 'mimes:jpg,jpeg,png,gif,webp,svg|max:1024']);
    }

    public function simulateProgress(): void
    {
        $this->manualProgress = 0;
        for ($i = 0; $i <= 100; $i += 10) {
            $this->manualProgress = $i;
            usleep(100000); // 100ms delay
        }
    }

    public function render(): View
    {
        return view('livewire.days.day6');
    }
}
