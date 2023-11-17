@extends('layouts.main')

@push('style-alt')
    <style>
        .custom-modal-dialog {
            max-width: 1280px;
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
                            <h1 class="pg-title">Transaksi Pembelian</h1>
                            <p>Restock Kebutuhan Barang Pada Toko Emas</p>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-line nav-light nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#data_pembelian">
                            <span class="nav-link-text">Data Pembelian</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#input_pembelian">
                            <span class="nav-link-text">Input Pembelian</span>
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
                                    <div class="tab-pane fade show active" id="data_pembelian">
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
                                                            <th>Tanggal</th>
                                                            <th>No Bukti</th>
                                                            <th>Supplier</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="input_pembelian">
                                        <div class="row">
                                            <div class="col-md-12 mb-md-4 mb-3">
                                                <div class="card card-border mb-0 h-100">
                                                    <div class="card-header card-header-action">
                                                        <h6>List Data Barang
                                                            <span class="badge badge-sm badge-light ms-1">5</span>
                                                        </h6>
                                                        <div class="card-action-wrap">
                                                            <button
                                                                class="btn btn-sm btn-primary ms-3 create-pembelian"><span><span
                                                                        class="icon"><span class="feather-icon"><i
                                                                                data-feather="plus"></i></span></span><span
                                                                        class="btn-text">Tambah
                                                                        Pembelian</span></span></button>
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
                                                                        <th>Kadar</th>
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

        {{-- Modal Tambah Pembelian --}}
        <div class="modal fade" id="pembelianModal" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered custom-modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 id="tambahpembelianHeading"></h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="pembelianForm">
                        <div class="modal-body">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                style="display: none;" style="color: red">
                            </div>
                            <div class="row">
                                <div class="col-md p-2 bg-grey-light-5 rounded">
                                    <div class="row align-items-center">
                                        <div class="col-xl-auto mb-xl-0 mb-2">
                                            <label class="form-label mb-xl-0">Tanggal :</label>
                                        </div>
                                        <div class="col-xl-auto mb-xl-0 mb-2">
                                            <input class="form-control" type="date" name="pembelian_tanggal"
                                                id="tanggal" value="{{ date('Y-m-d') }}" />
                                        </div>
                                        <div class="col-xl-auto mb-xl-0 mb-2">
                                            <label class="form-label mb-xl-0">Supplier
                                                :</label>
                                        </div>
                                        <div class="col-xl-auto mb-xl-0 mb-2">
                                            <select class="form-select" id="supplier_id" name="pembelian_supplier_id">
                                                <option value="" selected disabled>--</option>
                                                @foreach ($supplier as $item)
                                                    <option value="{{ $item->supplier_id }}">{{ $item->supplier_nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-auto mb-xl-0 mb-2">
                                            <label class="form-label mb-xl-0">Keterangan
                                                :</label>
                                        </div>
                                        <div class="col-xl-auto mb-xl-0 mb-2">
                                            <textarea name="pembelian_keterangan" class="form-control" id="keterangan"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kadar</th>
                                    <th>Berat</th>
                                    <th>Harga Beli</th>
                                    <th>Nilai Tukar</th>
                                    <th>Jumlah Harga</th>
                                </thead>
                                <tbody id="list-barang">
                                    {{-- List Barang Selected --}}
                                </tbody>
                            </table>
                            <div class="row justify-content-end">
                                <div class="col-xxl-10 mt-5">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3"
                                                            class="rounded-top-start border-end-0 border-bottom-0">Subtotal
                                                            :
                                                        </td>
                                                        <td
                                                            class="rounded-top-end border-bottom-0 w-30 bg-primary-light-5">
                                                            <input type="text"
                                                                class="form-control bg-transparent border-0 p-0"
                                                                value="0" id="subtotal" name="pembelian_subtotal"
                                                                readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-end-0 border-bottom-0">Diskon : </td>
                                                        <td colspan="2" class="border-end-0 border-bottom-0 w-25">
                                                            <input type="text" class="form-control" value="0"
                                                                id="inputdiskon" name="inputdiskon" oninput="test(this);">
                                                        </td>
                                                        <td class="border-bottom-0  bg-primary-light-5"><input
                                                                type="text"
                                                                class="form-control bg-transparent border-0 p-0"
                                                                value="0" id="diskon" name="pembelian_diskon"
                                                                readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-end-0 border-bottom-0">PPN : </td>
                                                        <td colspan="2" class="border-end-0 border-bottom-0 w-25">
                                                            <input type="text" class="form-control" value="0"
                                                                id="inputppn" name="inputppn" oninput="test(this);">
                                                        </td>
                                                        <td class="border-bottom-0  bg-primary-light-5">
                                                            <input type="text"
                                                                class="form-control bg-transparent border-0 p-0"
                                                                value="0" id="ppn" name="pembelian_ppn"
                                                                readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"
                                                            class="rounded-bottom-start border-end-0 bg-primary-light-5">
                                                            <span class="text-dark">Grand Total</span></td>
                                                        <td class="rounded-bottom-end  bg-primary-light-5">
                                                            <input type="text"
                                                                class="form-control bg-transparent border-0 p-0"
                                                                value="0" id="grandtotal"
                                                                name="pembelian_grandtotal" readonly>
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
                            <button type="submit" id="submitPembelian" class="btn btn-primary">Simpan</button>
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

            // Define an array of column indexes that need formatting
            var columnsToFormat = [4];

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
            var transaksiPembelian = $('#datatable_7').DataTable({
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
                ajax: "{{ route('pembelian.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'pembelian_tanggal',
                        name: 'pembelian_tanggal',
                    },
                    {
                        data: 'pembelian_nobukti',
                        name: 'pembelian_nobukti'
                    },
                    {
                        data: 'pembelian_supplier_id',
                        name: 'pembelian_supplier_id'
                    },
                    {
                        data: 'pembelian_grandtotal',
                        name: 'pembelian_grandtotal'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
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

                transaksiPembelian.one('preDraw', function() {
                    // Display the loading state
                    $('#datatable_7').addClass('loading');
                }).draw();

                $.ajax({
                    type: "POST",
                    url: "{{ route('filtered.data.pembelian') }}",
                    data: {
                        startDate: startDate,
                        endDate: endDate,
                    },
                    dataType: "JSON",
                    success: function(response) {

                        if (response.data.length > 0) {

                            // Destroy the existing DataTable
                            transaksiPembelian.destroy();

                            // Reinitialize the DataTable with the updated data
                            transaksiPembelian = $('#datatable_7').DataTable({
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
                                        data: 'pembelian_tanggal',
                                        name: 'pembelian_tanggal',
                                    },
                                    {
                                        data: 'pembelian_nobukti',
                                        name: 'pembelian_nobukti'
                                    },
                                    {
                                        data: 'pembelian_supplier_id',
                                        name: 'pembelian_supplier_id'
                                    },
                                    {
                                        data: 'pembelian_grandtotal',
                                        name: 'pembelian_grandtotal'
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
                transaksiPembelian.destroy();
                // DISPLAY TRANSAKSI PEMBELIAN
                transaksiPembelian = $('#datatable_7').DataTable({
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
                    ajax: "{{ route('pembelian.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'pembelian_tanggal',
                            name: 'pembelian_tanggal',
                        },
                        {
                            data: 'pembelian_nobukti',
                            name: 'pembelian_nobukti'
                        },
                        {
                            data: 'pembelian_supplier_id',
                            name: 'pembelian_supplier_id'
                        },
                        {
                            data: 'pembelian_grandtotal',
                            name: 'pembelian_grandtotal'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ],
                });

            })

            // DISPLAY DATA BARANG
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
                ajax: "{{ route('pembelian.barang.index') }}",
                columns: [{
                        data: 'select',
                        name: 'select'
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
                        data: 'barang_kadar',
                        name: 'barang_kadar'
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

            // FORMAT CURRENCY
            const rupiah = (number) => {
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }).format(number);
            }

            //  CREATE DATA PENJUALAN.
            $('.create-pembelian').click(function() {
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#pembelianForm').trigger("reset");
                $('#submitPembelian').html('Simpan');
                $('#tambahpembelianHeading').html("TAMBAH DATA PEMBELIAN BARU")
                $("#submitPembelian").prop('hidden', false);
                $("#tanggal").prop('readonly', false)
                $("#supplier_id").prop('readonly', false)
                $("#keterangan").prop('readonly', false)
                $('#inputdiskon').prop('readonly', false);
                $('#inputppn').prop('readonly', false);
                $("#list-barang").html('')

                var submitPembelian = $('#submitPembelian'); // Note the '#' for selecting by ID
                submitPembelian.removeClass('edit');
                
                var selectedValues = [];

                $('.row-checkbox:checked').each(function() {
                    var row = $(this).closest('tr');
                    var rowData = listbarang.row(row).data();
                    var barang_id = rowData.barang_id;
                    selectedValues.push(barang_id);
                });

                if (selectedValues.length > 0) {
                    $('#pembelianModal').modal('show');
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
                                const barangberat = value['barang_berat']
                                const kadar = value['kadar']['kadar_nama']
                                const barangfoto   = value['barang_foto']

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
                                                    <td>` + kadar + `</td>
                                                    <td>` + barangberat + `</td>
                                                    <td>
                                                        <input class="form-control" id="barang_id" type="hidden" value="` + barangid + `"
                                                            placeholder="Harga Beli" name="barang_id[]" />
                                                        <input class="form-control barang_berat" type="hidden" value="` + barangberat + `"
                                                            placeholder="Harga Beli" name="detail_pembelian_barang_berat[]" />
                                                        <input class="form-control kadar" type="hidden" value="` + kadar + `"
                                                            placeholder="Harga Beli" name="detail_pembelian_kadar[]" />
                                                        <input class="form-control jmlbeli" type="hidden" value=""
                                                            placeholder="Harga Beli" name="detail_pembelian_jml_beli[]" />
                                                        <input class="form-control formatted-number harga_beli" oninput="test(this);" id="harga_beli" type="text"
                                                            placeholder="Harga Beli" name="detail_pembelian_harga_beli[]"/>
                                                    </td>
                                                    <td> <input class="form-control nilai_tukar" type="number" value=""
                                                            placeholder="Nilai Tukar" name="detail_pembelian_nilai_tukar[]" /></td>
                                                    <td> <input class="form-control total" type="text" value=""
                                                            placeholder="Jumlah Harga" name="detail_pembelian_total[]" readonly /></td>
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
            });

            // EDIT PEMBELIAN
            $('body').on('click', '#edit-pembelian', function() {
                var pembelian_id = $(this).attr('data-id')
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#pembelianForm').trigger("reset");
                $('#submitPembelian').html('Simpan');
                $('#tambahpembelianHeading').html("EDIT DATA PEMBELIAN")

                $("#list-barang").html('')
                $('#pembelianModal').modal('show');

                var submitPembelian = $('#submitPembelian'); // Note the '#' for selecting by ID
                submitPembelian.addClass('edit');

                $.ajax({
                    type: "POST",
                    url: "{{ route('pembelian.detail') }}",
                    data: {
                        pembelian_id: pembelian_id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response)
                        const pembelian_tanggal = response.pembelian_tanggal;
                        const supplier_id       = response.supplier_id;
                        const keterangan        = response.pembelian_keterangan;
                        const subtotalFormatted          = formatWithCommaSeparator(response.pembelian_subtotal);
                        const diskonFormatted            = formatWithCommaSeparator(response.pembelian_diskon);
                        const ppnFormatted               = formatWithCommaSeparator(response.pembelian_ppn);
                        const grandTotalFormatted        = formatWithCommaSeparator(response.pembelian_grandtotal);
                        const subtotal          = response.pembelian_subtotal;
                        const diskon            = response.pembelian_diskon;
                        const ppn               = response.pembelian_ppn;
                        const grandtotal        = response.pembelian_grandtotal;

                        $("#tanggal").val(pembelian_tanggal).prop('readonly', false)
                        $("#supplier_id").val(supplier_id).prop('readonly', false)
                        $("#keterangan").val(keterangan).prop('readonly', false)

                        $('#inputdiskon').val(diskonFormatted).prop('readonly', false);
                        $('#inputdiskon').attr('data-value', diskon);
                        $('#inputppn').val(ppnFormatted).prop('readonly', false);
                        $('#inputppn').attr('data-value', ppnFormatted);

                        $('#subtotal').val(subtotalFormatted)
                        $('#subtotal').attr('data-value', subtotal)
                        $('#diskon').val(diskonFormatted)
                        $('#diskon').attr('data-value', diskon)
                        $('#ppn').val(ppnFormatted)
                        $('#ppn').attr('data-value', ppn)
                        $('#grandtotal').val(grandTotalFormatted)
                        $('#grandtotal').attr('data-value', grandtotal)

                        var detailListBarang = '';
                        var no = 1;
                        $.each(response.pembeliandetail, function(index, value) {
                            const kadar        = value['detail_pembelian_kadar']
                            const berat        = value['detail_pembelian_berat']
                            const harga_beliFormatted   = formatWithCommaSeparator(value['detail_pembelian_harga_beli'])
                            const harga_beli   = value['detail_pembelian_harga_beli']
                            const nilai_tukar  = value['detail_pembelian_nilai_tukar']
                            const jml_beli     = value['detail_pembelian_jml_beli']
                            const totalFormatted        = formatWithCommaSeparator(value['detail_pembelian_total'])
                            const total        = value['detail_pembelian_total']
                            const pembelian_id = value['pembelian_id']
                            const barang_id    = value['barang_id']

                            const barang_kode  = value['barang']['barang_kode']
                            const barang_nama  = value['barang']['barang_nama']
                            const barang_foto  = value['barang']['barang_foto']

                            detailListBarang += `<tr>
                                                    <td>` + no++ + `</td>
                                                    <td>
                                                        <div class="media align-items-center">
                                                            <div class="media-head me-2">
                                                                <div class="avatar avatar-xs avatar-rounded">
                                                                    <a href="${'storage/foto_barang/' + barang_foto}" download>
                                                                        <img src="${'storage/foto_barang/' + barang_foto}" alt="user" class="avatar-img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="text-high-em">${barang_nama}</div>
                                                                <div class="fs-7" class="table-link-text link-medium-em">${barang_kode}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>` + kadar + `</td>
                                                    <td>` + berat + `</td>
                                                    <td>
                                                        <input class="form-control" id="barang_id" type="hidden" value="` + barang_id + `"
                                                            placeholder="Harga Beli" name="barang_id[]" />
                                                        <input class="form-control barang_berat" type="hidden" value="` + berat + `"
                                                            placeholder="Harga Beli" name="detail_pembelian_barang_berat[]" />
                                                        <input class="form-control kadar" type="hidden" value="` + kadar + `"
                                                            placeholder="Harga Beli" name="detail_pembelian_kadar[]" />
                                                        <input class="form-control jmlbeli" type="hidden" value="${jml_beli}"
                                                            placeholder="Harga Beli" name="detail_pembelian_jml_beli[]" />
                                                        <input class="form-control pembelian_id" type="hidden"
                                                            placeholder="Harga Beli" name="pembelian_id[]" value="` + pembelian_id + `" />
                                                        <input class="form-control harga_beli" type="text" oninput="test(this);"
                                                            placeholder="Harga Beli" name="detail_pembelian_harga_beli[]" value="` + harga_beliFormatted + `" data-value="${harga_beli}" />
                                                    </td>
                                                    <td> <input class="form-control nilai_tukar" type="number"
                                                            placeholder="Nilai Tukar" name="detail_pembelian_nilai_tukar[]" value="` + nilai_tukar + `" /></td>
                                                    <td> <input class="form-control total" type="text"
                                                            placeholder="Jumlah Harga" name="detail_pembelian_total[]" value="` + totalFormatted + `" data-value="${total}" /></td>
                                                </tr>`;
                        });
                        $("#list-barang").html(detailListBarang)
                        $("#submitPembelian").prop('hidden', false);
                    }

                });

            })

            // Function to format a number with a comma separator per 1,000
            function formatWithCommaSeparator(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }      

            // Calculate and update the totals for each row
            $('body').on('input', '.harga_beli, .nilai_tukar, #inputdiskon, #inputppn', function() {
                var row           = $(this).closest('tr');
                var hargaBeli     = parseFloat(row.find('.harga_beli').attr('data-value')) || 0;
                console.log('harga beli', hargaBeli)
                var nilaiTukar    = parseFloat(row.find('.nilai_tukar').val()) || 0;
                console.log('nilai tukar', nilaiTukar)
                var barangBerat   = parseFloat(row.find('.barang_berat').val()) || 0;
                var jmlbeli       = hargaBeli * nilaiTukar; // Harga Beli * Nilai Tukar
                console.log('jml beli', jmlbeli)
                var total         = barangBerat * hargaBeli * nilaiTukar; // Barang Berat * Harga Beli * Nilai Tukar
                var decimalPlaces = 0; // Change this number to round to a different number of decimal places

                // Round the total value to the specified decimal places
                total = parseFloat(total.toFixed(decimalPlaces));

                row.find('.jmlbeli').val(jmlbeli);

                // format commas of total
                var totalFormatted = formatWithCommaSeparator(total);
                row.find('.total').val(totalFormatted);

                // Set data-value of total using jQuery
                row.find('.total').attr('data-value', total);
                calculateGrandTotal();
            })

            // Calculate the grandtotal
            function calculateGrandTotal() {
                var subtotal = 0;
                $('.total').each(function() {
                    var totalValue = parseFloat($(this).attr('data-value')) || 0;
                    subtotal += totalValue;
                });

                // var diskon     = parseFloat($("#inputdiskon").val()) || 0;
                // var ppn        = parseFloat($("#inputppn").val()) || 0;
                var diskon     = parseFloat($("#inputdiskon").attr('data-value')) || 0;
                var ppn        = parseFloat($("#inputppn").attr('data-value')) || 0;

                var grandTotal = (subtotal - diskon) + ppn;

                var subtotalFormatted = formatWithCommaSeparator(subtotal)
                var grandTotalFormatted = formatWithCommaSeparator(grandTotal)
                var diskonFormatted = formatWithCommaSeparator(diskon)
                var ppnFormatted = formatWithCommaSeparator(ppn)

                $('#subtotal').val(subtotalFormatted);
                $('#subtotal').attr('data-value', subtotal);
                $('#diskon').val(diskonFormatted);
                $('#diskon').attr('data-value', diskon);
                $('#ppn').val(ppnFormatted);
                $('#ppn').attr('data-value', ppn);
                $('#grandtotal').val(grandTotalFormatted);
                $('#grandtotal').attr('data-value', grandTotal);
            }

            // RUNNING FUNCTION SUM GRAND TOTAL
            calculateGrandTotal();

            // SUBMIT PEMBELIAN
            $('#submitPembelian').click(function(e) {
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
                                    url: "{{ route('pembelian.store') }}",
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
                                            $('#submitPembelian').html('Simpan');
                
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
                
                                            $('#pembelianForm').trigger("reset");
                                            $('#submitPembelian').html('Simpan');
                                            $('#pembelianModal').modal('hide');
                
                                            // CHECK IF EDIT DONT REFRESH PAGE
                                            var edit = $(this).hasClass('edit')
                
                                            if(edit){
                                                transaksiPembelian.draw();
                                                listbarang.draw();
                                            }else{
                                                transaksiPembelian.draw();
                                                listbarang.draw();
                                                setInterval(function() {
                                                    window.location.reload();
                                                }, 1000);
                                            }
                                        }
                                    }
                                });
    
                            } else {
                                $('#submitPembelian').html('Simpan');
                                Swal.fire("Cancel!", "Perintah dibatalkan!", "error");
                            }
                        });
                }else{
                    $.ajax({
                        url: "{{ route('pembelian.store') }}",
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
                                $('#submitPembelian').html('Simpan');
    
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
    
                                $('#pembelianForm').trigger("reset");
                                $('#submitPembelian').html('Simpan');
                                $('#pembelianModal').modal('hide');
    
                                // CHECK IF EDIT DONT REFRESH PAGE
                                var edit = $(this).hasClass('edit')
    
                                if(edit){
                                    transaksiPembelian.draw();
                                    listbarang.draw();
                                }else{
                                    transaksiPembelian.draw();
                                    listbarang.draw();
                                    setInterval(function() {
                                        window.location.reload();
                                    }, 1000);
                                }
                            }
                        }
                    });
                }

            });

            // DETAIL PEMBELIAN
            $('body').on('click', '#detail-pembelian', function() {
                var pembelian_id = $(this).attr('data-id')
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#pembelianForm').trigger("reset");
                $('#submitPembelian').html('Simpan');
                $('#tambahpembelianHeading').html("SHOW DATA DETAIL PEMBELIAN")

                $("#list-barang").html('')
                $('#pembelianModal').modal('show');

                $.ajax({
                    type: "POST",
                    url: "{{ route('pembelian.detail') }}",
                    data: {
                        pembelian_id: pembelian_id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        const pembelian_tanggal = response.pembelian_tanggal;
                        const supplier_id       = response.supplier_id;
                        const keterangan        = response.pembelian_keterangan;
                        const subtotalFormatted          = formatWithCommaSeparator(response.pembelian_subtotal);
                        const diskonFormatted            = formatWithCommaSeparator(response.pembelian_diskon);
                        const ppnFormatted               = formatWithCommaSeparator(response.pembelian_ppn);
                        const grandTotalFormatted        = formatWithCommaSeparator(response.pembelian_grandtotal);
                        const subtotal          = response.pembelian_subtotal;
                        const diskon            = response.pembelian_diskon;
                        const ppn               = response.pembelian_ppn;
                        const grandtotal        = response.pembelian_grandtotal;

                        $("#tanggal").val(pembelian_tanggal).prop('readonly', true)
                        $("#supplier_id").val(supplier_id).prop('readonly', true)
                        $("#keterangan").val(keterangan).prop('readonly', true)

                        $('#inputdiskon').val(diskonFormatted).prop('readonly', true);
                        $('#inputdiskon').attr('data-value', diskon);
                        $('#inputppn').val(ppnFormatted).prop('readonly', true);
                        $('#inputppn').attr('data-value', ppnFormatted);

                        $('#subtotal').val(subtotalFormatted)
                        $('#subtotal').attr('data-value', subtotal)
                        $('#diskon').val(diskonFormatted)
                        $('#diskon').attr('data-value', diskon)
                        $('#ppn').val(ppnFormatted)
                        $('#ppn').attr('data-value', ppn)
                        $('#grandtotal').val(grandTotalFormatted)
                        $('#grandtotal').attr('data-value', grandtotal)

                        var detailListBarang = '';
                        var no = 1;
                        $.each(response.pembeliandetail, function(index, value) {
                            const kadar        = value['detail_pembelian_kadar']
                            const berat        = value['detail_pembelian_berat']
                            const harga_beliFormatted   = formatWithCommaSeparator(value['detail_pembelian_harga_beli'])
                            const harga_beli   = value['detail_pembelian_harga_beli']
                            const nilai_tukar  = value['detail_pembelian_nilai_tukar']
                            const jml_beli     = value['detail_pembelian_jml_beli']
                            const totalFormatted        = formatWithCommaSeparator(value['detail_pembelian_total'])
                            const total        = value['detail_pembelian_total']
                            const pembelian_id = value['pembelian_id']
                            const barang_id    = value['barang_id']

                            const barang_kode  = value['barang']['barang_kode']
                            const barang_nama  = value['barang']['barang_nama']
                            const barang_foto  = value['barang']['barang_foto']

                            detailListBarang += `<tr>
                                                    <td>` + no++ + `</td>
                                                    <td>
                                                        <div class="media align-items-center">
                                                            <div class="media-head me-2">
                                                                <div class="avatar avatar-xs avatar-rounded">
                                                                    <a href="${'storage/foto_barang/' + barang_foto}" download>
                                                                        <img src="${'storage/foto_barang/' + barang_foto}" alt="user" class="avatar-img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="text-high-em">${barang_nama}</div>
                                                                <div class="fs-7" class="table-link-text link-medium-em">${barang_kode}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>` + kadar + `</td>
                                                    <td>` + berat + `</td>
                                                    <td>
                                                        <input class="form-control" id="barang_id" type="hidden" value="` + barang_id + `"
                                                            placeholder="Harga Beli" name="barang_id[]" />
                                                        <input class="form-control barang_berat" type="hidden" value="` + berat + `"
                                                            placeholder="Harga Beli" name="detail_pembelian_barang_berat[]" />
                                                        <input class="form-control kadar" type="hidden" value="` + kadar + `"
                                                            placeholder="Harga Beli" name="detail_pembelian_kadar[]" />
                                                        <input class="form-control jmlbeli" type="hidden" value="${jml_beli}"
                                                            placeholder="Harga Beli" name="detail_pembelian_jml_beli[]" />
                                                        <input class="form-control pembelian_id" type="hidden"
                                                            placeholder="Harga Beli" name="pembelian_id[]" value="` + pembelian_id + `" />
                                                        <input class="form-control harga_beli" type="text" oninput="test(this);"
                                                            placeholder="Harga Beli" name="detail_pembelian_harga_beli[]" value="` + harga_beliFormatted + `" data-value="${harga_beli}" readonly />
                                                    </td>
                                                    <td> <input class="form-control nilai_tukar" type="number"
                                                            placeholder="Nilai Tukar" name="detail_pembelian_nilai_tukar[]" value="` + nilai_tukar + `" readonly /></td>
                                                    <td> <input class="form-control total" type="text"
                                                            placeholder="Jumlah Harga" name="detail_pembelian_total[]" value="` + totalFormatted + `" data-value="${total}" readonly /></td>
                                                </tr>`;
                        });
                        $("#list-barang").html(detailListBarang)
                        $("#submitPembelian").prop('hidden', true);
                    }

                });

            })

        })
    </script>
@endpush
