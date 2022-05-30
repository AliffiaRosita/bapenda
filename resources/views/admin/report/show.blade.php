

<div class="modal fade"  tabindex="-1" id="modalDetail-{{ $key }}">
    <div class="modal-dialog modal-lg modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Profil</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="black"/>
                        <path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="black"/>
                        </svg></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">
                <div class="text-center">
                    <h3 class="mb-5">{{ $report->title }}</h3>
                </div>
                <hr>
                @if ($report->type == "file")

                <div class="row  ">
                    <div class="col-md-3"><h5> No </h5></div>
                    <div class="col-md-3"><h5> Nama File</h5> </div>
                    <div class="col-md-3"><h5> Kota</h5> </div>
                    <div class="col-md-3"><h5> Aksi</h5> </div>
                </div>
                <div class="row ">
                    @foreach ($report->reportFiles as $key=> $file)
                    <div class="col-md-3 mb-3">{{ $key+1 }}</div>
                                <div class="col-md-3 mb-3">{{ $file->title }}</div>
                                <div class="col-md-3 mb-3">{{ $report->title }}</div>
                                <div class="col-md-3 mb-3"><a href="{{ route('report.download',['reportFile'=>$file]) }}"  class="btn btn-sm btn-success">Unduh</a></div>
                                {{-- <div class="col-md-3 mb-3"><a href="{{ asset('storage/'.$file->file) }}" target="_blank" class="btn btn-sm btn-success">Unduh</a></div> --}}
                    @endforeach
                </div>

                @elseif ($report->type == "article")
                {!! $report->reportArticle->desc !!}

                @endif
            </div>

        </div>
    </div>
</div>
