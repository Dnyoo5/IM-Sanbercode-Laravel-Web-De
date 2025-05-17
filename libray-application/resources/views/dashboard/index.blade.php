@extends('layout.master')

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl mt-10">
        <div class="content flex-row-fluid" id="kt_content">

            {{-- Kartu Statistik --}}
            <div class="row g-5 g-xl-8">
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <i class="ki-duotone ki-book-square text-primary fs-2x ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">{{ $totalBooks }}</div>
                            <div class="fw-semibold text-gray-400">Total Buku Keseluruhan</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <i class="ki-duotone ki-user text-primary fs-2x ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">{{ $totalUsers }}</div>
                            <div class="fw-semibold text-gray-400">Total User Keseluruhan</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <i class="ki-duotone ki-chart-simple text-primary fs-2x ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">{{ $totalGenres }}</div>
                            <div class="fw-semibold text-gray-400">Total Genre Keseluruhan</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <i class="ki-duotone ki-messages text-primary fs-2x ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">{{ $totalComments }}</div>
                            <div class="fw-semibold text-gray-400">Total Review Keseluruhan</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
            </div>

            {{-- Chart Apex --}}
            <div class="card mb-10">
                <div class="card-header">
                    <h3 class="card-title">Statistik Review Buku</h3>
                </div>
                <div class="card-body">
                    <div id="apexReviewChart" style="height: 300px;"></div>
                </div>
            </div>

            <div class="card mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Users Terbaru</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                       <table class="table table-stripped" id="table_users">
                                <thead class="text-gray-500 fs-6 bg-gray-700">
                                <tr class="fw-bold">
                                    <th class="min-w-150px">No</th>
                                    <th class="min-w-140px">Nama</th>
                                    <th class="min-w-120px">Email</th>
                                    <th class="min-w-120px">Role</th>
                                </tr>
                            </thead>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            let table = $('#table_users').DataTable({
                processing: true,
                serverSide: true,
                responsive: false, // Menambahkan opsi responsive
                ajax: {
                    url: "{{ route('admin.dashboard.datatable') }}",
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

        });

        var options = {
            chart: {
                type: 'bar',
                height: 300
            },
            series: [{
                name: 'Komentar',
                data: @json($monthlyReviewData)
            }],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov',
                    'Des'
                ]
            },
            colors: ['#0d6efd'],
            plotOptions: {
                bar: {
                    borderRadius: 5,
                    columnWidth: '45%'
                }
            },
            dataLabels: {
                enabled: false
            }
        };

        var chart = new ApexCharts(document.querySelector("#apexReviewChart"), options);
        chart.render();
    </script>
@endsection
