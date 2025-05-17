@extends('layout.master')

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card mt-10">
                <!--begin::Body-->
                <div class="card-body p-lg-17">
                    <a href="{{ url()->previous() }}" class="btn btn-light-info mb-5">
                        <i class="ki-duotone ki-arrow-left fs-2"></i>
                        Kembali
                    </a>

                    <!--begin::About-->
                    <div class="mb-18">
                        <div class="mb-10">
                            <div class="text-center mb-15">
                                <h3 class="fs-2hx text-gray-900 mb-5">{{ $genre->name }}</h3>
                            </div>
                        </div>

                        <div class="fs-5 fw-semibold text-gray-600">
                            <p class="mb-8">
                                {{ $genre->description }}
                            </p>
                        </div>
                    </div>
                </div>
                <!--end::Body-->

                <!--begin::Book List-->
                <div class="px-10 pb-20">
                    <h4 class="fs-2 text-gray-800 mb-10 text-center">Daftar Buku dalam Genre Ini</h4>

                    @if ($genre->books->count())
                        <div class="row justify-content-center g-5">
                            @foreach ($genre->books as $book)
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                    <div class="card shadow-sm rounded hover-elevate-up" style="width: 200px;">
                                        <!--begin::Image-->
                                        <div class="rounded-top"
                                            style="height: 300px;
                                                   background-image: url('{{ asset('storage/books/' . $book->image) }}');
                                                   background-size: cover;
                                                   background-position: center;">
                                        </div>

                                        <!--begin::Text-->
                                        <div class="p-4">
                                            <a href="{{ route('books.show', $book->id) }}"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold d-block mb-1 text-truncate"
                                                title="{{ $book->title }}">
                                                {{ \Illuminate\Support\Str::limit($book->title, 30) }}
                                            </a>

                                            <a href="{{ route('genres.show.public', $book->genre->id) }}"
                                                class="d-block fw-normal fs-7 text-gray-500 text-hover-primary text-truncate mb-1"
                                                title="Lihat genre {{ $book->genre->name }}">
                                                {{ $book->genre->name }}
                                            </a>

                                            <div class="fw-normal fs-7 text-gray-600 text-wrap"
                                                style="max-height: 4.5em; overflow: hidden;">
                                                {{ \Illuminate\Support\Str::words($book->summary, 10, '...') }}
                                            </div>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted text-center">Tidak ada buku dalam genre ini.</p>
                    @endif
                </div>
                <!--end::Book List-->
            </div>
        </div>
    </div>
@endsection
