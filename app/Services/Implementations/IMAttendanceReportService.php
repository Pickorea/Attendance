<?php

namespace App\Services\Implementations;
use App\Models\User;
use App\Models\Attendance;
use DB;
use DateTime;
use Carbon\Carbon;
use App\Services\Interfaces\IAttendanceReportService;

class IMAttendanceReportService implements IAttendanceReportService
{
    
    public function getStaffAttendanceList()
    {
        // return $employees = User::query()
        // ->join('attendances', 'attendances.user_id', '=', 'users.employee_id')
        // ->select('users.name','attendances.timein','attendances.timeout')->where('status',1)
        // ->orderBy('users.employee_id', 'ASC')
        // ->get();

        return $employees = DB::table('users')
        ->select('users.name', 'attendances.logdate','attendances.timein','attendances.timeout')
        ->leftJoin('attendances','users.id','=','attendances.user_id')
        ->get();

        // return $employees = Attendance::
        //     select('*', 
        //     DB::raw('timestampdiff(second, timein, timeout) as time_difference'))
        //     ->whereRaw('date(timein)', 'logdate');
    }

    public function workingHours(){

        $startTime = DB::table('users')
        ->select('attendances.timein','attendances.timeout')
        ->rightJoin('attendances','users.id','=','attendances.user_id')
        ->pluck('attendances.timein');

        $endTime = DB::table('users')
        ->select('attendances.timein','attendances.timeout')
        ->rightJoin('attendances','users.id','=','attendances.user_id')
        ->pluck('attendances.timein');

        // $startTime = DB::table('users')
        // ->select([DB::raw('EXTRACT(YEAR FROM attendances.logdate) as year')])
        // ->groupBy('year')
        // ->pluck('year');
        // $ti = str_before($startTime, ' ');
        // $to = str_before($endTime, ' ');

        // $timeIn = Carbon::createFromFormat('Y-m-d H:i:s',$startTime);
        // $timeOut = Carbon::createFromFormat('Y-m-d H:i:s',$endTime);
    
        // return $totalDuration =  $startTime->diff($endTime);

        // dd($totalDuration);

        // $in = new DateTime('H:i:s',$startTime);
	    // $out =  new DateTime('H:i:s',$endTime);

        // return $totalDuration = $startTime->diff($endTime);
        // dd($totalDuration);

        $startTime = Carbon::parse($startTime);
        $endTime = Carbon::parse($endTime);
    
        $totalDuration = $endTime->diffForHumans($startTime);
        dd($totalDuration);
    }
   

}