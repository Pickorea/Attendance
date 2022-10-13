@extends('layouts.app')

@section('content')

<div class="container">
@include('layouts.includes.nav')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-new-task">
                <div class="card-header"></div>
                <div class="card-body">
                <div class="content-wrapper">
                <!-- Content Header (Page header) -->
              

                    <!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ __('ENTER EMPLOYEES DETAILS') }}</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                            <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ route('employee.store') }}" >
                                                                    @csrf
                                       
                                          <div class="box-body">
                                          <h4 class="box-title text-info"> SECTION A</h4>
                                                <hr class="my-15">
                                                <div class="row">
                                               
                                                   <div class="form-group col-md-6">
                                                      <label for="name"><span class="text-danger">*</span> FULL NAME</label>
                                                   
                                                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" id="name" placeholder="Enter a Full Name" name="name" autocomplete="off">
                                                           @if(session()->has('error'))
                                                            <div class="alert alert-danger">
                                                               {{ session()->get('error') }}
                                                            </div>
                                                         @endif
                                                   
                                                   </div>
                                                   <div class="form-group col-md-6">
                                                      <label for="email"><span class="text-danger">*</span> EMAIL</label>
                                                     
                                                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" id="email" placeholder="Enter Email" name="email" autocomplete="off">
                                                            @if ($errors->has('receive_date'))
                                                               <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                            @endif
                                                   
                                                   </div>
                                                   
                                                </div>
                                                <!-- new input -->
                                                <h4 class="box-title text-info"> SECTION B</h4>
                                                <hr class="my-15">
                                                <div class="row">
                                               
                                                   <div class="form-group col-md-6">
                                                      <label for="emergency_contact"><span class="text-danger">*</span> Emergency Contact</label>
                                                   
                                                            <input type="text" class="form-control {{ $errors->has('emergency_contact') ? ' is-invalid' : '' }}" value="{{ old('emergency_contact') }}" id="emergency_contact" placeholder="Enter a Emergency Contact" name="emergency_contact" autocomplete="off">
                                                           @if(session()->has('error'))
                                                            <div class="alert alert-danger">
                                                               {{ session()->get('error') }}
                                                            </div>
                                                         @endif
                                                   
                                                   </div>
                                                   <div class="form-group col-md-6">
                                                   <label for="gender">{{ __('Gender') }} <span class="text-danger">*</span></label>
                                                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} has-feedback">
                                                            <select name="gender" id="gender" class="form-control">
                                                                <option value="" selected disabled>{{ __('Select one') }}</option>
                                                                <option value="1">{{ __('Male') }}</option>
                                                                <option value="0">{{ __('Female') }}</option>
                                                            </select>
                                                            @if ($errors->has('gender'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('gender') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                  
                                                   </div>
                                                   
                                                </div>
                                                <h4 class="box-title text-info"> SECTION C</h4>
                                                <hr class="my-15">
                                                 <!-- new input -->
                                                 <div class="row">
                                                
                                                   <div class="form-group col-md-6">
                                                   <label for="joining_date"><span class="text-danger">*</span> JOINING DATE</label>
                                                      <div class="input-group date">
                                                            <div class="input-group-addon">
                                                               <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="date" class="form-control datepicker pull-right{{ $errors->has('joining_date') ? ' is-invalid' : '' }}" value="{{ old('joining_date') }}" id="joining_date" placeholder="Enter Joining Date" name="joining_date" autocomplete="off">
                                                           @if(session()->has('error'))
                                                            <div class="alert alert-danger">
                                                               {{ session()->get('error') }}
                                                            </div>
                                                         @endif
                                                      </div>
                                                   </div>
                                                   <div class="form-group col-md-6">
                                                   <label for="present_address">{{ __('ADDRESS') }} <span class="text-danger">*</span></label>
                                                        <div class="form-group{{ $errors->has('present_address') ? ' has-error' : '' }} has-feedback">
                                                        <input type="text" class="form-control datepicker pull-right{{ $errors->has('present_address') ? ' is-invalid' : '' }}" value="{{ old('present_address') }}" id="present_address" placeholder="Enter Present Address" name="present_address" autocomplete="off">
                                                            @if ($errors->has('present_address'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('present_address') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                  
                                                   </div>
                                                   
                                                </div>

                                                <!-- new input -->
                                                <h4 class="box-title text-info"> SECTION D</h4>
                                                <hr class="my-15">
                                                <div class="row">
                                             
                                                   <div class="form-group col-md-6">
                                                   <label for="id_name"><span class="text-danger">*</span> ID NAME</label>
                                                   <select name="id_name" id="id_name" class="form-control">
                                                        <option value="" selected disabled>{{ __('Select one') }}</option>
                                                        <option value="1">{{ __('NID') }}</option>
                                                        <option value="2">{{ __('Passport') }}</option>
                                                        <option value="3">{{ __('Driving License') }}</option>
                                                    </select>
                                                           @if(session()->has('error'))
                                                            <div class="alert alert-danger">
                                                               {{ session()->get('error') }}
                                                            </div>
                                                         @endif
                                                      
                                                   </div>
                                                   <div class="form-group col-md-6">
                                                   <label for="id_number">{{ __('ID NUMBER') }} <span class="text-danger">*</span></label>
                                                        <div class="form-group{{ $errors->has('id_number') ? ' has-error' : '' }} has-feedback">
                                                        <input type="text" class="form-control datepicker pull-right{{ $errors->has('id_number') ? ' is-invalid' : '' }}" value="{{ old('id_number') }}" id="id_number" placeholder="Enter Present Address" name="id_number" autocomplete="off">
                                                            @if ($errors->has('id_number'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('id_number') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                  
                                                   </div>
                                                   
                                                </div>

                                                 <!-- new input -->
                                                 <h4 class="box-title text-info"> SECTION E</h4>
                                                <hr class="my-15">
                                                 <div class="row">
                                                   <div class="form-group col-md-6">
                                                   <label for="designation_id">{{ __('Designation') }} <span class="text-danger">*</span></label>
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
                                                   <div class="form-group col-md-6">
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
                                                   
                                                </div>

                                                 <!-- new input -->
                                                 <h4 class="box-title text-info"> SECTION F</h4>
                                                <hr class="my-15">
                                                 <div class="row">
                                                   <div class="form-group col-md-6">
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
                                                      
                                                   </div>
                                                   <div class="form-group col-md-6">
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
                                                   
                                                </div>

                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <div class="form-group">
                                                      <label for="academic_qualification">{{ __('Academic Qualification') }}</label>
                                                    <div class="form-group{{ $errors->has('academic_qualification') ? ' has-error' : '' }} has-feedback">
                                                        <textarea name="academic_qualification" id="academic_qualification" class="form-control textarea" placeholder="{{ __('Enter academic qualification..') }}">{{ old('academic_qualification') }}</textarea>
                                                        @if ($errors->has('academic_qualification'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('academic_qualification') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                      <label for="pf_number">{{ __('PF NUMBER') }}</label>
                                                    <div class="form-group{{ $errors->has('pf_number') ? ' has-error' : '' }} has-feedback">
                                                        <textarea name="pf_number" id="pf_number" class="form-control textarea" placeholder="{{ __('Enter PF Number..') }}">{{ old('pf_number') }}</textarea>
                                                        @if ($errors->has('pf_number'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('pf_number') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <label for="picture">{{ __('Picture  ') }}<span class="text-danger">*</span></label>
													<div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }} has-feedback">
														 <input type="file" id="picture" name="picture" class="form-control">
														@if ($errors->has('picture'))
														<span class="help-block">
															<strong>{{ $errors->first('picture') }}</strong>
														</span>
														@endif
                                                   </div>
                                                  
                                                </div>
                                           </div>
                                          <!-- /.box-body -->
                                          <div class="box-footer text-right">
                                                <button type="submit" class="btn btn-primary btn-outline">
                                                   <i class="ti-save-alt"></i> Save
                                                </button>
                                                <a class="btn btn-warning btn-outline mr-1" href="">
                                                   <i class="ti-trash"></i> Cancel
                                                </a>
                                          </div>
                                          <!-- /.box-footer -->
                                       </form>
                                       </div>
                                                   <!-- /.box-body -->
                                                </div>
                                                <!-- /.box -->
                                          </section>
                                          <!-- /.content -->

                                       </div>
                                    </div>
                              </div>
                           </div>

                        </div>

                       
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        
@endsection
   