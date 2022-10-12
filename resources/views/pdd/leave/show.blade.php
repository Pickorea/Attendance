@extends('layouts.app')
@section('title', __('Department'))

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
                <li class="breadcrumb-item"><a href="{{ route('leave.index') }}">Back</a></li>
            </ol>
        </nav>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Details of department') }}</h3>

                </div>
                <div class="box-body">
  
                    <hr>
                    <table  class="table table-bordered table-striped">
                        <tbody id="myTable">
                            <tr>
                                <td>{{ __('Department') }}</td>
                                <td>{{ $department->department }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Department Description') }}</td>
                                <td>{{ $department->department_description }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Create By') }}</td>
                                <td>{{ $department->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Date Added') }}</td>
                                <td>{{ date("D d F Y h:ia", strtotime($department->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Last Updated') }}</td>
                                <td>{{ date("D d F Y h:ia", strtotime($department->updated_at)) }}</td>
                            </tr>
                            <tr>
                            
                                        @if ($department->publication_status == 1)
                                            <div class="btn-group">
                                                <a href=" " class="tip btn btn-success btn-flat" data-toggle="tooltip" data-original-title="Unpublished">
                                                    <i class="fa fa-arrow-down"></i>
                                                    <span class="hidden-sm hidden-xs"> {{ __('Published') }}</span>
                                                </a>
                                            </div>
                                        @else
                                            <div class="btn-group">
                                                <a href="" class="tip btn btn-warning btn-flat" data-toggle="tooltip" data-original-title="Published">
                                                    <i class="fa fa-arrow-up"></i>
                                                    <span class="hidden-sm hidden-xs"> {{ __('Unpublished') }}</span>
                                                </a>
                                            </div>
                                        @endif
                                    
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
</div>
@endsection