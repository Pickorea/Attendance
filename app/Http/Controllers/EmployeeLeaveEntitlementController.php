<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SalaryLevel;
use Illuminate\Http\Request;

class EmployeeLeaveEntitlementController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$emloyeeLeaveEntitlements = User::all();
		// dd($emloyeeLeaveEntitlements);
		return view('pdd.employee_leave_entitlement.index', compact('emloyeeLeaveEntitlements'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$employees = User::all();
		$salaryLevels = SalaryLevel::all();

		return view('pdd.employee_leave_entitlement.create')->withEmployees($employees)
		->withSalaryLevels($salaryLevels);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		
		$users = User::where('id',$request->input('employee_id', []))->first();

        $entitlement = $request->input('leave_entitlement', []);
        $salaryLevel_id = $request->input('salaryLevel_id', []);

        for ($i=0; $i < count( $entitlement); $i++) {
            if ( $salaryLevel_id[$i] != '') {
                $users->salarylevels()->attach($salaryLevel_id[$i], ['leave_entitlement' =>   $entitlement[$i]]);
            }
            
        }
		
          return redirect()->route('leave_entitlement.index')->with('message', 'Add successfully.');
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function published($id) {
		$affected_row = SalaryLevel::where('id', $id)
			->update(['publication_status' => 1]);

		if (!empty($affected_row)) {
			return redirect('/setting/salary_levels/')->with('message', 'Published successfully.');
		}
		return redirect('/setting/salary_levels/')->with('exception', 'Operation failed !');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function unpublished($id) {
		$affected_row = SalaryLevel::where('id', $id)
			->update(['publication_status' => 0]);

		if (!empty($affected_row)) {
			return redirect('/setting/salary_levels/')->with('message', 'Unpublished successfully.');
		}
		return redirect('/setting/salary_levels/')->with('exception', 'Operation failed !');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\salary_level  $salary_levels
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		$salarys =SalaryLevel::query()
			->leftjoin('users as users', 'users.id', '=', 'salary_levels.created_by')
			->orderBy('salary_levels.salary_name', 'ASC')
			->where('salary_levels.id', $id)
			->where('salary_levels.deletion_status', 0)
			->first([
				'salary_levels.*',
				'users.name',
			])
			->toArray();
		return view('pdd.salary_level.show', compact('salarys'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\salary_level  $salary_levels
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$salarys = SalaryLevel::find($id)->toArray();
		return view('pdd.salary_level.edit', compact('salarys'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\salary_level  $salary_levels
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$salarys = SalaryLevel::find($id);
		$this->validate($request, [
			'salary_name' => 'required',
			'publication_status' => 'required',
			'description' => 'required',
		]);

		$salarys->salary_name = $request->get('salary_name');

		$salarys->description = $request->get('description');
	
		$salarys->publication_status = $request->get('publication_status');
		$affected_row = $salary_levels->save();

		if (!empty($affected_row)) {
			return redirect('/setting/salary_levels/')->with('message', 'Update successfully.');
		}
		return redirect('/setting/salary_levels/')->with('exception', 'Operation failed !');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\salary_level  $salary_levels
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$affected_row = salary_level::where('id', $id)
			->update(['deletion_status' => 1]);

		if (!empty($affected_row)) {
			return redirect('/setting/salary_levels/')->with('message', 'Delete successfully.');
		}
		return redirect('/setting/salary_levels/')->with('exception', 'Operation failed !');
	}
}
