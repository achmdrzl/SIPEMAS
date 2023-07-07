@extends('layouts.main')

@section('content')
    <!-- Main Content -->
    <div class="hk-pg-wrapper">
        <div class="container-xxl">
            <!-- Page Header -->
            <div class="hk-pg-header pg-header-wth-tab pt-7">
                <div class="d-flex">
                    <div class="d-flex flex-wrap justify-content-between flex-1">
                        <div class="mb-lg-0 mb-2 me-8">
                            <h1 class="pg-title">Transaksi Hutang</h1>
                            <p>Management Pengelolaan Data Transaksi Hutang Toko Emas</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Page Body -->
            <div class="hk-pg-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab_block_1">
                        <div class="row">
                            <div class="col-md-12 mb-md-4 mb-3">
                                <div class="card card-border mb-0 h-100">
                                    <div class="card-header card-header-action">
                                        <h6>List Data Transaksi Hutang
                                            {{-- <span class="badge badge-sm badge-light ms-1">{{ count($kadars) }}</span> --}}
                                        </h6>
                                        <div class="card-action-wrap">
                                            <button class="btn btn-sm btn-primary ms-3" id="transaksi-create"><span><span
                                                        class="icon"><span class="feather-icon"><i
                                                                data-feather="plus"></i></span></span><span
                                                        class="btn-text">Tambah
                                                        Transaksi</span></span></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="contact-list-view">
                                            <table id="datatable_7" class="table nowrap datatableKadar table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode Transaksi</th>
                                                        <th>Tanggal</th>
                                                        <th>Jenis Transaksi</th>
                                                        <th>Total</th>
                                                        <th>Keterangan</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Body -->

            {{-- Modal Kadar --}}
            <div class="modal fade" id="transaksiModal" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="transaksiHeading"></h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                style="display: none;" style="color: red">
                            </div>
                            <form id="transkasiForm">
                                <div class="row gx-3">
                                    <input type="hidden" id="transaksi_id" name="transaksi_id">
                                    <div class="col-sm-12">
                                        <label class="form-label">Tanggal Transaksi</label>
                                        <div class="form-group">
                                            <input class="form-control" type="date" placeholder="Masukkan Tanggal Transaksi"
                                                name="tgl_transaksi" id="tgl_transaksi" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Jenis Transaksi</label>
                                        <div class="form-group">
                                            <select name="jenis_transaksi" class="form-control" id="jenis_transaksi">
                                                <option value="" disabled selected>-- Select Jenis Transaksi --</option>
                                                <option value="Pengeluaran">Pengeluaran</option>
                                                <option value="Pemasukan">Pemasukan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row gx-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Total Transaksi</label>
                                        <div class="form-group">
                                            <input class="form-control" type="number" placeholder="Masukkan Total Transaksi"
                                                name="total" id="total" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Keterangan</label>
                                        <div class="form-group">
                                            <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Keterangan Transaksi"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer align-items-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" id="submitTransaksi">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
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

            var datatable = $('#datatable_7').DataTable({
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
                ajax: "{{ route('transaksi.in.out') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'kode_transaksi',
                        name: 'kode_transaksi'
                    },
                    {
                        data: 'tgl_transaksi',
                        name: 'tgl_transaksi'
                    },
                    {
                        data: 'jenis_transaksi',
                        name: 'jenis_transaksi'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

            // Create Data Kadar.
            $('#transaksi-create').click(function() {
                $('.alert').hide();
                $('#saveBtn').val("create-transaksi");
                $('#transaksi_id').val('');
                $('#transkasiForm').trigger("reset");
                $('#transaksiHeading').html("TAMBAH DATA TRANSAKSI PEMASUKAN / PENGELUARAN");
                $('#transaksiModal').modal('show');
                $('#tgl_transaksi').attr('disabled', false);
            });

            $('#submitTransaksi').on('click', function(e) {
                e.preventDefault();

                $(this).html('Sending..');

                $.ajax({
                    url: "{{ route('transaksiInOut.store') }}",
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
                            $('#submitTransaksi').html('Simpan');

                        } else {
                            $('.btn-warning').hide();

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });

                            Toast.fire({
                                icon: 'success',
                                title: `${response.message}`,
                            })

                            $('#transkasiForm').trigger("reset");
                            $('#submitTransaksi').html('Simpan');
                            $('#transaksiModal').modal('hide');

                            datatable.draw();
                        }
                    }
                });
            });


            // Edit Data Kadar
            $('body').on('click', '#transaksi-edit', function() {
                var transaksi_id = $(this).attr('data-id');
                console.log(transaksi_id)
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('transaksiInOut.Edit') }}",
                    data: {
                        transaksi_id: transaksi_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submitBtnKadar').val("kadar-edit");
                        $('#transaksiForm').trigger("reset");
                        $('#transaksiHeading').html("EDIT DATA TRANSAKSI IN / OUT");
                        $('#transaksiModal').modal('show');
                        $('#transaksi_id').val(response.transaksi_id);
                        $('#tgl_transaksi').val(response.tgl_transaksi).attr('disabled', true);
                        $('#jenis_transaksi').val(response.jenis_transaksi);
                        console.log(response.jenis_transaksi)
                        $('#total').val(response.total);
                        $('#keterangan').val(response.keterangan);
                    }
                });
            });

            // Arsipkan Data Kadar
            $('body').on('click', '#transaksi-delete', function() {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2",
                    },
                    buttonsStyling: false,

                });

                var transaksi_id = $(this).attr('data-id');

                swalWithBootstrapButtons
                    .fire({
                        title: "Do you want to delete, this data?",
                        text: "This data will be deleted!",
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
                                url: "{{ route('transaksiInOut.Destroy') }}",
                                data: {
                                    transaksi_id: transaksi_id,
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
                                    datatable.draw();
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
