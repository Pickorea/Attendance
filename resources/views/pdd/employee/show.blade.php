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
                            
                        <img src="{{url('/profile_picture/' . $employee->picture)}}" width="360px" height="290px"/>
                            <!-- <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div> -->
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <!-- <input type="submit" class="profile-edit-btn btn btn-primary" name="btnAddMore" value="Edit Profile"/> -->
                        <a class="profile-edit-btn btn btn-primary"  href="{{route('employee.edit',$employee)}}" >Edit Profile</a>
                    </div>
                </div>

                <article>
                <div class="row">
                    
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><th>Gender</th></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['gender'] == 1 ? 'Male' : 'Female'}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>DoB</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['date_of_birth']}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Qualification</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['academic_qualification']}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Current Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['present_address']}}</p>
                                            </div>
                                        </div>
                                       
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date of Joining</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['joining_date']}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>PF Number</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$employee['pf_number']}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                       
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

