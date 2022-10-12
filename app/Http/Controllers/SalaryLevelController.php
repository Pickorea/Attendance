<?php

namespace App\Http\Controllers;

use App\Models\SalaryLevel;
use App\Models\WorkingDay;
use Illuminate\Http\Request;

class SalaryLevelController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$salarys = SalaryLevel::query()
			->leftjoin('users as users', 'users.id', '=', 'salary_levels.created_by')
			->orderBy('salary_levels.salary_level', 'ASC')
			->where('salary_levels.deletion_status', 0)
			->get([
				'salary_levels.*',
				'users.name',
			])
			->toArray();
		return view('pdd.salary_level.index', compact('salarys'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('pdd.salary_level.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$salarys = $this->validate($request, [
			'salary_level' => 'required',
			'publication_status' => 'required',
			'description' => 'required',
		]);

		
		$result = SalaryLevel::create($salarys + ['created_by' => auth()->user()->id]);
		$inserted_id = $result->id;
		if (!empty($inserted_id)) {
			return redirect()->route('salary_level.index')->with('message', 'Add successfully.');
		}
		return redirect()->route('salary_level.index')->with('exception', 'Operation failed !');
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
