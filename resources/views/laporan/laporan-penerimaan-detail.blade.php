@extends('layouts.main')

@push('style-alt')
    <style>
        .custom-modal-dialog {
            max-width: 1280px;
            /* Set your desired width */
            width: 100%;
            height: 100%;
            margin: 1.75rem auto;
        }

        .custom-width-column {
            width: 400px;
            /* Set your desired width here */
        }

        .custom-width-column2 {
            width: 100px;
            /* Set your desired width here */
        }
    </style>
@endpush

@section('content')
    <!-- Main Content -->
    <div class="hk-pg-wrapper pb-0">
        <!-- Page Body -->
        <div class="hk-pg-body py-0">
            <div class="emailapp-wrap">
                <nav class="emailapp-sidebar">
                    <div data-simplebar class="nicescroll-bar">
                        <div class="menu-content-wrap">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="title-sm text-primary mb-0">Filter Data</div>
                            </div>
                            <div class="menu-group">
                                <div class="row mt-3">
                                    <div class="col-sm p-3 bg-grey-light-5 rounded">
                                        <div class="row gx-3 align-items-center">
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl">
                                                <label class="form-label mb-xl-0">Tanggal :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="input_tgl">
                                                <input class="form-control" name="start_date" id="start_date" type="date"
                                                    value="{{ date('Y-m-d') }}" />
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl2">
                                                <label class="form-label mb-xl-0">s/d</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="input_tgl2">
                                                <input class="form-control" name="end_date" id="end_date" type="date"
                                                    value="{{ date('Y-m-d') }}" />
                                            </div>
                                        </div>
                                        <div class="row gx-3 align-items-center mt-3">
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl">
                                                <label class="form-label mb-xl-0">Nama Barang :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="input_tgl">
                                                <input class="form-control" name="namabarang" id="namabarang"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="row gx-3 align-items-center mt-3">
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl">
                                                <label class="form-label mb-xl-0">No Bukti :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="input_tgl">
                                                <input class="form-control" name="nobukti" id="nobukti" type="text" />
                                            </div>
                                        </div>
                                        <div class="row gx-3 align-items-center mt-3">
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl">
                                                <label class="form-label mb-xl-0">Supplier :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="supplier-data">
                                                <select name="supplier_id" class="form-control" id="supplier_id">
                                                    <option value="#" selected disabled>-- SELECT SUPPLIER --</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl2">
                                                <input type="checkbox" class="form-check-input" id="supplier_checkbox">
                                            </div>
                                        </div>
                                        <div class="row gx-3 align-items-center mt-3">
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl">
                                                <label class="form-label mb-xl-0">Pabrik :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="pabrik-data">
                                                <select name="pabrik_id" class="form-control" id="pabrik_id">
                                                    <option value="#" selected disabled>-- SELECT PABRIK --</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl2">
                                                <input type="checkbox" class="form-check-input" id="pabrik_checkbox">
                                            </div>
                                        </div>
                                        <div class="row gx-3 align-items-center mt-3">
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl">
                                                <label class="form-label mb-xl-0">Kadar :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="kadar-data">
                                                <select name="kadar_id" class="form-control" id="kadar_id">
                                                    <option value="#" selected disabled>-- SELECT KADAR --</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl2">
                                                <input type="checkbox" class="form-check-input" id="kadar_checkbox">
                                            </div>
                                        </div>
                                        <div class="row gx-3 align-items-center mt-3">
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl">
                                                <label class="form-label mb-xl-0">Model :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="model-data">
                                                <select name="model_id" class="form-control" id="model_id">
                                                    <option value="#" selected disabled>-- SELECT MODEL --</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl2">
                                                <input type="checkbox" class="form-check-input" id="model_checkbox">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Sidebar Fixnav-->
                    <div class="emailapp-fixednav">
                        <div class="hk-toolbar">
                            <ul class="nav nav-light">
                                <li class="nav-item nav-link">
                                    <button class="btn btn-sm btn-primary show-data"><span><span class="icon"><span
                                                    class="feather-icon"><i
                                                        data-feather="calendar"></i></span></span><span
                                                class="btn-text">Tampilkan</span></span></button>
                                </li>
                                <li class="nav-item nav-link">
                                    <button class="btn btn-sm btn-secondary restart-sorting"><span><span
                                                class="icon"><span class="feather-icon"><i
                                                        data-feather="refresh-ccw"></i></span></span><span
                                                class="btn-text">Reset</span></span></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--/ Sidebar Fixnav-->
                </nav>
                <div class="emailapp-content">
                    <div class="emailapp-single-email">
                        <header class="email-header mt-2">
                            <a id="back_email_list"
                                class="btn btn-sm btn-icon btn-flush-dark btn-rounded flush-soft-hover back-user-list"
                                href="#">
                                <span class="icon"><span class="feather-icon"><i
                                            data-feather="chevron-left"></i></span></span>
                            </a>
                            <div>
                                <h4>Laporan Detail Penerimaan</h4>
                                <div class="d-flex">
                                    <h6>Periode :</h6>
                                    <h6 id="startDate" style="margin-right: 5px; margin-left:5px;">{{ date('d M y') }}
                                    </h6>
                                    <h6>s/d</h6>
                                    <h6 id="endDate" style="margin-left: 5px;">{{ date('d M y') }}</h6>
                                </div>
                            </div>
                            <div class="email-options-wrap">
                                <button class="btn btn-sm btn-primary preview-btn me-2"><span><span class="icon"><span
                                                class="feather-icon"><i data-feather="eye"></i></span></span><span
                                            class="btn-text">Preview</span></span></button>
                                <button class="btn btn-sm btn-primary print-btn"><span><span class="icon"><span
                                                class="feather-icon"><i data-feather="printer"></i></span></span><span
                                            class="btn-text">Print</span></span></button>
                            </div>
                        </header>
                        <div class="email-body">
                            <div data-simplebar class="nicescroll-bar">
                                <div class="create-invoice-wrap">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="data_pembelian">
                                            <div class="table-wrap">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PRINT SELECTION -->
            <div id="print_selection" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h6 class="text-uppercase fw-bold mb-3" id="printHeading"></h6>
                            <form id="form-print">
                                <div class="row gx-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="" class="form-label">Select Format File :</label>
                                            <select class="form-control" name="format_print" id="format_print">
                                                <option value="#" disabled selected>-- Format File --</option>
                                                <option value="excel">Excel</option>
                                                <option value="pdf">PDF</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary float-end" id="submit-print"
                                    data-jenis="detail-penerimaan" data-bs-dismiss="modal">Print</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /PRINT SELECTION -->

            {{-- Modal Tambah Penjualan --}}
            <div class="modal fade" id="penerimaanModal" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered custom-modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 id="tambahpenerimaanHeading"></h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form id="penerimaanForm">
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
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="supplier-data2">

                                            </div>

                                            <div class="col-xl-auto mb-xl-0 mb-2" id="keterangan-label">

                                            </div>

                                            <div class="col-xl-auto mb-xl-0 mb-2" id="keterangan-data">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped" id="detailTable">
                                    <thead>
                                        <th>No</th>
                                        <th class="custom-width-column2">Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Berat Asli</th>
                                        <th>Berat Kembali</th>
                                        <th>Kondisi</th>
                                    </thead>
                                    <tbody id="list-barang">
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer align-items-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" id="submitPenerimaan" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Body -->
@endsection

@push('script-alt')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // FORMAT CURRENCY
            const rupiah = (number) => {
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(number);
            }

            function formatCustomDate(dateString) {
                const [fullDate, timePart] = dateString.split(' ');
                const [year, month, day] = fullDate.split('-');

                // Map month abbreviation to full month name
                const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov',
                    'Des'
                ];
                const monthName = monthNames[parseInt(month) - 1];

                return `${day}-${monthName}-${year}`;
            }

            // Define an array of column indexes that need formatting
            var columnsToFormat = [2];

            // Loop through the columns and apply the rendering function
            var columnDefs = columnsToFormat.map(function(columnIndex) {
                return {
                    targets: columnIndex,
                    render: function(data, type, row) {
                        if (columnIndex === 2 && type === 'sort') {
                            // Return the raw date data for sorting
                            return data;
                        } else if (columnIndex === 2 && type === 'display') {
                            // Format the date for display
                            return formatCustomDate(data);
                        } else {
                            // Format as Rupiah
                            return 'Rp ' + parseFloat(data).toLocaleString('id-ID');
                        }
                    },
                };
            });

            // DISPLAY TRANSAKSI PEMBELIAN
            var transaksiPenerimaan = $('#datatable_7').DataTable({
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
                ajax: "{{ route('laporan.penerimaanDetail.index') }}",
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
                ],
                columnDefs: columnDefs,
            });

            // FILTERED DATA
            $('.show-data').on('click', function() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();
                var filterdata = $('#filterdata').val();
                var nobukti = $('#nobukti').val();
                var namabarang = $('#namabarang').val();
                var filter = $('#filter_data').val();
                var supplier = $('#supplier').val();
                var pabrik = $('#pabrik').val();
                var kadar = $('#kadar').val();
                var model = $('#model').val();

                // Convert startDate and endDate into d-M-y format
                var formattedStartDate = new Date(startDate).toLocaleDateString('en-GB', {
                    day: 'numeric',
                    month: 'short',
                    year: '2-digit'
                });
                var formattedEndDate = new Date(endDate).toLocaleDateString('en-GB', {
                    day: 'numeric',
                    month: 'short',
                    year: '2-digit'
                });

                $("#startDate").html(formattedStartDate)
                $("#endDate").html(formattedEndDate)

                transaksiPenerimaan.one('preDraw', function() {
                    // Display the loading state
                    $('#datatable_7').addClass('loading');
                }).draw();

                $.ajax({
                    type: "POST",
                    url: "{{ route('sorting.penerimaan') }}",
                    data: {
                        startDate: startDate,
                        endDate: endDate,
                        filterdata: filterdata,
                        filter: filter,
                        nobukti: nobukti,
                        namabarang: namabarang,
                        supplier: supplier,
                        pabrik: pabrik,
                        kadar: kadar,
                        model: model,
                    },
                    dataType: "JSON",
                    success: function(response) {

                        if (response.data.length > 0) {

                            // Destroy the existing DataTable
                            transaksiPenerimaan.destroy();

                            // Reinitialize the DataTable with the updated data
                            transaksiPenerimaan = $('#datatable_7').DataTable({
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
                                ],
                                columnDefs: columnDefs,
                            });

                            // Hide the loading state
                            $('#datatable_7').removeClass('loading');

                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Data not found!',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    }
                });

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2",
                    },
                    buttonsStyling: false,

                });

                swalWithBootstrapButtons
                    .fire({
                        title: "Apakah Anda Yakin Akan Preview Data?",
                        text: "Akan menampilkan preview data!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "me-2",
                        cancelButtonText: "Tidak",
                        confirmButtonText: "Ya",
                        reverseButtons: true,
                    })
                    .then((result) => {
                        if (result.value) {
                            var myArray = [
                                startDate, endDate, nobukti, namabarang, filter, supplier, pabrik,
                                kadar, model
                            ];

                            // Convert the array to a query parameter string
                            var queryString = 'data=' + JSON.stringify(myArray);

                            // Create the URL with query parameters
                            var url = "{{ route('preview.penerimaan') }}?" + queryString;


                            // Open the PDF in a new tab/window
                            window.open(url, '_blank');

                        } else {
                            Swal.fire("Cancel!", "Perintah dibatalkan!", "error");
                        }
                    });
            });

            // RESTART FILTER
            $(".restart-sorting").on('click', function() {
                $('#supplier_id').val('').prop('disabled', true);
                $('#pabrik_id').val('').prop('disabled', true);
                $('#model_id').val('').prop('disabled', true);
                $('#kadar_id').prop('selectedIndex', -1).prop('disabled', true);

                // Get the current date
                var currentDate = new Date();

                // Format the current date as 'yyyy-MM-dd'
                var formattedDate = currentDate.getFullYear() + '-' + (currentDate.getMonth() + 1)
                    .toString().padStart(2, '0') + '-' + currentDate.getDate().toString().padStart(2, '0');

                // Set the values of startDate and endDate inputs
                $('#start_date').val(formattedDate);
                $('#end_date').val(formattedDate);

                // Convert startDate and endDate into d-M-y format
                var formattedStartDate = new Date(currentDate).toLocaleDateString('en-GB', {
                    day: 'numeric',
                    month: 'short',
                    year: '2-digit'
                });
                var formattedEndDate = new Date(currentDate).toLocaleDateString('en-GB', {
                    day: 'numeric',
                    month: 'short',
                    year: '2-digit'
                });

                // Set the HTML content of startDate and endDate elements
                $("#startDate").text(formattedStartDate);
                $("#endDate").text(formattedEndDate);

                // Destroy the existing DataTable
                transaksiPenerimaan.destroy();
                // DISPLAY TRANSAKSI PEMBELIAN
                transaksiPenerimaan = $('#datatable_7').DataTable({
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
                    ajax: "{{ route('laporan.penerimaanDetail.index') }}",
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

            // CHECKBOX DISABLED CHECK
            // Cache the checkbox and select input elements
            const checkboxes = $('[id$="_checkbox"]');
            const selectInputs = $('[id$="_id"]');

            // Initially disable all select inputs
            selectInputs.prop('disabled', true);

            // Add event listener to all checkboxes
            checkboxes.on('change', function() {
                const checkboxId = $(this).attr('id');
                const selectId = checkboxId.replace('_checkbox', '_id');
                const selectInput = $('#' + selectId);

                const cleanedValue = selectId.replace('_id', '').toUpperCase();

                var filter = ''
                var supplier = '';
                var pabrik = '';
                var kadar = '';
                var model = '';

                if ($(this).prop('checked')) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('filter_data') }}",
                        data: {
                            filterdata: selectId,
                        },
                        dataType: "JSON",
                        success: function(response) {
                            console.log(response)

                            filter += `<select name="filterdata" id="filterdata" class="form-control">
                                        <option value="-" selected>-- SELECT ` + cleanedValue + ` --</option>`;

                            // CHECK FOR FILTERING DATA USING SELECT OPTION

                            if (selectId === 'supplier_id') {

                                supplier += `<select name="supplier" id="supplier" class="form-control">
                                             <option value="-" selected>-- SELECT SUPPLIER --</option>`;
                                $.each(response.supplier, function(index, value) {
                                    const supplier_id = value['supplier_id']
                                    const supplier_nama = value['supplier_nama']

                                    supplier += `<option value="` + supplier_id + `">` +
                                        supplier_nama + `</option>`;
                                });

                                supplier += `</select>`;

                            } else if (selectId === 'pabrik_id') {

                                pabrik += `<select name="pabrik" id="pabrik" class="form-control">
                                           <option value="-" selected>-- SELECT PABRIK --</option>`;
                                $.each(response.pabrik, function(index, value) {
                                    const pabrik_id = value['pabrik_id']
                                    const pabrik_nama = value['pabrik_nama']

                                    pabrik += `<option value="` + pabrik_id + `">` +
                                        pabrik_nama + `</option>`;
                                });

                                pabrik += `</select>`;

                            } else if (selectId === 'kadar_id') {

                                kadar += `<select name="kadar" id="kadar" class="form-control">
                                          <option value="-" selected>-- SELECT KADAR --</option>`;
                                $.each(response.kadar, function(index, value) {
                                    const kadar_id = value['kadar_id']
                                    const kadar_nama = value['kadar_nama']

                                    kadar += `<option value="` + kadar_id + `">` +
                                        kadar_nama + `</option>`;
                                });

                                kadar += `</select>`;

                            } else if (selectId === 'model_id') {

                                model += `<select name="model" id="model" class="form-control">
                                          <option value="-" selected>-- SELECT MODEL --</option>`;
                                $.each(response.model, function(index, value) {
                                    const model_id = value['model_id']
                                    const model_nama = value['model_nama']

                                    model += `<option value="` + model_id + `">` +
                                        model_nama + `</option>`;
                                });

                                model += `</select>`;

                            }

                            filter += `</select>`;

                            if (selectId === 'supplier_id') {
                                $('#supplier-data').html(supplier)

                            } else if (selectId === 'pabrik_id') {
                                $('#pabrik-data').html(pabrik)

                            } else if (selectId === 'kadar_id') {
                                $('#kadar-data').html(kadar)

                            } else if (selectId === 'model_id') {
                                $('#model-data').html(model)
                            }
                        }
                    });
                } else {
                    selectInput.prop('disabled', true);
                }
            });

            // Check initial state of checkboxes and enable corresponding select inputs if checked
            checkboxes.each(function() {
                const checkboxId = $(this).attr('id');
                const selectId = checkboxId.replace('_checkbox', '_id');
                const selectInput = $('#' + selectId);

                if ($(this).prop('checked')) {
                    selectInput.prop('disabled', false);
                }
            });

            // DETAIL PENGELUARAN
            $('body').on('click', '#detail-penerimaan', function() {
                var pengeluaran_id = $(this).attr('data-id')
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#penerimaanForm').trigger("reset");
                $('#submitPenerimaan').html('Simpan');
                $('#tambahpenerimaanHeading').html("SHOW DATA DETAIL PENERIMAAN BARANG")

                $("#list-barang").html('')
                $('#penerimaanModal').modal('show');

                $.ajax({
                    type: "POST",
                    url: "{{ route('pengeluaran.detail') }}",
                    data: {
                        pengeluaran_id: pengeluaran_id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response)
                        const pengeluarantanggal = response.pengeluaran_tanggal
                        const supplierdata = response.supplier_id
                        const keterangan = response.pengeluaran_keterangan;

                        $('#pengeluaran_tanggal').val(pengeluarantanggal).prop('readonly', true)

                        var detailListBarang = '';
                        var no = 1;
                        $.each(response.pengeluarandetail, function(index, value) {
                            const barangkode = value.barang['barang_kode'];
                            const barangnama = value.barang['barang_nama'];
                            const barangberat = value['detail_pengeluaran_berat'];
                            const barangberatkembali = value[
                                'detail_pengeluaran_kembali'];
                            const kondisi = value['detail_pengeluaran_kondisi'];

                            detailListBarang += `<tr>
                                                     <td>` + no++ + `</td>
                                                     <td>` + barangkode + `</td>
                                                     <td class="custom-width-column">` + barangnama + `</td>
                                                     <td>` + barangberat + `</td>
                                                     <td>` + barangberatkembali + `</td>
                                                     <td>` + kondisi + `</td>
                                                 </tr>`;
                        });

                        // ADDING KETERANGAN AND SUPPLIER
                        var supplierData = @json($supplier);

                        var labelsupplier = `<div class="col-xl-auto mb-xl-0 mb-2">
                                                    <label class="form-label mb-xl-0">Supplier:</label>
                                                </div>`;

                        var supplier = `<div class="col-xl-auto mb-xl-0 mb-2">
                                                    <select class="form-select" id="supplier_id2" name="supplier_id">
                                                        <option value="" selected disabled>--</option>`;

                        // Loop through the values of $supplier and generate <option> elements
                        $.each(supplierData, function(index, value) {
                            supplier +=
                                `<option value="${value.supplier_id}">${value.supplier_nama}</option>`;
                        });

                        supplier += `</select>
                                                            </div>`;

                        var labelket = ` <div class="col-xl-auto mb-xl-0 mb-2">
                                            <label class="form-label mb-xl-0">Keterangan :</label>
                                        </div>`;

                        var dataketerangan =
                            `<div class="col-xl-auto mb-xl-0 mb-2">
                                            <textarea class="form-control" id="pengeluaran_keterangan" name="pengeluaran_keterangan" value="` +
                            keterangan + `" disabled></textarea>
                                        </div>`;

                        $("#supplier-label").html(labelsupplier)
                        $("#supplier-data2").html(supplier)
                        $("#keterangan-label").html(labelket)
                        $("#keterangan-data").html(dataketerangan)
                        $('#supplier_id2').val(supplierdata).prop('disabled', true)
                        $('#pengeluaran_keterangan').val(keterangan)

                        $("#list-barang").html(detailListBarang)
                        $("#submitPenerimaan").prop('hidden', true);
                    }

                });

            })

            // PRINT SELECTION
            $('body').on('click', '.print-btn', function() {
                $('#saveBtn').val("create-barang");
                $('#cetaikForm').trigger("reset");
                $('#submitCetak').html('Simpan');
                $('#printHeading').html("PRINT DATA")
                $('#print_selection').modal('show');

            })

            // CETAK LAPORAN
            $('body').on('click', '#submit-print', function() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();
                var nobukti = $('#nobukti').val();
                var namabarang = $('#namabarang').val();
                var filter = $('#filter_data').val();
                var supplier = $('#supplier').val();
                var pabrik = $('#pabrik').val();
                var kadar = $('#kadar').val();
                var model = $('#model').val();
                var jenis = $(this).attr('data-jenis');
                var format_print = $('#format_print').val();

                var myArray = [
                    startDate, endDate, nobukti, namabarang, filter, supplier, pabrik, kadar, model,
                    jenis, format_print
                ];

                if (format_print === null) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Data format has not been selected!',
                        showConfirmButton: false,
                        timer: 2000
                    });
                } else {
                    // Convert the array to a query parameter string
                    var queryString = 'data=' + JSON.stringify(myArray);

                    // Create the URL with query parameters
                    var url = "{{ route('cetak.penerimaan') }}?" + queryString;


                    // Open the PDF in a new tab/window
                    window.open(url, '_blank');

                    $('#form-print').trigger("reset");
                }
            })

            // PREVIEW LAPORAN
            $('body').on('click', '.preview-btn', function() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();
                var nobukti = $('#nobukti').val();
                var namabarang = $('#namabarang').val();
                var filter = $('#filter_data').val();
                var supplier = $('#supplier').val();
                var pabrik = $('#pabrik').val();
                var kadar = $('#kadar').val();
                var model = $('#model').val();

                var myArray = [
                    startDate, endDate, nobukti, namabarang, filter, supplier, pabrik, kadar, model
                ];

                // Convert the array to a query parameter string
                var queryString = 'data=' + JSON.stringify(myArray);

                // Create the URL with query parameters
                var url = "{{ route('preview.penerimaan') }}?" + queryString;


                // Open the PDF in a new tab/window
                window.open(url, '_blank');

            })

        })
    </script>
@endpush
