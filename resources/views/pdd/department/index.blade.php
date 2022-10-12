@extends('layouts.app')
@section('title', __('Designations'))

@section('content')
<div class="container">

<div class="content-wrapper">
@include('layouts.includes.nav')
    <section class="content-header">
        <h1>
           {{ __('DEPARTMENT') }} 
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Department List</li>
            </ol>
        </nav>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Manage departments') }}</h3>

            </div>
            <div class="box-body">
                
            <div class="box-header with-border">
                        <div class="alert alert-info clearfix">
                            <a href="{{ route('department.create') }}" class="alert-link"><button type="button" class="btn btn-primary btn-sm float-end">{{ __(' Add Department') }}</button></a> 
                        </div>
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
                          
                                <th>{{ __('Department Descript') }}</th>
                                <th class="text-center">{{ __('Added') }}</th>
                                <th class="text-center">{{ __('Status') }}</th>
                                <th class="text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                 
                            @php ($sl = 1)
                         
                            @foreach($departments as $department)
                            <tr>
                           
                                <td>{{ $sl++ }}</td>
                                <td><a href="{{ url('/setting/departments/details/' . $department['id']) }}">{{ $department['department'] }}</a></td>
                                <td>{{$department['department_description'] }}</td>
                                <td class="text-center">{{ date("d F Y", strtotime($department['created_at'])) }}</td>
                                <td class="text-center">
                                    @if ($department['publication_status'] == 1)
                                   <span class="label label-success">{{ __('Published') }}</span>
                                @else
                                <span class="label label-warning">{{ __('Unpublished') }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('department.edit',$department['id']) }}"><i class="icon fa fa-edit"></i> {{ __('Edit') }}</a>
                                    <a href="{{ route('department.show',$department['id']) }}"><i class="icon fa fa-edit"></i> {{ __('Show') }}</a>
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