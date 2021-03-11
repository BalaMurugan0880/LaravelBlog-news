@extends('admin.index')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Category - edit</div>

                    <div class="card-body">
                        {!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'put']) !!}
                        <div class="form-group">
                             {!! Form::hidden('mainModule_id', $category->mainModule_id, ['class' => 'form-control', 'placeholder' => 'Module']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Featured Image') !!}
                            <div class="input-group">
                                <input type="text" id="image_label" class="form-control" name="thumbnail"
                                       aria-label="Image" aria-describedby="button-image" placeholder="Select Or Upload A Image" value="{{$category->thumbnail}}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            {!! Form::label('Name') !!}
                            {!! Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">{!! $errors->first('name') !!}</span>@endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('Publish') !!}
                            {!! Form::select('is_published', [1 => 'Publish', 0 => 'Draft'], isset($category->is_published) ? $category->is_published : null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Update',['class' => 'btn btn-sm btn-warning']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>



<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {

  document.getElementById('button-image').addEventListener('click', (event) => {
    event.preventDefault();

    window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
  });
});

// set file link
function fmSetLink($url) {
  document.getElementById('image_label').value = $url;
}
</script>
@endsection

