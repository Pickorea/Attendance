@extends('layouts.app')
@section('title', __('Salary Level Lists'))
@section('content')
<div class="container">
    <div class="content-wrapper">
    @include('layouts.includes.nav')
        <section class="content-header">
            <h1>
            {{ __('Manage Salary Level Lists') }} 
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
                <li><a>{{ __('Setting') }}</a></li>
                <li class="active">{{ __('Manage Salary Level Lists') }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Manage Salary Level Lists') }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    
                    <div  class="col-md-6">
                        <a href="{{ route('salary_level.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i>{{ __(' Add Salary Level Lists') }}</a>
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
                    <div  class="col-md-12 table-responsive">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('SL#') }}</th>
                                    <th>{{ __('Salary Level') }}</th>
                                    <th class="text-center">{{ __('Status') }}</th>
                                    <th class="text-center">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                            @php ( $sl = 1 )
                            @foreach( $salarys as $salary_level )
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $salary_level['salary_level'] }}</td>
                                  
                                    <td class="text-center">
                                    @if( $salary_level['publication_status'] == 1 )
                                        <span class="label label-success">{{ __('Published') }}</span>
                                    @else
                                    <span class="label label-warning">{{ __('Unpublished') }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                    <a href="{{ route('salary_level.edit', $salary_level['id'] ) }}"><i class="icon fa fa-edit"></i> {{ __('Edit') }}</a>
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
