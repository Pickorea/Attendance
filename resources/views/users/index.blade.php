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
                    <a class="btn btn-primary" href="{{ route('users.create') }}">
                    Add New User
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                <table class="table table-bordered">

                    <tr>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Roles</th>

                    <th width="280px">Action</th>

                    </tr>

                    @foreach ($users as $key => $user)

                    <tr>

                    

                        <td><a href = "">{{ $user->name }}</a></td>

                    <td>{{ $user->email }}</td>

                    <td>

                        @if(!empty($user->getRoleNames()))

                        @foreach($user->getRoleNames() as $v)

                            <label class="badge badge-success">{{ $v }}</label>

                        @endforeach

                        @endif

                    </td>

                    <td>

                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}

                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                        {!! Form::close() !!}

                    </td>

                    </tr>

                    @endforeach

                    </table>

                  {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection