@extends('admin.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Module - create</div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'module.store']) !!}
                        <div class="form-group @if($errors->has('module_name')) has-error @endif">
                            {!! Form::label('Module Name') !!}
                            {!! Form::text('module_name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                            @if ($errors->has('module_name'))
                                <span class="help-block">{!! $errors->first('module_name') !!}</span>@endif
                        </div>

                        {!! Form::submit('Create',['class' => 'btn btn-sm btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
