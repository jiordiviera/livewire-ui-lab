```blade
{{-- Contribution Calendar (GitHub-style) --}}
<x-ui.heatmap
    :data="$contributionData"
    variant="github"
/>

{{-- Data Structure --}}
@php
$data = [
    [
        'date' => '2025-01-01',
        'count' => 5,
        'dayOfWeek' => 3,
        'week' => 1,
        'month' => 'Jan',
        'monthNum' => 1,
    ],
    // ... 365 days
];
@endphp

{{-- Color Variants --}}
<x-ui.heatmap
    :data="$data"
    variant="blue"
/>
{{-- Available: github, blue, purple, orange --}}

{{-- Cell Sizes --}}
<x-ui.heatmap
    :data="$data"
    cell-size="md"
/>
{{-- Available: xs, sm, md --}}

{{-- Activity Heatmap (Hours x Days) --}}
<x-ui.activity-heatmap
    :data="$activityData"
    variant="blue"
/>

{{-- Activity Data Structure --}}
@php
$activityData = [
    'Mon' => [0, 1, 2, ...], // 24 values
    'Tue' => [0, 5, 3, ...],
    // ... 7 days
];
@endphp
```
