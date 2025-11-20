<?php

use Livewire\Component;

new class extends Component {
    public int $dayNumber;

    // Dropdown state
    public string $country = '';
    public string $city = '';
    public string $framework = 'laravel';

    // Toggle states
    public bool $notifications = true;
    public bool $darkMode = false;
    public bool $autoSave = true;
    public bool $twoFactor = false;

    // Dropdown options
    public function getCountryOptionsProperty()
    {
        return [
            ['value' => 'cm', 'label' => 'Cameroon'],
            ['value' => 'ng', 'label' => 'Nigeria'],
            ['value' => 'gh', 'label' => 'Ghana'],
            ['value' => 'ke', 'label' => 'Kenya'],
            ['value' => 'za', 'label' => 'South Africa'],
            ['value' => 'tz', 'label' => 'Tanzania'],
            ['value' => 'ug', 'label' => 'Uganda'],
            ['value' => 'rw', 'label' => 'Rwanda'],
        ];
    }

    public function getCityOptionsProperty()
    {
        return [
            ['value' => 'yde', 'label' => 'Yaoundé'],
            ['value' => 'dla', 'label' => 'Douala'],
            ['value' => 'baf', 'label' => 'Bafoussam'],
            ['value' => 'nga', 'label' => 'Ngaoundéré'],
            ['value' => 'gra', 'label' => 'Garoua'],
            ['value' => 'mra', 'label' => 'Maroua'],
            ['value' => 'bam', 'label' => 'Bamenda'],
            ['value' => 'lbe', 'label' => 'Limbé'],
        ];
    }

    public function getFrameworkOptionsProperty()
    {
        return [
            ['value' => 'laravel', 'label' => 'Laravel'],
            ['value' => 'symfony', 'label' => 'Symfony'],
            ['value' => 'rails', 'label' => 'Ruby on Rails'],
            ['value' => 'django', 'label' => 'Django'],
            ['value' => 'express', 'label' => 'Express.js'],
            ['value' => 'nestjs', 'label' => 'NestJS'],
            ['value' => 'spring', 'label' => 'Spring Boot'],
            ['value' => 'fastapi', 'label' => 'FastAPI'],
        ];
    }
};
?>

<x-ui.day-container
    :dayNumber="$dayNumber"
    title="Dropdown & Toggle Components"
    description="Advanced form controls with keyboard navigation, accessibility, and smooth animations"
>
    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Dropdown Component Showcase -->
        <x-ui.day-section
            icon="chevrons-down"
            title="Dropdown"
            subtitle="Custom select with keyboard navigation"
        >

            <div class="space-y-6">
                <!-- Basic Dropdown -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Basic Dropdown</h3>
                    <x-ui.dropdown
                        name="country"
                        label="Select Country"
                        placeholder="Choose a country"
                        :options="$this->countryOptions"
                        :value="$country"
                        required
                    />
                    <p class="text-xs text-muted-foreground">
                        Selected: <span class="font-mono text-primary">{{ $country ?: 'none' }}</span>
                    </p>
                </div>

                <!-- Searchable Dropdown -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Searchable Dropdown</h3>
                    <x-ui.dropdown
                        name="city"
                        label="Select City"
                        placeholder="Choose a city in Cameroon"
                        :options="$this->cityOptions"
                        :value="$city"
                        :searchable="true"
                    />
                    <p class="text-xs text-muted-foreground">
                        Selected: <span class="font-mono text-primary">{{ $city ?: 'none' }}</span>
                    </p>
                </div>

                <!-- Dropdown with Value -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Pre-selected Value</h3>
                    <x-ui.dropdown
                        name="framework"
                        label="Preferred Framework"
                        :options="$this->frameworkOptions"
                        :value="$framework"
                        :searchable="true"
                    />
                    <p class="text-xs text-muted-foreground">
                        Selected: <span class="font-mono text-primary">{{ $framework }}</span>
                    </p>
                </div>
            </div>

            <!-- Features List -->
            <div class="pt-4 border-t border-border">
                <h3 class="text-sm font-semibold text-foreground mb-3">Features</h3>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Keyboard navigation</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Arrow keys support</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Click away to close</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Search filtering</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Livewire integration</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Accessible (ARIA)</span>
                    </div>
                </div>
            </div>
        </x-ui.day-section>

        <!-- Toggle Component Showcase -->
        <x-ui.day-section
            icon="toggle-left"
            title="Toggle"
            subtitle="Smooth switch with animations"
        >

            <div class="space-y-6">
                <!-- Default Size Toggle -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Default Size</h3>
                    <x-ui.toggle
                        name="notifications"
                        :checked="$notifications"
                        label="Push Notifications"
                        description="Receive notifications about account activity"
                    />
                    <x-ui.toggle
                        name="autoSave"
                        :checked="$autoSave"
                        label="Auto-save"
                        description="Automatically save changes as you type"
                    />
                </div>

                <!-- Small Size Toggle -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Small Size</h3>
                    <x-ui.toggle
                        name="darkMode"
                        :checked="$darkMode"
                        label="Dark Mode"
                        description="Switch to dark theme"
                        size="sm"
                    />
                </div>

                <!-- Large Size Toggle -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Large Size</h3>
                    <x-ui.toggle
                        name="twoFactor"
                        :checked="$twoFactor"
                        label="Two-Factor Authentication"
                        description="Add an extra layer of security to your account"
                        size="lg"
                        required
                    />
                </div>

                <!-- Disabled State -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Disabled State</h3>
                    <x-ui.toggle
                        label="Beta Features"
                        description="This option is not available yet"
                        :disabled="true"
                    />
                </div>
            </div>

            <!-- Features List -->
            <div class="pt-4 border-t border-border">
                <h3 class="text-sm font-semibold text-foreground mb-3">Features</h3>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Smooth transitions</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Multiple sizes</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Keyboard accessible</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Label & description</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Livewire binding</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Disabled state</span>
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>

    <!-- Combined Usage Example -->
    <x-ui.day-section title="Combined Usage Example">

        <div class="bg-gradient-to-br from-primary/5 to-secondary/5 rounded-xl p-6 space-y-6">
            <h3 class="text-lg font-semibold text-foreground">User Preferences Form</h3>

            <div class="grid md:grid-cols-2 gap-6">
                <x-ui.dropdown
                    label="Default Country"
                    placeholder="Select your country"
                    :options="$this->countryOptions"
                    :searchable="true"
                />

                <x-ui.dropdown
                    label="Primary City"
                    placeholder="Select your city"
                    :options="$this->cityOptions"
                    :searchable="true"
                />
            </div>

            <div class="space-y-4">
                <h4 class="text-sm font-semibold text-foreground">Notification Settings</h4>
                <x-ui.toggle
                    label="Email Notifications"
                    description="Receive updates via email"
                />
                <x-ui.toggle
                    label="SMS Notifications"
                    description="Receive updates via SMS (charges may apply)"
                />
                <x-ui.toggle
                    label="Marketing Communications"
                    description="Receive promotional content and offers"
                />
            </div>
        </div>
    </x-ui.day-section>

    <!-- Usage Examples Section -->
    <x-ui.day-section title="Usage Examples">

        <div class="space-y-4">
            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Dropdown Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/dropdown-usage.blade.md')" />
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Toggle Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/toggle-usage.blade.md')" />
                </div>
            </div>
        </div>
    </x-ui.day-section>
</x-ui.day-container>
