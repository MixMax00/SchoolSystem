<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    // public function employeeName()
    // {
    //     return $this->belongsTo(Teacher::class, 'user_id','id');
    // }
}
