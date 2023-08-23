@extends('layouts.main')

@push('style-alt')
    <style>
        .custom-modal-dialog {
            max-width: 1420px; /* Set your desired width */
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
                                                            <table id="datatable_8" class="table nowrap table-striped">
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
                ]
            });

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
                        name: 'barang_nama'
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
                ]
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
                                    ]
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
                                const barangberat  = value['barang_berat']
                                const kadar        = value['kadar']['kadar_nama']
                                const harga_jual_1 = value['kadar']['kadar_harga_jual_1']
                                const harga_jual_2 = value['kadar']['kadar_harga_jual_2']

                                listbarang += `<tr>
                                                    <td>`+ no++ +`</td>
                                                    <td>`+ barangkode +`</td>
                                                    <td>`+ barangnama +`</td>
                                                    <td>`+ kadar +`</td>
                                                    <td>`+ barangberat +`</td>
                                                    <td>
                                                        <input class="form-control barang_id" type="hidden" value="`+ barangid +`"
                                                            placeholder="Barang Id" name="barang_id[]" />
                                                        <input class="form-control penjualan_berat_jual" type="number" value="`+ barangberat +`"
                                                            placeholder="Berat Jual" name="detail_penjualan_berat_jual[]" />
                                                    </td>
                                                    <td> <select class="form-select penjualan_harga" name="detail_penjualan_harga[]">
                                                                <option value="" selected disabled>--</option>
                                                                <option value="`+ harga_jual_1 +`">`+ rupiah(harga_jual_1) +`</option>
                                                                <option value="`+ harga_jual_2 +`">`+ rupiah(harga_jual_2) +`</option>
                                                            </select>
                                                    </td>
                                                    <td> <input class="form-control penjualan_ongkos" type="number" value=""
                                                            placeholder="Ongkos" name="detail_penjualan_ongkos[]" />
                                                    </td>
                                                    <td> <input class="form-control penjualan_diskon" type="number" value=""
                                                            placeholder="Diskon" name="detail_penjualan_diskon[]" />
                                                    </td>
                                                    <td> <input class="form-control penjualan_total" type="number" value=""
                                                            placeholder="Jumlah Harga" name="detail_penjualan_total[]" readonly />
                                                    </td>
                                             </tr>`;
    
                            });
                            $("#list-barang").html(listbarang)
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

            // Calculate and update the totals for each row
           $('body').on('input', '.penjualan_berat_jual, .penjualan_harga, .penjualan_diskon, #inputdiskon, #inputtunai', function() {
                var row = $(this).closest('tr');
                var beratJual = parseFloat(row.find('.penjualan_berat_jual').val()) || 0;
                var hargaJual = parseFloat(row.find('.penjualan_harga').val()) || 0;
                var ongkos = parseFloat(row.find('.penjualan_ongkos').val()) || 0;
                var diskon = parseFloat(row.find('.penjualan_diskon').val()) || 0;

                var total = ((beratJual * hargaJual + ongkos) - diskon); // Barang Berat * Harga Beli * Nilai Tukar
                var decimalPlaces = 2; // Change this number to round to a different number of decimal places

                // Round the total value to the specified decimal places
                total = parseFloat(total.toFixed(decimalPlaces));

                row.find('.penjualan_total').val(total);
                calculateGrandTotal();
            })

            // Calculate the grandtotal
            function calculateGrandTotal() {
                var subtotal = 0;
                $('.penjualan_total').each(function() {
                    var totalValue  = parseFloat($(this).val()) || 0;
                    subtotal += totalValue;
                });

                var inputdiskon     = parseFloat($("#inputdiskon").val()) || 0;
                var inputtunai      = parseFloat($("#inputtunai").val()) || 0;
                var grandTotal      = subtotal - inputdiskon; // Grand Total Formula
                var kembalian       = inputtunai - grandTotal; // Kembalian Formula

                $('#penjualan_subtotal').val(subtotal);                
                $('#penjualan_diskon').val(inputdiskon);
                $('#penjualan_grandtotal').val(grandTotal);
                $('#penjualan_tunai').val(inputtunai);
                $("#penjualan_kembalian").val(kembalian)
            }
            
            // RUNNING FUNCTION SUM GRAND TOTAL
            calculateGrandTotal();

            // SUBMIT PENJUALAN
            $('#submitPenjualan').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

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
                            setInterval(function() {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                });
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
            
        })
    </script>
@endpush