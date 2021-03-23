@extends('admin.index')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Module - edit</div>

                    <div class="card-body">
                        {!! Form::open(['route' => ['module.update', $module->id], 'method' => 'put']) !!}
                        <div class="form-group">
                             {!! Form::hidden('mainModule_id', $module->id, ['class' => 'form-control', 'placeholder' => 'Module']) !!}
                        </div>


                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            {!! Form::label('Name') !!}
                            {!! Form::text('name', $module->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">{!! $errors->first('name') !!}</span>@endif
                        </div>


                        {!! Form::submit('Update',['class' => 'btn btn-sm btn-warning']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


