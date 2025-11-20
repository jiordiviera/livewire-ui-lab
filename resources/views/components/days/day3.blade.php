<?php

use Livewire\Component;

new class extends Component {
    public int $dayNumber;
};
?>

<x-ui.day-container
    :dayNumber="$dayNumber"
    title="Alert & Modal Components"
    description="Beautiful alerts with variants and modals with Alpine.js state management"
>

        <!-- Alert Component Section -->
        <div class="bg-gradient-to-br from-primary/5 to-primary/10 rounded-3xl p-8 space-y-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-foreground mb-2">Alert Component</h2>
                <p class="text-muted-foreground">Contextual messages with beautiful variants and icons</p>
            </div>

            <!-- Alert Variants -->
            <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
                <h3 class="text-xl font-bold text-foreground">Alert Variants</h3>
                <div class="space-y-4">
                    <x-ui.alert variant="success">
                        Your changes have been saved successfully!
                    </x-ui.alert>

                    <x-ui.alert variant="error">
                        An error occurred while processing your request. Please try again.
                    </x-ui.alert>

                    <x-ui.alert variant="warning">
                        This action cannot be undone. Please proceed with caution.
                    </x-ui.alert>

                    <x-ui.alert variant="info">
                        You have 3 new notifications waiting for you.
                    </x-ui.alert>
                </div>
            </section>

            <!-- Dismissible Alerts -->
            <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
                <h3 class="text-xl font-bold text-foreground">Dismissible Alerts with Titles</h3>
                <div class="space-y-4">
                    <x-ui.alert variant="success" :dismissible="true" title="Payment Successful">
                        Your payment of $99.00 has been processed successfully. Receipt sent to your email.
                    </x-ui.alert>

                    <x-ui.alert variant="error" :dismissible="true" title="Upload Failed">
                        The file size exceeds the maximum limit of 10MB. Please choose a smaller file.
                    </x-ui.alert>

                    <x-ui.alert variant="warning" :dismissible="true" icon="shield-alert" title="Security Alert">
                        Suspicious login activity detected from a new device in Yaoundé, Cameroon.
                    </x-ui.alert>

                    <x-ui.alert variant="info" :dismissible="true" icon="bell" title="New Features">
                        We've added support for Mobile Money payments (MTN, Orange Money) for Cameroon users!
                    </x-ui.alert>
                </div>
            </section>
        </div>

        <!-- Modal Component Section -->
        <div class="bg-gradient-to-br from-secondary/5 to-secondary/10 rounded-3xl p-8 space-y-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-foreground mb-2">Modal Component</h2>
                <p class="text-muted-foreground">Dialogs with Alpine.js state management and smooth transitions</p>
            </div>

            <!-- Basic Modals -->
            <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
                <h3 class="text-xl font-bold text-foreground">Modal Sizes</h3>
                <div class="flex flex-wrap gap-4">
                    <x-ui.button size="sm" variant="outline" x-on:click="$dispatch('open-modal-sm')">
                        Small
                    </x-ui.button>
                    <x-ui.button size="sm" variant="outline" x-on:click="$dispatch('open-modal-md')">
                        Medium
                    </x-ui.button>
                    <x-ui.button size="sm" variant="outline" x-on:click="$dispatch('open-modal-lg')">
                        Large
                    </x-ui.button>
                    <x-ui.button size="sm" variant="outline" x-on:click="$dispatch('open-modal-xl')">
                        Extra Large
                    </x-ui.button>
                </div>

                <x-ui.modal id="sm" size="sm" title="Small Modal">
                    <p class="text-muted-foreground">This is a small modal - perfect for simple confirmations.</p>
                </x-ui.modal>

                <x-ui.modal id="md" size="md" title="Medium Modal">
                    <p class="text-muted-foreground">This is a medium modal - the default size for most use cases.</p>
                </x-ui.modal>

                <x-ui.modal id="lg" size="lg" title="Large Modal">
                    <p class="text-muted-foreground">This is a large modal - great for forms and detailed content.</p>
                </x-ui.modal>

                <x-ui.modal id="xl" size="xl" title="Extra Large Modal">
                    <p class="text-muted-foreground">This is an extra large modal - ideal for complex interfaces.</p>
                </x-ui.modal>
            </section>

            <!-- Real-world Examples -->
            <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
                <h3 class="text-xl font-bold text-foreground">Real-world Examples</h3>
                <div class="flex flex-wrap gap-4">
                    <x-ui.button icon="user-plus" x-on:click="$dispatch('open-modal-signup')">
                        Sign Up
                    </x-ui.button>
                    <x-ui.button icon="trash-2" variant="destructive" x-on:click="$dispatch('open-modal-delete')">
                        Delete Account
                    </x-ui.button>
                    <x-ui.button icon="alert-triangle" variant="warning" x-on:click="$dispatch('open-modal-confirm')">
                        Confirm Payment
                    </x-ui.button>
                </div>

                <!-- Sign Up Modal -->
                <x-ui.modal id="signup" size="md" title="Create Account">
                    <div class="space-y-4">
                        <x-ui.input label="Full Name" name="test" placeholder="Jordi Viera" icon="user" />
                        <x-ui.input label="Email Address" type="email" placeholder="jiordi@example.com" icon="mail" />
                        <x-ui.input label="Password" type="password" placeholder="Enter a strong password" icon="lock"
                            :toggleable="true" />
                        <x-ui.alert variant="info" icon="info">
                            By creating an account, you agree to our Terms of Service.
                        </x-ui.alert>
                    </div>

                    <x-slot:footer>
                        <div class="flex justify-end gap-3">
                            <x-ui.button variant="ghost" x-on:click="$dispatch('close-modal-signup')">
                                Cancel
                            </x-ui.button>
                            <x-ui.button variant="primary" icon="user-plus"
                                x-on:click="$dispatch('close-modal-signup')">
                                Create Account
                            </x-ui.button>
                        </div>
                    </x-slot:footer>
                </x-ui.modal>

                <!-- Delete Confirmation Modal -->
                <x-ui.modal id="delete" size="md" title="Delete Account">
                    <div class="space-y-4">
                        <p class="text-muted-foreground">
                            Are you sure you want to delete your account? This action cannot be undone.
                        </p>
                        <x-ui.alert variant="warning">
                            All your data will be permanently removed including your saved addresses in Douala and
                            transaction history.
                        </x-ui.alert>
                    </div>

                    <x-slot:footer>
                        <div class="flex justify-end gap-3">
                            <x-ui.button variant="ghost" x-on:click="$dispatch('close-modal-delete')">
                                Cancel
                            </x-ui.button>
                            <x-ui.button variant="destructive" icon="trash-2"
                                x-on:click="$dispatch('close-modal-delete')">
                                Delete Account
                            </x-ui.button>
                        </div>
                    </x-slot:footer>
                </x-ui.modal>

                <!-- Payment Confirmation Modal -->
                <x-ui.modal id="confirm" size="lg" title="Confirm Payment">
                    <div class="space-y-4">
                        <div class="bg-muted/50 rounded-lg p-4 space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-muted-foreground">Amount</span>
                                <span class="font-semibold text-foreground">25,000 FCFA</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-muted-foreground">Payment Method</span>
                                <span class="font-semibold text-foreground">MTN Mobile Money</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-muted-foreground">Phone Number</span>
                                <span class="font-semibold text-foreground">+237 694 010 263</span>
                            </div>
                            <div class="border-t border-border pt-2 mt-2 flex justify-between">
                                <span class="font-semibold text-foreground">Total</span>
                                <span class="font-bold text-lg text-foreground">25,000 FCFA</span>
                            </div>
                        </div>

                        <x-ui.alert variant="info" icon="smartphone">
                            You will receive a payment request on your phone. Enter your PIN to complete the
                            transaction.
                        </x-ui.alert>
                    </div>

                    <x-slot:footer>
                        <div class="flex justify-end gap-3">
                            <x-ui.button variant="ghost" x-on:click="$dispatch('close-modal-confirm')">
                                Cancel
                            </x-ui.button>
                            <x-ui.button variant="primary" icon="check-circle"
                                x-on:click="$dispatch('close-modal-confirm')">
                                Confirm Payment
                            </x-ui.button>
                        </div>
                    </x-slot:footer>
                </x-ui.modal>
            </section>
        </div>

        <!-- Combined Usage Example -->
        <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
            <h2 class="text-2xl font-bold text-foreground">Combined Example</h2>
            <p class="text-sm text-muted-foreground">Alert and Modal working together for a complete UX</p>

            <div class="flex gap-4">
                <x-ui.button icon="send" x-on:click="$dispatch('open-modal-combined')">
                    Send Message
                </x-ui.button>
            </div>

            <x-ui.modal id="combined" size="md" title="Send Message">
                <div class="space-y-4">
                    <x-ui.alert variant="info" icon="info">
                        Messages are delivered instantly via SMS to Cameroon mobile numbers.
                    </x-ui.alert>

                    <x-ui.input label="Recipient Phone" placeholder="+237 6XX XXX XXX" icon="phone" />

                    <x-ui.input label="Message" placeholder="Type your message here..." icon="message-square" />

                    <x-ui.alert variant="warning" :dismissible="true">
                        Standard SMS rates apply. Each message costs 50 FCFA.
                    </x-ui.alert>
                </div>

                <x-slot:footer>
                    <div class="flex justify-end gap-3">
                        <x-ui.button variant="ghost" x-on:click="$dispatch('close-modal-combined')">
                            Cancel
                        </x-ui.button>
                        <x-ui.button variant="primary" icon="send" x-on:click="$dispatch('close-modal-combined')">
                            Send Message
                        </x-ui.button>
                    </div>
                </x-slot:footer>
            </x-ui.modal>
        </section>

        <!-- API Reference -->
        <section class="bg-card border border-border rounded-2xl p-8 space-y-8">
            <h2 class="text-2xl font-bold text-foreground">Component API Reference</h2>

            <!-- Alert API -->
            <div>
                <h3 class="text-lg font-semibold text-foreground mb-4">Alert Component</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-border">
                                <th class="text-left py-3 px-4 font-semibold text-foreground">Prop</th>
                                <th class="text-left py-3 px-4 font-semibold text-foreground">Type</th>
                                <th class="text-left py-3 px-4 font-semibold text-foreground">Default</th>
                                <th class="text-left py-3 px-4 font-semibold text-foreground">Description</th>
                            </tr>
                        </thead>
                        <tbody class="text-muted-foreground">
                            <tr class="border-b border-border">
                                <td class="py-3 px-4 font-mono text-xs text-primary">variant</td>
                                <td class="py-3 px-4">string</td>
                                <td class="py-3 px-4 font-mono text-xs">'info'</td>
                                <td class="py-3 px-4">success, error, warning, info</td>
                            </tr>
                            <tr class="border-b border-border">
                                <td class="py-3 px-4 font-mono text-xs text-primary">dismissible</td>
                                <td class="py-3 px-4">boolean</td>
                                <td class="py-3 px-4 font-mono text-xs">false</td>
                                <td class="py-3 px-4">Show close button</td>
                            </tr>
                            <tr class="border-b border-border">
                                <td class="py-3 px-4 font-mono text-xs text-primary">title</td>
                                <td class="py-3 px-4">string</td>
                                <td class="py-3 px-4 font-mono text-xs">null</td>
                                <td class="py-3 px-4">Optional title</td>
                            </tr>
                            <tr class="border-b border-border">
                                <td class="py-3 px-4 font-mono text-xs text-primary">icon</td>
                                <td class="py-3 px-4">string</td>
                                <td class="py-3 px-4 font-mono text-xs">auto</td>
                                <td class="py-3 px-4">Custom Lucide icon</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal API -->
            <div>
                <h3 class="text-lg font-semibold text-foreground mb-4">Modal Component</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-border">
                                <th class="text-left py-3 px-4 font-semibold text-foreground">Prop</th>
                                <th class="text-left py-3 px-4 font-semibold text-foreground">Type</th>
                                <th class="text-left py-3 px-4 font-semibold text-foreground">Default</th>
                                <th class="text-left py-3 px-4 font-semibold text-foreground">Description</th>
                            </tr>
                        </thead>
                        <tbody class="text-muted-foreground">
                            <tr class="border-b border-border">
                                <td class="py-3 px-4 font-mono text-xs text-primary">id</td>
                                <td class="py-3 px-4">string</td>
                                <td class="py-3 px-4 font-mono text-xs">'modal'</td>
                                <td class="py-3 px-4">Unique identifier for events</td>
                            </tr>
                            <tr class="border-b border-border">
                                <td class="py-3 px-4 font-mono text-xs text-primary">size</td>
                                <td class="py-3 px-4">string</td>
                                <td class="py-3 px-4 font-mono text-xs">'md'</td>
                                <td class="py-3 px-4">sm, md, lg, xl, 2xl, 3xl, 4xl, full</td>
                            </tr>
                            <tr class="border-b border-border">
                                <td class="py-3 px-4 font-mono text-xs text-primary">closeable</td>
                                <td class="py-3 px-4">boolean</td>
                                <td class="py-3 px-4 font-mono text-xs">true</td>
                                <td class="py-3 px-4">Allow closing (X, ESC, click outside)</td>
                            </tr>
                            <tr class="border-b border-border">
                                <td class="py-3 px-4 font-mono text-xs text-primary">title</td>
                                <td class="py-3 px-4">string</td>
                                <td class="py-3 px-4 font-mono text-xs">null</td>
                                <td class="py-3 px-4">Optional modal title</td>
                            </tr>
                            <tr class="border-b border-border">
                                <td class="py-3 px-4 font-mono text-xs text-primary">footer</td>
                                <td class="py-3 px-4">slot</td>
                                <td class="py-3 px-4 font-mono text-xs">null</td>
                                <td class="py-3 px-4">Named slot for footer actions</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Usage Examples -->
        <section class="bg-card border border-border rounded-2xl p-8 space-y-6">
            <h2 class="text-2xl font-bold text-foreground">Usage Examples</h2>

            <div class="space-y-4">
                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-2">Alert Usage</h3>
                    <div class="bg-muted/50 rounded-lg p-4">
                        <x-markdown-content :content="get_resource_content('examples/alert-usage.blade.md')" />
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-foreground mb-2">Modal Usage</h3>
                    <div class="bg-muted/50 rounded-lg p-4">
                        <x-markdown-content  class="prose prose-green text-gray-500 dark:text-gray-400 dark:prose-invert lg:max-w-none" :content="get_resource_content('examples/modal-usage.blade.md')" />
                    </div>
                </div>
            </div>
        </section>
</x-ui.day-container>