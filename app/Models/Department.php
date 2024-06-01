<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public $timestamps = false;

    //  the fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'description',
        'created_at',
    ];

    //  the relationship with employees
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    // the relationship with the manager (who is an employee)
    public function manager()
    {
        return $this->hasOne(Employee::class, 'manager_id');
    }
}
