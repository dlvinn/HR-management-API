<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function getManagers($name)
    {
        $managers = DB::select("
        WITH RECURSIVE manager_hierarchy AS (
            SELECT id, full_name, manager_id
            FROM employees
            WHERE full_name = ?
            UNION ALL
            SELECT e.id, e.full_name, e.manager_id
            FROM employees e
            INNER JOIN manager_hierarchy mh ON mh.manager_id = e.id
        )
        SELECT * FROM manager_hierarchy;
    ", [$name]);

        return response()->json($managers);
    }


    public function getAverageSalaryByAgeGroup()
    {
        $salaries = DB::select("
        SELECT FLOOR(age / 10) * 10 AS age_group_start,
               (FLOOR(age / 10) * 10 + 9) AS age_group_end,
               AVG(salary) AS average_salary
        FROM employees
        GROUP BY FLOOR(age / 10)
        ORDER BY age_group_start;
    ");

        return response()->json($salaries);
    }

    public function getTopEmployeesByDepartment($id)
    {
        $employees = DB::select("
        SELECT e.id, e.full_name, COUNT(ep.project_id) AS project_count
        FROM employees e
        JOIN employee_project ep ON e.id = ep.employee_id
        JOIN projects p ON p.id = ep.project_id
        WHERE e.department_id = ? AND p.status = 'finished'
        GROUP BY e.id, e.full_name
        ORDER BY project_count DESC
        LIMIT 10;
    ", [$id]);

        return response()->json($employees);
    }

    public function getStableDepartmentEmployees()
    {
        $employees = DB::select("
            SELECT DISTINCT e.id, e.full_name, d.name AS department_name
            FROM employees AS e
            INNER JOIN departments AS d ON e.department_id = d.id
            WHERE e.id IN (
                SELECT employee_id
                FROM (
                    SELECT employee_id, COUNT(DISTINCT e.department_id) AS department_count
                    FROM employees AS e
                    INNER JOIN employee_project AS ep ON e.id = ep.employee_id
                    GROUP BY employee_id
                    HAVING COUNT(DISTINCT e.department_id) = 1
                ) AS subquery
            );
        ");

        return response()->json($employees);
    }
}
