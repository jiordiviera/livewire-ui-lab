<x-ui.day-container :dayNumber="$dayNumber" title="UI Input Component Showcase"
                    description="Reusable input component with multiple variants, icons, and features">
    <!-- Basic Inputs -->
    <x-ui.day-section title="Basic Inputs">

        <div class="grid md:grid-cols-2 gap-6">
            <x-ui.input type="email" name="email" label="Email Address" icon="mail" placeholder="you@example.com"
                        wire-model="email" helper-text="We'll never share your email" />

            <x-ui.input type="text" name="username" label="Username" icon="user" placeholder="johndoe"
                        wire-model="username" />

            <x-ui.input type="url" name="website" label="Website" icon="globe" placeholder="https://example.com"
                        wire-model="website" />

            <x-ui.input type="tel" name="phone" label="Phone Number" icon="phone" placeholder="+237 6 XX XX XX XX"
                        wire-model="phone" />
        </div>
    </x-ui.day-section>

    <!-- Password Inputs -->
    <x-ui.day-section title="Password Inputs">

        <div class="grid md:grid-cols-2 gap-6">
            <x-ui.input type="password" name="password_simple" label="Password (No Toggle)" icon="lock"
                        placeholder="••••••••" />

            <x-ui.input type="password" name="password" label="Password (With Toggle)" icon="lock"
                        placeholder="••••••••" wire-model="password" :show-password-toggle="true"
                        helper-text="Minimum 8 characters" />
        </div>
    </x-ui.day-section>

    <!-- Sizes -->
    <x-ui.day-section title="Input Sizes">
        <div class="space-y-4">
            <x-ui.input type="text" name="small" label="Small Input" icon="search" placeholder="Small size" size="sm" />

            <x-ui.input type="text" name="medium" label="Medium Input (Default)" icon="search" placeholder="Medium size"
                        size="md" />

            <x-ui.input type="text" name="large" label="Large Input" icon="search" placeholder="Large size" size="lg" />
        </div>
    </x-ui.day-section>

    <!-- Variants -->
    <x-ui.day-section title="Input Variants">

        <div class="space-y-4">
            <x-ui.input type="text" name="default_variant" label="Default Variant" icon="file-text"
                        placeholder="Default style" variant="default" />

            <x-ui.input type="text" name="filled_variant" label="Filled Variant" icon="file-text"
                        placeholder="Filled style" variant="filled" />

            <x-ui.input type="text" name="outlined_variant" label="Outlined Variant" icon="file-text"
                        placeholder="Outlined style" variant="outlined" />
        </div>
    </x-ui.day-section>

    <!-- States -->
    <x-ui.day-section title="Input States">

        <div class="grid md:grid-cols-2 gap-6">
            <x-ui.input type="text" name="required" label="Required Field" icon="asterisk"
                        placeholder="This is required" required />

            <x-ui.input type="text" name="disabled" label="Disabled Input" icon="ban" placeholder="Can't type here"
                        value="Disabled value" disabled />

            <x-ui.input type="text" name="readonly" label="Readonly Input" icon="eye-off" placeholder="Read only"
                        value="Can't edit this" readonly />

            <x-ui.input type="text" name="error" label="Input with Error" icon="alert-triangle"
                        placeholder="Invalid input" error="This field contains an error" />
        </div>
    </x-ui.day-section>

    <!-- Different Icons -->
    <x-ui.day-section title="Various Icons">

        <div class="grid md:grid-cols-2 gap-6">
            <x-ui.input type="search" name="search" label="Search" icon="search" placeholder="Search anything..."
                        wire-model="search" />

            <x-ui.input type="date" name="calendar" label="Date" icon="calendar" placeholder="Select date" />

            <x-ui.input type="text" name="credit_card" label="Credit Card" icon="credit-card"
                        placeholder="1234 5678 9012 3456" />

            <x-ui.input type="text" name="building" label="Company" icon="building" placeholder="Company name" />

            <x-ui.input type="text" name="map_pin" label="Location" icon="map-pin" placeholder="Douala, Cameroon" />

            <x-ui.input type="text" name="tag" label="Tags" icon="tag" placeholder="Add tags" />
        </div>
    </x-ui.day-section>

    <!-- Loading State -->
    <x-ui.day-section title="Loading State">

        <x-ui.input type="text" name="loading" label="Input with Loading Icon" icon="loader-circle"
                    placeholder="Processing..." helper-text="The icon can be any Lucide icon including loader-circle" />
    </x-ui.day-section>

    <!-- No Icon -->
    <x-ui.day-section title="Without Icon">

        <x-ui.input type="text" name="no_icon" label="Clean Input" placeholder="No icon here"
                    helper-text="Works perfectly fine without an icon" />
    </x-ui.day-section>
</x-ui.day-container>
