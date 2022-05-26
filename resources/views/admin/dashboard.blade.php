@extends('admin.partials.main')

@section('breadcrumb')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
    Berita Gambar
    {{-- <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

    <small class="text-muted fs-7 fw-bold my-1 ms-1"> home</small> --}}
</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <h3>Selamat Datang, {{ auth()->user()->admin->name }}</h3>
    </div>
</div>

@endsection



