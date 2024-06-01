<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of department names
        $departmentNames = [
            'Engineering',
            'Marketing',
            'Finance',
            'Human Resources',
            'Sales',
            'Customer Service',
            'Research and Development',
            'Quality Assurance',
            'Information Technology',
            'Legal',
        ];

        // Current date
        $now = Carbon::now();

        // Create departments
        foreach ($departmentNames as $departmentName) {
            Department::create([
                'name' => $departmentName,
                'description' => 'Description for ' . $departmentName,
                'created_at' => $this->getRandomDate($now),
            ]);
        }
    }


    private function getRandomDate(Carbon $now): Carbon
    {
        return $now->copy()->subDays(random_int(0, 1825)); // 1825 days = 5 years
    }
}
