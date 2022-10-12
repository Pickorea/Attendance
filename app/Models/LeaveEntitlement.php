<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\LeaveEntitlement;

class LeaveEntitlement extends Model
{
    use HasFactory;

    protected $table = 'salary_level_user';

 
    protected $fillable = [

                    // 'created_by', 
                    'salary_level_id',
                    'user_id',
                    'leave_entitlement',
                   
                ];

   
    public function leaveEntitlement()
    {
        return $this->hasMany(leaveEntitlement::class);
    }

    

}
