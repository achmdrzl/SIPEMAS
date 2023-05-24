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
                            <h1 class="pg-title">Data Model</h1>
                            <p>Manajemen Pengelolaan Data Model Toko Emas</p>
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
                                        <h6>Data Model
                                            <span class="badge badge-sm badge-light ms-1">240</span>
                                        </h6>
                                        <div class="card-action-wrap">
                                            <button class="btn btn-sm btn-outline-light"><span><span class="icon"><span
                                                            class="feather-icon"><i
                                                                data-feather="upload"></i></span></span><span
                                                        class="btn-text">import</span></span></button>
                                            <button class="btn btn-sm btn-primary ms-3"><span><span class="icon"><span
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
                                                        <th>Model</th>
                                                        <th>Status Model</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>01</td>
                                                        <td>Cincin Cor</td>
                                                        <td>
                                                            <div class="badge badge-success">Aktif</div>
                                                        </td>
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
                                                        <td>02</td>
                                                        <td>Cincin Plat</td>
                                                        <td>
                                                            <div class="badge badge-success">Aktif</div>
                                                        </td>
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
                                                        <td>03</td>
                                                        <td>Kalung Longling</td>
                                                        <td>
                                                            <div class="badge badge-success">Aktif</div>
                                                        </td>
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
                                                        <td>04</td>
                                                        <td>Kalung Guci</td>
                                                        <td>
                                                            <div class="badge badge-danger">Tidak Aktif</div>
                                                        </td>
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
                                                        <td>05</td>
                                                        <td>Kalung Santa</td>
                                                        <td>
                                                            <div class="badge badge-success">Aktif</div>
                                                        </td>
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
