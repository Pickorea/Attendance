<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\LeaveBalance;
use App\Models\LeaveCategory;
use App\Models\LeaveEntitlement;
use App\Models\User;
use App\Models\WorkingDay;
use App\Models\Holiday;
use DB;
use PDF;
use App\Models\Attendances;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LeaveController extends Controller {

	public function reports(){
		$carbon = Carbon::now();
		$nowInDhakaTz = Carbon::now('Pacific/Tarawa');
		$year = $nowInDhakaTz->format('Y');

		$users = User::query()
		->leftjoin('designations as designations', 'users.designation_id', 'designations.id')
		// ->whereBetween('users.access_label',array(2, 3))
		// ->where('users.deletion_status', 0)
		->orderBy('users.employee_id', 'asc')
		->get(['users.id', 'users.name', 'users.employee_id', 'designations.designation' ]);

		$attendances = DB::table('attendances')
		->select(DB::raw('count(attendances.status) AS total_attendances'), 'attendances.user_id')
		->whereYear('attendances.logdate', $year)
		->where('status', 1)
		->groupBy('attendances.user_id')
		->get();

		$absences = DB::table('attendances')
		->select(DB::raw('count(attendances.status) AS total_absences'), 'attendances.user_id')
		->whereYear('attendances.logdate', $year)
		->where('status', 0)
		->where('leave_category_id', 0)
		->groupBy('attendances.user_id')
		->get();

		$casual_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.status) AS total_casual_leaves'), 'attendances.user_id')
		->whereYear('attendances.logdate', $year)
		->where('status', 0)
		->where('leave_category_id', 1)
		->groupBy('attendances.user_id')
		->get();

		$earned_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.status) AS total_earned_leaves'), 'attendances.user_id')
		->whereYear('attendances.logdate', $year)
		->where('status', 0)
		->where('leave_category_id', 2)
		->groupBy('attendances.user_id')
		->get();

		$advance_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.status) AS total_advance_leave'), 'attendances.user_id')
		->whereYear('attendances.logdate', $year)
		->where('status', 0)
		->where('leave_category_id', 3)
		->groupBy('attendances.user_id')
		->get();

		$special_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.status) AS total_special_leave'), 'attendances.user_id')
		->whereYear('attendances.logdate', $year)
		->where('status', 0)
		->where('leave_category_id', 4)
		->groupBy('attendances.user_id')
		->get();

		return view('pdd.leave_application.leave_report', compact('users', 'attendances', 'casual_leaves', 'earned_leaves', 'earned_leaves', 'advance_leaves', 'special_leaves', 'absences'));
	}

	public function pdf_reports(){
		$carbon = Carbon::now();
		$nowInDhakaTz = Carbon::now('Asia/Dhaka');
		$year = $nowInDhakaTz->format('Y');

		$users = User::query()
		->leftjoin('designations as designations', 'users.designation_id', 'designations.id')
		// ->whereBetween('users.access_label',array(2, 3))
		// ->where('users.deletion_status', 0)
		->orderBy('users.employee_id', 'asc')
		->get(['users.id', 'users.name', 'users.employee_id', 'designations.designation' ]);

		$attendances = DB::table('attendances')
		->select(DB::raw('count(attendances.status) AS total_attendances'), 'attendances.user_id')
		->whereYear('attendances.logdate', $year)
		->where('status', 1)
		->groupBy('attendances.user_id')
		->get();

		$absences = DB::table('attendances')
		->select(DB::raw('count(attendances.status) AS total_absences'), 'attendances.user_id')
		->whereYear('attendances.logdate', $year)
		->where('status', 0)
		->where('leave_category_id', null)
		->groupBy('attendances.user_id')
		->get();

		$casual_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.status) AS total_casual_leaves'), 'attendances.user_id')
		->whereYear('attendances.logdate', $year)
		->where('status', 0)
		->where('leave_category_id', 1)
		->groupBy('attendances.user_id')
		->get();

		$earned_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.status) AS total_earned_leaves'), 'attendances.user_id')
		->whereYear('attendances.logdate', $year)
		->where('status', 0)
		->where('leave_category_id', 2)
		->groupBy('attendances.user_id')
		->get();

		$advance_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.status) AS total_advance_leave'), 'attendances.user_id')
		->whereYear('attendances.logdate', $year)
		->where('status', 0)
		->where('leave_category_id', 3)
		->groupBy('attendances.user_id')
		->get();

		$special_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.status) AS total_special_leave'), 'attendances.user_id')
		->whereYear('attendances.logdate', $year)
		->where('status', 0)
		->where('leave_category_id', 4)
		->groupBy('attendances.user_id')
		->get();

		$pdf = PDF::loadView('pdd.leave_application.pdf_report', compact('users', 'attendances', 'casual_leaves', 'earned_leaves', 'earned_leaves', 'advance_leaves', 'special_leaves', 'absences'));
		$file_name = 'attendance_report.pdf';
		return $pdf->download($file_name);
	}

	public function index() {
		$leave_applications = Leave::query()
		->leftjoin('users as users', 'users.id', '=', 'leaves.created_by')
		->leftjoin('leave_categories as leave_categories', 'leave_categories.id', '=', 'leaves.leave_category_id')
		->orderBy('leaves.id', 'DESC')
		->where('leaves.deletion_status', 0)
		->get([
			'leaves.*',
			'users.name',
			'leave_categories.leave_category',
		])
		->toArray();

		return view('pdd.leave.index', compact('leave_applications'));
	}

	public function apllicationLists() {
		$leave_applications = Leave::query()
		->leftjoin('users as users', 'users.id', '=', 'leaves.created_by')
		->leftjoin('leave_categories as leave_categories', 'leave_categories.id', '=', 'leaves.leave_category_id')
		->orderBy('leaves.id', 'DESC')
		->where('leaves.deletion_status', 0)
		->get([
			'leaves.*',
			'users.name',
			'leave_categories.leave_category',
		])
		->toArray();
		return view('pdd.leave_application.manage_application_lists', compact('leave_applications'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$leave_categorys = LeaveCategory::where('deletion_status', 0)
		->where('publication_status', 1)
		->select('id', 'leave_category')
		->get();

        // $users = User::all()->get();
				// dd($leave_categorys);
		return view('pdd.leave.create', compact('leave_categorys'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		
        
		$sdates = date("D", strtotime($request->start_date));
		$edates = date("D", strtotime($request->end_date));
		
		$leave_application = $this->validate($request, [
			'leave_category_id' => 'required',
			'start_date' => 'required',
			'end_date' => 'required',
		]);
        // find the number of days between two dates
		$start_date = Carbon::parse(request('start_date'));
		$end_date = Carbon::parse(request('end_date'));

		$days = $start_date->diffInWeekdays($end_date);

		$weekly_holidays = WorkingDay::where('working_status', 0)
			->get(['day'])
			->toArray();

			if($weekly_holidays != null){
    
				foreach ($weekly_holidays as $weekly_holiday) {
					if ($sdates == $weekly_holiday['day'] || $edates == $weekly_holiday['day']) {
						return redirect()->route('leave.index')->with('exception', 'You select a holiday !');
					}				
			       }				
			}

			$monthly_holidays = Holiday::where('holiday_date', '=', $request->start_date)
			->first(['holiday_date']);
			
			
       if($monthly_holidays == null){
		
		$result = Leave::create($leave_application +['num_days' => $days] +['reason' =>request('reason')] + ['created_by' => auth()->user()->id]);
		
      
		$rds = LeaveBalance::where('leave_category_id',$request->leave_category_id)->where('created_by',$userId = Auth::user()->id)->first();
		
		if(!isset($rds)){

		$carbon = Carbon::now();
		$nowInTarawa = Carbon::now('Pacific/Tarawa');
		$year = $nowInTarawa->format('Y');
		$yearIntvalue = intval($year);

		$leave_balance = new LeaveBalance();
		$leave_balance->leave_category_id = $request->leave_category_id;
		$leave_balance->created_by = $userId = Auth::user()->id;
		$leave_balance->year = $yearIntvalue;
		$leave_balance->total_leave_taken = $leaves = Leave::getNumOfLeaveTaken($request->leave_category_id);
        $leave_balance->save();

   	}else

		{
			$leaves = Leave::getNumOfLeaveTaken($request->leave_category_id);
			LeaveBalance::where('created_by', $userId)->where('leave_category_id',$request->leave_category_id)
			->update(['total_leave_taken' => $leaves]);

		}

		$leaveEntitlement = LeaveBalance::getNumOfLeaveEntitlment();

		$total_leave_balance = (int)$leaveEntitlement - (int)$leaves;
		// dd($leaveEntitlement);

		//  LeaveEntitlement::where('user_id', $userId)
		// ->update(['leave_entitlement' => $total_leave_balance]);
		
		LeaveBalance::where('created_by', $userId)
		->update(['total_leave_balance' => $total_leave_balance]);

		$inserted_id = $result->id;

		if (!empty($inserted_id)) {
			return redirect()->route('leave.index')->with('message', 'Add successfully.');
		}
		return redirect()->route('leave.index')->with('exception', 'Operation failed !');

	   }
	   
	   if($monthly_holidays != null){
					return redirect()->route('leave.index')->with('exception', 'You select a holiday !');
		}
			
	}
		
	
		
	

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Leave  $Leave
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$leave_application = Leave::query()
		->leftjoin('users as users', 'users.id', '=', 'leaves.created_by')
		->leftjoin('designations as designations', 'users.designation_id', '=', 'designations.id')
		->leftjoin('leave_categories as leave_categories', 'leave_categories.id', '=', 'leaves.leave_category_id')
		->orderBy('leaves.id', 'DESC')
		->where('leaves.id', $id)
		->where('leaves.deletion_status', 0)
		->first([
			'leaves.*',
			'users.name',
			'users.employee_id',
			'designations.designation',
			'leave_categories.leave_category',
		])
		->toArray();

		// dd($leave_application);

        $users =User::where('id',$id)->get();
		return view('pdd.leave_application.show_leave_application', compact('leave_application','users'));
	}

	public function approved($id) {
		$affected_row = Leave::where('id', $id)
		->update(['publication_status' => 1]);

		if (!empty($affected_row)) {
			return redirect()->route('application_lists')->with('message', 'Accepted successfully.');
		}
		return redirect()->route('application_lists')->with('exception', 'Operation failed !');
	}

	public function not_approved($id) {
		$affected_row = Leave::where('id', $id)
		->update(['publication_status' => 2]);

		if (!empty($affected_row)) {
			return redirect()->route('application_lists')->with('message', 'Not Accepted.');
		}
		return redirect()->route('application_lists')->with('exception', 'Operation failed !');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Leave  $Leave
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Leave $Leave) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Leave  $Leave
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Leave $Leave) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Leave  $Leave
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Leave $Leave) {
		//
	}

	public function leaveApplicationpdf($id){

 
		$data['leave_application'] = Leave::query()
		->leftjoin('users as users', 'users.id', '=', 'leaves.created_by')
		->leftjoin('designations as designations', 'users.designation_id', '=', 'designations.id')
		->leftjoin('leave_categories as leave_categories', 'leave_categories.id', '=', 'leaves.leave_category_id')
		->orderBy('leaves.id', 'DESC')
		->where('leaves.id', $id)
		->where('leaves.deletion_status', 0)
		->first([
			'leaves.*',
			'users.name',
			'users.employee_id',
			'designations.designation',
			'leave_categories.leave_category',
		]);
    //  dd($data['leave_application'])
    //  return view('ems.report.employee.profile_pdf', $data);
        $pdf = PDF::loadView('pdd.leave_application.show_leave_applicationpdf',$data);
        // $pdf->SetProtection(['copy','print'], '', 'pass');
        return $pdf->stream('leaveapplication.pdf');
     
     }

}
