@extends('admin.partials.main')
@section('breadcrumb')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
    Layanan
    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

    <small class="text-muted fs-7 fw-bold my-1 ms-1"> Tambah Data</small>
</h1>
@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('service.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <h3 class="mb-5">Tambah Data Layanan</h3>

                        <div class="col-md-7">
                            <div class="mb-10">
                                <label for="name" class="required form-label">Nama Layanan</label> <br>
                                <input type="text" value="{{ old('nama') }}" class=" @error('nama') is-invalid  @enderror form-control form-control" name="nama" />
                                @error('nama')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-10">
                                <label for="deskripsi" class="required form-label">Deskripsi </label> <br>
                                <textarea name="deskripsi" id="deskripsi" class="@error('deskripsi') is-invalid  @enderror form-control form-control" cols="30" rows="5">
                                    {{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-10">
                                <label for="url" class="required form-label">URL Website</label> <br>
                                <input type="text" name="url" value="{{ old('url') }}" id="url" class="@error('url') is-invalid  @enderror form-control form-control" placeholder="https://example.com" >
                                @error('url')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-10">
                                <label for="img" class="required form-label">Gambar Layanan</label> <br>
                                <img id="imgThumb" src="{{ asset('admin/assets/media/illustrations/sigma-1/4.png') }}" style="width:200px" alt="institution" />
                                <input type="file" class=" @error('gambar') is-invalid  @enderror form-control form-control-solid" name="gambar"  id="imgInp" accept="image/*" />
                                @error('gambar')
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
