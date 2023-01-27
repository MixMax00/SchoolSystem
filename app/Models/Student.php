<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ["id"];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasPermission($permission): bool
    {
        return $this->role->permission()->where('slug',$permission)->first() ? true : false;
    }

    public function studentQulification()
    {
        return $this->hasMany(EducationQualifications::class);
    }

	public function districts()
	{
	    return $this->belongsTo(District::class, 'zila', 'id');
	}
	public function thanas()
	{
	    return $this->belongsTo(Thana::class, 'upzila', 'id');
	}
	public function unions()
	{
	    return $this->belongsTo(Union::class, 'union', 'id');
	}


	public function g_districts()
	{
	    return $this->belongsTo(District::class, 'g_zila', 'id');
	}
	public function g_thanas()
	{
	    return $this->belongsTo(Thana::class, 'g_upzila', 'id');
	}
	public function g_unions()
	{
	    return $this->belongsTo(Union::class, 'g_union', 'id');
	}

    public function loc_districts()
	{
	    return $this->belongsTo(District::class, 'loc_zila', 'id');
	}
	public function loc_thanas()
	{
	    return $this->belongsTo(Thana::class, 'loc_upzila', 'id');
	}
	public function loc_unions()
	{
	    return $this->belongsTo(Union::class, 'loc_union', 'id');
	}

	public function trades()
	{
	    return $this->belongsTo(Trade::class, 'trade', 'id');
	}
	public function courses()
	{
	    return $this->belongsTo(Course::class, 'course', 'id');
	}
}
