<?php

namespace App\Livewire\Days;

use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Day7 extends Component
{
    use WithPagination;

    public int $dayNumber;

    // Sample data for pagination
    private function getAllCities(): Collection
    {
        return collect([
            ['id' => 1, 'name' => 'Yaoundé', 'region' => 'Centre', 'population' => '4 million'],
            ['id' => 2, 'name' => 'Douala', 'region' => 'Littoral', 'population' => '3.5 million'],
            ['id' => 3, 'name' => 'Bafoussam', 'region' => 'Ouest', 'population' => '500k'],
            ['id' => 4, 'name' => 'Garoua', 'region' => 'Nord', 'population' => '600k'],
            ['id' => 5, 'name' => 'Bamenda', 'region' => 'Nord-Ouest', 'population' => '500k'],
            ['id' => 6, 'name' => 'Maroua', 'region' => 'Extrême-Nord', 'population' => '400k'],
            ['id' => 7, 'name' => 'Ngaoundéré', 'region' => 'Adamaoua', 'population' => '300k'],
            ['id' => 8, 'name' => 'Bertoua', 'region' => 'Est', 'population' => '200k'],
            ['id' => 9, 'name' => 'Buea', 'region' => 'Sud-Ouest', 'population' => '200k'],
            ['id' => 10, 'name' => 'Ebolowa', 'region' => 'Sud', 'population' => '150k'],
            ['id' => 11, 'name' => 'Kribi', 'region' => 'Sud', 'population' => '100k'],
            ['id' => 12, 'name' => 'Limbe', 'region' => 'Sud-Ouest', 'population' => '120k'],
            ['id' => 13, 'name' => 'Edéa', 'region' => 'Littoral', 'population' => '200k'],
            ['id' => 14, 'name' => 'Kumba', 'region' => 'Sud-Ouest', 'population' => '180k'],
            ['id' => 15, 'name' => 'Dschang', 'region' => 'Ouest', 'population' => '100k'],
        ]);
    }

    public function getPaginatedDataProperty(): LengthAwarePaginator
    {
        $allItems = $this->getAllCities();
        $perPage = 5;
        $currentPage = $this->getPage();

        $items = $allItems->forPage($currentPage, $perPage);

        return new LengthAwarePaginator(
            $items,
            $allItems->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'pageName' => 'page']
        );
    }

    public function render(): View
    {
        return view('livewire.days.day7');
    }
}
