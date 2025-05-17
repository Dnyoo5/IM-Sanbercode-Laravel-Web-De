@extends('layout.master')

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl mt-10">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Social - Feeds -->
            <div class="d-flex flex-row">
                <!--begin::Start sidebar-->
                <div class="d-lg-flex flex-column flex-lg-row-auto w-lg-325px" data-kt-drawer="true"
                    data-kt-drawer-name="start-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '250px': '300px'}"
                    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_social_start_sidebar_toggle">
                    <!--begin::User menu-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body pt-15 px-0">
                            <!--begin::Member-->
                            <div class="d-flex flex-column text-center mb-9 px-9">
                                <!--begin::Photo-->
                                <div class="bgi-position-center align-content-center bgi-no-repeat bgi-size-cover h-400px mb-5 w-32 0px card-rounded"
                                    style="background-image: url('{{ asset('storage/books/' . $book->image) }}')">
                                </div>
                                <!--end::Photo-->
                                <!--begin::Info-->
                                <div class="text-center">
                                    <!--begin::Name-->
                                    <a href="#"
                                        class="text-gray-800 fw-bold text-hover-primary fs-4 d-block mb-2">{{ $book->title }}</a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <!--end::Position-->
                                    <a href="{{ route('genres.show.public', $book->genre->id) }}"
                                        class="fw-normal fs-7 text-gray-500 text-hover-primary text-truncate d-inline-block mb-1"
                                        title="Lihat genre {{ $book->genre->name }}">
                                        {{ $book->genre->name }}
                                    </a>

                                    <span
                                        class="d-block fw-normal fs-7 text-gray-600 mt-2 text-justify text-wrap">{{ $book->summary }}</span>
                                </div>
                                <!--end::Info-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::User menu-->
                    <!--begin::List widget 14-->

                    <!--end: List widget 14-->
                </div>
                <!--end::Start sidebar-->
                <!--begin::Content-->
                <div class="w-100 flex-lg-row-fluid mx-lg-13">
                    <!--begin::Mobile toolbar-->
                    <div class="d-flex d-lg-none align-items-center justify-content-end mb-10">
                        <div class="d-flex align-items-center gap-2">
                            <div class="btn btn-icon btn-active-color-primary w-30px h-30px"
                                id="kt_social_start_sidebar_toggle">
                                <i class="ki-duotone ki-profile-circle fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </div>
                            <div class="btn btn-icon btn-active-color-primary w-30px h-30px"
                                id="kt_social_end_sidebar_toggle">
                                <i class="ki-duotone ki-scroll fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </div>
                        </div>
                    </div>

                    <div id="comments-container">
                        @foreach ($book->comments as $comment)
                            <div class="card card-flush mb-3">
                                <div class="card-body">
                                    <strong>{{ $comment->user->name }}</strong>
                                    <p class="mb-0">{{ $comment->content }}</p>
                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @auth
                        <form id="comment-form" action="{{ route('books.comments.store', $book->id) }}" method="POST">
                            @csrf
                            <div class="card card-flush mb-10">
                                <div class="card-header justify-content-start align-items-center pt-4">
                                    <span class="text-gray-500 fw-semibold fs-6">Apa yang kamu pikirkan?</span>
                                </div>
                                <div class="card-body pt-2 pb-0">
                                    <textarea name="message" class="form-control bg-transparent border-0 px-0" rows="2"
                                        placeholder="Tulis komentar..."></textarea>
                                </div>
                                <div class="card-footer d-flex justify-content-end pt-0">
                                    <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-info">Silakan login untuk menulis komentar.</div>
                    @endauth

                    {{-- Daftar komentar --}}


                    <div class="d-flex flex-center">
                        <a href="#" class="btn btn-primary fw-bold px-6" id="kt_social_feeds_more_posts_btn">
                            <span class="indicator-label">Show more</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </a>
                    </div>
                </div>
                <div class="d-lg-flex flex-column flex-lg-row-auto w-lg-325px" data-kt-drawer="true"
                    data-kt-drawer-name="end-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '250px': '300px'}"
                    data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_social_end_sidebar_toggle">
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-900">Recomended for You</span>
                            </h3>
                        </div>
                        <div class="card-body pt-5">
                            @foreach ($latestBooks as $item)
                                <div class="d-flex flex-stack">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-5">
                                        <img src="{{ asset('storage/books/' . $item->image) }}"
                                            class="h-100px w-70px align-self-center object-fit-cover"
                                            alt="{{ $item->title }}" />
                                    </div>
                                    <!--end::Symbol-->

                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Book-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="{{ route('books.show', $item->id) }}"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold d-block">{{ $item->title }}</a>
                                            <a href="{{ route('genres.show.public', $item->genre->id) }}"
                                                class="fw-normal fs-7 text-gray-500 text-hover-primary text-truncate d-block mb-1"
                                                title="Lihat genre {{ $item->genre->name }}">
                                                {{ $item->genre->name }}
                                            </a>

                                            <span
                                                class="text-muted fw-normal d-block fs-7">{{ Str::limit($item->summary, 30) }}</span>
                                        </div>
                                        <!--end:Book-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <div class="separator separator-dashed my-4"></div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#comment-form').on('submit', function(e) {
                e.preventDefault();

                let form = $(this);
                let url = form.attr('action');
                let message = form.find('textarea[name="message"]').val();

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        _token: '{{ csrf_token() }}',
                        message: message
                    },
                    success: function(response) {
                        form.find('textarea[name="message"]').val('');

                        $('#comments-container').prepend(`
                        <div class="card card-flush mb-3">
                            <div class="card-body">
                                <strong>${response.user_name}</strong>
                                <p class="mb-0">${response.message}</p>
                                <small class="text-muted">Baru saja</small>
                            </div>
                        </div>
                    `);
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>
@endsection
