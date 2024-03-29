@extends('admin.partials.main')
@section('breadcrumb')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
        {{ $title }}
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

        <small class="text-muted fs-7 fw-bold my-1 ms-1"> Ubah Data</small>
    </h1>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('partner.update', ['partner' => $partner]) }}"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            @method('put')
                            <h3 class="mb-5">Ubah Data {{ $title }}</h3>
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="nama" class="required form-label">Nama Partner</label> <br>
                                    <input type="text" value="{{ old('nama', $partner->name) }}"
                                        class=" @error('nama') is-invalid  @enderror form-control form-control"
                                        name="nama" />
                                    @error('nama')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="url" class="required form-label">Url/Link Partner</label> <br>
                                    <input type="text" value="{{ old('url', $partner->url) }}"
                                        class=" @error('url') is-invalid  @enderror form-control form-control"
                                        name="url" />
                                    @error('url')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Logo </label>
                                    <small>(Kosongkan Input bila tidak mengubah logo)</small><br>
                                    <img id="imgThumb" src="{{ asset($partner->logo) }}" style="width:200px"
                                        alt="banner" />
                                    <input type="file"
                                        class=" @error('image') is-invalid  @enderror form-control form-control-solid"
                                        name="image" id="imgInp" accept="image/*" />
                                    @error('image')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 me-auto ms-auto d-block">
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
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                imgThumb.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
