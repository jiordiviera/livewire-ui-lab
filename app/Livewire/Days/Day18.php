<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day18 extends Component
{
    public int $dayNumber = 18;

    // Tree View data - file system structure
    public array $fileTree = [];

    // Tree View data - organization structure
    public array $orgTree = [];

    // Code snippets for demo
    public array $codeExamples = [];

    public function mount(): void
    {
        $this->fileTree = [
            [
                'id' => 1,
                'name' => 'src',
                'type' => 'folder',
                'children' => [
                    [
                        'id' => 2,
                        'name' => 'components',
                        'type' => 'folder',
                        'children' => [
                            ['id' => 3, 'name' => 'Button.vue', 'type' => 'file', 'icon' => 'vue'],
                            ['id' => 4, 'name' => 'Modal.vue', 'type' => 'file', 'icon' => 'vue'],
                            ['id' => 5, 'name' => 'Input.vue', 'type' => 'file', 'icon' => 'vue'],
                        ],
                    ],
                    [
                        'id' => 6,
                        'name' => 'utils',
                        'type' => 'folder',
                        'children' => [
                            ['id' => 7, 'name' => 'helpers.js', 'type' => 'file', 'icon' => 'js'],
                            ['id' => 8, 'name' => 'api.js', 'type' => 'file', 'icon' => 'js'],
                        ],
                    ],
                    ['id' => 9, 'name' => 'App.vue', 'type' => 'file', 'icon' => 'vue'],
                    ['id' => 10, 'name' => 'main.js', 'type' => 'file', 'icon' => 'js'],
                ],
            ],
            [
                'id' => 11,
                'name' => 'public',
                'type' => 'folder',
                'children' => [
                    ['id' => 12, 'name' => 'index.html', 'type' => 'file', 'icon' => 'html'],
                    ['id' => 13, 'name' => 'favicon.ico', 'type' => 'file', 'icon' => 'image'],
                ],
            ],
            ['id' => 14, 'name' => 'package.json', 'type' => 'file', 'icon' => 'json'],
            ['id' => 15, 'name' => 'README.md', 'type' => 'file', 'icon' => 'md'],
        ];

        $this->orgTree = [
            [
                'id' => 1,
                'name' => 'Direction Générale',
                'role' => 'CEO',
                'avatar' => 'JV',
                'children' => [
                    [
                        'id' => 2,
                        'name' => 'Tech',
                        'role' => 'CTO',
                        'avatar' => 'TC',
                        'children' => [
                            ['id' => 3, 'name' => 'Frontend', 'role' => 'Lead Dev', 'avatar' => 'FD'],
                            ['id' => 4, 'name' => 'Backend', 'role' => 'Lead Dev', 'avatar' => 'BD'],
                            ['id' => 5, 'name' => 'DevOps', 'role' => 'Engineer', 'avatar' => 'DO'],
                        ],
                    ],
                    [
                        'id' => 6,
                        'name' => 'Marketing',
                        'role' => 'CMO',
                        'avatar' => 'MK',
                        'children' => [
                            ['id' => 7, 'name' => 'Digital', 'role' => 'Manager', 'avatar' => 'DM'],
                            ['id' => 8, 'name' => 'Communication', 'role' => 'Manager', 'avatar' => 'CM'],
                        ],
                    ],
                    [
                        'id' => 9,
                        'name' => 'Finance',
                        'role' => 'CFO',
                        'avatar' => 'FN',
                        'children' => [
                            ['id' => 10, 'name' => 'Comptabilité', 'role' => 'Accountant', 'avatar' => 'CP'],
                        ],
                    ],
                ],
            ],
        ];

        $this->codeExamples = [
            'php' => [
                'language' => 'php',
                'filename' => 'UserController.php',
                'code' => '<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);

        return view(\'users.index\', compact(\'users\'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            \'name\' => \'required|string|max:255\',
            \'email\' => \'required|email|unique:users\',
        ]);

        return User::create($validated);
    }
}',
            ],
            'javascript' => [
                'language' => 'javascript',
                'filename' => 'api.js',
                'code' => 'import axios from \'axios\';

const api = axios.create({
    baseURL: \'/api/v1\',
    timeout: 10000,
    headers: {
        \'Content-Type\': \'application/json\',
    },
});

export const fetchUsers = async () => {
    const { data } = await api.get(\'/users\');
    return data;
};

export const createUser = async (userData) => {
    const { data } = await api.post(\'/users\', userData);
    return data;
};

export default api;',
            ],
            'bash' => [
                'language' => 'bash',
                'filename' => 'deploy.sh',
                'code' => '#!/bin/bash

# Deploy script for production
echo "🚀 Starting deployment..."

# Pull latest changes
git pull origin main

# Install dependencies
composer install --no-dev --optimize-autoloader
npm ci && npm run build

# Run migrations
php artisan migrate --force

# Clear caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Deployment complete!"',
            ],
        ];
    }

    public function render(): View
    {
        return view('livewire.days.day18');
    }
}
