<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function trades()
	{
	    return $this->belongsTo(Trade::class, 'trade_id', 'trade_code');
	}

}
