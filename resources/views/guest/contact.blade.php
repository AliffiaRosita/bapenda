@extends('guest.partials.main')
@push('css')
@endpush
@section('content')
<!--
      ============================
      Google Map Section
      ============================
      -->
      <section class="map map-2">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="d-none">Peta Kantor Kami</h3>
            </div>
          </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.4184947632041!2d117.12337797729894!3d-0.48736874133304353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67ee101204d39%3A0x7da5d57425857373!2sBADAN%20PENDAPATAN%20DAERAH%20PROVINSI%20KALIMANTAN%20TIMUR!5e0!3m2!1sid!2sid!4v1671097420482!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </section>
      <!--
      ============================
      Testimonials #5 Section
      ============================
      -->
      <section class="testimonial testimonial-5 bg-overlay bg-overlay-white2">
        <div class="bg-section"><img src="{{asset('guest/assets/images/background/wavy-pattern.png')}}" alt="background"/></div>
        <div class="container">
          <div class="contact-panel contact-panel-2">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3">
                  <div class="heading heading-16 text-center">
                    <p class="heading-subtitle">Badan Pendapatan Daerah Provinsi Kalimantan Timur</p>
                    <h2 class="heading-title">Kontak Kami</h2>
                  </div>
                </div>
              </div>
            {{-- <div class="row">
              <div class="col-12 col-lg-4 img-card-holder">
                <div class="img-card img-card-2 bg-overlay bg-overlay-theme">
                  <div class="bg-section">
                    <img src="{{asset('guest/assets/images/contact/2.jpg')}}" alt="image"/>
                </div>
                <div class="card-content">
                    <div class="content-top">
                          <img class="mb-4" src="{{asset('service-images/mall.png')}}" style="width: 65px" alt="">

                      <div >
                          <h4 style="color: white">Alamat</h4>
                        <p style="color: white">aa</p>
                      </div>
                  </div>
                </div>
              </div>
            </div> --}}
            <div class="row">
              <div class="col-12 col-lg-4 ">
                <div class="card bg-success">
                    <div class="card-body">
                        <img class="mb-4 mx-auto d-block m-2" src="{{asset('guest/assets/images/icons/location-pin.png')}}" style="width: 65px" alt="">

                      <div class="text-center">
                          <h4 style="color: white">Alamat</h4>
                        <p style="color: white">{{$contact->address}}</p>
                      </div>
                    </div>
                </div>
              </div>
              <div class="col-12 col-lg-4 ">
                <div class="card bg-success">
                    <div class="card-body">
                        <img class="mb-4 mx-auto d-block m-2" src="{{asset('guest/assets/images/icons/gmail.png')}}" style="width: 65px" alt="">

                      <div class="text-center">
                          <h4 style="color: white">Email</h4>
                        <p style="color: white">{{$contact->email}}</p>
                      </div>
                    </div>
                </div>
              </div>
              <div class="col-12 col-lg-4 ">
                <div class="card bg-success">
                    <div class="card-body">
                        <img class="mb-4 mx-auto d-block m-2" src="{{asset('guest/assets/images/icons/phone-call.png')}}" style="width: 65px" alt="">

                      <div class="text-center">
                          <h4 style="color: white">Nomor Telepon</h4>
                        <p style="color: white">{{$contact->phone_number}}</p>
                      </div>
                    </div>
                </div>
              </div>
            <!-- End .row-->
          </div>
          <!-- End .contact-panel-->
        </div>
        <!-- End .container-->
      </section>
@endsection
