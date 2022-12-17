 @extends('guest.partials.main')
 @section('content')
     <section class="page-title page-title-13" id="page-title">
         <div class="page-title-wrap bg-overlay bg-overlay-dark-3">
             <div class="bg-section"><img src="{{ asset('img/gedung-blur.jpg') }}" alt="Background" /></div>
             <div class="container">
                 <div class="row">
                     <div class="col-12 col-lg-6 offset-lg-3">
                         <div class="title text-center">
                             <h1 class="title-heading">Berita Vidio</h1>
                             <p class="text-center"></p>
                             <ol class="breadcrumb breadcrumb-light d-flex justify-content-center">
                                 <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Berita Vidio</li>
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
     <section class="projects projects-standard projects-standard-1" id="projects-standard-1">
         <div class="container">
             <div class="row" id="projects-all">
                @foreach ($newsVideos as $newsVideo)
                    <div class="col-12 col-md-6 col-lg-4 project-item filter-finance filter-supply">
                        <div class="project-panel" data-hover="">
                            <div class="project-panel-holder">
                                <div class="project-img"><a class="link" href="{{route('news-video.guest.show',['video'=>$newsVideo->slug])}}"></a><img
                                        src="{{asset($newsVideo->thumbnail)}}" alt="project image" /></div>
                                <!-- End .project-img-->
                                <div class="project-content">
                                    <div class="project-title">
                                        <h4><a href="{{route('news-video.guest.show',['video'=>$newsVideo->slug])}}">{{$newsVideo->title}}</a>
                                        </h4>
                                    </div>
                                </div>
                                <!-- End .project-content -->
                            </div>
                        </div>
                    </div>
                @endforeach
             </div>
             <!-- End .row-->
             {{ $newsVideos->links() }}
             <!-- End .row-->
         </div>
         <!-- End .container-->
     </section>
 @endsection
