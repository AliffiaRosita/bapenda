@extends('admin.partials.main')
@section('breadcrumb')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
    {{ $title }}
    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

    <small class="text-muted fs-7 fw-bold my-1 ms-1"> Ubah Data </small>
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
                    <form action="{{ route('profile.update',$profile) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('put')
                        <h3 class="mb-5">Ubah Data {{ $title }} </h3>

                        <div class="col-md-12">
                            <div class="mb-10">
                                <label for="name" class="required form-label">Judul</label> <br>
                                <input type="text" placeholder="cth: visi & misi" value="{{ old('judul',$profile->title) }}" class=" @error('judul') is-invalid  @enderror form-control form-control" name="judul" />
                                @error('judul')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-10">
                                <label for="konten" class="required form-label">Konten Profil</label> <br>
                                <textarea name="konten" id="summernote"  class="@error('konten') is-invalid  @enderror form-control" style="height: 300px" >
                                    {{ old('konten',$profile->desc) }}</textarea>
                                @error('konten')
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
