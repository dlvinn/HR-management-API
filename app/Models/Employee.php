<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'age',
        'salary',
        'date_of_employment',
        'manager_id',
        'department_id'
    ];

    // Define the relationship with the department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Define the relationship with the manager (who is also an employee)
    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    // Define the relationship with subordinates
    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'manager_id');
    }

    // Define the many-to-many relationship with projects
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'employee_project');
    }
}
