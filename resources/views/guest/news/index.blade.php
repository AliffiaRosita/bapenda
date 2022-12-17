 @extends('guest.partials.main')
 @section('content')
     <section class="page-title page-title-13" id="page-title">
         <div class="page-title-wrap bg-overlay bg-overlay-dark-3">
             <div class="bg-section"><img src="{{ asset('img/gedung-blur.jpg') }}" alt="Background" /></div>
             <div class="container">
                 <div class="row">
                     <div class="col-12 col-lg-6 offset-lg-3">
                         <div class="title text-center">
                             <h1 class="title-heading">Berita</h1>
                             <p class="text-center"></p>
                             <ol class="breadcrumb breadcrumb-light d-flex justify-content-center">
                                 <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Berita</li>
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
     <section class="blog blog-grid blog-grid-5" id="blog">
         <div class="container">
             <div class="row">
                 @foreach ($news as $item)
                     <div class="col-12 col-md-6 col-lg-4">
                         <div class="blog-entry" data-hover="">
                             <div class="entry-content">
                                 <div class="entry-meta">
                                     @php
                                         $date = date_create($item->created_at);
                                     @endphp
                                     <div class="entry-date"><span class="year">{{ date_format($date, 'd F Y') }}</span>
                                     </div>
                                     <!-- End .entry-date		-->
                                     <div class="entry-author">
                                         <p>{{ $item->user->admin->name }}</p>
                                     </div>
                                 </div>
                                 <div class="entry-title">
                                     <h4><a href="{{ route('news.guest.show', ['news' => $item->slug]) }}">
                                             @if (strlen($item->title) > 55)
                                                 {{ substr(strip_tags($item->title), 0, 55) . '...' }}
                                             @else
                                                 {{ $item->title }}
                                             @endif
                                         </a></h4>
                                 </div>
                                 <div class="entry-img-wrap">
                                     <div class="entry-img" style=""><a href="{{ route('news.guest.show', ['news' => $item->slug]) }}"><img
                                                 style="height: 200px;width:100%;object-fit:cover"
                                                 src="{{ $item->newsGalleries->first()->img }}"
                                                 alt="{{ $item->title }}" /></a></div>
                                     <div class="entry-category">
                                         @foreach ($item->categories as $category)
                                             <a
                                                 href="{{ route('news.guest.category', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                         @endforeach
                                     </div>
                                 </div>
                                 <!-- End .entry-img-->
                                 <div class="entry-bio">
                                     {{ substr(strip_tags($item->desc), 0, 180) . '...' }}
                                 </div>
                                 <div class="entry-more mt-2"> <a class="btn btn--white btn-bordered" style="width: 165px"
                                         href="{{ route('news.guest.show', ['news' => $item->slug]) }}">Selengkapnya <i
                                             class="energia-arrow-right"></i>
                                            </a>
                                </div>
                             </div>
                             <!-- End .entry-content-->
                         </div>
                     </div>
                 @endforeach
                 {{ $news->links() }}
             </div>
     </section>
 @endsection
