<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    // Make the following fields mass assignable
    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'phone_number', 
        'department', 
        'position', 
        'date_of_joining', 
        'salary', 
        'date_of_birth', 
        'gender', 
        'performance_rating', 
        'status'
    ];
}
