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
                <li class="breadcrumb-item"><a href="{{ route('attendance.searchIndividualAttendance') }}">Back to Search</a></li>
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
                            <a target="_blank" href="{{ route('attendance.attendance.attDetailsReportPdf',[request()->emp_id, request()->date1, request()->date2]) }}" class="alert-link"><button type="button" class="btn btn-primary btn-sm float-end">{{ __(' To PDF') }}</button></a> 
                        </div>
                     </div>
                <div  class="col-md-6">
           
                </div>
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
              
                    <p> <strong>Attendance From:</strong> {{date("D d F Y",strtotime($date1))}} <strong>To:</strong>  {{date("D d F Y",strtotime($date2))}}</p> 
                    </div>
              
               
                <div id="printable_area">
                    
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                
                              
                             
                                <th>{{ __('Attendance Date') }}</th>                          
                                <th>{{ __('In Time') }}</th>
                                <th>{{ __('Out Time') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            @foreach($attendance as $attd)
                            <tr>
                         
                                <td>{{ $attd->logdate }}</td>
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
                                <td>{{ $attd->timein }}</td>
                                <td>{{ $attd->timeout }}</td>
                                
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                    <div class="st-left-body">
                <table class="table table-bordered table-striped">
                        <thead>
                            
                        </thead>
                        <tbody>
                        <tr>
                                <th>{{ __('Total') }}</th>
                                <th>{{$attendance->count()}} days</th>
                            </tr>
                            <tr>
                                <th>{{ __('Total') }}</th>
                                <th>{{$attds->count()}} {{ __('Present') }}</th>
                            </tr>
                            <tr>
                                <th>{{ __('Total') }}</th>
                                <th>{{$abs->count()}} {{ __('Absence') }}</th>
                            </tr>

                            <tr>
                                <th>{{ __('Total') }}</th>
                                <th>{{$nulltimein->count()}} {{ __('Not Sign IN') }}</th>
                            </tr>
                            <tr>
                                <th>{{ __('Total') }}</th>
                                <th>{{$nulltimeout->count()}} {{ __('Not Sign Out') }}</th>
                            </tr>
                        </tbody>
                    </table>
                    </div><!--printable-->
                    <div class="sign-body-l">-----------------------------------<br></div>
                    <div class="sign-body-r">-----------------------------------<br>{{ __('Issued by') }}."".{{Auth::user()->name}}</div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    </div>
    @endsection