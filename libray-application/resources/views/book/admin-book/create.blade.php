@extends('layout.master')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl mt-10">
        <div class="content flex-row-fluid" id="kt_content">
            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start  container-xxl ">

                <!--begin::Post-->
                <div class="content flex-row-fluid" id="kt_content">
                    <!--begin::Form-->
                    <form id="kt_ecommerce_add_product_form" action="{{ route('admin.books.store') }}" method="POST"
                        class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework"
                        enctype="multipart/form-data">
                        @csrf
                        <!--begin::Aside column-->
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10"
                            data-select2-id="select2-data-132-h8y1">
                            <!--begin::Thumbnail settings-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Cover Buku</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <div class="card-body text-center pt-0">
                                    <style>
                                        .image-input-placeholder {
                                            background-image: url('{{ asset('assets/media/svg/files/blank-image.svg') }}');
                                        }
                                    </style>
                                    <!--end::Image input placeholder-->

                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                        data-kt-image-input="true">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-100px h-150px"></div>
                                        <!--end::Preview existing avatar-->

                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            aria-label="Change avatar" data-bs-original-title="Change avatar"
                                            data-kt-initialized="1">
                                            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="gambar" accept=".png, .jpg, .jpeg">


                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            aria-label="Cancel avatar" data-bs-original-title="Cancel avatar"
                                            data-kt-initialized="1">
                                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                    class="path2"></span></i> </span>
                                        <!--end::Cancel-->

                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            aria-label="Remove avatar" data-bs-original-title="Remove avatar"
                                            data-kt-initialized="1">
                                            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                    class="path2"></span></i> </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->

                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">
                                        Hanya file gambar *.png, *.jpg dan *.jpeg yang diterima</div>
                                    @error('gambar')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <!--end::Description-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <div class="card card-flush py-9" data-select2-id="select2-data-131-mapj">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Genre Buku</h2>
                                    </div>
                                    <!--end::Card title-->

                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <div class="rounded-circle bg-success w-15px h-15px"
                                            id="kt_ecommerce_add_product_status"></div>
                                    </div>
                                    <!--begin::Card toolbar-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0" data-select2-id="select2-data-130-az4i">
                                    <!--begin::Select2-->
                                    <label class="form-label d-block">genre Buku</label>
                                    <select name="id_genre" class="form-select mb-2" data-control="select2"
                                        data-allow-clear="true" data-placeholder="genre Buku">
                                        <option value="">Genre Buku</option>
                                        @foreach ($genre as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('id_genre')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Pilih genre Buku Yanng tersedia</div>
                                </div>
                                <!--end::Card body-->
                            </div>



                        </div>
                        <!--end::Aside column-->

                        <!--begin::Main column-->
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="tab-content">
                                <div id="kt_ecommerce_add_product_advanced" role="tab-panel">
                                    <div class="d-flex flex-column gap-3 gap-lg-10">

                                        <!--begin::Inventory-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Tambah Buku</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Title</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <input type="text" name="title" class="form-control mb-2"
                                                        placeholder="Title" value="">

                                                    @error('title')
                                                        <div class="text-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Masukan Judul Buku.</div>
                                                    <!--end::Description-->
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>

                                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Stok</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <div class="d-flex gap-3">
                                                        <input type="number" min="0" name="stok"
                                                            class="form-control mb-2" placeholder="Stok Buku"
                                                            value="">

                                                    </div>
                                                    @error('stok')
                                                        <div class="text-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <!--end::Input-->

                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Masukan Stok Buku</div>
                                                    <!--end::Description-->
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>

                                                <div class="mb-3 fv-row fv-plugins-icon-container">
                                                    <label class="form-label required">Summary</label>
                                                    <textarea name="summary" class="form-control" rows="7" placeholder="Masukan summary" id="summary">{{ old('deskripsi') }}</textarea>
                                                    @error('summary')
                                                        <div class="text-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Summary.</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab content-->

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.books.index') }}" id="kt_ecommerce_add_product_cancel"
                                    class="btn btn-light me-5">
                                    Cancel
                                </a>
                                <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                    <span class="indicator-label">
                                        Save Changes
                                    </span>
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
