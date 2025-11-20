```blade
{{-- Basic Dropdown --}}
<x-ui.dropdown
    name="country"
    label="Select Country"
    placeholder="Choose a country"
    :options="[
        ['value' => 'cm', 'label' => 'Cameroon'],
        ['value' => 'ng', 'label' => 'Nigeria'],
        ['value' => 'gh', 'label' => 'Ghana'],
    ]"
    :value="$country"
    required
/>

{{-- Searchable Dropdown --}}
<x-ui.dropdown
    name="city"
    label="Select City"
    placeholder="Choose a city"
    :options="$cityOptions"
    :value="$city"
    :searchable="true"
/>

{{-- Dropdown with Error --}}
<x-ui.dropdown
    name="framework"
    label="Framework"
    :options="$frameworks"
    error="This field is required"
/>

{{-- Disabled Dropdown --}}
<x-ui.dropdown
    label="Status"
    :options="$statuses"
    :disabled="true"
/>
```

### Keyboard Navigation

- **Arrow Down/Up**: Navigate through options
- **Enter**: Select focused option
- **Escape**: Close dropdown
- **Type to search**: Filter options (when searchable)

### Props

- `name` - Input name for form submission
- `value` - Selected value
- `placeholder` - Placeholder text
- `options` - Array of options `[['value' => '...', 'label' => '...']]`
- `label` - Field label
- `error` - Error message
- `required` - Mark as required
- `disabled` - Disable the dropdown
- `searchable` - Enable search filtering
