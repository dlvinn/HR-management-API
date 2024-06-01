<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 projects
        for ($i = 0; $i < 20; $i++) {
            Project::create([
                'name' => 'Project ' . ($i + 1),
                'description' => 'Description for Project ' . ($i + 1),
                'start_date' => now()->subDays(rand(1, 365 * 5)), // Random date within the last 5 years
                'end_date' => now()->addDays(rand(1, 365)), // Random date within the next year
                'status' => rand(0, 1) ? 'finished' : 'ongoing'
            ]);
        }
    }
}
