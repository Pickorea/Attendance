<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attendance;
use App\Models\User;
use DB;


class Attendance extends Model
{
  

    protected $fillable = [
        'created_by', 'user_id', 'timein','timeout','status'
    ];

    // protected $dates = ['timein','timeout'];

    public function user(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function logdate(){

        // $data = Attendance::select('logdate')->groupBy('logdate')->orderBy('id','Desc')->get();

               $data =  DB::table('users')->select('attendances.logdate')
               ->leftJoin('attendances','users.id','=','attendances.user_id')
               ->groupBy('attendances.logdate')->get('desc');

        return  $data;
    }

    public function motified($logdate){

        $data = User::query()
		->leftjoin('attendances', 'attendances.user_id', '=', 'users.id')->where('logdate', $logdate)->get();

        return  $data;
    }

    public function loggingDate($logdate){

        $data = User::query()
		->leftjoin('attendances', 'attendances.user_id', '=', 'users.id')->where('logdate', $logdate)->value('logdate');

        return  $data;
    }

    
}
