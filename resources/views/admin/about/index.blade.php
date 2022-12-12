@extends('admin.partials.main')

@section('breadcrumb')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
        {{ $title }}
        {{-- <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

    <small class="text-muted fs-7 fw-bold my-1 ms-1"> home</small> --}}
    </h1>
@endsection

@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}">
    @endpush
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Detail {{ $title }}</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                title="klik untuk mengubah informasi tentang kami">
                <a href="{{ route('about.edit', ['about' => $about]) }}" class="btn btn-light-primary">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                    fill="#000000" fill-rule="nonzero"
                                    transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15"
                                    height="2" rx="1" />
                            </g>
                        </svg>
                    </span>
                    Ubah data</a>

            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed gy-5 table-striped" id="kt_table_users_login_session">
                    <!--begin::Table body-->
                    <tbody class="fs-6 fw-bold text-gray-600">
                        <tr>
                            <td width="35%">Gambar</td>
                            <td>
                                @php
                                    $image = str_replace('\\', '/', $about->image);
                                @endphp
                                <!--begin::Overlay-->
                                <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                    href="{{ asset($about->image) }}">
                                    <!--begin::Image-->
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-125px"
                                        style="background-image:url('{{ asset($image) }} ') ">
                                    </div>
                                    <!--end::Image-->

                                    <!--begin::Action-->
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                        <i class="bi bi-eye-fill text-white fs-3x"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td>{{ $about->title }}</td>
                        </tr>
                        <tr>
                            <td>Sub Judul</td>
                            <td>{{ $about->sub_title }}</td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>{{ $about->desc }}</td>
                        </tr>

                        <tr>
                            <td>Poin-poin</td>
                            <td>
                                <div class="timeline-label">
                                    @foreach ($about->points as $point)

                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-success fs-1"></i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Text-->
                                        <div class="fw-mormal timeline-content text-muted ps-3">{{$point['name']}}</div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
        </div>
        @push('js')
            <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
            <script>
                $('#partnerTable').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json",
                        "lengthMenu": "Show _MENU_",
                    },
                    "dom": "<'row'" +
                        "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                        ">" +

                        "<'table-responsive'tr>" +

                        "<'row'" +
                        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                        ">"
                });
            </script>
        @endpush
    @endsection
