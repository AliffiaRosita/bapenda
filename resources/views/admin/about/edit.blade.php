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
                        <form action="{{ route('about.update', ['about' => $about]) }}" enctype="multipart/form-data"
                            method="post" id="form-edit-about">
                            @csrf
                            @method('put')
                            <h3 class="mb-5">Ubah Data {{ $title }}</h3>
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="judul" class="required form-label">Judul</label> <br>
                                    <input type="text" value="{{ old('judul', $about->title) }}"
                                        class=" @error('judul') is-invalid  @enderror form-control form-control"
                                        name="judul" />
                                    @error('judul')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="judul" class="required form-label">Sub Judul</label> <br>
                                    <input type="text" value="{{ old('sub_judul', $about->sub_title) }}"
                                        class=" @error('sub_judul') is-invalid  @enderror form-control form-control"
                                        name="sub_judul" />
                                    @error('sub_judul')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="deskripsi" class="required form-label">Deskripsi</label> <br>
                                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid  @enderror" data-kt-autosize="true">{{ old('deskripsi', $about->desc) }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="judul" class="form-label">Poin Poin tentang kami</label> <br>
                                    <input type="hidden" name="points">
                                    <div id="kt_repeater_1">
                                        <div data-repeater-list="" class="col-lg-10 ">
                                            @foreach ($about->points as $point)
                                                <div data-repeater-item="" class="form-group row align-items-center mb-3">
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Masukkan"
                                                          name="name"  value="{{$point['name']}}" />
                                                        <div class="d-md-none mb-2"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="javascript:;" data-repeater-delete=""
                                                            class="btn btn-sm font-weight-bolder btn-light-danger">
                                                            <i class="la la-trash-o"></i>Delete</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-lg-4">
                                                <a href="javascript:;" data-repeater-create=""
                                                    class="btn btn-sm font-weight-bolder btn-light-primary">
                                                    <i class="la la-plus"></i>Tampbah</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Gambar </label>
                                    <small>(Kosongkan Input bila tidak mengubah gambar)</small><br>
                                    <img id="imgThumb" src="{{ asset($about->image) }}" style="width:200px"
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"
        integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                imgThumb.src = URL.createObjectURL(file)
            }
        }
        // Class definition
        var KTFormRepeater = function() {

            // Private functions
            var demo1 = function() {
                $('#kt_repeater_1').repeater({
                    initEmpty: false,
                    show: function() {
                        $(this).slideDown();
                    },
                    hide: function(deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });

                $('#form-edit-about').on("submit", function (e) {
                    e.preventDefault();
                    var data = $('#kt_repeater_1').repeaterVal()
                    console.log(Object.values(data)[0]);
                    $("[name='points']").val(JSON.stringify(Object.values(data)[0]))
                    e.currentTarget.submit();
                });

            }

            return {
                // public functions
                init: function() {
                    demo1();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTFormRepeater.init();
        });
    </script>
@endpush
