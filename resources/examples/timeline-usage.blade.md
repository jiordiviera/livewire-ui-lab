```blade
{{-- Basic Vertical Timeline --}}
<x-ui.timeline
    :items="$events"
    variant="vertical"
/>

{{-- Horizontal Timeline --}}
<x-ui.timeline
    :items="$events"
    variant="horizontal"
    size="sm"
/>

{{-- Alternating Timeline --}}
<x-ui.timeline
    :items="$events"
    variant="vertical"
    :alternating="true"
/>

{{-- Timeline Data Structure --}}
@php
$events = [
    [
        'title' => 'Project Started',
        'description' => 'Initial commit',
        'date' => '2024-01-15',
        'time' => '09:00',
        'type' => 'create', // create, release,
                            // fix, feature,
                            // milestone, error
        'user' => 'Jiordi',
    ],
    [
        'title' => 'First Release',
        'description' => 'Version 1.0.0',
        'date' => '2024-02-01',
        'type' => 'release',
    ],
];
@endphp

{{-- Different Sizes --}}
<x-ui.timeline :items="$events" size="sm" />
<x-ui.timeline :items="$events" size="md" />
<x-ui.timeline :items="$events" size="lg" />

{{-- Line Styles --}}
<x-ui.timeline
    :items="$events"
    lineStyle="solid"
/>
<x-ui.timeline
    :items="$events"
    lineStyle="dashed"
/>

{{-- Without Animation --}}
<x-ui.timeline
    :items="$events"
    :animated="false"
/>
```
