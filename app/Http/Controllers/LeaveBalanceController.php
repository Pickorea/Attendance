<?php

namespace App\Http\Controllers;

use App\Models\LeaveBalance;
use App\Models\Leave;
use App\Models\LeaveCategory;
use App\Models\User;
use App\Models\WorkingDay;
use App\Models\Holiday;
use DB;
use PDF;
use App\Models\Attendances;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveBalanceController extends Controller {



	public function index() {
	
		$userId = Auth::user()->id;
     
        //  $leavebalance = DB::table('leave_categories')
        //     ->leftjoin('leave_balances', 'leave_balances.leave_category_id', '=', 'leave_categories.id')
		// 	->leftjoin('users', 'users.id', '=', 'leave_balances.created_by')
        //     ->leftjoin('leaves', 'leaves.leave_category_id', '=', 'leave_categories.id')
        //     ->select('leave_categories.leave_category',DB::raw('SUM(leaves.num_days)'))
        //     ->where([
              
        //         ['leaves.created_by', $userId],
        //         // ['leaves.publication_status',1],
		// 		['leave_categories.id',1]
        //     ])
        //     ->groupBy( 'leaves.num_days','leave_categories.leave_category')
        //     ->first();

		// $leavebalance = Leave::query()
		// ->leftjoin('users as users', 'users.id', '=', 'leaves.created_by')
		// ->leftjoin('leave_balances', 'leave_balances.leave_category_id', '=', 'leave_categories.id')
		// ->leftjoin('leave_categories', 'leave_categories.id', '=', 'leaves.leave_category_id')
		// ->orderBy('leaves.id', 'DESC')
		// ->where('leaves.deletion_status', 0)
		// ->get([
		// 	'leaves.*',
		// 	'users.name',
		// 	'leave_categories.leave_category',
		// 	DB::raw('SUM(leaves.num_days)')
		// ])
		// ->toArray();
		$leavebalance = DB::table("leave_balances")->leftjoin('users','users.id','=', 'leave_balances.created_by')
		->select( 'name','year','total_leave_taken','total_leave_balance')
		// ->where("leave_category_id", "=", 1)
		->get(['year','leaves.num_days','name']);

		// $leavebalance = Leave::where('leave_category_id',1)->where('created_by',$userId = Auth::user()->id)->first()->sum('num_days');

			// dd($leavebalance);

		return view('pdd.leave_balance.manage_application', compact('leavebalance'));
	}

	

}
