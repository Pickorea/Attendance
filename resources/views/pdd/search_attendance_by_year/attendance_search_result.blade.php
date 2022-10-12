@extends('layouts.app')
@section('title', __('Employee'))

@section('content')
<div class="container">
<div class="content-wrapper">
@include('layouts.includes.nav')
    <section class="content-header">
        <h1>
            {{ __('Employees Attendance Searched by Year') }}
        </h1>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('attendance.searchattendance') }}">Back to Search</a></li>
                <li class="breadcrumb-item active" aria-current="page">Attendance Search by Year</li>
            </ol>
        </nav>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                
          
                <div class="box-header with-border">
                        <div class="alert alert-info clearfix">
                            <!-- <a href="{{ route('attendance.create') }}" class="alert-link"><button type="button" class="btn btn-primary btn-sm float-end">{{ __(' To EXCEL') }}</button></a>  -->
                            <a target="_blank" href="{{ route('attendance.yearlyAttendanceReportPdf', $yearsearch) }}" class="alert-link"><button type="button" class="btn btn-primary btn-sm float-start">{{ __(' To PDF') }}</button></a>
                        </div>
             
                     </div>
            </div>
            <div class="box-body">
                
            
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
        <div id="printable_area" class="col-md-12 table-responsive">
               
                    <div id="printable_area">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               <th> {{ __(' SL') }}</th>
                               {{--<th> {{ __(' EMP CD') }}</th>--}}
                               <th> {{ __(' Employee Name') }}</th>
                                <th> {{ __(' Year Searched') }}</th>
                                <th> {{ __(' In Time') }}</th>
                                <th> {{ __(' Out Time') }} </th> 
                                
                
                            
                               
                                
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php $sl=1;?> -->
                       
                            @foreach($attendances as $key => $attd)
                            <tr>
                                <td>{{$key+1}}</td>
                                {{--<td>{{ __('EMP') }}{{$key+1}}</td>--}}
                                <td>{{ $attd->name }}</td>
                                <td>{{ date("D d F Y", strtotime($attd->logdate)) }}</td>  
                                {{--<td>{{$attd->Year}}</td>--}}
                                {{--<td>{{$attd->Month}}</td>--}}
                                {{--<td>{{$attd->Day}}</td>--}}
                                
                                <td>{{ $attd->timein }}</td>
                                <td>{{ $attd->timeout }}</td>
                               
                               
                                
                       {{--<td>{{ date("D d F Y h:ia", strtotime($attd['created_at'])) }}</td>--}}
                       
                       
                                                  
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
              
            </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
</div>
@endsection