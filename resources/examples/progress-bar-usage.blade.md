```blade
{{-- Basic Progress Bar --}}
<x-ui.progress-bar
    :percentage="75"
    variant="primary"
    size="md"
/>

{{-- With Label --}}
<x-ui.progress-bar
    :percentage="50"
    variant="success"
    label="Upload Progress"
    size="md"
/>

{{-- Different Variants --}}
<x-ui.progress-bar :percentage="25" variant="primary" label="Primary" />
<x-ui.progress-bar :percentage="50" variant="success" label="Success" />
<x-ui.progress-bar :percentage="75" variant="warning" label="Warning" />
<x-ui.progress-bar :percentage="90" variant="danger" label="Danger" />
<x-ui.progress-bar :percentage="60" variant="info" label="Info" />

{{-- Different Sizes --}}
<x-ui.progress-bar :percentage="60" size="sm" label="Small" />
<x-ui.progress-bar :percentage="60" size="md" label="Medium" />
<x-ui.progress-bar :percentage="60" size="lg" label="Large" />
<x-ui.progress-bar :percentage="60" size="xl" label="Extra Large" />

{{-- Dynamic Progress with Livewire --}}
<x-ui.progress-bar
    :percentage="$uploadProgress"
    variant="info"
    label="Uploading..."
    size="lg"
/>
```

### Props

- `percentage` - Progress value (0-100)
- `variant` - Color variant: `primary`, `success`, `warning`, `danger`, `info`
- `size` - Height: `sm`, `md`, `lg`, `xl`
- `label` - Optional label text

### Features

- Smooth transitions with `transition-all duration-500`
- ARIA accessible with `role="progressbar"` and `aria-valuenow`
- Automatic percentage display when label is provided
- Responsive and works in dark mode
