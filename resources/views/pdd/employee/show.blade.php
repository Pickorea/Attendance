@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

  
        <div class="col-md-12">
            <div class="card card-new-task">
                <div class="card-header">  {{ __('Details') }}</div>
                <div class="card-body">

                <form method="post">
                <div class="row">
                <div class="col-md-4">
                        
                    </div>
                    
                    <div class="col-md-2">
                       
                        <a class="profile-edit-btn btn btn-primary"  href="{{route('employee.edit',$employee)}}" >Edit Profile</a>

                    </div>
                </div>

                <article>
                <div class="row">
                <div class="col-md-4">
                        <div class="profile-work">
                      
                            
                            <img src="{{url('/profile_picture/' . $employee->picture)}}" width="360px" height="290px"/>
                            <div class="d-flex justify-content-center mb-2">
              <!-- <button type="button" class="btn btn-primary">Edit Profile</button> -->
              <a class="profile-edit-btn btn btn-primary"  href="{{route('profile.edit',$employee->id)}}" >Edit Profile</a>
              <a target="_blank" class="profile-edit-btn btn btn-primary"  href="{{route('profile.profile.pdf',$employee->id)}}" >PDF</a>

             
           
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['gender'] == 1 ? 'Male' : 'Female'}}</p>
                                            </div>
                                        </div>
                                     
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>DoB</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['date_of_birth']}}</p>
                                            </div>
                                        </div>
                                
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Qualification</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['academic_qualification']}}</p>
                                            </div>
                                        </div>
                                  
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Current Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['present_address']}}</p>
                                            </div>
                                        </div>
                                 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date of Joining</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['joining_date']}}</p>
                                            </div>
                                        </div>
                                 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>PF Number</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['pf_number']}}</p>
                                            </div>
                                        </div>
                                      

                                        <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Retirement Date</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$result}}</p>
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">No. of Years</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$datejoin}}</p>
                                        </div>
                                        </div>
                                       
                            </div>
                           
                                       
                                       
                        </div>
                    </div>
                </div>
                </article>
               
            </form>           

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

