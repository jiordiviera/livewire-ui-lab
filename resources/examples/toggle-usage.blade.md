```blade
{{-- Basic Toggle --}}
<x-ui.toggle
    name="notifications"
    :checked="$notifications"
    label="Push Notifications"
    description="Receive notifications about account activity"
/>

{{-- Small Size --}}
<x-ui.toggle
    name="darkMode"
    :checked="$darkMode"
    label="Dark Mode"
    size="sm"
/>

{{-- Large Size --}}
<x-ui.toggle
    name="twoFactor"
    :checked="$twoFactor"
    label="Two-Factor Authentication"
    description="Add an extra layer of security"
    size="lg"
    required
/>

{{-- Disabled State --}}
<x-ui.toggle
    label="Beta Features"
    description="This option is not available yet"
    :disabled="true"
/>

{{-- Without Label (Icon Only) --}}
<x-ui.toggle name="compact" :checked="true" />
```

### Keyboard Navigation

- **Space**: Toggle on/off
- **Enter**: Toggle on/off

### Props

- `name` - Input name for form submission
- `checked` - Boolean checked state
- `value` - Alternative to checked
- `label` - Toggle label
- `description` - Help text below label
- `size` - Size variant: `sm`, `md` (default), `lg`
- `disabled` - Disable the toggle
- `required` - Mark as required

### Sizes

- **sm**: Compact switch (h-5 w-9)
- **md**: Default switch (h-6 w-11)
- **lg**: Large switch (h-8 w-14)
