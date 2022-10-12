@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<div class="container">

    <div class="row justify-content-center">

    <table class="table table-striped">
  ...
</table>
        <div class="col-md-12">
            <div class="card card-new-task">
                <div class="card-header">  {{ __('Details') }}</div>
                <div class="card-body">

                <form method="post">
                <div class="row">
                <div class="col-md-4">
                        <div class="profile-img">
                        <img src="{{url('/upload/employee/' . $employee->picture)}}" width="280px" height="180px"/>
                            <!-- <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    {{$employee['first_name']}}   {{$employee['last_name']}}
                                    </h5>
                                    <h6>
                                    
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Education</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <!-- <input type="submit" class="profile-edit-btn btn btn-primary" name="btnAddMore" value="Edit Profile"/> -->
                        <a class="profile-edit-btn btn btn-primary"  href="{{route('employees.edit',$employee)}}" >Edit Profile</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><th>Gender</th></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['gender']}}</p>
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
                                                <p>{{$employee['professional_qualification']}}</p>
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
                                                <label>Permenant Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['permanent_address']}}</p>
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
                                                <p>{{$employee['pf_no']}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Contact One</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['contact_no_one']}}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Contact Two</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['contact_no_two']}}</p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                         
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date of Joining</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['date_of_joining']}}</p>
                                            </div>
                                        </div>
                            
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><th>Gender</th></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee->gender}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>DoB</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee->date_of_birth}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Qualification</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee->qualification}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Current Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee->current_address}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Permenant Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee->permanent_address}}</p>
                                            </div>
                                        </div>
                                       
                                       
                        </div>
                    </div>
                </div>
            </form>           

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

