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
                                                            <table id="datatable_8" class="table nowrap table-striped">
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
                                                    <div class="card-footer">
                                                        <p style="font-size: 18px">BERAT TOTAL : <strong>126,2
                                                                gram</strong></p>
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
                                    <th>Kode</th>
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
                                                            <input type="number"
                                                                class="form-control bg-transparent border-0 p-0"
                                                                value="0" id="subtotal" name="pembelian_subtotal"
                                                                readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-end-0 border-bottom-0">Diskon : </td>
                                                        <td colspan="2" class="border-end-0 border-bottom-0 w-25">
                                                            <input type="number" class="form-control" value="0"
                                                                id="inputdiskon" name="inputdiskon">
                                                        </td>
                                                        <td class="border-bottom-0  bg-primary-light-5"><input
                                                                type="number"
                                                                class="form-control bg-transparent border-0 p-0"
                                                                value="0" id="diskon" name="pembelian_diskon"
                                                                readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-end-0 border-bottom-0">PPN : </td>
                                                        <td colspan="2" class="border-end-0 border-bottom-0 w-25">
                                                            <input type="number" class="form-control" value="0"
                                                                id="inputppn" name="inputppn">
                                                        </td>
                                                        <td class="border-bottom-0  bg-primary-light-5">
                                                            <input type="number"
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
                                                            <input type="number"
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                            <button type="submit" id="submitPembelian" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Page Footer -->
        <div class="hk-footer">
            <footer class="container-xxl footer">
                <div class="row">
                    <div class="col-xl-8">
                        <p class="footer-text"><span class="copy-text">Jampack © 2022 All rights reserved.</span> <a
                                href="#" class="" target="_blank">Privacy Policy</a><span
                                class="footer-link-sep">|</span><a href="#" class=""
                                target="_blank">T&C</a><span class="footer-link-sep">|</span><a href="#"
                                class="" target="_blank">System Status</a></p>
                    </div>
                    <div class="col-xl-4">
                        <a href="#" class="footer-extr-link link-default"><span class="feather-icon"><i
                                    data-feather="external-link"></i></span><u>Send feedback to our help forum</u></a>
                    </div>
                </div>
            </footer>
        </div>
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
                        name: 'barang_nama'
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
                ]
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
                $('#tambahpembelianHeading').html("TAMBAH DATA PENJUALAN BARU")
                $("#submitPembelian").prop('hidden', false);
                $("#tanggal").prop('readonly', false)
                $("#supplier_id").prop('readonly', false)
                $("#keterangan").prop('readonly', false)
                $('#inputdiskon').prop('readonly', false);
                $('#inputppn').prop('readonly', false);
                $("#list-barang").html('')

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

                                listbarang += `<tr>
                                                    <td>` + no++ + `</td>
                                                    <td>` + barangkode + `</td>
                                                    <td>` + barangnama + `</td>
                                                    <td>` + kadar + `</td>
                                                    <td>` + barangberat +
                                    `</td>
                                                    <td>
                                                        <input class="form-control" id="barang_id" type="hidden" value="` +
                                    barangid +
                                    `"
                                                            placeholder="Harga Beli" name="barang_id[]" />
                                                        <input class="form-control barang_berat" type="hidden" value="` +
                                    barangberat + `"
                                                            placeholder="Harga Beli" name="detail_pembelian_barang_berat[]" />
                                                        <input class="form-control kadar" type="hidden" value="` +
                                    kadar + `"
                                                            placeholder="Harga Beli" name="detail_pembelian_kadar[]" />
                                                        <input class="form-control jmlbeli" type="hidden" value=""
                                                            placeholder="Harga Beli" name="detail_pembelian_jml_beli[]" />
                                                        <input class="form-control harga_beli" type="number" value=""
                                                            placeholder="Harga Beli" name="detail_pembelian_harga_beli[]" />
                                                    </td>
                                                    <td> <input class="form-control nilai_tukar" type="number" value=""
                                                            placeholder="Nilai Tukar" name="detail_pembelian_nilai_tukar[]" /></td>
                                                    <td> <input class="form-control total" type="number" value=""
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

            // Calculate and update the totals for each row
            $('body').on('input', '.harga_beli, .nilai_tukar, #inputdiskon, #inputppn', function() {
                var row = $(this).closest('tr');
                var hargaBeli = parseFloat(row.find('.harga_beli').val()) || 0;
                var nilaiTukar = parseFloat(row.find('.nilai_tukar').val()) || 0;
                var barangBerat = parseFloat(row.find('.barang_berat').val()) || 0;
                var jmlbeli = hargaBeli * nilaiTukar; // Harga Beli * Nilai Tukar
                var total = barangBerat * hargaBeli * nilaiTukar; // Barang Berat * Harga Beli * Nilai Tukar
                var decimalPlaces =
                2; // Change this number to round to a different number of decimal places

                // Round the total value to the specified decimal places
                total = parseFloat(total.toFixed(decimalPlaces));

                row.find('.jmlbeli').val(jmlbeli);
                row.find('.total').val(total);
                calculateGrandTotal();
            })

            // Calculate the grandtotal
            function calculateGrandTotal() {
                var subtotal = 0;
                $('.total').each(function() {
                    var totalValue = parseFloat($(this).val()) || 0;
                    subtotal += totalValue;
                });

                var diskon = parseFloat($("#inputdiskon").val()) || 0;
                var ppn = parseFloat($("#inputppn").val()) || 0;

                var grandTotal = (subtotal - diskon) + ppn;

                $('#subtotal').val(subtotal);
                $('#diskon').val(diskon);
                $('#ppn').val(ppn);
                $('#grandtotal').val(grandTotal);
            }

            // RUNNING FUNCTION SUM GRAND TOTAL
            calculateGrandTotal();

            // SUBMIT PEMBELIAN
            $('#submitPembelian').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

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

                            transaksiPembelian.draw();
                            listbarang.draw();
                            setInterval(function() {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                });
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
                        console.log(response)
                        const pembelian_tanggal = response.pembelian_tanggal;
                        const supplier_id = response.supplier_id;
                        const keterangan = response.pembelian_keterangan;
                        const subtotal = response.pembelian_subtotal;
                        const diskon = response.pembelian_diskon;
                        const ppn = response.pembelian_ppn;
                        const grandtotal = response.pembelian_grandtotal;

                        $("#tanggal").val(pembelian_tanggal).prop('readonly', true)
                        $("#supplier_id").val(supplier_id).prop('readonly', true)
                        $("#keterangan").val(keterangan).prop('readonly', true)
                        $('#inputdiskon').val(diskon).prop('readonly', true);
                        $('#inputppn').val(ppn).prop('readonly', true);
                        $('#subtotal').val(subtotal)
                        $('#diskon').val(diskon)
                        $('#ppn').val(ppn)
                        $('#grandtotal').val(grandtotal)

                        var detailListBarang = '';
                        var no = 1;
                        $.each(response.pembeliandetail, function(index, value) {
                            const kadar = value['detail_pembelian_kadar']
                            const berat = value['detail_pembelian_berat']
                            const harga_beli = value['detail_pembelian_harga_beli']
                            const nilai_tukar = value['detail_pembelian_nilai_tukar']
                            const total = value['detail_pembelian_total']

                            const barang_kode = value['barang']['barang_kode']
                            const barang_nama = value['barang']['barang_nama']

                            detailListBarang += `<tr>
                                                    <td>` + no++ + `</td>
                                                    <td>` + barang_kode + `</td>
                                                    <td>` + barang_nama + `</td>
                                                    <td>` + kadar + `</td>
                                                    <td>` + berat +
                                `</td>
                                                    <td>
                                                        <input class="form-control harga_beli" type="number"
                                                            placeholder="Harga Beli" name="detail_pembelian_harga_beli[]" value="` +
                                harga_beli +
                                `" readonly />
                                                    </td>
                                                    <td> <input class="form-control nilai_tukar" type="number"
                                                            placeholder="Nilai Tukar" name="detail_pembelian_nilai_tukar[]" value="` +
                                nilai_tukar +
                                `" readonly /></td>
                                                    <td> <input class="form-control total" type="number"
                                                            placeholder="Jumlah Harga" name="detail_pembelian_total[]" value="` +
                                total + `" readonly /></td>
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
