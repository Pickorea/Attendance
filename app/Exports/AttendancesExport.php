<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use RegistersEventListeners;
use DB;


class AttendancesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $attendances = DB::table('users')
        ->select('users.name', 'attendances.logdate','attendances.timein','attendances.timeout')
        ->leftJoin('attendances','users.id','=','attendances.user_id')
        ->orderBy('attendances.logdate','DESC')
        ->get();
        return $attendances;
        
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
