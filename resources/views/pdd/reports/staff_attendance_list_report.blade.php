@extends('layouts.app')
@section('title', __('Attendance Statement'))
@section('content')
<div class="container">
<div class="content-wrapper">
@include('layouts.includes.nav')
    <section class="content-header">
        <h1>
           {{ __('ATTENDANCE SHEET') }} 
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Attendance Sheet</li>
            </ol>
        </nav>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <!-- <div class="box-header with-border">
                <h3 class="box-title">{{ __('Manage designations') }}</h3>

            </div> -->
            <div class="box-body">
                
                    <div class="box-header with-border">
                        <div class="alert alert-info clearfix">
                            <a href="{{ route('attendance.AttendanceExcelExport') }}" class="alert-link"><button type="button" class="btn btn-primary btn-sm float-end">{{ __(' To Excel') }}</button></a>
                            <a target="_blank" href="{{ route('attendance.allAttendanceReportPdf') }}" class="alert-link"><button type="button" class="btn btn-primary btn-sm float-start">{{ __(' To PDF') }}</button></a>  
                        </div>
                        
                     </div>
                <!-- <div  class="col-md-6">
                    <input type="text" id="myInput" class="form-control" placeholder="{{ __('Search..') }}">
                </div> -->
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
                <div  class="col-md-12 table-responsive">
                    <div>
                       
                    </div>
           
               
                <div id="printable_area">
                    
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                           
                                <th>{{ __('Attendance Date') }}</th>
                                <th>{{ __('Employee Name') }}</th>
                          
                                <th>{{ __('In Time') }}</th>
                                <th>{{ __('Out Time') }}</th>
                                <th>{{ __('Hours Worked') }}</th>
                            </tr>
                        </thead>
                        <tbody>
              
                            @foreach($employees as $attd)
                            <tr>
                
                            
                                <td>{{ $attd->logdate }}</td>
                                <td>{{ $attd->name }}</td>
                               {{--<td>
                                    @if($attd->status==1)
                                    <b class="btn btn-success">{{ __('Full Day') }}</b>
                                    @else
                                    <b class="btn btn-danger">{{ __('Absence') }}</b>
                                    @endif
                                </td>--}}
                                {{--<td>
                                    @if($attd->leave_category_id==0)
                                    <b class="btn btn-primary">{{ __('No Leave') }}</b>
                                    @else
                                    <b class="btn btn-success">{{ __('Leave') }}</b>
                                    @endif
                                </td>--}}
                                <td>{{ $attd->timein ?? 'not sign in' }}</td>
                                <td>{{ $attd->timeout ?? 'not sign out'}}</td>
                             
                                {{--<td>{{Carbon::parse($attd->timeout)}}</td>--}}
                                {{--<td>{{Carbon::parse($attd->timein)}}</td>--}}
                                <!-- calculate hours work between timein and timeout -->
                                <td>{{ (new Carbon($attd->timeout))->diff(new Carbon($attd->timein))->format('%h:%I') }}</td>
                             
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                  </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    </div>
    @endsection