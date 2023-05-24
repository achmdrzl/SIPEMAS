@extends('layouts.main')

@section('content')
    <!-- Main Content -->
    <div class="hk-pg-wrapper">
        <div class="container">
            <!-- Page Header -->
            <div class="hk-pg-header pg-header-wth-tab">
                <div class="d-flex">
                    <div class="d-flex flex-wrap justify-content-between flex-1">
                        <div class="mb-lg-0 mb-2 me-8">
                            <h1 class="pg-title">Laporan Rekap Stock</h1>
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
                                <div class="row mt-3">
                                    <div class="col-sm p-3 bg-grey-light-5 rounded">
                                        <div class="row gx-3 align-items-center">
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <label class="form-label mb-xl-0">Tanggal :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <input class="form-control" type="date" />
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <label class="form-label mb-xl-0">s/d</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <input class="form-control" type="date" />
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <label class="form-label mb-xl-0">Pabrik :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <div class="col-xl-auto mb-xl-0 mb-2">
                                                    <select class="form-select">
                                                        <option selected="">--</option>
                                                        <option value="1">Perhiasan</option>
                                                        <option value="2">HWT</option>
                                                        <option value="3">LL</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <label class="form-label mb-xl-0">Kadar :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <div class="col-xl-auto mb-xl-0 mb-2">
                                                    <select class="form-select">
                                                        <option selected="">--</option>
                                                        <option value="1">Perhiasan</option>
                                                        <option value="2">HWT</option>
                                                        <option value="3">LL</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <label class="form-label mb-xl-0">Supplier :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <div class="col-xl-auto mb-xl-0 mb-2">
                                                    <select class="form-select">
                                                        <option selected="">--</option>
                                                        <option value="1">Perhiasan</option>
                                                        <option value="2">HWT</option>
                                                        <option value="3">LL</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm p-3 bg-grey-light-5 rounded">
                                        <div class="row gx-3 align-items-center">
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <label class="form-label mb-xl-0">Model :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <div class="col-xl-auto mb-xl-0 mb-2">
                                                    <select class="form-select">
                                                        <option selected="">--</option>
                                                        <option value="1">Perhiasan</option>
                                                        <option value="2">HWT</option>
                                                        <option value="3">LL</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <label class="form-label mb-xl-0">Lokasi :</label>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <div class="col-xl-auto mb-xl-0 mb-2">
                                                    <select class="form-select">
                                                        <option selected="">--</option>
                                                        <option value="1">Perhiasan</option>
                                                        <option value="2">HWT</option>
                                                        <option value="3">LL</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-auto mb-xl-0 mb-2">
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#tambahSupplier"><span><span class="icon"><span
                                                                class="feather-icon"><i
                                                                    data-feather="eye"></i></span></span><span
                                                            class="btn-text">Tampilkan</span></span></button>
                                                <button class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#tambahSupplier"><span><span class="icon"><span
                                                                class="feather-icon"><i
                                                                    data-feather="printer"></i></span></span><span
                                                            class="btn-text">Cetak Laporan</span></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-list-view mt-3">
                                    <table id="datable_3" class="table nowrap table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Berat</th>
                                                <th>Kadar</th>
                                                <th>Model</th>
                                                <th>Pabrik</th>
                                                <th>Supplier</th>
                                                <th>Stock</th>
                                                <th>Lokasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="media-head me-2">
                                                            <div class="avatar avatar-xs avatar-rounded">
                                                                <img src="backend/dist/img/logo-avatar-1.png" alt="user"
                                                                    class="avatar-img">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="text-high-em">Kalung Emas 8K</div>
                                                            <div class="fs-7" class="table-link-text link-medium-em">
                                                                0200610500022 </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>2.2</td>
                                                <td>8K</td>
                                                <td>Cincin COR</td>
                                                <td>UBS</td>
                                                <td>Bintang Mas</td>
                                                <td>1</td>
                                                <td>Cuci</td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="media-head me-2">
                                                            <div class="avatar avatar-xs avatar-rounded">
                                                                <img src="backend/dist/img/logo-avatar-1.png" alt="user"
                                                                    class="avatar-img">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="text-high-em">Liontin Huruf S 6 MT AD</div>
                                                            <div class="fs-7" class="table-link-text link-medium-em">
                                                                0200310500022 </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>2.8</td>
                                                <td>8K</td>
                                                <td>Cincin COR</td>
                                                <td>UBS</td>
                                                <td>Bintang Mas</td>
                                                <td>1</td>
                                                <td>Belum Dipajang</td>

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
                                                            <div class="text-high-em">Gelang Giok</div>
                                                            <div class="fs-7" class="table-link-text link-medium-em">
                                                                0200610504002 </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>2.4</td>
                                                <td>16K</td>
                                                <td>Cincin COR</td>
                                                <td>UBS</td>
                                                <td>Bintang Mas</td>
                                                <td>1</td>
                                                <td>Etalase</td>

                                            </tr>
                                        </tbody>
                                    </table>
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
