@extends('admin.index')
@section('stylesheet')

<style type="text/css">
	.baseBlock {
	margin: 0px 0px 35px 0px;
	padding: 0 0 0px 0px;
	border-radius: 5px;
	overflow: hidden;
	background: #fff;
	-moz-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
	-o-transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
	transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
	border-width: 3px;
	border-color: #333;
}

.baseBlock:hover {
	-webkit-transform: translate(0, -8px);
	-moz-transform: translate(0, -8px);
	-ms-transform: translate(0, -8px);
	-o-transform: translate(0, -8px);
	transform: translate(0, -8px);
	box-shadow: 0 40px 40px rgba(0, 0, 0, 0.2);
}

</style>
@endsection

@section('content')

<div class="container">
	<div class="row" style="text-align: center;">
		<div class="col-sm">
			<div class="card baseBlock">
				<div class="card-body">
					<img src="http://127.0.0.1:8000/storage/galleries/232-2326786_how-to-submit-your-post-blog-post-icon.png" class="card-img-top">
					<h3 class="card-title">Post</h3>
					<p class="card-text">Total Post <strong>{{ $posts->count() }}</strong></p>
    				<a href="{{ route('posts.index') }}" class="btn btn-primary">Further Details</a>
				</div>
			</div>
			
		</div>
		<div class="col-sm">
			<div class="card baseBlock">
				<div class="card-body">
					<img src="https://icon-library.com/images/icon-categories/icon-categories-8.jpg" class="card-img-top" height="170">
					<h3 class="card-title">Categories</h3>
					<p class="card-text">Total Categories <strong>{{ $category->count() }}</strong> </p>
    				<a href="{{ route('categories.index') }}" class="btn btn-primary">Further Details</a>
				</div>
			</div>
		</div>
		<div class="col-sm">
			<div class="card baseBlock">
				<div class="card-body">
					<img src="https://www.clipartkey.com/mpngs/m/141-1413559_modules-icon.png" class="card-img-top" height="170">
					<h3 class="card-title">Main Module</h3>
					<p class="card-text">Total Module <strong>{{ $module->count() }}</strong></p>
    				<a href="{{ route('module.index') }}" class="btn btn-primary">Further Details</a>
				</div>
			</div>
		</div>


		<div class="col-sm">
			<div class="card baseBlock">
				<div class="card-body">
					<img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" class="card-img-top" height="170">
					<h3 class="card-title">User</h3>
					<p class="card-text">Total User <strong>{{ $users->count() }}</strong></p>
    				<a href="{{route('user.index')}}" class="btn btn-primary">Further Details</a>
				</div>
			</div>
		</div>

	</div>

	<div class="row">

		<canvas id="myChart" width="400" height="200"></canvas>
		
	</div>
</div>




@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js" crossorigin="anonymous"></script>
{{-- <script type="text/javascript">
	var ctx = document.getElementById("myChart");



	var title1 = {!! json_encode($mostpopular[0]->title) !!};
	var title2 = {!! json_encode($mostpopular[1]->title) !!};
	var title3 = {!! json_encode($mostpopular[2]->title) !!};
	var title4 = {!! json_encode($mostpopular[3]->title) !!};


	var countpost = {!! json_encode($mostpopular[0]->views) !!};
	var countpost1 = {!! json_encode($mostpopular[1]->views) !!};
	var countpost2 = {!! json_encode($mostpopular[2]->views) !!};
	var countpost3 = {!! json_encode($mostpopular[3]->views) !!};

	
	





var mylineChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [ title1, title2, title3, title4, ],
        datasets: [{
            label: 'Most View Post',
            data: [countpost, countpost1, countpost2, countpost3, ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',


            ],
            borderColor: [
                'rgba(255,99,132,1)'
            ],
            borderWidth: 0
        }]
    },
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    autoSkip: false,
                    maxRotation: 40,
                    minRotation: 40
                }
            }]
        }
    }
});

</script> --}}

@endsection