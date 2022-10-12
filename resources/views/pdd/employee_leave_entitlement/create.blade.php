@extends('layouts.app')
@section('title', __('Employee Leave Entitlement Lists'))

@section('content')
<div class="container">
      <div class="content-wrapper">
      @include('layouts.includes.nav')
        <section class="content-header">
          <h1>
            {{ __('Employee Leave Entitlement Lists') }}
          </h1>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/leave_entitlement') }}">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Leave Important</li>
                
            </ol>
          </nav>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Add Employee Leave Entitlement') }}</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form action="{{route('leave_entitlement.store')}}" method="post" name="salary_level_add_form">
                              {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                      Employee Leave Entitlement
                    </div>

                    <div class="card-body">
                        <table class="table" id="products_table">
                        
                            <tbody>
                                <tr id="product0">
                                    <td>
                                        <select name="employee_id[]" class="form-control">
                                            <option value="">-- Employee --</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">
                                                    {{ $employee->name }}  {{ $employee->farther_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    <select name="salaryLevel_id[]" class="form-control">
                                            <option value="">-- Salary Level --</option>
                                            @foreach ($salaryLevels as $salaryLevel)
                                                <option value="{{ $salaryLevel->id }}">
                                                    {{ $salaryLevel->salary_level }}  
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                     <input type="number" name="leave_entitlement[]" class="form-control" value="1" />
                                     </td>
                                </tr>
                                <tr id="product1"></tr>
                            </tbody>
                        </table>

                        <!-- <div class="row">
                            <div class="col-md-12">
                                <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="Submit">
                </div>
            </form>
          </div>
          <!-- /.box -->


        </section>
        <!-- /.content -->
      </div>
</div>
<script type="text/javascript">
  document.forms['salary_level_add_form'].elements['publication_status'].value = "{{ old('publication_status') }}";
</script>
@endsection
