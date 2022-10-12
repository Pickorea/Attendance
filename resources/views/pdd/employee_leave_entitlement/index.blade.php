@extends('layouts.app')
@section('title', __('Manage Employee Leave Entitlement Lists'))
@section('content')
<div class="container">
    <div class="content-wrapper">
    @include('layouts.includes.nav')
        <section class="content-header">
            <h1>
            {{ __('Manage Employee Leave Entitlement') }} 
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Back</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Leave Entitlement List</li>
                    
                </ol>
            </nav>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Manage Employee LeaveG Entitlement') }}</h3>

                    <div class="box-header with-border">
                        <div class="alert alert-info clearfix">
                            <a href="{{ route('leave_entitlement.create') }}" class="alert-link"><button type="button" class="btn btn-primary btn-sm float-end">{{ __(' Add Employee Leave Entitlement') }}</button></a> 
                        </div>
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
                    <div  class="col-md-12 table-responsive">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('SL#') }}</th>
                                    <th>{{ __('Employee Name') }}</th>
                                    <th>{{ __('Leave Entitlement') }}</th>
                                    <th>{{ __('Salary Level') }}</th>
                                    <th class="text-center">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                            @php ( $sl = 1 )
                            @foreach( $emloyeeLeaveEntitlements as $entitlement )
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $entitlement->name }}</td>
                                    <td> 
                                        @foreach($entitlement->salarylevels as $item)
                                        {{ $item->pivot->leave_entitlement }} days
                                         @endforeach
                                    </td> 
                                    @if(!isset($item)){
                                        <td></td>
                                    }@else  
                                    <td>{{ $item->salary_level }}</td>
                                  
                                   }
                                   @endif
                                    <td class="text-center">
                                    <a href="{{ route('salary_level.edit', $entitlement['id'] ) }}"><i class="icon fa fa-edit"></i> {{ __('Edit') }}</a>
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
