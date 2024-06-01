<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(EmployeeProjectsTableSeeder::class);
    }
}
