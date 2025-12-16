<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day14 extends Component
{
    public int $dayNumber = 14;

    public string $activeTab = 'all';

    public array $carouselImages = [
        [
            'src' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=450&fit=crop',
            'alt' => 'Mountain landscape',
            'caption' => 'Beautiful mountain landscape at sunset',
        ],
        [
            'src' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=800&h=450&fit=crop',
            'alt' => 'Nature scenery',
            'caption' => 'Serene nature view with lake',
        ],
        [
            'src' => 'https://images.unsplash.com/photo-1426604966848-d7adac402bff?w=800&h=450&fit=crop',
            'alt' => 'Forest path',
            'caption' => 'Misty forest path in autumn',
        ],
        [
            'src' => 'https://images.unsplash.com/photo-1472214103451-9374bd1c798e?w=800&h=450&fit=crop',
            'alt' => 'Green valley',
            'caption' => 'Lush green valley panorama',
        ],
    ];

    public array $tabs = [
        'all' => ['label' => 'All Items', 'icon' => 'layout-grid', 'badge' => 24],
        'photos' => ['label' => 'Photos', 'icon' => 'image', 'badge' => 12],
        'videos' => ['label' => 'Videos', 'icon' => 'video', 'badge' => 8],
        'documents' => ['label' => 'Documents', 'icon' => 'file-text', 'badge' => 4],
        'archived' => ['label' => 'Archived', 'icon' => 'archive'],
        'favorites' => ['label' => 'Favorites', 'icon' => 'heart'],
        'shared' => ['label' => 'Shared', 'icon' => 'share-2'],
        'trash' => ['label' => 'Trash', 'icon' => 'trash-2'],
    ];

    public function updatedActiveTab($value): void
    {
        $label = $this->tabs[$value]['label'] ?? $value;
        $this->dispatch('toast', [
            'type' => 'info',
            'title' => 'Tab changed',
            'message' => "Viewing: {$label}",
        ]);
    }

    public function render(): View
    {
        return view('livewire.days.day14');
    }
}
