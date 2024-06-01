<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeProject extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Define the relationship between Employee and Project
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
