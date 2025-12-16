<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day16 extends Component
{
    public int $dayNumber = 16;

    // Stepper state
    public int $currentStep = 1;

    public int $totalSteps = 4;

    // Form data for stepper demo
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $address = '';

    public string $city = '';

    public string $paymentMethod = 'card';

    // Progress ring values
    public int $profileProgress = 75;

    public int $storageUsed = 45;

    public int $tasksCompleted = 8;

    public int $totalTasks = 12;

    public array $steps = [
        ['label' => 'Personal Info', 'description' => 'Your basic details', 'icon' => 'user'],
        ['label' => 'Contact', 'description' => 'How to reach you', 'icon' => 'phone'],
        ['label' => 'Address', 'description' => 'Delivery location', 'icon' => 'map-pin'],
        ['label' => 'Payment', 'description' => 'Complete order', 'icon' => 'credit-card'],
    ];

    protected array $stepValidation = [
        1 => ['name', 'email'],
        2 => ['phone'],
        3 => ['address', 'city'],
        4 => ['paymentMethod'],
    ];

    public function nextStep(): void
    {
        if ($this->validateCurrentStep()) {
            if ($this->currentStep < $this->totalSteps) {
                $this->currentStep++;
                $this->dispatch('toast', [
                    'message' => "Step {$this->currentStep} of {$this->totalSteps}",
                    'type' => 'info',
                ]);
            }
        }
    }

    public function previousStep(): void
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function goToStep(int $step): void
    {
        if ($step >= 1 && $step <= $this->currentStep) {
            $this->currentStep = $step;
        }
    }

    public function completeWizard(): void
    {
        if ($this->validateCurrentStep()) {
            $this->dispatch('toast', [
                'message' => 'Order completed successfully!',
                'type' => 'success',
            ]);
            $this->reset(['name', 'email', 'phone', 'address', 'city', 'paymentMethod']);
            $this->currentStep = 1;
        }
    }

    protected function validateCurrentStep(): bool
    {
        $fields = $this->stepValidation[$this->currentStep] ?? [];

        $rules = [];
        foreach ($fields as $field) {
            $rules[$field] = match ($field) {
                'email' => 'required|email',
                'phone' => 'required|min:8',
                default => 'required|min:2',
            };
        }

        if (empty($rules)) {
            return true;
        }

        $this->validate($rules);

        return true;
    }

    public function incrementProgress(): void
    {
        $this->profileProgress = min(100, $this->profileProgress + 10);
    }

    public function decrementProgress(): void
    {
        $this->profileProgress = max(0, $this->profileProgress - 10);
    }

    public function render(): View
    {
        return view('livewire.days.day16');
    }
}
