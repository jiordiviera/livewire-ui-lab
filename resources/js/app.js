import intersect from '@alpinejs/intersect'
import Tooltip from '@ryangjchandler/alpine-tooltip'
import collapse from '@alpinejs/collapse'

import './utils/helpers'
import './utils/scrollspy'
import './utils/clipboard'

Alpine.plugin(intersect)
Alpine.plugin(Tooltip)
Alpine.plugin(collapse)

window.Alpine = Alpine

document.addEventListener('alpine:init', () => {
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
