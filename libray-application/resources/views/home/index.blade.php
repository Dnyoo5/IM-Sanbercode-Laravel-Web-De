@extends('layout.master')

@section('content')
    <div class="toolbar py-5 py-lg-5" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl py-5">
            <div class="row gy-0 gx-10">
                <div class="col-xl-8">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card card-xl-stretch bg-body border-0 mb-5 mb-xl-0">
                                    <div class="card-body d-flex flex-column flex-lg-row flex-stack p-lg-15">
                                        <div
                                            class="d-flex flex-column justify-content-center align-items-center align-items-lg-start me-10 text-center text-lg-start">
                                            <h3 class="fs-2hx line-height-lg mb-5">
                                                <span class="fw-bold">Perbanyak Membaca,</span><br />
                                                <span class="fw-bold">Perluas Wawasanmu</span>
                                            </h3>
                                            <div class="fs-4 text-muted mb-7">
                                                Setiap halaman yang kamu baca<br />
                                                adalah langkah kecil menuju dunia yang lebih luas.
                                            </div>
                                            <a href='{{ route('books.index') }}'
                                                class="btn btn-success fw-semibold px-6 py-3">
                                                Mulai Membaca Sekarang
                                            </a>
                                        </div>

                                        <img src="assets/media/books/landing-book.png" alt=""
                                            class="mw-200px mw-lg-350px mt-lg-n10" />
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card card-xl-stretch border-0 overflow-hidden m-0 h-100">
                                    <div class="w-100 h-100 bg-cover bg-position-center"
                                        style="background-image: url('{{ asset('assets/media/books/books-tem.jpg') }}');">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card card-xl-stretch bg-body border-0 overflow-hidden position-relative hover-card"
                        style="min-height: 400px;">
                        <div class="cover-image position-absolute top-0 start-0 w-100 h-100"
                            style="background-image: url('{{ asset('assets/media/books/baca.jpeg') }}'); background-size: cover; background-position: 35% center;">
                        </div>
                        <div
                            class="overlay-content position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white text-center p-5">
                            <h3 class="fw-bold text-white fs-2 mb-3">Baca Buku Favoritmu</h3>
                            <a href="{{ route('books.index') }}" class="btn btn-light text-dark fw-semibold">Lihat
                                Koleksi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">

            <div class="d-flex justify-content-between align-items-center mb-10">
                <h2 class="fw-bold text-dark mb-0">GENRE BUKU</h2>

                <a href="{{ route('genres.index') }}"
                    class="btn btn-sm text-dark btn-light-primary btn-active-light-info fw-bold">
                    All Genre
                    <i class="ki-duotone text-dark ki-right fs-5 ms-2"></i>
                </a>
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
                        <!--begin::Tab content-->
                        <div class="tab-content">

                        </div>
                        <!--end::Tab content-->
                    </div>

                    <!--end::Charts Widget 1-->
                </div>
            </div>

            <div class="mt-8">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h3 class="fs-2x fw-bold text-dark mb-0">Top Books</h3>
                    <a href="#" class="btn btn-sm btn-light-primary fw-bold">
                        All Top Books
                        <i class="ki-duotone ki-right fs-5 ms-2"></i>
                    </a>
                </div>
                <div class="row g-5 g-xl-8">
                    @foreach ($topBooks as $book)
                        <div class="col-xl-3">
                            <div
                                class="card hover-elevate-up shadow-sm parent card-xl-stretch-100 mb-lg-2 mb-xl-4 py-5 rounded-0">
                                <div class="card-body d-flex align-items-center pt-3 pb-0">
                                    <!-- Gambar -->
                                    <img src="{{ asset('storage/books/' . $book->image) }}" alt=""
                                        class="align-self-start me-5"
                                        style="width: 80px; height: auto; max-height: 120px; object-fit: cover; border: 0.5px solid rgba(27, 26, 26, 0.411)">

                                    <!-- Teks -->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a href="{{ route('books.show', $book->id) }}"
                                            class="fw-bold text-gray-900 fs-4 mb-1 text-hover-primary">
                                            {{ $book->title }}
                                        </a>
                                        <a href="{{ route('genres.show.public', $book->genre->id) }}"
                                            class="fw-normal fs-7 text-gray-500 text-hover-primary text-truncate d-inline-block mb-1 text-wrap"
                                            title="Lihat genre {{ $book->genre->name }}">
                                            {{ $book->genre->name }}
                                        </a>


                                        <!-- Jumlah Komentar -->
                                        <span class="text-muted fs-7 d-flex align-items-center mt-auto">
                                            <i class="ki-duotone ki-eye fs-5 me-2"></i>{{ $book->comments_count }} komentar
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>


            <div class="bg-cover bg-no-repeat kelas bg-center my-10 w-100 h-350px"
                style="background-image: url('assets/media/books/books-tem1.jpg');">
            </div>




            <div class="mt-8">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h3 class="fs-2x fw-bold text-dark mb-0">Books Showcase</h3>
                    <a href="#" class="btn btn-sm btn-light-primary fw-bold">
                        All Books Showcase
                        <i class="ki-duotone ki-right fs-5 ms-2"></i>
                    </a>
                </div>
                <div class="row g-5 g-xl-8">
                    @foreach ($newestBooks as $book)
                        <div class="col-xl-2">
                            <div class="m-0 mb-10">
                                <div
                                    class="card-rounded position-relative hover-elevate-up shadow-sm parent h-300px w-200px mb-5">
                                    <div class="bgi-position-center bgi-no-repeat bgi-size-cover h-300px w-200px card-rounded"
                                        style="background-image:url('{{ asset('storage/books/' . $book->image) }}')"></div>
                                </div>

                                <div class="m-0">
                                    <a href="{{ route('books.show', $book->id) }}"
                                        class="text-gray-800 text-hover-primary fs-3 fw-bold d-block mb-2">
                                        {{ $book->title }}
                                    </a>
                                    <a href="{{ route('genres.show.public', $book->genre->id) }}"
                                        class="fw-normal fs-7 text-gray-500 text-hover-primary text-truncate d-inline-block mb-1"
                                        title="Lihat genre {{ $book->genre->name }}">
                                        {{ $book->genre->name }}
                                    </a>

                                    <span class="fw-normal fs-6 text-gray-600 mt-3 d-block lh-lg text-wrap"
                                        style="width: 200px; text-align: justify;">
                                        {{ \Illuminate\Support\Str::words($book->summary, 7, '...') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>



        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            const swiper = new Swiper(".mySwiper", {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                speed: 600,
            });
        });
    </script>
@endsection
