<?php
use Carbon\Carbon;
?>
@extends('layouts.app')
@section('title', __('Leave Application'))

@section('content')
<div class="container">
<div class="content-wrapper">
@include('layouts.includes.nav')
    <section class="content-header">
        <h1>
           {{ __('LEAVE BALANCE') }} 
        </h1>
        
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Leave balance') }}</h3>

                <div class="box-header with-border">
                        <div class="alert alert-info clearfix">
                            <a href="{{ route('leave_balance.create') }}" class="alert-link"><button type="button" class="btn btn-primary btn-sm float-end">{{ __(' Add Holiday') }}</button></a> 
                        </div>
                 </div>
            </div>
            <div class="box-body">
                <div  class="col-md-6">
                <a href="{{ route('leave.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ __('Add leave application') }}</a>
            </div>
                <div  class="col-md-6">
                    <input type="text" id="myInput" class="form-control" placeholder="{{ __('Search..') }}">
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
                <div class="col-md-12 table-responsive">
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('SL#') }}</th>
                                <th>{{ __('Employee Name') }}</th>
                                <th>{{ __('Year') }}</th>
                                <th>{{ __('Leave B/Forward') }}</th>
                                <th>{{ __('Leave Eligibility') }}</th>
                                <th>{{ __('Total Leave Taken') }}</th>
                                <th>{{ __('Total Leave Balance') }}</th>
                               
                            </tr>
                        </thead>
                        <tbody id="myTable">
                        @php ($sl = 1)
                        @foreach($leavebalance as $leave_balance)
                          <tr>
                            <td>
                                {{  $sl++ }}
                            </td>

                            <td >
                                {{ $leave_balance->name }} 
                            </td>
                            <td >
                                 {{ $leave_balance->year }} 
                            </td>
                            <td >
                                {{ $leave_balance->total_leave_taken }} 
                            </td>
                            <td >
                                {{ $leave_balance->total_leave_taken }} 
                            </td>
                           
                          

                            <td >
                                {{ $leave_balance->total_leave_taken }} 
                            </td>
                            <td >
                                {{ $leave_balance->total_leave_balance }} 
                            </td>

                          
                       
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
