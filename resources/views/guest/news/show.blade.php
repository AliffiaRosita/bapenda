@extends('guest.partials.main')
@section('content')
     <section class="page-title page-title-blank-2 bg-white" id="page-title">
        <div class="container">
          <div class="row">
            <div class="col"> 
              <h1 class="d-none">The Influence of Environmental Conditions in Arctic Regions.</h1>
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
                <div class="entry-img"><img src="assets/images/blog/single/1.jpg" alt="entry image"/>
                  <div class="entry-meta">
                    <div class="entry-category"><a href="blog-grid.html">energy</a><a href="blog-grid.html">systems</a></div>
                    @php
                        $date = date_create($news->created_at);
                    @endphp
                    <div class="entry-date"> <span class="year">{{date_format($date,'d F Y')}}</span></div>
                    <div class="entry-author"><a href="blog-grid.html">{{$news->user->admin->name}}</a></div>
                    <div class="entry-comments"><span><i class="fas fa-eye"></i> </span><span >{{$news->view}}</span></div>
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
                            <a href="blog-grid.html">{{$category->name}}</a>
                        @endforeach
                  </div>
                </div>
                
                <!-- End .entry-comments-->
              </div>
              <!-- End .blog-entry-->
            </div>
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
                <div class="widget widget-categories">
                  <div class="widget-title">
                    <h5>categories</h5>
                  </div>
                  <div class="widget-content">
                    <ul class="list-unstyled">
                      <li><a href="blog-grid.html">Wind Turbines</a><span>9</span></li>
                      <li><a href="blog-grid.html">Solar Panels</a><span>2</span></li>
                      <li><a href="blog-grid.html">Battery Matrial</a><span>5</span></li>
                      <li><a href="blog-grid.html">Hydro Plants</a><span>1</span></li>
                      <li><a href="blog-grid.html">Fossil Resourc</a><span>7</span></li>
                      <li><a href="blog-grid.html">Charge Control</a><span>10</span></li>
                    </ul>
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