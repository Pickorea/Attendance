<?php

namespace App\Http\Controllers;

use App\Services\Implementations\IMDepartmentReportService;
use App\Services\Implementations\IMStaffLeaveListReportService;
use App\Services\Implementations\IMAttendanceReportService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
     protected $departmentReportService;
     protected $staffLeaveListReportService;
     protected $attendanceListReportService;

    public function __construct(
        IMDepartmentReportService $departmentReportService,
        IMStaffLeaveListReportService $staffLeaveListReportService,
        IMAttendanceReportService $attendanceListReportService

        )
    {
        $this->departmentReportService = $departmentReportService;
        $this->staffLeaveListReportService = $staffLeaveListReportService;
        $this->attendanceListReportService = $attendanceListReportService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function IndexOfDepartmentEmployees()
    {
         $departments = $this->departmentReportService->getDepartmentAndEmployees();

         return view('pdd.reports.department_report',compact('departments'));
    }

    public function IndexOfEmployeeLeaves()
    {
         $employees = $this->staffLeaveListReportService->getStaffLeaveList();
        //  dd($employees);

         return view('pdd.reports.staff_leave_list_report',compact('employees'));
    }

    public function IndexOfAttendance()
    {
        $employees = $this->attendanceListReportService->getStaffAttendanceList();
        // $employee = $this->attendanceListReportService->workingHours();
        
        //  dd($employees);

         return view('pdd.reports.staff_attendance_list_report',compact('employees')); 
    }

    // public function hoursOfWork()
    // {
    //     $employees = $this->attendanceListReportService->workingHours();
        
    //     //  dd($employees);

    //      return view('pdd.reports.staff_attendance_list_report',compact('employees')); 
    // }


    

  
}
