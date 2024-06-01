<?php

namespace Database\Seeders;


use App\Models\Project;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve all employee and project IDs
        $employeeIds = Employee::pluck('id');
        $projectIds = Project::pluck('id');
        // var_dump($projectIds);
        // var_dump($employeeIds);
        // Generate random employee-project assignments
        $assignments = [];
        for ($i = 0; $i < 10; $i++) {
            $assignments[] = [
                'employee_id' => $employeeIds->random() ?? null,
                'project_id' => $projectIds->random() ?? null,
            ];
        }

        // Insert the generated assignments into the pivot table
        DB::table('employee_project')->insert($assignments);
    }
}
