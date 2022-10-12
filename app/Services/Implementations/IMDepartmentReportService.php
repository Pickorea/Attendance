<?php

namespace App\Services\Implementations;


use App\Models\Department;
use App\Services\Interfaces\IDepartmentReportService;

class IMDepartmentReportService implements IDepartmentReportService
{
    
    public function getDepartmentAndEmployees()
    {
        return $departments = Department::with('employees')->get();
    }

   

}