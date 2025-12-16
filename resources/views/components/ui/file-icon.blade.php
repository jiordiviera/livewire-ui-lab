@props([
    'extension' => '',
    'size' => 'md',
])

@php
    $ext = strtolower($extension);

    $sizeClasses = [
        'xs' => 'h-4 w-4',
        'sm' => 'h-5 w-5',
        'md' => 'h-6 w-6',
        'lg' => 'h-8 w-8',
        'xl' => 'h-10 w-10',
    ];

    $iconSize = $sizeClasses[$size] ?? $sizeClasses['md'];

    // Map extensions to icons and colors
    $fileTypes = [
        // Documents
        'pdf' => ['icon' => 'file-text', 'color' => 'text-red-500', 'bg' => 'bg-red-100 dark:bg-red-900/30'],
        'doc' => ['icon' => 'file-text', 'color' => 'text-blue-600', 'bg' => 'bg-blue-100 dark:bg-blue-900/30'],
        'docx' => ['icon' => 'file-text', 'color' => 'text-blue-600', 'bg' => 'bg-blue-100 dark:bg-blue-900/30'],
        'txt' => ['icon' => 'file-text', 'color' => 'text-gray-500', 'bg' => 'bg-gray-100 dark:bg-gray-800'],
        'md' => ['icon' => 'file-text', 'color' => 'text-gray-600', 'bg' => 'bg-gray-100 dark:bg-gray-800'],

        // Spreadsheets
        'xls' => ['icon' => 'table', 'color' => 'text-green-600', 'bg' => 'bg-green-100 dark:bg-green-900/30'],
        'xlsx' => ['icon' => 'table', 'color' => 'text-green-600', 'bg' => 'bg-green-100 dark:bg-green-900/30'],
        'csv' => ['icon' => 'table', 'color' => 'text-green-500', 'bg' => 'bg-green-100 dark:bg-green-900/30'],

        // Presentations
        'ppt' => ['icon' => 'presentation', 'color' => 'text-orange-500', 'bg' => 'bg-orange-100 dark:bg-orange-900/30'],
        'pptx' => ['icon' => 'presentation', 'color' => 'text-orange-500', 'bg' => 'bg-orange-100 dark:bg-orange-900/30'],

        // Images
        'jpg' => ['icon' => 'image', 'color' => 'text-purple-500', 'bg' => 'bg-purple-100 dark:bg-purple-900/30'],
        'jpeg' => ['icon' => 'image', 'color' => 'text-purple-500', 'bg' => 'bg-purple-100 dark:bg-purple-900/30'],
        'png' => ['icon' => 'image', 'color' => 'text-purple-500', 'bg' => 'bg-purple-100 dark:bg-purple-900/30'],
        'gif' => ['icon' => 'image', 'color' => 'text-purple-500', 'bg' => 'bg-purple-100 dark:bg-purple-900/30'],
        'svg' => ['icon' => 'image', 'color' => 'text-yellow-500', 'bg' => 'bg-yellow-100 dark:bg-yellow-900/30'],
        'webp' => ['icon' => 'image', 'color' => 'text-purple-500', 'bg' => 'bg-purple-100 dark:bg-purple-900/30'],

        // Videos
        'mp4' => ['icon' => 'video', 'color' => 'text-pink-500', 'bg' => 'bg-pink-100 dark:bg-pink-900/30'],
        'mov' => ['icon' => 'video', 'color' => 'text-pink-500', 'bg' => 'bg-pink-100 dark:bg-pink-900/30'],
        'avi' => ['icon' => 'video', 'color' => 'text-pink-500', 'bg' => 'bg-pink-100 dark:bg-pink-900/30'],
        'webm' => ['icon' => 'video', 'color' => 'text-pink-500', 'bg' => 'bg-pink-100 dark:bg-pink-900/30'],

        // Audio
        'mp3' => ['icon' => 'music', 'color' => 'text-cyan-500', 'bg' => 'bg-cyan-100 dark:bg-cyan-900/30'],
        'wav' => ['icon' => 'music', 'color' => 'text-cyan-500', 'bg' => 'bg-cyan-100 dark:bg-cyan-900/30'],
        'ogg' => ['icon' => 'music', 'color' => 'text-cyan-500', 'bg' => 'bg-cyan-100 dark:bg-cyan-900/30'],
        'flac' => ['icon' => 'music', 'color' => 'text-cyan-500', 'bg' => 'bg-cyan-100 dark:bg-cyan-900/30'],

        // Archives
        'zip' => ['icon' => 'archive', 'color' => 'text-amber-600', 'bg' => 'bg-amber-100 dark:bg-amber-900/30'],
        'rar' => ['icon' => 'archive', 'color' => 'text-amber-600', 'bg' => 'bg-amber-100 dark:bg-amber-900/30'],
        '7z' => ['icon' => 'archive', 'color' => 'text-amber-600', 'bg' => 'bg-amber-100 dark:bg-amber-900/30'],
        'tar' => ['icon' => 'archive', 'color' => 'text-amber-600', 'bg' => 'bg-amber-100 dark:bg-amber-900/30'],
        'gz' => ['icon' => 'archive', 'color' => 'text-amber-600', 'bg' => 'bg-amber-100 dark:bg-amber-900/30'],

        // Code - JavaScript/TypeScript
        'js' => ['icon' => 'file-code', 'color' => 'text-yellow-500', 'bg' => 'bg-yellow-100 dark:bg-yellow-900/30'],
        'ts' => ['icon' => 'file-code', 'color' => 'text-blue-500', 'bg' => 'bg-blue-100 dark:bg-blue-900/30'],
        'jsx' => ['icon' => 'file-code', 'color' => 'text-cyan-400', 'bg' => 'bg-cyan-100 dark:bg-cyan-900/30'],
        'tsx' => ['icon' => 'file-code', 'color' => 'text-blue-400', 'bg' => 'bg-blue-100 dark:bg-blue-900/30'],

        // Code - PHP
        'php' => ['icon' => 'file-code', 'color' => 'text-indigo-500', 'bg' => 'bg-indigo-100 dark:bg-indigo-900/30'],

        // Code - Python
        'py' => ['icon' => 'file-code', 'color' => 'text-green-500', 'bg' => 'bg-green-100 dark:bg-green-900/30'],

        // Code - Web
        'html' => ['icon' => 'file-code', 'color' => 'text-orange-500', 'bg' => 'bg-orange-100 dark:bg-orange-900/30'],
        'css' => ['icon' => 'file-code', 'color' => 'text-blue-400', 'bg' => 'bg-blue-100 dark:bg-blue-900/30'],
        'scss' => ['icon' => 'file-code', 'color' => 'text-pink-400', 'bg' => 'bg-pink-100 dark:bg-pink-900/30'],
        'vue' => ['icon' => 'file-code', 'color' => 'text-green-500', 'bg' => 'bg-green-100 dark:bg-green-900/30'],

        // Data
        'json' => ['icon' => 'braces', 'color' => 'text-yellow-600', 'bg' => 'bg-yellow-100 dark:bg-yellow-900/30'],
        'xml' => ['icon' => 'file-code', 'color' => 'text-orange-400', 'bg' => 'bg-orange-100 dark:bg-orange-900/30'],
        'yaml' => ['icon' => 'file-cog', 'color' => 'text-red-400', 'bg' => 'bg-red-100 dark:bg-red-900/30'],
        'yml' => ['icon' => 'file-cog', 'color' => 'text-red-400', 'bg' => 'bg-red-100 dark:bg-red-900/30'],

        // Database
        'sql' => ['icon' => 'database', 'color' => 'text-blue-500', 'bg' => 'bg-blue-100 dark:bg-blue-900/30'],
        'db' => ['icon' => 'database', 'color' => 'text-gray-500', 'bg' => 'bg-gray-100 dark:bg-gray-800'],
        'sqlite' => ['icon' => 'database', 'color' => 'text-blue-400', 'bg' => 'bg-blue-100 dark:bg-blue-900/30'],

        // Config
        'env' => ['icon' => 'file-cog', 'color' => 'text-gray-500', 'bg' => 'bg-gray-100 dark:bg-gray-800'],
        'ini' => ['icon' => 'file-cog', 'color' => 'text-gray-500', 'bg' => 'bg-gray-100 dark:bg-gray-800'],
        'conf' => ['icon' => 'file-cog', 'color' => 'text-gray-500', 'bg' => 'bg-gray-100 dark:bg-gray-800'],

        // Shell
        'sh' => ['icon' => 'terminal', 'color' => 'text-green-400', 'bg' => 'bg-green-100 dark:bg-green-900/30'],
        'bash' => ['icon' => 'terminal', 'color' => 'text-green-400', 'bg' => 'bg-green-100 dark:bg-green-900/30'],
        'zsh' => ['icon' => 'terminal', 'color' => 'text-green-400', 'bg' => 'bg-green-100 dark:bg-green-900/30'],
    ];

    $fileType = $fileTypes[$ext] ?? ['icon' => 'file', 'color' => 'text-gray-400', 'bg' => 'bg-gray-100 dark:bg-gray-800'];
@endphp

<div {{ $attributes->merge(['class' => "inline-flex items-center justify-center rounded-lg p-1.5 {$fileType['bg']}"]) }}>
    @switch($fileType['icon'])
        @case('file-text')
            <x-lucide-file-text class="{{ $iconSize }} {{ $fileType['color'] }}" />
            @break
        @case('table')
            <x-lucide-table class="{{ $iconSize }} {{ $fileType['color'] }}" />
            @break
        @case('presentation')
            <x-lucide-presentation class="{{ $iconSize }} {{ $fileType['color'] }}" />
            @break
        @case('image')
            <x-lucide-image class="{{ $iconSize }} {{ $fileType['color'] }}" />
            @break
        @case('video')
            <x-lucide-video class="{{ $iconSize }} {{ $fileType['color'] }}" />
            @break
        @case('music')
            <x-lucide-music class="{{ $iconSize }} {{ $fileType['color'] }}" />
            @break
        @case('archive')
            <x-lucide-archive class="{{ $iconSize }} {{ $fileType['color'] }}" />
            @break
        @case('file-code')
            <x-lucide-file-code class="{{ $iconSize }} {{ $fileType['color'] }}" />
            @break
        @case('braces')
            <x-lucide-braces class="{{ $iconSize }} {{ $fileType['color'] }}" />
            @break
        @case('database')
            <x-lucide-database class="{{ $iconSize }} {{ $fileType['color'] }}" />
            @break
        @case('file-cog')
            <x-lucide-file-cog class="{{ $iconSize }} {{ $fileType['color'] }}" />
            @break
        @case('terminal')
            <x-lucide-terminal class="{{ $iconSize }} {{ $fileType['color'] }}" />
            @break
        @default
            <x-lucide-file class="{{ $iconSize }} {{ $fileType['color'] }}" />
    @endswitch
</div>
