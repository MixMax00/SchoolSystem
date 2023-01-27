<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id','id');
    }
}
