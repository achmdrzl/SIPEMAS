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
                                                    class="feather-icon"><i data-feather="calendar"></i></span></span><span
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
                                <h4>Laporan Rekap Hutang</h4>
                                <div class="d-flex">
                                    <h6>Periode :</h6>
                                    <h6 id="startDate" style="margin-right: 5px; margin-left:5px;">{{ date('d M y') }}</h6>
                                    <h6>s/d</h6>
                                    <h6 id="endDate" style="margin-left: 5px;">{{ date('d M y') }}</h6>
                                </div>
                            </div>
                            <div class="email-options-wrap">
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
                                                                <th>Kode Hutang</th>
                                                                <th>Tanggal</th>
                                                                <th>Total</th>
                                                                <th>Total Bayar</th>
                                                                <th>Keterangan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th>Grand Total:</th><!-- Label for total -->
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th></th><!-- Empty cell for alignment -->
                                                            </tr>
                                                        </tfoot>
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
                                    data-jenis="rekap-hutang" data-bs-dismiss="modal">Print</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /PRINT SELECTION -->
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

            // Define an array of column indexes that need formatting
            var columnsToFormat = [3, 4];

            // Loop through the columns and apply the rendering function
            var columnDefs = columnsToFormat.map(function(columnIndex) {
                return {
                    targets: columnIndex,
                    render: function(data, type, row) {
                        if (type === 'display') {
                            // Format as Rupiah
                            return 'Rp ' + parseFloat(data).toLocaleString('id-ID');
                        }
                        return data;
                    },
                };
            });

            // DISPLAY TRANSAKSI PEMBELIAN
            var transaksiHutang = $('#datatable_7').DataTable({
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
                ajax: "{{ route('laporan.hutang.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'kode_hutang',
                        name: 'kode_hutang'
                    },
                    {
                        data: 'tgl_transaksi',
                        name: 'tgl_transaksi'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'total_bayar',
                        name: 'total_bayar'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                ],
                // Define column rendering for 'total_hutang'
                columnDefs: columnDefs,
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();

                    // Extract the 'total_hutang' data
                    var grandTotalData = api
                        .column('total:name', {
                            search: 'applied',
                            filter: 'applied'
                        })
                        .data();

                    // Extract the 'total_bayar' data
                    var grandTotalBayarData = api
                        .column('total_bayar:name', {
                            search: 'applied',
                            filter: 'applied'
                        })
                        .data();

                    // Calculate the sum
                    var grandTotal = grandTotalData.reduce(function(acc, value) {
                        return acc + parseFloat(value);
                    }, 0);

                    // Calculate the sum
                    var grandTotalBayar = grandTotalBayarData.reduce(function(acc, value) {
                        return acc + parseFloat(value);
                    }, 0);

                    // Update the footer cells with the calculated sums
                    $(api.column('total:name').footer()).html(rupiah(grandTotal));
                    $(api.column('total_bayar:name').footer()).html(rupiah(grandTotalBayar));
                },
            });

            // FILTERED DATA
            $('.show-data').on('click', function() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();

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

                transaksiHutang.one('preDraw', function() {
                    // Display the loading state
                    $('#datatable_7').addClass('loading');
                }).draw();

                $.ajax({
                    type: "POST",
                    url: "{{ route('sorting.hutang') }}",
                    data: {
                        startDate: startDate,
                        endDate: endDate,
                    },
                    dataType: "JSON",
                    success: function(response) {

                        if (response.data.length > 0) {

                            // Destroy the existing DataTable
                            transaksiHutang.destroy();

                            // Reinitialize the DataTable with the updated data
                            transaksiHutang = $('#datatable_7').DataTable({
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
                                        data: 'kode_hutang',
                                        name: 'kode_hutang'
                                    },
                                    {
                                        data: 'tgl_transaksi',
                                        name: 'tgl_transaksi'
                                    },
                                    {
                                        data: 'total',
                                        name: 'total'
                                    },
                                    {
                                        data: 'total_bayar',
                                        name: 'total_bayar'
                                    },
                                    {
                                        data: 'keterangan',
                                        name: 'keterangan'
                                    },
                                ],
                                // Define column rendering for 'pembelian_grandtotal'
                                columnDefs: columnDefs,
                                footerCallback: function(row, data, start, end,
                                    display) {
                                    var api = this.api();

                                    // Extract the 'total_hutang' data
                                    var grandTotalData = api
                                        .column('total:name', {
                                            search: 'applied',
                                            filter: 'applied'
                                        })
                                        .data();

                                    // Extract the 'total_bayar' data
                                    var grandTotalBayarData = api
                                        .column('total_bayar:name', {
                                            search: 'applied',
                                            filter: 'applied'
                                        })
                                        .data();

                                    // Calculate the sum
                                    var grandTotal = grandTotalData.reduce(function(
                                        acc, value) {
                                        return acc + parseFloat(value);
                                    }, 0);

                                    // Calculate the sum
                                    var grandTotalBayar = grandTotalBayarData
                                        .reduce(function(acc, value) {
                                            return acc + parseFloat(value);
                                        }, 0);

                                    // Update the footer cells with the calculated sums
                                    $(api.column('total:name').footer()).html(
                                        rupiah(grandTotal));
                                    $(api.column('total_bayar:name').footer()).html(
                                        rupiah(grandTotalBayar));
                                },
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
                transaksiHutang.destroy();
                // DISPLAY TRANSAKSI PEMBELIAN
                transaksiHutang = $('#datatable_7').DataTable({
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
                    ajax: "{{ route('laporan.hutang.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'kode_hutang',
                            name: 'kode_hutang'
                        },
                        {
                            data: 'tgl_transaksi',
                            name: 'tgl_transaksi'
                        },
                        {
                            data: 'total',
                            name: 'total'
                        },
                        {
                            data: 'total_bayar',
                            name: 'total_bayar'
                        },
                        {
                            data: 'keterangan',
                            name: 'keterangan'
                        },
                    ],
                    // Define column rendering for 'pembelian_grandtotal'
                    columnDefs: columnDefs,
                    footerCallback: function(row, data, start, end, display) {
                        var api = this.api();

                        // Extract the 'total_hutang' data
                        var grandTotalData = api
                            .column('total:name', {
                                search: 'applied',
                                filter: 'applied'
                            })
                            .data();

                        // Extract the 'total_bayar' data
                        var grandTotalBayarData = api
                            .column('total_bayar:name', {
                                search: 'applied',
                                filter: 'applied'
                            })
                            .data();

                        // Calculate the sum
                        var grandTotal = grandTotalData.reduce(function(acc, value) {
                            return acc + parseFloat(value);
                        }, 0);

                        // Calculate the sum
                        var grandTotalBayar = grandTotalBayarData.reduce(function(acc, value) {
                            return acc + parseFloat(value);
                        }, 0);

                        // Update the footer cells with the calculated sums
                        $(api.column('total:name').footer()).html(rupiah(grandTotal));
                        $(api.column('total_bayar:name').footer()).html(rupiah(grandTotalBayar));
                    },
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
                var format_print = $('#format_print').val();

                var myArray = [
                    startDate, endDate, format_print
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
                    var url = "{{ route('cetak.hutang') }}?" + queryString;


                    // Open the PDF in a new tab/window
                    window.open(url, '_blank');

                    $('#form-print').trigger("reset");
                }
            })

        })
    </script>
@endpush
