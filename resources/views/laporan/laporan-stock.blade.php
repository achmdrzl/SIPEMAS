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
            width: 20px; /* Set your desired width here */
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
                                                <label class="form-label mb-xl-0">Supplier :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="supplier-data">
                                                <select name="supplier_id" class="form-control" id="supplier_id">
                                                    <option value="-" selected disabled>-- SELECT SUPPLIER --</option>
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
                                                    <option value="-" selected disabled>-- SELECT PABRIK --</option>
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
                                                    <option value="-" selected disabled>-- SELECT KADAR --</option>
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
                                                    <option value="-" selected disabled>-- SELECT MODEL --</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl2">
                                                <input type="checkbox" class="form-check-input" id="model_checkbox">
                                            </div>
                                        </div>
                                        <div class="row gx-3 align-items-center mt-3">
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl">
                                                <label class="form-label mb-xl-0">Lokasi :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="lokasi-data">
                                                <select name="lokasi_id" class="form-control" id="lokasi_id">
                                                    <option value="-" selected disabled>-- SELECT LOKASI --</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2" id="label_tgl2">
                                                <input type="checkbox" class="form-check-input" id="lokasi_checkbox">
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
                                <h4>Laporan Stock Barang</h4>
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
                                                    <table id="datatable_7" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kode</th>
                                                                <th>Nama</th>
                                                                <th>Berat</th>
                                                                <th>Kadar</th>
                                                                <th>Model</th>
                                                                <th>Pabrik</th>
                                                                <th>Supplier</th>
                                                                <th>Lokasi</th>
                                                                <th>Harga Transaksi</th>
                                                                <th>Ket</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th></th><!-- Empty cell for alignment -->
                                                                <th>Grand Total:</th><!-- Label for total -->
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
                                <button type="button" class="btn btn-primary float-end" id="submit-print" data-jenis="rekap-stock"
                                    data-bs-dismiss="modal">Print</button>
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
            var columnsToFormat = [9];

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
            // var stockBarang = $('#datatable_7').DataTable({
            //     scrollX: true,
            //     autoWidth: false,
            //     language: {
            //         search: "",
            //         searchPlaceholder: "Search",
            //         sLengthMenu: "_MENU_item",
            //         paginate: {
            //             next: '<i class="ri-arrow-right-s-line"></i>', // or '→'
            //             previous: '<i class="ri-arrow-left-s-line"></i>' // or '←' 
            //         }
            //     },
            //     "drawCallback": function() {
            //         $('.dataTables_paginate > .pagination').addClass(
            //             'custom-pagination pagination-simple');
            //     },
            //     processing: true,
            //     serverSide: true,
            //     ajax: "{{ route('laporan.stock.index') }}",
            //     columns: [{
            //             data: 'DT_RowIndex',
            //             name: 'DT_RowIndex'
            //         },
            //         {
            //             data: 'barang_kode',
            //             name: 'barang_kode'
            //         },
            //         {
            //             data: 'barang_nama',
            //             name: 'barang_nama',
            //             className: 'custom-width-column' // Add a class for styling
            //         },
            //         {
            //             data: 'barang_berat',
            //             name: 'barang_berat'
            //         },
            //         {
            //             data: 'kadar',
            //             name: 'kadar'
            //         },
            //         {
            //             data: 'model',
            //             name: 'model'
            //         },
            //         {
            //             data: 'pabrik',
            //             name: 'pabrik'
            //         },
            //         {
            //             data: 'supplier',
            //             name: 'supplier'
            //         },
            //         {
            //             data: 'barang_lokasi',
            //             name: 'barang_lokasi'
            //         },
            //     ]
            // });

            var stockBarang = ''
            
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
                var lokasi = $('#lokasi').val();

                // stockBarang.one('preDraw', function() {
                //     // Display the loading state
                //     $('#datatable_7').addClass('loading');
                // }).draw();

                $.ajax({
                    type: "POST",
                    url: "{{ route('sorting.stock') }}",
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
                        lokasi: lokasi,
                    },
                    dataType: "JSON",
                    success: function(response) {

                        if (response.data.length > 0) {

                            // Destroy if the existing DataTable is true
                            if (stockBarang) {
                                stockBarang.destroy();
                            }

                            // Reinitialize the DataTable with the updated data
                            stockBarang = $('#datatable_7').DataTable({
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
                                        data: 'barang_kode',
                                        name: 'barang_kode'
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
                                        data: 'kadar',
                                        name: 'kadar'
                                    },
                                    {
                                        data: 'model',
                                        name: 'model'
                                    },
                                    {
                                        data: 'pabrik',
                                        name: 'pabrik'
                                    },
                                    {
                                        data: 'supplier',
                                        name: 'supplier'
                                    },
                                    {
                                        data: 'barang_lokasi',
                                        name: 'barang_lokasi'
                                    },
                                    {
                                        data: 'harga',
                                        name: 'harga'
                                    },
                                    {
                                        data: 'jenis',
                                        name: 'jenis'
                                    },
                                ],
                                columnDefs: columnDefs,
                                footerCallback: function(row, data, start, end, display) {
                                    var api = this.api();

                                    // Convert to float if data is coming as strings
                                    var harga = api
                                        .column('harga:name', {
                                            search: 'applied',
                                            filter: 'applied'
                                        })
                                        .data()
                                        .reduce(function(acc, value) {
                                            return acc + parseFloat(value);
                                        }, 0);

                                    // Update the footer cells with the calculated sums
                                    $(api.column('harga:name').footer()).html(rupiah(harga));
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

                // Destroy the existing DataTable
                // Clear and redraw the DataTable
                stockBarang.clear().draw();
                // // DISPLAY TRANSAKSI PEMBELIAN
                // stockBarang = $('#datatable_7').DataTable({
                //     scrollX: true,
                //     autoWidth: false,
                //     language: {
                //         search: "",
                //         searchPlaceholder: "Search",
                //         sLengthMenu: "_MENU_item",
                //         paginate: {
                //             next: '<i class="ri-arrow-right-s-line"></i>', // or '→'
                //             previous: '<i class="ri-arrow-left-s-line"></i>' // or '←' 
                //         }
                //     },
                //     "drawCallback": function() {
                //         $('.dataTables_paginate > .pagination').addClass(
                //             'custom-pagination pagination-simple');
                //     },
                //     processing: true,
                //     serverSide: true,
                //     ajax: "{{ route('laporan.stock.index') }}",
                //     columns: [{
                //             data: 'DT_RowIndex',
                //             name: 'DT_RowIndex'
                //         },
                //         {
                //             data: 'barang_kode',
                //             name: 'barang_kode'
                //         },
                //         {
                //             data: 'barang_nama',
                //             name: 'barang_nama',
                //             className: 'custom-width-column' // Add a class for styling
                //         },
                //         {
                //             data: 'barang_berat',
                //             name: 'barang_berat'
                //         },
                //         {
                //             data: 'kadar',
                //             name: 'kadar'
                //         },
                //         {
                //             data: 'model',
                //             name: 'model'
                //         },
                //         {
                //             data: 'pabrik',
                //             name: 'pabrik'
                //         },
                //         {
                //             data: 'supplier',
                //             name: 'supplier'
                //         },
                //         {
                //             data: 'barang_lokasi',
                //             name: 'barang_lokasi'
                //         },
                //     ]
                // });

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
                var lokasi = '';

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

                            } else if(selectId === 'lokasi_id'){
                                 lokasi += `<select name="lokasi" id="lokasi" class="form-control">
                                          <option value="-" selected>-- SELECT LOKASI --</option>`;

                                lokasi += `<option value="tampilkan-semua">TAMPILKAN SEMUA</option>`;
                                lokasi += `<option value="etalase">ETALASE</option>`;
                                lokasi += `<option value="cuci">CUCI</option>`;
                                lokasi += `<option value="lebur">LEBUR</option>`;
                                lokasi += `<option value="reparasi">REPARASI</option>`;
                                lokasi += `<option value="tdk-ada-catatan">TDK ADA CATATAN</option>`;

                                lokasi += `</select>`;

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
                            }else if(selectId === 'lokasi_id'){
                                $('#lokasi-data').html(lokasi)
                            }
                        }
                    });
                } else {
                    selectInput.attr('disabled', true);
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

            // PRINT SELECTION
            $('body').on('click', '.print-btn', function() {
                $('#saveBtn').val("create-barang");
                $('#cetaikForm').trigger("reset");
                $('#submitCetak').html('Simpan');
                $('#printHeading').html("PRINT DATA")
                $('#print_selection').modal('show');

            })

            // CETAK LAPORAN
            $('body').on('click', '#submit-print', function(){
                var namabarang   = $('#namabarang').val();
                var supplier     = $('#supplier').val();
                var pabrik       = $('#pabrik').val();
                var kadar        = $('#kadar').val();
                var model        = $('#model').val();
                var jenis        = $(this).attr('data-jenis');
                var format_print = $('#format_print').val();
                var lokasi       = $('#lokasi').val();

                var myArray = [
                    namabarang, supplier, pabrik, kadar, model, jenis, format_print, lokasi
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
                    var url = "{{ route('cetak.stock') }}?" + queryString;
    
                    
                    // Open the PDF in a new tab/window
                    window.open(url, '_blank');
                    
                    $('#form-print').trigger("reset");
                }
            })

        })
    </script>
@endpush
