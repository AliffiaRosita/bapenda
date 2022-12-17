@extends('guest.partials.main')
@push('css')
<style>
    .owl-stage {
        width: 100% !important;
    }

    .owl-item.active {
        width: 100% !important;
    }

</style>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css">
@endpush
@section('content')
<section class="page-title page-title-blank-2 bg-white" id="page-title">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="d-none">{{$news->title}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="blog-grid.html">Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$news->title}}</li>
                    </ol>
                </div>
                <!-- End .title -->
            </div>
            <!-- End .col-lg-8-->
        </div>
        <!-- End .row-->
    </div>
    <!-- End .container-->
</section>
<section class="blog blog-single" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="blog-entry">
                    <div class="entry-img">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                            <div class="carousel-indicators">
                                @foreach ($news->newsGalleries as $key=> $image)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}"
                                    class="active" aria-current="true" aria-label="Slide {{$key+1}}"></button>

                                @endforeach
                                {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button> --}}
                            </div>
                            <div class="carousel-inner">
                                @if ($news->newsGalleries)
                                @foreach ($news->newsGalleries as $key=> $image)
                                <div class="carousel-item {{$key===0?'active':''}} ">
                                        <img src="{{asset($image->img)}}" class="d-block w-100 h-80" style="object-fit: cover" alt="image">
                                    </div>
                                    @endforeach
                                    @endif
                                {{-- <div class="carousel-item active">
                                    <img src="{{asset('img/logo-bapenda.png')}}" class="d-block w-100" alt="aaa">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('img/gedung-blur.jpg')}}" class="d-block w-100" alt="bbbb">
                                </div> --}}
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="entry-meta">
                            <div class="entry-category">
                                @foreach ($news->categories as $category)
                                <a
                                    href="{{route('news.guest.category',['category'=> $category->slug])}}">{{$category->name}}</a>
                                @endforeach
                                </div>
                            @php
                            $date = date_create($news->created_at);
                            @endphp
                            <div class="entry-date"> <span class="year">{{date_format($date,'d F Y')}}</span></div>
                            <div class="entry-author"><a href="blog-grid.html">{{$news->user->admin->name}}</a></div>
                            <div class="entry-comments"><span><i class="fas fa-eye"></i>
                                </span><span>{{$news->view}}</span></div>
                        </div>
                        <!-- End .entry-meta-->
                    </div>
                    <div class="entry-content">
                        <div class="entry-title">
                            <h4>{{$news->title}}</h4>
                        </div>
                        <div class="entry-bio">
                            {!! $news->desc !!}
                        </div>
                        <div class="entry-holder mt-4">
                            <div class="entry-tags"><span>Kategori: </span>
                                @foreach ($news->categories as $category)
                                <a
                                    href="{{route('news.guest.category',['category'=> $category->slug])}}">{{$category->name}}</a>
                                @endforeach
                            </div>

                        </div>
                        <div class="entry-holder">
                            <!-- End .entry-tags-->
                            <div class="entry-share"><span>share this article</span>
                                <div><a class="share-facebook" href=""><i class="fab fa-facebook-f"></i></a><a
                                        class="share-instagram" href="javascript:void(0)"><i
                                            class="fab fa-twitter"></i></a><a class="share-twitter"
                                        href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a></div>
                            </div>
                            <!-- End .entry-share-->
                        </div>

                    </div>
                    <!-- End .entry-comments-->
                </div>

                <!-- End .blog-entry-->
            </div>

            <!-- End .col-lg-8-->
            <div class="col-12 col-lg-4">
                <!-- 
              ============================
              Sidebar Blog
              ============================
              -->
                <div class="sidebar sidebar-blog">

                    <!-- Categories-->
                    <div class="widget widget-tags">
                        <div class="widget-title">
                            <h5>Kategori</h5>
                        </div>
                        <div class="widget-content">
                            @foreach ($categories as $category)
                            <a
                                href="{{route('news.guest.category',['category'=> $category->slug])}}">{{$category->name}}</a>

                            @endforeach
                        </div>
                    </div>
                    <!-- End .widget-categories -->

                </div>
                <!-- End .sidebar-->
            </div>
            <!-- End .col-lg-4-->
        </div>
        <!-- End .row-->
    </div>
    <!-- End .container-->
</section>
@endsection
@push('js')
<script src="{{asset('lightbox/lightbox.min.js')}}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox-plus-jquery.min.js"></script>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })

</script>
@endpush
