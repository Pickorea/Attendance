@extends('layouts.app')
@section('title', __('Employee'))

@section('content')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script>

                $(document).ready(function(){

                $('#txtSearch').on('keyup', function(){

                    var text = $('#txtSearch').val();

                    $.ajax({

                        type:"GET",
                        url: 'search',
                        data: {text: $('#txtSearch').val()},
                        success: function(response) {
                            response = JSON.parse(response);
                            for (var patient of response) {
                                console.log(patient);
                            }
                        }

                    });


                });

                });
            </script>

<div class="container">
<div class="content-wrapper">
@include('layouts.includes.nav')
    <section class="content-header">
        <h1>
            {{ __('Daily Attendance Record') }}
        </h1>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Attendance List</li>
            </ol>
        </nav>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Manage Attendance') }}</h3>

                <div class="box-header with-border">
                        <div class="alert alert-info clearfix">
                            <a href="{{ route('attendance.create') }}" class="alert-link"><button type="button" class="btn btn-primary btn-sm float-end">{{ __(' Add Attendance') }}</button></a> 
                        </div>
                     </div>
            </div>
            <div class="box-body">
                
            
            </div>
                
                <div  class="col-md-6">
                    <form method="get" action="{{route('attendance.searchLogdate')}}">

                        <div class="input-group stylish-input-group">
                            <input type="text" id="txtSearch" name="txtSearch" class="form-control"  placeholder="Search..." >
                        </div>

                    </form> 
                    <div id="result">Sorry The Search is Underconstructed</div>
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
               
                    <div id="printable_area">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                    <th> {{ __(' SL') }}</th>
                                                    
                                                        <th> {{ __(' Attendance Date') }}</th>
                                                        <th> {{ __(' Action') }}</th>
                                                    
                                                    
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- <?php $sl=1;?> -->
                                                   
                                                    @foreach($modifies as $key => $attd)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                                                                   
                                                        <td>{{ date('d-m-Y',strtotime($attd->logdate))}}</td>                        
                                                    
                                                        <td>
                                                                
                                                            
                                                             <a href="{{ route('attendance.edit', [$attd->logdate])}}"><i class="fas fa-edit"></i> {{ __('Details') }}</a>
                                                            
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