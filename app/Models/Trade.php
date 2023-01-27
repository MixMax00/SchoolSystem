<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trade extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id','id');
    }
}
