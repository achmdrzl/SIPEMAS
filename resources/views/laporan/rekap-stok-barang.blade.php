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
                            <h1 class="pg-title">Laporan Rekap Stok Barang</h1>
                            <p>Managemen Pengelolaan Data Stok Barang Toko Emas</p>
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
                                        <h6>Data Rekap Stock Barang 
                                        </h6> 
                                    </div>
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_barang">Pilih Barang</button>
                                        <div class="contact-list-view">
                                            <table id="datable_31" class="table nowrap table-striped">
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
                                                                        <img src="backend/dist/img/logo-avatar-1.png" alt="user" class="avatar-img">
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="text-high-em">Kalung Emas 8K</div> 
                                                                    <div class="fs-7"   class="table-link-text link-medium-em">0200610500022 </div> 
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
                                                                        <img src="backend/dist/img/logo-avatar-1.png" alt="user" class="avatar-img">
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="text-high-em">Liontin Huruf S 6 MT AD</div> 
                                                                    <div class="fs-7"   class="table-link-text link-medium-em">0200310500022 </div> 
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
                                                                        <img src="backend/dist/img/logo-avatar-1.png" alt="user" class="avatar-img">
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="text-high-em">Gelang Giok</div> 
                                                                    <div class="fs-7"   class="table-link-text link-medium-em">0200610504002 </div> 
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
                </div>
            </div>
            <!-- /Page Body -->
            <!-- tambah modal -->
            <div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" >Tambah Barang Baru</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row gx-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Kode</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="" placeholder="Kode" name="kode_edit" />
                                        </div>	
                                        <label class="form-label">Nama</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="" placeholder="Nama" name="Nama_edit" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Berat</label>
                                            <input class="form-control" type="number" step=".01" value="0.00" placeholder="0.00" name="name" min="0"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Pabrik</label>  
                                            <select class="form-select">
                                                <option selected="">--</option>
                                                <option value="1">UBS</option>
                                                <option value="2">HWT</option>
                                                <option value="3">LL</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Satuan</label>  
                                            <select class="form-select">
                                                <option selected="">--</option>
                                                <option value="1">PCS</option> 
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kadar</label>  
                                            <select class="form-select">
                                                <option selected="">--</option>
                                                <option value="0">0</option>
                                                <option value="8K">8K</option>
                                                <option value="9K">9K</option>
                                                <option value="16K">16K</option>
                                                <option value="17K">17K</option>
                                                <option value="24K">24K</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-12"> 
                                        <div class="form-group">
                                            <label class="form-label">Model</label>  
                                            <select class="form-select">
                                                <option selected="">--</option>
                                                <option value="1">Cincin COR</option>
                                                <option value="2">Cincin Bangkok</option>
                                                <option value="3">Cintin Plat</option>
                                            </select>                                         
                                        </div>	 
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Jenis</label>  
                                            <select class="form-select">
                                                <option selected="">--</option>
                                                <option value="1">Perhiasan</option> 
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Harga Beli</label>  
                                            <input class="form-control" type="number"   value="" placeholder="0" name="name" min="0"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-2 form-group">
                                        <div class="dropify-square">
                                            <input type="file"  class="dropify-1"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 form-group">
                                        <textarea class="form-control mnh-100p" rows="4" placeholder="Kondisi"></textarea>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="form-check form-check-sm mb-3">
                                        <input type="checkbox" class="form-check-input" id="logged_in" checked>
                                        <label class="form-check-label text-muted fs-7" for="logged_in">Aktif</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer align-items-center">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tambah modal -->
            <!-- edit modal -->
            <div class="modal fade" id="edit_barang" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" >Pilih Barang</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row gx-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Kode</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="" placeholder="Kode" name="kode_edit" />
                                        </div>	
                                        <label class="form-label">Nama</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="" placeholder="Nama" name="Nama_edit" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kadar</label>  
                                            <select class="form-select">
                                                <option selected="">--</option>
                                                <option value="0">0</option>
                                                <option value="8K">8K</option>
                                                <option value="9K">9K</option>
                                                <option value="16K">16K</option>
                                                <option value="17K">17K</option>
                                                <option value="24K">24K</option>
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Pabrik</label>  
                                            <select class="form-select">
                                                <option selected="">--</option>
                                                <option value="1">UBS</option>
                                                <option value="2">HWT</option>
                                                <option value="3">LL</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div> 
                                <div class="row gx-3">
                                    <div class="col-sm-12"> 
                                        <div class="form-group">
                                            <label class="form-label">Supplier</label>  
                                            <select class="form-select">
                                                <option selected="">--</option>
                                                <option value="1">Bintang Mas</option>
                                                <option value="2">Mustika</option>
                                                <option value="3">ASG</option>
                                            </select>                                         
                                        </div>	 
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-12"> 
                                        <div class="form-group">
                                            <label class="form-label">Model</label>  
                                            <select class="form-select">
                                                <option selected="">--</option>
                                                <option value="1">Cincin COR</option>
                                                <option value="2">Cincin Bangkok</option>
                                                <option value="3">Cintin Plat</option>
                                            </select>                                         
                                        </div>	 
                                    </div>
                                </div>
                                <div class="row gx-3"> 
                                        <div class="form-group">
                                            <label class="form-label">Lokasi</label>  
                                            <select class="form-select">
                                                <option selected="">--</option>
                                                <option value="1">Cuci</option> 
                                                <option value="1">Etalase</option> 
                                                <option value="1">Belum Dipajang</option> 
                                            </select> 
                                        </div> 
                                </div>
                                
                            </form>
                        </div>
                        <div class="modal-footer align-items-center">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Pilih</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit modal -->
            <!-- hapus modal -->
            <div class="modal fade" id="hapus_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalSmall01" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin Akan Menghapus Barang Ini??</p>
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
