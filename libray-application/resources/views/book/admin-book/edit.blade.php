@extends('layout.master')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl mt-10">
        <div class="content flex-row-fluid" id="kt_content">
            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start  container-xxl ">

                <!--begin::Post-->
                <div class="content flex-row-fluid" id="kt_content">
                    <!--begin::Form-->
                    <!--begin::Form-->
                    <form id="kt_ecommerce_add_product_form" action="{{ route('admin.books.update', $book->id) }}"
                        method="POST"
                        class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!--begin::Aside column-->
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            <!--begin::Thumbnail settings-->
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Cover Buku</h2>
                                    </div>
                                </div>
                                <div class="card-body text-center pt-0">
                                    <style>
                                        .image-input-placeholder {
                                            background-image: url('{{ asset('assets/media/svg/files/blank-image.svg') }}');
                                        }
                                    </style>

                                    <div class="image-input image-input-outline mb-3" data-kt-image-input="true"
                                        style="background-image: url('{{ asset('storage/books/' . $book->image) }}')">
                                        <!-- ✅ Preview image cover -->
                                        <div class="image-input-wrapper w-100px h-150px"
                                            style="background-image: url('{{ asset('storage/books/' . $book->image) }}')">
                                        </div>

                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change">
                                            <i class="ki-duotone ki-pencil fs-7"></i>
                                            <input type="file" name="gambar" accept=".png, .jpg, .jpeg" />
                                        </label>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel"><i
                                                class="ki-duotone ki-cross fs-2"></i></span>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove"><i
                                                class="ki-duotone ki-cross fs-2"></i></span>
                                    </div>

                                    <div class="text-muted fs-7">Hanya file gambar *.png, *.jpg dan *.jpeg yang diterima
                                    </div>
                                    @error('gambar')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!--begin::Genre-->
                            <div class="card card-flush py-9">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Genre Buku</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <label class="form-label d-block">Genre Buku</label>
                                    <select name="genre_id" class="form-select mb-2" data-control="select2"
                                        data-allow-clear="true" data-placeholder="Genre Buku">
                                        <option value="">Pilih Genre</option>
                                        @foreach ($genre as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('genre_id', $book->genre_id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('genre_id')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <!--end::Aside column-->

                        <!--begin::Main column-->
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="tab-content">
                                <div id="kt_ecommerce_add_product_advanced" role="tab-panel">
                                    <div class="d-flex flex-column gap-3 gap-lg-10">
                                        <div class="card card-flush py-4">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Edit Buku</h2>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <!-- Title -->
                                                <div class="mb-10 fv-row">
                                                    <label class="required form-label">Title</label>
                                                    <input type="text" name="title" class="form-control mb-2"
                                                        placeholder="Title" value="{{ old('title', $book->title) }}">
                                                    {{-- ✅ --}}
                                                    @error('title')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                    <div class="text-muted fs-7">Masukkan Judul Buku.</div>
                                                </div>

                                                <!-- Stok -->
                                                <div class="mb-10 fv-row">
                                                    <label class="required form-label">Stok</label>
                                                    <input type="number" name="stok" min="0"
                                                        class="form-control mb-2" placeholder="Stok Buku"
                                                        value="{{ old('stok', $book->stok) }}"> {{-- ✅ --}}
                                                    @error('stok')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                    <div class="text-muted fs-7">Masukkan Stok Buku</div>
                                                </div>

                                                <!-- Summary -->
                                                <div class="mb-3 fv-row">
                                                    <label class="form-label required">Summary</label>
                                                    <textarea name="summary" class="form-control" rows="7" placeholder="Masukkan summary">{{ old('summary', $book->summary) }}</textarea> {{-- ✅ --}}
                                                    @error('summary')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                    <div class="text-muted fs-7">Summary singkat buku.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.books.index') }}" class="btn btn-light me-5">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Save Changes</span>
                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        $('#tahun_terbit').flatpickr({
            dateFormat: "Y",
        });
    </script>
@endsection
