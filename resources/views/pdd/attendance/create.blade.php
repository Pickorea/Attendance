@extends('layouts.app')
@section('title', __('Designations'))

@section('content')

<div class="container">
    <div class="content-wrapper">
    @include('layouts.includes.nav')
        <section class="content-header">
            <h1>
                {{ __('TIMECLOCK') }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
                <li><a>{{ __('Setting') }}</a></li>
                <li><a href="{{ url('/setting/departments') }}">{{ __('Timeclock') }}</a></li>
                <li class="active">{{ __('Add  time clock') }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Employee Time Clock') }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
             


           <form action="{{route('attendance.store')}}" method="post">
            {{ csrf_field() }}
            <div class="modal-body">
               
            <label>{{ __('Attendance Date') }} <span class="text-danger">*</span></label>
                <div class="form-group">
                    <input type="date" name="dateIn" class="form-control" value="{{old('dateIn')}}">
                </div>
        
               <label for="id">{{ __('Employee') }} <span class="text-danger">*</span></label>
                <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }} has-feedback">
                <select name="employee_id[]" class="form-control">
                                            <option value="">-- Employee --</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">
                                                    {{ $employee->name }}  {{ $employee->farther_name }}
                                                </option>
                                            @endforeach
                </select>
                </div>
                
                       
                                <!-- /.form-group -->
                       
                <label>{{ __('In Time') }} <span class="text-danger">*</span></label>
                <div class="form-group">
                    <input type="time" name="in_time" class="form-control" value="">
                </div>
                <label>{{ __('Out Time') }}<span class="text-danger">*</span></label>
                <div class="form-group">
                    <input type="time" name="out_time" class="form-control" value="">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
            </div>
        </form>
 
            </div>
            <!-- /.box -->


        </section>
        <!-- /.content -->
    </div>
</div>

@endsection
