@extends('admin.partials.main')
@section('breadcrumb')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
    {{ $title }}
    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

    <small class="text-muted fs-7 fw-bold my-1 ms-1"> Tambah Data</small>
</h1>
@endsection

@section('content')

<div class="card mb-5 mb-xl-10">
    
    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form id="kt_account_profile_details_form" class="form"  method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
            @csrf
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">Foto Profil</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset("admin/assets/media/avatars/blank.png")}}')">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset("admin/assets/media/avatars/blank.png")}}')"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ubah Foto">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="foto" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="cancel">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                           
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Format foto: png, jpg, jpeg.</div>
                        <!--end::Hint-->
                    </div>
                </div>
                    <!--end::Col-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama Lengkap</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="nama" class="  @error('nama') is-invalid  @enderror form-control form-control-lg form-control-solid"  value="{{ old('nama') }}" />
                            @error('nama')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Alamat Email</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="email"  name="email" class=" @error('email') is-invalid  @enderror  form-control form-control-lg form-control-solid"  value="{{ old('email') }}" />
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label  fw-bold fs-6 required">Password </label>
                        
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="password"  name="password" class=" @error('password') is-invalid  @enderror  form-control form-control-lg form-control-solid"  />
                            <div class="form-text">Minimal 6 karakter</div>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="text-center">

                        <button type="submit" class="btn btn-info">Kirim</button>
                    </div>
@endsection