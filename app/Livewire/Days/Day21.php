<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day21 extends Component
{
    public int $dayNumber = 21;

    // Command Palette
    public bool $showCommandPalette = false;

    public string $searchQuery = '';

    public array $commands = [];

    public array $recentFiles = [];

    public array $filteredResults = [];

    // File Icons Demo
    public array $sampleFiles = [];

    public function mount(): void
    {
        $this->commands = [
            ['id' => 1, 'type' => 'action', 'icon' => 'file-plus', 'title' => 'New File', 'shortcut' => 'Ctrl+N', 'category' => 'File'],
            ['id' => 2, 'type' => 'action', 'icon' => 'folder-plus', 'title' => 'New Folder', 'shortcut' => 'Ctrl+Shift+N', 'category' => 'File'],
            ['id' => 3, 'type' => 'action', 'icon' => 'save', 'title' => 'Save', 'shortcut' => 'Ctrl+S', 'category' => 'File'],
            ['id' => 4, 'type' => 'action', 'icon' => 'download', 'title' => 'Export Project', 'shortcut' => '', 'category' => 'File'],
            ['id' => 5, 'type' => 'action', 'icon' => 'settings', 'title' => 'Settings', 'shortcut' => 'Ctrl+,', 'category' => 'Preferences'],
            ['id' => 6, 'type' => 'action', 'icon' => 'palette', 'title' => 'Change Theme', 'shortcut' => '', 'category' => 'Preferences'],
            ['id' => 7, 'type' => 'action', 'icon' => 'terminal', 'title' => 'Open Terminal', 'shortcut' => 'Ctrl+`', 'category' => 'View'],
            ['id' => 8, 'type' => 'action', 'icon' => 'layout-grid', 'title' => 'Toggle Sidebar', 'shortcut' => 'Ctrl+B', 'category' => 'View'],
            ['id' => 9, 'type' => 'action', 'icon' => 'git-branch', 'title' => 'Git: Checkout Branch', 'shortcut' => '', 'category' => 'Git'],
            ['id' => 10, 'type' => 'action', 'icon' => 'git-commit', 'title' => 'Git: Commit', 'shortcut' => '', 'category' => 'Git'],
        ];

        $this->recentFiles = [
            ['id' => 101, 'type' => 'file', 'name' => 'app.js', 'path' => 'resources/js/app.js', 'extension' => 'js'],
            ['id' => 102, 'type' => 'file', 'name' => 'Day21.php', 'path' => 'app/Livewire/Days/Day21.php', 'extension' => 'php'],
            ['id' => 103, 'type' => 'file', 'name' => 'tailwind.config.js', 'path' => 'tailwind.config.js', 'extension' => 'js'],
            ['id' => 104, 'type' => 'file', 'name' => 'README.md', 'path' => 'README.md', 'extension' => 'md'],
            ['id' => 105, 'type' => 'file', 'name' => 'composer.json', 'path' => 'composer.json', 'extension' => 'json'],
        ];

        $this->sampleFiles = [
            ['name' => 'document.pdf', 'extension' => 'pdf', 'size' => '2.5 MB'],
            ['name' => 'spreadsheet.xlsx', 'extension' => 'xlsx', 'size' => '156 KB'],
            ['name' => 'presentation.pptx', 'extension' => 'pptx', 'size' => '4.2 MB'],
            ['name' => 'report.docx', 'extension' => 'docx', 'size' => '890 KB'],
            ['name' => 'archive.zip', 'extension' => 'zip', 'size' => '12 MB'],
            ['name' => 'image.png', 'extension' => 'png', 'size' => '1.2 MB'],
            ['name' => 'video.mp4', 'extension' => 'mp4', 'size' => '45 MB'],
            ['name' => 'music.mp3', 'extension' => 'mp3', 'size' => '3.8 MB'],
            ['name' => 'script.js', 'extension' => 'js', 'size' => '24 KB'],
            ['name' => 'styles.css', 'extension' => 'css', 'size' => '18 KB'],
            ['name' => 'component.vue', 'extension' => 'vue', 'size' => '8 KB'],
            ['name' => 'data.json', 'extension' => 'json', 'size' => '4 KB'],
            ['name' => 'config.yaml', 'extension' => 'yaml', 'size' => '2 KB'],
            ['name' => 'notes.txt', 'extension' => 'txt', 'size' => '1 KB'],
            ['name' => 'database.sql', 'extension' => 'sql', 'size' => '56 KB'],
        ];

        $this->filteredResults = $this->getFilteredResults();
    }

    public function updatedSearchQuery(): void
    {
        $this->filteredResults = $this->getFilteredResults();
    }

    private function getFilteredResults(): array
    {
        if (empty($this->searchQuery)) {
            return [
                'recent' => $this->recentFiles,
                'commands' => array_slice($this->commands, 0, 5),
            ];
        }

        $query = strtolower($this->searchQuery);

        $filteredCommands = array_filter($this->commands, function ($command) use ($query) {
            return str_contains(strtolower($command['title']), $query) ||
                   str_contains(strtolower($command['category']), $query);
        });

        $filteredFiles = array_filter($this->recentFiles, function ($file) use ($query) {
            return str_contains(strtolower($file['name']), $query) ||
                   str_contains(strtolower($file['path']), $query);
        });

        return [
            'recent' => array_values($filteredFiles),
            'commands' => array_values($filteredCommands),
        ];
    }

    public function openCommandPalette(): void
    {
        $this->showCommandPalette = true;
        $this->searchQuery = '';
        $this->filteredResults = $this->getFilteredResults();
    }

    public function closeCommandPalette(): void
    {
        $this->showCommandPalette = false;
        $this->searchQuery = '';
    }

    public function executeCommand(int $id): void
    {
        $command = collect($this->commands)->firstWhere('id', $id);

        if ($command) {
            $this->dispatch('toast', [
                'message' => "Executed: {$command['title']}",
                'type' => 'success',
            ]);
        }

        $this->closeCommandPalette();
    }

    public function openFile(int $id): void
    {
        $file = collect($this->recentFiles)->firstWhere('id', $id);

        if ($file) {
            $this->dispatch('toast', [
                'message' => "Opening: {$file['path']}",
                'type' => 'info',
            ]);
        }

        $this->closeCommandPalette();
    }

    public function render(): View
    {
        return view('livewire.days.day21');
    }
}
