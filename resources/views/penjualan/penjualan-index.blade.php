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
                                                        <input class="form-control" type="date" />
                                                    </div>
                                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                                        <label class="form-label mb-xl-0">s/d</label>
                                                    </div>
                                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                                        <input class="form-control" type="date" />
                                                    </div>
                                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#tambahSupplier"><span><span
                                                                    class="icon"><span class="feather-icon"><i
                                                                            data-feather="calendar"></i></span></span><span
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
                                                            <th>No</th>
                                                            <th>Tanggal</th>
                                                            <th>No Faktur</th>
                                                            <th>Total</th>
                                                            <th>Jenis Penjualan</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>23/05/2023</td>
                                                            <td>FP9820183901</td>
                                                            <td>Rp. 250.000.22</td>
                                                            <td>Perhiasan</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Lihat Detail"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i data-feather="eye"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#detail_penjualan"></i></span></span>
                                                                    </a>
                                                                    <a class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Cetak Faktur"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="printer"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#"></i></span></span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>12/08/2023</td>
                                                            <td>FP98212803</td>
                                                            <td>Rp. 350.000.22</td>
                                                            <td>Perhiasan</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Lihat Detail"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i data-feather="eye"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#detail_penjualan"></i></span></span>
                                                                    </a>
                                                                    <a class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Cetak Faktur"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="printer"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#"></i></span></span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>15/05/2023</td>
                                                            <td>FP128031231</td>
                                                            <td>Rp. 789.000</td>
                                                            <td>Perhiasan</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="Lihat Detail"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i data-feather="eye"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#detail_penjualan"></i></span></span>
                                                                    </a>
                                                                    <a class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="Cetak Faktur"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="printer"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#"></i></span></span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>01/05/2023</td>
                                                            <td>FP129038123</td>
                                                            <td>Rp. 250.000</td>
                                                            <td>Perhiasan</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="Lihat Detail"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i data-feather="eye"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#detail_penjualan"></i></span></span>
                                                                    </a>
                                                                    <a class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="Cetak Faktur"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="printer"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#"></i></span></span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>23/09/2023</td>
                                                            <td>FP12980192</td>
                                                            <td>Rp. 12.500.000</td>
                                                            <td>Perhiasan</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="Lihat Detail"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i data-feather="eye"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#detail_penjualan"></i></span></span>
                                                                    </a>
                                                                    <a class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="Cetak Faktur"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="printer"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#"></i></span></span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>23/05/2023</td>
                                                            <td>FP9820183901</td>
                                                            <td>Rp. 250.000.22</td>
                                                            <td>Perhiasan</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a class="btn btn-icon btn-secondary btn-rounded flush-soft-hover me-1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Edit"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i data-feather="eye"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#detail_penjualan"></i></span></span>
                                                                    </a>
                                                                    <a class="btn btn-icon btn-info btn-rounded flush-soft-hover me-1"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="Cetak Faktur"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="printer"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#"></i></span></span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
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
                                                            <button class="btn btn-sm btn-primary ms-3"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#tambah_penjualan"><span><span
                                                                        class="icon"><span class="feather-icon"><i
                                                                                data-feather="plus"></i></span></span><span
                                                                        class="btn-text">Tambah
                                                                        Penjualan</span></span></button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="contact-list-view">
                                                            <table id="datable_4c" class="table nowrap table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>No</th>
                                                                        <th>Nama</th>
                                                                        <th>Berat</th>
                                                                        <th>Satuan</th>
                                                                        <th>Jenis</th>
                                                                        <th>Lokasi</th>
                                                                        <th>Stok</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>
                                                                            <div class="media align-items-center">
                                                                                <div class="media-head me-2">
                                                                                    <div
                                                                                        class="avatar avatar-xs avatar-rounded">
                                                                                        <img src="backend/dist/img/logo-avatar-1.png"
                                                                                            alt="user"
                                                                                            class="avatar-img">
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
                                                                        <td>0.75</td>
                                                                        <td>Pcs</td>
                                                                        <td>Perhiasan</td>
                                                                        <td>Terjual</td>
                                                                        <td>3</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>
                                                                            <div class="media align-items-center">
                                                                                <div class="media-head me-2">
                                                                                    <div
                                                                                        class="avatar avatar-xs avatar-rounded">
                                                                                        <img src="backend/dist/img/logo-avatar-1.png"
                                                                                            alt="user"
                                                                                            class="avatar-img">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="text-high-em">Anting Jepret
                                                                                        COR 2 Baris
                                                                                    </div>
                                                                                    <div class="fs-7"
                                                                                        class="table-link-text link-medium-em">
                                                                                        0200610500003
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>1.40</td>
                                                                        <td>Pcs</td>
                                                                        <td>Perhiasan</td>
                                                                        <td>Blm Dipajang</td>
                                                                        <td>3</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>
                                                                            <div class="media align-items-center">
                                                                                <div class="media-head me-2">
                                                                                    <div
                                                                                        class="avatar avatar-xs avatar-rounded">
                                                                                        <img src="backend/dist/img/logo-avatar-1.png"
                                                                                            alt="user"
                                                                                            class="avatar-img">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="text-high-em">Gelang Rantai
                                                                                        1 Plat</div>
                                                                                    <div class="fs-7"
                                                                                        class="table-link-text link-medium-em">
                                                                                        0200610500003 </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>2.75</td>
                                                                        <td>Pcs</td>
                                                                        <td>Perhiasan</td>
                                                                        <td>Etalase</td>
                                                                        <td>3</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>
                                                                            <div class="media align-items-center">
                                                                                <div class="media-head me-2">
                                                                                    <div
                                                                                        class="avatar avatar-xs avatar-rounded">
                                                                                        <img src="backend/dist/img/logo-avatar-1.png"
                                                                                            alt="user"
                                                                                            class="avatar-img">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="text-high-em">Liontin Huruf
                                                                                        S 6 MT AD</div>
                                                                                    <div class="fs-7"
                                                                                        class="table-link-text link-medium-em">
                                                                                        0200610500032 </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>0.65</td>
                                                                        <td>Pcs</td>
                                                                        <td>Perhiasan</td>
                                                                        <td>Terjual</td>
                                                                        <td>3</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>
                                                                            <div class="media align-items-center">
                                                                                <div class="media-head me-2">
                                                                                    <div
                                                                                        class="avatar avatar-xs avatar-rounded">
                                                                                        <img src="backend/dist/img/logo-avatar-1.png"
                                                                                            alt="user"
                                                                                            class="avatar-img">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="text-high-em">Kalung Santa
                                                                                        UBS420</div>
                                                                                    <div class="fs-7"
                                                                                        class="table-link-text link-medium-em">
                                                                                        0200610540002 </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>2.75</td>
                                                                        <td>Pcs</td>
                                                                        <td>Perhiasan</td>
                                                                        <td>Terjual</td>
                                                                        <td>3</td>
                                                                    </tr>
                                                                </tbody>
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
        <div class="modal fade" id="tambah_penjualan" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Tambah Penjualan Baru</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md p-2 bg-grey-light-5 rounded">
                                <div class="row align-items-center">
                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                        <label class="form-label mb-xl-0">Tanggal :</label>
                                    </div>
                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                        <input class="form-control" type="date" />
                                    </div>
                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                        <label class="form-label mb-xl-0">Jenis Penjualan :</label>
                                    </div>
                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                        <select class="form-select">
                                            <option selected="">--</option>
                                            <option value="1">Perhiasan</option>
                                            <option value="2">HWT</option>
                                            <option value="3">LL</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                        <label class="form-label mb-xl-0">Keterangan :</label>
                                    </div>
                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                        <textarea name="" class="form-control" id=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                        </div>
                        <div class="table-wrap">
                            <div class="invoice-table-wrap ">
                                <table class="table nowrap table-striped" id="datable_4c">
                                    <thead>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Kadar</th>
                                        <th>Berat Asli</th>
                                        <th>Berat Jual</th>
                                        <th>Harga</th>
                                        <th>Ongkos</th>
                                        <th>Jumlah Harga</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>91028309</td>
                                            <td>Cincin</td>
                                            <td>16K</td>
                                            <td>2,10</td>
                                            <td><input class="form-control w-50" type="text" value="2,10" /></td>
                                            <td>
                                                <input class="form-control" type="text" value=""
                                                    placeholder="Harga Beli" name="kode_edit" />
                                            </td>
                                            <td> <input class="form-control" type="text" value=""
                                                    placeholder="Nilai Tukar" name="kode_edit" /></td>
                                            <td> <input class="form-control" type="text" value=""
                                                    placeholder="Jumlah Harga" name="kode_edit" readonly /></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>12938102</td>
                                            <td>Kalung</td>
                                            <td>16K</td>
                                            <td>5,10</td>
                                            <td><input class="form-control w-50" type="text" value="5,10" /></td>
                                            <td>
                                                <input class="form-control" type="text" value=""
                                                    placeholder="Harga Beli" name="kode_edit" />
                                            </td>
                                            <td> <input class="form-control" type="text" value=""
                                                    placeholder="Nilai Tukar" name="kode_edit" /></td>
                                            <td> <input class="form-control" type="text" value=""
                                                    placeholder="Jumlah Harga" name="kode_edit" readonly /></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>4839840</td>
                                            <td>Liontin</td>
                                            <td>16K</td>
                                            <td>3,10</td>
                                            <td><input class="form-control w-50" type="text" value="3,10" /></td>
                                            <td>
                                                <input class="form-control" type="text" value=""
                                                    placeholder="Harga Beli" name="kode_edit" />
                                            </td>
                                            <td> <input class="form-control" type="text" value=""
                                                    placeholder="Nilai Tukar" name="kode_edit" /></td>
                                            <td> <input class="form-control" type="text" value=""
                                                    placeholder="Jumlah Harga" name="kode_edit" readonly /></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-xxl-6 mt-5">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table class="table table-bordered subtotal-table">
                                            <tbody>
                                                <tr>
                                                    <td colspan="3"
                                                        class="rounded-top-start border-end-0 border-bottom-0">Subtotal :
                                                    </td>
                                                    <td class="rounded-top-end border-bottom-0 w-30 bg-primary-light-5">
                                                        <input type="text"
                                                            class="form-control bg-transparent border-0 p-0 gross-total"
                                                            value="0" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border-end-0 border-bottom-0">Diskon : </td>
                                                    <td colspan="2" class="border-end-0 border-bottom-0 w-25"><input
                                                            type="text" class="form-control extdiscount"
                                                            value="0"></td>
                                                    <td class="border-bottom-0  bg-primary-light-5"><input type="text"
                                                            class="form-control bg-transparent border-0 p-0 extdiscount-read"
                                                            value="0" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td class="border-end-0 border-bottom-0">PPN : </td>
                                                    <td colspan="2" class="border-end-0 border-bottom-0 w-25"><input
                                                            type="text" class="form-control extdiscount"
                                                            value="0"></td>
                                                    <td class="border-bottom-0  bg-primary-light-5"><input type="text"
                                                            class="form-control bg-transparent border-0 p-0 extdiscount-read"
                                                            value="0" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td class="border-end-0 border-bottom-0">Tunai : </td>
                                                    <td colspan="2" class="border-end-0 border-bottom-0 w-25"><input
                                                            type="text" class="form-control extdiscount"
                                                            value="0"></td>
                                                    <td class="border-bottom-0  bg-primary-light-5"><input type="text"
                                                            class="form-control bg-transparent border-0 p-0 extdiscount-read"
                                                            value="0" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"
                                                        class="rounded-top-start border-end-0 border-bottom-0">Kembalian :
                                                    </td>
                                                    <td class="rounded-top-end border-bottom-0 w-30 bg-primary-light-5">
                                                        <input type="text"
                                                            class="form-control bg-transparent border-0 p-0 gross-total"
                                                            value="0" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"
                                                        class="rounded-bottom-start border-end-0 bg-primary-light-5"><span
                                                            class="text-dark">Total</span></td>
                                                    <td class="rounded-bottom-end  bg-primary-light-5"><input
                                                            type="text"
                                                            class="form-control bg-transparent border-0 p-0 subtotal"
                                                            value="0" readonly></td>
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
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Detail Penjualan --}}
        <div class="modal fade" id="detail_penjualan" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Detail Penjualan</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md p-2 bg-grey-light-5 rounded">
                                <div class="row align-items-center">
                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                        <label class="form-label mb-xl-0">Tanggal :</label>
                                    </div>
                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                        <input class="form-control" type="date" value="2023-05-23" readonly/>
                                    </div>
                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                        <label class="form-label mb-xl-0">Jenis Penjualan :</label>
                                    </div>
                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                        <select class="form-select">
                                            <option value="1" selected>Perhiasan</option>
                                            <option value="2">HWT</option>
                                            <option value="3">LL</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                        <label class="form-label mb-xl-0">Keterangan :</label>
                                    </div>
                                    <div class="col-xl-auto mb-xl-0 mb-2">
                                        <textarea name="" class="form-control" id="" readonly>Baik</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                        </div>
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th>Kadar</th>
                                <th>Berat Asli</th>
                                <th>Berat Jual</th>
                                <th>Harga</th>
                                <th>Ongkos</th>
                                <th>Jumlah Harga</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>91028309</td>
                                    <td>Cincin</td>
                                    <td>16K</td>
                                    <td>2,10</td>
                                    <td><input class="form-control w-50" type="text" value="2,10" readonly /></td>
                                    <td>
                                        <input class="form-control" type="text" value="750000"
                                            placeholder="Harga Beli" name="kode_edit" readonly />
                                    </td>
                                    <td> <input class="form-control" type="text" value="0"
                                            placeholder="Nilai Tukar" name="kode_edit" readonly /></td>
                                    <td> <input class="form-control" type="text" value="750000"
                                            placeholder="Jumlah Harga" name="kode_edit" readonly /></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>12938102</td>
                                    <td>Kalung</td>
                                    <td>16K</td>
                                    <td>5,10</td>
                                    <td><input class="form-control w-50" type="text" value="5,10" readonly /></td>
                                    <td>
                                        <input class="form-control" type="text" value="1250000"
                                            placeholder="Harga Beli" name="kode_edit" readonly />
                                    </td>
                                    <td> <input class="form-control" type="text" value="50000"
                                            placeholder="Nilai Tukar" name="kode_edit" readonly/></td>
                                    <td> <input class="form-control" type="text" value="1300000"
                                            placeholder="Jumlah Harga" name="kode_edit" readonly /></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>4839840</td>
                                    <td>Liontin</td>
                                    <td>16K</td>
                                    <td>3,10</td>
                                    <td><input class="form-control w-50" type="text" value="3,10" readonly/></td>
                                    <td>
                                        <input class="form-control" type="text" value="550000"
                                            placeholder="Harga Beli" name="kode_edit" readonly />
                                    </td>
                                    <td> <input class="form-control" type="text" value="0"
                                            placeholder="Nilai Tukar" name="kode_edit" /></td>
                                    <td> <input class="form-control" type="text" value="550000"
                                            placeholder="Jumlah Harga" name="kode_edit" readonly /></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-end">
                            <div class="col-xxl-6 mt-5">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table class="table table-bordered subtotal-table">
                                            <tbody>
                                                <tr>
                                                    <td colspan="3"
                                                        class="rounded-top-start border-end-0 border-bottom-0">Subtotal :
                                                    </td>
                                                    <td class="rounded-top-end border-bottom-0 w-30 bg-primary-light-5">
                                                        <input type="text"
                                                            class="form-control bg-transparent border-0 p-0 gross-total"
                                                            value="3752500" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border-end-0 border-bottom-0">Diskon : </td>
                                                    <td colspan="2" class="border-end-0 border-bottom-0 w-25"><input
                                                            type="text" class="form-control extdiscount"
                                                            value="0" readonly></td>
                                                    <td class="border-bottom-0  bg-primary-light-5"><input type="text"
                                                            class="form-control bg-transparent border-0 p-0 extdiscount-read"
                                                            value="0" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td class="border-end-0 border-bottom-0">PPN : </td>
                                                    <td colspan="2" class="border-end-0 border-bottom-0 w-25"><input
                                                            type="text" class="form-control extdiscount"
                                                            value="0" readonly></td>
                                                    <td class="border-bottom-0  bg-primary-light-5"><input type="text"
                                                            class="form-control bg-transparent border-0 p-0 extdiscount-read"
                                                            value="0" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td class="border-end-0 border-bottom-0">Tunai : </td>
                                                    <td colspan="2" class="border-end-0 border-bottom-0 w-25"><input
                                                            type="text" class="form-control extdiscount"
                                                            value="3755000" readonly></td>
                                                    <td class="border-bottom-0  bg-primary-light-5"><input type="text"
                                                            class="form-control bg-transparent border-0 p-0 extdiscount-read"
                                                            value="0" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"
                                                        class="rounded-top-start border-end-0 border-bottom-0">Kembalian :
                                                    </td>
                                                    <td class="rounded-top-end border-bottom-0 w-30 bg-primary-light-5">
                                                        <input type="text"
                                                            class="form-control bg-transparent border-0 p-0 gross-total"
                                                            value="2500" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"
                                                        class="rounded-bottom-start border-end-0 bg-primary-light-5"><span
                                                            class="text-dark">Total</span></td>
                                                    <td class="rounded-bottom-end  bg-primary-light-5"><input
                                                            type="text"
                                                            class="form-control bg-transparent border-0 p-0 subtotal"
                                                            value="3755000" readonly></td>
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
                        <button type="button" class="btn btn-primary">Simpan</button>
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
