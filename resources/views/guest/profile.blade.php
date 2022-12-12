@extends('guest.partials.main')
@section('content')
<!--
============================
PageTitle #2 Section
============================
-->
<section class="page-title page-title-2 " id="page-title">
    <div class="page-title-wrap bg-overlay bg-overlay-dark-2" style="height: 300px;">
        <div class="bg-section"><img src="{{asset('img/gedung-blur.jpg')}}"  alt="Background" /></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <div class="title">
                        <h1 class="title-heading">{{$profile->title}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb-wrap">
        <div class="container">
            <ol class="breadcrumb d-flex">
                <li class="breadcrumb-item"><a href="index.html">Profil</a></li>
                <li class="breadcrumb-item"><a href="">{{$profile->title}}</a></li>
            </ol>
            <!-- End .row-->
        </div>
    </div>
    <!-- End .container-->
</section>
 <section class="about about-3" style="padding-top:50px" id="about-3">
        <div class="container">
            {!!$profile->desc!!}
        </div>
</section>
@endsection
