@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-4">
                    <a class="btn btn-primary" href="{{ route('users.index') }}">
                    Back
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Users</div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="form-group">

                                <strong>Name:</strong>

                                {{ $user->name }}

                            </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="form-group">

                                <strong>Email:</strong>

                                {{ $user->email }}

                            </div>

                            </div>
                <div class="card-body">
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection