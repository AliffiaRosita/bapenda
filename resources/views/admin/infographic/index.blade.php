@extends('admin.partials.main')

@section('breadcrumb')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
    {{ $title }}
    {{-- <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

    <small class="text-muted fs-7 fw-bold my-1 ms-1"> home</small> --}}
</h1>
@endsection

@section('content')

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Data {{ $title }}</span>
        </h3>
        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="klik untuk menambah infografis">
            <a href="{{ route('infographic.create') }}" class="btn btn-light-primary">
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                    </svg>
                </span>
                Tambah data</a>

        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted">
                        <th>No</th>
                        <th width="40%" >Gambar</th>
                        <th  >Keterangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @if (count($infographics)>0)
                    @foreach ($infographics as $key=> $infographic)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                            @php
                            $image=str_replace('\\','/',$infographic->img);
                        @endphp
                            <!--begin::Overlay-->
                            <a class="d-block overlay" data-fslightbox="lightbox-basic" href="{{ asset($infographic->img) }}">
                                <!--begin::Image-->
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-125px"
                                    style="background-image:url('{{ asset($image )}} ') ">
                                </div>
                                <!--end::Image-->

                                <!--begin::Action-->
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                    <i class="bi bi-eye-fill text-white fs-3x"></i>
                                </div>
                                <!--end::Action-->
                            </a>
                        </td>
                        <td>{{ $infographic->caption }}</td>
                        <td class="text-center">
                            <a href="{{ route('infographic.edit',['infographic'=>$infographic]) }}" class="btn btn-light-success btn-sm">Ubah</a>
                            <form  method="post" class="d-inline" onsubmit="btnDelete('infographic',{{ $infographic->id }})">
                                @csrf
                                @method('delete')
                                <button class="btn btn-light-danger btn-sm" >Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3" class="text-center"> Tidak ada data </td>
                    </tr>
                    @endif

                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
</div>
    @endsection



