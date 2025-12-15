<?php

namespace App\Livewire\Days;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Day20 extends Component
{
    public int $dayNumber = 20;

    // Progress Stepped Bar
    public array $orderSteps = [];

    public int $currentOrderStep = 2;

    public array $projectSteps = [];

    public int $currentProjectStep = 3;

    // Heatmap data
    public array $contributionData = [];

    public array $activityData = [];

    public function mount(): void
    {
        // Order tracking steps
        $this->orderSteps = [
            ['label' => 'Order Placed', 'description' => 'Dec 10, 2025'],
            ['label' => 'Processing', 'description' => 'Dec 11, 2025'],
            ['label' => 'Shipped', 'description' => 'Dec 12, 2025'],
            ['label' => 'Out for Delivery', 'description' => 'Expected Dec 14'],
            ['label' => 'Delivered', 'description' => ''],
        ];

        // Project milestones
        $this->projectSteps = [
            ['label' => 'Planning', 'icon' => 'clipboard-list'],
            ['label' => 'Design', 'icon' => 'palette'],
            ['label' => 'Development', 'icon' => 'code'],
            ['label' => 'Testing', 'icon' => 'bug'],
            ['label' => 'Deployment', 'icon' => 'rocket'],
        ];

        // Generate contribution data (like GitHub)
        $this->contributionData = $this->generateContributionData();

        // Generate activity heatmap for hours
        $this->activityData = $this->generateActivityData();
    }

    private function generateContributionData(): array
    {
        $data = [];
        $startDate = Carbon::now()->subDays(364);

        for ($i = 0; $i < 365; $i++) {
            $date = $startDate->copy()->addDays($i);
            // Generate random contribution count (weighted towards 0)
            $rand = mt_rand(0, 100);
            $count = match (true) {
                $rand < 40 => 0,
                $rand < 60 => mt_rand(1, 3),
                $rand < 80 => mt_rand(4, 7),
                $rand < 95 => mt_rand(8, 12),
                default => mt_rand(13, 20),
            };

            $data[] = [
                'date' => $date->format('Y-m-d'),
                'count' => $count,
                'dayOfWeek' => $date->dayOfWeek,
                'week' => $date->weekOfYear,
                'month' => $date->format('M'),
                'monthNum' => $date->month,
            ];
        }

        return $data;
    }

    private function generateActivityData(): array
    {
        $data = [];
        $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

        foreach ($days as $dayIndex => $day) {
            $data[$day] = [];
            for ($hour = 0; $hour < 24; $hour++) {
                // Simulate activity patterns (more activity during work hours)
                $baseActivity = match (true) {
                    $hour >= 9 && $hour <= 12 => mt_rand(5, 10),
                    $hour >= 14 && $hour <= 18 => mt_rand(6, 10),
                    $hour >= 20 && $hour <= 23 => mt_rand(3, 7),
                    default => mt_rand(0, 3),
                };

                // Less activity on weekends
                if ($dayIndex >= 5) {
                    $baseActivity = (int) ($baseActivity * 0.5);
                }

                $data[$day][] = $baseActivity;
            }
        }

        return $data;
    }

    public function nextOrderStep(): void
    {
        if ($this->currentOrderStep < count($this->orderSteps)) {
            $this->currentOrderStep++;
        }
    }

    public function prevOrderStep(): void
    {
        if ($this->currentOrderStep > 1) {
            $this->currentOrderStep--;
        }
    }

    public function setProjectStep(int $step): void
    {
        $this->currentProjectStep = $step;
    }

    public function render(): View
    {
        return view('livewire.days.day20');
    }
}
