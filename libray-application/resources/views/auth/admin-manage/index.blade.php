@extends('layout.master')

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl mt-10">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row g-5 g-xl-12">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::Table widget 13-->
                    <div class="card card-flush h-xl-100">

                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Management User</span>

                            </h3>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_tambah_genre"
                                style="margin-right: 10px">
                                <button class="btn btn-light btn-sm">
                                    <i class="ki-duotone ki-plus-square fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                    Tambah User
                                </button>
                            </a>
                            <!--end::Title-->
                            <!--begin::Toolbar-->

                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <table class="table table-stripped" id="tabel_users">
                                <thead class="text-gray-500 fs-6 bg-gray-700">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Table widget 13-->
                    <div class="modal fade modal-lg" id="modal_tambah_genre" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{ route('admin.users.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah User</h5>
                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                            data-bs-dismiss="modal">
                                            <i class="ki-duotone ki-cross fs-2"></i>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-5">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Masukkan nama" required>
                                        </div>
                                        <div class="mb-5">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Masukkan email" required>
                                        </div>
                                        <div class="mb-5">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Masukkan password" required>
                                        </div>
                                        <div class="mb-5">
                                            <label for="role" class="form-label">Role</label>
                                            <select name="role" class="form-control" required data-control="select2">
                                                <option value="user">User</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="modal fade" tabindex="-1" id="detailModal" data-bs-focus="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Detail User</h3>
                                    <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                        data-bs-dismiss="modal" aria-label="Close">
                                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                class="path2"></span></i>
                                    </button>
                                </div>
                                <div class="response-detail"></div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" tabindex="-1" id="editDropModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Edit User</h3>
                                    <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                        data-bs-dismiss="modal" aria-label="Close">
                                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                class="path2"></span></i>
                                    </button>
                                </div>
                                <div class="response"></div>
                            </div>
                        </div>
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
            // Inisialisasi DataTables
            let table = $('#tabel_users').DataTable({
                processing: true,
                serverSide: true,
                responsive: false, // Menambahkan opsi responsive
                ajax: {
                    url: "{{ route('admin.users.datatable') }}",
                },
                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    },
                ],
                order: [
                    [1, 'asc']
                ], // Mengurutkan berdasarkan kolom 'nama'
                dom: "<'row mb-2'" +
                    "<'col-sm-6 d-flex align-items-center justify-content-start dt-toolbar'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                    ">" +
                    "<'table-responsive'tr>" +
                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">"
            });


            $('body').on('click', '.delete-genre', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Anda yakin ingin menghapus Pengguna ini?",
                    icon: 'warning',
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Tidak, kembali!',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-secondary'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });


            $(document).on('click', '.show-button-users', function() {
                var btnId = $(this).data('id'); // Mengambil data-id dari tombol
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.users.show', '') }}" + '/' + btnId,
                    success: function(response) {
                        $('.response-detail').html(response); // GANTI INI
                        $('#detailModal').modal('show');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });


            $(document).on('click', '.edit-button-users', function() {
                var btnId = $(this).data('id'); // Mengambil data-id dari tombol
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.users.edit', '') }}" + '/' + btnId,
                    success: function(response) {
                        $('.response').html(response);
                        $('#editDropModal').modal('show');
                        // Inisialisasi Select2 setelah konten di-load

                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

        });
    </script>
@endsection
