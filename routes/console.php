<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Test command that fails (for testing smart-scheduler notifications)
Artisan::command('test:fail', function () {
    $this->error('This command intentionally fails!');

    return 1; // Non-zero exit code = failure
})->purpose('Test command that always fails');

/*
|--------------------------------------------------------------------------
| Scheduled Tasks (Smart Scheduler Testing)
|--------------------------------------------------------------------------
*/

// Test task: runs every minute for testing
Schedule::command('inspire')->everyMinute()->description('Test inspire command');

// Test failing task (for notification testing)
Schedule::command('test:fail')->everyMinute()->description('Test failing task');

// Smart Scheduler maintenance commands
Schedule::command('smart-scheduler:purge')->daily()->description('Purge old scheduler records');
Schedule::command('smart-scheduler:detect-stuck')->everyThirtyMinutes()->description('Detect stuck tasks');
