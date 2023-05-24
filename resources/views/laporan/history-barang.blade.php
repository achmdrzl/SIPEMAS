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
                            <h1 class="pg-title">Laporan History Barang</h1>
                        </div>
                    </div>
                </div>
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
                                                        <label class="form-label mb-xl-0">Filter data :</label>
                                                    </div>
                                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                                        <input class="form-control" type="text" />
                                                    </div>
                                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#tambahSupplier"><span><span
                                                                    class="icon"><span class="feather-icon"><i
                                                                            data-feather="eye"></i></span></span><span
                                                                    class="btn-text">Tampilkan</span></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-wrap mt-5">
                                            <div class="invoice-table-wrap">
                                                <table id="datable_3" class="table nowrap table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Tanggal</th>
                                                            <th>Kondisi Barang</th>
                                                            <th>No. Transaksi</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-head me-2">
                                                                        <div class="avatar avatar-xs avatar-rounded">
                                                                            <img src="backend/dist/img/logo-avatar-1.png"
                                                                                alt="user" class="avatar-img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="text-high-em">Anting Gondel
                                                                            Rantai Italy 2
                                                                        </div>
                                                                        <div class="fs-7"
                                                                            class="table-link-text link-medium-em">
                                                                            0200610500002
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>20 Januari 2023</td>
                                                            <td>-</td>
                                                            <td>240357</td>
                                                            <td style="color: green;">Stock Awal</td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-head me-2">
                                                                        <div class="avatar avatar-xs avatar-rounded">
                                                                            <img src="backend/dist/img/logo-avatar-1.png"
                                                                                alt="user" class="avatar-img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="text-high-em">Anting Gondel
                                                                            Rantai Italy 2
                                                                        </div>
                                                                        <div class="fs-7"
                                                                            class="table-link-text link-medium-em">
                                                                            0200610500002
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>30 Januari 2023</td>
                                                            <td>-</td>
                                                            <td>240357</td>
                                                            <td style="color: red;">Jual</td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-head me-2">
                                                                        <div class="avatar avatar-xs avatar-rounded">
                                                                            <img src="backend/dist/img/logo-avatar-1.png"
                                                                                alt="user" class="avatar-img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="text-high-em">Anting Gondel
                                                                            Rantai Italy 2
                                                                        </div>
                                                                        <div class="fs-7"
                                                                            class="table-link-text link-medium-em">
                                                                            0200610500002
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>20 Mei 2023</td>
                                                            <td>Baik</td>
                                                            <td>240357</td>
                                                            <td style="color: green;">Retur Masuk</td>

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
