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
                            <h1 class="pg-title">Transaksi Penjualan</h1>
                            <p>POS Toko Emas</p>
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
                            <div class="create-invoice-wrap mt-xxl-5 p-md-5 p-3">
                                
                                <div class="row mt-5">
                                    <div class="col-sm">
                                        <form class="form-inline p-3 bg-grey-light-5 rounded">
                                            <div class="row gx-3 align-items-center">
                                                <div class="col-xl-auto mb-xl-0 mb-2">
                                                    <label class="form-label mb-xl-0">Jenis Pnejualan</label>
                                                </div>
                                                <div class="col-xl-auto mb-xl-0 mb-2">
                                                    <select class="form-select">
                                                        <option selected="">Perhiasan</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-auto mb-xl-0 mb-2">
                                                    <label class="form-label mb-xl-0">Tanggal</label>
                                                </div>
                                                <div class="col-xl-auto mb-xl-0 mb-2">
                                                    <input class="form-control" type="text" name="birthday" value="10/24/2023" />
                                                </div> 
                                            </div>
                                            <div class="row gx-3 align-items-center">
                                                <div class="col-xl-auto mb-xl-0 mb-2">
                                                    <label class="form-label mb-xl-0"></label>
                                                </div> 
                                            </div>
                                            <div class="row gx-3 align-items-center">
                                                <div class="col-xl-auto mb-xl-0 mb-2">
                                                    <label class="form-label mb-xl-0">No. Faktur : <b> FP2030501001</b> </label>
                                                </div> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-wrap mt-5">
                                    <div class="invoice-table-wrap">
                                        <table class="table table-bordered invoice-table">
                                            <thead class="thead-primary">
                                                <tr>
                                                    <th>Nama</th> 
                                                    <th colspan="2">Berat asli - jual</th>
                                                    <th >Harga</th>
                                                    <th>Diskon(Rp)</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="table-row-gap"><td></td></tr>
                                                <tr>
                                                    <td class="w-35 rounded-top-start border-end-0 border-bottom-0">  
                                                            <select class="form-control">
                                                                <option>Pilih Barang</option> 
                                                                <option value="AK">Liontin Huruf S 6 MT AD</option>
                                                                <option value="HI">Kalung Santa UBS420</option> 
                                                            </select> 
                                                    </td>

                                                    <td class="w-10 border-end-0 border-bottom-0"><input type="text" class="form-control qty" value="2.1"></td>

                                                    <td class="w-10 border-end-0 border-bottom-0"><input type="text" class="form-control price" value="2.1"></td>
                                                    <td class="w-15 border-end-0 border-bottom-0"><input type="text" class="form-control discount" value="705000"></td>
                                                    <td class="w-15 border-end-0 border-bottom-0"><input type="text" class="form-control discount" value="0"></td>

                                                    <td class="w-20  rounded-end  bg-primary-light-5 close-over position-relative" rowspan="2"><input type="text" class="form-control bg-transparent border-0 p-0 total" value="" readonly> 
                                                    <button type="button" class="close-row btn-close">
                                                        <span aria-hidden="true">×</span>
                                                    </button></td>
                                                </tr> 
                                            </tbody>
                                        </table>
                                        <a class="d-inline-flex align-items-center add-new-row" href="#">
                                            <i class="ri-add-box-line me-1"></i> Tambah Penjualan
                                        </a>
                                    </div>	
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-xxl-6 mt-5">
                                        <div class="table-wrap">
                                            <div class="table-responsive">
                                                <table class="table table-bordered subtotal-table">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3" class="rounded-top-start border-end-0 border-bottom-0">Subtotal : </td>
                                                            <td class="rounded-top-end border-bottom-0 w-30 bg-primary-light-5"><input type="text" class="form-control bg-transparent border-0 p-0 gross-total" value="" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="border-end-0 border-bottom-0">Diskon Barang : </td>
                                                            <td class="border-bottom-0  bg-primary-light-5"><input type="text" class="form-control bg-transparent border-0 p-0 gross-discount" value="" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border-end-0 border-bottom-0">Extra Diskon : </td>
                                                            <td class="border-end-0 border-bottom-0 w-25"><input type="text" class="form-control extdiscount" value="0"></td>
                                                            <td class="border-end-0 border-bottom-0 w-25">
                                                                 %
                                                            </td>
                                                            <td class="border-bottom-0  bg-primary-light-5"><input type="text" class="form-control bg-transparent border-0 p-0 extdiscount-read" value="0" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="rounded-bottom-start border-end-0 bg-primary-light-5"><span class="text-dark">Total</span></td>
                                                            <td class="rounded-bottom-end  bg-primary-light-5"><input type="text" class="form-control bg-transparent border-0 p-0 subtotal" value="" readonly></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-xxl-5 order-2 order-xxl-0">
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label class="form-label">Keterangan</label> 
                                            </div>
                                            <textarea class="form-control" rows="6" placeholder="Keterangan Transaksi"></textarea> 
                                        </div>
                                    </div>
                                </div>	
                                <div class="row mt-4">
                                    <div class="col-xxl-5 order-2 order-xxl-0">
                                        <button class="btn btn-sm btn-primary ms-3"  data-bs-toggle="modal" data-bs-target="#tambah_barang"><span><span class="icon"><span
                                            class="feather-icon"><i
                                                data-feather="plus"></i></span></span><span
                                        class="btn-text">Simpan Transaksi</span></span></button>
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
