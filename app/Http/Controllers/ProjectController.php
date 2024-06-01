<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    public function searchProjects(Request $request)
    {
        $searchTerm = $request->input('search');

        $projects = DB::select("
        SELECT p.*
        FROM projects p
        LEFT JOIN employee_project ep ON p.id = ep.project_id
        LEFT JOIN employees e ON e.id = ep.employee_id
        WHERE p.name LIKE ? OR p.description LIKE ? OR e.full_name LIKE ?
        GROUP BY p.id;
    ", ["%$searchTerm%", "%$searchTerm%", "%$searchTerm%"]);

        return response()->json($projects);
    }

    public function getAverageProjectDuration()
    {
        $durations = DB::select("
            SELECT d.name AS department_name, AVG(p.end_date - p.start_date) AS avg_project_duration
            FROM departments d
            JOIN employees e ON d.id = e.department_id
            JOIN employee_project ep ON e.id = ep.employee_id
            JOIN projects p ON ep.project_id = p.id
            GROUP BY d.name;
        ");

        return response()->json($durations);
    }
}
