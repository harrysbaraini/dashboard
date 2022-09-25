<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Dashboard;
use App\Http\Livewire\Clock;
use Illuminate\Database\Seeder;
use App\Http\Livewire\Calendar;
use App\Http\Livewire\LinksList;
use App\Http\Livewire\SlackStatus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $user1 = \App\Models\User::factory()->create([
             'name' => 'Test User 1',
             'email' => 'user1@example.com',
         ]);

        $user1->dashboards()->create([
            'name' => 'Dashboard 1',
            'settings' => [
                'grid' => [10, 6],
            ],
            'widgets' => [
                [
                    'class' => SlackStatus::class,
                    'position' => [1, 1],
                    'size' => [2, 1],
                    'active' => true,
                    'config' => [
                        'channels' => [
                            'partner-valley-metro',
                            'valley-metro',
                            'pfizer',
                        ],
                    ],
                ],
                [
                    'class' => Clock::class,
                    'position' => [7, 6],
                    'size' => [4, 1],
                    'active' => true,
                    'config' => [
                        'direction' => 'h',
                        'timezones' => [
                            'America/Sao_Paulo' => 'Brazil',
                            'America/New_York' => 'New York',
                            'America/Phoenix' => 'Phoenix',
                        ],
                    ],
                ],
                [
                    'class' => Calendar::class,
                    'position' => [1, 2],
                    'size' => [2, 3],
                    'active' => true,
                    'config' => [
                        'calendarId' => 'vanderlei@kirschbaumdevelopment.com',
                        'max' => 4,
                    ],
                ],
                [
                    'class' => LinksList::class,
                    'position' => [9, 1],
                    'size' => [2, 2],
                    'active' => true,
                    'config' => [
                        'heading' => 'Pfizer Links',
                        'links' => [
                            ['label' => 'Sprint Board', 'url' => 'https://digitalpfizer.atlassian.net/jira/software/c/projects/CANDEV/boards/1981'],
                            ['label' => 'Github PRs', 'url' => 'https://github.com/pfizer/dream-well/pulls'],
                            ['label' => 'Staging Canvas', 'url' => 'https://dev.canvas.digitalpfizer.com'],
                            ['label' => 'Local Canvas', 'url' => 'https://dream-well.test'],
                        ],
                    ],
                ],
                [
                    'class' => LinksList::class,
                    'position' => [9, 3],
                    'size' => [2, 2],
                    'active' => true,
                    'config' => [
                        'heading' => 'Valley Metro Links',
                        'links' => [
                            ['label' => 'Sprint Board', 'url' => 'https://app.asana.com/0/1202790878750322/list'],
                            ['label' => 'Github PRs', 'url' => 'https://github.com/valleymetro/valley-metro-vulcan/pulls'],
                            ['label' => 'Staging Site', 'url' => 'https://vulcan.valleymetro.org'],
                            ['label' => 'Local Site', 'url' => 'https://valleymetro.test'],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
