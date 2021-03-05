@extends('admin.index')

@section('content')
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User - edit</div>

                    <div class="card-body">
                        {!! Form::open(['route' => ['user.update', $user->id], 'method' => 'put']) !!}

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            {!! Form::label('Name') !!}
                            {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">{!! $errors->first('name') !!}</span>@endif
                        </div>

                        <div class="form-group @if($errors->has('email')) has-error @endif">
                            {!! Form::label('Email') !!}
                            {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'email']) !!}
                            @if ($errors->has('email'))
                                <span class="help-block">{!! $errors->first('email') !!}</span>@endif
                        </div>
                        <input type="text" name="userid" value="{{$user->id}}" hidden>

                        <div class="form-group">
                            {!! Form::label('Role') !!}
                            <select name="role" id="role" class="form-control">
                            	@if($user->role == "Admin"){
                            	<option value="{{$user->role}}" selected>{{$user->role}}</option>
                       	        <option value="Editor">Editor</option>
                       	        <option value="Writer">Writer</option>

                          		 }@elseif($user->role == "Editor"){

                          		 <option value="{{$user->role}}" selected>{{$user->role}}</option>
                       	         <option value="Admin">Admin</option>
                       	         <option value="Writer">Writer</option>

                       			 }@elseif($user->role == "Writer"){

                          		 <option value="{{$user->role}}" selected>{{$user->role}}</option>
                       	         <option value="Admin">Admin</option>
                       	         <option value="Editor">Editor</option>

                       			 }
                       			 @endif
                                
                            </select>
                        </div>

                   

                        {!! Form::submit('Update',['class' => 'btn btn-sm btn-warning']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection