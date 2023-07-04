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
                            <h1 class="pg-title">Data Barang</h1>
                            <p>Management Pengelolaan Data Barang Toko Emas</p>
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
                                        <h6>List Data Barang
                                            <span class="badge badge-sm badge-light ms-1">{{ count($barangs) }}</span>
                                        </h6>
                                        <div class="card-action-wrap">
                                            <button class="btn btn-sm btn-primary ms-3" id="barang-create"><span><span
                                                        class="icon"><span class="feather-icon"><i
                                                                data-feather="plus"></i></span></span><span
                                                        class="btn-text">Tambah
                                                        Barang</span></span></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="contact-list-view">
                                            <table id="datatable_7" class="table nowrap datatableBarang table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Berat</th>
                                                        <th>Satuan</th>
                                                        <th>Jenis</th>
                                                        <th>Status</th>
                                                        <th>Lokasi</th>
                                                        <th>Stok</th>
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

            {{-- Modal Barang --}}
            <div class="modal fade" id="barangModal" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="barangHeading"></h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                style="display: none;" style="color: red">
                            </div>
                            <form   id="barangForm">
                                <div class="row gx-3">
                                    <input type="hidden" id="barang_id" name="barang_id">
                                    <div class="col-sm-12">
                                        <label class="form-label">Kode</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" disabled
                                                name="barang_id" id="barang_id" />
                                         </div> 
                                        <label class="form-label">Nama Barang</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Masukkan Nama"
                                                name="barang_nama" id="barang_nama" />
                                         </div> 
                                    </div>
                                </div> 
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Berat</label>
                                            <input class="form-control" type="number" step=0.01
                                                value="0.01" name="barang_berat" min="0"
                                                id="barang_berat" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Pabrik</label>
                                            <select class="form-select" name="pabrik_id" id="pabrik_id">
                                                <option selected="">--</option>
                                                <!-- di for each nanti -->
                                                <option value="1">UBS</option>
                                                <option value="2">HWT</option>
                                                <option value="3">LL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Supplier</label>
                                        <select class="form-select" name="supplier_id" id="supplier_id">
                                                <option selected="">--</option>
                                                <!-- di for each nanti -->
                                                <option value="1">UBS</option>
                                                <option value="2">HWT</option>
                                                <option value="3">LL</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kadar</label>
                                            <select class="form-select" name="kadar_id" id="kadar_id">
                                                <option selected="">--</option>
                                                <!-- di for each nanti -->
                                                <option value="1">UBS</option>
                                                <option value="2">HWT</option>
                                                <option value="3">LL</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Model</label>
                                            <select class="form-select" name="model_id" id="model_id">
                                                <option selected="">--</option>
                                                <!-- di for each nanti -->
                                                <option value="1">UBS</option>
                                                <option value="2">HWT</option>
                                                <option value="3">LL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-12"> 
                                        <label class="form-label">Harga Beli</label>
                                        <input class="form-control" type="number" step=".01" value="0.00"
                                                placeholder="0.00" name="barang_harga_beli" min="0" id="barang_harga_beli" />
                                    </div>
                                </div> 
                                <div class="row gx-3">
                                    <div class="col-sm-2 form-group">
                                        <div class="dropify-square">
                                            <input type="file" class="dropify-1" name="barang_file" id="barang_file"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 form-group">
                                        <textarea class="form-control mnh-100p" rows="4" placeholder="Kondisi" id="barang_kondisi" name="barang_kondisi"></textarea>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="form-check form-check-sm mb-3">
                                        <input type="checkbox" class="form-check-input" id="barang_aktif" name="barang_aktif" checked>
                                        <label class="form-check-label text-muted fs-7" for="logged_in">Aktif</label>
                                    </div>
                                </div>
                                <div class="modal-footer align-items-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" id="submitBarang">Simpan</button>
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
                ajax: "{{ route('barang.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'barang_nama',
                        name: 'barang_nama'
                    }, 
                    {
                        data: 'barang_berat',
                        name: 'barang_harga_jual_1'
                    }, 
                    {
                        data: 'barang_harga_jual_2',
                        name: 'barang_harga_jual_2'
                    }, 
                    {
                        data: 'barang_harga_jual_1',
                        name: 'barang_harga_jual_1'
                    }, 
                    {
                        data: 'barang_harga_jual_2',
                        name: 'barang_harga_jual_2'
                    }, 
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

            // Create Data Barang.
            $('#barang-create').click(function() {
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#barang_id').val('');
                $('#barangForm').trigger("reset");
                $('#barangHeading').html("TAMBAH DATA KADAR BARU");
                $('#barangModal').modal('show');
            });

            $('#submitBarang').on('click', function(e){
                e.preventDefault();

                $(this).html('Sending..');
                //  var form = $(this).serialize(); 
                 
                //  alert(form);
                 $.ajax({
                    url: "{{ route('barang.store') }}",
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
                            $('#submitBarang').html('Simpan');

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

                            $('#barangForm').trigger("reset");
                            $('#submitBarang').html('Simpan');
                            $('#barangModal').modal('hide');

                            datatable.draw();
                        }
                    }
                 });
            });


            // Edit Data Barang
            $('body').on('click', '#user-edit', function() {
                var barang_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('barang.edit') }}",
                    data: {
                        barang_id: barang_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submitBtnBarang').val("barang-edit");
                        $('#barangForm').trigger("reset");
                        $('#barangHeading').html("EDIT DATA Barang");
                        $('#barangModal').modal('show');
                        $('#barang_id').val(response.barang_id);
                        $('#barang_nama').val(response.barang_nama);
                        $('#barang_harga_jual_1').val(response.barang_harga_jual_1);
                        $('#barang_harga_jual_2').val(response.barang_harga_jual_2);
                    }
                });
            });

            // Arsipkan Data Barang
            $('body').on('click', '#user-delete', function() {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2",
                    },
                    buttonsStyling: false,

                });

                var barang_id = $(this).attr('data-id');

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
                                url: "{{ route('barang.destroy') }}",
                                data: {
                                    barang_id: barang_id,
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
