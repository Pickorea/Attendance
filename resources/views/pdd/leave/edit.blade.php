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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/leave') }}">Back</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Leave</li>
                    
                </ol>
             </nav>
        </nav>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Edit department') }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('department.update', $department['id']) }}" method="post" name="department_edit_form">
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
                                <label for="department">{{ __('Department') }} <span class="text-danger">*</span></label>
                                <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }} has-feedback">
                                    <input type="text" name="department" id="department" class="form-control" value="{{ $department['department'] }}" placeholder="{{ __('Enter client name..') }}">
                                    @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
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
                                <label for="department_description">{{ __('Department Description') }} <span class="text-danger">*</span></label>
                                <div class="form-group{{ $errors->has('department_description') ? ' has-error' : '' }} has-feedback">
                                    <textarea class="textarea text-description" name="department_description" id="department_description" placeholder="{{ __('Enter client description..') }}">{{ $department['department_description'] }}</textarea>
                                    @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department_description') }}</strong>
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
                        <a href="{{ url('/setting/departments') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> {{ __('Cancel') }}</a>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-edit"></i> {{ __('Update department') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->


        </section>
        <!-- /.content -->
    </div>
</div>
<script type="text/javascript">
  
</script>
@endsection
