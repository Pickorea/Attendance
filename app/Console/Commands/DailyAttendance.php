<?php

namespace App\Console\Commands;
use DB;
use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Console\Command;

class DailyAttendance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:attendance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $logdate = Carbon::today('Pacific/Tarawa')->toDateString(); 
// dd($logdate);
        $data['attendance'] = User::query()
                ->leftjoin('attendances', 'attendances.user_id', '=', 'users.id')->select('users.name','attendances.id','attendances.logdate','timein','timeout')->where('logdate', $logdate)->get()->toArray();
// dd($data['attendance']);
                $pdf=PDF::loadView('pdd.attendance.EmaileddailyAttedanceReportPdf',$data);
                
                
                \Mail::send('pdd.attendance.EmaileddailyAttedanceReportPdf',
                $data, function ($m)use($pdf){
                    // $m->from('kairaoii@mfmrd.gov.ki', env('APP_NAME'));
                    $logdate = Carbon::today('Pacific/Tarawa')->toDateString(); 
                    $file_name = 'CFD-DAILY-ATTENDANCE' . $logdate . '.pdf';
                    $m->to('kairaoi1ien@yahoo.com')->subject('Auto Generated Daily Attendance Management System notification')                   
                    ->attachData($pdf->output(),'dailyAttendance.pdf');
                });



    }
}
