<?php

namespace App\Http\Controllers;

use App\Models\Designation;
// use App\Models\Role;
use App\Models\User;
use App\Models\Department;
use DB;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Hash;
class EmployeeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$employees = User::query()
			->join('designations', 'users.designation_id', '=', 'designations.id')
			
		
			->select('employee_id', 'users.id', 'users.name', 'users.emergency_contact', 'users.created_at',  'designations.designation')
			->orderBy('users.employee_id', 'ASC')
			->get()
			->toArray();
		return view('pdd.employee.index', compact('employees'));
	}

	public function print() {
		$employees = User::query()
			->join('designations', 'users.designation_id', '=', 'designations.id')
			
		
			->select('users.id', 'users.employee_id', 'users.name', 'users.email', 'users.present_address', 'users.contact_no_one', 'designations.designation')
			->orderBy('users.id', 'DESC')
			->get()
			->toArray();
		return view('pdd.employee.employees_print', compact('employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$designations = Designation::where('deletion_status', 0)
			->where('publication_status', 1)
			->orderBy('designation', 'ASC')
			->select('id', 'designation')
			->get()
			->toArray();

			$departments = Department::where('deletion_status', 0)
			->where('publication_status', 1)
			->orderBy('department', 'ASC')
			->select('id', 'department')
			->get()
			->toArray();
	

		return view('pdd.employee.create', compact('designations','departments')); 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		
		// $d = $request->input('email');
		// dd($d);
		
		$users = \App\Models\User::orderBy('id', 'desc')->first();
		$sl=$users->id;

			$input=[];
			$input['created_by']= auth()->user()->id;
			$input['employee_id'] = $sl;
			$input['name']=$request->name;
			$input['email']=$request->email;
			$input['password'] = Hash::make('password');
			$input['present_address']=$request->present_address;
			$input['id_name']=$request->id_name;
			$input['id_number']=$request->id_number;
			$input['pf_number']=$request->pf_number;
			$input['emergency_contact']=$request->emergency_contact;
			$input['gender']=$request->gender;
			$input['date_of_birth']=$request->date_of_birth;
			$input['marital_status']=$request->marital_status;
			$input['picture']=$request->picture; 
			$input['designation_id']=$request->designation_id;
			$input['department_id']=$request->input('department_id');
			$input['academic_qualification']=$request->academic_qualification;
			$input['joining_date']=$request->joining_date;

			
				if ($picture = $request->file('picture')) {
					$destinationPath = 'profile_picture/';
					$profilePicture = date('YmdHis') . "." . $picture->getClientOriginalExtension();
					$picture->move($destinationPath, $profilePicture);
					$input['picture'] = "$profilePicture";
				}

				$results = User::create($input);

				if (!empty($results)) {
					return redirect()->route('employee.index')->with('message', 'Update successfully.');
				}
				return redirect()->route('employee.index')->with('exception', 'Operation failed !');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function active($id) {
		$affected_row = User::where('id', $id)
			->update(['activation_status' => 1]);

		if (!empty($affected_row)) {
			return redirect()->route('/employee')->with('message', 'Activate successfully.');
		}
		return redirect()->route('/employee')->with('exception', 'Operation failed !');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function deactive($id) {
		$affected_row = User::where('id', $id)
			->update(['activation_status' => 0]);

		if (!empty($affected_row)) {
			return redirect()->route('/employee')->with('message', 'Deactive successfully.');
		}
		return redirect()->route('/employee')->with('exception', 'Operation failed !');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
	
		$employee = DB::table('users')
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->select('users.*', 'designations.designation')
			->where('users.id', $id)
			->first();
		$created_by = User::where('id', $employee->created_by)
			->select('id', 'name')
			->first();
		$designations = Designation::where('deletion_status', 0)
			->select('id', 'designation')
			->get();
		$departments = Department::where('deletion_status', 0)
			->select('id', 'department')
			->get();	
		return view('pdd.employee.show', compact('employee', 'created_by', 'designations', 'departments'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function pdf($id) {
		$employee = DB::table('users')
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->select('users.*', 'designations.designation')
			->where('users.id', $id)
			->first();

		$created_by = User::where('id', $employee->created_by)
			->select('id', 'name')
			->first();

		$designations = Designation::where('deletion_status', 0)
			->select('id', 'designation')
			->get();

		$pdf = PDF::loadView('pdd.employee.permit_ps', compact('employee', 'created_by', 'designations'));
		$file_name = 'EMP-' . $employee->id . '.pdf';
		return $pdf->download($file_name);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$employee = User::find($id)->toArray();
		$designations = Designation::where('deletion_status', 0)
			->where('publication_status', 1)
			->orderBy('designation', 'ASC')
			->select('id', 'designation')
			->get()
			->toArray();
		
			$departments = Department::where('deletion_status', 0)
			->where('publication_status', 1)
			->orderBy('department', 'ASC')
			->select('id', 'department')
			->get()
			->toArray();

		return view('pdd.employee.edit', compact('employee','designations','departments'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $employee)
    {
        
    //    $this->Services->update($employee, $request->validated());
    // $employee->update($request->all());

    $input = $request->all();
  
    if ($picture = $request->file('picture')) {
        $destinationPath = 'upload/employee/';
        @unlink(public_path('upload/employee/' .$input->picture));
        $profilePicture = date('YmdHis') . "." . $picture->getClientOriginalExtension();
        $picture->move($destinationPath, $profilePicture);
        $input['picture'] = "$profilePicture";
    }else{
        unset($input['picture']);
    }
      
    $employee->update($input);


        return redirect()->route('employee.index')
                        ->withFlashSuccess('employees updated successfully');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$affected_row = User::where('id', $id)
			->update(['deletion_status' => 1]);

		if (!empty($affected_row)) {
			return redirect()->route('/employee')->with('message', 'Delete successfully.');
		}
		return redirect()->route('/employee')->with('exception', 'Operation failed !');
	}

	public function grbarcode(Request $request)
    {
       
        if ($request->ajax()) {
            $data = user::where('name','LIKE',$request->name.'%')->get();
            $output = '';
            if (count($data)>0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row) {
                    $output .= '<li class="list-group-item">'.$row->name.'</li>';
                }
                $output .= '</ul>';
            }else {
                $output .= '<li class="list-group-item">'.'<h6>Enter a valid File index</h6></br>Ko rabwa'.'</li>';
            }
            return $output;
        }
        return view('pdd.attendance.create')->with('output',$output); 

        // return response()-json($data);
    }

	public function barcodegenerator(Request $request)
    {
       $barcode = User::all();
       
        return view('pdd.employee.grbarcode_employees')->with('barcode',$barcode); 

        // return response()-json($data);
    }
	

}
