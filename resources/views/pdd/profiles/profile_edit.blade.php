@extends('layouts.app')
@section('title', __('Edit Designation'))

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-new-task">
                <!-- <div class="card-header"> {{ __('New Department') }}</div> -->
                <div class="card-body">
					<div class="content-wrapper">
						<!-- Content Header (Page header) -->
						<section class="content-header">
							<h1>
								{{ __('EDIT USER PROFILES') }}
							</h1>
							<ol class="breadcrumb">
								<li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
								<li><a>{{ __('Setting') }}</a></li>
								<li><a href="{{ url('/setting/designations') }}">{{ __('Designations') }}</a></li>
								<li class="active">{{ __('Edit') }}</li>
							</ol>
						</section>

						<!-- Main content -->
						<section class="content">
						<form action="{{route('profile.store', $employee->id)}}" method="post" name="designation_edit_form" enctype="multipart/form-data">


									
									@csrf
	
										<div class="box-body">
											<div class="row">
												<!-- Notification Box -->
												<div class="col-md-12">
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
													@endif
												</div>
												<!-- /.Notification Box -->
	
												<div class="col-md-6">
													<label for="name">{{ __(' Name') }} <span class="text-danger">*</span></label>
													<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
														<input type="text" name="name" id="name" class="form-control" value="{{$employee->name}}">
														@if ($errors->has('name'))
														<span class="help-block">
															<strong>{{ $errors->first('name') }}</strong>
														</span>
														@endif
													</div>
													<!-- /.form-group -->
													<label for="department_id">{{ __('Email Address') }} <span class="text-danger">*</span></label>
													<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
													<input type="email" name="email" id="email" class="form-control" value="{{$employee->email}}">
														@if ($errors->has('email'))
														<span class="help-block">
															<strong>{{ $errors->first('email') }}</strong>
														</span>
														@endif
													</div>
													<!-- /.form-group -->
													<label for="picture">{{ __('Picture  ') }}<span class="text-danger">*</span></label>
													<div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }} has-feedback">
														 <input type="file" id="picture" name="picture" class="form-control">
														@if ($errors->has('picture'))
														<span class="help-block">
															<strong>{{ $errors->first('picture') }}</strong>
														</span>
														@endif
													</div>
													<!-- /.form-group -->

													<!-- /.form-group -->
													
													<div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }} has-feedback">
													<img id="showpicture" src="{{(!empty($employee->picture))?url('/profile_picture/' . $employee->picture):url('/logo/'.'logo.png')}}" width="100px" height="100px"/>
														@if ($errors->has('picture'))
														<span class="help-block">
															<strong>{{ $errors->first('picture') }}</strong>
														</span>
														@endif
													</div>
													<!-- /.form-group -->
												</div>
												
											</div>
											<!-- /.row -->
										</div>
										<!-- /.box-body -->
										<div class="box-footer">
											<a href="{{ url('/setting/designations') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> {{ __('Cancel') }}</a>
											<button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-edit"></i> {{ __('Update profile') }}</button>
										</div>
									</form>
                        </section>
						<!-- /.content -->
					</div>
				</div>
            </div>
        </div>
    </div>

</div>
<script >
	$(document).ready(function){

		$('#picture').change(function(e)){

			var reader = new FileReader();
			reader.onload =function(e){
				$('#showpicture').attr('src', e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
			
@endsection
