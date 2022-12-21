@extends('guest.partials.main')
@section('content')
    <!--
        ============================
        Slider #1 Section
        ============================
        -->
    <section class="slider slider-1" id="slider-1">
        <div class="container-fluid pe-0 ps-0">
            <div class="slider-carousel owl-carousel carousel-navs carousel-dots" data-slide="1" data-slide-rs="1"
                data-autoplay="true" data-nav="true" data-dots="true" data-space="0" data-loop="true" data-speed="300">
                <!--  Start .slide-->
                @foreach ($banners as $banner)
                    <div class="slide bg-overlay bg-overlay-dark-slider">
                        <div class="bg-section"><img src="{{ asset($banner->img) }}" alt="Background" /></div>
                    </div>
                @endforeach
                <!-- End .slide-->
            </div>
            <!-- End .slider-carousel-->
        </div>
        <!--  End .container-fluid-->
    </section>
    <!--
        ============================
        About #1 Section
        ============================
        -->
    <section class="about about-1" id="about-1">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <div class="about-img">
                        <div class="about-img-holder bg-overlay">
                            <div class="bg-section"><img src="{{ asset($about->image) }}" alt="about Image" /></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="heading heading-1">
                        <p class="heading-subtitle heading-subtitle-bg">{{ $about->sub_title }}</p>
                        <h2 class="heading-title">{{ $about->title }}</h2>
                    </div>
                    <div class="about-block">
                        <div class="row">
                            <div class="col-12 col-lg-7">
                                <div class="block-left">
                                    <p class="paragraph">{{ $about->desc }}</p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5">
                                <div class="block-right">
                                    <div class="prief-set">
                                        <ul class="list-unstyled advantages-list">
                                            @foreach ($about->points as $point)
                                                <li>{{ $point['name'] }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .col-lg-6-->
            </div>
            <!-- End .row-->
        </div>
        <!-- End .container-->
    </section>
    <!--
        ============================
        Features #1 Section
        ============================
        -->
    <section class="features features-1 bg-overlay bg-overlay-theme2" id="features-1">
        <div class="bg-section"> <img src="{{ asset('guest/assets/images/background/2.jpg') }}" alt="Background" /></div>
        <div class="container">
            <div class="heading heading-3 text-center">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <p class="heading-subtitle">Badan Pendapatan Daerah Provinsi Kalimantan Timur</p>
                        <h2 class="heading-title" style="color: white;">Pelayanan Kami</h2>
                    </div>
                    <!-- End .col-lg-6-->
                </div>
                <!-- End .row-->
            </div>
            <!-- End .heading-->
            <!-- End .heading-->
            <div class="carousel owl-carousel carousel-dots" data-slide="4" data-slide-rs="2" data-autoplay="true"
                data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
                @foreach ($services as $service)
                    <div>
                        <div class="feature-panel-holder" data-hover="">
                            <div class="feature-panel">
                                <div class="feature-icon"><img src="{{ asset($service->icon) }}" style="height: 65px"
                                        alt=""></div>
                                <div class="feature-content">
                                    <h4>{{ $service->title }}</h4>
                                    <p>{{ $service->desc }}</p>
                                </div><a href="{{ $service->url }}" target="__BLANK"><i class="energia-arrow-right"></i>
                                    <span>Lihat</span>
                                </a>
                            </div>
                            <!-- End .feature-panel-->
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End .carousel-->
        </div>
        <!-- End .container-->
    </section>
    <!--
        ============================
        services #1 Section
        ============================
        -->
    <section class="blog services-1 bg-grey" style="padding-top:100px" id="services-1">
        <div class="container">
            <div class="heading heading-3 text-center">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <p class="heading-subtitle">Badan Pendapatan Daerah Provinsi Kalimantan Timur</p>
                        <h2 class="heading-title">Berita</h2>
                    </div>
                    <!-- End .col-lg-6-->
                </div>
                <!-- End .row-->
            </div>
            <!-- End .heading-->
            <div class="row">
                @if ($news)
                    @foreach ($news as $item)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="blog-entry" data-hover="">
                                <div class="entry-content">
                                    <div class="entry-meta">
                                        @php
                                            $date = date_create($item->created_at);
                                        @endphp
                                        <div class="entry-date"><span
                                                class="year">{{ date_format($date, 'd F Y') }}</span>
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
                                        <div class="entry-img" style=""><a
                                                href="{{ route('news.guest.show', ['news' => $item->slug]) }}"><img
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
                                    <div class="entry-more mt-2"> <a class="btn btn--white btn-bordered"
                                            style="width: 165px"
                                            href="{{ route('news.guest.show', ['news' => $item->slug]) }}">Selengkapnya <i
                                                class="energia-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End .entry-content-->
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="more-blog"><a href="{{ route('news.guest.index') }}">Lihat Berita Lainnya </a> </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End .container-->
    </section>
    <!--
        ============================
        Counters #1 Section
        ============================
        -->
    <section class="counters counters-1 bg-overlay bg-overlay-theme2" id="counters-1">
        <div class="bg-section"> <img src="{{ asset('guest/assets/images/background/2.jpg') }}" alt="Background" />
        </div>
        <div class="container">
            <div class="heading heading-4 heading-light heading-light2">
                <div class="row">
                    <div class="col-12 col-lg-12 text-center">
                        <h2 class="heading-title">Berita Video</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($newsVideos as $newsVideo)
                        <div class="col-12 col-md-6 col-lg-4 project-item filter-finance filter-supply">
                            <div class="project-panel " data-hover="">
                                <div class="project-panel-holder">
                                    <div class="project-img"><a class="link"
                                            href="{{ route('news-video.guest.show', ['video' => $newsVideo->slug]) }}"></a><img
                                            src="{{ asset($newsVideo->thumbnail) }}" alt="project image" /></div>
                                    <!-- End .project-img-->
                                    <div class="project-content">
                                        <div class="project-title">
                                            <h4><a
                                                    href="{{ route('news-video.guest.show', ['video' => $newsVideo->slug]) }}">{{ $newsVideo->title }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!-- End .project-content -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 text-center"><a class="btn btn--bordered btn--white"
                            href="{{ route('news-video.guest.index') }}">Lihat Video Lainnya<i
                                class="energia-arrow-right"></i></a></div>
                </div>
                <!-- End .row-->
            </div>
            <!-- End .heading-->
            <div class="row">

            </div>
            <!-- End .row-->
        </div>
        <!-- End .container-->
    </section>
    <!--
                              ============================
                              Testimonials #1 Section
                              ============================
                              -->
    {{-- <section class="testimonial testimonial-1 bg-theme2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="carousel owl-carousel carousel-nav carousel-dots" data-slide="2" data-slide-rs="1"
                        data-autoplay="true" data-nav="true" data-dots="true" data-space="40" data-loop="true"
                        data-speed="800">
                        <div class="testimonial-panel">
                            <div class="testimonial-body">
                                <div class="testimonial-img"> <img
                                        src="{{ asset('guest/assets/images/testimonial/3.jpg') }}"
                                        alt="Testimonial Author" /></div>
                                <div class="testimonial-content">
                                    <p>“They were fantastic through the entire purchase process. Had lots of questions and
                                        they were patient. When my system arrived, it was well packed and shipping done
                                        smoothly with xpo.”</p>
                                    <div class="testimonial-meta">
                                        <h6>martin hope</h6>
                                        <p>pro systems founder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-panel">
                            <div class="testimonial-body">
                                <div class="testimonial-img"> <img
                                        src="{{ asset('guest/assets/images/testimonial/4.jpg') }}"
                                        alt="Testimonial Author" /></div>
                                <div class="testimonial-content">
                                    <p>“They helped lead me through the process of system selection, site layout and placing
                                        my order. They were very knowledgeable and has provided guidance each step.”</p>
                                    <div class="testimonial-meta">
                                        <h6>john peter</h6>
                                        <p>pro systems founder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-panel">
                            <div class="testimonial-body">
                                <div class="testimonial-img"> <img
                                        src="{{ asset('guest/assets/images/testimonial/5.jpg') }}"
                                        alt="Testimonial Author" /></div>
                                <div class="testimonial-content">
                                    <p>“They helped lead me through the process of system selection, site layout and placing
                                        my order. They were very knowledgeable and has provided guidance each step.”</p>
                                    <div class="testimonial-meta">
                                        <h6>john doe</h6>
                                        <p>energia systems founder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .row-->
        </div>
        <!-- End .container-->
    </section> --}}
    <!--
        ============================
        Projects Modern #1 Section
        ============================
        -->
    <section class="project-single mt-5" id="project-single">
        <!-- End .row-->
        <div class="heading heading-3 text-center">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3">
                    <h2 class="heading-title">Infografis</h2>
                </div>
                <!-- End .col-lg-6-->
            </div>
            <!-- End .row-->
        </div>
        <div class="project-image-carousel projects projects-gallery">
            <div class="carousel owl-carousel carousel-dots carousel-navs" data-slide="4" data-slide-rs="3"
                data-center="data-center" data-autoplay="true" data-nav="true" data-dots="true" data-space="30"
                data-loop="true" data-speed="800">
                @foreach ($infographics as $infographic)
                    <div class="my-auto">
                        <div class="project-panel">
                            <div class="project-panel-holder">
                                <div class="project-img"><img src="{{ asset($infographic->img) }}"
                                        style="height: 320px;object-fit:cover" alt=" item" />
                                    <div class="project-hover">
                                        <div class="project-action">
                                            <div class="project-zoom"><i class="far fa-eye"></i><a
                                                    class="img-gallery-item" href="{{ asset($infographic->img) }}"
                                                    title="{{ $infographic->caption }}"></a>
                                            </div>
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
            </div>
            <!-- End .carousel-->
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <div class="projects-load-more">
                        <a class="btn btn--secondary" href="{{ route('infographic') }}">Lihat Lainnya<i
                                class="energia-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .container-->
    </section>
    <!--
        ============================
        Clients #1 Section
        ============================
        -->
    <section class="clients clients-carousel clients-1 mt-5" id="clients-1">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="d-none">Partner Kami</h3>
                </div>
                <div class="col-12">
                    <div class="carousel owl-carousel" data-slide="6" data-slide-rs="2" data-autoplay="true"
                        data-nav="false" data-dots="false" data-space="0" data-loop="true" data-speed="250">
                        @foreach ($partners as $partner)
                            <div class="client"><a href="{{ $partner->url }}" target="__BLANK"> </a><img
                                    src="{{ asset($partner->logo) }}" alt="client" /></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- End .row-->
        </div>
        <!-- End .container-->
    </section>
    <!--
          ============================
          Pricing #1 Section
          ============================
          -->
    <section class="pricing pricing-1" id="pricing-1">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3">
                    <div class="heading heading-16 text-center">
                        <p class="heading-subtitle">Sosial Media BAPENDA Provinsi Kalimantan Timur</p>
                        <h2 class="heading-title">Sosial Media</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4 d-flex">
                    <div class="price-table">
                        <div class="pricing-panel">
                            <div class="pricing-body">
                                <div class="pricing-heading">
                                    <h4 class="pricing-title">Ikuti Kami di Facebook</h4>
                                    <p class="pricing-desc">Facebook BAPENDA Provinsi Kalimantan Timur</p>
                                </div>
                                <div class="pricing-list">
                                    <div class="fb-page" data-href="https://web.facebook.com/bapenda.prov.kaltim" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://web.facebook.com/bapenda.prov.kaltim" class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/bapenda.prov.kaltim">BAPENDA Kaltim</a></blockquote></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .pricing-table-->
                </div>
                <div class="col-12 col-lg-4 d-flex">
                    <div class="price-table">
                        <div class="pricing-panel">
                            <div class="pricing-body">
                                <div class="pricing-heading">
                                    <h4 class="pricing-title">Ikuti Kami di Twitter</h4>
                                    <p class="pricing-desc">Twitter BAPENDA Provinsi Kalimantan Timur</p>
                                </div>
                                <div class="pricing-list">
                                    <a class="twitter-timeline" data-height="500" href="https://twitter.com/BapendaKaltim?ref_src=twsrc%5Etfw">Tweets by Bapenda Kaltim</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .pricing-table-->
                </div>
                <div class="col-12 col-lg-4 d-flex">
                    <div class="price-table">
                        <div class="pricing-panel">
                            <div class="pricing-body">
                                <div class="pricing-heading" style="margin-bottom:20px">
                                    <h4 class="pricing-title">Ikuti Kami di Instagram</h4>
                                    <p class="pricing-desc">Instagram BAPENDA Provinsi Kalimantan Timur</p>
                                </div>
                                <div class="pricing-list">
                                    <div data-mc-src="6dfc5990-6851-41c1-a87f-400be6528cd1#null"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .pricing-table-->
                </div>
            </div>
            <!-- End .row-->
        </div>
        <!-- End .container-->
    </section>
    <!--
                              ============================
                              Contact #1 Section
                              ============================
                              -->
    {{-- <section class="contact contact-1 bg-overlay bg-overlay-theme" id="contact-1">
        <div class="bg-section"><img src="{{ asset('guest/assets/images/background/3.jpg') }}" alt="background" /></div>
        <div class="container">
            <div class="contact-panel contact-panel-3">
                <div class="heading heading-light heading-6">
                    <p class="heading-subtitle">Improving The Performance Of Solar Energy.</p>
                    <h2 class="heading-title">Discover Independence Through Using The Power Of Solar Panels!</h2>
                    <p class="heading-desc">We offer products, solutions, and services across the entire energy value
                        chain. We support our customers on their way to a more sustainable future – no matter how far along
                        the journey to energize society with affordable energy systems.</p>
                    <div class="advantages-list-holder">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <ul class="list-unstyled advantages-list advantages-list-2">
                                    <li>Reliabe and performance</li>
                                    <li>Solar material financing</li>
                                    <li>In-time manufacturing</li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-6">
                                <ul class="list-unstyled advantages-list advantages-list-2">
                                    <li>50% more energy output</li>
                                    <li>Built using ntype mono</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="contact-action"><a class="btn btn--white" href="page-about.html">learn more <i
                                class="energia-arrow-right"></i></a><a class="btn btn--bordered btn--white"
                            href="page-faqs.html">our core values</a></div>
                    <div class="contact-quote"> <img src="{{ asset('guest/assets/images/icons/noteicon.png') }}"
                            alt="icon" />
                        <p>Receive an accurate quote within 3-5 days when you fill out this form. Or, give us a call: <a
                                href="tel:01061245741">(002) 01061245741</a></p>
                    </div>
                </div>
                <div class="contact-card">
                    <div class="contact-body">
                        <h5 class="card-heading">Request A Quote</h5>
                        <p class="card-desc">We take great pride in everything that we do, control over products allows us
                            to ensure our customers receive the best quality service.</p>
                        <form class="contactForm" method="post" action="">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="select-1">Who will be install system?</label>
                                    <select class="form-control" id="select-1">
                                        <option value="default">local contractor</option>
                                        <option value="AL">foreign contractor </option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="select-2">System completed by?</label>
                                    <select class="form-control" id="select-2">
                                        <option value="default">3:6 months</option>
                                        <option value="AL">6:12 months</option>
                                        <option value="AK">12:24 months</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="contact-usage">Monthly electric usage in kWh?</label>
                                    <input class="form-control" type="text" id="contact-usage" name="contact-usage"
                                        placeholder="1254 KWH" required="" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="select-3">Solar system type?</label>
                                    <select class="form-control" id="select-3">
                                        <option value="default">OffGrid</option>
                                        <option value="AL">OnGrid</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="select-4">Solar panels place?</label>
                                    <select class="form-control" id="select-4">
                                        <option value="default">huge farm</option>
                                        <option value="AL">small farm</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="select-5">Materials on your roof?</label>
                                    <select class="form-control" id="select-5">
                                        <option value="default">comp shingle</option>
                                        <option value="AL">roof shingle</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Preferred Contact Method</label>
                                    <div class="custom-radio-group" id="custom-radio-group">
                                        <div class="custom-control">
                                            <input class="custom-control-input" type="radio" id="customRadioInline1"
                                                name="customRadioInline1" />
                                            <label for="customRadioInline1">all</label>
                                        </div>
                                        <div class="custom-control">
                                            <input class="custom-control-input" type="radio" id="customRadioInline2"
                                                name="customRadioInline1" />
                                            <label for="customRadioInline2">email</label>
                                        </div>
                                        <div class="custom-control">
                                            <input class="custom-control-input" type="radio" id="customRadioInline3"
                                                name="customRadioInline1" />
                                            <label for="customRadioInline3">phone</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn--secondary w-100">submit request <i
                                            class="energia-arrow-right"></i></button>
                                </div>
                                <div class="col-12">
                                    <div class="contact-result"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End .contact-body -->
                </div>
            </div>
            <!-- End .contact-panel-->
        </div>
        <!-- End .container-->
    </section> --}}
    <!--
                              ============================
                              Blog #1 Section
                              ============================
                              -->
    {{-- <section class="blog blog-1 blog-grid" id="blog-1">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3">
                    <div class="heading heading-7 text-center">
                        <h2 class="heading-title">recent articles</h2>
                    </div>
                </div>
            </div>
            <!-- End .row-->
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="blog-entry" data-hover="">
                        <div class="entry-content">
                            <div class="entry-meta">
                                <div class="entry-date"><span class="day">jan 21</span><span
                                        class="year">2021</span></div>
                                <!-- End .entry-date		-->
                                <div class="entry-author">
                                    <p>mike dolley</p>
                                </div>
                            </div>
                            <div class="entry-title">
                                <h4><a href="blog-single.html">Filing Solar Power Permits in 2020? Consider Following
                                        Important Factors</a></h4>
                            </div>
                            <div class="entry-img-wrap">
                                <div class="entry-img"><a href="blog-single.html"><img
                                            src="{{ asset('guest/assets/images/blog/grid/1.jpg') }}"
                                            alt="Filing Solar Power Permits in 2020? Consider Following Important Factors" /></a>
                                </div>
                                <div class="entry-category"><a href="blog-grid.html">solar</a><a
                                        href="blog-grid.html">insights</a>
                                </div>
                            </div>
                            <!-- End .entry-img-->
                            <div class="entry-bio">
                                <p>All of these factors are important consider when permitting your solar system, and can
                                    help streamline your process. Take time to consider these.</p>
                            </div>
                            <div class="entry-more"> <a class="btn btn--white btn-bordered" href="blog-single.html">read
                                    more <i class="energia-arrow-right"></i></a></div>
                        </div>
                    </div>
                    <!-- End .entry-content-->
                </div>
                <div class="col-12 col-lg-4">
                    <div class="blog-entry" data-hover="">
                        <div class="entry-content">
                            <div class="entry-meta">
                                <div class="entry-date"><span class="day">jan 25</span><span
                                        class="year">2021</span></div>
                                <!-- End .entry-date		-->
                                <div class="entry-author">
                                    <p>peter allan</p>
                                </div>
                            </div>
                            <div class="entry-title">
                                <h4><a href="blog-single.html">How to Add Battery Backup to an Existing Grid Tied Solar
                                        System by Yourself!</a></h4>
                            </div>
                            <div class="entry-img-wrap">
                                <div class="entry-img"><a href="blog-single.html"><img
                                            src="{{ asset('guest/assets/images/blog/grid/2.jpg') }}"
                                            alt="How to Add Battery Backup to an Existing Grid Tied Solar System by Yourself!" /></a>
                                </div>
                                <div class="entry-category"><a href="blog-grid.html">systems</a><a
                                        href="blog-grid.html">battery</a>
                                </div>
                            </div>
                            <!-- End .entry-img-->
                            <div class="entry-bio">
                                <p>Batteries are the most expensive part of a solar system. Between appropriately-size
                                    battery bank and a battery-based inverter like the Outback Radian.</p>
                            </div>
                            <div class="entry-more"> <a class="btn btn--white btn-bordered" href="blog-single.html">read
                                    more <i class="energia-arrow-right"></i></a></div>
                        </div>
                    </div>
                    <!-- End .entry-content-->
                </div>
                <div class="col-12 col-lg-4">
                    <div class="blog-entry" data-hover="">
                        <div class="entry-content">
                            <div class="entry-meta">
                                <div class="entry-date"><span class="day">jan 28</span><span
                                        class="year">2021</span></div>
                                <!-- End .entry-date		-->
                                <div class="entry-author">
                                    <p>Sophia barry</p>
                                </div>
                            </div>
                            <div class="entry-title">
                                <h4><a href="blog-single.html">Energy Department Research Will Help Eagles Coexist with
                                        Wind Energy Deployment</a></h4>
                            </div>
                            <div class="entry-img-wrap">
                                <div class="entry-img"><a href="blog-single.html"><img
                                            src="{{ asset('guest/assets/images/blog/grid/3.jpg') }}"
                                            alt="Energy Department Research Will Help Eagles Coexist with Wind Energy Deployment" /></a>
                                </div>
                                <div class="entry-category"><a href="blog-grid.html">research</a><a
                                        href="blog-grid.html">energy</a>
                                </div>
                            </div>
                            <!-- End .entry-img-->
                            <div class="entry-bio">
                                <p>Batteries are the most expensive part of a solar system. Between appropriately-size
                                    battery bank and a battery-based inverter like the Outback Radian.</p>
                            </div>
                            <div class="entry-more"> <a class="btn btn--white btn-bordered" href="blog-single.html">read
                                    more <i class="energia-arrow-right"></i></a></div>
                        </div>
                    </div>
                    <!-- End .entry-content-->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="more-blog"><a href="blog-grid.html">find out more about our news!</a></div>
                </div>
            </div>
            <!-- End .row-->
        </div>
        <!-- End .container-->
    </section> --}}
    <!--
                              ============================
                              Footer #1
                              ============================
                              -->
@endsection
@push('script')
<script
  src="https://cdn2.woxo.tech/a.js#63a28267417f3734f50f5365"
  async data-usrc>
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v10.0" nonce="2koYxy6w"></script>
@endpush
