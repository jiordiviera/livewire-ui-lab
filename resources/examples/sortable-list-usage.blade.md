```blade
{{-- Livewire Component --}}
class TaskList extends Component
{
    public array $tasks = [
        ['id' => 1, 'title' => 'Task 1'],
        ['id' => 2, 'title' => 'Task 2'],
        ['id' => 3, 'title' => 'Task 3'],
    ];

    public function updateOrder(array $ids): void
    {
        $tasksById = collect($this->tasks)
            ->keyBy('id')->toArray();
        $this->tasks = array_map(
            fn($id) => $tasksById[$id], $ids
        );
    }
}

{{-- Blade View --}}
<div x-data="sortableList({
    items: @js($tasks),
    itemKey: 'id',
    onUpdate: (ids) => $wire.updateOrder(ids)
})">
    <ul x-ref="sortableList" class="space-y-2">
        @foreach($tasks as $task)
            <li data-id="{{ $task['id'] }}"
                class="sortable-item">
                <div class="sortable-handle">
                    <x-lucide-grip-vertical />
                </div>
                <span>{{ $task['title'] }}</span>
            </li>
        @endforeach
    </ul>
</div>

{{-- With Custom Styling --}}
<div x-data="sortableList({
    items: @js($items),
    onUpdate: (ids) => handleReorder(ids)
})"
    class="bg-card rounded-lg p-4"
>
    <ul x-ref="sortableList">
        @foreach($items as $item)
            <li data-id="{{ $item['id'] }}"
                class="flex items-center gap-3 p-3
                    border rounded-lg mb-2
                    hover:border-primary/50">
                <div class="sortable-handle
                    cursor-grab active:cursor-grabbing">
                    ≡
                </div>
                {{ $item['name'] }}
            </li>
        @endforeach
    </ul>
</div>
```
