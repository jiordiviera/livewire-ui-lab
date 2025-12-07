```blade
{{-- Basic Shortcut --}}
<x-ui.kbd keys="cmd + s" />

{{-- Multiple Keys (string) --}}
<x-ui.kbd keys="ctrl + shift + p" />

{{-- Multiple Keys (array) --}}
<x-ui.kbd :keys="['cmd', 'k']" />

{{-- Navigation Keys --}}
<x-ui.kbd keys="up" />
<x-ui.kbd keys="enter" />
<x-ui.kbd keys="esc" />
<x-ui.kbd keys="tab" />

{{-- Size Variants --}}
<x-ui.kbd keys="cmd + k" size="sm" />
<x-ui.kbd keys="cmd + k" size="md" />
<x-ui.kbd keys="cmd + k" size="lg" />

{{-- Style Variants --}}
<x-ui.kbd keys="cmd + k" variant="default" />
<x-ui.kbd keys="cmd + k" variant="outline" />
<x-ui.kbd keys="cmd + k" variant="ghost" />

{{-- In Context --}}
<p>
    Press <x-ui.kbd keys="cmd + k" size="sm" />
    to open the command palette.
</p>
```
