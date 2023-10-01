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
                            <h1 class="pg-title">Data Merk</h1>
                            <p>Management Pengelolaan Data Merk Toko Emas</p>
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
                                        <h6>List Data Merk
                                            <span class="badge badge-sm badge-light ms-1">{{ count($merks) }}</span>
                                        </h6>
                                        <div class="card-action-wrap">
                                            <button class="btn btn-sm btn-primary ms-3" id="merk-create"><span><span
                                                        class="icon"><span class="feather-icon"><i
                                                                data-feather="plus"></i></span></span><span
                                                        class="btn-text">Tambah
                                                        Merk</span></span></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="contact-list-view">
                                            <table id="datatable_7" class="table nowrap datatableMerk table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode</th>
                                                        <th>Nama</th>
                                                        <th>Status</th>
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

            {{-- Modal Merk --}}
            <div class="modal fade" id="merkModal" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="merkHeading"></h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                style="display: none;" style="color: red">
                            </div>
                            <form id="merkForm">
                                <div class="row gx-3">
                                    <input type="hidden" id="merk_id" name="merk_id">
                                    <div class="col-sm-12">
                                        <label class="form-label">Nama Merk</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Masukkan Nama"
                                                name="merk_nama" id="merk_nama" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer align-items-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" id="submitMerk">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
                ajax: "{{ route('merk.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'merk_kode',
                        name: 'merk_kode'
                    },
                    {
                        data: 'merk_nama',
                        name: 'merk_nama'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

            // Create Data Merk.
            $('#merk-create').click(function() {
                $('.alert').hide();
                $('#saveBtn').val("create-merk");
                $('#merk_id').val('');
                $('#merkForm').trigger("reset");
                $('#merkHeading').html("TAMBAH DATA MERK BARU");
                $('#merkModal').modal('show');
            });

            $('#submitMerk').on('click', function(e) {
                e.preventDefault();

                $(this).html('Sending..');
                //  var form = $(this).serialize(); 

                //  alert(form);
                $.ajax({
                    url: "{{ route('merk.store') }}",
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
                            $('#submitMerk').html('Simpan');

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

                            $('#merkForm').trigger("reset");
                            $('#submitMerk').html('Simpan');
                            $('#merkModal').modal('hide');

                            datatable.draw();
                        }
                    }
                });
            });


            // Edit Data Merk
            $('body').on('click', '#user-edit', function() {
                var merk_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('merk.edit') }}",
                    data: {
                        merk_id: merk_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submitBtnMerk').val("merk-edit");
                        $('#merkForm').trigger("reset");
                        $('#merkHeading').html("EDIT DATA Merk");
                        $('#merkModal').modal('show');
                        $('#merk_id').val(response.merk_id);
                        $('#merk_nama').val(response.merk_nama);
                    }
                });
            });

            // Arsipkan Data Merk
            $('body').on('click', '#user-delete', function() {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2",
                    },
                    buttonsStyling: false,

                });

                var merk_id = $(this).attr('data-id');

                swalWithBootstrapButtons
                    .fire({
                        title: "Do you want to update, this data?",
                        text: "This data will be updated!",
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
                                url: "{{ route('merk.destroy') }}",
                                data: {
                                    merk_id: merk_id,
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
