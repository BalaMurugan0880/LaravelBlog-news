@extends('website.template.master')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{ asset('website/img/home-bg.jpg') }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Blog & News</h1>
                        <span class="subheading">Welcome To Our Blog & News</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 mx-auto">
                @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="{{ url('post/' . $post->slug) }}">
                            <h2 class="post-title">
                                {{ $post->title }}
                            </h2>
                            <h3 class="post-subtitle">
                                {{ $post->sub_title }}
                            </h3>
                        </a>
                        <p class="post-meta">Posted by
                            <a href="#">{{ $post->user->name }}</a>
                            on {{ date('M d, Y', strtotime($post->created_at)) }}
                            @if(count($post->categories) > 0)
                                | <span class="post-category">
                            Category :
                                    @foreach($post->categories as $category)
                                        <a href="{{ url('category/' . $category->category_slug) }}"><span class="badge badge-primary">{{ $category->category_name }}</span></a>,
                                    @endforeach
                        </span>  
                            @endif | &nbsp;<i class="fa fa-eye"></i>&nbsp;<span>{{ $post->views}} Viewers</span>
                        </p>
                    </div>
                    <hr>
            @endforeach

            <!-- Pager -->
               {{--  <div class="clearfix mt-4">
                    {{ $posts->links() }}
                </div> --}}
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="category">
                    <h2 class="category-title">Category</h2>
                    <ul class="category-list">
                        @foreach($categories as $category)
                            <li><a href="{{ url('category/' . $category->category_slug) }}">{{ $category->category_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="mostpopular">
                    <h2 class="category-title">Most Popular</h2>
                     <ul class="category-list">
                        @foreach($mostpopular as $popular)
                            <li>
                                <a href="{{ url('post/' . $popular->slug) }}">{{ $popular->title }} <h3 class="most-popular">{{ $popular->sub_title }}| &nbsp;<i class="fa fa-eye"></i>&nbsp;{{ $popular->views}}</h3>  </a>
                                

                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mostrecent">
                     <h2 class="category-title">Recent Post</h2>
                     <ul class="category-list">
                        @foreach($recentpost as $recent)
                            <li>
                                <a href="{{ url('post/' . $recent->slug) }}">{{ $recent->title }} <h3 class="most-popular">{{ $recent->sub_title }}| &nbsp;<i class="fa fa-eye"></i>&nbsp;{{ $recent->views}}</h3>  </a>
                                

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection()