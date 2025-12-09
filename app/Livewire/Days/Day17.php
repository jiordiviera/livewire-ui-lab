<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day17 extends Component
{
    public int $dayNumber = 17;

    // Sortable list items
    public array $tasks = [];

    // Timeline events
    public array $timelineEvents = [];

    public function mount(): void
    {
        $this->tasks = [
            ['id' => 1, 'title' => 'Réviser le design du dashboard', 'priority' => 'high', 'status' => 'pending'],
            ['id' => 2, 'title' => 'Implémenter l\'authentification', 'priority' => 'high', 'status' => 'completed'],
            ['id' => 3, 'title' => 'Créer les tests unitaires', 'priority' => 'medium', 'status' => 'pending'],
            ['id' => 4, 'title' => 'Optimiser les requêtes SQL', 'priority' => 'medium', 'status' => 'in_progress'],
            ['id' => 5, 'title' => 'Mettre à jour la documentation', 'priority' => 'low', 'status' => 'pending'],
            ['id' => 6, 'title' => 'Déployer en production', 'priority' => 'high', 'status' => 'pending'],
        ];

        $this->timelineEvents = [
            [
                'id' => 1,
                'title' => 'Projet créé',
                'description' => 'Le projet Livewire UI Lab a été initialisé avec Laravel et Livewire.',
                'date' => '2024-01-15',
                'time' => '09:00',
                'type' => 'create',
                'user' => 'Jiordi',
            ],
            [
                'id' => 2,
                'title' => 'Première release',
                'description' => 'Publication de la version 0.1.0 avec les 5 premiers composants.',
                'date' => '2024-02-01',
                'time' => '14:30',
                'type' => 'release',
                'user' => 'Jiordi',
            ],
            [
                'id' => 3,
                'title' => 'Bug corrigé',
                'description' => 'Correction du problème d\'affichage sur mobile pour le composant Modal.',
                'date' => '2024-02-10',
                'time' => '11:15',
                'type' => 'fix',
                'user' => 'Équipe Dev',
            ],
            [
                'id' => 4,
                'title' => 'Nouvelle fonctionnalité',
                'description' => 'Ajout du mode sombre et des thèmes personnalisés.',
                'date' => '2024-03-05',
                'time' => '16:45',
                'type' => 'feature',
                'user' => 'Jiordi',
            ],
            [
                'id' => 5,
                'title' => 'Milestone atteint',
                'description' => 'Le Lab UI a dépassé les 1000 étoiles sur GitHub!',
                'date' => '2024-03-20',
                'time' => '10:00',
                'type' => 'milestone',
                'user' => 'Communauté',
            ],
        ];
    }

    public function updateTaskOrder(array $orderedIds): void
    {
        $tasksById = collect($this->tasks)->keyBy('id')->toArray();
        $this->tasks = array_map(fn($id) => $tasksById[$id], $orderedIds);

        $this->dispatch('toast', [
            'message' => 'Ordre des tâches mis à jour!',
            'type' => 'success',
        ]);
    }

    public function toggleTaskStatus(int $taskId): void
    {
        $this->tasks = array_map(function ($task) use ($taskId) {
            if ($task['id'] === $taskId) {
                $task['status'] = match ($task['status']) {
                    'pending' => 'in_progress',
                    'in_progress' => 'completed',
                    'completed' => 'pending',
                };
            }
            return $task;
        }, $this->tasks);
    }

    public function addTask(string $title): void
    {
        if (empty(trim($title))) {
            return;
        }

        $maxId = max(array_column($this->tasks, 'id'));
        $this->tasks[] = [
            'id' => $maxId + 1,
            'title' => $title,
            'priority' => 'medium',
            'status' => 'pending',
        ];

        $this->dispatch('toast', [
            'message' => 'Tâche ajoutée!',
            'type' => 'success',
        ]);
    }

    public function removeTask(int $taskId): void
    {
        $this->tasks = array_values(array_filter(
            $this->tasks,
            fn($task) => $task['id'] !== $taskId
        ));

        $this->dispatch('toast', [
            'message' => 'Tâche supprimée!',
            'type' => 'info',
        ]);
    }

    public function render(): View
    {
        return view('livewire.days.day17');
    }
}
