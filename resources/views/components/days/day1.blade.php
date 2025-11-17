<?php

use Livewire\Component;

new class extends Component {
    public int $dayNumber;
    public string $email = '';
    public string $username = '';
    public string $password = '';
    public string $search = '';
    public string $website = '';
    public string $phone = '';
};
?>

<div class="min-h-screen bg-background p-8">
    <div class="max-w-4xl mx-auto space-y-12">
        <!-- Header -->
        <div class="text-center space-y-4">
            <h1 class="text-4xl font-bold text-foreground">UI Input Component Showcase</h1>
            <p class="text-lg text-muted-foreground">
                Reusable input component with multiple variants, icons, and features
            </p>
        </div>

        <!-- Basic Inputs -->
        <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
            <h2 class="text-2xl font-bold text-foreground">Basic Inputs</h2>

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
        </section>

        <!-- Password Inputs -->
        <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
            <h2 class="text-2xl font-bold text-foreground">Password Inputs</h2>

            <div class="grid md:grid-cols-2 gap-6">
                <x-ui.input type="password" name="password_simple" label="Password (No Toggle)" icon="lock"
                    placeholder="••••••••" />

                <x-ui.input type="password" name="password" label="Password (With Toggle)" icon="lock"
                    placeholder="••••••••" wire-model="password" :show-password-toggle="true"
                    helper-text="Minimum 8 characters" />
            </div>
        </section>

        <!-- Sizes -->
        <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
            <h2 class="text-2xl font-bold text-foreground">Input Sizes</h2>

            <div class="space-y-4">
                <x-ui.input type="text" name="small" label="Small Input" icon="search" placeholder="Small size"
                    size="sm" />

                <x-ui.input type="text" name="medium" label="Medium Input (Default)" icon="search"
                    placeholder="Medium size" size="md" />

                <x-ui.input type="text" name="large" label="Large Input" icon="search" placeholder="Large size"
                    size="lg" />
            </div>
        </section>

        <!-- Variants -->
        <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
            <h2 class="text-2xl font-bold text-foreground">Input Variants</h2>

            <div class="space-y-4">
                <x-ui.input type="text" name="default_variant" label="Default Variant" icon="file-text"
                    placeholder="Default style" variant="default" />

                <x-ui.input type="text" name="filled_variant" label="Filled Variant" icon="file-text"
                    placeholder="Filled style" variant="filled" />

                <x-ui.input type="text" name="outlined_variant" label="Outlined Variant" icon="file-text"
                    placeholder="Outlined style" variant="outlined" />
            </div>
        </section>

        <!-- States -->
        <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
            <h2 class="text-2xl font-bold text-foreground">Input States</h2>

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
        </section>

        <!-- Different Icons -->
        <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
            <h2 class="text-2xl font-bold text-foreground">Various Icons</h2>

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
        </section>

        <!-- Loading State -->
        <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
            <h2 class="text-2xl font-bold text-foreground">Loading State</h2>

            <x-ui.input type="text" name="loading" label="Input with Loading Icon" icon="loader-circle"
                placeholder="Processing..." helper-text="The icon can be any Lucide icon including loader-circle" />
        </section>

        <!-- No Icon -->
        <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
            <h2 class="text-2xl font-bold text-foreground">Without Icon</h2>

            <x-ui.input type="text" name="no_icon" label="Clean Input" placeholder="No icon here"
                helper-text="Works perfectly fine without an icon" />
        </section>
    </div>
</div>