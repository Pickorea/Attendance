@extends('layouts.app')
@section('title', __('Attendance Statement Search'))

@section('content')




<div class="container">
<div class="content-wrapper">
@include('layouts.includes.nav')
  <section class="content-header">
    <h1>
      {{ __('Employees Attendance by Year') }}
    </h1>
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                
                <li class="breadcrumb-item active" aria-current="page">Attendance Search by Year</li>
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


          <form class="form-horizontal" action="{{ route('attendance.searchAttendanceByYear') }}" method="get">

            {{ csrf_field() }}

            {{--<input type="hidden" name="year" value="{{$yearsearch}}">--}}
               <!-- /.end group -->
               <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
              <label for="logdate" class="col-sm-3 control-label">{{ __('Year') }} </label>
              <div class="col-sm-6">
                <select name="logdate" id="user_id" class="form-control">
                  <option value="0">{{ __('Select One') }}</option>
                  @foreach($year as $yr)
                  <option value="{{ $yr }}"><strong>{{ $yr }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('logdate'))
                  <span class="help-block">
                    <strong>{{ $errors->first('logdate') }}</strong>
                  </span>
                  @endif
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