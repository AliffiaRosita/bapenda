<header class="header header-light header-topbar header-topbar1 header-shadow" id="navbar-spy">
    <div class="top-bar">
        <div class="block-left">
            <div class="top-contact">
                <div class="contact-infos">
                    <div class="contact-body">
                        <p>Jl. Mayjend. M.T Haryono, Samarinda. Telp. (0541) 734969, Fax. 731208 |
                            bapenda@kaltimprov.go.id</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-right">
            <!-- Start .social-links-->
            <div class="social-links">
                <a class="share-facebook" href="javascript:void(0)"><i class="energia-facebook"></i></a>
                <a class="share-twitter" href="javascript:void(0)"><i class="energia-twitter"></i></a>
            </div>
            <!-- End .social-links-->
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-sticky" style="padding-left: 10px" id="primary-menu"><a
            class="navbar-brand" style="padding-right: 10px" href="{{url('/beranda')}}">
            <img class="logo logo-dark w-100" src="{{asset('img/logo-bapenda.png')}}" alt="Energia Logo" /><img
                class="logo logo-mobile w-100" src="{{asset('img/logo-bapenda.png')}}" alt="Energia Logo" /></a>
        <div class="module-holder module-holder-phone">

            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item {{ Request::is('beranda') ? 'active' : '' }}" id="contact" data-hover=""><a
                        href="{{route('beranda')}}"><span>Beranda</span></a></li>
                <li class="nav-item has-dropdown {{request()->segment(1) == 'profil' ?'active': ''}}" data-hover=""><a class="dropdown-toggle" href="#"
                        data-toggle="dropdown"><span>Profil</span></a>
                    {{-- @dd($navProfiles) --}}
                    <ul class="dropdown-menu">
                        @if ($navProfiles)
                        @foreach ($navProfiles as $item)
                        <li class="nav-item {{request()->segment(2) == $item->slug ?'current': ''}}"><a
                                href="{{route('profile',['profile'=>$item])}}"><span>{{$item->title}}</span></a></li>
                        @endforeach
                        @endif

                    </ul>
                </li>
                <li class="nav-item has-dropdown {{request()->segment(1) == 'service' ?'active': ''}}" data-hover=""><a class="dropdown-toggle" href="#"
                        data-toggle="dropdown"><span>Program & Layanan</span></a>
                    <ul class="dropdown-menu">
                        @foreach ($navServices as $service)
                        <li class="nav-item dropdown-cus has-dropdown" data-hover=""><a data-toggle="dropdown" href="{{route('service',['service'=>$service->slug])}}"
                            >
                            <span>{{$service->title}}</span></a>
                            <div class="dropdown-content">
                               @foreach ($service->serviceLists as $list)
                               <a href="{{route('service.detail',['service'=>$list])}}">{{$list->title}}</a>
                               @endforeach
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item has-dropdown {{request()->segment(1) == 'data' ?'active': ''}}" id="departments" data-hover=""><a class="dropdown-toggle"
                        href="page-services.html" data-toggle="dropdown"><span>Data</span></a>
                    @if ($navData)
                    <ul class="dropdown-menu">
                        @foreach ($navData as $item)
                        <li class="nav-item {{request()->segment(2) == $item->slug ?'current': ''}}"><a href="{{route('data',['data'=>$item])}}">{{$item->title}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                <li class="nav-item has-dropdown {{request()->segment(1) == 'law' ?'active': ''}}" data-hover=""><a class="dropdown-toggle" href="#"
                        data-toggle="dropdown"><span>Produk Hukum</span></a>
                    @if ($navLaws)
                    <ul class="dropdown-menu">
                        @foreach ($navLaws as $item)
                        <li class="nav-item {{request()->segment(2) == $item->slug ?'current': ''}}"><a href="{{route('law',['law'=>$item])}}">{{$item->title}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                <li class="nav-item has-dropdown {{request()->segment(1) == 'report' ?'active': ''}}" data-hover=""><a class="dropdown-toggle" href="#"
                        data-toggle="dropdown"><span>Laporan Berkala</span></a>
                    @if ($navReport)
                    <ul class="dropdown-menu">
                        @foreach ($navReport as $item)
                        <li class="nav-item {{request()->segment(2) == $item->slug ?'current': ''}}"><a href="{{route('report',['report'=>$item])}}">{{$item->title}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                <li class="nav-item has-dropdown {{request()->segment(1) == 'info' || request()->segment(1) == 'berita' || request()->segment(1) == 'berita-video'?'active': ''}}" data-hover=""><a class="dropdown-toggle" href="#"
                        data-toggle="dropdown"><span>Informasi</span></a>
                    <ul class="dropdown-menu">
                        @if ($navInfo)
                        <li class="nav-item {{request()->segment(1) == 'berita' ?'current': ''}}"><a href="{{route('news.guest.index')}}">Berita</a></li>
                        <li class="nav-item {{request()->segment(1) == 'berita-video' ?'current': ''}}"><a href="{{route('news-video.guest.index')}}">Berita Vidio</a></li>
                        @foreach ($navInfo as $item)
                        <li class="nav-item {{request()->segment(2) == $item->slug ?'current': ''}}"><a href="{{route('info',['info'=>$item])}}">{{$item->title}}</a></li>
                        @endforeach
                        @endif
                    </ul>
                </li>
                <li class="nav-item has-dropdown {{request()->segment(1) == 'ppid' ?'active': ''}}" data-hover=""><a class="dropdown-toggle" href="#"
                        data-toggle="dropdown"><span>Layanan PPID</span></a>
                    @if ($navPpid)
                    <ul class="dropdown-menu">
                        @foreach ($navPpid as $item)
                        <li class="nav-item {{request()->segment(2) == $item->slug ?'current': ''}}"><a href="{{route('ppid',['ppid'=>$item])}}">{{$item->title}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                <li class="nav-item {{ Request::is('kontak') ? 'active' : '' }}" id="contact" data-hover=""><a
                        href="{{route('contact')}}"><span>Kontak</span></a></li>
            </ul>
            <!--  End .module-holder-->
        </div>
        <!--  End .navbar-collapse-->
    </nav>
    <!--  End .navbar-->
</header>
