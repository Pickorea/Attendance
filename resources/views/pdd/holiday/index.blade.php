@extends('layouts.app')
@section('title', __('Employee'))

@section('content')
<div class="container">
<div class="content-wrapper">
@include('layouts.includes.nav')
    <section class="content-header">
        <h1>
            {{ __('HOLIDAY') }}
        </h1>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Holiday List</li>
            </ol>
        </nav>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Manage Holiday') }}</h3>

                <div class="box-header with-border">
                        <div class="alert alert-info clearfix">
                            <a href="{{ route('holiday.create') }}" class="alert-link"><button type="button" class="btn btn-primary btn-sm float-end">{{ __(' Add Holiday') }}</button></a> 
                        </div>
                 </div>
            </div>
            <div class="box-body">
                
            
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
        <div id="printable_area" class="col-md-12 table-responsive">
        <table class="table table-hover mx-0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Descrition</th>
                                <th>Created at</th>
                                <th>
                                 
                                       Created By
                                 
                                </th>
                                <th>
                                 
                                       Published Status
                                 
                                </th>
                                <th>
                                 
                                       Actions
                                 
                                </th>
                            
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $items as $holiday )
                                <tr>
                      
                                    <td>{{ $holiday['holiday_name'] }}</td>
                                    
                                    <td>{{ $holiday['description'] }}</td>
                                    <td>{{ $holiday['holiday_date'] }}</td>
                                  
                                    <td>{{ $holiday['name'] }}</td>
                                    <td class="text-center">
                                    @if( $holiday['publication_status'] == 1 )
                                        <span class="label label-success">{{ __('Published') }}</span>
                                    @else
                                    <span class="label label-warning">{{ __('Unpublished') }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                    <a href="{{ url('/setting/holidays/edit/' . $holiday['id'] ) }}"><i class="icon fa fa-edit"></i> {{ __('Edit') }}</a>
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