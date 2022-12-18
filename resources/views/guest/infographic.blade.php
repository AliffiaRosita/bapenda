@extends('guest.partials.main')
@section('content')
    <section class="page-title page-title-13" id="page-title">
        <div class="page-title-wrap bg-overlay bg-overlay-dark-3">
            <div class="bg-section"><img src="{{ asset('img/gedung-blur.jpg') }}" alt="Background" /></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="title text-center">
                            <h1 class="title-heading">Infografis</h1>
                            <p class="text-center"></p>
                            <ol class="breadcrumb breadcrumb-light d-flex justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Infografis</li>
                            </ol>
                            <!-- End .breadcrumb-->
                        </div>
                        <!-- End .title-->
                    </div>
                    <!-- End .col-12-->
                </div>
                <!-- End .row-->
            </div>
            <!-- End .container-->
        </div>
    </section>
    <!-- End #page-title-->
    <!--
             ============================
             Blog Grid #5 Section
             ============================
             -->
    <section class="projects projects-gallery" id="blog">
        <div class="container">
            <div class="row">
                @foreach ($infographics as $infographic)
                    <div class="col-12 col-md-6 col-lg-4 team-item">
                        <div class="project-panel">
                            <div class="project-panel-holder">
                                <div class="project-img"><img src="{{asset($infographic->img)}}" alt=" item" />
                                    <div class="project-hover">
                                        <div class="project-action">
                                            <div class="project-zoom"><i class="far fa-eye"></i><a class="img-gallery-item"
                                                    href="{{asset($infographic->img)}}"
                                                    title="{{$infographic->caption}}"></a></div>
                                        </div>
                                        <!-- End .project-action -->
                                    </div>
                                    <!-- End .project-hover-->
                                </div>
                                <!-- End .project-img-->
                            </div>
                            <!-- End .project-panel-holder-->
                        </div>
                        <!-- End .project-panel-->
                    </div>
                @endforeach
                {{ $infographics->links() }}
            </div>
    </section>
@endsection
