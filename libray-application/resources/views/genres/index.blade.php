@extends('layout.master')

@section('content')
    <div class="toolbar py-3 py-lg-3" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl py-3">
            <div class="row gy-0 gx-10">
                <div class="col-xl-12">
                    <div class="card card-xl-stretch bg-body border-0 mb-5 mb-xl-0">
                        <div class="card-body d-flex flex-column flex-lg-row flex-stack p-lg-10">
                            <div
                                class="d-flex flex-column justify-content-center align-items-center align-items-lg-start me-10 text-center text-lg-start">
                                <h3 class="fs-2 line-height-sm mb-3">
                                    <span class="fw-bold">Jelajahi Beragam Genre Buku</span><br />
                                    <span class="fw-bold">Temukan Bacaan Favoritmu</span>
                                </h3>
                                <div class="fs-5 text-muted mb-5">
                                    Setiap genre menawarkan dunia yang berbeda.<br />
                                    Temukan cerita yang sesuai dengan selera dan suasana hatimu.
                                </div>
                            </div>
                            <img src="{{ asset('assets/media/books/landing-book.png') }}" alt="Genre Illustration"
                                class="mw-150px mw-lg-200px mt-lg-0" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="d-flex justify-content-center align-items-center mb-10">
                <h2 class="fw-bold text-dark mb-0">GENRE BUKU</h2>
            </div>
            <div class="row gy-0 gx-10">
                <div class="col-xl-12">
                    <div class="mb-10">
                        <ul class="nav row mb-10">
                            @foreach ($genre as $item)
                                <li class="nav-item col-12 col-md-3 mb-5 hover-elevate-up">
                                    <a class="nav-link btn-active-secondary btn btn-flex btn-color-gray-500 btn-outline d-flex flex-grow-1 flex-column flex-center py-5 h-100px"
                                        href="{{ route('genres.show.public', $item->id) }}">
                                        <span class="fs-6 fw-bold">{{ $item->name }}</span>
                                    </a>
                                </li>
                            @endforeach

                        </ul>

                        <div class="d-flex justify-content-center">
                            {{ $genre->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
