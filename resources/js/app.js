import intersect from '@alpinejs/intersect'
import Tooltip from '@ryangjchandler/alpine-tooltip'
import collapse from '@alpinejs/collapse'
import Sortable from 'sortablejs'

import './utils/helpers'
import './utils/scrollspy'
import './utils/clipboard'

// Make Sortable available globally for Alpine
window.Sortable = Sortable

Alpine.plugin(intersect)
Alpine.plugin(Tooltip)
Alpine.plugin(collapse)

window.Alpine = Alpine

document.addEventListener('alpine:init', () => {
    // Carousel Component
    Alpine.data('carousel', (options = {}) => ({
        current: 0,
        total: options.total || 0,
        autoplay: options.autoplay || false,
        interval: options.interval || 5000,
        timer: null,

        init() {
            if (this.autoplay && this.total > 1) {
                this.startAutoplay();
            }
        },

        next() {
            this.current = (this.current + 1) % this.total;
            this.resetAutoplay();
        },

        prev() {
            this.current = (this.current - 1 + this.total) % this.total;
            this.resetAutoplay();
        },

        goTo(index) {
            this.current = index;
            this.resetAutoplay();
        },

        startAutoplay() {
            this.timer = setInterval(() => this.next(), this.interval);
        },

        resetAutoplay() {
            if (this.autoplay && this.timer) {
                clearInterval(this.timer);
                this.startAutoplay();
            }
        }
    }));

    // Pill Tabs Component
    Alpine.data('pillTabs', (initialValue) => ({
        active: initialValue || '',
        canScrollLeft: false,
        canScrollRight: false,

        init() {
            this.$nextTick(() => this.updateScrollState());
        },

        selectTab(tab) {
            this.active = tab;
        },

        updateScrollState() {
            const container = this.$refs.tabsContainer;
            if (container) {
                this.canScrollLeft = container.scrollLeft > 0;
                this.canScrollRight = container.scrollLeft < (container.scrollWidth - container.clientWidth - 1);
            }
        }
    }));

    // Range Slider Component
    Alpine.data('rangeSlider', (initialValue, options = {}) => ({
        value: initialValue,
        min: options.min || 0,
        max: options.max || 100,
        step: options.step || 1,
        type: options.type || 'single',

        getPercentage(val) {
            return ((val - this.min) / (this.max - this.min)) * 100;
        },

        getThumbOffset() {
            // Thumb size offset for centering
            return 8; // Half of default thumb size (16px / 2)
        },

        updateMin(newValue) {
            newValue = parseFloat(newValue);
            if (newValue >= this.value[1]) {
                this.value[0] = this.value[1];
            } else {
                this.value[0] = newValue;
            }
        },

        updateMax(newValue) {
            newValue = parseFloat(newValue);
            if (newValue <= this.value[0]) {
                this.value[1] = this.value[0];
            } else {
                this.value[1] = newValue;
            }
        }
    }));

    // Rating Component
    Alpine.data('rating', (initialValue, options = {}) => ({
        value: initialValue || 0,
        hoverValue: 0,
        max: options.max || 5,
        readonly: options.readonly || false,
        allowHalf: options.allowHalf || false,

        setRating(star) {
            if (this.readonly) return;
            this.value = star;
        },

        getStarFillWidth(star) {
            const activeValue = this.hoverValue || this.value;

            if (activeValue >= star) {
                return 100;
            } else if (this.allowHalf && activeValue >= star - 0.5) {
                return 50;
            } else {
                return 0;
            }
        }
    }));

    // Tags Input Component
    Alpine.data('tagsInput', (initialValue, options = {}) => ({
        tags: Array.isArray(initialValue) ? initialValue : [],
        inputValue: '',
        error: '',
        maxTags: options.maxTags || null,
        allowDuplicates: options.allowDuplicates || false,
        validateEmail: options.validateEmail || false,

        init() {
            // Nothing to do - tags is directly bound via @entangle
        },

        addTag() {
            const value = this.inputValue.trim();

            if (!value) return;

            // Check max tags limit
            if (this.maxTags && this.tags.length >= this.maxTags) {
                this.error = `Maximum ${this.maxTags} tags allowed`;
                return;
            }

            // Validate email if required
            if (this.validateEmail && !this.isValidEmail(value)) {
                this.error = 'Invalid email address';
                return;
            }

            // Check duplicates
            if (!this.allowDuplicates && this.tags.includes(value)) {
                this.error = 'This tag already exists';
                return;
            }

            this.tags.push(value);
            this.inputValue = '';
            this.error = '';
        },

        removeTag(index) {
            this.tags.splice(index, 1);
        },

        handleBackspace(e) {
            if (this.inputValue === '' && this.tags.length > 0) {
                this.tags.pop();
            }
        },

        isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    }));

    // Stepper Component
    Alpine.data('stepper', (options = {}) => ({
        currentStep: options.currentStep || 1,
        totalSteps: options.totalSteps || 1,
        clickable: options.clickable || false,
        wireModel: options.wireModel || '',

        init() {
            // Sync with Livewire if wire:model is set
            if (this.wireModel && this.$wire) {
                // Watch for Livewire updates
                this.$wire.$watch(this.wireModel, (value) => {
                    this.currentStep = value;
                });

                // Watch for Alpine updates and sync to Livewire
                this.$watch('currentStep', (value) => {
                    this.$wire.set(this.wireModel, value);
                });
            }
        },

        goToStep(step) {
            if (!this.clickable) return;
            if (step > this.currentStep) return; // Can only go back to completed steps
            this.currentStep = step;
        },

        nextStep() {
            if (this.currentStep < this.totalSteps) {
                this.currentStep++;
            }
        },

        previousStep() {
            if (this.currentStep > 1) {
                this.currentStep--;
            }
        },

        isCompleted(step) {
            return this.currentStep > step;
        },

        isCurrent(step) {
            return this.currentStep === step;
        }
    }));

    // Progress Ring Component
    Alpine.data('progressRing', (options = {}) => ({
        value: options.value || 0,
        max: options.max || 100,
        wireModel: options.wireModel || '',

        init() {
            if (this.wireModel && this.$wire) {
                this.$wire.$watch(this.wireModel, (val) => {
                    this.value = val;
                });
            }
        },

        get percentage() {
            return Math.min(100, Math.max(0, (this.value / this.max) * 100));
        }
    }));

    // Sortable List Component
    Alpine.data('sortableList', (options = {}) => ({
        items: options.items || [],
        itemKey: options.itemKey || 'id',
        sortable: null,
        onUpdate: options.onUpdate || null,

        init() {
            this.$nextTick(() => {
                const list = this.$refs.sortableList;
                if (!list || !window.Sortable) return;

                this.sortable = new window.Sortable(list, {
                    animation: 150,
                    ghostClass: 'opacity-50',
                    dragClass: 'shadow-lg',
                    handle: '.sortable-handle',
                    forceFallback: true,
                    fallbackClass: 'sortable-fallback',
                    onEnd: (evt) => {
                        // Get all item IDs in new order
                        const items = list.querySelectorAll('[data-id]');
                        const orderedIds = Array.from(items).map(item => parseInt(item.dataset.id));

                        // Call the callback if provided
                        if (this.onUpdate && typeof this.onUpdate === 'function') {
                            this.onUpdate(orderedIds);
                        }
                    }
                });
            });
        },

        destroy() {
            if (this.sortable) {
                this.sortable.destroy();
            }
        }
    }));

    // Color Picker Component
    Alpine.data('colorPicker', (initialValue) => ({
        color: initialValue || '#3b82f6',
        open: false,
        rgb: { r: 59, g: 130, b: 246 },

        init() {
            this.parseHexToRgb(this.color);
            this.$watch('color', (val) => {
                if (val && val.match(/^#[0-9A-Fa-f]{6}$/)) {
                    this.parseHexToRgb(val);
                }
            });
        },

        parseHexToRgb(hex) {
            const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
            if (result) {
                this.rgb.r = parseInt(result[1], 16);
                this.rgb.g = parseInt(result[2], 16);
                this.rgb.b = parseInt(result[3], 16);
            }
        },

        rgbToHex(r, g, b) {
            return '#' + [r, g, b].map(x => {
                const hex = parseInt(x).toString(16);
                return hex.length === 1 ? '0' + hex : hex;
            }).join('');
        },

        updateFromRgb() {
            this.color = this.rgbToHex(this.rgb.r, this.rgb.g, this.rgb.b);
        },

        selectColor(hex) {
            this.color = hex;
            this.parseHexToRgb(hex);
        },

        validateAndUpdate(value) {
            if (value.match(/^#[0-9A-Fa-f]{6}$/)) {
                this.color = value;
            }
        },

        copyToClipboard() {
            navigator.clipboard.writeText(this.color);
        }
    }));

    // Tree View Component
    Alpine.data('treeView', (options = {}) => ({
        defaultExpanded: options.defaultExpanded || false,
        selectable: options.selectable || false,
        selectedItems: [],

        toggleItem(id) {
            if (!this.selectable) return;

            const index = this.selectedItems.indexOf(id);
            if (index > -1) {
                this.selectedItems.splice(index, 1);
            } else {
                this.selectedItems.push(id);
            }
        },

        isSelected(id) {
            return this.selectedItems.includes(id);
        }
    }));

    // Code Snippet Component
    Alpine.data('codeSnippet', (options = {}) => ({
        code: options.code || '',
        copyable: options.copyable !== false,
        copied: false,

        async copyCode() {
            if (!this.copyable) return;

            try {
                await navigator.clipboard.writeText(this.code);
                this.copied = true;
                setTimeout(() => {
                    this.copied = false;
                }, 2000);
            } catch (err) {
                console.error('Failed to copy:', err);
            }
        }
    }));

    // Context Menu Component
    Alpine.data('contextMenu', (options = {}) => ({
        items: options.items || [],
        isOpen: false,
        position: { x: 0, y: 0 },

        open(event) {
            this.isOpen = true;
            this.position = {
                x: Math.min(event.clientX, window.innerWidth - 200),
                y: Math.min(event.clientY, window.innerHeight - 300)
            };
        },

        close() {
            this.isOpen = false;
        },

        executeAction(action) {
            if (action) {
                this.$wire.handleContextAction(action);
            }
        }
    }));

    // Accordion Component
    Alpine.data('accordion', (options = {}) => ({
        multiple: options.multiple || false,
        openItems: options.defaultOpen !== null ? [options.defaultOpen] : [],

        toggle(index) {
            if (this.multiple) {
                const idx = this.openItems.indexOf(index);
                if (idx > -1) {
                    this.openItems.splice(idx, 1);
                } else {
                    this.openItems.push(index);
                }
            } else {
                this.openItems = this.isOpen(index) ? [] : [index];
            }
        },

        isOpen(index) {
            return this.openItems.includes(index);
        }
    }));

    // Command Palette Component
    Alpine.data('commandPalette', () => ({
        selectedIndex: 0,

        init() {
            this.$watch('$wire.showCommandPalette', (value) => {
                if (value) {
                    this.selectedIndex = 0;
                }
            });
        },

        navigateUp() {
            if (this.selectedIndex > 0) {
                this.selectedIndex--;
            }
        },

        navigateDown(maxItems) {
            if (this.selectedIndex < maxItems - 1) {
                this.selectedIndex++;
            }
        }
    }));

    // Date Picker Component
    Alpine.data('datePicker', (initialValue) => ({
        open: false,
        value: initialValue || '',
        displayValue: '',
        viewMonth: new Date().getMonth(),
        viewYear: new Date().getFullYear(),
        selectedDay: null,
        selectedMonth: null,
        selectedYear: null,
        minDate: null,
        maxDate: null,
        monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],

        init() {
            if (this.value) this.parseValue(this.value);
            this.$watch('value', (val) => {
                if (val) this.parseValue(val);
                else {
                    this.displayValue = '';
                    this.selectedDay = null;
                    this.selectedMonth = null;
                    this.selectedYear = null;
                }
            });
        },

        get emptyDays() {
            let first = new Date(this.viewYear, this.viewMonth, 1).getDay();
            return first === 0 ? 6 : first - 1;
        },

        get daysInMonth() {
            const count = new Date(this.viewYear, this.viewMonth + 1, 0).getDate();
            return Array.from({ length: count }, (_, i) => i + 1);
        },

        parseValue(val) {
            const parts = val.split('/');
            if (parts.length === 3) {
                this.selectedDay = parseInt(parts[0]);
                this.selectedMonth = parseInt(parts[1]) - 1;
                this.selectedYear = parseInt(parts[2]);
                this.viewMonth = this.selectedMonth;
                this.viewYear = this.selectedYear;
                this.displayValue = `${this.selectedDay} ${this.monthNames[this.selectedMonth]} ${this.selectedYear}`;
            }
        },

        toggle() { this.open = !this.open; },

        prevMonth() {
            if (this.viewMonth === 0) { this.viewMonth = 11; this.viewYear--; }
            else { this.viewMonth--; }
        },

        nextMonth() {
            if (this.viewMonth === 11) { this.viewMonth = 0; this.viewYear++; }
            else { this.viewMonth++; }
        },

        selectDate(day) {
            if (this.isDisabled(day)) return;
            this.selectedDay = day;
            this.selectedMonth = this.viewMonth;
            this.selectedYear = this.viewYear;
            const d = String(day).padStart(2, '0');
            const m = String(this.viewMonth + 1).padStart(2, '0');
            this.value = `${d}/${m}/${this.viewYear}`;
            this.displayValue = `${day} ${this.monthNames[this.viewMonth]} ${this.viewYear}`;
            this.open = false;
        },

        isSelected(day) {
            return day === this.selectedDay && this.viewMonth === this.selectedMonth && this.viewYear === this.selectedYear;
        },

        isToday(day) {
            const today = new Date();
            return day === today.getDate() && this.viewMonth === today.getMonth() && this.viewYear === today.getFullYear();
        },

        isDisabled(day) {
            const date = new Date(this.viewYear, this.viewMonth, day);
            if (this.minDate) {
                const min = new Date(this.minDate);
                min.setHours(0, 0, 0, 0);
                if (date < min) return true;
            }
            if (this.maxDate) {
                const max = new Date(this.maxDate);
                max.setHours(23, 59, 59, 999);
                if (date > max) return true;
            }
            return false;
        },

        goToday() {
            const today = new Date();
            this.viewMonth = today.getMonth();
            this.viewYear = today.getFullYear();
            if (!this.isDisabled(today.getDate())) {
                this.selectDate(today.getDate());
            }
        },

        clear() {
            this.value = '';
            this.displayValue = '';
            this.selectedDay = null;
            this.selectedMonth = null;
            this.selectedYear = null;
        }
    }));

    // Theme handling
    const theme =
        localStorage.getItem('theme') ??
        getComputedStyle(document.documentElement).getPropertyValue('--default-theme-mode')

    window.Alpine.store(
        'theme',
        theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)
            ? 'dark'
            : 'light',
    )

    window.addEventListener('theme-changed', (event) => {
        let theme = event.detail

        localStorage.setItem('theme', theme)

        if (theme === 'system') {
            theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }

        window.Alpine.store('theme', theme)
    })

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (event) => {
        if (localStorage.getItem('theme') === 'system') {
            window.Alpine.store('theme', event.matches ? 'dark' : 'light')
        }
    })

    window.Alpine.effect(() => {
        const theme = window.Alpine.store('theme')

        theme === 'dark'
            ? document.documentElement.classList.add('dark')
            : document.documentElement.classList.remove('dark')
    })
})

Livewire.start()
