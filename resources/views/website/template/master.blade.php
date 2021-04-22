<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
        {!! JsonLd::generate() !!}

    <title>BAC BLOG & NEWS</title>

    <link rel="bac_education_logo" sizes="180x180" href="website/img/bac_education_logo.png">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('website/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('website/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('website/css/clean-blog.min.css') }}" rel="stylesheet">

    <style>
        .page-link {
            color: #00657b;
            text-align: center;
        }

        .page-item.active .page-link {
            background-color: #00657b;
            border-color: #00657b;
        }

        .category-list {
            padding: 0;
            margin: 0;
        }

        .category-list li {
            list-style: none;
        }

        .category-title {
            margin-top: 30px;
            margin-bottom: 10px;
        }

        .post-category a {
            text-decoration: none;
        }

        .most-popular{
            font-size: 12px;
            font-weight: normal;
        }
    </style>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">BAC Blog & News</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @php($pages = getPages())
                @foreach($pages as $page)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('page/' . $page->slug) }}">{{ $page->title }}</a>
                    </li>
                @endforeach

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.show') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="https://twitter.com/BACCollege?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/BrickfieldsAsiaCollege.BAC/">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/explore/locations/1588900951194966/brickfield-asia-college-bac-pj-campus/?hl=en">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted"> &copy;2021 Brickfields Asia College</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('website/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('website/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Custom scripts for this template -->
<script src="{{ asset('website/js/clean-blog.min.js') }}"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6059529640e75a11"></script>

</body>

</html>
