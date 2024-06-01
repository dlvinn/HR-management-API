<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name', 'description', 'start_date', 'end_date', 'status'];


    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_project');
    }
}
