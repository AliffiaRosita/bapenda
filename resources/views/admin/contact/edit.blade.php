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
                        <form action="{{ route('contact.update', ['contact' => $contact]) }}" enctype="multipart/form-data"
                            method="post" id="form-edit-contact">
                            @csrf
                            @method('put')
                            <h3 class="mb-5">Ubah Data {{ $title }}</h3>
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="email" class="required form-label">email</label> <br>
                                    <input type="email" value="{{ old('email', $contact->email) }}"
                                        class=" @error('email') is-invalid  @enderror form-control form-control"
                                        name="email" />
                                    @error('email')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="judul" class="required form-label">Nomor Telepon</label> <br>
                                    <input type="text" value="{{ old('nomor_telepon', $contact->phone_number) }}"
                                        class=" @error('nomor_telepon') is-invalid  @enderror form-control form-control"
                                        name="nomor_telepon" />
                                    @error('nomor_telepon')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="alamat" class="required form-label">Alamat</label> <br>
                                    <textarea name="alamat" class="form-control @error('alamat') is-invalid  @enderror" data-kt-autosize="true">{{ old('alamat', $contact->address) }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="facebook" class="required form-label">Facebook</label> <br>
                                    <input type="text" value="{{ old('facebook', $contact->facebook) }}"
                                        class=" @error('facebook') is-invalid  @enderror form-control form-control"
                                        name="facebook" />
                                    @error('facebook')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="instagram" class="required form-label">Instagram</label> <br>
                                    <input type="text" value="{{ old('instagram', $contact->instagram) }}"
                                        class=" @error('instagram') is-invalid  @enderror form-control form-control"
                                        name="instagram" />
                                    @error('instagram')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="twitter" class="required form-label">Twitter</label> <br>
                                    <input type="text" value="{{ old('twitter', $contact->twitter) }}"
                                        class=" @error('twitter') is-invalid  @enderror form-control form-control"
                                        name="twitter" />
                                    @error('twitter')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="youtube" class="required form-label">Youtube</label> <br>
                                    <input type="text" value="{{ old('youtube', $contact->youtube) }}"
                                        class=" @error('youtube') is-invalid  @enderror form-control form-control"
                                        name="youtube" />
                                    @error('youtube')
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
