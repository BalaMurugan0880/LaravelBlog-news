@extends('admin.index')
@section('stylesheet')
<style type="text/css">
	 .userpic  {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 100%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}
</style>
@endsection
@section('content')
<div class="container">
	<div class="row justify-content-center">
		  <div class="col-md-8">
				<div class="card">
					<div class="card-header">Profile</div>
						<div class="card-body">
				                @if(Session::has('message'))
				                    <div class="alert alert-success alert-dismissible">
				                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
				                        {{ Session('message') }}
				                    </div>
				                @endif							

							<form method="post" action="/admin/user/profile" id="profile">
								@csrf
								<div class="form-group row justify-content-center">
									<div class="col-md-6" style="text-align: center;">
										<img src="{{$users->profilepic}}" class="userpic">
									</div>
								</div>

								<div class="form-group row">
		                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

		                            <div class="col-md-6">
		                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$users->name}}" required autocomplete="name" autofocus>
		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

		                            <div class="col-md-6">
		                                <input id="email" type="text" class="form-control" name="email" value="{{$users->email}}" required>
		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

		                            <div class="col-md-6">
		                                <input id="role" type="text" class="form-control" name="role" value="{{$users->role}}" readonly>

		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Biographical Info') }}</label>

		                            <div class="col-md-6">
		                                <textarea name="bio" class="form-control" form="profile" rows="3">{{$users->biographical}}</textarea>
		                            </div>
		                        </div>

		                         <div class="form-group row justify-content-center">
		                            {!! Form::label(' &nbsp;&nbsp;&nbsp; Profile Picture') !!}

		                            <div class="col-md-6">
			                            <div class="input-group">
			                                <input type="text" id="image_label" class="form-control" name="thumbnail" aria-label="Image" aria-describedby="button-image" placeholder="Select Or Upload A Image" value="{{$users->profilepic}}">
			                                <div class="input-group-append">
			                                    <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
			                                </div>
			                            </div>
			                        </div>
			                     </div>

		                        <div class="form-group row">
		                            <label for="instagram" class="col-md-4 col-form-label text-md-right">{{ __('Instagram Profile URL') }}</label>

		                            <div class="col-md-6">
		                                <input id="instagram" type="text" class="form-control" name="instagram" placeholder="IG URL" value="{{$users->instagram}}" required>
		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label for="instagram" class="col-md-4 col-form-label text-md-right">{{ __('Facebook Profile URL') }}</label>

		                            <div class="col-md-6">
		                                <input id="facebook" type="text" class="form-control" name="facebook" placeholder="FB URL" value="{{$users->facebook}}" required>
		                            </div>
		                        </div>








		                          <div class="form-group row mb-0">
			                            <div class="col-md-6 offset-md-4">
			                                <button type="submit" class="btn btn-primary">
			                                    {{ __('Update') }}
			                                </button>
			                            </div>
			                        </div>

								
							</form>
						</div>
				</div>
			</div>
		</div>
</div>
@endsection

@section('javascript')
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