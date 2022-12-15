@extends('guest.partials.main')
@section('content')
    <!--
      ============================
      Slider #1 Section
      ============================
      -->
      <section class="slider slider-1" id="slider-1">
        <div class="container-fluid pe-0 ps-0">
          <div class="slider-carousel owl-carousel carousel-navs carousel-dots" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="true" data-dots="true" data-space="0" data-loop="true" data-speed="300">
            <!--  Start .slide-->
            @foreach ($banners as $banner)
            <div class="slide bg-overlay bg-overlay-dark-slider">
              <div class="bg-section"><img src="{{asset($banner->img)}}" alt="Background"/></div>
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
                  <div class="bg-section"><img src="{{asset('guest/assets/images/about/1.jpg')}}" alt="about Image"/></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-7">
              <div class="heading heading-1">
                <p class="heading-subtitle heading-subtitle-bg">Complete Commercial And Residential Solar Systems</p>
                <h2 class="heading-title">We Are Pioneers In The World Of Solar & Renewable Energy!</h2>
              </div>
              <div class="about-block">
                <div class="row">
                  <div class="col-12 col-lg-7">
                    <div class="block-left">
                      <p class="paragraph">We drive the transition to more sustainable, reliable & affordable energy systems. With our innovative technologies, we energize society, that’s our aim!</p>
                      <p>The increase in extreme weather events and rising sea levels are unmistakable signs of climate change. Roughly 850 million people still live without access to electricity, which is the foundation of sustainable development.</p><a class="btn btn--secondary" href="page-about.html">read more <i class="energia-arrow-right"></i></a>
                    </div>
                  </div>
                  <div class="col-12 col-lg-5">
                    <div class="block-right">
                      <div class="prief-set">
                        <p>How can we meet the growing demand for electricity while protecting our climate & make planet a better place?</p>
                        <ul class="list-unstyled advantages-list">
                          <li>Reliability and performance</li>
                          <li>Just-in-time manufacturing</li>
                          <li>solar material financing</li>
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
        <div class="bg-section"> <img src="{{asset('guest/assets/images/background/2.jpg')}}" alt="Background"/></div>
        <div class="container">
          <div class="heading heading-2 heading-light heading-light2">
            <div class="row">
              <div class="col-12 col-lg-5">
                <p class="heading-subtitle">Sustainable, Reliable & Affordable Energy!</p>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-5">
                <h2 class="heading-title">Providing Value To Our ClientsThrough Ongoing Product & Innovation.</h2>
              </div>
              <div class="col-12 col-lg-6 offset-lg-1">
                <p class="heading-desc">While improving the yield and performance of solar energy products, our PV industry experience enables us to provide in-depth material sourcing, financing and supply chain expertise for every step.</p>
                <p class="heading-desc">Raw polycrystalline silicon for PV manufacturing. Offered in various grades and formats including chunks, chips, powder and ingot.</p>
                <div class="actions-holder"><a class="btn btn--primary btn--inversed" href="page-contact.html">
                     get started<i class="energia-arrow-right"></i></a><a class="btn btn--bordered btn--white" href="page-about.html">explore our plans</a></div>
              </div>
            </div>
            <!-- End .row-->
          </div>
          <!-- End .heading-->
          <div class="carousel owl-carousel carousel-dots" data-slide="4" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
            <div>
              <div class="feature-panel-holder" data-hover="">
                <div class="feature-panel">
                  <div class="feature-icon"><i class="flaticon-024-energy"></i></div>
                  <div class="feature-content">
                    <h4>Save Your Money</h4>
                    <p>Save money on utilities or increase the value of your home by installing solar panels as a great option.</p>
                  </div><a href="page-about.html"><i class="energia-arrow-right"></i> <span>explore more</span> </a>
                </div>
                <!-- End .feature-panel-->
              </div>
            </div>
            <div>
              <div class="feature-panel-holder" data-hover="">
                <div class="feature-panel">
                  <div class="feature-icon"><i class="flaticon-028-greenhouse"></i></div>
                  <div class="feature-content">
                    <h4>Home Is Energy</h4>
                    <p>Everyday the sun provides us with abundance of free energy by placing solar panels on your roof.</p>
                  </div><a href="page-about.html"><i class="energia-arrow-right"></i> <span>explore more</span> </a>
                </div>
                <!-- End .feature-panel-->
              </div>
            </div>
            <div>
              <div class="feature-panel-holder" data-hover="">
                <div class="feature-panel">
                  <div class="feature-icon"><i class="flaticon-026-world"></i></div>
                  <div class="feature-content">
                    <h4>Consult &amp; Planning</h4>
                    <p>Our remote industrial solar systems are designed to reliably power our clients critical.</p>
                  </div><a href="page-about.html"><i class="energia-arrow-right"></i> <span>explore more</span> </a>
                </div>
                <!-- End .feature-panel-->
              </div>
            </div>
            <div>
              <div class="feature-panel-holder" data-hover="">
                <div class="feature-panel">
                  <div class="feature-icon"><i class="flaticon-008-plant"></i></div>
                  <div class="feature-content">
                    <h4>Certified Engineers</h4>
                    <p>Our sales engineers on our staff have experience and can design any complete solar system.</p>
                  </div><a href="page-about.html"><i class="energia-arrow-right"></i> <span>explore more</span> </a>
                </div>
                <!-- End .feature-panel-->
              </div>
            </div>
            <div>
              <div class="feature-panel-holder" data-hover="">
                <div class="feature-panel">
                  <div class="feature-icon"><i class="flaticon-024-energy"></i></div>
                  <div class="feature-content">
                    <h4>Save Your Money</h4>
                    <p>Save money on utilities or increase the value of your home by installing solar panels as a great option.</p>
                  </div><a href="page-about.html"><i class="energia-arrow-right"></i> <span>explore more</span> </a>
                </div>
                <!-- End .feature-panel-->
              </div>
            </div>
            <div>
              <div class="feature-panel-holder" data-hover="">
                <div class="feature-panel">
                  <div class="feature-icon"><i class="flaticon-028-greenhouse"></i></div>
                  <div class="feature-content">
                    <h4>Home Is Energy</h4>
                    <p>Everyday the sun provides us with abundance of free energy by placing solar panels on your roof.</p>
                  </div><a href="page-about.html"><i class="energia-arrow-right"></i> <span>explore more</span> </a>
                </div>
                <!-- End .feature-panel-->
              </div>
            </div>
          </div>
          <!-- End .carousel-->
          <div class="row">
            <div class="col-12 col-lg-4">
              <div class="more-features">
                <p>If you have any questions or need help, feel free to contact with our team, or you can call us any time <a href="tel:01061245741">(002) 01061245741</a></p><a class="btn btn--bordered btn--white" href="page-about.html">
                   free estimate<i class="energia-arrow-right"></i></a>
              </div>
            </div>
            <div class="col-12 col-lg-8">
              <!--
              ============================
              Video #1 Section
              ============================
              -->
              <div class="video video-1 bg-overlay bg-overlay-video" id="video-1">
                <div class="bg-section"><img src="{{asset('guest/assets/images/video/1.jpg')}}" alt="background"/></div><a class="popup-video btn-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4"> <i class="fas fa-play"></i><span>watch our video!</span></a>
                <!-- End .popup-video-->
              </div>
            </div>
          </div>
          <!-- End .row-->
        </div>
        <!-- End .container-->
      </section>
      <!--
      ============================
      services #1 Section
      ============================
      -->
      <section class="services services-1 bg-grey" id="services-1">
        <div class="container">
          <div class="heading heading-3 text-center">
            <div class="row">
              <div class="col-12 col-lg-6 offset-lg-3">
                <p class="heading-subtitle">Energize Society With Sustainable Energy!</p>
                <h2 class="heading-title">A Leading Supplier Of Solar Materials For Manufacturers, Installers & Contractors.</h2>
              </div>
              <!-- End .col-lg-6-->
            </div>
            <!-- End .row-->
          </div>
          <!-- End .heading-->
          <div class="carousel owl-carousel carousel-dots dots-side" data-slide="3" data-slide-rs="1" data-autoplay="true" data-nav="false" data-dots="true" data-space="30" data-loop="true" data-speed="800">
            <div>
              <div class="service-panel">
                <div class="service-icon"><i class="flaticon-004-solar-panel"></i></div>
                <div class="service-content">
                  <h4><a href="services-turbines.html">solar panels<br/>services</a></h4>
                  <p>The great thing about solar panels is that they do not require a lot of maintenance. However, still important to get them checked regularly</p>
                  <ul class="list-unstyled advantages-list">
                    <li>cleaning of inverter</li>
                    <li>perform shading tests</li>
                    <li>90 days repairs warranty</li>
                  </ul><a class="btn btn--secondary" href="services-turbines.html">read more <i class="energia-arrow-right"></i></a>
                </div>
              </div>
              <!-- End .service-panel-->
            </div>
            <div>
              <div class="service-panel">
                <div class="service-icon"><i class="flaticon-039-wind-mill"></i></div>
                <div class="service-content">
                  <h4><a href="services-turbines.html">wind turbines<br/>services</a></h4>
                  <p>Wind turbine is an expensive machine, we know very well how important it is that your wind turbine is always up whenever there is wind.</p>
                  <ul class="list-unstyled advantages-list">
                    <li>proactive is better</li>
                    <li>lower costs for you</li>
                    <li>maintenance warranty</li>
                  </ul><a class="btn btn--secondary" href="services-turbines.html">read more <i class="energia-arrow-right"></i></a>
                </div>
              </div>
              <!-- End .service-panel-->
            </div>
            <div>
              <div class="service-panel">
                <div class="service-icon"><i class="flaticon-013-hydro-power"></i></div>
                <div class="service-content">
                  <h4><a href="services-turbines.html">hydropower plants<br/>services</a></h4>
                  <p>Hydropower systems are capital intensive assets can produce a significant income provided operated and maintained on high standard.</p>
                  <ul class="list-unstyled advantages-list">
                    <li>optimization of assets</li>
                    <li>operation &amp; maintenance</li>
                    <li>digitaliztion &amp; automation</li>
                  </ul><a class="btn btn--secondary" href="services-turbines.html">read more <i class="energia-arrow-right"></i></a>
                </div>
              </div>
              <!-- End .service-panel-->
            </div>
            <div>
              <div class="service-panel">
                <div class="service-icon"><i class="flaticon-004-solar-panel"></i></div>
                <div class="service-content">
                  <h4><a href="services-turbines.html">solar panels<br/>services</a></h4>
                  <p>The great thing about solar panels is that they do not require a lot of maintenance. However, still important to get them checked regularly</p>
                  <ul class="list-unstyled advantages-list">
                    <li>cleaning of inverter</li>
                    <li>perform shading tests</li>
                    <li>90 days repairs warranty</li>
                  </ul><a class="btn btn--secondary" href="services-turbines.html">read more <i class="energia-arrow-right"></i></a>
                </div>
              </div>
              <!-- End .service-panel-->
            </div>
          </div>
          <!-- End .carousel-->
          <div class="more-services">
            <p>Sustainable, reliable & affordable energy systems, <a href="page-services.html">Find Your Solution Now! </a></p>
          </div>
          <!-- End more-services-->
        </div>
        <!-- End .container-->
      </section>
      <!--
      ============================
      Counters #1 Section
      ============================
      -->
      <section class="counters counters-1 bg-overlay bg-overlay-theme2" id="counters-1">
        <div class="bg-section"> <img src="{{asset('guest/assets/images/background/2.jpg')}}" alt="Background"/></div>
        <div class="container">
          <div class="heading heading-4 heading-light heading-light2">
            <div class="row">
              <div class="col-12 col-lg-5">
                <p class="heading-subtitle">Pioneers Of Solar & Renewable Energy!</p>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-5">
                <h2 class="heading-title">Commercial, Residential & Industrial Systems!</h2>
              </div>
              <div class="col-12 col-lg-6 offset-lg-1">
                <p class="heading-desc">Today, our company is one of the most important PV suppliers in the North America and Europe. Our sales offices and warehouses include PV industry experience enables us to provide in-depth material sourcing and supply chain expertise for every step of production and installation process.</p>
                <div class="actions-holder"><a class="btn btn--primary btn--inversed" href="page-contact.html">
                     awards & milestones<i class="energia-arrow-right"></i></a></div>
              </div>
            </div>
            <!-- End .row-->
          </div>
          <!-- End .heading-->
          <div class="row">
            <div class="col-12 col-lg-8">
              <div class="img-hotspot">
                <div class="img-hotspot-wrap">
                  <div class="img-hotspot-bg"> <img src="{{asset('guest/assets/images/background/world-map-dark.png')}}" alt="image"/></div>
                  <div class="img-hotspot-pointers">
                    <div class="img-hotspot-pointer" data-spot-x="29%" data-spot-y="72%">
                      <div class="pointer-icon"></div>
                      <div class="info" data-info-x="" data-info-y="">
                        <div class="border-outer">
                          <div class="border-inner"><i class="flaticon-012-mining-1"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="img-hotspot-pointer" data-spot-x="48%" data-spot-y="48%">
                      <div class="pointer-icon"></div>
                      <div class="info" data-info-x="" data-info-y="">
                        <div class="border-outer">
                          <div class="border-inner"><i class="flaticon-035-battery"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="img-hotspot-pointer" data-spot-x="75%" data-spot-y="17%">
                      <div class="pointer-icon"></div>
                      <div class="info" data-info-x="" data-info-y="">
                        <div class="border-outer">
                          <div class="border-inner"><i class="flaticon-027-energy-tower"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="img-hotspot-pointer" data-spot-x="34%" data-spot-y="9%">
                      <div class="pointer-icon"></div>
                      <div class="info" data-info-x="" data-info-y="">
                        <div class="border-outer">
                          <div class="border-inner"><i class="flaticon-032-recycle"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="img-hotspot-pointer" data-spot-x="59%" data-spot-y="21%">
                      <div class="pointer-icon"></div>
                      <div class="info" data-info-x="" data-info-y="">
                        <div class="border-outer">
                          <div class="border-inner"><i class="flaticon-030-biology"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="img-hotspot-pointer" data-spot-x="68%" data-spot-y="38%">
                      <div class="pointer-icon"></div>
                      <div class="info" data-info-x="" data-info-y="">
                        <div class="border-outer">
                          <div class="border-inner"><i class="flaticon-034-coal"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="img-hotspot-pointer" data-spot-x="15%" data-spot-y="29%">
                      <div class="pointer-icon"></div>
                      <div class="info" data-info-x="" data-info-y="">
                        <div class="border-outer">
                          <div class="border-inner"><i class="flaticon-039-wind-mill"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-3 offset-lg-1">
              <!-- Start .counter-->
              <div class="counter counter-2">
                <div class="counter-num"> <span class="counting" data-counterup-nums="6,154">6,154</span>
                  <h6>projects</h6>
                </div>
                <div class="counter-desc">
                  <p>Yet those that embrace change are thriving, building bigger, better, faster, and stronger products than ever.</p>
                </div>
              </div>
              <!-- End .counter-->
              <!-- Start .counter-->
              <div class="counter counter-2">
                <div class="counter-num"> <span class="counting" data-counterup-nums="2,512">2,512</span>
                  <h6>employees</h6>
                </div>
                <div class="counter-desc">
                  <p>Yet those that embrace change are thriving, building bigger, better, faster, and stronger products than ever.</p>
                </div>
              </div>
              <!-- End .counter-->
            </div>
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
      <section class="testimonial testimonial-1 bg-theme2">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="carousel owl-carousel carousel-nav carousel-dots" data-slide="2" data-slide-rs="1" data-autoplay="true" data-nav="true" data-dots="true" data-space="40" data-loop="true" data-speed="800">
                <div class="testimonial-panel">
                  <div class="testimonial-body">
                    <div class="testimonial-img"> <img src="{{asset('guest/assets/images/testimonial/3.jpg')}}" alt="Testimonial Author"/></div>
                    <div class="testimonial-content">
                      <p>“They were fantastic through the entire purchase process. Had lots of questions and they were patient. When my system arrived, it was well packed and shipping done smoothly with xpo.”</p>
                      <div class="testimonial-meta">
                        <h6>martin hope</h6>
                        <p>pro systems founder</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="testimonial-panel">
                  <div class="testimonial-body">
                    <div class="testimonial-img"> <img src="{{asset('guest/assets/images/testimonial/4.jpg')}}" alt="Testimonial Author"/></div>
                    <div class="testimonial-content">
                      <p>“They helped lead me through the process of system selection, site layout and placing my order. They were very knowledgeable and has provided guidance each step.”</p>
                      <div class="testimonial-meta">
                        <h6>john peter</h6>
                        <p>pro systems founder</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="testimonial-panel">
                  <div class="testimonial-body">
                    <div class="testimonial-img"> <img src="{{asset('guest/assets/images/testimonial/5.jpg')}}" alt="Testimonial Author"/></div>
                    <div class="testimonial-content">
                      <p>“They helped lead me through the process of system selection, site layout and placing my order. They were very knowledgeable and has provided guidance each step.”</p>
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
      </section>
      <!--
      ============================
      Projects Modern #1 Section
      ============================
      -->
      <section class="projects projects-modern projects-modern-1" id="projects-modern-1">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3">
              <div class="heading heading-5 text-center">
                <p class="heading-subtitle">Innovation, Quality And Continuous Improvement</p>
                <h2 class="heading-title">Latest Projects, Solutions And Energy Supplies</h2>
              </div>
            </div>
          </div>
          <!-- End .row-->
          <div class="row">
            <div class="col-12">
              <div class="carousel owl-carousel carousel-dots" data-slide="3" data-slide-rs="1" data-autoplay="true" data-nav="false" data-dots="true" data-space="30" data-loop="true" data-speed="3000">
                            <div>
                              <div class="project-panel" data-hover="">
                                <div class="project-panel-holder">
                                  <div class="project-img"><a class="link" href="projects-single.html"></a><img src="{{asset('guest/assets/images/projects/modern/1.jpg')}}" alt="project image"/></div>
                                  <!-- End .project-img-->
                                  <div class="project-content">
                                    <div class="project-cat"><a href="projects-standard.html">finance</a><a href="projects-standard.html">supply chain</a>
                                    </div>
                                    <div class="project-title">
                                      <h4><a href="projects-single.html">expanding The Solar Supply Chain Finance Program</a></h4>
                                    </div>
                                    <div class="project-desc">
                                      <p>The great thing about solar panels is that they do not requiremaintenance. However, it is still important to get them checked regularly to ensure safe.</p>
                                    </div>
                                    <div class="project-more"> <a class="btn btn--bordered btn--white" href="projects-single.html">explore more <i class="energia-arrow-right"></i></a></div>
                                  </div>
                                  <!-- End .project-content -->
                                </div>
                              </div>
                            </div>
                            <div>
                              <div class="project-panel" data-hover="">
                                <div class="project-panel-holder">
                                  <div class="project-img"><a class="link" href="projects-single.html"></a><img src="{{asset('guest/assets/images/projects/modern/2.jpg')}}" alt="project image"/></div>
                                  <!-- End .project-img-->
                                  <div class="project-content">
                                    <div class="project-cat"><a href="projects-standard.html">energy</a><a href="projects-standard.html">green energy</a>
                                    </div>
                                    <div class="project-title">
                                      <h4><a href="projects-single.html">Addressing Wind Energy Innovation Challenges</a></h4>
                                    </div>
                                    <div class="project-desc">
                                      <p>As wind turbines increase in size &amp; height to capture more energy, and as wind power plants with many turbines spread out over greater areas </p>
                                    </div>
                                    <div class="project-more"> <a class="btn btn--bordered btn--white" href="projects-single.html">explore more <i class="energia-arrow-right"></i></a></div>
                                  </div>
                                  <!-- End .project-content -->
                                </div>
                              </div>
                            </div>
                            <div>
                              <div class="project-panel" data-hover="">
                                <div class="project-panel-holder">
                                  <div class="project-img"><a class="link" href="projects-single.html"></a><img src="{{asset('guest/assets/images/projects/modern/3.jpg')}}" alt="project image"/></div>
                                  <!-- End .project-img-->
                                  <div class="project-content">
                                    <div class="project-cat"><a href="projects-standard.html">eco</a><a href="projects-standard.html">green energy</a>
                                    </div>
                                    <div class="project-title">
                                      <h4><a href="projects-single.html">Smarter Ways to Manage EV Charging Infrastructures</a></h4>
                                    </div>
                                    <div class="project-desc">
                                      <p>If you own an electric vehicle (EV), the recurring question you’ll get is: how easy is it to charge the battery on the road? Clearly, people simply want to get.</p>
                                    </div>
                                    <div class="project-more"> <a class="btn btn--bordered btn--white" href="projects-single.html">explore more <i class="energia-arrow-right"></i></a></div>
                                  </div>
                                  <!-- End .project-content -->
                                </div>
                              </div>
                            </div>
                            <div>
                              <div class="project-panel" data-hover="">
                                <div class="project-panel-holder">
                                  <div class="project-img"><a class="link" href="projects-single.html"></a><img src="{{asset('guest/assets/images/projects/modern/4.jpg')}}" alt="project image"/></div>
                                  <!-- End .project-img-->
                                  <div class="project-content">
                                    <div class="project-cat"><a href="projects-standard.html">eco</a><a href="projects-standard.html">green energy</a>
                                    </div>
                                    <div class="project-title">
                                      <h4><a href="projects-single.html">New Public Attitude Tracker Towards Renewable Energy</a></h4>
                                    </div>
                                    <div class="project-desc">
                                      <p>Government tracks the nation’s changing attitudes towards energy infrastructure closely, with quarterly surveys led by the Department of Business.</p>
                                    </div>
                                    <div class="project-more"> <a class="btn btn--bordered btn--white" href="projects-single.html">explore more <i class="energia-arrow-right"></i></a></div>
                                  </div>
                                  <!-- End .project-content -->
                                </div>
                              </div>
                            </div>
              </div>
            </div>
          </div>
          <!-- End .row-->
        </div>
        <!-- End .container-->
      </section>
      <!--
      ============================
      Clients #1 Section
      ============================
      -->
      <section class="clients clients-carousel clients-1" id="clients-1">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="d-none">Our Clients</h3>
            </div>
            <div class="col-12">
              <div class="carousel owl-carousel" data-slide="6" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="false" data-space="0" data-loop="true" data-speed="250">
                @foreach ($partners as $partner)
                  <div class="client"><a href="{{ $partner->url }}" target="__BLANK"> </a><img src="{{asset($partner->logo)}}" alt="client"/></div>
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
      Contact #1 Section
      ============================
      -->
      <section class="contact contact-1 bg-overlay bg-overlay-theme" id="contact-1">
        <div class="bg-section"><img src="{{asset('guest/assets/images/background/3.jpg')}}" alt="background"/></div>
        <div class="container">
          <div class="contact-panel contact-panel-3">
            <div class="heading heading-light heading-6">
              <p class="heading-subtitle">Improving The Performance Of Solar Energy.</p>
              <h2 class="heading-title">Discover Independence Through Using The Power Of Solar Panels!</h2>
              <p class="heading-desc">We offer products, solutions, and services across the entire energy value chain. We support our customers on their way to a more sustainable future – no matter how far along the journey to energize society with affordable energy systems.</p>
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
              <div class="contact-action"><a class="btn btn--white" href="page-about.html">learn more <i class="energia-arrow-right"></i></a><a class="btn btn--bordered btn--white" href="page-faqs.html">our core values</a></div>
              <div class="contact-quote"> <img src="{{asset('guest/assets/images/icons/noteicon.png')}}" alt="icon"/>
                <p>Receive an accurate quote within 3-5 days when you fill out this form. Or, give us a call: <a href="tel:01061245741">(002) 01061245741</a></p>
              </div>
            </div>
            <div class="contact-card">
              <div class="contact-body">
                <h5 class="card-heading">Request A Quote</h5>
                <p class="card-desc">We take great pride in everything that we do, control over products allows us to ensure our customers receive the best quality service.</p>
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
                      <input class="form-control" type="text" id="contact-usage" name="contact-usage" placeholder="1254 KWH" required=""/>
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
                          <input class="custom-control-input" type="radio" id="customRadioInline1" name="customRadioInline1"/>
                          <label for="customRadioInline1">all</label>
                        </div>
                        <div class="custom-control">
                          <input class="custom-control-input" type="radio" id="customRadioInline2" name="customRadioInline1"/>
                          <label for="customRadioInline2">email</label>
                        </div>
                        <div class="custom-control">
                          <input class="custom-control-input" type="radio" id="customRadioInline3" name="customRadioInline1"/>
                          <label for="customRadioInline3">phone</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn--secondary w-100">submit request <i class="energia-arrow-right"></i></button>
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
      </section>
      <!--
      ============================
      Blog #1 Section
      ============================
      -->
      <section class="blog blog-1 blog-grid" id="blog-1">
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
                    <div class="entry-date"><span class="day">jan 21</span><span class="year">2021</span></div>
                    <!-- End .entry-date		-->
                    <div class="entry-author">
                      <p>mike dolley</p>
                    </div>
                  </div>
                  <div class="entry-title">
                    <h4><a href="blog-single.html">Filing Solar Power Permits in 2020? Consider Following Important Factors</a></h4>
                  </div>
                  <div class="entry-img-wrap">
                    <div class="entry-img"><a href="blog-single.html"><img src="{{asset('guest/assets/images/blog/grid/1.jpg')}}" alt="Filing Solar Power Permits in 2020? Consider Following Important Factors"/></a></div>
                    <div class="entry-category"><a href="blog-grid.html">solar</a><a href="blog-grid.html">insights</a>
                    </div>
                  </div>
                  <!-- End .entry-img-->
                  <div class="entry-bio">
                    <p>All of these factors are important consider when permitting your solar system, and can help streamline your process. Take time to consider these.</p>
                  </div>
                  <div class="entry-more"> <a class="btn btn--white btn-bordered" href="blog-single.html">read more <i class="energia-arrow-right"></i></a></div>
                </div>
              </div>
              <!-- End .entry-content-->
            </div>
            <div class="col-12 col-lg-4">
              <div class="blog-entry" data-hover="">
                <div class="entry-content">
                  <div class="entry-meta">
                    <div class="entry-date"><span class="day">jan 25</span><span class="year">2021</span></div>
                    <!-- End .entry-date		-->
                    <div class="entry-author">
                      <p>peter allan</p>
                    </div>
                  </div>
                  <div class="entry-title">
                    <h4><a href="blog-single.html">How to Add Battery Backup to an Existing Grid Tied Solar System by Yourself!</a></h4>
                  </div>
                  <div class="entry-img-wrap">
                    <div class="entry-img"><a href="blog-single.html"><img src="{{asset('guest/assets/images/blog/grid/2.jpg')}}" alt="How to Add Battery Backup to an Existing Grid Tied Solar System by Yourself!"/></a></div>
                    <div class="entry-category"><a href="blog-grid.html">systems</a><a href="blog-grid.html">battery</a>
                    </div>
                  </div>
                  <!-- End .entry-img-->
                  <div class="entry-bio">
                    <p>Batteries are the most expensive part of a solar system. Between appropriately-size battery bank and a battery-based inverter like the Outback Radian.</p>
                  </div>
                  <div class="entry-more"> <a class="btn btn--white btn-bordered" href="blog-single.html">read more <i class="energia-arrow-right"></i></a></div>
                </div>
              </div>
              <!-- End .entry-content-->
            </div>
            <div class="col-12 col-lg-4">
              <div class="blog-entry" data-hover="">
                <div class="entry-content">
                  <div class="entry-meta">
                    <div class="entry-date"><span class="day">jan 28</span><span class="year">2021</span></div>
                    <!-- End .entry-date		-->
                    <div class="entry-author">
                      <p>Sophia barry</p>
                    </div>
                  </div>
                  <div class="entry-title">
                    <h4><a href="blog-single.html">Energy Department Research Will Help Eagles Coexist with Wind Energy Deployment</a></h4>
                  </div>
                  <div class="entry-img-wrap">
                    <div class="entry-img"><a href="blog-single.html"><img src="{{asset('guest/assets/images/blog/grid/3.jpg')}}" alt="Energy Department Research Will Help Eagles Coexist with Wind Energy Deployment"/></a></div>
                    <div class="entry-category"><a href="blog-grid.html">research</a><a href="blog-grid.html">energy</a>
                    </div>
                  </div>
                  <!-- End .entry-img-->
                  <div class="entry-bio">
                    <p>Batteries are the most expensive part of a solar system. Between appropriately-size battery bank and a battery-based inverter like the Outback Radian.</p>
                  </div>
                  <div class="entry-more"> <a class="btn btn--white btn-bordered" href="blog-single.html">read more <i class="energia-arrow-right"></i></a></div>
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
      </section>
      <!--
      ============================
      Footer #1
      ============================
      -->
@endsection
