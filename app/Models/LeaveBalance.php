<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LeaveEntitlement;
use DB;

class LeaveBalance extends Model
{
    use HasFactory;

    protected $table = 'leave_balances';

 
    protected $fillable = [

                    'created_by', 
                    'leave_category_id',
                    'total_leave_taken',
                    'year',
                   
                ];

   
    public function leaveEntitlement()
    {
        return $this->hasMany(leaveEntitlement::class);
    }

    public static function getNumOfLeaveEntitlment(){
                
       
        $leaveEntitlement  = DB::table('salary_level_user')
        ->where('user_id', \Auth::user()->id)->value('leave_entitlement');
       

        return $leaveEntitlement;
    }

}
