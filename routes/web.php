<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return redirect()->route('ui.day', ['day' => 1]);
});

Route::get('/ui/{day}', function (int $day) {
    // we ensure that the day number is valid (between 1 and 100)
    if ($day < 1 || $day > 100) {
        abort(404);
    }

    // Livewire v4 components use emoji prefix
    $componentName = "day{$day}";
    $componentPath = resource_path("views/livewire/days/{$componentName}.blade.php");

    // we check if the Livewire component file exists
    if (! file_exists($componentPath)) {
        return view('components.layouts.ui-viewer', [
            'dayNumber' => $day,
            'componentPath' => "days.{$componentName}",
            'error' => "Component for day {$day} doesn't exist yet.",
        ]);
    }
    $hasNextDay = file_exists(resource_path('views/livewire/days/day'.($day + 1).'.blade.php'));
    $hasPreviousDay = file_exists(resource_path('views/livewire/days/day'.($day - 1).'.blade.php'));

    return view('components.layouts.ui-viewer', [
        'dayNumber' => $day,
        'componentPath' => "days.{$componentName}",
        'hasNextDay' => $hasNextDay,
        'hasPreviousDay' => $hasPreviousDay,
    ]);
})->name('ui.day')->where('day', '[0-9]+');
