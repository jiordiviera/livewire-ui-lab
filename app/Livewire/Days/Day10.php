<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day10 extends Component
{
    public int $dayNumber = 10;

    // Navigation items for sidebar demo
    public array $navItems = [
        ['icon' => 'home', 'label' => 'Dashboard', 'href' => '#', 'active' => true],
        ['icon' => 'users', 'label' => 'Users', 'href' => '#', 'badge' => '12'],
        ['icon' => 'folder', 'label' => 'Projects', 'href' => '#'],
        ['icon' => 'calendar', 'label' => 'Calendar', 'href' => '#'],
        ['icon' => 'bar-chart-2', 'label' => 'Analytics', 'href' => '#'],
        ['icon' => 'settings', 'label' => 'Settings', 'href' => '#'],
    ];

    public function showToast(string $type, string $title, string $message): void
    {
        $this->dispatch('toast', [
            'type' => $type,
            'title' => $title,
            'message' => $message,
        ]);
    }

    public function showSuccessToast(): void
    {
        $this->showToast('success', 'Success!', 'Your changes have been saved successfully.');
    }

    public function showErrorToast(): void
    {
        $this->showToast('error', 'Error', 'Something went wrong. Please try again.');
    }

    public function showWarningToast(): void
    {
        $this->showToast('warning', 'Warning', 'Your session will expire in 5 minutes.');
    }

    public function showInfoToast(): void
    {
        $this->showToast('info', 'Information', 'A new update is available for download.');
    }

    public function render(): View
    {
        return view('livewire.days.day10');
    }
}
