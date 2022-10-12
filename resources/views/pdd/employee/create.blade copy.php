@extends('layouts.app')
@section('title', __('Add Employee'))

@section('content')
<div class="container">
<div class="content-wrapper">
@include('layouts.includes.nav')
    <section class="content-header p-5 mb-4 bg-light rounded-3 h-100 p-5 bg-light border rounded-3">
        <h1>
           {{ __('Add Employee') }}
        </h1>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/employee') }}">Back</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Employee</li>
            
        </ol>
        </nav>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
       
            <form action="{{ route('employee.store') }}" method="post" name="employee_add_form">
                {{ csrf_field() }}
                <div class="box-body">
                <div class="row">
                    <div class="form-group col-md-6">
                         @if (!empty(Session::get('message')))
                            <div class="alert alert-success alert-dismissible" id="notification_box">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-check"></i> {{ Session::get('message') }}
                            </div>
                            @elseif (!empty(Session::get('exception')))
                            <div class="alert alert-warning alert-dismissible" id="notification_box">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                            </div>
                            @else
                            <p class="text-yellow">{{ __('Enter team member details. All (*)field are required. (Default password for added user is 12345678)') }}</p>
                            @endif

                            <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="{{ __('Enter name..') }}">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        
                    </div>
                    <div class="form-group col-md-6">
                        <label for="receive-date"><span class="text-danger">*</span>Email</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control datepicker pull-right{{ $errors->has('receive_date') ? ' is-invalid' : '' }}" value="{{ old('receive_date') }}" id="receive-date" placeholder="Select Receive Date" name="receive_date" autocomplete="off">
                            @if ($errors->has('receive_date'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('receive_date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="letter-date"><span class="text-danger">*</span>Full Name</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control datepicker pull-right{{ $errors->has('letter_date') ? ' is-invalid' : '' }}" value="{{ old('letter_date') }}" id="letter-date" placeholder="Select letter Date" name="letter_date" autocomplete="off">
                            @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="receive-date"><span class="text-danger">*</span>Email</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control datepicker pull-right{{ $errors->has('receive_date') ? ' is-invalid' : '' }}" value="{{ old('receive_date') }}" id="receive-date" placeholder="Select Receive Date" name="receive_date" autocomplete="off">
                            @if ($errors->has('receive_date'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('receive_date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                </div>
                        <!-- /.Notification Box -->

                        <!-- /.form-group -->

                            <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="{{ __('Enter name..') }}">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                               
                            <!-- /.form-group -->

                            <label for="email">{{ __('Email') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="{{ __('Enter email address..') }}">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="contact_no_one">{{ __('Contact No') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('contact_no_one') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="contact_no_one" id="contact_no_one" class="form-control" value="{{ old('contact_no_one') }}" placeholder="{{ __('Enter contact no..') }}">
                                @if ($errors->has('contact_no_one'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact_no_one') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                              <!-- /.form-group -->

                              <label for="contact_no_two">{{ __('Contact No') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('contact_no_one') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="contact_no_two" id="contact_no_two" class="form-control" value="{{ old('contact_no_two') }}" placeholder="{{ __('Enter contact no..') }}">
                                @if ($errors->has('contact_no_two'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact_no_two') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="emergency_contact">{{ __('Emergency Contact') }}</label>
                            <div class="form-group{{ $errors->has('emergency_contact') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="emergency_contact" id="emergency_contact" class="form-control" value="{{ old('emergency_contact') }}" placeholder="{{ __('Enter emergency contact no..') }}">
                                @if ($errors->has('emergency_contact'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('emergency_contact') }}</strong>
                                </span>
                                @endif
                            </div>
                           
                            <!-- /.form-group -->

                            <label for="gender">{{ __('Gender') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} has-feedback">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                    <option value="m">{{ __('Male') }}</option>
                                    <option value="f">{{ __('Female') }}</option>
                                </select>
                                @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="datepicker4">{{ __('Joining Date') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('joining_date') ? ' has-error' : '' }} has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="date" name="joining_date" class="form-control pull-right" id="datepicker4" placeholder="{{ __('yyyy-mm-dd') }}">
                                </div>
                                @if ($errors->has('joining_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('joining_date') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6">
                            <label for="present_address">{{ __('Present Address') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('present_address') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="present_address" id="present_address" class="form-control" value="{{ old('present_address') }}" placeholder="{{ __('Enter present address..') }}">
                                @if ($errors->has('present_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('present_address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="permanent_address">{{ __('Permanent Address') }}</label>
                            <div class="form-group{{ $errors->has('permanent_address') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="permanent_address" id="permanent_address" class="form-control" value="{{ old('permanent_address') }}" placeholder="{{ __('Enter permanent address..') }}">
                                @if ($errors->has('permanent_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('permanent_address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <!-- <input type="hidden" name="home_district" value="None"> -->

       
                            <!-- /.form-group -->

                            <label for="id_name">{{ __('ID Name') }}</label>
                            <div class="form-group{{ $errors->has('id_name') ? ' has-error' : '' }} has-feedback">
                                <select name="id_name" id="id_name" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                    <option value="1">{{ __('NID') }}</option>
                                    <option value="2">{{ __('Passport') }}</option>
                                    <option value="3">{{ __('Driving License') }}</option>
                                </select>
                                @if ($errors->has('id_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('id_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="id_number">{{ __('ID Number') }}</label>
                            <div class="form-group{{ $errors->has('id_number') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="id_number" id="id_number" class="form-control" value="{{ old('id_number') }}" placeholder="{{ __('Enter id number..') }}">
                                @if ($errors->has('id_number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('id_number') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="designation_id">{{ __('Designation') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('designation_id') ? ' has-error' : '' }} has-feedback">
                                <select name="designation_id" id="designation_id" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                    @foreach($designations as $designation)
                                    <option value="{{ $designation['id'] }}">{{ $designation['designation'] }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('designation_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('designation_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="department_id">{{ __('Department') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }} has-feedback">
                                <select name="department_id" id="department" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                   
                                    @foreach($departments as $department)
                                    <option value="{{ $department['id'] }}">{{ $department['department'] }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('department_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('department_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                        <!-- /.form-group -->

                            <label for="marital_status">{{ __('Marital Status') }} </label>
                            <div class="form-group{{ $errors->has('marital_status') ? ' has-error' : '' }} has-feedback">
                                <select name="marital_status" id="marital_status" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                    <option value="1">{{ __('Married') }}</option>
                                    <option value="2">{{ __('Single') }}</option>
                                    <option value="3">{{ __('Divorced') }}</option>
                                    <option value="4">{{ __('Separated') }}</option>
                                    <option value="5">{{ __('Widowed') }}</option>
                                </select>
                                @if ($errors->has('marital_status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('marital_status') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <label for="datepicker">{{ __('Date of Birth') }}</label>
                            <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }} has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="date" name="date_of_birth" class="form-control pull-right" value="{{ old('date_of_birth') }}" id="datepicker">
                                </div>
                                @if ($errors->has('date_of_birth'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                       
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <label for="academic_qualification">{{ __('Academic Qualification') }}</label>
                            <div class="form-group{{ $errors->has('academic_qualification') ? ' has-error' : '' }} has-feedback">
                                <textarea name="academic_qualification" id="academic_qualification" class="form-control textarea" placeholder="{{ __('Enter academic qualification..') }}">{{ old('academic_qualification') }}</textarea>
                                @if ($errors->has('academic_qualification'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('academic_qualification') }}</strong>
                                </span>
                                @endif
                            </div>
                           
                            <!-- /.form-group -->

                          
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('employee.index') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i>{{ __('Cancel') }} </a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> {{ __('Add') }}</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->

    <div class="box-body">
                                                <h4 class="box-title text-info">FILE DETAILS</h4>
                                                <hr class="my-15">
                                                <div class="row">
                                                   <div class="form-group col-md-6">
                                                      <label for="letter-date"><span class="text-danger">*</span> File Date</label>
                                                      <div class="input-group date">
                                                            <div class="input-group-addon">
                                                               <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="date" class="form-control datepicker pull-right{{ $errors->has('letter_date') ? ' is-invalid' : '' }}" value="{{ old('letter_date') }}" id="letter-date" placeholder="Select letter Date" name="letter_date" autocomplete="off">
                                                           @if(session()->has('error'))
                                                            <div class="alert alert-danger">
                                                               {{ session()->get('error') }}
                                                            </div>
                                                         @endif
                                                      </div>
                                                   </div>
                                                   <div class="form-group col-md-6">
                                                      <label for="receive-date"><span class="text-danger">*</span> Receive Date</label>
                                                      <div class="input-group date">
                                                            <div class="input-group-addon">
                                                               <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="date" class="form-control datepicker pull-right{{ $errors->has('receive_date') ? ' is-invalid' : '' }}" value="{{ old('receive_date') }}" id="receive-date" placeholder="Select Receive Date" name="receive_date" autocomplete="off">
                                                            @if ($errors->has('receive_date'))
                                                               <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $errors->first('receive_date') }}</strong>
                                                            </span>
                                                            @endif
                                                      </div>
                                                   </div>
                                                   
                                                </div>
                                                <div class="row">
                                                <div class="form-group col-md-6">
                                                      <label for="details"><span class="text-danger">*</span> Details</label>
                                                      <input type="text" class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}" value="{{ old('details') }}" id="details" name="details" placeholder="Enter details">
                                                      @if(session()->has('error'))
                                                         <div class="alert alert-danger">
                                                            {{ session()->get('error') }}
                                                         </div>
                                                      @endif
                                                   </div>
                                                   <div class="col-md-6">
                                                      <div class="form-group">
                                                            <label for="file_index">File Index</label>
                                                            <input type="text" name="letter_ref_no" id="file_index" class="form-control" value="{{ old('file_index') }}" autocomplete="off">
                                                      </div>
                                                      <div id="file_index_list"></div>
                                                   </div>
                                                   <div class="col-lg-3"></div>
                                                   
                                                </div>

                                                <!-- <div class="row"> -->
                                                                                                      
                                                <!-- <div class="row">
                                                   
                                                </div> -->

                                              
                                                <div class="row">
                                                   <div class="form-group col-md-4">
                                                      <label for="file_name"><span class="text-danger">*</span>File</label>
                                                      <input type="file" name="file" placeholder="Choose file" id="file">
                                                      @if(session()->has('error'))
                                                         <div class="alert alert-danger">
                                                            {{ session()->get('error') }}
                                                         </div>
                                                      @endif
                                                   </div>
                                                </div>

                                                <div class="row">
                                                   <div class="col-md-6">
                                                      <h4 class="box-title text-info">FROM DETAILS</h4>
                                                      <hr class="my-15">
                                                      <div class="form-group">
                                                            <label for="from-details-name"><span class="text-danger">*</span>Sender Name</label>
                                                            <input type="text" class="form-control{{ $errors->has('from_details_name') ? ' is-invalid' : '' }}" value="{{ old('from_details_name') }}" name="from_details_name" id="from-details-name" placeholder="Enter From Name">
                                                            @if ($errors->has('from_details_name'))
                                                               <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $errors->first('from_details_name') }}</strong>
                                                            </span>
                                                            @endif
                                                      </div>
                                                      <div class="form-group">
                                                            <label for="comments">comment</label>
                                                            <input type="text" class="form-control" name="comments" value="{{ old('comments') }}" id="comments" placeholder="Enter From Address">
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <h4 class="box-title text-info">TO DETAILS</h4>
                                                      <hr class="my-15">
                                                            <div class="form-group">
                                                            <label for="to-details-person-name">Receiving Person Name</label>
                                                            <input type="text" class="form-control" name="to_details_person_name" value="{{ old('to_details_person_name') }}" id="to-details-person-name" placeholder="Enter To Person Name">
                                                      </div>
                                                   </div>
                                                </div>
                                           </div>
</div>
</div>
<!-- <script type="text/javascript">
    document.forms['employee_add_form'].elements['gender'].value = "{{ old('gender') }}";
    document.forms['employee_add_form'].elements['id_name'].value = "{{ old('id_name') }}";
    document.forms['employee_add_form'].elements['designation_id'].value = "{{ old('designation_id') }}";
    document.forms['employee_add_form'].elements['role'].value = "{{ old('role') }}";
    document.forms['employee_add_form'].elements['joining_position'].value = "{{ old('joining_position') }}";
    document.forms['employee_add_form'].elements['marital_status'].value = "{{ old('marital_status') }}";
</script> -->
@endsection
