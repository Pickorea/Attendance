@extends('layouts.app')
@section('title', __('Attendance Statement Search'))

@section('content')




<div class="container">
<div class="content-wrapper">
@include('layouts.includes.nav')
  <section class="content-header">
    <h1>
      {{ __('Individual Attendance Search') }}
    </h1>
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="{{ route('attendance.searchIndividualAttendance') }}">Back to Search</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Individual Attendance Sheet</li>
            </ol>
        </nav>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
          <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
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
        <div class="col-md-12">


          <form class="form-horizontal" action="{{ route('attendance.attendance.attDetailsReport') }}" method="get">

            {{ csrf_field() }}



            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
              <label for="user_id" class="col-sm-3 control-label">{{ __('Employee Name') }} </label>
              <div class="col-sm-6">
                <select name="emp_id" id="user_id" class="form-control">
                  <option value="0">{{ __('Select One') }}</option>
                  @foreach($employees as $employee)
                  <option value="{{ $employee['id'] }}"><strong>{{ $employee['name'] }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('user_id'))
                  <span class="help-block">
                    <strong>{{ $errors->first('user_id') }}</strong>
                  </span>
                  @endif
                </div>
              </div>


               <!-- /.end group -->
              <div class="form-group{{ $errors->has('salary_month') ? ' has-error' : '' }}">
                <label for="salary_month" class="col-sm-3 control-label">{{ __('Select Month') }}</label>
                <div class="col-sm-6">

                    <input type="date" name="date1" class="form-control" id="reservation">
                    <input type="date" name="date2" class="form-control" id="reservation">


                </div>
              </div>

             
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-arrow-right"></i> {{ __('View Attendence Statement') }}</button>
                </div>
              </div>
              <!-- /.end group -->
            </form>
            <!-- /. end form -->
          </div>
          <!-- /. end col -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix"></div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  </div>
  @endsection