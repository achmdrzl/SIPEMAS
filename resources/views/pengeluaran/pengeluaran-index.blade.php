@extends('layouts.main')

@push('style-alt')
    <style>
        .custom-modal-dialog {
            max-width: 1420px;
            /* Set your desired width */
            width: 100%;
            margin: 1.75rem auto;
        }

        .custom-width-column {
            width: 10px; /* Set your desired width here */
        }
        #datatable_8 tbody td {
            font-size: 16px; /*Adjust the font size as needed*/
            text-align: center;
            padding: 4px;
        }
    </style>
@endpush

@section('content')
    <!-- Main Content -->
    <div class="hk-pg-wrapper">
        <div class="container">
            <!-- Page Header -->
            <div class="hk-pg-header pg-header-wth-tab">
                <div class="d-flex">
                    <div class="d-flex flex-wrap justify-content-between flex-1">
                        <div class="mb-lg-0 mb-2 me-8">
                            <h1 class="pg-title">Transaksi Pengeluaran Barang</h1>
                            <p>Restock Kebutuhan Barang Pada Toko Emas</p>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-line nav-light nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#data_penjualan">
                            <span class="nav-link-text">Data Pengeluaran Barang</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#input_penjualan">
                            <span class="nav-link-text">Input Pengeluaran Barang</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /Page Header -->

            <!-- Page Body -->
            <div class="hk-pg-body">
                <div class="invoice-body">
                    <div data-simplebar class="nicescroll-bar">
                        <div class="container-xxl">
                            <div class="create-invoice-wrap">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="data_penjualan">
                                        <div class="row mt-3">
                                            <div class="col-sm p-3 bg-grey-light-5 rounded">
                                                <div class="row gx-3 align-items-center">
                                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                                        <label class="form-label mb-xl-0">Tanggal :</label>
                                                    </div>
                                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                                        <input class="form-control" name="start_date" id="start_date"
                                                            type="date" />
                                                    </div>
                                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                                        <label class="form-label mb-xl-0">s/d</label>
                                                    </div>
                                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                                        <input class="form-control" name="end_date" id="end_date"
                                                            type="date" />
                                                    </div>
                                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                                        <button class="btn btn-sm btn-primary show-data"><span><span
                                                                    class="icon"><span class="feather-icon"><i
                                                                            data-feather="calendar"></i></span></span><span
                                                                    class="btn-text">Tampilkan</span></span></button>
                                                    </div>
                                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                                        <button class="btn btn-sm btn-secondary restart-sorting"><span><span
                                                                    class="icon"><span class="feather-icon"><i
                                                                            data-feather="refresh-ccw"></i></span></span><span
                                                                    class="btn-text">Reset</span></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-wrap mt-5">
                                            <div class="invoice-table-wrap">
                                                <table id="datatable_7" class="table nowrap table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>No Bukti</th>
                                                            <th>Tanggal</th>
                                                            <th>Supplier</th>
                                                            <th>Keterangan</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="input_penjualan">
                                        <div class="row">
                                            <div class="col-md-12 mb-md-4 mb-3">
                                                <div class="card card-border mb-0 h-100">
                                                    <div class="card-header card-header-action">
                                                        <h6>List Data Barang
                                                            <span class="badge badge-sm badge-light ms-1">5</span>
                                                        </h6>
                                                        <div class="card-action-wrap">
                                                            <button
                                                                class="btn btn-sm btn-primary ms-3 create-pengeluaran-barang"><span><span
                                                                        class="icon"><span class="feather-icon"><i
                                                                                data-feather="plus"></i></span></span><span
                                                                        class="btn-text">Tambah Pengeluaran Barang</span></span></button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="contact-list-view">
                                                            <table id="datatable_8" class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>No</th>
                                                                        <th>Nama</th>
                                                                        <th>Berat</th>
                                                                        <th>Satuan</th>
                                                                        <th>Jenis</th>
                                                                        <th>Lokasi</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="card-footer">
                                                        <p style="font-size: 18px">BERAT TOTAL : <strong>126,2
                                                                gram</strong></p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Body -->

        </div>

        {{-- Modal Tambah Penjualan --}}
        <div class="modal fade" id="pengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 id="tambahpenjualanreturnHeading"></h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="penjualanreturnForm">
                        <div class="modal-body">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                style="display: none;" style="color: red"></div>
                            <div class="row">
                                <div class="col-md p-2 bg-grey-light-5 rounded">
                                    <div class="row align-items-center">
                                        <div class="col-xl-auto mb-xl-0 mb-2">
                                            <label class="form-label mb-xl-0">Tanggal :</label>
                                        </div>
                                        <div class="col-xl-auto mb-xl-0 mb-2">
                                            <input class="form-control" type="date" id="pengeluaran_tanggal"
                                                name="pengeluaran_tanggal" value="{{ date('Y-m-d') }}" />
                                        </div>
                                        <div class="col-xl-auto mb-xl-0 mb-2" id="supplier-label">
                                            
                                        </div>
                                        <div class="col-xl-auto mb-xl-0 mb-2" id="supplier-data">
                                            
                                        </div>

                                        <div class="col-xl-auto mb-xl-0 mb-2" id="keterangan-label">
                                            
                                        </div>

                                        <div class="col-xl-auto mb-xl-0 mb-2" id="keterangan-data">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Berat Asli</th>
                                    <th>Kondisi</th>
                                </thead>
                                <tbody id="list-barang">
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer align-items-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="button" id="submitPengeluaran" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Page Footer -->
        @include('layouts.footer')
        <!-- / Page Footer -->

    </div>
    <!-- /Main Content -->
@endsection

@push('script-alt')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var transaksiPengeluaran = $('#datatable_7').DataTable({
                scrollX: true,
                autoWidth: false,
                language: {
                    search: "",
                    searchPlaceholder: "Search",
                    sLengthMenu: "_MENU_item",
                    paginate: {
                        next: '<i class="ri-arrow-right-s-line"></i>', // or '→'
                        previous: '<i class="ri-arrow-left-s-line"></i>' // or '←' 
                    }
                },
                "drawCallback": function() {
                    $('.dataTables_paginate > .pagination').addClass(
                        'custom-pagination pagination-simple');
                },
                processing: true,
                serverSide: true,
                ajax: "{{ route('pengeluaran.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'pengeluaran_nobukti',
                        name: 'pengeluaran_nobukti'
                    },
                    {
                        data: 'pengeluaran_tanggal',
                        name: 'pengeluaran_tanggal'
                    },
                    {
                        data: 'supplier_nama',
                        name: 'supplier_nama'
                    },
                    {
                        data: 'pengeluaran_keterangan',
                        name: 'pengeluaran_keterangan'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });

            var listbarang = $('#datatable_8').DataTable({
                dom: "<'row'<'col-sm-6'l><'col-sm-3'p><'col-sm-3'f>>" +
                     "<'row'<'col-sm-12'tr>>" +
                     "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                scrollX: true,
                autoWidth: false,
                language: {
                    search: "",
                    searchPlaceholder: "Search",
                    sLengthMenu: "_MENU_item",
                    paginate: {
                        next: '<i class="ri-arrow-right-s-line"></i>', // or '→'
                        previous: '<i class="ri-arrow-left-s-line"></i>' // or '←' 
                    }
                },
                "drawCallback": function() {
                    $('.dataTables_paginate > .pagination').addClass(
                        'custom-pagination pagination-simple');
                },
                // processing: true,
                // serverSide: true,
                ajax: "{{ route('pengeluaran.barang.index') }}",
                columns: [{
                        data: 'select',
                        name: 'select',
                    },
                    {
                        data: 'index',
                        name: 'index'
                    },
                    {
                        data: 'barang_nama',
                        name: 'barang_nama',
                        className: 'custom-width-column' // Add a class for styling
                    },
                    {
                        data: 'barang_berat',
                        name: 'barang_berat'
                    },
                    {
                        data: 'barang_satuan',
                        name: 'barang_satuan'
                    },
                    {
                        data: 'barang_jenis',
                        name: 'barang_jenis'
                    },
                    {
                        data: 'barang_lokasi',
                        name: 'barang_lokasi'
                    },
                ],
                pageLength: 100,
                lengthMenu: [10, 20, 50, 100, 1000, 10000, 100000, 1000000],
            });

            // FILTERED DATA
            $('.show-data').on('click', function() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();

                // Perform validation checks
                if (startDate === '' || endDate === '') {
                    // Display an error message or perform appropriate actions
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Start date and End date must be included!',
                        showConfirmButton: false,
                        timer: 2000
                    });

                    return;
                }

                transaksiPengeluaran.one('preDraw', function() {
                    // Display the loading state
                    $('#datatable_7').addClass('loading');
                }).draw();

                $.ajax({
                    type: "POST",
                    url: "{{ route('filtered.data.pengeluaran') }}",
                    data: {
                        startDate: startDate,
                        endDate: endDate,
                    },
                    dataType: "JSON",
                    success: function(response) {

                        if (response.data.length > 0) {

                            // Destroy the existing DataTable
                            transaksiPengeluaran.destroy();

                            // Reinitialize the DataTable with the updated data
                            transaksiPengeluaran = $('#datatable_7').DataTable({
                                scrollX: true,
                                autoWidth: false,
                                language: {
                                    search: "",
                                    searchPlaceholder: "Search",
                                    sLengthMenu: "_MENU_item",
                                    paginate: {
                                        next: '<i class="ri-arrow-right-s-line"></i>', // or '→'
                                        previous: '<i class="ri-arrow-left-s-line"></i>' // or '←' 
                                    }
                                },
                                "drawCallback": function() {
                                    $('.dataTables_paginate > .pagination')
                                        .addClass(
                                            'custom-pagination pagination-simple');
                                },
                                // Other DataTable options
                                data: response
                                .data, // Pass the updated data to the DataTable
                                columns: [{
                                        data: 'DT_RowIndex',
                                        name: 'DT_RowIndex'
                                    },
                                    {
                                        data: 'pengeluaran_nobukti',
                                        name: 'pengeluaran_nobukti'
                                    },
                                    {
                                        data: 'pengeluaran_tanggal',
                                        name: 'pengeluaran_tanggal'
                                    },
                                    {
                                        data: 'supplier_nama',
                                        name: 'supplier_nama'
                                    },
                                    {
                                        data: 'pengeluaran_keterangan',
                                        name: 'pengeluaran_keterangan'
                                    },
                                    {
                                        data: 'action',
                                        name: 'action'
                                    },
                                ]
                            });

                            // Hide the loading state
                            $('#datatable_7').removeClass('loading');

                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Data based on input date is null!',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    }
                });
            });

            // RESTART FILTER
            $(".restart-sorting").on('click', function() {
                $('#start_date').val('');
                $('#end_date').val('');
                // Destroy the existing DataTable
                transaksiPengeluaran.destroy();
                // DISPLAY TRANSAKSI PEMBELIAN
                transaksiPengeluaran = $('#datatable_7').DataTable({
                    scrollX: true,
                    autoWidth: false,
                    language: {
                        search: "",
                        searchPlaceholder: "Search",
                        sLengthMenu: "_MENU_item",
                        paginate: {
                            next: '<i class="ri-arrow-right-s-line"></i>', // or '→'
                            previous: '<i class="ri-arrow-left-s-line"></i>' // or '←' 
                        }
                    },
                    "drawCallback": function() {
                        $('.dataTables_paginate > .pagination').addClass(
                            'custom-pagination pagination-simple');
                    },
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('pengeluaran.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'pengeluaran_nobukti',
                            name: 'pengeluaran_nobukti'
                        },
                        {
                            data: 'pengeluaran_tanggal',
                            name: 'pengeluaran_tanggal'
                        },
                        {
                            data: 'supplier_nama',
                            name: 'supplier_nama'
                        },
                        {
                            data: 'pengeluaran_keterangan',
                            name: 'pengeluaran_keterangan'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ]
                });

            })

            //  CREATE DATA PENGELUARAN.
            $('.create-pengeluaran-barang').click(function() {
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#penjualanreturnForm').trigger("reset");
                $('#tambahpenjualanreturnHeading').html("TAMBAH DATA PENGELUARAN BARU")
                $("#penjualan_return_tanggal").prop('readonly', false)
                $("#penjualan_return_keterangan").prop('readonly', false)
                $("#submitPengeluaran").prop('hidden', false);
                $("#list-barang").html('')
                $("#supplier-label").html('')
                $("#supplier-data").html('')  

                var submitPengeluaran = $('#submitPengeluaran'); // Note the '#' for selecting by ID
                submitPengeluaran.removeClass('edit');

                var selectedValues = [];

                $('.row-checkbox:checked').each(function() {
                    var row = $(this).closest('tr');
                    var rowData = listbarang.row(row).data();
                    var barang_id = rowData.barang_id;
                    selectedValues.push(barang_id);
                });

                    if (selectedValues.length > 0) {
                    $('#pengeluaranModal').modal('show');
                    // REQUEST SELECTED BARANG
                    $.ajax({
                        type: "POST",
                        url: "{{ route('load.barangSelected') }}",
                        data: {
                            barang_id: selectedValues,
                        },
                        dataType: "JSON",
                        success: function(response) {
                            console.log(response)
                            var listbarang = '';
                            var no = 1;
                            // LOOPING BARANG
                            $.each(response, function(index, value) {
                                const barangid = value['barang_id']
                                const barangkode = value['barang_kode']
                                const barangnama = value['barang_nama']
                                const barangberat = parseFloat(value['barang_berat']).toFixed(2);
                                const kadar = value['kadar']['kadar_id']
                                const barangfoto   = value['barang_foto'] ?? null

                                listbarang += `<tr>
                                                    <td>` + no++ + `</td>
                                                    <td style="width:200px">
                                                        <div class="media align-items-center">
                                                            <div class="media-head me-2">
                                                                <div class="avatar avatar-xs avatar-rounded">
                                                                    <a href="${'storage/foto_barang/' + barangfoto}" download>
                                                                        <img src="${'storage/foto_barang/' + barangfoto}" alt="user" class="avatar-img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="text-high-em">${barangnama}</div>
                                                                <div class="fs-7" class="table-link-text link-medium-em">${barangkode}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>` + barangberat + `</td>
                                                    <td>
                                                        <input class="form-control" id="barang_id" type="hidden" value="` + barangid + `"
                                                            placeholder="Harga Beli" name="barang_id[]" />
                                                        <input class="form-control barang_berat" type="hidden" value="` + barangberat + `"
                                                            placeholder="Harga Beli" name="detail_pengeluaran_berat[]" />
                                                        <input class="form-control kadar" type="hidden" value="` + kadar + `"
                                                            placeholder="Harga Beli" name="kadar_id[]" />
                                                        <select class="form-select return_kondisi" name="detail_pengeluaran_kondisi[]">
                                                            <option value="" selected disabled>--</option>
                                                            <option value="CUCI">Cuci</option>
                                                            <option value="LEBUR">Lebur</option>
                                                            <option value="REPARASI">Reparasi</option>
                                                            <option value="ETALASE">Etalase</option>
                                                        </select>
                                                    </td>
                                                </tr>`;

                            });
                            $("#list-barang").html(listbarang)
                        }
                    });

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Select at least one item!',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }

                // ADDING KETERANGAN
                var labelket    = ` <div class="col-xl-auto mb-xl-0 mb-2">
                                    <label class="form-label mb-xl-0">Keterangan :</label>
                                </div>`;

                var keterangan  = `<div class="col-xl-auto mb-xl-0 mb-2">
                                      <textarea class="form-control" id="pengeluaran_keterangan" name="pengeluaran_keterangan"></textarea>
                                   </div>`;

                $("#keterangan-label").html(labelket)
                $("#keterangan-data").html(keterangan)

            });

            // EDIT PENGELUARAN
            $('body').on('click', '#edit-pengeluaran', function() {
                var pengeluaran_id = $(this).attr('data-id')
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#penjualanreturnForm').trigger("reset");
                $('#submitPengeluaran').html('Simpan');
                $('#tambahpenjualanreturnHeading').html("EDIT DATA PENGELUARAN BARANG")

                var submitPengeluaran = $('#submitPengeluaran'); // Note the '#' for selecting by ID
                submitPengeluaran.addClass('edit');

                $("#list-barang").html('')
                $('#pengeluaranModal').modal('show');

                $.ajax({
                    type: "POST",
                    url: "{{ route('pengeluaran.detail') }}",
                    data: {
                        pengeluaran_id: pengeluaran_id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log('edit', response)
                        const pengeluarantanggal    = response.pengeluaran_tanggal
                        const supplierdata          = response.supplier_id
                        const keterangan            = response.pengeluaran_keterangan;
                        
                        $('#pengeluaran_tanggal').val(pengeluarantanggal).prop('readonly', false)
                        
                        var detailListBarang = '';
                        var no = 1;
                        
                        $.each(response.pengeluarandetail, function (index, value) { 
                            const barangkode            = value.barang['barang_kode'];
                            const barangnama            = value.barang['barang_nama'];
                            const barangfoto            = value.barang['barang_foto'] ?? null;
                            const barangberat           = parseFloat(value['detail_pengeluaran_berat']).toFixed(2);
                            const barangberatkembali    = parseFloat(value['detail_pengeluaran_kembali']).toFixed(2);
                            const kondisi               = value['detail_pengeluaran_kondisi'];
                            const pengeluaran_nobukti   = value['pengeluaran_nobukti'];
                            const pengeluaran_id        = value['pengeluaran_id'];
                            const barang_id             = value['barang_id'];
                            const kadar                 = value['kadar_id'];

                             detailListBarang += `<tr>
                                                     <td>` + no++ + `</td>
                                                     <td>
                                                        <div class="media align-items-center">
                                                            <div class="media-head me-2">
                                                                <div class="avatar avatar-xs avatar-rounded">
                                                                    <a href="${'storage/foto_barang/' + barangfoto}" download>
                                                                        <img src="${'storage/foto_barang/' + barangfoto}" alt="user" class="avatar-img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="text-high-em">${barangnama}</div>
                                                                <div class="fs-7" class="table-link-text link-medium-em">${barangkode}</div>
                                                            </div>
                                                        </div>
                                                     </td>
                                                     <td>
                                                        <input class="form-control pengeluaran_nobukti" type="hidden" value="` + pengeluaran_nobukti + `"
                                                            placeholder="Berat Kembali" name="pengeluaran_nobukti[]" />
                                                        <input class="form-control barang_id" type="hidden" value="` + barang_id + `"
                                                            placeholder="Berat Kembali" name="barang_id[]" />
                                                        <input class="form-control kadar" type="hidden" value="` + kadar + `"
                                                            placeholder="Harga Beli" name="kadar_id[]" />
                                                        <input class="form-control barang_berat" type="number" value="` + barangberat + `"
                                                            placeholder="Harga Beli" name="detail_pengeluaran_berat[]" step="0.05" />
                                                        <input class="form-control detail_pengeluaran_kondisi" type="hidden" value="` + kondisi + `"
                                                            placeholder="Harga Beli" name="detail_pengeluaran_kondisi[]" />
                                                        <input class="form-control pengeluaran_id" type="hidden" value="` + pengeluaran_id + `"
                                                            placeholder="Harga Beli" name="pengeluaran_id[]" />
                                                    </td>
                                                     <td>` + kondisi + `</td>
                                                 </tr>`;
                        });

                        // ADDING KETERANGAN AND SUPPLIER
                        var supplierData    = @json($supplier);
                        
                        var labelsupplier   = `<div class="col-xl-auto mb-xl-0 mb-2">
                                                    <label class="form-label mb-xl-0">Supplier:</label>
                                                </div>`;

                        var supplier        = `<div class="col-xl-auto mb-xl-0 mb-2">
                                                    <select class="form-select" id="supplier_id" name="supplier_id">
                                                        <option value="" selected disabled>--</option>`;

                                                // Loop through the values of $supplier and generate <option> elements
                                                $.each(supplierData, function(index, value) {
                                                    supplier += `<option value="${value.supplier_id}">${value.supplier_nama}</option>`;
                                                });

                                                supplier += `</select>
                                                            </div>`;

                        var labelket    = ` <div class="col-xl-auto mb-xl-0 mb-2">
                                            <label class="form-label mb-xl-0">Keterangan :</label>
                                        </div>`;

                        var dataketerangan  = `<div class="col-xl-auto mb-xl-0 mb-2">
                                            <textarea class="form-control" id="pengeluaran_keterangan" name="pengeluaran_keterangan" value="` + keterangan + `"></textarea>
                                        </div>`;

                        $("#supplier-label").html(labelsupplier)
                        $("#supplier-data").html(supplier)
                        $("#keterangan-label").html(labelket)
                        $("#keterangan-data").html(dataketerangan)
                        $('#supplier_id').val(supplierdata).prop('disabled', false)
                        $('#pengeluaran_keterangan').val(keterangan)

                        $("#list-barang").html(detailListBarang)
                        $("#submitPengeluaran").prop('hidden', false);
                    }

                });

            })

            // Calculate and update the totals for each row
            $('body').on('input', '.return_berat, .return_harga_return, .return_potongan', function() {
                var row = $(this).closest('tr');
                var beratReturn = parseFloat(row.find('.return_berat').val()) || 0;
                var hargaJual = parseFloat(row.find('.return_harga_return').val()) || 0;
                var potongan = parseFloat(row.find('.return_potongan').val()) || 0;

                var total = ((beratReturn * hargaJual) -
                potongan); // Barang Berat * Harga Beli * Nilai Tukar
                var decimalPlaces =
                2; // Change this number to round to a different number of decimal places

                // Round the total value to the specified decimal places
                total = parseFloat(total.toFixed(decimalPlaces));

                row.find('.return_total').val(total);
                calculateGrandTotal();
            })

            // Calculate the grandtotal
            function calculateGrandTotal() {
                var subtotal = 0;
                $('.return_total').each(function() {
                    var totalValue = parseFloat($(this).val()) || 0;
                    subtotal += totalValue;
                });

                $('#penjualan_return_grandtotal').val(subtotal);
            }

            // RUNNING FUNCTION SUM GRAND TOTAL
            calculateGrandTotal();

            // SUBMIT PENGELUARAN
            $('#submitPengeluaran').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                var edit = $(this).hasClass('edit')

                var kondisi = $('.return_kondisi').val();

                if(kondisi == 'REPARASI'){

                    var supplier = $('#supplier_id').val();

                    if(supplier != null){

                        if(edit){
                            const swalWithBootstrapButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: "btn btn-success",
                                    cancelButton: "btn btn-danger me-2",
                                },
                                buttonsStyling: false,
                            });
            
                            var order_id  = $(this).attr('data-id')
            
                            swalWithBootstrapButtons
                                .fire({
                                    title: "Apakah Anda Yakin Akan Mengubah Data?",
                                    text: "Data Akan Diubah!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonClass: "me-2",
                                    cancelButtonText: "Tidak",
                                    confirmButtonText: "Ya",
                                    reverseButtons: true,
                                })
                                .then((result) => {

                                    if (result.value) {
            
                                        $.ajax({
                                            url: "{{ route('pengeluaran.store') }}",
                                            data: new FormData(this.form),
                                            cache: false,
                                            processData: false,
                                            contentType: false,
                                            type: "POST",
                        
                                            success: function(response) {
                                                console.log(response)
                                                if (response.errors) {
                                                    $('.alert').html('');
                                                    $.each(response.errors, function(key, value) {
                                                        $('.alert-danger').show();
                                                        $('.alert-danger').append('<strong><li>' + value +
                                                            '</li></strong>');
                                                    });
                                                    $('#submitPengeluaran').html('Simpan');
                        
                                                } else {
                                                    $('.btn-warning').hide();
                        
                                                    const Toast = Swal.mixin({
                                                        toast: true,
                                                        position: 'top-end',
                                                        showConfirmButton: false,
                                                        timer: 2000,
                                                        timerProgressBar: true,
                                                    });
                        
                                                    Toast.fire({
                                                        icon: 'success',
                                                        title: `${response.message}`,
                                                    })
                        
                                                    $('#penjualanreturnForm').trigger("reset");
                                                    $('#submitPengeluaran').html('Simpan');
                                                    $('#pengeluaranModal').modal('hide');
                        
                                                    listbarang.draw();
                                                    transaksiPengeluaran.draw();
                                                    setInterval(function() {
                                                        window.location.reload();
                                                    }, 1000);
                                                }
                                            }
                                        });
            
                                    } else {
                                        $('#submitPengeluaran').html('Simpan');
                                        Swal.fire("Cancel!", "Perintah dibatalkan!", "error");
                                    }
                                });
                        }else{
                            $.ajax({
                                url: "{{ route('pengeluaran.store') }}",
                                data: new FormData(this.form),
                                cache: false,
                                processData: false,
                                contentType: false,
                                type: "POST",
            
                                success: function(response) {
                                    console.log(response)
                                    if (response.errors) {
                                        $('.alert').html('');
                                        $.each(response.errors, function(key, value) {
                                            $('.alert-danger').show();
                                            $('.alert-danger').append('<strong><li>' + value +
                                                '</li></strong>');
                                        });
                                        $('#submitPengeluaran').html('Simpan');
            
                                    } else {
                                        $('.btn-warning').hide();
            
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 2000,
                                            timerProgressBar: true,
                                        });
            
                                        Toast.fire({
                                            icon: 'success',
                                            title: `${response.message}`,
                                        })
            
                                        $('#penjualanreturnForm').trigger("reset");
                                        $('#submitPengeluaran').html('Simpan');
                                        $('#pengeluaranModal').modal('hide');
            
                                        listbarang.draw();
                                        transaksiPengeluaran.draw();
                                        setInterval(function() {
                                            window.location.reload();
                                        }, 1000);
                                    }
                                }
                            });
                        }

                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Supplier Must Be Included!',
                            showConfirmButton: false,
                            timer: 2000
                        });

                        $('#submitPengeluaran').html('Simpan');
                    }

                }else{

                    if(edit){
                        const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                                confirmButton: "btn btn-success",
                                cancelButton: "btn btn-danger me-2",
                            },
                            buttonsStyling: false,
                        });
        
                        var order_id  = $(this).attr('data-id')
        
                        swalWithBootstrapButtons
                            .fire({
                                title: "Apakah Anda Yakin Akan Mengubah Data?",
                                text: "Data Akan Diubah!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "me-2",
                                cancelButtonText: "Tidak",
                                confirmButtonText: "Ya",
                                reverseButtons: true,
                            })
                            .then((result) => {

                                if (result.value) {
            
                                    $.ajax({
                                        url: "{{ route('pengeluaran.store') }}",
                                        data: new FormData(this.form),
                                        cache: false,
                                        processData: false,
                                        contentType: false,
                                        type: "POST",
                    
                                        success: function(response) {
                                            console.log(response)
                                            if (response.errors) {
                                                $('.alert').html('');
                                                $.each(response.errors, function(key, value) {
                                                    $('.alert-danger').show();
                                                    $('.alert-danger').append('<strong><li>' + value +
                                                        '</li></strong>');
                                                });
                                                $('#submitPengeluaran').html('Simpan');
                    
                                            } else {
                                                $('.btn-warning').hide();
                    
                                                const Toast = Swal.mixin({
                                                    toast: true,
                                                    position: 'top-end',
                                                    showConfirmButton: false,
                                                    timer: 2000,
                                                    timerProgressBar: true,
                                                });
                    
                                                Toast.fire({
                                                    icon: 'success',
                                                    title: `${response.message}`,
                                                })
                    
                                                $('#penjualanreturnForm').trigger("reset");
                                                $('#submitPengeluaran').html('Simpan');
                                                $('#pengeluaranModal').modal('hide');
                    
                                                listbarang.draw();
                                                transaksiPengeluaran.draw();
                                                setInterval(function() {
                                                    window.location.reload();
                                                }, 1000);
                                            }
                                        }
                                    });
        
                                } else {
                                    $('#submitPengeluaran').html('Simpan');
                                    Swal.fire("Cancel!", "Perintah dibatalkan!", "error");
                                }
                            });
                    }else{

                         $.ajax({
                            url: "{{ route('pengeluaran.store') }}",
                            data: new FormData(this.form),
                            cache: false,
                            processData: false,
                            contentType: false,
                            type: "POST",
        
                            success: function(response) {
                                console.log(response)
                                if (response.errors) {
                                    $('.alert').html('');
                                    $.each(response.errors, function(key, value) {
                                        $('.alert-danger').show();
                                        $('.alert-danger').append('<strong><li>' + value +
                                            '</li></strong>');
                                    });
                                    $('#submitPengeluaran').html('Simpan');
        
                                } else {
                                    $('.btn-warning').hide();
        
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        timerProgressBar: true,
                                    });
        
                                    Toast.fire({
                                        icon: 'success',
                                        title: `${response.message}`,
                                    })
        
                                    $('#penjualanreturnForm').trigger("reset");
                                    $('#submitPengeluaran').html('Simpan');
                                    $('#pengeluaranModal').modal('hide');
        
                                    listbarang.draw();
                                    transaksiPengeluaran.draw();
                                    setInterval(function() {
                                        window.location.reload();
                                    }, 1000);
                                }
                            }
                        });
                    }
                }
            });

            // DETAIL PENGELUARAN
            $('body').on('click', '#detail-pengeluaran', function() {
                var pengeluaran_id = $(this).attr('data-id')
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#penjualanreturnForm').trigger("reset");
                $('#submitPengeluaran').html('Simpan');
                $('#tambahpenjualanreturnHeading').html("SHOW DATA DETAIL PENGELUARAN BARANG")

                $("#list-barang").html('')
                $('#pengeluaranModal').modal('show');

                $.ajax({
                    type: "POST",
                    url: "{{ route('pengeluaran.detail') }}",
                    data: {
                        pengeluaran_id: pengeluaran_id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response)
                        const pengeluarantanggal    = response.pengeluaran_tanggal
                        const supplierdata          = response.supplier_id
                        const keterangan            = response.pengeluaran_keterangan;
                        
                        $('#pengeluaran_tanggal').val(pengeluarantanggal).prop('readonly', true)
                        
                        var detailListBarang = '';
                        var no = 1;
                        
                        $.each(response.pengeluarandetail, function (index, value) { 
                            const barangkode        = value.barang['barang_kode'];
                            const barangnama        = value.barang['barang_nama'];
                            const barangfoto        = value.barang['barang_foto'] ?? null;
                            const barangberat       = parseFloat(value['detail_pengeluaran_berat']).toFixed(2);
                            const kondisi           = value['detail_pengeluaran_kondisi'];

                             detailListBarang += `<tr>
                                                     <td>` + no++ + `</td>
                                                     <td>
                                                        <div class="media align-items-center">
                                                            <div class="media-head me-2">
                                                                <div class="avatar avatar-xs avatar-rounded">
                                                                    <a href="${'storage/foto_barang/' + barangfoto}" download>
                                                                        <img src="${'storage/foto_barang/' + barangfoto}" alt="user" class="avatar-img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="text-high-em">${barangnama}</div>
                                                                <div class="fs-7" class="table-link-text link-medium-em">${barangkode}</div>
                                                            </div>
                                                        </div>
                                                     </td>
                                                     <td>` + barangberat + `</td>
                                                     <td>` + kondisi + `</td>
                                                 </tr>`;
                        });

                        // ADDING KETERANGAN AND SUPPLIER
                        var supplierData    = @json($supplier);
                        
                        var labelsupplier   = `<div class="col-xl-auto mb-xl-0 mb-2">
                                                    <label class="form-label mb-xl-0">Supplier:</label>
                                                </div>`;

                        var supplier        = `<div class="col-xl-auto mb-xl-0 mb-2">
                                                    <select class="form-select" id="supplier_id" name="supplier_id">
                                                        <option value="" selected disabled>--</option>`;

                                                // Loop through the values of $supplier and generate <option> elements
                                                $.each(supplierData, function(index, value) {
                                                    supplier += `<option value="${value.supplier_id}">${value.supplier_nama}</option>`;
                                                });

                                                supplier += `</select>
                                                            </div>`;

                        var labelket    = ` <div class="col-xl-auto mb-xl-0 mb-2">
                                            <label class="form-label mb-xl-0">Keterangan :</label>
                                        </div>`;

                        var dataketerangan  = `<div class="col-xl-auto mb-xl-0 mb-2">
                                            <textarea class="form-control" id="pengeluaran_keterangan" name="pengeluaran_keterangan" value="` + keterangan + `" disabled></textarea>
                                        </div>`;

                        $("#supplier-label").html(labelsupplier)
                        $("#supplier-data").html(supplier)
                        $("#keterangan-label").html(labelket)
                        $("#keterangan-data").html(dataketerangan)
                        $('#supplier_id').val(supplierdata).prop('disabled', true)
                        $('#pengeluaran_keterangan').val(keterangan)

                        $("#list-barang").html(detailListBarang)
                        $("#submitPengeluaran").prop('hidden', true);
                    }

                });

            })

            // ADDING SUPPLIER SECTION IF SELECTION CONDITION IN : LEBUR or REPARASI
            $('body').on('change', '.return_kondisi', function(){
                var condition       = $(".return_kondisi").val();

                var supplierData    = @json($supplier);
                
                var labelsupplier   = `<div class="col-xl-auto mb-xl-0 mb-2">
                                            <label class="form-label mb-xl-0">Supplier:</label>
                                        </div>`;

                var supplier        = `<div class="col-xl-auto mb-xl-0 mb-2">
                                            <select class="form-select" id="supplier_id" name="supplier_id">
                                                <option value="" selected disabled>--</option>`;

                                        // Loop through the values of $supplier and generate <option> elements
                                        $.each(supplierData, function(index, value) {
                                            supplier += `<option value="${value.supplier_id}">${value.supplier_nama}</option>`;
                                        });

                                        supplier += `</select>
                                                    </div>`;

                if(condition == 'REPARASI'){
                    $("#supplier-label").html(labelsupplier)
                    $("#supplier-data").html(supplier)
                }else{
                    $("#supplier-label").html('')
                    $("#supplier-data").html('')    
                }
            })

            // DELETE PENGELUARAN
            $('body').on('click', '#delete-pengeluaran', function() {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2",
                    },
                    buttonsStyling: false,

                });

                var pengeluaran_id = $(this).attr('data-id');

                swalWithBootstrapButtons
                    .fire({
                        title: "Do you want to delete, this data?",
                        text: "This data will be delete!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "me-2",
                        cancelButtonText: "Tidak",
                        confirmButtonText: "Ya",
                        reverseButtons: true,
                    })
                    .then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('pengeluaran.destroy') }}",
                                data: {
                                    pengeluaran_id: pengeluaran_id,
                                },
                                dataType: "json",
                                success: function(response) {
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                    });

                                    Toast.fire({
                                        icon: 'success',
                                        title: `${response.status}`,
                                    })
                                    transaksiPengeluaran.draw();
                                }
                            });
                        } else {
                            Swal.fire("Cancel!", "Perintah dibatalkan!", "error");
                        }
                    });

            });

        })
    </script>
@endpush
