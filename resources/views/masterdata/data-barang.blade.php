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
                <ul class="nav nav-line nav-light nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#data_barang">
                            <span class="nav-link-text">List Barang</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#detail_barang">
                            <span class="nav-link-text">Detail/History Barang</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /Page Header -->

            <!-- Page Body -->
            <div class="hk-pg-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="data_barang">
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
                                            <table id="datatable_7" class="table nowrap  table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Berat</th>
                                                        <th>Model</th>
                                                        <th>Pabrik</th> 
                                                        <th>Supplier</th>
                                                        <th>Kadar</th> 
                                                        <th>Lokasi</th> 
                                                        <th>Kondisi</th> 
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

            {{-- Modal Tambah Barang --}}
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
                                        <label class="form-label">Kode Barang</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text"
                                                name="barang_kode" id="barang_kode"  value="00000000000001" disabled/>
                                         </div> 
                                    </div>
                                    <div class="col-sm-12">  
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
                                            <label class="form-label">Supplier</label>
                                            <select class="form-select" name="supplier_id" id="supplier_id" onchange="remakekodesupplier()">
                                                <option selected="">--</option>
                                                <?php 
                                                foreach ($suppliers as $supplier) {
                                                    $nama = $supplier['supplier_nama']; 
                                                    $id = $supplier['supplier_id'];  
                                                    $kode = $supplier['supplier_kode'];  
                                                    echo "<option value='$id' data-attribute='$kode'>$nama</option>";}
                                                ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Pabrik</label>
                                            <select class="form-select" name="pabrik_id" id="pabrik_id" onchange="remakekodepabrik()">
                                                <option selected="">--</option>
                                                <?php 
                                                foreach ($pabriks as $pabrik) {
                                                    $nama = $pabrik['pabrik_nama']; 
                                                    $id = $pabrik['pabrik_id'];  
                                                    $kode = $pabrik['pabrik_kode'];  
                                                    echo "<option value='$id' data-attribute='$kode'>$nama</option>";}
                                                ?> 
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Kadar</label>
                                            <select class="form-select" name="kadar_id" id="kadar_id" onchange="remakekodekadar()">
                                                <option selected="">--</option>
                                                <?php 
                                                foreach ($kadars as $kadar) {
                                                    $nama = $kadar['kadar_nama']; 
                                                    $id = $kadar['kadar_id'];  
                                                    $kode = $kadar['kadar_kode'];  
                                                    echo "<option value='$id' data-attribute='$kode'>$nama</option>";}
                                                ?> 
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Berat</label>
                                            <input class="form-control" type="number" step=0.01 value="0.01" min="0"
                                                placeholder="Masukkan Berat" name="barang_berat"
                                                id="barang_berat" onchange="remakekodeberat()"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-12"> 
                                        <label class="form-label">Model</label>
                                            <select class="form-select" name="model_id" id="model_id"  onchange="remakekodemodel()">
                                                <option selected="">--</option>
                                                <?php 
                                                foreach ($models as $model) {
                                                    $nama = $model['model_nama']; 
                                                    $id = $model['model_id'];  
                                                    $kode = $model['model_kode'];  
                                                    echo "<option value='$id' data-attribute='$kode'>$nama</option>";}
                                                ?> 
                                            </select>
                                    </div>
                                </div> 
                                <br>
                                <div class="row gx-3">
                                    <div class="col-sm-2 form-group">
                                        <div class="dropify-square">
                                            <input type="file" class="dropify-1" name="barang_foto" id="barang_foto"/>
                                        </div>
                                    </div> 
                                    <div class="col-sm-10 form-group">
                                        <textarea class="form-control mnh-100p" rows="4" id="barang_kondisi" name="barang_kondisi"  placeholder="Kondisi"></textarea>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="form-check form-check-sm mb-3">
                                        <input type="checkbox" class="form-check-input" id="barang_status" name="barang_status" checked>
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

            {{-- Modal Detail Barang --}}
            <div class="modal fade" id="detailbarangModal" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                             
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                style="display: none;" style="color: red">
                            </div>
                             <table id="datatable_8" class="table nowrap table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. Transaksi</th>
                                        <th>Berat</th>
                                        <th>Harga Jual</th>
                                        <th>Harga beli</th> 
                                        <th>Tanggal</th> 
                                        <th>Keterangan</th> 
                                        <th>Kondisi</th>  
                                    </tr>
                                </thead>
                            </table> 
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
        //Remake Kode Barang 
        //inputElement.disabled = true;
        function remakekodenourut() { 
                var inputElement = document.getElementById("barang_kode").value;  
                
                var datas = @json($barangs);
                //alert(datas[0]['model_nama']);
                var kodeBarang = inputElement.slice(0,9);
                var countKodeSama = 0;
                for (var i in datas) {
                    var potonganKodeBarang = datas[i]['barang_kode'].slice(0,9);
                    if(kodeBarang == potonganKodeBarang){
                        countKodeSama++;
                    }
                }
                countKodeSama++;
                var nourut = countKodeSama.toString().padStart(5,'0');
                
                var newKodeBarang = inputElement.slice(0,9)+nourut;
                
                document.getElementById("barang_kode").value = newKodeBarang;
        }

        function remakekodesupplier() { 
                var comboBox = document.getElementById("supplier_id");
                var selectedOption = comboBox.options[comboBox.selectedIndex];
                var selectedKode = selectedOption.getAttribute("data-attribute");
                var inputElement = document.getElementById("barang_kode"); 
                var newKodeBarang = selectedKode+inputElement.value.slice(2,14);
                inputElement.value = newKodeBarang;
                remakekodenourut();
        }

        function remakekodemodel() { 
                var comboBox = document.getElementById("model_id");
                var selectedOption = comboBox.options[comboBox.selectedIndex];
                var selectedKode = selectedOption.getAttribute("data-attribute");
                var inputElement = document.getElementById("barang_kode"); 
                var newKodeBarang = inputElement.value.slice(0,2)+selectedKode+inputElement.value.slice(4,14);
                
                inputElement.value = newKodeBarang;
                remakekodenourut();
        }
        
        function remakekodepabrik() { 
                var comboBox = document.getElementById("pabrik_id");
                var selectedOption = comboBox.options[comboBox.selectedIndex];
                var selectedKode = selectedOption.getAttribute("data-attribute");
                var inputElement = document.getElementById("barang_kode"); 
                var newKodeBarang = inputElement.value.slice(0,4)+selectedKode+inputElement.value.slice(6,14);
                
                inputElement.value = newKodeBarang;
                remakekodenourut();
        }
        
        function remakekodekadar() { 
                var comboBox = document.getElementById("kadar_id");
                var selectedOption = comboBox.options[comboBox.selectedIndex];
                var selectedKode = selectedOption.getAttribute("data-attribute");
                //kadar kodenya cuma dipake 1 digit
                var potonganSelectedKode = selectedKode.slice(1,2);
                var inputElement = document.getElementById("barang_kode"); 
                var newKodeBarang = inputElement.value.slice(0,6)+potonganSelectedKode+inputElement.value.slice(7,14);
                
                inputElement.value = newKodeBarang;
                remakekodenourut();
        }

        function remakekodeberat() { 
                var beratTemp = document.getElementById("barang_berat");
                beratTemp = "0" + beratTemp.value.slice(0,1);
                var inputElement = document.getElementById("barang_kode"); 
                var newKodeBarang = inputElement.value.slice(0,7)+beratTemp+inputElement.value.slice(9,14);
                
                inputElement.value = newKodeBarang;
                remakekodenourut();
        }

        
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
                        name: 'barang_berat'
                    },  
                    {
                        data: 'model_id',
                        name: 'model_id'
                    }, 
                    {
                        data: 'pabrik_id',
                        name: 'pabrik_id'
                    },  
                    {
                        data: 'supplier_id',
                        name: 'supplier_id'
                    }, 
                    {
                        data: 'kadar_id',
                        name: 'kadar_id'
                    }, 
                    {
                        data: 'barang_lokasi',
                        name: 'barang_lokasi'
                    }, 
                    {
                        data: 'barang_kondisi',
                        name: 'barang_kondisi'
                    }, 
                    {
                        data: 'barang_status',
                        name: 'barang_status'
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
                $('#barangHeading').html("TAMBAH DATA BARANG BARU");
                $('#barangModal').modal('show');
            });

            $('#submitBarang').on('click', function(e){
                var inputElement = document.getElementById("barang_kode");
                //inputElement.disabled = true;
                inputElement.disabled = false;

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

                 var inputElement = document.getElementById("barang_kode");
                //inputElement.disabled = true;
                inputElement.disabled = true;
            });


            // Edit Data Barang
            $('body').on('click', '#user-edit', function() {
                var inputElement = document.getElementById("barang_kode");
                //inputElement.disabled = true;
                inputElement.disabled = false;

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
                        $('#barang_kode').val(response.barang_kode);
                        $('#barang_id').val(response.barang_id);
                        $('#barang_nama').val(response.barang_nama);
                        $('#barang_kondisi').val(response.barang_kondisi);
                        $('#barang_berat').val(response.barang_berat);
                        $('#supplier_id').val(response.supplier_id);
                        $('#pabrik_id').val(response.pabrik_id);
                        $('#kadar_id').val(response.kadar_id);
                        $('#model_id').val(response.model_id);
                        $('#barang_foto').val(response.barang_foto);
                        $('#barang_status').val(response.barang_status); 
                    }
                });
                var inputElement = document.getElementById("barang_kode");
                //inputElement.disabled = true;
                inputElement.disabled = true;
            });

            // Detail Data Barang
            function barangDetail(barang_id){
                if ($.fn.DataTable.isDataTable('#datatable_8')) {
                    $('#datatable_8').DataTable().destroy();
                }
                var datatableDetail = $('#datatable_8').DataTable({
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
                    ajax: "/barangDetail/" + barang_id,
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'detail_barang_no_transaksi',
                            name: 'detail_barang_no_transaksi'
                        },  
                        {
                            data: 'detail_barang_berat',
                            name: 'detail_barang_berat'
                        },  
                        {
                            data: 'detail_barang_harga_jual',
                            name: 'detail_barang_harga_jual'
                        }, 
                        {
                            data: 'detail_barang_harga_beli',
                            name: 'detail_barang_harga_beli'
                        },  
                        {
                            data: 'created_at',
                            name: 'created_at'
                        }, 
                        {
                            data: 'detail_barang_keterangan',
                            name: 'detail_barang_keterangan'
                        }, 
                        {
                            data: 'detail_barang_kondisi',
                            name: 'detail_barang_kondisi'
                        }
                    ]
                });
            }
 
            $('body').on('click', '#barang-detail', function() {
                var barang_id = $(this).attr('data-id');
                var data = {
                    barang_id: $(this).attr('data-id'),
                    age: 25
                };

                $('.alert').hide();
                $("#detailbarangModal").modal('show')
                barangDetail(barang_id)

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
                        title: "Do you want to set status, this data?",
                        text: "This data status will be set!",
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
 
            // Pindah Etalase Data Barang
            $('body').on('click', '#barang-etalase', function() {

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
                    title: "Do you want to move this data to etalase?",
                    text: "This data location will be set!",
                    icon: "question",
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
                            url: "{{ route('barang.etalase') }}",
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
