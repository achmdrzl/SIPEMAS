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
                            <h1 class="pg-title">Data User</h1>
                            <p>Management Pengelolaan Data User Toko Emas</p>
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
                                        <h6>List Data User
                                            <span class="badge badge-sm badge-light ms-1">{{ count($users) }}</span>
                                        </h6>
                                        <div class="card-action-wrap">
                                            <button class="btn btn-sm btn-primary ms-3" id="user-create"><span><span
                                                        class="icon"><span class="feather-icon"><i
                                                                data-feather="plus"></i></span></span><span
                                                        class="btn-text">Tambah
                                                        User</span></span></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="contact-list-view">
                                            <table id="datatable_7" class="table nowrap datatableUser table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Role</th>
                                                        <th>Phone Number</th>
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

            {{-- Modal User --}}
            <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="userHeading"></h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                style="display: none;" style="color: red">
                            </div>
                            <form id="userForm">
                                <div class="row gx-3">
                                    <input type="hidden" id="user_id" name="user_id">
                                    <div class="col-sm-12">
                                        <label class="form-label">Name</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Masukkan Nama"
                                                name="name" id="name" />
                                        </div>
                                        <label class="form-label">Email</label>
                                        <div class="form-group">
                                            <input class="form-control" type="email" value=""
                                                placeholder="Masukkan Email" name="email" id="email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Phone Number</label>
                                            <input class="form-control" type="number"
                                                placeholder="Masukkan Nomor Handphone" name="phone_number"
                                                id="phone_number" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Position</label>
                                            <select class="form-select" id="role" name="role">
                                                <option selected disabled>--</option>
                                                <option value="user">Kasir</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Password</label>
                                        <div class="form-group">
                                            <div class="input-group password-check">
                                                <span class="input-affix-wrapper">
                                                    <input class="form-control" placeholder="Masukkan Password"
                                                        type="password" id="password" name="password" required
                                                        autocomplete="current-password">
                                                    <a href="#" class="input-suffix text-muted">
                                                        <span class="feather-icon"><i class="form-icon"
                                                                data-feather="eye"></i></span>
                                                        <span class="feather-icon d-none"><i class="form-icon"
                                                                data-feather="eye-off"></i></span>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <label class="form-label">Password Confirmation</label>
                                        <div class="form-group">
                                            <div class="input-group password-check">
                                                <span class="input-affix-wrapper">
                                                    <input class="form-control" placeholder="Masukkan Konfirmasi Password"
                                                        type="password" id="password_confirmation" name="password_confirmation" required
                                                        autocomplete="current-password">
                                                    <a href="#" class="input-suffix text-muted">
                                                        <span class="feather-icon"><i class="form-icon"
                                                                data-feather="eye"></i></span>
                                                        <span class="feather-icon d-none"><i class="form-icon"
                                                                data-feather="eye-off"></i></span>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer align-items-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="submitUser">Simpan</button>
                        </div>
                        </form>
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
                ajax: "{{ route('user.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

            // Create Data User.
            $('#user-create').click(function() {
                $('.alert').hide();
                $('#saveBtn').val("create-user");
                $('#user_id').val('');
                $('#userForm').trigger("reset");
                $('#userHeading').html("TAMBAH DATA USER BARU");
                $('#userModal').modal('show');
            });

            $('#submitUser').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    url: "{{ route('user.store') }}",
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
                            $('#submitUser').html('Simpan');

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

                            $('#userForm').trigger("reset");
                            $('#submitUser').html('Simpan');
                            $('#userModal').modal('hide');

                            datatable.draw();
                        }
                    }
                });
            });

            // Edit Data User
            $('body').on('click', '#user-edit', function() {
                var user_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('user.edit') }}",
                    data: {
                        user_id: user_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submitBtnUser').val("user-edit");
                        $('#userForm').trigger("reset");
                        $('#userHeading').html("EDIT DATA USER");
                        $('#userModal').modal('show');
                        $('#user_id').val(response.user_id);
                        $('#name').val(response.name);
                        $('#email').val(response.email);
                        $('#phone_number').val(response.phone_number);
                        $('#role').val(response.role);
                        $('#password').val('');
                        $('#password_confirmation').val('');
                    }
                });
            });

            // Arsipkan Data User
            $('body').on('click', '#user-delete', function() {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2",
                    },
                    buttonsStyling: false,

                });

                var user_id = $(this).attr('data-id');

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
                                url: "{{ route('user.destroy') }}",
                                data: {
                                    user_id: user_id,
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
