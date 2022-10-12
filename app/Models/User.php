<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'created_by', 
        'employee_id', 
        'name',  
        'email',
        'password', 
        'present_address', 
        // 'permanent_address', 
        'id_name', 
        'id_number', 
        'pf_number', 
        // 'contact_no_two', 
        'emergency_contact',  
        'gender', 
        'date_of_birth', 
        'marital_status', 
        'picture', 
        'designation_id', 
        'department_id', 
        'academic_qualification',  
        'joining_date', 
        
       
	];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function leaves(){

        return $this->hasMany(Leave::class);
    }

    public function attendances(){

        return $this->hasMany(Attendance::class,'employee_id', 'id');
    }

    public function designation(){

        return $this->hasOne(Designation::class,'created_by');
    }
    

    public function salarylevels(){
       
        return $this->belongsToMany(SalaryLevel::class)->withPivot(['leave_entitlement']);
    
       }

       public function department()
       {
           return $this->belongsTo(Department::class);
       }

}
