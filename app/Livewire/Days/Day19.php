<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day19 extends Component
{
    public int $dayNumber = 19;

    // Context menu items
    public array $fileContextMenu = [];

    public array $textContextMenu = [];

    // Spoiler/Accordion content
    public array $faqItems = [];

    public array $spoilerExamples = [];

    public function mount(): void
    {
        $this->fileContextMenu = [
            ['icon' => 'eye', 'label' => 'Preview', 'action' => 'preview', 'shortcut' => 'Space'],
            ['icon' => 'pencil', 'label' => 'Rename', 'action' => 'rename', 'shortcut' => 'F2'],
            ['icon' => 'copy', 'label' => 'Copy', 'action' => 'copy', 'shortcut' => 'Ctrl+C'],
            ['icon' => 'scissors', 'label' => 'Cut', 'action' => 'cut', 'shortcut' => 'Ctrl+X'],
            ['type' => 'separator'],
            ['icon' => 'folder', 'label' => 'Move to...', 'action' => 'move'],
            ['icon' => 'share-2', 'label' => 'Share', 'action' => 'share', 'children' => [
                ['icon' => 'link', 'label' => 'Copy link', 'action' => 'copy-link'],
                ['icon' => 'mail', 'label' => 'Send by email', 'action' => 'email'],
                ['icon' => 'download', 'label' => 'Download', 'action' => 'download'],
            ]],
            ['type' => 'separator'],
            ['icon' => 'trash-2', 'label' => 'Delete', 'action' => 'delete', 'variant' => 'danger', 'shortcut' => 'Del'],
        ];

        $this->textContextMenu = [
            ['icon' => 'copy', 'label' => 'Copy', 'action' => 'copy'],
            ['icon' => 'clipboard', 'label' => 'Paste', 'action' => 'paste'],
            ['type' => 'separator'],
            ['icon' => 'bold', 'label' => 'Bold', 'action' => 'bold', 'shortcut' => 'Ctrl+B'],
            ['icon' => 'italic', 'label' => 'Italic', 'action' => 'italic', 'shortcut' => 'Ctrl+I'],
            ['icon' => 'underline', 'label' => 'Underline', 'action' => 'underline', 'shortcut' => 'Ctrl+U'],
            ['type' => 'separator'],
            ['icon' => 'search', 'label' => 'Search on Google', 'action' => 'google'],
        ];

        $this->faqItems = [
            [
                'question' => 'How to install Livewire?',
                'answer' => 'Install Livewire via Composer with the command: `composer require livewire/livewire`. Then, include the @livewireStyles and @livewireScripts directives in your Blade layout.',
            ],
            [
                'question' => 'What is the difference between Livewire and Alpine.js?',
                'answer' => 'Livewire handles server-side logic with PHP and synchronizes state via AJAX, while Alpine.js is a lightweight JavaScript framework for client-side interactions. They complement each other perfectly!',
            ],
            [
                'question' => 'Can you use Livewire with Inertia.js?',
                'answer' => 'Technically yes, but it is not recommended as they have different philosophies. Livewire uses partial AJAX requests, Inertia replaces the entire page. Choose one or the other based on your needs.',
            ],
            [
                'question' => 'How to optimize Livewire performance?',
                'answer' => 'Use wire:model.lazy to reduce requests, implement pagination, use Laravel cache, and enable wire:loading to improve UX during loading.',
            ],
        ];

        $this->spoilerExamples = [
            [
                'title' => 'Spoiler Alert: Movie Ending',
                'content' => 'The hero saves the world at the last second thanks to friendship and the power of love. Plot twist: the villain was his father all along!',
                'variant' => 'warning',
            ],
            [
                'title' => 'Puzzle Solution',
                'content' => 'The answer is 42. But the real treasure is the journey taken to find that answer.',
                'variant' => 'info',
            ],
            [
                'title' => 'Secret Code',
                'content' => 'Here is the code: CAMEROON2024. Use it to unlock the bonus level!',
                'variant' => 'success',
            ],
        ];
    }

    public function handleContextAction(string $action): void
    {
        $this->dispatch('toast', [
            'message' => "Action executed: {$action}",
            'type' => 'info',
        ]);
    }

    public function render(): View
    {
        return view('livewire.days.day19');
    }
}
