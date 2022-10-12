<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use RegistersEventListeners;
use DB;

class DailyAttendanceExport implements FromCollection, WithHeadings
{

    protected $logdate;

        function __construct($logdate) {
                $this->logdate = $logdate;
        }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         return  User::query()
		->leftjoin('attendances', 'attendances.user_id', '=', 'users.id')->select('users.name','attendances.logdate','timein','timeout')->where('logdate', $this->logdate)->get();
    }

    public function headings(): array
    {
        return [
            'Employee Name',
             'Attendance Date',
             'Time In',
            'Time Out',
        ];
    }
}
