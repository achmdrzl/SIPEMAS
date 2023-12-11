@extends('layouts.main')

@push('style-alt')
    <style>
        .custom-modal-dialog {
            max-width: 1420px; /* Set your desired width */
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
                            <h1 class="pg-title">Transaksi Penjualan</h1>
                            <p>Restock Kebutuhan Barang Pada Toko Emas</p>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-line nav-light nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#data_penjualan">
                            <span class="nav-link-text">Data Penjualan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#input_penjualan">
                            <span class="nav-link-text">Input Penjualan</span>
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
                                                        <input class="form-control" name="start_date" id="start_date" type="date" />
                                                    </div>
                                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                                        <label class="form-label mb-xl-0">s/d</label>
                                                    </div>
                                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                                        <input class="form-control" name="end_date" id="end_date" type="date" />
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
                                                            <th>Tanggal</th>
                                                            <th>No Faktur</th>
                                                            <th>Total</th>
                                                            <th>Jenis Penjualan</th>
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
                                                            <button class="btn btn-sm btn-primary ms-3 create-penjualan"><span><span
                                                                        class="icon"><span class="feather-icon"><i
                                                                                data-feather="plus"></i></span></span><span
                                                                        class="btn-text">Tambah
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
                                                                        <th style="width:100px">Nama</th>
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
                            <table class="table table-striped">
                                <thead>
                                    <th>No</th>
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
                                                            <input type="text"
                                                                class="form-control bg-transparent border-0 p-0 gross-total"
                                                                value="0" id="penjualan_subtotal" name="penjualan_subtotal" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-end-0 border-bottom-0">Diskon : </td>
                                                        <td colspan="2" class="border-end-0 border-bottom-0 w-25"><input
                                                                type="text" oninput="test(this);" class="form-control"
                                                                value="0" id="inputdiskon" name="inputdiskon"></td>
                                                        <td class="border-bottom-0  bg-primary-light-5"><input type="text"
                                                                class="form-control bg-transparent border-0 p-0"
                                                                value="0" id="penjualan_diskon" name="penjualan_diskon" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"
                                                            class="rounded-bottom-start border-end-0 bg-primary-light-5"><span
                                                                class="text-dark">Total</span></td>
                                                        <td class="rounded-bottom-end  bg-primary-light-5"><input
                                                                type="text"
                                                                class="form-control bg-transparent border-0 p-0"
                                                                value="0" id="penjualan_grandtotal" name="penjualan_grandtotal" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-end-0 border-bottom-0">Tunai : </td>
                                                        <td colspan="2" class="border-end-0 border-bottom-0 w-25"><input
                                                                type="text" oninput="test(this);" class="form-control" id="inputtunai" name="inputtunai"></td>
                                                        <td class="border-bottom-0  bg-primary-light-5"><input type="text"
                                                                class="form-control bg-transparent border-0 p-0"
                                                                value="0" id="penjualan_tunai" name="penjualan_tunai" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"
                                                            class="rounded-top-start border-end-0 border-bottom-0">Kembalian :
                                                        </td>
                                                        <td class="rounded-top-end border-bottom-0 w-30 bg-primary-light-5">
                                                            <input type="text"
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" id="submitPenjualan" class="btn btn-primary">Simpan</button>
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
        $(document).ready(function(){

             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // FORMAT CURRENCY
            const rupiah = (number) => {
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }).format(number);
            }

            // Define an array of column indexes that need formatting
            var columnsToFormat = [3];

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
                ajax: "{{ route('penjualan.index') }}",
                 columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'penjualan_tanggal',
                        name: 'penjualan_tanggal'
                    },  
                    {
                        data: 'penjualan_nobukti',
                        name: 'penjualan_nobukti'
                    },
                    {
                        data: 'penjualan_grandtotal',
                        name: 'penjualan_grandtotal'
                    },
                    {
                        data: 'penjualan_jenis',
                        name: 'penjualan_jenis'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
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
                ajax: "{{ route('penjualan.barang.index') }}",
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
                var startDate   = $('#start_date').val();
                var endDate     = $('#end_date').val();

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

                transaksiPenjualan.one('preDraw', function() {
                    // Display the loading state
                    $('#datatable_7').addClass('loading');
                }).draw();

                $.ajax({
                    type: "POST",
                    url: "{{ route('filtered.data.penjualan') }}",
                    data: {
                        startDate: startDate,
                        endDate: endDate, 
                    },
                    dataType: "JSON",
                    success: function (response) {
                        
                        if(response.data.length > 0){

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
                                    $('.dataTables_paginate > .pagination').addClass(
                                        'custom-pagination pagination-simple');
                                },
                                // Other DataTable options
                                data: response.data, // Pass the updated data to the DataTable
                                  columns: [
                                        {
                                            data: 'DT_RowIndex',
                                            name: 'DT_RowIndex'
                                        },
                                        {
                                            data: 'penjualan_tanggal',
                                            name: 'penjualan_tanggal'
                                        },  
                                        {
                                            data: 'penjualan_nobukti',
                                            name: 'penjualan_nobukti'
                                        },
                                        {
                                            data: 'penjualan_grandtotal',
                                            name: 'penjualan_grandtotal'
                                        },
                                        {
                                            data: 'penjualan_jenis',
                                            name: 'penjualan_jenis'
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

                        }else{
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
            $(".restart-sorting").on('click', function(){
                $('#start_date').val('');
                $('#end_date').val('');
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
                    ajax: "{{ route('penjualan.index') }}",
                    columns: [
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'penjualan_tanggal',
                            name: 'penjualan_tanggal'
                        },  
                        {
                            data: 'penjualan_nobukti',
                            name: 'penjualan_nobukti'
                        },
                        {
                            data: 'penjualan_grandtotal',
                            name: 'penjualan_grandtotal'
                        },
                        {
                            data: 'penjualan_jenis',
                            name: 'penjualan_jenis'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ]
                });
            
            })

            //  CREATE DATA PENJUALAN.
            $('.create-penjualan').click(function() {
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#penjualanForm').trigger("reset");
                $('#tambahpenjualanHeading').html("TAMBAH DATA PENJUALAN BARU")
                $("#penjualan_tanggal").prop('readonly', false)
                $("#penjualan_keterangan").prop('readonly', false)
                $('#inputdiskon').prop('readonly', false);
                $('#inputtunai').prop('readonly', false);
                $("#submitPenjualan").prop('hidden', false);
                $("#list-barang").html('')

                var submitPenjualan = $('#submitPenjualan'); // Note the '#' for selecting by ID
                submitPenjualan.removeClass('edit');

                var selectedValues = [];

                $('.row-checkbox:checked').each(function() {
                    var row         = $(this).closest('tr');
                    var rowData     = listbarang.row(row).data();
                    var barang_id   = rowData.barang_id;
                    selectedValues.push(barang_id);
                });

                if(selectedValues.length > 0){
                    $('#penjualanModal').modal('show');
                    // REQUEST SELECTED BARANG
                    $.ajax({
                        type: "POST",
                        url: "{{ route('load.barangSelected') }}",
                        data: {
                            barang_id: selectedValues,
                        },
                        dataType: "JSON",
                        success: function (response) {
                            console.log(response)
                            var listbarang = '';
                            var no = 1;
                            // LOOPING BARANG
                            $.each(response, function (index, value) { 
                                const barangid     = value['barang_id']
                                const barangkode   = value['barang_kode']
                                const barangnama   = value['barang_nama']
                                const barangfoto   = value['barang_foto']
                                const barangberat  = parseFloat(value['barang_berat']).toFixed(2);
                                const kadar        = value['kadar']['kadar_nama']
                                const harga_jual_1 = value['kadar']['kadar_harga_jual_1']
                                const harga_jual_2 = value['kadar']['kadar_harga_jual_2']

                                let ppn; // Declare the ppn variable

                                if (value.transaksipenjualandetail.length > 0) {
                                // If the length is greater than 0, set ppn to 1.65
                                ppn = 1.65;
                                } else {
                                // If the length is not greater than 0, set ppn to 1.15
                                ppn = 1.15;
                                }

                                listbarang += `<tr>
                                                    <td>`+ no++ +`</td>
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
                                                    <td>`+ kadar +`</td>
                                                    <td>`+ barangberat +`</td>
                                                    <td>
                                                        <input class="form-control barang_id" type="hidden" value="`+ barangid +`"
                                                            placeholder="Barang Id" name="barang_id[]" />
                                                        <input class="form-control ppn" type="hidden" value="`+ ppn +`"
                                                            placeholder="ppn" name="ppn[]" />
                                                        <input class="form-control penjualan_berat_jual" type="number" value="`+ barangberat +`"
                                                            placeholder="Berat Jual" name="detail_penjualan_berat_jual[]" />
                                                    </td>
                                                    <td> <select class="form-select penjualan_harga" name="detail_penjualan_harga[]">
                                                                <option value="" selected disabled>--</option>
                                                                <option value="`+ harga_jual_1 +`">`+ rupiah(harga_jual_1) +`</option>
                                                                <option value="`+ harga_jual_2 +`">`+ rupiah(harga_jual_2) +`</option>
                                                            </select>
                                                    </td>
                                                    <td> <input class="form-control penjualan_ongkos" type="text" oninput="test(this);" value=""
                                                            placeholder="Ongkos" name="detail_penjualan_ongkos[]" />
                                                    </td>
                                                    <td> <input class="form-control penjualan_diskon" type="text" oninput="test(this);" value=""
                                                            placeholder="Diskon" name="detail_penjualan_diskon[]" />
                                                    </td>
                                                    <td> <input class="form-control penjualan_total" type="text" value=""
                                                            placeholder="Jumlah Harga" name="detail_penjualan_total[]" readonly />
                                                    </td>
                                             </tr>`;
    
                            });
                            $("#list-barang").html(listbarang)
                            $("#submitPenjualan").prop('hidden', false);

                        }
                    });

                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Select at least one item!',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }

            });

            // EDIT PENJUALAN
            $('body').on('click', '#edit-penjualan', function(){
                var penjualan_id = $(this).attr('data-id')
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#penjualanForm').trigger("reset");
                $('#submitPenjualan').html('Simpan');
                $('#tambahpenjualanHeading').html("EDIT DATA PENJUALAN")

                var submitPenjualan = $('#submitPenjualan'); // Note the '#' for selecting by ID
                submitPenjualan.addClass('edit');

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
                        const penjualan_tanggal     = response.penjualan_tanggal;
                        const keterangan            = response.penjualan_keterangan;
                        const subtotal              = response.penjualan_subtotal;
                        const subtotalFormatted     = formatWithCommaSeparator(response.penjualan_subtotal);
                        const diskon                = response.penjualan_diskon ?? 0;
                        const diskonFormatted       = formatWithCommaSeparator(response.penjualan_diskon ?? 0);
                        const bayar                 = response.penjualan_bayar;
                        const bayarFormatted        = formatWithCommaSeparator(response.penjualan_bayar);
                        const grandtotal            = response.penjualan_grandtotal;
                        const grandTotalFormatted   = formatWithCommaSeparator(response.penjualan_grandtotal);
                        const kembalian             = response.penjualan_kembalian;
                        const kembalianFormatted    = formatWithCommaSeparator(response.penjualan_kembalian);

                        $("#penjualan_tanggal").val(penjualan_tanggal).prop('readonly', false)
                        $("#penjualan_keterangan").val(keterangan).prop('readonly', false)

                        $('#inputdiskon').val(diskonFormatted).prop('readonly', false);
                        $('#inputdiskon').attr('data-value', diskon);

                        $('#inputtunai').val(bayarFormatted).prop('readonly', false);             
                        $('#inputtunai').attr('data-value', bayar);             

                        $('#penjualan_subtotal').val(subtotalFormatted)                
                        $('#penjualan_subtotal').attr('data-value', subtotal)       

                        $('#penjualan_diskon').val(diskonFormatted)
                        $('#penjualan_diskon').attr('data-value', diskon)

                        $('#penjualan_kembalian').val(kembalianFormatted)
                        $('#penjualan_kembalian').attr('data-value', kembalian)

                        $('#penjualan_tunai').val(bayarFormatted)
                        $('#penjualan_tunai').attr('data-value', bayar)

                        $('#penjualan_grandtotal').val(grandTotalFormatted)
                        $('#penjualan_grandtotal').attr('data-value', grandtotal)

                        let ppn; // Declare the ppn variable

                        if (response.penjualandetail.length > 0) {
                            // If the length is greater than 0, set ppn to 1.65
                            ppn = 1.65;
                        } else {
                            // If the length is not greater than 0, set ppn to 1.15
                            ppn = 1.15;
                        }

                        var detailListBarang = '';
                        var no = 1;
                        $.each(response.penjualandetail, function (index, value) {
                            const kadar             = value['barang']['kadar']['kadar_nama']
                            const berat_jual        = value['detail_penjualan_berat_jual']
                            const harga             = value['detail_penjualan_harga']
                            const ongkos            = value['detail_penjualan_ongkos'] ?? 0
                            const ongkosFormatted   = formatWithCommaSeparator(value['detail_penjualan_ongkos'] ?? 0) 
                            const diskon            = value['detail_penjualan_diskon'] ?? 0
                            const diskonFormatted   = formatWithCommaSeparator(value['detail_penjualan_diskon'] ?? 0) 
                            const total             = value['detail_penjualan_jml_harga']
                            const totalFormatted    = formatWithCommaSeparator(value['detail_penjualan_jml_harga']) 

                            const barang_kode       = value['barang']['barang_kode']
                            const barang_nama       = value['barang']['barang_nama']
                            const barang_berat      = parseFloat(value['barang']['barang_berat']).toFixed(2);
                            const barangfoto        = value['barang']['barang_foto']

                            const barangid          = value['barang_id']

                            const harga_jual_1      = value['barang']['kadar']['kadar_harga_jual_1']
                            const harga_jual_2      = value['barang']['kadar']['kadar_harga_jual_2']

                            const penjualan_id      = value['penjualan_id']

                            detailListBarang += `<tr>
                                                    <td>`+ no++ +`</td>
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
                                                                <div class="text-high-em">${barang_nama}</div>
                                                                <div class="fs-7" class="table-link-text link-medium-em">${barang_kode}</div>
                                                            </div>
                                                        </div>    
                                                    </td>
                                                    <td>`+ kadar +`</td>
                                                    <td>`+ barang_berat +`</td>
                                                    <td>
                                                        <input class="form-control barang_id" type="hidden" value="`+ barangid +`"
                                                            placeholder="Barang Id" name="barang_id[]" />
                                                        <input class="form-control ppn" type="hidden" value="`+ ppn +`"
                                                            placeholder="ppn" name="ppn[]" />
                                                        <input class="form-control penjualan_id" type="hidden" value="`+ penjualan_id +`"
                                                            placeholder="Barang Id" name="penjualan_id[]" />

                                                        <input class="form-control penjualan_berat_jual" type="number"
                                                            placeholder="Berat Jual" name="detail_penjualan_berat_jual[]" value="`+ berat_jual +`" />
                                                    </td>
                                                    <td>
                                                        <select class="form-select penjualan_harga" name="detail_penjualan_harga[]">
                                                            <option value="" selected disabled>--</option>
                                                            <option value="` + harga_jual_1 + `" ` + (harga === harga_jual_1 ? "selected" : "") + `>` + rupiah(harga_jual_1) + `</option>
                                                            <option value="` + harga_jual_2 + `" ` + (harga === harga_jual_2 ? "selected" : "") + `>` + rupiah(harga_jual_2) + `</option>
                                                        </select>
                                                    </td>
                                                    </td>
                                                    <td> <input class="form-control penjualan_ongkos" type="text" oninput="test(this);" value="`+ ongkosFormatted +`" data-value="${ongkos}"
                                                            placeholder="Ongkos" name="detail_penjualan_ongkos[]" />
                                                    </td>
                                                    <td> <input class="form-control penjualan_diskon" type="text" oninput="test(this);" value="`+ diskonFormatted +`" data-value="${diskon}"
                                                            placeholder="Diskon" name="detail_penjualan_diskon[]" />
                                                    </td>
                                                    <td> <input class="form-control penjualan_total" type="text" value="`+ totalFormatted +`" data-value="${total}"
                                                            placeholder="Jumlah Harga" name="detail_penjualan_total[]" readonly />
                                                    </td>
                                             </tr>`;
                        });

                        $("#list-barang").html(detailListBarang)
                        $("#submitPenjualan").prop('hidden', false);
                    }

                });

            })

            // Function to format a number with a comma separator per 1,000
            function formatWithCommaSeparator(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }   

            // Calculate and update the totals for each row
           $('body').on('input', '.penjualan_berat_jual, .penjualan_harga, .penjualan_ongkos, .penjualan_diskon, #inputdiskon, #inputtunai', function() {
                var row         = $(this).closest('tr');
                var beratJual   = parseFloat(row.find('.penjualan_berat_jual').val()) || 0;
                var hargaJual   = parseFloat(row.find('.penjualan_harga').val()) || 0;
                // var ongkos   = parseFloat(row.find('.penjualan_ongkos').val()) || 0;
                var ongkos      = parseFloat(row.find('.penjualan_ongkos').attr('data-value')) || 0;
                // var diskon   = parseFloat(row.find('.penjualan_diskon').val()) || 0;
                var diskon      = parseFloat(row.find('.penjualan_diskon').attr('data-value')) || 0;

                var total       = ((beratJual * hargaJual + ongkos) - diskon); // Barang Berat * Harga Beli * Nilai Tukar
                var decimalPlaces = 0; // Change this number to round to a different number of decimal places

                // Round the total value to the specified decimal places
                total = parseFloat(total.toFixed(decimalPlaces));

                var totalFormatted = formatWithCommaSeparator(total);

                row.find('.penjualan_total').val(totalFormatted);
                row.find('.penjualan_total').attr('data-value', total);
                calculateGrandTotal();
            });

            // Calculate the grandtotal
            function calculateGrandTotal() {
                var subtotal = 0;
                $('.penjualan_total').each(function() {
                    // var totalValue  = parseFloat($(this).val()) || 0;
                    var totalValue  = parseFloat($(this).attr('data-value')) || 0;
                    subtotal += totalValue;
                });

                // var inputdiskon  = parseFloat($("#inputdiskon").val()) || 0;
                var inputdiskon     = parseFloat($("#inputdiskon").attr('data-value')) || 0;
                // var inputtunai   = parseFloat($("#inputtunai").val()) || 0;
                var inputtunai      = parseFloat($("#inputtunai").attr('data-value')) || 0;
                var grandTotal      = subtotal - inputdiskon; // Grand Total Formula
                var kembalian       = inputtunai - grandTotal; // Kembalian Formula

                var diskonFormatted     = formatWithCommaSeparator(inputdiskon)
                var tunaiFormatted      = formatWithCommaSeparator(inputtunai)
                var subtotalFormatted   = formatWithCommaSeparator(subtotal)
                var grandTotalFormatted = formatWithCommaSeparator(grandTotal)
                var kembalianFormatted  = formatWithCommaSeparator(kembalian)

                $('#penjualan_subtotal').val(subtotalFormatted);           
                $('#penjualan_subtotal').attr('data-value', subtotal);           
                $('#penjualan_diskon').val(diskonFormatted);
                $('#penjualan_diskon').attr('data-value', inputdiskon);
                $('#penjualan_grandtotal').val(grandTotalFormatted);
                $('#penjualan_grandtotal').attr('data-value', grandTotal);
                $('#penjualan_tunai').val(tunaiFormatted);
                $('#penjualan_tunai').attr('data-value', inputtunai);
                $("#penjualan_kembalian").val(kembalianFormatted)
                $("#penjualan_kembalian").attr('data-value', kembalian)
            }
            
            // RUNNING FUNCTION SUM GRAND TOTAL
            calculateGrandTotal();

            // SUBMIT PENJUALAN
            $('#submitPenjualan').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                var edit = $(this).hasClass('edit')

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
                                    url: "{{ route('penjualan.store') }}",
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
                                            $('#submitPenjualan').html('Simpan');

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

                                            $('#penjualanForm').trigger("reset");
                                            $('#submitPenjualan').html('Simpan');
                                            $('#penjualanModal').modal('hide');

                                            listbarang.draw();
                                            transaksiPenjualan.draw();

                                            
                                            setTimeout(function() {

                                                $.ajax({
                                                    url: '/latest-penjualan',
                                                    type: 'GET',
                                                    success: function(data) {
                                                        var penjualan_id = data.latestPenjualanId;
                                                        // Use the penjualan_id in your code
                                                        console.log('Latest Penjualan ID: ' + penjualan_id);

                                                        const swalWithBootstrapButtons = Swal.mixin({
                                                            customClass: {
                                                                confirmButton: "btn btn-success",
                                                                cancelButton: "btn btn-danger me-2",
                                                            },
                                                            buttonsStyling: false,
                                                        });

                                                        swalWithBootstrapButtons
                                                            .fire({
                                                                title: "Apakah kamu ingin mencetak faktur penjualan?",
                                                                text: "Faktur akan dicetak!",
                                                                icon: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonClass: "me-2",
                                                                cancelButtonText: "Tidak",
                                                                confirmButtonText: "Ya",
                                                                reverseButtons: true,
                                                            })
                                                            .then((result) => {
                                                                if (result.value) {
                            
                                                                    // Convert the array to a query parameter string
                                                                    var queryString = 'data=' + JSON.stringify(penjualan_id);
                            
                                                                    // Create the URL with query parameters
                                                                    var url = "{{ route('cetak.faktur.penjualan') }}?" + queryString;
                            
                                                                    // Open the PDF in a new tab/window
                                                                    window.open(url, '_blank');
                            
                                                                    // Introduce a delay of, for example, 2 seconds (2000 milliseconds) before reloading
                                                                    setTimeout(function() {
                                                                        window.location.reload();
                                                                    }, 2000);

                                                                } else {
                                                                    Swal.fire("Cancel!", "Perintah dibatalkan!", "error");
                                                                    // Introduce a delay of, for example, 2 seconds (2000 milliseconds) before reloading
                                                                    setTimeout(function() {
                                                                        window.location.reload();
                                                                    }, 2000);
                                                                }
                                                            });
                                                    }
                                                });
                    
                                            }, 2000);

                                        }
                                    }
                                });
    
                            } else {
                                $('#submitPenjualan').html('Simpan');
                                Swal.fire("Cancel!", "Perintah dibatalkan!", "error");
                            }
                        });
                }else{
                    $.ajax({
                        url: "{{ route('penjualan.store') }}",
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
                                $('#submitPenjualan').html('Simpan');
    
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
    
                                $('#penjualanForm').trigger("reset");
                                $('#submitPenjualan').html('Simpan');
                                $('#penjualanModal').modal('hide');
    
                                listbarang.draw();
                                transaksiPenjualan.draw();
    
                                
                                setTimeout(function() {
    
                                    $.ajax({
                                        url: '/latest-penjualan',
                                        type: 'GET',
                                        success: function(data) {
                                            var penjualan_id = data.latestPenjualanId;
                                            // Use the penjualan_id in your code
                                            console.log('Latest Penjualan ID: ' + penjualan_id);
    
                                            const swalWithBootstrapButtons = Swal.mixin({
                                                customClass: {
                                                    confirmButton: "btn btn-success",
                                                    cancelButton: "btn btn-danger me-2",
                                                },
                                                buttonsStyling: false,
                                            });
    
                                            swalWithBootstrapButtons
                                                .fire({
                                                    title: "Apakah kamu ingin mencetak faktur penjualan?",
                                                    text: "Faktur akan dicetak!",
                                                    icon: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonClass: "me-2",
                                                    cancelButtonText: "Tidak",
                                                    confirmButtonText: "Ya",
                                                    reverseButtons: true,
                                                })
                                                .then((result) => {
                                                    if (result.value) {
                
                                                        // Convert the array to a query parameter string
                                                        var queryString = 'data=' + JSON.stringify(penjualan_id);
                
                                                        // Create the URL with query parameters
                                                        var url = "{{ route('cetak.faktur.penjualan') }}?" + queryString;
                
                                                        // Open the PDF in a new tab/window
                                                        window.open(url, '_blank');
                
                                                        // Introduce a delay of, for example, 2 seconds (2000 milliseconds) before reloading
                                                        setTimeout(function() {
                                                            window.location.reload();
                                                        }, 2000);
    
                                                    } else {
                                                        Swal.fire("Cancel!", "Perintah dibatalkan!", "error");
                                                        // Introduce a delay of, for example, 2 seconds (2000 milliseconds) before reloading
                                                        setTimeout(function() {
                                                            window.location.reload();
                                                        }, 2000);
                                                    }
                                                });
                                        }
                                    });
        
                                }, 2000);
    
                            }
                        }
                    });
                }

            });

            // DETAIL PENJUALAN
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
                        const penjualan_tanggal     = response.penjualan_tanggal;
                        const keterangan            = response.penjualan_keterangan;
                        const subtotal              = response.penjualan_subtotal;
                        const subtotalFormatted     = formatWithCommaSeparator(response.penjualan_subtotal);
                        const diskon                = response.penjualan_diskon ?? 0;
                        const diskonFormatted       = formatWithCommaSeparator(response.penjualan_diskon ?? 0);
                        const bayar                 = response.penjualan_bayar;
                        const bayarFormatted        = formatWithCommaSeparator(response.penjualan_bayar);
                        const grandtotal            = response.penjualan_grandtotal;
                        const grandTotalFormatted   = formatWithCommaSeparator(response.penjualan_grandtotal);
                        const kembalian             = response.penjualan_kembalian;
                        const kembalianFormatted    = formatWithCommaSeparator(response.penjualan_kembalian);

                        $("#penjualan_tanggal").val(penjualan_tanggal).prop('readonly', true)
                        $("#penjualan_keterangan").val(keterangan).prop('readonly', true)

                        $('#inputdiskon').val(diskonFormatted).prop('readonly', true);
                        $('#inputdiskon').attr('data-value', diskon);

                        $('#inputtunai').val(bayarFormatted).prop('readonly', true);             
                        $('#inputtunai').attr('data-value', bayar);             

                        $('#penjualan_subtotal').val(subtotalFormatted)                
                        $('#penjualan_subtotal').attr('data-value', subtotal)       

                        $('#penjualan_diskon').val(diskonFormatted)
                        $('#penjualan_diskon').attr('data-value', diskon)

                        $('#penjualan_kembalian').val(kembalianFormatted)
                        $('#penjualan_kembalian').attr('data-value', kembalian)

                        $('#penjualan_tunai').val(bayarFormatted)
                        $('#penjualan_tunai').attr('data-value', bayar)

                        $('#penjualan_grandtotal').val(grandTotalFormatted)
                        $('#penjualan_grandtotal').attr('data-value', grandtotal)

                        var detailListBarang = '';
                        var no = 1;
                        $.each(response.penjualandetail, function (index, value) {
                            const kadar             = value['barang']['kadar']['kadar_nama']
                            const berat_jual        = value['detail_penjualan_berat_jual']
                            const harga             = formatWithCommaSeparator(value['detail_penjualan_harga']) 
                            const ongkos            = value['detail_penjualan_ongkos'] ?? 0
                            const ongkosFormatted   = formatWithCommaSeparator(value['detail_penjualan_ongkos'] ?? 0) 
                            const diskon            = value['detail_penjualan_diskon'] ?? 0
                            const diskonFormatted   = formatWithCommaSeparator(value['detail_penjualan_diskon'] ?? 0) 
                            const total             = value['detail_penjualan_jml_harga']
                            const totalFormatted    = formatWithCommaSeparator(value['detail_penjualan_jml_harga']) 

                            const barang_kode   = value['barang']['barang_kode']
                            const barang_nama   = value['barang']['barang_nama']
                            const barang_berat  = parseFloat(value['barang']['barang_berat']).toFixed(2);
                            const barangfoto    = value['barang']['barang_foto']

                            detailListBarang += `<tr>
                                                    <td>`+ no++ +`</td>
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
                                                                <div class="text-high-em">${barang_nama}</div>
                                                                <div class="fs-7" class="table-link-text link-medium-em">${barang_kode}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>`+ kadar +`</td>
                                                    <td>`+ barang_berat +`</td>
                                                    <td>
                                                        <input class="form-control penjualan_berat_jual" type="number"
                                                            placeholder="Berat Jual" name="detail_penjualan_berat_jual[]" value="`+ berat_jual +`" readonly />
                                                    </td>
                                                    <td> <input class="form-control penjualan_harga" type="text" value="`+ harga +`"
                                                            placeholder="Harga" name="detail_penjualan_harga[]" readonly />
                                                    </td>
                                                    <td> <input class="form-control penjualan_ongkos" type="text" value="`+ ongkosFormatted +`"
                                                            placeholder="Ongkos" name="detail_penjualan_ongkos[]" readonly />
                                                    </td>
                                                    <td> <input class="form-control penjualan_diskon" type="text" value="`+ diskonFormatted +`"
                                                            placeholder="Diskon" name="detail_penjualan_diskon[]" readonly />
                                                    </td>
                                                    <td> <input class="form-control penjualan_total" type="text" value="`+ totalFormatted +`"
                                                            placeholder="Jumlah Harga" name="detail_penjualan_total[]" readonly />
                                                    </td>
                                             </tr>`;
                        });

                        $("#list-barang").html(detailListBarang)
                        $("#submitPenjualan").prop('hidden', true);
                    }

                });

            })

            // CETAK FAKTUR PENJUALAN
            $('body').on('click', '#cetak-faktur', function() {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2",
                    },
                    buttonsStyling: false,

                });

                var penjualan_id  = $(this).attr('data-id')

                swalWithBootstrapButtons
                    .fire({
                        title: "Apakah kamu ingin mencetak faktur penjualan?",
                        text: "Faktur akan dicetak!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "me-2",
                        cancelButtonText: "Tidak",
                        confirmButtonText: "Ya",
                        reverseButtons: true,
                    })
                    .then((result) => {
                        if (result.value) {

                            // Convert the array to a query parameter string
                            var queryString = 'data=' + JSON.stringify(penjualan_id);

                            // Create the URL with query parameters
                            var url = "{{ route('cetak.faktur.penjualan') }}?" + queryString;

                            // Open the PDF in a new tab/window
                            window.open(url, '_blank');

                        } else {
                            Swal.fire("Cancel!", "Perintah dibatalkan!", "error");
                        }
                    });

            });            
        })
    </script>
@endpush