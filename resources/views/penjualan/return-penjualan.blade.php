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

    <script>
        function test(element) {

            var val = element.value;

            // Remove commas from the input value
            var unformattedValue = val.replace(/,/g, '');

            // Add the 'data-value' attribute with the unformatted value
            element.setAttribute('data-value', unformattedValue);

            // Format the value with addCommas
            element.value = addCommas(unformattedValue);
        }

        function addCommas(str) {
            return str.replace(/^0+/, '').replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
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
                            <h1 class="pg-title">Transaksi Return Penjualan</h1>
                            <p>Restock Kebutuhan Barang Pada Toko Emas</p>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-line nav-light nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#data_penjualan">
                            <span class="nav-link-text">Data Return Penjualan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#input_penjualan">
                            <span class="nav-link-text">Input Return Penjualan</span>
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
                                                            <th>No Faktur</th>
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
                                                                class="btn btn-sm btn-primary ms-3 create-penjualan-return"><span><span
                                                                        class="icon"><span class="feather-icon"><i
                                                                                data-feather="plus"></i></span></span><span
                                                                        class="btn-text">Tambah Return
                                                                        Penjualan</span></span></button>
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
        <div class="modal fade" id="penjualanreturnModal" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered custom-modal-dialog" role="document">
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
                                            <input class="form-control" type="date" id="penjualan_return_tanggal"
                                                name="penjualan_return_tanggal" value="{{ date('Y-m-d') }}" />
                                        </div>
                                        <div class="col-xl-auto mb-xl-0 mb-2" id="supplier-label">
                                            
                                        </div>
                                        <div class="col-xl-auto mb-xl-0 mb-2" id="supplier-data">
                                            
                                        </div>

                                        <div class="col-xl-auto mb-xl-0 mb-2" id="keterangan-label">
                                            
                                        </div>

                                        <div class="col-xl-auto mb-xl-0 mb-2" id="keterangan-data">
                                            
                                        </div>
                                        
                                        <div class="col-xl-auto mb-xl-0 mb-2">
                                            <label class="form-label mb-xl-0">Keterangan :</label>
                                        </div>
                                        <div class="col-xl-auto mb-xl-0 mb-2">
                                            <textarea class="form-control" id="penjualan_return_keterangan" name="penjualan_return_keterangan"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Berat Asli</th>
                                    <th>Berat Return</th>
                                    <th>Harga Jual</th>
                                    <th>Harga Return</th>
                                    <th>Potongan</th>
                                    <th>Jumlah</th>
                                    <th>Kondisi</th>
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
                                                            class="rounded-bottom-start border-end-0 bg-primary-light-5">
                                                            <span class="text-dark">Total</span></td>
                                                        <td class="rounded-bottom-end  bg-primary-light-5"><input
                                                                type="text"
                                                                class="form-control bg-transparent border-0 p-0"
                                                                value="0" id="penjualan_return_grandtotal"
                                                                name="penjualan_return_grandtotal" readonly></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer align-items-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" id="submitPenjualanReturn" class="btn btn-primary">Simpan</button>
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

            // FORMAT CURRENCY
            const rupiah = (number) => {
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(number);
            }

            var transaksiPenjualanReturn = $('#datatable_7').DataTable({
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
                ajax: "{{ route('penjualan.return.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'penjualan_return_nobukti',
                        name: 'penjualan_return_nobukti'
                    },
                    {
                        data: 'penjualan_return_tanggal',
                        name: 'penjualan_return_tanggal'
                    },
                    {
                        data: 'penjualan_nobukti',
                        name: 'penjualan_nobukti'
                    },
                    {
                        data: 'penjualan_return_keterangan',
                        name: 'penjualan_return_keterangan'
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
                ajax: "{{ route('return.barang.index') }}",
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

                transaksiPenjualanReturn.one('preDraw', function() {
                    // Display the loading state
                    $('#datatable_7').addClass('loading');
                }).draw();

                $.ajax({
                    type: "POST",
                    url: "{{ route('filtered.data.penjualan.return') }}",
                    data: {
                        startDate: startDate,
                        endDate: endDate,
                    },
                    dataType: "JSON",
                    success: function(response) {

                        if (response.data.length > 0) {

                            // Destroy the existing DataTable
                            transaksiPenjualanReturn.destroy();

                            // Reinitialize the DataTable with the updated data
                            transaksiPenjualanReturn = $('#datatable_7').DataTable({
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
                                        data: 'penjualan_return_nobukti',
                                        name: 'penjualan_return_nobukti'
                                    },
                                    {
                                        data: 'penjualan_return_tanggal',
                                        name: 'penjualan_return_tanggal'
                                    },
                                    {
                                        data: 'penjualan_nobukti',
                                        name: 'penjualan_nobukti'
                                    },
                                    {
                                        data: 'penjualan_return_keterangan',
                                        name: 'penjualan_return_keterangan'
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
                transaksiPenjualanReturn.destroy();
                // DISPLAY TRANSAKSI PEMBELIAN
                transaksiPenjualanReturn = $('#datatable_7').DataTable({
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
                    ajax: "{{ route('penjualan.return.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'penjualan_return_nobukti',
                            name: 'penjualan_return_nobukti'
                        },
                        {
                            data: 'penjualan_return_tanggal',
                            name: 'penjualan_return_tanggal'
                        },
                        {
                            data: 'penjualan_nobukti',
                            name: 'penjualan_nobukti'
                        },
                        {
                            data: 'penjualan_return_keterangan',
                            name: 'penjualan_return_keterangan'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ]
                });

            })

            //  CREATE DATA PENJUALAN.
            $('.create-penjualan-return').click(function() {
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#penjualanreturnForm').trigger("reset");
                $('#tambahpenjualanreturnHeading').html("TAMBAH DATA PENJUALAN RETURN BARU")
                $("#penjualan_return_tanggal").prop('readonly', false)
                $("#penjualan_return_keterangan").prop('readonly', false)
                $("#submitPenjualanReturn").prop('hidden', false);
                $("#list-barang").html('')

                var selectedValues = [];

                $('.row-checkbox:checked').each(function() {
                    var row = $(this).closest('tr');
                    var rowData = listbarang.row(row).data();
                    var barang_id = rowData.barang_id;
                    selectedValues.push(barang_id);
                });

                if (selectedValues.length === 1) {
                    $('#penjualanreturnModal').modal('show');
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
                                const barangid      = value['barang_id']
                                const kadar         = value['kadar_id']
                                const barangkode    = value['barang_kode']
                                const barangnama    = value['barang_nama']
                                const barangberat   = value['barang_berat']

                                const harga_jual = value.transaksipenjualandetail
                                    .length > 0 ?
                                    value.transaksipenjualandetail[value
                                        .transaksipenjualandetail.length - 1]
                                    .detail_penjualan_harga :
                                    0;

                                const penjualan_kode = value.transaksipenjualandetail
                                    .length > 0 ?
                                    value.transaksipenjualandetail[value
                                        .transaksipenjualandetail.length - 1]
                                    .penjualan_id :
                                    0;

                                const berat_jual = value.transaksipenjualandetail
                                    .length > 0 ?
                                    value.transaksipenjualandetail[value
                                        .transaksipenjualandetail.length - 1]
                                    .detail_penjualan_berat_jual :
                                    0;

                                // CHECK SELECTED ITEMS, WHETHER SALES HAVE BEEN MADE
                                if (penjualan_kode === 0) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Please crosscheck your selected items!',
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                    $('#penjualanreturnModal').modal('hide');
                                } else {
                                    listbarang += `<tr>
                                                        <td>` + no++ + `</td>
                                                        <td>` + barangkode + `</td>
                                                        <td style="width:200px">` + barangnama + `</td>
                                                        <td>` + barangberat + `</td>
                                                        <td>
                                                            <input class="form-control barang_id" type="hidden" value="` +  barangid + `"
                                                                placeholder="Barang Id" name="barang_id[]" />
                                                            <input class="form-control kadar_id" type="hidden" value="` +  kadar + `"
                                                                placeholder="Barang Id" name="kadar_id[]" />
                                                            <input class="form-control penjualan_kode" type="hidden" value="` + penjualan_kode + `"
                                                                placeholder="Barang Id" name="penjualan_kode[]" />
                                                            <input class="form-control penjualan_berat_jual" type="hidden" value="` + berat_jual + `"
                                                                placeholder="Barang Id" name="penjualan_berat_jual[]" />
                                                            <input class="form-control return_berat" type="number" value="`+ berat_jual +`"
                                                                placeholder="Berat Return" name="detail_penjualan_return_berat[]" />
                                                        </td>
                                                        <td> <input class="form-control return_harga_jual" type="text" value="` + formatWithCommaSeparator(harga_jual) + `"
                                                                placeholder="Harga Jual" name="detail_penjualan_return_harga_jual[]" readonly />
                                                        </td>
                                                        <td> <input class="form-control return_harga_return" type="text" oninput="test(this);" value=""
                                                                placeholder="Harga Return" name="detail_penjualan_return_harga_return[]" />
                                                        </td>
                                                        <td> <input class="form-control return_potongan" type="text" oninput="test(this);" value="0"
                                                                placeholder="Potongan" name="detail_penjualan_return_potongan[]" />
                                                        </td>
                                                        <td> <input class="form-control return_total" type="text" value=""
                                                                placeholder="Jumlah Harga" name="detail_penjualan_return_total[]" readonly />
                                                        </td>
                                                         <td> <select class="form-select return_kondisi" name="detail_penjualan_return_kondisi[]">
                                                                    <option value="" selected disabled>--</option>
                                                                    <option value="CUCI">Cuci</option>
                                                                    <option value="LEBUR">Lebur</option>
                                                                    <option value="REPARASI">Reparasi</option>
                                                                    <option value="ETALASE">Etalase</option>
                                                                </select>
                                                        </td>
                                                 </tr>`;
                                }

                            });
                            $("#list-barang").html(listbarang)
                            $("#submitPenjualanReturn").prop('hidden', false);
                        }
                    });

                } else if (selectedValues.length < 1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Select at least one item!',
                        showConfirmButton: false,
                        timer: 2000
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Select only one item!',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }

            });

            // EDIT PENJUALAN RETURN
            $('body').on('click', '#edit-penjualan-return', function() {
                var penjualan_return_id = $(this).attr('data-id')
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#penjualanreturnForm').trigger("reset");
                $('#submitPenjualanReturn').html('Simpan');
                $('#tambahpenjualanreturnHeading').html("EDIT DATA PENJUALAN RETURN")

                $("#list-barang").html('')
                $('#penjualanreturnModal').modal('show');

                $.ajax({
                    type: "POST",
                    url: "{{ route('penjualan.return.detail') }}",
                    data: {
                        penjualan_return_id: penjualan_return_id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response)
                        const keterangan                     = response.penjualan_return_keterangan;
                        const grandtotal                     = response.returndetail.detail_penjualan_return_jml_harga;
                        const grandTotalFormatted            = formatWithCommaSeparator(response.returndetail.detail_penjualan_return_jml_harga);
                        const barangkode                     = response.returndetail.barang.barang_kode;
                        const barangnama                     = response.returndetail.barang.barang_nama;
                        const barangberat                    = response.returndetail.detail_penjualan_barang_berat;
                        const beratreturn                    = response.returndetail.detail_penjualan_return_berat;
                        const harga_jual                     = response.returndetail.detail_penjualan_return_harga_jual;
                        const harga_jualFormatted            = formatWithCommaSeparator(response.returndetail.detail_penjualan_return_harga_jual);
                        const harga_return                   = response.returndetail.detail_penjualan_return_harga_return;
                        const harga_returnFormatted          = formatWithCommaSeparator(response.returndetail.detail_penjualan_return_harga_return);
                        const potongan                       = response.returndetail.detail_penjualan_return_potongan;
                        const potonganFormatted              = formatWithCommaSeparator(response.returndetail.detail_penjualan_return_potongan);
                        const jml_harga                      = response.returndetail.detail_penjualan_return_jml_harga;
                        const jml_hargaFormatted             = formatWithCommaSeparator(response.returndetail.detail_penjualan_return_jml_harga);
                        const kondisi                        = response.returndetail.detail_penjualan_return_kondisi;
                        const barangid                       = response.returndetail.barang_id;
                        const penjualan_return_nobukti       = response.returndetail.penjualan_return_nobukti;
                        
                        $('#penjualan_return_grandtotal').val(grandTotalFormatted)
                        $('#penjualan_return_grandtotal').attr('data-value', grandtotal)
                        $('#penjualan_return_keterangan').val(keterangan).prop('readonly', false)

                        var detailListBarang = '';
                        var no = 1;

                        detailListBarang += `<tr>
                                                <td>` + no + `</td>
                                                <td>` + barangkode + `</td>
                                                <td>` + barangnama + `</td>
                                                <td>` + barangberat + `</td>
                                                <td>
                                                    <input class="form-control barang_id" type="hidden" value="` +  barangid + `"
                                                                placeholder="Barang Id" name="barang_id[]" />
                                                    <input class="form-control penjualan_return_nobukti" type="hidden" value="` +  penjualan_return_nobukti + `"
                                                                placeholder="Barang Id" name="penjualan_return_nobukti[]" />
                                                    <input class="form-control return_berat" type="number" value="` + beratreturn + `"
                                                        placeholder="Berat Return" name="detail_penjualan_return_berat[]"/>
                                                </td>
                                                <td> <input class="form-control return_harga_jual" type="text" value="` + harga_jualFormatted + `" data-value="${harga_jual}"
                                                        placeholder="Harga Jual" name="detail_penjualan_return_harga_jual[]" readonly />
                                                </td>
                                                <td> <input class="form-control return_harga_return" type="text" oninput="test(this);" value="` + harga_returnFormatted + `" data-value="${harga_return}"
                                                        placeholder="Harga Return" name="detail_penjualan_return_harga_return[]" />
                                                </td>
                                                <td> <input class="form-control return_potongan" type="text" oninput="test(this);" value="` + potonganFormatted + `" data-value="${potongan}"
                                                        placeholder="Potongan" name="detail_penjualan_return_potongan[]" />
                                                </td>
                                                <td> <input class="form-control return_total" type="text" value="` + jml_hargaFormatted + `" data-value="${jml_harga}"
                                                        placeholder="Jumlah Harga" name="detail_penjualan_return_total[]" readonly />
                                                </td>
                                                    <td> 
                                                    <input class="form-control return_berat" type="text" value="` + kondisi + `"
                                                        placeholder="Berat Return" name="detail_penjualan_return_kondisi[]" readonly />
                                                </td>
                                            </tr>`;

                        $("#list-barang").html(detailListBarang)
                        $("#submitPenjualanReturn").prop('hidden', false);
                    }

                });

            })

            // Function to format a number with a comma separator per 1,000
            function formatWithCommaSeparator(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            } 

            // Calculate and update the totals for each row
            $('body').on('input', '.return_berat, .return_harga_return, .return_potongan', function() {
                var row             = $(this).closest('tr');
                var beratReturn     = parseFloat(row.find('.return_berat').val()) || 0;
                // var hargaJual    = parseFloat(row.find('.return_harga_return').val()) || 0;
                var hargaJual       = parseFloat(row.find('.return_harga_return').attr('data-value')) || 0;
                // var potongan     = parseFloat(row.find('.return_potongan').val()) || 0;
                var potongan        = parseFloat(row.find('.return_potongan').attr('data-value')) || 0;

                var total           = ((beratReturn * hargaJual) - potongan); // Barang Berat * Harga Beli * Nilai Tukar
                var decimalPlaces = 0; // Change this number to round to a different number of decimal places

                // Round the total value to the specified decimal places
                total = parseFloat(total.toFixed(decimalPlaces));

                var totalFormatted = formatWithCommaSeparator(total);

                row.find('.return_total').val(totalFormatted);
                row.find('.return_total').attr('data-value', total);
                calculateGrandTotal();
            })

            // Calculate the grandtotal
            function calculateGrandTotal() {
                var subtotal = 0;
                $('.return_total').each(function() {
                    // var totalValue = parseFloat($(this).val()) || 0;
                    var totalValue = parseFloat($(this).attr('data-value')) || 0;
                    subtotal += totalValue;
                });

                var subtotalFormatted = formatWithCommaSeparator(subtotal);

                $('#penjualan_return_grandtotal').val(subtotalFormatted);
                $('#penjualan_return_grandtotal').attr('data-value', subtotal);
            }

            // RUNNING FUNCTION SUM GRAND TOTAL
            calculateGrandTotal();

            // SUBMIT PENJUALAN
            $('#submitPenjualanReturn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                var kondisi = $('.return_kondisi').val();

                if(kondisi == 'REPARASI' || kondisi == 'CUCI'){

                    var supplier = $('#supplier_id').val();

                    if(supplier != null){
                        
                        $.ajax({
                            url: "{{ route('penjualan.return.store') }}",
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
                                    $('#submitPenjualanReturn').html('Simpan');
        
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
                                    $('#submitPenjualanReturn').html('Simpan');
                                    $('#penjualanreturnModal').modal('hide');
        
                                    listbarang.draw();
                                    transaksiPenjualanReturn.draw();
                                    setInterval(function() {
                                        window.location.reload();
                                    }, 1000);
                                }
                            }
                        });

                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Supplier Must Be Included!',
                            showConfirmButton: false,
                            timer: 2000
                        });

                        $('#submitPenjualanReturn').html('Simpan');
                    }

                }else{

                    $.ajax({
                        url: "{{ route('penjualan.return.store') }}",
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
                                $('#submitPenjualanReturn').html('Simpan');
    
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
                                $('#submitPenjualanReturn').html('Simpan');
                                $('#penjualanreturnModal').modal('hide');
    
                                listbarang.draw();
                                transaksiPenjualanReturn.draw();
                                setInterval(function() {
                                    window.location.reload();
                                }, 1000);
                            }
                        }
                    });
                }

            });

            // DETAIL PENJUALAN RETURN
            $('body').on('click', '#detail-penjualan-return', function() {
                var penjualan_return_id = $(this).attr('data-id')
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#penjualanreturnForm').trigger("reset");
                $('#submitPenjualanReturn').html('Simpan');
                $('#tambahpenjualanreturnHeading').html("SHOW DATA DETAIL PENJUALAN RETURN")

                $("#list-barang").html('')
                $('#penjualanreturnModal').modal('show');

                $.ajax({
                    type: "POST",
                    url: "{{ route('penjualan.return.detail') }}",
                    data: {
                        penjualan_return_id: penjualan_return_id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response)
                         const keterangan                     = response.penjualan_return_keterangan;
                        const grandtotal                     = response.returndetail.detail_penjualan_return_jml_harga;
                        const grandTotalFormatted            = formatWithCommaSeparator(response.returndetail.detail_penjualan_return_jml_harga);
                        const barangkode                     = response.returndetail.barang.barang_kode;
                        const barangnama                     = response.returndetail.barang.barang_nama;
                        const barangberat                    = response.returndetail.detail_penjualan_barang_berat;
                        const beratreturn                    = response.returndetail.detail_penjualan_return_berat;
                        const harga_jual                     = response.returndetail.detail_penjualan_return_harga_jual;
                        const harga_jualFormatted            = formatWithCommaSeparator(response.returndetail.detail_penjualan_return_harga_jual);
                        const harga_return                   = response.returndetail.detail_penjualan_return_harga_return;
                        const harga_returnFormatted          = formatWithCommaSeparator(response.returndetail.detail_penjualan_return_harga_return);
                        const potongan                       = response.returndetail.detail_penjualan_return_potongan;
                        const potonganFormatted              = formatWithCommaSeparator(response.returndetail.detail_penjualan_return_potongan);
                        const jml_harga                      = response.returndetail.detail_penjualan_return_jml_harga;
                        const jml_hargaFormatted             = formatWithCommaSeparator(response.returndetail.detail_penjualan_return_jml_harga);
                        const kondisi                        = response.returndetail.detail_penjualan_return_kondisi;
                        const barangid                       = response.returndetail.barang_id;
                        const penjualan_return_nobukti       = response.returndetail.penjualan_return_nobukti;
                        
                        $('#penjualan_return_grandtotal').val(grandTotalFormatted)
                        $('#penjualan_return_grandtotal').attr('data-value', grandtotal)
                        $('#penjualan_return_keterangan').val(keterangan).prop('readonly', true)

                        var detailListBarang = '';
                        var no = 1;

                        detailListBarang += `<tr>
                                                <td>` + no + `</td>
                                                <td>` + barangkode + `</td>
                                                <td>` + barangnama + `</td>
                                                <td>` + barangberat + `</td>
                                                <td>
                                                    <input class="form-control return_berat" type="number" value="` + beratreturn + `"
                                                        placeholder="Berat Return" name="detail_penjualan_return_berat[]" readonly/>
                                                </td>
                                                <td> <input class="form-control return_harga_jual" type="text" value="` + harga_jualFormatted + `"
                                                        placeholder="Harga Jual" name="detail_penjualan_return_harga_jual[]" readonly />
                                                </td>
                                                <td> <input class="form-control return_harga_return" type="text" value="` + harga_returnFormatted + `"
                                                        placeholder="Harga Return" name="detail_penjualan_return_harga_return[]" readonly />
                                                </td>
                                                <td> <input class="form-control return_potongan" type="text" value="` + potonganFormatted + `"
                                                        placeholder="Potongan" name="detail_penjualan_return_potongan[]" readonly />
                                                </td>
                                                <td> <input class="form-control return_total" type="text" value="` + jml_hargaFormatted + `"
                                                        placeholder="Jumlah Harga" name="detail_penjualan_return_total[]" readonly />
                                                </td>
                                                    <td> 
                                                    <input class="form-control return_berat" type="text" value="` + kondisi + `"
                                                        placeholder="Berat Return" name="detail_penjualan_return_kondisi[]" readonly />
                                                </td>
                                            </tr>`;

                        $("#list-barang").html(detailListBarang)
                        $("#submitPenjualanReturn").prop('hidden', true);
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
                                            <select class="form-select" id="supplier_id" name="pembelian_supplier_id">
                                                <option value="" selected disabled>--</option>`;

                                        // Loop through the values of $supplier and generate <option> elements
                                        $.each(supplierData, function(index, value) {
                                            supplier += `<option value="${value.supplier_id}">${value.supplier_nama}</option>`;
                                        });

                                        supplier += `</select>
                                                    </div>`;

                var labelket    = ` <div class="col-xl-auto mb-xl-0 mb-2">
                                    <label class="form-label mb-xl-0">Keterangan Pengeluaran :</label>
                                </div>`;

                var keterangan  = `<div class="col-xl-auto mb-xl-0 mb-2">
                                      <textarea class="form-control" id="pengeluaran_keterangan" name="pengeluaran_keterangan"></textarea>
                                   </div>`;

                if(condition == 'CUCI' || condition == 'REPARASI'){
                    $("#supplier-label").html(labelsupplier)
                    $("#supplier-data").html(supplier)
                    $("#keterangan-label").html(labelket)
                    $("#keterangan-data").html(keterangan)
                }else{
                    $("#supplier-label").html('')
                    $("#supplier-data").html('')
                    $("#keterangan-label").html('')
                    $("#keterangan-data").html('')
                }
            })

        })
    </script>
@endpush
