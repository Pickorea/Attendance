
@extends('layouts.app')
@section('title', __( 'Show Leave Application'))

@section('content')
<div class="container">
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          {{ __('Show Leave Application') }} 
          </h1>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show Leave Application </li>
            </ol>
        </nav>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> {{ __('Leave Application') }}</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <a href="{{ url('/hrm/leave_application') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>{{ __('Back') }} </a>

            <a target="_blank" href="{{ route('leave_application.pdf', $leave_application['employee_id']) }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i>{{ __('PDF') }} </a>
            <hr>
            
            <div id="printable_area" class="table-responsive">
              <div class="text-center">
                <h4><strong>{{ __('APPLICATION FOR LEAVE') }}</strong></h4>
              </div>
            <table  class="table table-bordered table-striped">
              <tbody id="myTable">

                <tr>
                  <td>{{ __('Name of Applicant') }}</td>
                  <td>{{ $leave_application['name'] }}</td>
                </tr>
               
                <tr>
                  <td>{{ __('Designation') }}</td>
                  <td>{{$leave_application['designation']}}</td>
                </tr>
                <tr>
                  <td>{{ __('Leave Category') }}</td>
                  <td>{{ $leave_application['leave_category'] }}</td>
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
                  {{ $leave_application['num_days'] }}
                  </td>
                </tr>
                <tr>
                  <td>{{ __('Reason for Leave') }}</td>
                  <td>{{ $leave_application['reason'] }}</td>
                </tr>
    
                <tr>
                  <td>{{ __('Apply date') }}</td>
                  <td>{{ date("D d F Y h:ia", strtotime($leave_application['created_at'])) }}</td>
                </tr>
              </tbody>
            </table>

            <div class="signatur">
              <strong class="signleft">{{ __('Signature of Applicant') }}</strong>
            </div>

            <div class="oficsign"> 
              <h4><strong>{{ __('For Office Use only') }}</strong></h4>
            </div>
          
            <table class="table table-bordered table-striped">

              <tbody>
              
                <tr>
                  <td colspan="3"><strong>{{ __('ACTION ON APPLICATION') }}</strong></td>
                  
                </tr>

                <tr>
                  <td>
                    <div>
                    <h4> {{ __('APPROVED FOR') }}</h4>
                    <p>...........{{ __('Days With Pay') }}</p>              
                    <p>...........{{ __('Days without pay') }}</p>              
                    <p>...........{{ __('others') }}</p>
                  </div>
                  </td>
                  
                  <td>
                    <div class="dueappr">
                  <h4> {{ __('DISAPPROVED DUE TO') }} </h4>
                </div>
                </td>

                <td>
                    <div class="remark">
                  <h4> {{ __('Remarks') }} </h4>
                </div>
                </td>


                </tr>
              </tbody>
            </table>
            <br>
            <hr>
            <div>
              <strong>{{ __('Secretary') }}</strong>
            </div>
          </div><!--pintable-->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      </section>
      <!-- /.content -->

      <div>
        <p>{{ __('Prepared By') }}</p>
        <p>{{ __('Authorised Signature') }}</p>
    </div>
</div>
</div>
</div>



@endsection
          

   