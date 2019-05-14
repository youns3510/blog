{{--
<!--  @auth
                <a href="{{ url('/dashboard') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth-->--}}




<!DOCTYPE html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{$setting->site_name }}</title>

    <link rel="stylesheet" type="text/css" href="{{asset('app/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/crumina-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/styles.css')}}">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{asset('app/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/primary-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/magnific-popup.css')}}">

    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="{{asset('app/css/rtl.css')}}">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <style>
        .padded-50 {
            padding: 40px;
        }

        .text-center {
            text-align: center;
        }
    </style>

</head>


<body class=" ">

    <div class="content-wrapper">
    @include('includes.header')



        <div class="header-spacer"></div>

        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src='{{$first_post->featured}}' alt='{{$first_post->title}}'>
                            <div class="overlay"></div>
                            <a href="{{$first_post->featured}}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="{{route('post.single',$first_post->slug)}}" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                <h2 class="post__title entry-title text-center">
                                    <a href="{{route('post.single',$first_post->slug)}}">{{$first_post->title}}</a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                    {{$first_post->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                                    <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{route('category.single',$first_post->category->id)}}">{{$first_post->category->name}}</a>
                                        </span>

                                    <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                </div>
                            </div>
                        </div>

                    </article>
                </div>
                <div class="col-lg-2"></div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{$second_post->featured}}" alt="{{$second_post->title}}">
                            <div class="overlay"></div>
                            <a href="{{$second_post->featured}}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="{{route('post.single',$second_post->slug)}}" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                <h2 class="post__title entry-title text-center">
                                    <a href="{{route('post.single',$second_post->slug)}}">{{$second_post->title}}</a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$second_post->created_at->diffForHumans()}}
                                            </time>

                                        </span>


                                    <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{route('category.single',$second_post->category->id)}}">{{$second_post->category->name}}</a>
                                        </span>

                                    <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                </div>
                            </div>
                        </div>

                    </article>
                </div>
                <div class="col-lg-6">
                    <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{$third_post->featured}}" alt="{{$third_post->title}}">
                            <div class="overlay"></div>
                            <a href="{{$third_post->featured}}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="{{route('post.single',$third_post->slug)}}" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                <h2 class="post__title entry-title text-center">
                                    <a href="{{route('post.single',$third_post->slug)}}">{{$third_post->title}}</a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                               {{$third_post->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                                    <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{route('category.single',$third_post->category->id)}}">{{$third_post->category->name}}</a>
                                        </span>

                                    <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                </div>
                            </div>
                        </div>

                    </article>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row medium-padding120 bg-border-color">
                <div class="container">
                    <div class="col-lg-12">
                        <div class="offers">
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    <div class="heading">
                                        <h4 class="h1 heading-title">{{$first_category->name}}</h4>
                                        <div class="heading-line">
                                            <span class="short-line"></span>
                                            <span class="long-line"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="case-item-wrap">
                                    @foreach($first_category->posts()->take(3)->get() as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{$post->featured}}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title text-center"><a href="{{route('post.single',$post->slug)}}">{{$post->title}}</a></h6>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                        <div class="padded-50"></div>
                        <div class="offers">
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    <div class="heading">
                                        <h4 class="h1 heading-title">{{$second_category->name}}</h4>
                                        <div class="heading-line">
                                            <span class="short-line"></span>
                                            <span class="long-line"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="case-item-wrap">
                                    @foreach($second_category->posts()->take(3)->get() as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{$post->featured}}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title text-center"><a href="{{route('post.single',$post->slug)}}">{{$post->title}}</a></h6>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="padded-50"></div>
                        <div class="offers">
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    <div class="heading">
                                        <h4 class="h1 heading-title">{{$third_category->name}}</h4>
                                        <div class="heading-line">
                                            <span class="short-line"></span>
                                            <span class="long-line"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="case-item-wrap">
                                    @foreach($third_category->posts()->take(3)->get() as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{$post->featured}}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title text-center"><a href="{{route('post.single',$post->slug)}}">{{$post->title}}</a></h6>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="padded-50"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscribe Form -->
    @include('includes.subscribe')

        <!-- End Subscribe Form -->
    </div>
    @include('includes.footer')

    <!-- End Overlay Search -->

    <!-- JS Script -->

    <script src="{{asset('app/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('app/js/crum-mega-menu.js')}}"></script>
    <script src="{{asset('app/js/swiper.jquery.min.js')}}"></script>
    <script src="{{asset('app/js/theme-plugins.js')}}"></script>
    <script src="{{asset('app/js/main.js')}}"></script>
    <script src="{{asset('app/js/form-actions.js')}}"></script>
    <script src="{{asset('app/js/velocity.min.js')}}"></script>
    <script src="{{asset('app/js/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('app/js/animation.velocity.min.js')}}"></script>


    <!-- ...end JS Script -->

</body>

</html>