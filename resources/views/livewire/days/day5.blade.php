<x-ui.day-container
    :dayNumber="$dayNumber"
    title="Tabs & Badge Components"
    description="Organize content with accessible tabs and display status with versatile badges"
>
    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Badge Component Showcase -->
        <x-ui.day-section
            icon="tag"
            title="Badge"
            subtitle="Status indicators with variants and sizes"
        >
            <div class="space-y-6">
                <!-- Variants -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Badge Variants</h3>
                    <div class="flex flex-wrap gap-2">
                        <x-ui.badge variant="default">Default</x-ui.badge>
                        <x-ui.badge variant="primary">Primary</x-ui.badge>
                        <x-ui.badge variant="secondary">Secondary</x-ui.badge>
                        <x-ui.badge variant="success">Success</x-ui.badge>
                        <x-ui.badge variant="warning">Warning</x-ui.badge>
                        <x-ui.badge variant="error">Error</x-ui.badge>
                        <x-ui.badge variant="info">Info</x-ui.badge>
                        <x-ui.badge variant="outline">Outline</x-ui.badge>
                    </div>
                </div>

                <!-- Sizes -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Badge Sizes</h3>
                    <div class="flex flex-wrap items-center gap-3">
                        <x-ui.badge variant="primary" size="sm">Small</x-ui.badge>
                        <x-ui.badge variant="primary" size="md">Medium</x-ui.badge>
                        <x-ui.badge variant="primary" size="lg">Large</x-ui.badge>
                    </div>
                </div>

                <!-- With Icons -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">With Icons</h3>
                    <div class="flex flex-wrap gap-2">
                        <x-ui.badge variant="success" icon="check-circle">Completed</x-ui.badge>
                        <x-ui.badge variant="warning" icon="clock">Pending</x-ui.badge>
                        <x-ui.badge variant="error" icon="x-circle">Failed</x-ui.badge>
                        <x-ui.badge variant="info" icon="info">New</x-ui.badge>
                        <x-ui.badge variant="primary" icon="star">Featured</x-ui.badge>
                    </div>
                </div>

                <!-- Pill Shape -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Pill Shape</h3>
                    <div class="flex flex-wrap gap-2">
                        <x-ui.badge variant="success" icon="check" :pill="true">Active</x-ui.badge>
                        <x-ui.badge variant="warning" icon="pause" :pill="true">Paused</x-ui.badge>
                        <x-ui.badge variant="error" icon="ban" :pill="true">Blocked</x-ui.badge>
                        <x-ui.badge variant="primary" icon="zap" :pill="true">Premium</x-ui.badge>
                    </div>
                </div>

                <!-- Removable -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Removable Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        <x-ui.badge variant="primary" :removable="true">Laravel</x-ui.badge>
                        <x-ui.badge variant="primary" :removable="true">Livewire</x-ui.badge>
                        <x-ui.badge variant="primary" :removable="true">Alpine.js</x-ui.badge>
                        <x-ui.badge variant="primary" :removable="true">Tailwind CSS</x-ui.badge>
                    </div>
                    <p class="text-xs text-muted-foreground">Click the X to remove</p>
                </div>

                <!-- Real-world Examples -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Real-world Examples</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-muted/30 rounded-lg">
                            <span class="text-sm text-foreground">Order #CM-2025-001</span>
                            <x-ui.badge variant="success" icon="truck" size="sm">Delivered</x-ui.badge>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-muted/30 rounded-lg">
                            <span class="text-sm text-foreground">Payment from Yaoundé</span>
                            <x-ui.badge variant="warning" icon="clock" size="sm">Pending</x-ui.badge>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-muted/30 rounded-lg">
                            <span class="text-sm text-foreground">Server Status</span>
                            <x-ui.badge variant="success" icon="wifi" size="sm" :pill="true">Online</x-ui.badge>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features List -->
            <div class="pt-4 border-t border-border">
                <h3 class="text-sm font-semibold text-foreground mb-3">Features</h3>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>8 color variants</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>3 size options</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Icon support</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Pill shape</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Removable option</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Dark mode ready</span>
                    </div>
                </div>
            </div>
        </x-ui.day-section>

        <!-- Tabs Component Showcase -->
        <x-ui.day-section
            icon="layout-panel-top"
            title="Tabs"
            subtitle="Organize content with accessible navigation"
        >
            <div class="space-y-6">
                <!-- Underline Tabs (Default) -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Underline Style (Default)</h3>
                    <x-ui.tabs default="account">
                        <x-ui.tabs.list>
                            <x-ui.tabs.trigger tab="account" icon="user">Account</x-ui.tabs.trigger>
                            <x-ui.tabs.trigger tab="settings" icon="settings">Settings</x-ui.tabs.trigger>
                            <x-ui.tabs.trigger tab="notifications" icon="bell">Notifications</x-ui.tabs.trigger>
                        </x-ui.tabs.list>

                        <x-ui.tabs.content tab="account">
                            <div class="p-4 bg-muted/30 rounded-lg">
                                <h4 class="font-semibold text-foreground mb-2">Account Settings</h4>
                                <p class="text-sm text-muted-foreground">
                                    Manage your account details, profile information, and preferences from Douala,
                                    Cameroon.
                                </p>
                            </div>
                        </x-ui.tabs.content>

                        <x-ui.tabs.content tab="settings">
                            <div class="p-4 bg-muted/30 rounded-lg">
                                <h4 class="font-semibold text-foreground mb-2">General Settings</h4>
                                <p class="text-sm text-muted-foreground">
                                    Configure application settings, language (French/English), and display preferences.
                                </p>
                            </div>
                        </x-ui.tabs.content>

                        <x-ui.tabs.content tab="notifications">
                            <div class="p-4 bg-muted/30 rounded-lg">
                                <h4 class="font-semibold text-foreground mb-2">Notification Preferences</h4>
                                <p class="text-sm text-muted-foreground">
                                    Control how you receive updates via email, SMS, or push notifications.
                                </p>
                            </div>
                        </x-ui.tabs.content>
                    </x-ui.tabs>
                </div>

                <!-- Pills Tabs -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Pills Style</h3>
                    <x-ui.tabs default="overview">
                        <x-ui.tabs.list variant="pills">
                            <x-ui.tabs.trigger tab="overview" variant="pills" icon="layout-grid">Overview
                            </x-ui.tabs.trigger>
                            <x-ui.tabs.trigger tab="analytics" variant="pills" icon="bar-chart">Analytics
                            </x-ui.tabs.trigger>
                            <x-ui.tabs.trigger tab="reports" variant="pills" icon="file-text">Reports
                            </x-ui.tabs.trigger>
                        </x-ui.tabs.list>

                        <x-ui.tabs.content tab="overview">
                            <div class="p-4 bg-muted/30 rounded-lg">
                                <h4 class="font-semibold text-foreground mb-2">Overview Dashboard</h4>
                                <p class="text-sm text-muted-foreground">
                                    View key metrics and insights for your business in Yaoundé.
                                </p>
                            </div>
                        </x-ui.tabs.content>

                        <x-ui.tabs.content tab="analytics">
                            <div class="p-4 bg-muted/30 rounded-lg">
                                <h4 class="font-semibold text-foreground mb-2">Analytics Data</h4>
                                <p class="text-sm text-muted-foreground">
                                    Detailed analytics and performance metrics for data-driven decisions.
                                </p>
                            </div>
                        </x-ui.tabs.content>

                        <x-ui.tabs.content tab="reports">
                            <div class="p-4 bg-muted/30 rounded-lg">
                                <h4 class="font-semibold text-foreground mb-2">Generated Reports</h4>
                                <p class="text-sm text-muted-foreground">
                                    Access and download your business reports and summaries.
                                </p>
                            </div>
                        </x-ui.tabs.content>
                    </x-ui.tabs>
                </div>

                <!-- Enclosed Tabs -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-foreground">Enclosed Style</h3>
                    <x-ui.tabs default="code">
                        <x-ui.tabs.list variant="enclosed">
                            <x-ui.tabs.trigger tab="code" variant="enclosed" icon="code">Code</x-ui.tabs.trigger>
                            <x-ui.tabs.trigger tab="preview" variant="enclosed" icon="eye">Preview</x-ui.tabs.trigger>
                            <x-ui.tabs.trigger tab="docs" variant="enclosed" icon="book-open">Docs</x-ui.tabs.trigger>
                        </x-ui.tabs.list>

                        <x-ui.tabs.content tab="code">
                            <div class="p-4 bg-muted/30 rounded-lg font-mono text-sm">
                                <code class="text-foreground">
                                    &lt;x-ui.badge variant="success"&gt;Active&lt;/x-ui.badge&gt;
                                </code>
                            </div>
                        </x-ui.tabs.content>

                        <x-ui.tabs.content tab="preview">
                            <div class="p-4 bg-muted/30 rounded-lg flex items-center justify-center">
                                <x-ui.badge variant="success">Active</x-ui.badge>
                            </div>
                        </x-ui.tabs.content>

                        <x-ui.tabs.content tab="docs">
                            <div class="p-4 bg-muted/30 rounded-lg">
                                <p class="text-sm text-muted-foreground">
                                    Documentation for the badge component with usage examples.
                                </p>
                            </div>
                        </x-ui.tabs.content>
                    </x-ui.tabs>
                </div>
            </div>

            <!-- Features List -->
            <div class="pt-4 border-t border-border">
                <h3 class="text-sm font-semibold text-foreground mb-3">Features</h3>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Alpine.js state</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Keyboard navigation</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>3 style variants</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Icon support</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>ARIA compliant</span>
                    </div>
                    <div class="flex items-center gap-2 text-muted-foreground">
                        <x-dynamic-component component="lucide-check" class="h-3 w-3 text-primary" />
                        <span>Smooth transitions</span>
                    </div>
                </div>
            </div>
        </x-ui.day-section>
    </div>

    <!-- Usage Examples Section -->
    <x-ui.day-section title="Usage Examples">
        <div class="space-y-4">
            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Badge Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/badge-usage.blade.md')" />
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-foreground mb-2">Tabs Usage</h3>
                <div class="bg-muted/50 rounded-lg p-4">
                    <x-markdown-content :content="get_resource_content('examples/tabs-usage.blade.md')" />
                </div>
            </div>
        </div>
    </x-ui.day-section>
</x-ui.day-container>
