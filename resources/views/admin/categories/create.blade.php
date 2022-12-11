@extends('admin.partials.main')
@section('breadcrumb')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
        Kategori
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

        <small class="text-muted fs-7 fw-bold my-1 ms-1"> Tambah Data</small>
    </h1>
@endsection

@section('content')
    @push('css')
        <link href="{{ asset('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('category.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <h3 class="mb-5">Tambah Data Kategori </h3>
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="name" class="required form-label">Nama Kategori</label> <br>
                                    <input type="text" value="{{ old('nama') }}"
                                        class=" @error('nama') is-invalid  @enderror form-control form-control"
                                        name="nama" />
                                    @error('nama')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
@endpush
