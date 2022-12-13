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
                title="klik untuk mengubah informasi kontak">
                <a href="{{ route('contact.edit', ['contact' => $contact]) }}" class="btn btn-light-primary">
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
                            <td>Email</td>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>{{ $contact->phone_number }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{ $contact->address }}</td>
                        </tr>
                        <tr>
                            <td>Facebook</td>
                            <td><a href="{{ $contact->facebook }}" target="__BLANK">{{ $contact->facebook }}</a></td>
                        </tr>
                        <tr>
                            <td>Instagram</td>
                            <td><a href="{{ $contact->instagram }}" target="__BLANK">{{ $contact->instagram }}</a></td>
                        </tr>
                        <tr>
                            <td>Twitter</td>
                            <td><a href="{{ $contact->twitter }}" target="__BLANK">{{ $contact->twitter }}</a></td>
                        </tr>
                        <tr>
                            <td>Youtube</td>
                            <td><a href="{{ $contact->youtube }}" target="__BLANK">{{ $contact->youtube }}</a></td>
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
