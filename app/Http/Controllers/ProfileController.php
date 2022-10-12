<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Designation;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PDF;
use DB;
use Carbon\Carbon;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileIndex()
    {
        $id = Auth::user()->id;
        $employee = User::find($id);

        $dateOfBirth = User::where('id',$id)->select('date_of_birth')->value('date_of_birth');
        // date when he'll turn 50
        $dateToFifty = date('Y-m-d', strtotime($dateOfBirth . '+60 Years'));
        // current date
        $currentDate = date('Y-m-d');
        $result = $dateToFifty;
        // checks if already fifty
        if($currentDate <= $dateToFifty) {
            $result = $dateToFifty;
        }

        $joiningDate = User::where('id',$id)->select('joining_date')->value('joining_date');
        $joinDate = Carbon::parse($joiningDate);
        $todate = Carbon::parse(date('Y-m-d'));
        // dd($todate);
        $datejoin = $joinDate->diffInYears($todate); //total days between two dates
// $startdate->diffInMinutes($todate); //total number of minutes between two dates
// $startdate->diffInMonths($todate);

        
        return view('pdd.profiles.profile_index')
        ->with('employee',$employee)
        ->with('result',$result)
        ->with('datejoin',$datejoin);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ProfileStore(Request $request, User $employee)
    {
        $data = User::find(Auth::user()->id);
        $data->name =$request->name;
        $data->email =$request->email;   
       
         if ($request->file('picture')) {
            $file = $request->file('picture');
            // $destinationPath = 'profile_picture/';
            $filename = date('YmdHis') . "." .  $file->getClientOriginalExtension();
            $file->move('profile_picture/',$filename);
             $data['picture'] = "$filename";
         }
     
         $data->save();


            // $picture = $request->file('picture');
            // $destinationPath = 'profile_picture/';
            // @unlink(public_path('profile_picture/' .$data->picture));
            // $profilePicture = date('YmdHis') . "." . $picture->getClientOriginalExtension();
            // $picture->move($destinationPath, $profilePicture);
            // $data['picture'] = "$profilePicture";
       
          
            // $data->save();

         

       
        return redirect()->route('profile.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        $employee = User::find($id);
        // dd($employee);
        return view('pdd.profiles.profile_edit')->with('employee',$employee);
    }

    public function ChangeUserPasswordView(){

        // $id = Auth::user()->id;
        // $employee = User::find($id);
        return view('ems.employees.password.password_edit');//->with('employee',$employee);
    }

    public function ChangeUserPasswordUpdate(Request $request){

        $validation = $request->validate([

            'oldpassword' => 'required',
            'password'      =>'required|confirmed'

        ]);

        $password = Auth::user()->password;

        if(Hash::check($request->oldpassword, $password )){

            $user = User::find(Auth::id());
            $user->password = hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('login');


        } else 
        /** above } is the end if  */  {

            return redirect()->back();
        }  /** end ChangeUserPasswordUpdate */  
          
        // return view('ems.employees.password.password_edit');//->with('employee',$employee);

        
    }

    public function profilepdf($id){

 
        $data['employee'] =	$employee = DB::table('users')
        ->join('designations', 'users.designation_id', '=', 'designations.id')
        ->select('users.*', 'designations.designation')
        ->where('users.id', $id)
        ->first();

        $data['created_by'] = User::where('id', $employee->created_by)
        ->select('id', 'name')
        ->first();

        $data['designations'] = Designation::where('deletion_status', 1)
        ->select('id', 'designation')
        ->first();

        $data['departments'] = Department::where('deletion_status', 1)
        ->select('id', 'department')
        ->first();

        // dd($data['departments']);
     
    //  return view('ems.report.employee.profile_pdf', $data);
        $pdf = PDF::loadView('pdd.profiles.profile_pdf', $data);
        // $pdf->SetProtection(['copy','print'], '', 'pass');
        return $pdf->stream('profile.pdf');
     
     }

}