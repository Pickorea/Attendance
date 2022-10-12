<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingDay;
use App\Http\Requests\StoreWorkingDayRequest;
use App\Http\Requests\UpdateWorkingDayRequest;
use Illuminate\Support\Facades\Auth;
class WorkingDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $working_days = WorkingDay::get()
        ->toArray();
    return view('pdd.workingday.index',['working_days' => $working_days]);
    }

  
    public function create()
    {
        return view('pdd.workingday.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkingDayRequest $request)
    {
        // $data = $request->all();
// dd(auth()->user()->id);
        WorkingDay::create(
            
            ['updated_by' => Auth::user()->id,

            'day' => $request->day,

            'working_status' => $request->working_status,]
        
        );
        

        return redirect()->route('workingdays.index')->withFlashSuccess('Working Days Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = 1;
		for ($i = 0; $i < count($request->day); $i++) {
			$affected_row = WorkingDay::where('id', $id++)
				->update(['working_status' => $request->day[$i]]);
		}
		return redirect()->route('workingdays.index')->withFlashSuccess('Work Days Updated successfully.');
    }

    

  }
