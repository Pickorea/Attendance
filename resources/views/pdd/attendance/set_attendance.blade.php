@extends('layouts.app')
@section('title', __('Timeclock'))

@section('content')

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"> -->
    </script>
    <!-- Template Main JS & CSSFile -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"> -->
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> -->
    <script>
    jQuery(document).ready(function($) {
    //jQuery Functionality
    $('#example').DataTable();
    $(document).on('click', '#example tbody tr button', function() {       
    $("#modaldata tbody tr").html("");
    $("#modaldata tbody tr").html($(this).closest("tr").html());
    $("#exampleModal").modal("show");
    });
    } );
    </script>

<div class="container">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ __('TIMECLOCK') }} 
           </h1>
           
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('COASTAL FISHERIES WEB BASED EMPLOYEE TIMECLOCK VERSION 1') }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
            <form action="{{ route('attendance.timeclock') }}" method="post" name="department_add_form">
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
                                @else
                                
                               
                </div>
                                @endif
                               
                            </div>
                            <!-- /.Notification Box -->

                            {{--<div class="col-md-6">
                                <label for="id">{{ __('ID') }} <span class="text-danger">*</span></label>
                                <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }} has-feedback">
                                    <input type="text" name="id" id="id" class="form-control" value="{{ old('id') }}" placeholder="{{ __('ENTER EMPLOYEE IDENTIFICATION..') }}">
                                    @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                
                                <!-- /.form-group -->
                            </div>--}}
                            
                        </div>
                        <!-- /.row -->
                    
                    <section>
            <body>
            <div class="container p-5">
                    <table id="example"  class="table mb-0">
                            <thead class="table-info">
                            <tr>
                            <th> {{ __(' SL') }}</th>
                            {{--<th> {{ __(' EMP CD') }}</th>--}}
                            <th> {{ __(' EMPLOYEE NAME') }}</th>
                            <th> {{ __('TIMEMING') }}</th>


                            <!-- <th> {{ __(' Created At') }} </th> -->



                            </tr>
                            </thead>
                                    <tbody>
                                    @foreach($attendances as $key => $attd)
                                    <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $attd['name'] }}</td>     
                                    <td>
                                    <form action="{{ route('attendance.timeclock') }}" method="post" name="department_add_form">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="id" value="{{ $attd['id'] }}">


                                    @if($attd['P']=='0')
                                    <button type="submit" class="button-88, btn btn-warning" role="button">{{ __('SignIn') }}</button>
                                    @elseif($attd['P']=='1')
                                    <button type="submit" class="button-88, btn btn-primary" role="button">{{ __('SignOut') }}</button>              
                                    @endif


                                    </form>
                                    </td>   


                                    </tr>

                                    @endforeach
                                    </tbody>

                    </table>

                            <!-- End datatable boostrap -->

                            </section>
                      <!-- /.content -->
                  </div>
                <!-- </div> -->
            </div>
        </div>
    </div>

</div>   

    
</body>
<script type="text/javascript">
        var route = "{{ url('autocomplete-search') }}";
        $('#search').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
</script>         

@endsection
     