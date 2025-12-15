```blade
{{-- Basic Progress Steps --}}
<x-ui.progress-steps
    :steps="$steps"
    :current="$currentStep"
/>

{{-- Steps Array Structure --}}
@php
$steps = [
    ['label' => 'Step 1', 'description' => 'Details'],
    ['label' => 'Step 2', 'description' => 'More info'],
    ['label' => 'Step 3'],
];
@endphp

{{-- With Icons --}}
@php
$steps = [
    ['label' => 'Cart', 'icon' => 'shopping-cart'],
    ['label' => 'Shipping', 'icon' => 'truck'],
    ['label' => 'Payment', 'icon' => 'credit-card'],
    ['label' => 'Done', 'icon' => 'check-circle'],
];
@endphp

{{-- Variants --}}
<x-ui.progress-steps
    :steps="$steps"
    :current="2"
    variant="success"
/>
{{-- Available: default, success, blue --}}

{{-- Sizes --}}
<x-ui.progress-steps
    :steps="$steps"
    :current="2"
    size="sm"
/>
{{-- Available: sm, md, lg --}}

{{-- Without Descriptions --}}
<x-ui.progress-steps
    :steps="$steps"
    :current="2"
    :show-descriptions="false"
/>

{{-- Clickable Steps --}}
<x-ui.progress-steps
    :steps="$steps"
    :current="2"
    :clickable="true"
/>
```
