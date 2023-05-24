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
                            <h1 class="pg-title">Data Supplier</h1>
                            <p>Manajemen Pengelolaan Data Supplier Toko Emas</p>
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
                                        <h6>Data Supplier
                                            <span class="badge badge-sm badge-light ms-1">240</span>
                                        </h6>
                                        <div class="card-action-wrap">
                                            <button class="btn btn-sm btn-outline-light"><span><span class="icon"><span
                                                            class="feather-icon"><i
                                                                data-feather="upload"></i></span></span><span
                                                        class="btn-text">import</span></span></button>
                                            <button class="btn btn-sm btn-primary ms-3" data-bs-toggle="modal"
                                                data-bs-target="#tambahSupplier"><span><span class="icon"><span
                                                            class="feather-icon"><i
                                                                data-feather="plus"></i></span></span><span
                                                        class="btn-text">Add new</span></span></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="contact-list-view">
                                            <table id="datable_3" class="table nowrap table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode</th>
                                                        <th>Nama</th>
                                                        <th>Kontak</th>
                                                        <th>Alamat</th>
                                                        <th>Kota</th>
                                                        <th>Status Supplier</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>001</td>
                                                        <td>Tiger Nixion</td>
                                                        <td>08123652367</td>
                                                        <td>Jl. Wonokromo</td>
                                                        <td>Surabaya</td>
                                                        <td><div class="badge badge-success">Aktif</div></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1"
                                                                    data-bs-toggle="tooltip" data-placement="top"
                                                                    title="" data-bs-original-title="Edit"
                                                                    href="#"><span class="icon"><span
                                                                            class="feather-icon"><i data-feather="edit-2"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#edit_barang"></i></span></span></a>
                                                                <a class="btn btn-icon btn-danger btn-rounded flush-soft-hover del-button"
                                                                    data-bs-toggle="tooltip" data-placement="top"
                                                                    title="" data-bs-original-title="Delete"
                                                                    href="#"><span class="icon"><span
                                                                            class="feather-icon"><i data-feather="trash"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#hapus_barang"></i></span></span></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>002</td>
                                                        <td>Lion King</td>
                                                        <td>0812365123</td>
                                                        <td>Jl. Tunjungan</td>
                                                        <td>Surabaya</td>
                                                        <td><div class="badge badge-success">Aktif</div></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1"
                                                                    data-bs-toggle="tooltip" data-placement="top"
                                                                    title="" data-bs-original-title="Edit"
                                                                    href="#"><span class="icon"><span
                                                                            class="feather-icon"><i data-feather="edit-2"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#edit_barang"></i></span></span></a>
                                                                <a class="btn btn-icon btn-danger btn-rounded flush-soft-hover del-button"
                                                                    data-bs-toggle="tooltip" data-placement="top"
                                                                    title="" data-bs-original-title="Delete"
                                                                    href="#"><span class="icon"><span
                                                                            class="feather-icon"><i data-feather="trash"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#hapus_barang"></i></span></span></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>003</td>
                                                        <td>Giraffe</td>
                                                        <td>0812362323</td>
                                                        <td>Jl. Pucang</td>
                                                        <td>Surabaya</td>
                                                        <td><div class="badge badge-danger">Tidak Aktif</div></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1"
                                                                    data-bs-toggle="tooltip" data-placement="top"
                                                                    title="" data-bs-original-title="Edit"
                                                                    href="#"><span class="icon"><span
                                                                            class="feather-icon"><i data-feather="edit-2"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#edit_barang"></i></span></span></a>
                                                                <a class="btn btn-icon btn-danger btn-rounded flush-soft-hover del-button"
                                                                    data-bs-toggle="tooltip" data-placement="top"
                                                                    title="" data-bs-original-title="Delete"
                                                                    href="#"><span class="icon"><span
                                                                            class="feather-icon"><i data-feather="trash"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#hapus_barang"></i></span></span></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>004</td>
                                                        <td>Crocodile</td>
                                                        <td>0812312739</td>
                                                        <td>Jl. Semolowaru</td>
                                                        <td>Surabaya</td>
                                                        <td><div class="badge badge-danger">Tidak Aktif</div></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1"
                                                                    data-bs-toggle="tooltip" data-placement="top"
                                                                    title="" data-bs-original-title="Edit"
                                                                    href="#"><span class="icon"><span
                                                                            class="feather-icon"><i data-feather="edit-2"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#edit_barang"></i></span></span></a>
                                                                <a class="btn btn-icon btn-danger btn-rounded flush-soft-hover del-button"
                                                                    data-bs-toggle="tooltip" data-placement="top"
                                                                    title="" data-bs-original-title="Delete"
                                                                    href="#"><span class="icon"><span
                                                                            class="feather-icon"><i data-feather="trash"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#hapus_barang"></i></span></span></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
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

            {{-- Modal Tambah Supplier --}}
            <div class="modal fade" id="tambahSupplier" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data Supplier Baru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row gx-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Kode</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="" placeholder="Kode"
                                                name="kode_edit" />
                                        </div>
                                        <label class="form-label">Nama</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="" placeholder="Nama"
                                                name="Nama_edit" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kontak</label>
                                            <input class="form-control" type="text" value=""
                                                placeholder="085........" name="name" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kota</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" value=""
                                                    placeholder="Nama Kota" name="Nama_edit" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Alamat</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" value=""
                                                placeholder="Jl. Nama Jalan..." name="kode_edit" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Edit Supplier --}}
            <div class="modal fade" id="edit_barang" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data Supplier</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row gx-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Kode</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="" placeholder="Kode"
                                                name="kode_edit" />
                                        </div>
                                        <label class="form-label">Nama</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="" placeholder="Nama"
                                                name="Nama_edit" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kontak</label>
                                            <input class="form-control" type="text" value=""
                                                placeholder="085........" name="name" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kota</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" value=""
                                                    placeholder="Nama Kota" name="Nama_edit" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Alamat</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" value=""
                                                placeholder="Jl. Nama Jalan..." name="kode_edit" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- hapus modal -->
            <div class="modal fade" id="hapus_barang" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalSmall01" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin Akan Menghapus Supplier Ini??</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                            <button type="button" class="btn btn-success">Ya</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- hapus modal -->
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
