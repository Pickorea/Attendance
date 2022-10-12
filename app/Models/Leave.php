<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Leave;
use DB;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [

        'created_by', 
        'leave_category_id',
        'start_date', 
        'end_date',
        'num_days', 
        'reason',
        'publication_status',
        'deletion_status',
];
// get the sum of leave days from the leave tables for a leave category for a user
public static function getNumOfLeaveTaken($leave_category_id){

// $leavebalance = Leave::where('leave_category_id',$leave_category_id)->where('created_by',$userId = Auth::user()->id)->sum('num_days');
$leavebalance  = DB::table('leaves')
->where('created_by', \Auth::user()->id)
->where('leave_category_id', $leave_category_id)
->sum('num_days');
return $leavebalance;

}
}
