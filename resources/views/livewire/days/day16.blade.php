<x-ui.day-container :dayNumber="$dayNumber" title="Stepper & Progress Ring"
    description="Multi-step wizard with validation and circular progress indicator">

    {{-- Toast Container --}}
    <x-ui.toast position="bottom-right" />

    <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        {{-- Stepper Section --}}
        <x-ui.day-section icon="list-ordered" title="Stepper / Wizard">
            <div class="space-y-4 sm:space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Multi-step form wizard with Livewire state management and step validation.
                </p>

                {{-- Features list --}}
                <div class="p-3 sm:p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Livewire state management</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Step-by-step validation</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Progress indicators</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Horizontal & vertical layouts</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Clickable completed steps</span>
                        </li>
                    </ul>
                </div>

                {{-- Interactive Stepper Demo --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Interactive Demo</h3>
                    <div class="p-3 sm:p-4 border border-border rounded-lg bg-card">
                        <x-ui.stepper
                            wire:model.live="currentStep"
                            :steps="$steps"
                            :clickable="true"
                        />

                        {{-- Step Content --}}
                        <div class="mt-4 sm:mt-6 p-3 sm:p-4 bg-muted/30 rounded-lg">
                            @if($currentStep === 1)
                                <div class="space-y-3 sm:space-y-4">
                                    <h4 class="font-medium text-foreground text-sm sm:text-base">Personal Information</h4>
                                    <div class="grid gap-3 sm:gap-4">
                                        <div>
                                            <label class="block text-xs sm:text-sm font-medium text-foreground mb-1">Full Name</label>
                                            <input
                                                type="text"
                                                wire:model="name"
                                                placeholder="John Doe"
                                                class="w-full px-3 py-2 text-sm bg-background border border-input rounded-lg focus:outline-none focus:ring-2 focus:ring-ring"
                                            />
                                            @error('name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                        </div>
                                        <div>
                                            <label class="block text-xs sm:text-sm font-medium text-foreground mb-1">Email</label>
                                            <input
                                                type="email"
                                                wire:model="email"
                                                placeholder="john@example.com"
                                                class="w-full px-3 py-2 text-sm bg-background border border-input rounded-lg focus:outline-none focus:ring-2 focus:ring-ring"
                                            />
                                            @error('email') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            @elseif($currentStep === 2)
                                <div class="space-y-3 sm:space-y-4">
                                    <h4 class="font-medium text-foreground text-sm sm:text-base">Contact Details</h4>
                                    <div>
                                        <label class="block text-xs sm:text-sm font-medium text-foreground mb-1">Phone Number</label>
                                        <input
                                            type="tel"
                                            wire:model="phone"
                                            placeholder="+237 6XX XXX XXX"
                                            class="w-full px-3 py-2 text-sm bg-background border border-input rounded-lg focus:outline-none focus:ring-2 focus:ring-ring"
                                        />
                                        @error('phone') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            @elseif($currentStep === 3)
                                <div class="space-y-3 sm:space-y-4">
                                    <h4 class="font-medium text-foreground text-sm sm:text-base">Delivery Address</h4>
                                    <div class="grid gap-3 sm:gap-4">
                                        <div>
                                            <label class="block text-xs sm:text-sm font-medium text-foreground mb-1">Address</label>
                                            <input
                                                type="text"
                                                wire:model="address"
                                                placeholder="123 Main Street"
                                                class="w-full px-3 py-2 text-sm bg-background border border-input rounded-lg focus:outline-none focus:ring-2 focus:ring-ring"
                                            />
                                            @error('address') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                        </div>
                                        <div>
                                            <label class="block text-xs sm:text-sm font-medium text-foreground mb-1">City</label>
                                            <input
                                                type="text"
                                                wire:model="city"
                                                placeholder="Douala"
                                                class="w-full px-3 py-2 text-sm bg-background border border-input rounded-lg focus:outline-none focus:ring-2 focus:ring-ring"
                                            />
                                            @error('city') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            @elseif($currentStep === 4)
                                <div class="space-y-3 sm:space-y-4">
                                    <h4 class="font-medium text-foreground text-sm sm:text-base">Payment Method</h4>
                                    <div class="space-y-2">
                                        <label class="flex items-center gap-3 p-3 border border-input rounded-lg cursor-pointer hover:bg-accent/50 transition-colors">
                                            <input type="radio" wire:model="paymentMethod" value="card" class="text-primary" />
                                            <x-lucide-credit-card class="size-4 sm:size-5 text-muted-foreground" />
                                            <span class="text-sm">Credit Card</span>
                                        </label>
                                        <label class="flex items-center gap-3 p-3 border border-input rounded-lg cursor-pointer hover:bg-accent/50 transition-colors">
                                            <input type="radio" wire:model="paymentMethod" value="mobile" class="text-primary" />
                                            <x-lucide-smartphone class="size-4 sm:size-5 text-muted-foreground" />
                                            <span class="text-sm">Mobile Money</span>
                                        </label>
                                        <label class="flex items-center gap-3 p-3 border border-input rounded-lg cursor-pointer hover:bg-accent/50 transition-colors">
                                            <input type="radio" wire:model="paymentMethod" value="cash" class="text-primary" />
                                            <x-lucide-banknote class="size-4 sm:size-5 text-muted-foreground" />
                                            <span class="text-sm">Cash on Delivery</span>
                                        </label>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Navigation Buttons --}}
                        <div class="mt-4 flex flex-col sm:flex-row justify-between gap-2 sm:gap-0">
                            <button
                                wire:click="previousStep"
                                @if($currentStep === 1) disabled @endif
                                class="px-4 py-2 text-sm border border-input rounded-lg hover:bg-accent transition-colors disabled:opacity-50 disabled:cursor-not-allowed order-2 sm:order-1"
                            >
                                <x-lucide-arrow-left class="size-4 inline mr-1" />
                                Previous
                            </button>

                            @if($currentStep < $totalSteps)
                                <button
                                    wire:click="nextStep"
                                    class="px-4 py-2 text-sm bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors order-1 sm:order-2"
                                >
                                    Next
                                    <x-lucide-arrow-right class="size-4 inline ml-1" />
                                </button>
                            @else
                                <button
                                    wire:click="completeWizard"
                                    class="px-4 py-2 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors order-1 sm:order-2"
                                >
                                    <x-lucide-check class="size-4 inline mr-1" />
                                    Complete Order
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Vertical Stepper --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Vertical Layout</h3>
                    <div class="p-3 sm:p-4 border border-border rounded-lg bg-card">
                        <x-ui.stepper
                            :steps="['Account', 'Profile', 'Settings', 'Done']"
                            :currentStep="2"
                            variant="vertical"
                            size="sm"
                        />
                    </div>
                </div>

                {{-- Sizes --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Sizes</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-xs text-muted-foreground mb-2">Small</p>
                            <x-ui.stepper :steps="['Step 1', 'Step 2', 'Step 3']" :currentStep="2" size="sm" />
                        </div>
                        <div>
                            <p class="text-xs text-muted-foreground mb-2">Large</p>
                            <x-ui.stepper :steps="['Step 1', 'Step 2', 'Step 3']" :currentStep="2" size="lg" />
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.day-section>

        {{-- Progress Ring Section --}}
        <x-ui.day-section icon="circle" title="Progress Ring">
            <div class="space-y-4 sm:space-y-6">
                {{-- Description --}}
                <p class="text-sm text-muted-foreground">
                    Circular progress indicator using SVG with smooth animations.
                </p>

                {{-- Features list --}}
                <div class="p-3 sm:p-4 bg-muted/30 rounded-lg">
                    <h3 class="text-sm font-semibold text-foreground mb-2">Features</h3>
                    <ul class="space-y-1 text-sm text-muted-foreground">
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>SVG-based rendering</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Smooth CSS transitions</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Multiple sizes & colors</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Custom center content</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-lucide-check class="size-4 text-green-500 mt-0.5 shrink-0" />
                            <span>Livewire reactive binding</span>
                        </li>
                    </ul>
                </div>

                {{-- Interactive Demo --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Interactive Demo</h3>
                    <div class="p-3 sm:p-4 border border-border rounded-lg bg-card">
                        <div class="flex flex-col items-center gap-4">
                            <x-ui.progress-ring
                                wire:model.live="profileProgress"
                                size="xl"
                                :showLabel="true"
                                label="Profile"
                            />
                            <div class="flex gap-2">
                                <button
                                    wire:click="decrementProgress"
                                    class="px-3 py-1.5 text-sm border border-input rounded-lg hover:bg-accent transition-colors"
                                >
                                    <x-lucide-minus class="size-4" />
                                </button>
                                <span class="px-4 py-1.5 text-sm font-mono bg-muted rounded-lg">{{ $profileProgress }}%</span>
                                <button
                                    wire:click="incrementProgress"
                                    class="px-3 py-1.5 text-sm border border-input rounded-lg hover:bg-accent transition-colors"
                                >
                                    <x-lucide-plus class="size-4" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sizes --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Sizes</h3>
                    <div class="flex flex-wrap items-end justify-center gap-4 sm:gap-6 p-3 sm:p-4 border border-border rounded-lg bg-card">
                        <div class="text-center">
                            <x-ui.progress-ring :value="60" size="sm" />
                            <p class="text-xs text-muted-foreground mt-2">Small</p>
                        </div>
                        <div class="text-center">
                            <x-ui.progress-ring :value="75" size="md" />
                            <p class="text-xs text-muted-foreground mt-2">Medium</p>
                        </div>
                        <div class="text-center">
                            <x-ui.progress-ring :value="85" size="lg" />
                            <p class="text-xs text-muted-foreground mt-2">Large</p>
                        </div>
                        <div class="text-center">
                            <x-ui.progress-ring :value="90" size="xl" />
                            <p class="text-xs text-muted-foreground mt-2">Extra Large</p>
                        </div>
                    </div>
                </div>

                {{-- Colors --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Colors</h3>
                    <div class="flex flex-wrap justify-center gap-4 sm:gap-6 p-3 sm:p-4 border border-border rounded-lg bg-card">
                        <x-ui.progress-ring :value="75" color="primary" :showLabel="true" label="Primary" />
                        <x-ui.progress-ring :value="85" color="success" :showLabel="true" label="Success" />
                        <x-ui.progress-ring :value="45" color="warning" :showLabel="true" label="Warning" />
                        <x-ui.progress-ring :value="25" color="danger" :showLabel="true" label="Danger" />
                        <x-ui.progress-ring :value="60" color="info" :showLabel="true" label="Info" />
                    </div>
                </div>

                {{-- Dashboard Example --}}
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-foreground">Dashboard Stats</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 sm:gap-4">
                        <div class="p-3 sm:p-4 border border-border rounded-lg bg-card text-center">
                            <x-ui.progress-ring :value="$storageUsed" size="md" color="info">
                                <x-lucide-hard-drive class="size-5 sm:size-6 text-blue-500" />
                            </x-ui.progress-ring>
                            <p class="text-xs sm:text-sm font-medium text-foreground mt-2">Storage</p>
                            <p class="text-[10px] sm:text-xs text-muted-foreground">{{ $storageUsed }}% used</p>
                        </div>
                        <div class="p-3 sm:p-4 border border-border rounded-lg bg-card text-center">
                            <x-ui.progress-ring :value="round(($tasksCompleted / $totalTasks) * 100)" size="md" color="success">
                                <span class="text-xs sm:text-sm font-bold text-foreground">{{ $tasksCompleted }}/{{ $totalTasks }}</span>
                            </x-ui.progress-ring>
                            <p class="text-xs sm:text-sm font-medium text-foreground mt-2">Tasks</p>
                            <p class="text-[10px] sm:text-xs text-muted-foreground">{{ $tasksCompleted }} completed</p>
                        </div>
                        <div class="p-3 sm:p-4 border border-border rounded-lg bg-card text-center col-span-2 sm:col-span-1">
                            <x-ui.progress-ring :value="$profileProgress" size="md" color="primary">
                                <x-lucide-user class="size-5 sm:size-6 text-primary" />
                            </x-ui.progress-ring>
                            <p class="text-xs sm:text-sm font-medium text-foreground mt-2">Profile</p>
                            <p class="text-[10px] sm:text-xs text-muted-foreground">{{ $profileProgress }}% complete</p>
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>

    {{-- Usage Examples Section --}}
    <x-ui.day-section icon="book-open" title="Usage Examples" class="mt-6 sm:mt-8">
        <div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
            {{-- Stepper Usage --}}
            <div class="space-y-3 min-w-0">
                <h3 class="text-sm font-semibold text-foreground">Stepper Usage</h3>
                <div class="overflow-x-auto">
                    <x-markdown-content :content="get_resource_content('examples/stepper-usage.blade.md')" />
                </div>
            </div>

            {{-- Progress Ring Usage --}}
            <div class="space-y-3 min-w-0">
                <h3 class="text-sm font-semibold text-foreground">Progress Ring Usage</h3>
                <div class="overflow-x-auto">
                    <x-markdown-content :content="get_resource_content('examples/progress-ring-usage.blade.md')" />
                </div>
            </div>
        </div>
    </x-ui.day-section>
</x-ui.day-container>
