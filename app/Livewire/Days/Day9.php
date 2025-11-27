<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day9 extends Component
{
    public int $dayNumber = 9;

    // Sample data for the data table
    public array $users = [];

    public function mount(): void
    {
        $this->users = [
            ['id' => 1, 'name' => 'Jean-Paul Kamga', 'email' => 'jp.kamga@example.com', 'role' => 'Admin', 'status' => 'Active', 'city' => 'Douala'],
            ['id' => 2, 'name' => 'Marie Eyenga', 'email' => 'marie.e@example.com', 'role' => 'Editor', 'status' => 'Active', 'city' => 'Yaoundé'],
            ['id' => 3, 'name' => 'Pierre Nkoulou', 'email' => 'p.nkoulou@example.com', 'role' => 'Viewer', 'status' => 'Inactive', 'city' => 'Bafoussam'],
            ['id' => 4, 'name' => 'Chantal Mbarga', 'email' => 'c.mbarga@example.com', 'role' => 'Editor', 'status' => 'Active', 'city' => 'Douala'],
            ['id' => 5, 'name' => 'Alain Fotso', 'email' => 'a.fotso@example.com', 'role' => 'Admin', 'status' => 'Active', 'city' => 'Bamenda'],
            ['id' => 6, 'name' => 'Rose Atangana', 'email' => 'r.atangana@example.com', 'role' => 'Viewer', 'status' => 'Active', 'city' => 'Yaoundé'],
            ['id' => 7, 'name' => 'Samuel Tabi', 'email' => 's.tabi@example.com', 'role' => 'Editor', 'status' => 'Inactive', 'city' => 'Kribi'],
            ['id' => 8, 'name' => 'Florence Ngono', 'email' => 'f.ngono@example.com', 'role' => 'Viewer', 'status' => 'Active', 'city' => 'Douala'],
            ['id' => 9, 'name' => 'Emmanuel Tchinda', 'email' => 'e.tchinda@example.com', 'role' => 'Admin', 'status' => 'Active', 'city' => 'Bafoussam'],
            ['id' => 10, 'name' => 'Germaine Biya', 'email' => 'g.biya@example.com', 'role' => 'Editor', 'status' => 'Inactive', 'city' => 'Yaoundé'],
            ['id' => 11, 'name' => 'Patrick Eto\'o', 'email' => 'p.etoo@example.com', 'role' => 'Viewer', 'status' => 'Active', 'city' => 'Douala'],
            ['id' => 12, 'name' => 'Sandrine Mbia', 'email' => 's.mbia@example.com', 'role' => 'Editor', 'status' => 'Active', 'city' => 'Limbe'],
            ['id' => 13, 'name' => 'Roger Song', 'email' => 'r.song@example.com', 'role' => 'Admin', 'status' => 'Active', 'city' => 'Buea'],
            ['id' => 14, 'name' => 'Celine Njock', 'email' => 'c.njock@example.com', 'role' => 'Viewer', 'status' => 'Inactive', 'city' => 'Edéa'],
            ['id' => 15, 'name' => 'Bertrand Nlend', 'email' => 'b.nlend@example.com', 'role' => 'Editor', 'status' => 'Active', 'city' => 'Douala'],
        ];
    }

    public function getTableColumns(): array
    {
        return [
            ['key' => 'id', 'label' => 'ID', 'sortable' => true, 'filterable' => false],
            ['key' => 'name', 'label' => 'Name', 'sortable' => true, 'filterable' => false],
            ['key' => 'email', 'label' => 'Email', 'sortable' => true, 'filterable' => false],
            ['key' => 'role', 'label' => 'Role', 'sortable' => true, 'filterable' => true],
            ['key' => 'status', 'label' => 'Status', 'sortable' => true, 'filterable' => true],
            ['key' => 'city', 'label' => 'City', 'sortable' => true, 'filterable' => true],
        ];
    }

    public function render(): View
    {
        return view('livewire.days.day9');
    }
}
