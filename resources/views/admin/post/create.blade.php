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
                    <div class="card-header">Post - create</div>
                    @if ($errors->any())
                      <div class="alert alert-danger">
                      <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                      @endif
                    <div class="card-body">
                      
                        {!! Form::open(['route' => 'posts.store' , 'method' => 'post', 'files' => true ]) !!}

                        <div class="form-group">
                            {!! Form::label('Module') !!}
                            <select name="mainModule_id" id="module" class="form-control ">
                                <option selected>Select A Module</option>
                                 @foreach($mainModule as $module) 
                                <option value="{{$module->id}}">{{$module->module_name}}</option>
                                @endforeach
                            </select>
                        </div>

                       <div class="form-group">
                           {!! Form::label('Category') !!}
                           {{--   {!! Form::select('category_id[]', $categories, null, ['class' => 'form-control', 'id' => 'category_id', 'multiple' => 'multiple']) !!} --}}

                             <select class="selectpicker form-control" style="color: #000 !important;" id="category_id" name="category_id[]" multiple>
                                  <option value=""></option>
                            </select>
                        </div>       
                        <div class="form-group">
                            {!! Form::label('Featured Image') !!}
                            <div class="input-group">
                                <input type="text" id="image_label" class="form-control" name="thumbnail"
                                       aria-label="Image" aria-describedby="button-image" placeholder="Select Or Upload A Image">
                                <div class="input-group-append">
                                    <button class="btn btnclr" type="button" id="button-image">Select</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Sub Title') !!}
                            {!! Form::text('sub_title', null, ['class' => 'form-control', 'placeholder' => 'Sub Title']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Details') !!}
                            {!! Form::textarea('details', null, ['class' => 'form-control', 'placeholder' => 'Details']) !!}
                        </div>
                         @if(Auth::user()->role == 'Writer')
                            <div class="form-group">
                            {!! Form::label('Publish') !!}
                            {!! Form::select('is_published', [ 0 => 'Draft'], null, ['class' => 'form-control']) !!}
                        </div>
                         @else
                             <div class="form-group">
                            {!! Form::label('Publish') !!}
                            {!! Form::select('is_published', [1 => 'Publish', 0 => 'Draft'], null, ['class' => 'form-control']) !!}
                        </div>
                         @endif

                        

                        {!! Form::submit('Create',['class' => 'btn btn-sm btn-primary']) !!}
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

    <script>
        $(document).ready(function () {
            CKEDITOR.replace('details');

            $('#category_id').select2({
                placeholder: "Select categories"
            });
        });
        CKEDITOR.replace( 'details', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
             filebrowserImageBrowseUrl: '/file-manager/ckeditor',
        });
    </script>

    <script type="text/javascript">
       
        $("#module").change(function(){
            $.ajax({
                url: "{{ route('admin.category.get_by_module') }}?mainModule_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#category_id').html(data.html);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>

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
