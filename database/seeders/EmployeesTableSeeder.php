<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $names = [
            'John Doe', 'Jane Smith', 'Michael Johnson', 'Emily Davis',
            'David Brown', 'Emma Wilson', 'Christopher Taylor', 'Olivia Martinez',
            'Daniel Anderson', 'Sophia Thomas'
        ];
        for ($i = 0; $i < 10; $i++) {
            $employeeIds = Employee::pluck('id');

            Employee::create([
                'full_name' => $names[$i],
                'age' => rand(20, 60),
                'salary' => rand(20000, 100000),
                'date_of_employment' => now()->subDays(rand(1, 365 * 5)), // Random date within the last 5 years
                'manager_id' => count($employeeIds->toArray()) <= 0 ? null : $employeeIds->random(),
                'department_id' => DB::table('departments')->inRandomOrder()->value('id'),
            ]);
        }
    }
}
