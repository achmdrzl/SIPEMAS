@extends('layouts.main')

@push('style-alt')
    <style>
        .custom-modal-dialog {
            max-width: 1280px;
            /* Set your desired width */
            width: 100%;
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
                                <h4>Laporan Detail Penjualan</h4>
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
                                                                <th>No Faktur</th>
                                                                <th>Tanggal</th>
                                                                <th>Jenis</th>
                                                                <th>Harga blm PPN</th>
                                                                <th>PPN</th>
                                                                <th>Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th>Grand Total:</th><!-- Label for total -->
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th></th><!-- Empty cell for alignment -->
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
                                <button type="button" class="btn btn-primary float-end" id="submit-print" data-jenis="detail-penjualan"
                                    data-bs-dismiss="modal">Print</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /PRINT SELECTION -->

            {{-- Modal Tambah Penjualan --}}
            <div class="modal fade" id="penjualanModal" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered custom-modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 id="tambahpenjualanHeading"></h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form id="penjualanForm">
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
                                                <input class="form-control" type="date" id="penjualan_tanggal" name="penjualan_tanggal" value="{{ date('Y-m-d') }}" />
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <label class="form-label mb-xl-0">Keterangan :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <textarea class="form-control" id="penjualan_keterangan" name="penjualan_keterangan"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-md p-2 bg-grey-light-5 rounded">
                                        <div class="row align-items-center">
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <label class="form-label mb-xl-0">No Faktur :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <input class="form-control" type="text" value="FP230501001" readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <table class="table nowrap table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kadar</th>
                                        <th>Berat Asli</th>
                                        <th>Berat Jual</th>
                                        <th>Harga</th>
                                        <th>Ongkos</th>
                                        <th>Diskon</th>
                                        <th>Jumlah Harga</th>
                                    </thead>
                                    <tbody id="list-barang">
                                    </tbody>
                                </table>
                                <div class="row justify-content-end">
                                    <div class="col-xxl-8 mt-5">
                                        <div class="table-wrap">
                                            <div class="table-responsive">
                                                <table class="table table-bordered subtotal-table">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3"
                                                                class="rounded-top-start border-end-0 border-bottom-0">Subtotal :
                                                            </td>
                                                            <td class="rounded-top-end border-bottom-0 w-30 bg-primary-light-5">
                                                                <input type="number"
                                                                    class="form-control bg-transparent border-0 p-0 gross-total"
                                                                    value="0" id="penjualan_subtotal" name="penjualan_subtotal" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border-end-0 border-bottom-0">Diskon : </td>
                                                            <td colspan="2" class="border-end-0 border-bottom-0 w-25"><input
                                                                    type="number" class="form-control"
                                                                    value="0" id="inputdiskon" name="inputdiskon"></td>
                                                            <td class="border-bottom-0  bg-primary-light-5"><input type="number"
                                                                    class="form-control bg-transparent border-0 p-0"
                                                                    value="0" id="penjualan_diskon" name="penjualan_diskon" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"
                                                                class="rounded-bottom-start border-end-0 bg-primary-light-5"><span
                                                                    class="text-dark">Total</span></td>
                                                            <td class="rounded-bottom-end  bg-primary-light-5"><input
                                                                    type="number"
                                                                    class="form-control bg-transparent border-0 p-0"
                                                                    value="0" id="penjualan_grandtotal" name="penjualan_grandtotal" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border-end-0 border-bottom-0">Tunai : </td>
                                                            <td colspan="2" class="border-end-0 border-bottom-0 w-25"><input
                                                                    type="number" class="form-control"
                                                                    value="0" id="inputtunai" name="inputtunai"></td>
                                                            <td class="border-bottom-0  bg-primary-light-5"><input type="number"
                                                                    class="form-control bg-transparent border-0 p-0"
                                                                    value="0" id="penjualan_tunai" name="penjualan_tunai" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"
                                                                class="rounded-top-start border-end-0 border-bottom-0">Kembalian :
                                                            </td>
                                                            <td class="rounded-top-end border-bottom-0 w-30 bg-primary-light-5">
                                                                <input type="number"
                                                                    class="form-control bg-transparent border-0 p-0"
                                                                    value="0" id="penjualan_kembalian" name="penjualan_kembalian" readonly>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer align-items-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" id="submitPenjualan" class="btn btn-primary">Simpan</button>
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

            // Define an array of column indexes that need formatting
            var columnsToFormat = [4, 5, 6];

            // Loop through the columns and apply the rendering function
            var columnDefs = columnsToFormat.map(function (columnIndex) {
                return {
                    targets: columnIndex,
                    render: function (data, type, row) {
                        if (type === 'display') {
                            // Format as Rupiah
                            return 'Rp ' + parseFloat(data).toLocaleString('id-ID');
                        }
                        return data;
                    },
                };
            });

            var transaksiPenjualan = $('#datatable_7').DataTable({
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
                ajax: "{{ route('laporan.penjualanDetail.index') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'penjualan_nobukti',
                        name: 'penjualan_nobukti'
                    },
                    {
                        data: 'penjualan_tanggal',
                        name: 'penjualan_tanggal'
                    },  
                    {
                        data: 'penjualan_jenis',
                        name: 'penjualan_jenis'
                    },
                    {
                        data: 'penjualan_subtotal',
                        name: 'penjualan_subtotal'
                    },
                    {
                        data: 'penjualan_ppn',
                        name: 'penjualan_ppn'
                    },
                    {
                        data: 'penjualan_grandtotal',
                        name: 'penjualan_grandtotal'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                columnDefs: columnDefs,
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();

                    // Convert to float if data is coming as strings
                    var subtotal = api
                        .column('penjualan_subtotal:name', {
                            search: 'applied',
                            filter: 'applied'
                        })
                        .data()
                        .reduce(function(acc, value) {
                            return acc + parseFloat(value);
                        }, 0);
                    // Convert to float if data is coming as strings
                    var ppn = api
                        .column('penjualan_ppn:name', {
                            search: 'applied',
                            filter: 'applied'
                        })
                        .data()
                        .reduce(function(acc, value) {
                            return acc + parseFloat(value);
                        }, 0);
                    // Convert to float if data is coming as strings
                    var grandTotal = api
                        .column('penjualan_grandtotal:name', {
                            search: 'applied',
                            filter: 'applied'
                        })
                        .data()
                        .reduce(function(acc, value) {
                            return acc + parseFloat(value);
                        }, 0);

                    // Update the footer cells with the calculated sums
                    $(api.column('penjualan_subtotal:name').footer()).html(rupiah(subtotal));
                    $(api.column('penjualan_ppn:name').footer()).html(rupiah(ppn));
                    $(api.column('penjualan_grandtotal:name').footer()).html(rupiah(grandTotal));
                },
            });

            // FILTERED DATA
            $('.show-data').on('click', function() {
                var startDate  = $('#start_date').val();
                var endDate    = $('#end_date').val();
                var filterdata = $('#filterdata').val();
                var nobukti    = $('#nobukti').val();
                var namabarang = $('#namabarang').val();
                var filter     = $('#filter_data').val();
                var supplier   = $('#supplier').val();
                var pabrik     = $('#pabrik').val();
                var kadar      = $('#kadar').val();
                var model      = $('#model').val();

                // Convert startDate and endDate into d-M-y format
                var formattedStartDate = new Date(startDate).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: '2-digit' });
                var formattedEndDate = new Date(endDate).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: '2-digit' });

                $("#startDate").html(formattedStartDate)
                $("#endDate").html(formattedEndDate)

                transaksiPenjualan.one('preDraw', function() {
                    // Display the loading state
                    $('#datatable_7').addClass('loading');
                }).draw();

                $.ajax({
                    type: "POST",
                    url: "{{ route('sorting.penjualan') }}",
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
                        console.log(response)
                        if (response.data.length > 0) {

                            // Destroy the existing DataTable
                            transaksiPenjualan.destroy();

                            // Reinitialize the DataTable with the updated data
                            transaksiPenjualan = $('#datatable_7').DataTable({
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
                                columns: [
                                    {
                                        data: 'DT_RowIndex',
                                        name: 'DT_RowIndex'
                                    },
                                    {
                                        data: 'penjualan_nobukti',
                                        name: 'penjualan_nobukti'
                                    },
                                    {
                                        data: 'penjualan_tanggal',
                                        name: 'penjualan_tanggal'
                                    },  
                                    {
                                        data: 'penjualan_jenis',
                                        name: 'penjualan_jenis'
                                    },
                                    {
                                        data: 'penjualan_subtotal',
                                        name: 'penjualan_subtotal'
                                    },
                                    {
                                        data: 'penjualan_ppn',
                                        name: 'penjualan_ppn'
                                    },
                                    {
                                        data: 'penjualan_grandtotal',
                                        name: 'penjualan_grandtotal'
                                    },
                                    {
                                        data: 'action',
                                        name: 'action'
                                    },
                                ],
                                columnDefs: columnDefs,
                                footerCallback: function(row, data, start, end, display) {
                                    var api = this.api();

                                    // Convert to float if data is coming as strings
                                    var subtotal = api
                                        .column('penjualan_subtotal:name', {
                                            search: 'applied',
                                            filter: 'applied'
                                        })
                                        .data()
                                        .reduce(function(acc, value) {
                                            return acc + parseFloat(value);
                                        }, 0);
                                    // Convert to float if data is coming as strings
                                    var ppn = api
                                        .column('penjualan_ppn:name', {
                                            search: 'applied',
                                            filter: 'applied'
                                        })
                                        .data()
                                        .reduce(function(acc, value) {
                                            return acc + parseFloat(value);
                                        }, 0);
                                    // Convert to float if data is coming as strings
                                    var grandTotal = api
                                        .column('penjualan_grandtotal:name', {
                                            search: 'applied',
                                            filter: 'applied'
                                        })
                                        .data()
                                        .reduce(function(acc, value) {
                                            return acc + parseFloat(value);
                                        }, 0);

                                    // Update the footer cells with the calculated sums
                                    $(api.column('penjualan_subtotal:name').footer()).html(rupiah(subtotal));
                                    $(api.column('penjualan_ppn:name').footer()).html(rupiah(ppn));
                                    $(api.column('penjualan_grandtotal:name').footer()).html(rupiah(grandTotal));
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
                var formattedDate = currentDate.getFullYear() + '-' + (currentDate.getMonth() + 1).toString().padStart(2, '0') + '-' + currentDate.getDate().toString().padStart(2, '0');

                // Set the values of startDate and endDate inputs
                $('#start_date').val(formattedDate);
                $('#end_date').val(formattedDate);

                // Convert startDate and endDate into d-M-y format
                var formattedStartDate = new Date(currentDate).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: '2-digit' });
                var formattedEndDate = new Date(currentDate).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: '2-digit' });

                // Set the HTML content of startDate and endDate elements
                $("#startDate").text(formattedStartDate);
                $("#endDate").text(formattedEndDate);

                // Destroy the existing DataTable
                transaksiPenjualan.destroy();
                // DISPLAY TRANSAKSI PEMBELIAN
                transaksiPenjualan = $('#datatable_7').DataTable({
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
                    ajax: "{{ route('laporan.penjualanDetail.index') }}",
                    columns: [
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'penjualan_nobukti',
                            name: 'penjualan_nobukti'
                        },
                        {
                            data: 'penjualan_tanggal',
                            name: 'penjualan_tanggal'
                        },  
                        {
                            data: 'penjualan_jenis',
                            name: 'penjualan_jenis'
                        },
                        {
                            data: 'penjualan_subtotal',
                            name: 'penjualan_subtotal'
                        },
                        {
                            data: 'penjualan_ppn',
                            name: 'penjualan_ppn'
                        },
                        {
                            data: 'penjualan_grandtotal',
                            name: 'penjualan_grandtotal'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ],
                    columnDefs: columnDefs,
                    footerCallback: function(row, data, start, end, display) {
                        var api = this.api();

                        // Convert to float if data is coming as strings
                        var subtotal = api
                            .column('penjualan_subtotal:name', {
                                search: 'applied',
                                filter: 'applied'
                            })
                            .data()
                            .reduce(function(acc, value) {
                                return acc + parseFloat(value);
                            }, 0);
                        // Convert to float if data is coming as strings
                        var ppn = api
                            .column('penjualan_ppn:name', {
                                search: 'applied',
                                filter: 'applied'
                            })
                            .data()
                            .reduce(function(acc, value) {
                                return acc + parseFloat(value);
                            }, 0);
                        // Convert to float if data is coming as strings
                        var grandTotal = api
                            .column('penjualan_grandtotal:name', {
                                search: 'applied',
                                filter: 'applied'
                            })
                            .data()
                            .reduce(function(acc, value) {
                                return acc + parseFloat(value);
                            }, 0);

                        // Update the footer cells with the calculated sums
                        $(api.column('penjualan_subtotal:name').footer()).html(rupiah(subtotal));
                        $(api.column('penjualan_ppn:name').footer()).html(rupiah(ppn));
                        $(api.column('penjualan_grandtotal:name').footer()).html(rupiah(grandTotal));
                    },
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

            // DETAIL PEMBELIAN
            $('body').on('click', '#detail-penjualan', function(){
                var penjualan_id = $(this).attr('data-id')
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#penjualanForm').trigger("reset");
                $('#submitPenjualan').html('Simpan');
                $('#tambahpenjualanHeading').html("SHOW DATA DETAIL PENJUALAN")

                $("#list-barang").html('')
                $('#penjualanModal').modal('show');

                $.ajax({
                    type: "POST",
                    url: "{{ route('penjualan.detail') }}",
                    data: {
                        penjualan_id: penjualan_id,
                    },
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response)
                        const penjualan_tanggal = response.penjualan_tanggal;
                        const keterangan        = response.penjualan_keterangan;
                        const subtotal          = response.penjualan_subtotal;
                        const diskon            = response.penjualan_diskon ?? 0;
                        const bayar             = response.penjualan_bayar;
                        const grandtotal        = response.penjualan_grandtotal;
                        const kembalian         = response.penjualan_kembalian;

                        $("#penjualan_tanggal").val(penjualan_tanggal).prop('readonly', true)
                        $("#penjualan_keterangan").val(keterangan).prop('readonly', true)
                        $('#inputdiskon').val(diskon).prop('readonly', true);
                        $('#inputtunai').val(bayar).prop('readonly', true);               
                        $('#penjualan_subtotal').val(subtotal)                
                        $('#penjualan_diskon').val(diskon)
                        $('#penjualan_kembalian').val(kembalian)
                        $('#penjualan_tunai').val(bayar)
                        $('#penjualan_grandtotal').val(grandtotal)

                        var detailListBarang = '';
                        var no = 1;
                        $.each(response.penjualandetail, function (index, value) {
                            const kadar         = value['barang']['kadar']['kadar_nama']
                            const berat_jual    = value['detail_penjualan_berat_jual']
                            const harga         = value['detail_penjualan_harga']
                            const ongkos        = value['detail_penjualan_ongkos'] ?? 0
                            const diskondetail  = value['detail_penjualan_diskon'] ?? 0
                            const total         = value['detail_penjualan_jml_harga']

                            const barang_kode   = value['barang']['barang_kode']
                            const barang_nama   = value['barang']['barang_nama']
                            const barang_berat  = value['barang']['barang_berat']

                            detailListBarang += `<tr>
                                                    <td>`+ no++ +`</td>
                                                    <td>`+ barang_kode +`</td>
                                                    <td>`+ barang_nama +`</td>
                                                    <td>`+ kadar +`</td>
                                                    <td>`+ barang_berat +`</td>
                                                    <td>
                                                        <input class="form-control penjualan_berat_jual" type="number"
                                                            placeholder="Berat Jual" name="detail_penjualan_berat_jual[]" value="`+ berat_jual +`" readonly />
                                                    </td>
                                                    <td> <input class="form-control penjualan_harga" type="number" value="`+ harga +`"
                                                            placeholder="Harga" name="detail_penjualan_harga[]" readonly />
                                                    </td>
                                                    <td> <input class="form-control penjualan_ongkos" type="number" value="`+ ongkos +`"
                                                            placeholder="Ongkos" name="detail_penjualan_ongkos[]" readonly />
                                                    </td>
                                                    <td> <input class="form-control penjualan_diskon" type="number" value="`+ diskondetail +`"
                                                            placeholder="Diskon" name="detail_penjualan_diskon[]" readonly />
                                                    </td>
                                                    <td> <input class="form-control penjualan_total" type="number" value="`+ total +`"
                                                            placeholder="Jumlah Harga" name="detail_penjualan_total[]" readonly />
                                                    </td>
                                             </tr>`;
                        });

                        $("#list-barang").html(detailListBarang)
                        $("#submitPenjualan").prop('hidden', true);
                    }

                });

            })

            // PRINT SELECTION
            $('body').on('click', '.print-btn', function(){
                $('#saveBtn').val("create-barang");
                $('#cetaikForm').trigger("reset");
                $('#submitCetak').html('Simpan');
                $('#printHeading').html("PRINT DATA")
                $('#print_selection').modal('show');

            })

            // CETAK LAPORAN
            $('body').on('click', '#submit-print', function(){
                var startDate    = $('#start_date').val();
                var endDate      = $('#end_date').val();
                var nobukti      = $('#nobukti').val();
                var namabarang   = $('#namabarang').val();
                var filter       = $('#filter_data').val();
                var supplier     = $('#supplier').val();
                var pabrik       = $('#pabrik').val();
                var kadar        = $('#kadar').val();
                var model        = $('#model').val();
                var jenis        = $(this).attr('data-jenis');
                var format_print = $('#format_print').val();

                var myArray = [
                    startDate, endDate, nobukti, namabarang, filter, supplier, pabrik, kadar, model, jenis, format_print
                ];

                if(format_print === null){
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Data format has not been selected!',
                            showConfirmButton: false,
                            timer: 2000
                        });
                }else{
                    // Convert the array to a query parameter string
                    var queryString = 'data=' + JSON.stringify(myArray);
    
                    // Create the URL with query parameters
                    var url = "{{ route('cetak.penjualan') }}?" + queryString;
    
                    
                    // Open the PDF in a new tab/window
                    window.open(url, '_blank');
                    
                    $('#form-print').trigger("reset");
                }
            })

        })
    </script>
@endpush
