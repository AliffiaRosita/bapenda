 @extends('guest.partials.main')
 @section('content')
     <section class="page-title page-title-blank-2 bg-white" id="page-title">
         <div class="container">
             <div class="row">
                 <div class="col">
                     <h1 class="d-none">{{ $newsVideo->title }}</h1>
                 </div>
             </div>
             <div class="row">
                 <div class="col-12">
                     <div class="breadcrumb-wrap">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                             <li class="breadcrumb-item"><a href="{{ route('news-video.guest.index') }}">Berita Video</a>
                             </li>
                             <li class="breadcrumb-item active" aria-current="page">{{ $newsVideo->title }}</li>
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
                 <div class="col-lg-12">
                     <div class="blog-entry">
                         <div class="entry-img entry-infos">
                             <!--
                                            ============================
                                            Video #3 Section
                                            ============================
                                            -->
                             <div class="video video-3" style="height: 500px" id="video-3">
                                 <div class="bg-section"><img src="{{ asset($newsVideo->thumbnail) }}" alt="background" />
                                 </div><a class="popup-video btn-video btn-video-2" href="{{ $newsVideo->url }}"> <i
                                         class="fas fa-play"></i></a>
                                 <!-- End .popup-video-->
                             </div>
                             <div class="entry-meta" style="z-index: 1">
                                 @php
                                     $date = date_create($newsVideo->created_at);
                                 @endphp
                                 <div class="entry-date"> <span class="year">{{ date_format($date, 'd F Y') }}</span>
                                 </div>
                                 <div class="entry-author"><a href="blog-grid.html">{{ $newsVideo->user->admin->name }}</a>
                                 </div>
                                 <div class="entry-comments"><span><i class="fas fa-eye"></i>
                                     </span><span>{{ $newsVideo->view }}</span></div>
                             </div>


                             <!-- End .video-->
                         </div>

                         <div class="entry-content">
                             <div class="entry-title">
                                 <h4>{{ $newsVideo->title }}</h4>
                             </div>
                             <div class="entry-bio">
                                 {!! $newsVideo->desc !!}
                             </div>
                             <div class="entry-holder mt-4">
                                 <!-- End .entry-tags-->
                                 <div class="entry-share"><span>Bagikan</span>
                                     <div>
                                         <a class="share-facebook"
                                             href="https://www.facebook.com/sharer.php?u={{ route('news-video.guest.show', ['video' => $newsVideo->slug]) }}&t={{ $newsVideo->title }}">
                                             <i class="fab fa-facebook-f"></i>
                                         </a>
                                         <a class="share-instagram"
                                             href="https://twitter.com/intent/tweet?text={{ $newsVideo->title }}&url={{ route('news-video.guest.show', ['video' => $newsVideo->slug]) }}">
                                             <i class="fab fa-twitter"></i>
                                         </a>
                                         <a class="share-twitter" href="https://www.linkedin.com/shareArticle/?mini=true&title={{ $newsVideo->title }}&url={{ route('news-video.guest.show', ['video' => $newsVideo->slug]) }}">
                                             <i class="fab fa-linkedin-in"></i>
                                         </a>
                                     </div>
                                 </div>
                                 <!-- End .entry-share-->
                             </div>

                         </div>

                     </div>

                 </div>
             </div>
         </div>
     </section>
 @endsection
