@extends('layouts.app')
@section('title', __('Attendance'))

@section('content')
<div class="container">
    <div class="content-wrapper">
    @include('layouts.includes.nav')
        <section class="content-header">
            <h1>
            {{ __('EDIT ATTENDANCE') }} 
            </h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('attendance.index') }}">Back</a></li>
                
            </ol>
        </nav>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Edit attendance') }}</h3>

                    <div class="box-header with-border">
                        <div class="alert alert-info clearfix">
                        <a href="{{ route('attendance.DailyAttendaceExcelExport',$logdate[0]) }}" class="alert-link"><button type="button" class="btn btn-primary btn-sm float-end">{{ __(' To Excel') }}</button></a> 
                        <a target="_blank" href="{{ route('attendance.dailyAttendanceReportPdf', $logdate[0]) }}" class="alert-link"><button type="button" class="btn btn-primary btn-sm float-start">{{ __(' To PDF') }}</button></a>     
                    </div>
                     </div>
                </div>
                <!-- /.box-header -->
{{$items[0]['id']}} {{$logdate[0]}}
                <form action="{{ route('attendance.update', [$logdate[0], $items[0]['id'] ]) }}" method="post" name="department_edit_form">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="user_id" value="{{$items[0]['id']}}">   
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                             
                               <th> {{ __(' Employee Name') }}</th>
                                <th> {{ __(' Attendance Date') }}</th>
                                <th> {{ __(' In Time') }}</th>
                                <th> {{ __(' Out Time') }} </th> 
                                
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php $sl=1;?> -->
                   
                            @foreach($items as $key => $attd)
                            <tr>
                                
                            <td>   
                               
                                <div class="form-group">
                                    <input type="text" name="name[]" value="{{$attd->name}}" {{ $attd->name ? 'readonly' : '' }} class="form-control">
                                 
                                </div>
                            </td>
                            <td>
                           
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="date" name="logdate[]" value="{{$attd->logdate}}" {{ $attd->logdate ? 'readonly' : '' }} class="form-control">
                                    </div>
                                </div>
                            </td>
                            <td>
                           
                                <div class="form-group">
                                    <div class="form-group">
                                    <input type="time" name="timein[]" value="{{$attd->timein}}" class="form-control">
                                    </div>
                                </div>
                            </td>

                            <td>
                           
                                <div class="form-group">
                                    <div class="form-group">
                                    <input type="time" name="timeout[]" value="{{$attd->timeout}}" class="form-control">
                                    </div>
                                </div>
                            </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="box-footer">
                        <a href="{{ url('/setting/departments') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> {{ __('Cancel') }}</a>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-edit"></i> {{ __('Update attendance') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->


        </section>
        <!-- /.content -->
    </div>
</div>
<script type="text/javascript">
    document.forms['department_edit_form'].elements['department_edit_form'].value = "{{ old('publication_status') }}";
    document.forms['department_edit_form'].elements['department_edit_form'].value = "{{ old('department_id') }}";
</script>
@endsection
