@extends('admin.partials.main')
@section('breadcrumb')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
    {{ $title }}
    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

    <small class="text-muted fs-7 fw-bold my-1 ms-1"> Tambah Data </small>
</h1>
@endsection

@section('content')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('ppid.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <h3 class="mb-5">Tambah Data {{ $title }} </h3>

                        <div class="col-md-12">
                            <div class="mb-10">
                                <label for="name" class="required form-label">Nama </label> <br>
                                <input type="text" value="{{ old('nama') }}" class=" @error('nama') is-invalid  @enderror form-control form-control" name="nama" />
                                @error('nama')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-10">
                                <label for="type" class="required form-label">Tipe </label> <br>
                                 <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid mb-5">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3 " name="type"   {{ $errors->any() ? old('type') == 'article' ? 'checked':'disabled':'' }}  type="radio" value="article" id="type1" />
                                    <!--end::Input-->

                                    <!--begin::Label-->
                                    <label class="form-check-label" for="type1">
                                        <div class=" text-gray-800">Artikel</div>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Radio-->
                                <div class="form-check form-check-custom form-check-solid mb-5">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3"  {{ $errors->any() ? old('type') == 'file' ? 'checked':'disabled':'' }}  required name="type" type="radio" value="file" id="type2" />
                                    <!--end::Input-->

                                    <!--begin::Label-->
                                    <label class="form-check-label" for="type2">
                                        <div class=" text-gray-800">Upload File</div>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Radio-->
                                @error('type')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>



                        <div id="content-article">

                        </div>

                        <div class="parent-upload">

                            <div id="content-upload">

                            </div>
                        </div>

                        {{-- validasi article --}}
                        @if ($errors->any() && old('type')== 'article')
                        <div class="row mb-5">

                            <div class="col-md-12">
                                <div class="mb-10" >
                                     <label for="isi" class="required form-label">Isi Artikel</label> <br>
                                        <textarea name="isi" id="summernote"  required class=" form-control" style="height: 300px" >{{ old('isi') }} </textarea>
                                        @error('isi')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                        </div>
                        </div>
                        @endif
                        {{-- validasi file --}}
                        @if ($errors->any() && old('type')== 'file')

                            <div class="row mb-5">
                                <div class="col-md-5">
                                    <label for="file" class="required form-label">file Layanan</label> <br>
                                    <small>Format file (pdf) dan maksimal ukuran file 3 mb</small>
                                    </div>
                                    <div class=" offset-md-4 col-md-3">
                                        <a href="" id="add-file" class="btn btn-success btn-sm"><i class="bi bi-plus-lg"></i>Tambah File</a>
                                    </div>
                                    </div>
                                    @php
                                        $countFile = count(old('nama_berkas'));

                                    @endphp
                                    @for ($i = 0; $i < $countFile; $i++)
                                    @php
                                         $indexFile = 'file.'.$i;
                                    @endphp
                                        <div class="row">
                                            <div class="col-md-5">
                                            <input type="text" required value="{{ old('nama_berkas')[$i] }}"  placeholder="Nama Berkas" required class=" @error('nama_berkas'[$i]) is-invalid @enderror form-control " name="nama_berkas[]" />

                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-9" >
                                                <input type="file" name="file[]" id="file" accept="application/pdf" class="form-control">
                                                @error($indexFile)
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        @if ($i >0)
                                        <div class="col-md-1">
                                            <a href="#" id="remove-file-{{ $i }}"  class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></a>
                                        </div>
                                        @endif
                                    </div>


                            @endfor
                            <div id="another-file"></div>
                        @endif


                        <div class="col-md-3 me-auto ms-auto d-block">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>



$(document).ready(function() {
    var i = 0;
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
    })
   $('input[type=radio][name=type]').change(function(){
   if (this.value == 'article') {
            $('#content-upload').hide();
            $('input[type=text]').removeAttr('required');
            $('input[type=file]').removeAttr('required');
            $('#content-article').html(`
            <div class="col-md-12">
                <div class="mb-10" >
                     <label for="isi" class="required form-label">Isi Artikel</label> <br>
                        <textarea name="isi" id="summernote"  class=" form-control" style="height: 300px" ></textarea>

            </div>
        </div>

            `).show();

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
        }


    else if (this.value == 'file') {
        $('#content-article').hide();
        $('input[type=text]').attr('required');
        $('input[type=file]').attr('required');

        $('#content-upload').html(`
        <div class="row mb-5">
            <div class="col-md-5">
                <label for="file" class="required form-label">file Layanan</label> <br>
                <small>Format file (pdf) dan maksimal ukuran file 3 mb</small>
                </div>
                <div class=" offset-md-4 col-md-3">
                    <a href="" id="add-file" class="btn btn-success btn-sm"><i class="bi bi-plus-lg"></i>Tambah File</a>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                    <input type="text" required   placeholder="Nama Berkas" class=" form-control " name="nama_berkas[]" />

                </div>
                <div class="col-md-6">
                    <div class="mb-9" >
                        <input type="file" required name="file[]" id="file" accept="application/pdf" class="form-control">

                    </div>
                </div>

            </div>
            <div id="another-file">

            </div>`).show();
        $('#add-file').click(function (e) {
            e.preventDefault();
            $('#another-file').append(`<div class="row">
                <div class="col-md-5">
                    <input type="text" required   placeholder="Nama Berkas" class=" form-control " name="nama_berkas[]" />

                </div>
                                        <div class="col-md-6">
                                            <div class="mb-9" >
                                                <input type="file" name="file[]" id="file" accept="application/pdf" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="#" id="remove-file-${i}"  class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></a>
                                        </div>
                                    </div>`);

                                    $(`#remove-file-${i}`).click(function(e){
                                        e.preventDefault();
                                        $(this).parentsUntil('#another-file').remove();
                                     });
                                     i=i+1;

        });


    }
     });
     $('#add-file').click(function (e) {
            e.preventDefault();
            $('#another-file').append(`<div class="row">
                <div class="col-md-5">
                    <input type="text" required   placeholder="Nama Berkas" class=" form-control " name="nama_berkas[]" />

                </div>
                                        <div class="col-md-6">
                                            <div class="mb-9" >
                                                <input type="file" name="file[]" id="file" accept="application/pdf" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="#" id="remove-file-${i}"  class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></a>
                                        </div>
                                    </div>`);

                                    $(`#remove-file-${i}`).click(function(e){
                                        e.preventDefault();
                                        $(this).parentsUntil('#another-file').remove();
                                     });
                                     i=i+1;

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

              console.log(res.fileName);
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

      $('form').submit(function (e) {
        var  radio = $('input[type=radio][name=type]:checked').val();

          if (radio == 'article') {
        if($('#summernote').summernote('isEmpty')) {
            alert('isi layanan wajib diisi ');

            // cancel submit
            e.preventDefault();
        }else{
             $('form').submit()
        }
          }
      });




</script>

@endpush
