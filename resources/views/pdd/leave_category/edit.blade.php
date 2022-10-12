@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
              
    <x-forms.patch action="{{ route('attendance.motifiedUpdate', $items[1]) }}" class="">
        <x-frontend.card>
            <x-slot name="header">
                @lang('Edit') @lang('Attendance')
            </x-slot>

            <x-slot name="body">
            <div id="printable_area">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               <th> {{ __(' SL') }}</th>
                               @extends('layouts.app')
@section('title', __('Departments'))

@section('content')
<div class="container">
<div class="content-wrapper">
@include('layouts.includes.nav')
    <section class="content-header">
        <h1>
           {{ __('LEAVE CATEGORY') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
            <li><a>{{ __('Setting') }}</a></li>
            <li><a href="{{ url('/setting/leave_categories') }}">{{ __('Leave Categories') }}</a></li>
            <li class="active">{{ __('Edit') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Edit leave category') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="{{ url('/setting/leave_categories/update/'. $leave_category['id']) }}" method="post" name="leave_category_edit_form">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="row">
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

                        <div class="col-md-6">
                            <label for="leave_category">{{ __('Category Name') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('leave_category') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="leave_category" id="leave_category" class="form-control" value="{{ $leave_category['leave_category'] }}">
                                @if ($errors->has('leave_category'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('leave_category') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <label for="publication_status">{{ __('Publication Status') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('publication_status') ? ' has-error' : '' }} has-feedback">
                                <select name="publication_status" id="publication_status" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                    <option value="1">{{ __('Published') }}</option>
                                    <option value="0">{{ __('Unpublished') }}</option>
                                </select>
                                @if ($errors->has('publication_status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('publication_status') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <label for="leave_category_description">{{ __('Category Description') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('leave_category_description') ? ' has-error' : '' }} has-feedback">
                                <textarea class="textarea text-description" name="leave_category_description" id="leave_category_description">{{ $leave_category['leave_category_description'] }}</textarea>
                                @if ($errors->has('leave_category'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('leave_category_description') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ url('/setting/leave_categories') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> {{ __('Cancel') }}</a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-edit"></i> {{ __('Update leave category') }}</button>
                </div>
            </form>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
</div>
<script type="text/javascript">
    document.forms['leave_category_edit_form'].elements['publication_status'].value = "{{ $leave_category['publication_status'] }}";
</script>
@endsection
                        <th> {{ __(' Employee Name') }}</th>
                                <th> {{ __(' Attendance Date') }}</th>
                                <th> {{ __(' In Time') }}</th>
                                <th> {{ __(' Out Time') }} </th> 
                                <th> {{ __(' Actions') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php $sl=1;?> -->
                            
                            @foreach($items as $key => $attd)
                            <tr>
                                <td>{{$key+1}}</td>
                                {{--<td>{{ __('EMP') }}{{$key+1}}</td>--}}
                                <td>{{ $attd->name }}</td>
                                <td>{{ date('d-m-Y',strtotime($attd['logdate'] ))}}</td>                        
                                <td>{{ $attd['timein'] }}</td>
                                <td>{{ $attd['timeout'] }}</td>
                       {{--<td>{{ date("D d F Y h:ia", strtotime($attd['created_at'])) }}</td>--}}
                       
                       <td>
 
                                      
                            <a href="{{ route('attendance.motifiedEdit', $attd->user_id) }}"><i class="fas fa-edit"></i> {{ __('Edit') }}</a>
                            
                        </td>                           
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </x-slot>
            <x-slot name="footer">
                <button type="submit" class="btn btn-primary">@lang('Save')</button>
                <a href="{{ route('fishcenter.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
            </x-slot>
        </x-frontend.card>
    </x-forms.patch>
    </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
