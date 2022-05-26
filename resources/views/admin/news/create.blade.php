@extends('admin.partials.main')
@section('breadcrumb')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
    Berita Gambar
    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

    <small class="text-muted fs-7 fw-bold my-1 ms-1"> Tambah Data</small>
</h1>
@endsection

@section('content')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link href="{{ asset('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endpush

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('news.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <h3 class="mb-5">Tambah Data Berita </h3>

                        <div class="col-md-12">
                            <div class="mb-10">
                                <label for="name" class="required form-label">Judul Berita</label> <br>
                                <input type="text" value="{{ old('judul') }}" class=" @error('judul') is-invalid  @enderror form-control form-control" name="judul" />
                                @error('judul')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-md-12">
                            <div class="mb-10">
                                <label for="name" class="required form-label">Penulis</label> <br>
                                <select name="penulis" class="form-select form-select-solid @error('penulis') is-invalid @enderror" data-control="select2" data-placeholder="---Pilih Penulis---">
                                    <option></option>
                                    @foreach ($users as $user)
                                    @if (old('penulis')== $user->id)
                                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                    @else
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('penulis')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div> --}}




                        {{-- <div class="col-md-10">
                            <div class="mb-10">
                                <label for="deskripsi" class="required form-label">Isi </label> <br>
                                <textarea name="deskripsi" id="deskripsi"  class="@error('deskripsi') is-invalid  @enderror form-control form-control" cols="30" rows="5">
                                    {{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="mb-10">
                                <label for="deskripsi" class="required form-label">Isi Berita </label> <br>
                                <textarea name="deskripsi" id="summernote"  class="@error('deskripsi') is-invalid  @enderror form-control" style="height: 300px" >
                                    {{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="mb-10">
                                <label for="img" class=" form-label">Foto Dokumentasi <small>(Dapat upload lebih dari 1 foto)</small></label> <br>
                                <input type="file" class=" @error('gambar') is-invalid  @enderror form-control form-control-solid" name="gambar[]"   accept="image/*" id="gallery-photo-add" multiple />
                                <div class="gallery"></div>
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
<script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>



$(document).ready(function() {
    var imagesPreview = function(input, placeToInsertImagePreview) {
if (input.files) {
    var filesAmount = input.files.length;

    for (i = 0; i < filesAmount; i++) {
        var reader = new FileReader();

        reader.onload = function(event) {
            $($.parseHTML('<img>')).attr('src', event.target.result).addClass('img-multiple').appendTo(placeToInsertImagePreview);
        }

        reader.readAsDataURL(input.files[i]);
    }
}

};
        $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
        });
    $('#summernote').summernote({
        height:'200px',
        callbacks:{
            onImageUpload: function (image) {
                  uploadImage(image[0]);
            },
            onMediaDelete : function (target) {
                  deleteImage(target[0].dataset.filename);
            }
        }
    });
  });
    function uploadImage(image) {
        var data = new FormData();
        data.append("image",image)
        $.ajax({
          headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            type: "POST",
            url: '{{ route("editor.fileUpload") }}',
            data: data,
            cache: false,
              contentType: false,
              processData: false,
            success: function (res) {

              $('#summernote').summernote("insertImage",res.url,res.fileName);
            },
            error: function (data) {
              console.log(data);
              }
        });
      }

      function deleteImage(filename) {
          $.ajax({
              headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
              type: "POST",
              url: '{{ route("editor.fileDelete")}}',
              data: {filename:filename,
              },
              cache: false,
              success: function (response) {
                  console.log(response);
              },
              error: function (data) {
                  console.log(data);
              }
          });
      }

</script>

@endpush
