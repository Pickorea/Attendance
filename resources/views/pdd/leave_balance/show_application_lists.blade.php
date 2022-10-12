<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ __('Attendance Report') }}</title>

   

</head>
<body>
    <div class="header">
        <img src="{{ url('public/backend/img/corporatelogo.png') }}">
    </div>
    <div class="footer"><p>{{ __('Page:') }} <span class="pagenum"></span></p></div>
    <div class="container table-responsive">
       <table>
        <thead>
            <tr>
                <th>{{ __('SL') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Designation') }}</th> 
                <th>{{ __('Total Attendance') }}</th>
                <?php
use Carbon\Carbon;
?>
@extends('administrator.master')
@section('title', __('Show Leave Application Lists'))

@section('main_content')
<div class="content-wrapper">
@include('layouts.includes.nav')
  <section class="content-header">
    <h1>
     {{ __('Show Leave Application Lists') }} 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
      <li><a>{{ __('Leave') }}</a></li>
      <li><a href="{{ url('/hrm/application_lists') }}">{{ __('Manage Leave Application Lists') }}</a></li>
      <li class="active">{{ __('Details') }}</li>
    </ol>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{ __('Show of Leave Application Lists') }}</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body table-responsive">
      <a href="{{ url('/hrm/application_lists') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>{{ __('Back') }} </a>
      <hr>
      <table  class="table table-bordered table-striped">
        <tbody id="myTable">


          <tr>
            <td>{{ __('Leave Reason') }}</td>
            <td>{{$leave_application['reason']}}</td>
          </tr>
          <tr>
            <td>{{ __('Start Date') }}</td>
            <td>{{ date("d F Y", strtotime( $leave_application['start_date'] )) }}</td>
          </tr>
          <tr>
            <td>{{ __('End date') }}</td>
            <td>{{ date("d F Y", strtotime($leave_application['end_date'])) }}</td>
          </tr>
          <tr>
            <td>{{ __('Leave Days') }}</td>
            <td>
              @php($leave_days = Carbon::parse($leave_application['start_date'])->diffInDays(Carbon::parse($leave_application['end_date']))+1)
              {{ $leave_days }}
            </td>
          </tr>
          <tr>
            <td>{{ __('Leave Category') }}</td>
            <td>{{ $leave_application['leave_category'] }}</td>
          </tr>
          <tr>
            <td>{{ __('Created By') }}</td>
            <td>{{ $leave_application['name'] }}</td>
          </tr>

          <tr>
            <td>{{ __('Apply date') }}</td>
            <td>{{ date("D d F Y h:ia", strtotime($leave_application['created_at'])) }}</td>
          </tr>
          <tr>
            <tr>
              <td colspan="2">
                <div class="btn-group btn-group-justified">
                  @if($leave_application['publication_status'] == 1)
                  <div class="btn-group">
                    <a href="" class="tip btn btn-success btn-flat" data-toggle="tooltip" data-original-title="Accepted">
                      <i class="icon fa fa-smile-o"></i>
                      <span class="hidden-sm hidden-xs">{{ __('Accepted') }} </span>
                    </a>
                  </div>
                  @elseif($leave_application['publication_status'] == 2)
                  <div class="btn-group">
                    <a href="" class="tip btn btn-danger btn-flat" data-toggle="tooltip" data-original-title="Not Accepted">
                      <i class="icon fa fa-flag"></i>
                      <span class="hidden-sm hidden-xs">{{ __(' Not Accepted') }}</span>
                    </a>
                  </div>
                  @else
                  <div class="btn-group">
                    <a href="" class="tip btn btn-warning btn-flat" data-toggle="tooltip" data-original-title="Pending">
                      <i class="icon fa fa-hourglass-2"></i>
                      <span class="hidden-sm hidden-xs">{{ __('Pending') }}</span>
                    </a>
                  </div>
                  @endif

                  <div class="btn-group">
                    <a href="#" class="tip btn btn-primary btn-flat" title="" data-original-title="Label Printer">
                      <i class="fa fa-print"></i>
                      <span class="hidden-sm hidden-xs"> {{ __('Print') }}</span>
                    </a>
                  </div>
                  <div class="btn-group">
                    <a href="#" class="tip btn btn-primary btn-flat" title="" data-original-title="PDF">
                      <i class="fa fa-file-pdf-o"></i>
                      <span class="hidden-sm hidden-xs"> {{ __('PDF') }}</span>
                    </a>
                  </div>


                </div>
              </td>
            </tr>


          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
@endsection
        <th>{{ __('Total Absence') }}</th>
                <th>{{ __('Casual Leave') }}</th>
                <th>{{ __('Earned Leave') }}</th>
                <th>{{ __('Advance Leave') }}</th>
                <th>{{ __('Special Leave') }}</th>
                <th>{{ __('Total Leave') }}</th>
            </tr>
        </thead>
        <tbody>
            @php($sl = 1)
            @php($total_leave = 0)
            @foreach($users as $user)
            <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->employee_id }}</td>
                <td>{{ $user->designation }}</td>
                <td>
                    @foreach($attendances as $attendance)
                    @if($user->id == $attendance->user_id)
                    {{ $attendance->total_attendances }}
                    @endif
                    @endforeach
                </td>
                                <td>
                                    @foreach($absences as $absence)
                                    @if($user->id == $absence->user_id)
                                    {{ $absence->total_absences }}
                                    @endif
                                    @endforeach
                                </td>
                <td>
                    @foreach($casual_leaves as $casual_leave)
                    @if($user->id == $casual_leave->user_id)
                    {{ $casual_leave->total_casual_leaves }}
                    @php($total_leave += $casual_leave->total_casual_leaves)
                    @endif
                    @endforeach
                </td>
                <td>
                    @foreach($earned_leaves as $earned_leave)
                    @if($user->id == $earned_leave->user_id)
                    {{ $earned_leave->total_earned_leaves }}
                    @php($total_leave += $earned_leave->total_earned_leaves)
                    @endif
                    @endforeach
                </td> 
                <td>
                    @foreach($advance_leaves as $advance_leave)
                    @if($user->id == $advance_leave->user_id)
                    {{ $advance_leave->total_advance_leave }}
                    @php($total_leave += $advance_leave->total_advance_leave)
                    @endif
                    @endforeach
                </td>
                                <td>
                                    @foreach($special_leaves as $special_leave)
                                    @if($user->id == $special_leave->user_id)
                                    {{ $special_leave->total_special_leave }}
                                    @php($total_leave += $special_leave->total_special_leave)
                                    @endif
                                    @endforeach
                                </td>
                <td>
                    {{ $total_leave }}
                    @php($total_leave = 0)
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <p>{{ __('Prepared By') }}</p>
        <p>{{ __('Authorised Signature') }}</p>
    </div>
</div>
</body>
</html>