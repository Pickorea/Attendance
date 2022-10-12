<?php

namespace App\Console\Commands;
use DB;
use Carbon\Carbon;

use Illuminate\Console\Command;

class UserPStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'p:update';

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
        $currentDate = Carbon::now();
      

       DB::table('users')
            ->select('users.name', 'attendances.logdate', 'attendances.timeout')
            ->leftJoin('attendances','users.id','=','attendances.user_id')
            ->whereNull('attendances.timeout')
            ->whereDate('attendances.logdate','<', Carbon::today('Pacific/Tarawa')->toDateString())
            ->where('users.P',1)
            ->update([
                'P' => '0',              
            ]);   
            
            
            DB::table('users')
            ->select('users.name', 'attendances.logdate', 'attendances.timeout')
            ->leftJoin('attendances','users.id','=','attendances.user_id')
            ->whereNull('attendances.timeout')
            ->whereDate('attendances.logdate','<', Carbon::today('Pacific/Tarawa')->toDateString())
            ->where('users.P',0)
            ->update([
                'P' => '0',              
            ]);    

            // dd(Carbon::now('Pacific/Tarawa'));
        
        }
}
