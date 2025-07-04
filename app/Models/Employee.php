<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'designation',
        'position',
        'birthdate',
        'gender',
        'contact_number',
        'date_hired',
        'date_resigned',
        'status',
        'philhealth',
        'sss',
        'pagibig',
        'taxes',
        'house_number',
        'street',
        'barangay_municipality'
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
} 