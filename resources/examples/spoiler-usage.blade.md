```blade
{{-- Basic Spoiler --}}
<x-ui.spoiler title="Click to reveal">
    Hidden content here...
</x-ui.spoiler>

{{-- Spoiler with Variant --}}
<x-ui.spoiler
    title="Spoiler Alert!"
    variant="warning"
>
    The movie ending is revealed here.
</x-ui.spoiler>

{{-- Available Variants --}}
{{-- default, warning, info, success, danger --}}

{{-- Default Open --}}
<x-ui.spoiler
    title="Already Open"
    :default-open="true"
>
    This content is visible by default.
</x-ui.spoiler>

{{-- FAQ Accordion --}}
@php
$faqItems = [
    [
        'question' => 'How to install?',
        'answer' => 'Run composer require...'
    ],
    [
        'question' => 'Is it free?',
        'answer' => 'Yes, it is open source!'
    ],
];
@endphp

{{-- Single open at a time --}}
<x-ui.accordion
    :items="$faqItems"
    :multiple="false"
/>

{{-- Multiple sections open --}}
<x-ui.accordion
    :items="$faqItems"
    :multiple="true"
/>
```
