@extends('layout.master')

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="mt-8">

                <!-- Search Bar -->


                <!-- Section Title -->
                <div class="d-flex justify-content-center align-items-center mb-5">
                    <h3 class="fs-2x fw-bold text-dark mb-0">Books</h3>
                </div>

                <!-- Book Grid -->
                <div class="row g-5 g-xl-8">
                    @foreach ($books as $book)
                        <div class="col-xl-2 col-md-6 mb-20">
                            <div
                                class="card-rounded position-relative hover-elevate-up shadow-sm parent h-300px w-200px  mb-5 mt-20">
                                <!--begin::Img-->
                                <div class="bgi-position-center bgi-no-repeat bgi-size-cover h-300px w-200px card-rounded"
                                    style="background-image: url('{{ asset('storage/books/' . $book->image) }}')">
                                </div>
                                <div class="p-5">
                                    <a href="{{ route('books.show', $book->id) }}"
                                        class="text-gray-800 text-hover-primary fs-4 fw-bold d-block mb-2">
                                        {{ $book->title }}
                                    </a>
                                    <a href="{{ route('genres.show.public', $book->genre->id) }}"
                                        class="fw-normal fs-7 text-gray-500 text-hover-primary text-truncate d-inline-block mb-1"
                                        title="Lihat genre {{ $book->genre->name }}">
                                        {{ $book->genre->name }}
                                    </a>

                                    <div class="fw-normal fs-7 text-gray-600 mt-2 text-justify text-wrap">
                                        {{ \Illuminate\Support\Str::words($book->summary, 5, '...') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-10">
                    {{ $books->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
