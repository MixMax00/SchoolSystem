<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trade;

class OnlineAdmission extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function divisions()
	{
	    return $this->belongsTo(Division::class, 'division', 'id');
	}
	public function districts()
	{
	    return $this->belongsTo(District::class, 'district', 'id');
	}
	public function thanas()
	{
	    return $this->belongsTo(Thana::class, 'thana', 'id');
	}
	public function unions()
	{
	    return $this->belongsTo(Union::class, 'union', 'id');
	}

	public function per_divisions()
	{
	    return $this->belongsTo(Division::class, 'per_division', 'id');
	}
	public function per_districts()
	{
	    return $this->belongsTo(District::class, 'per_district', 'id');
	}
	public function per_thanas()
	{
	    return $this->belongsTo(Thana::class, 'per_thana', 'id');
	}
	public function per_unions()
	{
	    return $this->belongsTo(Union::class, 'per_union', 'id');
	}

	public function trades()
	{
	    return $this->belongsTo(Trade::class, 'trade_id', 'id');
	}
	public function courses()
	{
	    return $this->belongsTo(Course::class, 'course_id', 'id');
	}
}
