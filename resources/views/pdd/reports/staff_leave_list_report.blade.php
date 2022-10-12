@extends('layouts.app')
@section('title', __('Designations'))

@section('content')
<div class="container">
<div class="content-wrapper">
@include('layouts.includes.nav')
    <section class="content-header">
        <h1>
           {{ __('REPORT') }} 
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('report.department.employees.index') }}">Department Employees</a></li>
                
                <li class="breadcrumb-item"><a href="{{ route('report.employees.leave.index') }}">Employee Leave</a></li>
                
                <li class="breadcrumb-item"><a href="{{ route('report.employees.attendance.index') }}">Employee Attendance</a></li>
           
            </ol>
        </nav>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
               

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
                <div  class="col-md-12 table-responsive">
                <table  class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                 
                                    <th>{{ __('Name') }}</th>
                                    <th class="text-center">{{ __('Start Date') }}</th>
                                    <th class="text-center">{{ __('End Date') }}</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                           
                    @foreach($employees as $employee)
                                
                                <tr>
                                <td>  {{$employee->name }}  </td>
                                <td>  {{$employee->start_date}}  </td>
                                <td>  {{$employee->end_date}}  </td>

                               
                                
                            
                                
                          
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