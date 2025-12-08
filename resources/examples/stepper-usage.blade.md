```blade
{{-- Basic Stepper --}}
<x-ui.stepper
    :steps="['Step 1', 'Step 2', 'Step 3']"
    :currentStep="2"
/>

{{-- With Livewire Binding --}}
<x-ui.stepper
    wire:model.live="currentStep"
    :steps="$steps"
/>

{{-- With Descriptions & Icons --}}
<x-ui.stepper :steps="[
    ['label' => 'Account', 'description' => 'Create account', 'icon' => 'user'],
    ['label' => 'Profile', 'description' => 'Setup profile', 'icon' => 'settings'],
    ['label' => 'Done', 'description' => 'All set!', 'icon' => 'check'],
]" :currentStep="1" />

{{-- Vertical Layout --}}
<x-ui.stepper
    :steps="$steps"
    :currentStep="2"
    variant="vertical"
/>

{{-- Clickable Steps --}}
<x-ui.stepper
    wire:model.live="currentStep"
    :steps="$steps"
    :clickable="true"
/>

{{-- Size Variants --}}
<x-ui.stepper :steps="$steps" size="sm" />
<x-ui.stepper :steps="$steps" size="md" />
<x-ui.stepper :steps="$steps" size="lg" />

{{-- Without Numbers --}}
<x-ui.stepper
    :steps="$steps"
    :showNumbers="false"
/>
```
