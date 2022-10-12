<?php

namespace App\Services\Interfaces;


use App\Models\User;
interface IAttendanceReportService
{
   
    public function getStaffAttendanceList();

    public function workingHours();

  
}