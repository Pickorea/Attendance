@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
<div class="container">

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img id="message" src="{{(!empty($employee->picture))?url('/profile_picture/' . $employee->picture):url('/logo/'.'logo.png')}}"  style="width: 150px;"/>
          

           {{--<p class="text-muted mb-1">{{$employee['date_of_birth']}}</p>
            <p class="text-muted mb-4">{{$employee['date_of_birth']}}</p>--}}
            <br>
            <br>
            <hr>
            <div class="d-flex justify-content-center mb-2">
              <!-- <button type="button" class="btn btn-primary">Edit Profile</button> -->
              <a class="profile-edit-btn btn btn-primary"  href="{{route('profile.edit',$employee->id)}}" >Edit Profile</a>
              <a target="_blank" class="profile-edit-btn btn btn-primary"  href="{{route('profile.profile.pdf',$employee->id)}}" >PDF</a>

              <!-- <button type="button" id="message" class="btn btn-outline-primary ms-1">Message</button> -->
            </div>
          </div>
        </div>
      
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$employee['name']}}</p>
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$employee['email']}}</p>
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$employee['contact_no_one']}}</p>
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$employee['contact_no_two']}}</p>
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Current Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$employee['present_address']}}</p>
              </div>
            </div>

  
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Permenant Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$employee['permanent_address']}}</p>
              </div>
            </div>

  
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Qualification</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$employee['academic_qualification']}}</p>
              </div>
            </div>

  
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Joining Date</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$employee['joining_date']}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">DoB</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$employee['date_of_birth']}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Designation</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$employee->designation}}</p>
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-3">
                
              </div>
             {{--<div class="col-sm-9">
                <p class="text-muted mb-0">{{$employee['id']}}</p>
               
              </div>--}}
            </div>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">PF No</p>
              </div>
              <div class="col-sm-9">
               
              </div>
            </div>

  
        
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$employee['gender']==1?'Female':'Male'}}</p>
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
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
             
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <script>
  $(documet).ready(function(){

    $('button').click(function(){


      $('#message').animate({width:500px});


    });

  });
</script> -->


@endsection

<script type="text/javascript">
        function animateImage() {
            console.log("Called");
            $('#message').css({right:'10%'});   
            $('#message').animate({right: '-100%'}, 5000, 'linear', function(){animateImage();});
        }
        $(document).ready(function() {
          $('button').click(function{

            animateImage();     

          });
                    
        }); 
    </script>