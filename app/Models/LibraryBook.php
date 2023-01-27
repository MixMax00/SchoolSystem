<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryBook extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function className()
    {
        return $this->belongsTo(Classes::class, 'class_id','id');
    }
    public function bookCategory()
    {
        return $this->belongsTo(BookCategory::class, 'book_category','id');
    }
}
