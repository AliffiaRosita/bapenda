@extends('guest.partials.main')
@push('css')
    <link rel="stylesheet" href="{{asset('guest/assets/css/vendor/font')}}">
@endpush
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
                        <h1 class="title-heading">{{$data->title}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb-wrap">
        <div class="container">
            <ol class="breadcrumb d-flex">
                <li class="breadcrumb-item"><a href="index.html">Data</a></li>
                <li class="breadcrumb-item"><a href="">{{$data->title}}</a></li>
            </ol>
            <!-- End .row-->
        </div>
    </div>
    <!-- End .container-->
</section>
 <section class="about about-3" id="about-3">
        <div class="container">
            @if ($data->type === 'article')
                {!! $dataArticle->desc!!}
            @else
            <table class="table table-striped table-hover text-center">
                <tr class=" table-success">
                    <th>No</th>
                    <th width="70%">Nama File</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($dataFile as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->title}}</td>
                    <td><a href="{{route('download.file',['file'=>$item->file,'fileName'=> $item->title])}}" target="_blank" style="height:40px;width:40px" class="button-success"><i class="fas fa-download"></i></a></td>
                </tr>
                @endforeach
            </table>
            @endif
        </div>
</section>
@endsection
