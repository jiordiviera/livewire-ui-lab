```blade
{{-- Basic Code Snippet --}}
<x-ui.code-snippet
    code="console.log('Hello');"
    language="javascript"
/>

{{-- With Filename --}}
<x-ui.code-snippet
    :code="$code"
    language="php"
    filename="UserController.php"
/>

{{-- Highlight Specific Lines --}}
<x-ui.code-snippet
    :code="$code"
    language="php"
    :highlight-lines="[5, 6, 7]"
/>

{{-- Custom Max Height --}}
<x-ui.code-snippet
    :code="$longCode"
    language="javascript"
    max-height="300px"
/>

{{-- Without Line Numbers --}}
<x-ui.code-snippet
    :code="$code"
    language="bash"
    :show-line-numbers="false"
/>

{{-- Without Copy Button --}}
<x-ui.code-snippet
    :code="$code"
    language="json"
    :copyable="false"
/>

{{-- Supported Languages --}}
php, javascript, typescript,
python, bash, html, css,
json, sql, blade

{{-- Props --}}
code: string (required)
language: string
filename: string|null
showLineNumbers: true|false
highlightLines: array
maxHeight: string (CSS)
copyable: true|false
```
