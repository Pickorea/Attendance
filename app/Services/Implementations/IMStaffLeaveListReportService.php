<?php

namespace App\Services\Implementations;
use App\Models\User;
use App\Services\Interfaces\IStaffLeaveListReportService;
use DB;
class IMStaffLeaveListReportService implements IStaffLeaveListReportService
{
    
    public function getStaffLeaveList()
    {
        return $employees = DB::table('users')
        ->select('users.name', 'leaves.start_date', 'leaves.end_date')
        ->leftJoin('leaves','users.id','=','leaves.created_by')->where('publication_status', '=', 0)
        ->get();
    }

   

}