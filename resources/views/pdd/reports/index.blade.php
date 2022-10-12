@extends('layouts.app')

@section('title', __('File Index'))

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-new-task">
                <!-- <div class="card-header"></div> -->
                <div class="card-body">
                  <div class="content-wrapper">
                      <!-- Content Header (Page header) -->
                      <section class="content-header">
                          <h1>
                            {{ __('INWARD FILE STATUS') }} 
                          </h1>
                          <ol class="breadcrumb">
                              <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
                              <li><a>{{ __('Setting') }}</a></li>
                              <li><a href="{{ url('/setting/designations') }}">{{ __('Designations') }}</a></li>
                              <li class="active">{{ __('Add Sub') }}</li>
                          </ol>
                      </section>

                      <!-- Main content -->
                      <section class="content">

                          <!-- SELECT2 EXAMPLE -->
                          <div class="box box-default">
                              <div class="box-header with-border">
                                  <!-- <h3 class="box-title">{{ __('Add subject') }}</h3> -->

                                  <div class="box-tools pull-right">
                                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                  </div>
                              </div>
  

    

        <div class="w-full mt-8 bg-white rounded">
            <form action="{{ route('report.index') }}" method="GET" class="md:flex md:items-center md:justify-between px-6 py-6 pb-0">
                <div class="md:flex md:items-center mb-6 text-gray-700 uppercase font-bold">
                    <div>
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Report Type
                        </label>
                    </div>
                    <div class="flex flex-row items-center bg-gray-200 px-4 py-3 rounded">
                        <label class="block text-gray-600 font-bold">
                            <input name="inward" class="mr-2 leading-tight" type="radio" value="class" checked>
                            <span class="text-sm">Inward</span>
                        </label>
                        {{--<label class="ml-4 block text-gray-600 font-bold">
                            <input name="type" class="mr-2 leading-tight" type="radio" value="teacher" disabled>
                            <span class="text-sm">Outward</span>
                        </label>--}}
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6 text-gray-700 uppercase font-bold">
                    <div>
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Month
                        </label>
                    </div>
                    <div class="block text-gray-600 font-bold">
                        <div class="relative">
                            <select name="month" class="block font-bold appearance-none w-full bg-gray-200 border border-gray-200 text-gray-600 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">--Select Month--</option>
                                @foreach ($months as $month => $values)
                                    <option value="{{ $month }}">{{ $month }} </option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6 text-gray-700 uppercase font-bold">
                    <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">Generate</button>
                </div>
            </form>

            <div class="w-full px-6 py-6">
                @foreach ($files as $fileid => $datevalues)
                    
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="flush-headingOne">
                        <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <h4>{{ $fileid}}</h4> 
                        </div>
                        </h5>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                        <div class="flex flex-col bg-gray-200 mb-6">
                        @foreach ($datevalues as $key => $filedates)
                            <div class="text-left text-gray-600 py-2 px-4 font-semibold">
                                <span ></span>
                         <table  class="table mb-0">
                             
                             <tr>
                                <td>
                                <div class="flex flex-col justify-between bg-gray-100">
                                   {{$filedates->details}}
                                </div>
                            </td>
                             </tr>
<hr>
                             <tr>
                                <td>
                                <div class="flex flex-col justify-between bg-gray-100">
                                   {{$filedates->to_details_person_name}}
                                </div>
                                </td>
                             </tr>

                             
                  
                                 <tr>
                                <td>
                                <div class="flex flex-col justify-between bg-gray-100">
                                   {{$filedates->name}}
                                </div>
                                </td>
                             </tr>

                       
                             <tr>
                                <td>
                                <div class="flex flex-col justify-between bg-gray-100">
                                   {{$filedates->letter_ref_no}}
                                </div>
                                </td>
                             </tr>



                         </table>
                                
                             
                               
                              


                               
                                
                        
                            </div>
                        @endforeach
                    </div>
                </div>
                        </div>
                    </div>
                    
                @endforeach
            </div>   
        </div>

    </section>
                      <!-- /.content -->
                  </div>
                <!-- </div> -->
            </div>
        </div>
    </div>

</div>                 
@endsection