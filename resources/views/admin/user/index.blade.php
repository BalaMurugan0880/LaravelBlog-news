@extends('admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ Session('message') }}
                    </div>
                @endif

                    @if(Session::has('delete-message'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ Session('delete-message') }}
                        </div>
                    @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Users - list
                        <a href="{{ route('register') }}" class="btn btn-sm btn-primary float-right">Add
                            New</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                <tr>
                                    <th scope="col" width="60">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" width="200">Email</th>
                                    <th scope="col" width="200">Role</th>
                                    <th scope="col" width="129">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>

                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}"
                                               class="btn btn-sm btn-primary">Edit</a>
                                            {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
