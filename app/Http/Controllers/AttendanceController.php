<?php


namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Holiday;
use App\Models\LeaveCategory;
use App\Models\User;
use App\Models\WorkingDay;
use App\Exports\AttendancesExport;
use App\Exports\DailyAttendanceExport;
use DB;
use PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;


use Auth;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
   
    public function index()
    {
      
		$modifies = new Attendance();
		
		$modifies = $modifies->logdate(); 
     
    //    dd($modifies);
		return view('pdd.attendance.index',compact('modifies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = User::all();


	return view('pdd.attendance.create')->with('employees', $employees)->with('message', 'Inserted successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $id)
    {
   
	$data[] = $request->employee_id;
	
	

	foreach($data as $dat){

		$date = carbon::today() ; 
				$result = new Attendance;
				$result->user_id = $dat[0];
				$result->created_by = auth()->user()->id;
				$result->timein = $request->in_time;
				$result->timeout = $request->out_time;
				$result->logdate = 	$request->dateIn;
				$result->status = 1;
				$result->save();
	}
				
		
			return redirect()->route('attendance.index')->with('message', 'Inserted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($logdate = Null) {
     
        // $data['items'] =  Attendance::select('id','logdate','timein','timeout')->where('logdate', $logdate)->get();
        $data['items'] = User::query()
		->leftjoin('attendances', 'attendances.user_id', '=', 'users.id')->select('users.name','attendances.id','attendances.logdate','timein','timeout')->where('logdate', $logdate)->get();
        // dd($data['items']);

        $data['logdate'] = User::query()
		->leftjoin('attendances', 'attendances.user_id', '=', 'users.id')->where('logdate', $logdate)->pluck('logdate');

        // $data['userid'] = User::query()
		// ->leftjoin('attendances', 'attendances.user_id', '=', 'users.id')->where('logdate', $logdate)->pluck('attendances.user_id');

//   dd($data['userid']);

        // $array = explode(',',$data['logdate']);         
    //    dd($data['logdate'][0]);
        //  $signledate = array_slice($array, 0, 1);  
        
        
       return view('pdd.attendance.edit',$data)->with('message', 'Inserted successfully.');

    }
    

    public function update(Request $request, $logdate)
    {
        $data = $request->all();
        // dd($data);
        Attendance::select('user_id','time_in','time_out')->where('logdate', $logdate)
		->update([
        // 'timein' => $request->timein[0],
        'timeout' => $request->timeout[0] ,
        'user_id' => $request->user_id[0] ,
      ]);

    // Attendance::where('logdate', $logdate)->where('user_id',$request->user_id )->update(
    //     [
    //         'timein' => $request->timein[0],
    //             'timeout' => $request->timeout[0] ,


    //     ]);


	
        // $dateloged = Attendance::where('logdate', $logdate)->Pluck('logdate');

	// foreach($dateloged as $dat){

		// $date = carbon::today() ; 
		    //    $result = new Attendance;
				// $result->user_id = auth()->user()->id;
				// $result->created_by = auth()->user()->id;
				// $result->timein = $request->timein;
				// $result->timeout = $request->timeout;
				// $result->logdate = 	$dat[0];
				// $result->status = 1;
				// $result->save();
	// }

    return redirect()->route('attendance.edit',$logdate)->with('message', 'Inserted successfully.');
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchIndividualAttendance(){

    	$employees = User:://whereBetween('access_label', [2, 3])
			// where('deletion_status', 0)
			select('id', 'name')
			->orderBy('id', 'DESC')
			->get()
			->toArray();
         
    return view('pdd.attendance.searchIndividualAttendance', compact('employees'));
    }

        public function getIndividualAttendance(Request $request){

            //return $request->emp_id;
                    $empid= $request->emp_id;
                    $daterange= $request->daterange;
                    if($request->date1=='' or $request->date2=='' or $request->emp_id==0){

                    return redirect()->route('attendance.searchIndividualAttendance')->with('exception', 'Please select the Date Range');
                    }else{

                        $empid= $request->emp_id;
                    $date1 = $request->date1;
                    $date2 =  $request->date2;

                    $startdate = date("Y-m-d", strtotime($date1));
                    $enddate = date("Y-m-d", strtotime($date2));


                    $attendance = DB::table('attendances')->whereBetween('logdate', [$startdate,$enddate])->where('user_id', $empid)->get();

                    $attds=  DB::table('attendances')->where('status', 1)->where('user_id', $empid)->whereBetween('logdate', [$startdate, $enddate])->get();

                    $abs=  DB::table('attendances')->where('status', 0)->where('user_id', $empid)->whereBetween('logdate', [$startdate, $enddate])->get();

                    $users= DB::table('users')->select('id','name')->where('id', $empid);

                   $nulltimein  = DB::table("attendances")
                    ->leftJoin("users", function($join){
                    $join->on("users.id", "=", "attendances.user_id");
                    })
                    ->select("users.name", "attendances.timein", "attendances.logdate")
                    ->whereNull("attendances.timein")->where('user_id', $empid)->whereBetween('logdate', [$startdate, $enddate])->get();

                    $nulltimeout  = DB::table("attendances")
                    ->leftJoin("users", function($join){
                    $join->on("users.id", "=", "attendances.user_id");
                    })
                    ->select("users.name", "attendances.timein", "attendances.logdate")
                    ->whereNull("attendances.timein")->where('user_id', $empid)->whereBetween('logdate', [$startdate, $enddate])->get();
                    


                return view('pdd.attendance.individualAttedanceReport', compact('attendance', 'startdate', 'enddate', 'empid', 'attds', 'abs','users','date1','date2','nulltimein','nulltimeout'));
        }
    }

            public function searchAttendance(){

                $year = DB::table('attendances')
                ->select([DB::raw('EXTRACT(YEAR FROM attendances.logdate) as year')])
                ->groupBy('year')
                ->pluck('year');

                // dd($year);
                    
            return view('pdd.search_attendance_by_year.search_attendance')->withYear($year);

            }


            public function searchAttendanceByYear(Request $request){
                        $years = $request->logdate;

                        $data['attendances'] = DB::table('users')
                        ->select('users.name', 'timein', 'timeout', 'attendances.logdate', DB::raw('Year(logdate) as Year'), DB::raw('MonthName(logdate) as Month'), DB::raw('DayName(logdate) as Day'))
                        ->leftJoin('attendances','users.id','=','attendances.user_id')
                        ->whereYear('logdate','=',$years)
                        ->get();
                        
                        $yearsearch = DB::table('attendances')
                        ->select([DB::raw('EXTRACT(YEAR FROM attendances.logdate) as year')])
                        ->whereYear('logdate','=',$years)
                        ->value('year');

                // dd($yearsearch);
                
                    return view('pdd.search_attendance_by_year.attendance_search_result',$data)->withYear($years)->with('yearsearch',$yearsearch);

            }

            public function yearlyAttendanceReportPdf($year){

                $attendance = DB::table('users')
                ->select('users.name', 'timein', 'timeout', 'attendances.logdate', DB::raw('Year(logdate) as Year'), DB::raw('MonthName(logdate) as Month'), DB::raw('DayName(logdate) as Day'))
                ->leftJoin('attendances','users.id','=','attendances.user_id')
                ->whereYear('logdate','=',$year)
                ->get();

                $pdf=PDF::loadView('pdd.search_attendance_by_year.yearlyAttedanceReportPdf',compact('attendance'));
                
                return $pdf->stream('attendanceStatement.pdf');

            }

            public function attDetailsReportPdf($emp_id, $date1, $date2){

                // $data = $user;
                // dd($data);

                $empid= $emp_id;
                $users = User::find($empid);
                $startdate= $date1;
                $enddate= $date2;

                $attendance = DB::table('attendances')->whereBetween('logdate', [$startdate,$enddate])->where('user_id', $empid)->get();

                $attds=  DB::table('attendances')->where('status', 1)->where('user_id', $empid)->whereBetween('logdate', [$startdate, $enddate])->get();

                $abs=  DB::table('attendances')->where('status', 0)->where('user_id', $empid)->whereBetween('logdate', [$startdate, $enddate])->get();

                $users= User::all()->where('id', $empid);

               $nulltimein  = DB::table("attendances")
                            ->leftJoin("users", function($join){
                            $join->on("users.id", "=", "attendances.user_id");
                            })
                            ->select("users.name", "attendances.timein", "attendances.logdate")
                            ->whereNull("attendances.timein")->where('user_id', $empid)->whereBetween('logdate', [$startdate, $enddate])->get();

                $nulltimeout  = DB::table("attendances")
                        ->leftJoin("users", function($join){
                        $join->on("users.id", "=", "attendances.user_id");
                        })
                        ->select("users.name", "attendances.timein", "attendances.logdate")
                        ->whereNull("attendances.timein")->where('user_id', $empid)->whereBetween('logdate', [$startdate, $enddate])->get();


                $pdf=PDF::loadView('pdd.attendance.individualAttedanceReportPdf', compact('attendance', 'startdate', 'enddate', 'empid', 'attds', 'abs', 'users'));
                
                return $pdf->stream('attendanceStatement.pdf');

            }

            public function dailyAttendanceReportPdf($logdate){

                $attendance = User::query()
                ->leftjoin('attendances', 'attendances.user_id', '=', 'users.id')->select('users.name','attendances.id','attendances.logdate','timein','timeout')->where('logdate', $logdate)->get();

                $pdf=PDF::loadView('pdd.attendance.dailyAttedanceReportPdf',compact('attendance'));
                
                return $pdf->stream('attendanceStatement.pdf');

            }

           


            public function allAttendanceReportPdf(){

                $allAttendance = DB::table('users')
                ->select('users.name', 'attendances.logdate','attendances.timein','attendances.timeout')
                ->leftJoin('attendances','users.id','=','attendances.user_id')
                ->get();

                $pdf = PDF::loadView('pdd.reports.all_attendance_list_reportpdf', compact('allAttendance'));
                
                return $pdf->stream('allattendance.pdf');

            }


            public function AttendanceExcelExport() 
            {
            return Excel::download(new AttendancesExport, 'attendances.xlsx');
            }

            public function DailyAttendaceExcelExport(Request $request)
            {
                return Excel::download(new DailyAttendanceExport($request->logdate), 'dailyattendance.xlsx');
            }

            public function autocomplete(Request $request)
                {
                    $datas = User::select("name")
                            ->where("name", "LIKE","%{$request->input('query')}%")
                            ->get();

                    $dataModified = array();
                    foreach ($datas as $data)
                    {
                        $dataModified[] = $data->name;
                    }

                    return response()->json($dataModified);
                }


                public function searchLogdate(Request $request) {
                    $logdate = $request->input('txtSearch');
                
                    $results = DB::table('attendances')->where('logdate', 'Like', '%'.$logdate.'%')->get();
                
                    return response()->json($results);
                }

                public function timeclockcreate(Request $request){

                    $id = $request->input('id');
                    // $data['attendances'] = User::all()->toArray();
            
                    // $data['attendances'] = User::query()
                    // ->leftjoin('attendances', 'attendances.user_id', '=', 'users.id')
                    // ->select('attendances.*', 'users.*','attendances.timein')
                    // ->orderBy('users.name', 'ASC')
                    // ->get();
                    // ->toArray();
            
                    // $timein = User::find($id)->attendances;
                    // $user = new User();
                    // $timein = $user->attendances()->where('user_id',$id);
            
                    $id = $request->input('id');
                    $data['attendances'] = User::all()->toArray();
                
                    // $data['timein'] = User::query()
                    // ->leftjoin('attendances', 'attendances.user_id', '=', 'users.id')
                    // ->select('attendances.*', 'users.*')->where('attendances.user_id',$id)
                    // ->orderBy('users.name', 'ASC')
                    // ->get()
                    // ->toArray();

                    $fish = DB::table('users')
                    ->select('users.name', 'attendances.logdate', 'attendances.timein', 'attendances.timeout')
                    ->leftJoin('attendances','users.id','=','attendances.user_id')
                    ->where('attendances.logdate','<',Carbon::now())
                    // ->whereNull('attendances.timeout')
                    ->get();
            
                
                    return view('pdd.attendance.set_attendance',$data)
                    // ->with('fish', $fish)
                    ->with('id', $id)
                    ->with('message', 'Inserted successfully.');
            }
            
            
            
            public function timeclock(Request $request){

                $id = $request->input('id');
                // dd($id);
                $date = Carbon::today('Pacific/Tarawa')->toDateString(); 

                $regdate = date('H:i:s', strtotime(Carbon::now())); 
                   $time = \Carbon\Carbon::parse($regdate)->format('h:i:s');

                // dd($time);
            
                $user = DB::table("users")
                        ->where("id", "=", $id)
                        ->first();
            
                
                if($user == NULL) {
                    $msg = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Please enter your first name to continue!</div>";
                  }
                  elseif ($user != NULL){
                    
                    $attendance =	DB::table("users")
                    ->leftJoin("attendances", function($join){
                        $join->on("users.id", "=", "attendances.user_id");
                    })
                    ->select("attendances.*", "logdate", "timein", "timeout", "status")
                    ->where("attendances.user_id", "=", $id)
                    ->where("attendances.logdate", "=", $date)
                    ->where("attendances.status", "=", 0)
                    ->get()->toArray();
            
                    if($user->P == '1') {
            
                        DB::table('users')
                        ->where(['id' => $id] )
                        ->update([
                        'p'=> '0',
                            
                        ]);
            
            
                    }
                    
                   
            
                    if($attendance){
                        
            
                        DB::table('attendances')
                        ->where(['created_by' => $id, 'logdate' => $date] )
                        ->whereNull('timeout')
                         ->update([
                            'timeout' => $time,
                            'status'=> '1',
                            
                        ]);                      
                    }
                 
                
                  else {
            
                    $result = new Attendance;
                            $result->user_id = $id;
                            $result->created_by = $id;
                            $result->timein = $time;
                            $result->logdate = 	$date;
                            $result->status = 0;
                            $result->save();
                    
                              }
            
                              if($user->P == '0') {
            
                                DB::table('users')
                                ->where(['id' => $id] )
                                ->update([
                                'p'=> '1',
                                    
                                ]);		
                            }
                }
                
                    return redirect()->route('attendance.timeclockcreate')->with('id', $id)->with('message', 'Inserted successfully.');
            }

            public function happy(){

              $fish = DB::table('users')
                ->select('users.name', 'attendances.logdate', 'attendances.timein', 'attendances.timeout')
                ->leftJoin('attendances','users.id','=','attendances.user_id')
                ->where('attendances.logdate','<',Carbon::now())
                // ->whereNull('attendances.timeout')
                ->get();
                dd($fish);
                // return 'ok';
            }
            
}
