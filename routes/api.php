<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Registration Route
Route::post('/register', [AuthController::class, 'register']);

// Login Route
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout Route
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);



Route::prefix('employees')->group(function () {
    Route::get('{name}/managers', [EmployeeController::class, 'getManagers'])->name('employees.managers');
    Route::get('average-salary-by-age-group', [EmployeeController::class, 'getAverageSalaryByAgeGroup'])->name('employees.average-salary-by-age-group');
    Route::get('stable-department', [EmployeeController::class, 'getStableDepartmentEmployees'])->name('employees.stable-department');
});

// Group department-related routes
Route::prefix('departments')->group(function () {
    Route::get('{id}/top-employees', [EmployeeController::class, 'getTopEmployeesByDepartment'])->name('departments.top-employees');
    Route::get('average-project-duration', [ProjectController::class, 'getAverageProjectDuration'])->name('departments.average-project-duration');
});

// Group project-related routes
Route::prefix('projects')->group(function () {
    Route::get('search', [ProjectController::class, 'searchProjects'])->name('projects.search');
});
