@extends('layouts.main')

@push('style-alt')
    <style>
        .custom-width-column {
            width: 200px; /* Set your desired width here */
        }
        .custom-width-column2 {
            width: 50px; /* Set your desired width here */
        }
        .custom-width-column3 {
            width: 30px; /* Set your desired width here */
        }

        .custom-width-column4 {
            width: 40px; /* Set your desired width here */
        }

        #datatable_7 tbody td {
            font-size: 16px; /*Adjust the font size as needed*/
            text-align: center;
            padding: 4px;
        }
        .centered-content2 {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100%; /* Make the div take the full height of the table cell */
        }
    </style>
@endpush

@section('content')
    <!-- Main Content -->
    <div class="hk-pg-wrapper">
        <div class="container-xxl">
            <!-- Page Header -->
            <div class="hk-pg-header pg-header-wth-tab pt-7">
                <div class="d-flex">
                    <div class="d-flex flex-wrap justify-content-between flex-1">
                        <div class="mb-lg-0 mb-2 me-8">
                            <h1 class="pg-title">Data Barang </h1>
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
                                            <table id="datatable_7" class="table table-striped w-100">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Berat</th>
                                                        <th>Supplier</th>
                                                        <th>Model</th>
                                                        <th>Pabrik</th> 
                                                        <th>Kadar</th> 
                                                        <th>Lokasi</th> 
                                                        {{-- <th>Kondisi</th>  --}}
                                                        {{-- <th>Status</th>  --}}
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p id="load-berat" style="font-size: 18px"></p>
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
                            <div class="mb-2">
                                <hr> 
                                <form  enctype="multipart/form-data" id="barangForm">
                                    <div class="ticket_wrapper accordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                                    aria-controls="panelsStayOpen-collapseOne">
                                                    Item 1
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="panelsStayOpen-headingOne">
                                                <div class="accordion-body">
                                                    <div class="row gx-3">
                                                        <input type="hidden" id="barang_id_1" name="data[id][]">
                                                        <div class="col-sm-12">  
                                                            <label class="form-label">Kode Barang</label>
                                                            <div class="form-group">
                                                                <input class="form-control" type="text"
                                                                    name="data[kode][]" id="barang_kode_1" data-index="1" data-item="barang_kode" value="0000000000" disabled/>
                                                            </div> 
                                                        </div>
                                                        <div class="col-sm-12">  
                                                            <label class="form-label">Nama Barang</label>
                                                            <div class="form-group">
                                                                <input class="form-control" type="text" placeholder="Masukkan Nama"
                                                                    name="data[nama][]" id="barang_nama_1" />
                                                            </div> 
                                                        </div>
                                                    </div> 
                                                    <div class="row gx-3">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Supplier</label>
                                                                <select class="form-select" name="data[supplier][]" id="supplier_id_1" onchange="remakekodesupplier(this, 1)">
                                                                    <option value="0" selected>--</option>
                                                                    <?php
                                                                    foreach ($suppliers as $supplier) {
                                                                        $nama = $supplier['supplier_nama'];
                                                                        $id = $supplier['supplier_id'];
                                                                        $kode = $supplier['supplier_kode'];
                                                                        echo "<option value='$id' data-attribute='$kode'>$nama</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Pabrik</label>
                                                                <select class="form-select" name="data[pabrik][]" id="pabrik_id_1" onchange="remakekodepabrik(this, 1)">
                                                                    <option value="0" selected>--</option>
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
                                                                <select class="form-select" name="data[kadar][]" id="kadar_id_1" onchange="remakekodekadar(this, 1)">
                                                                    <option value="0" selected>--</option>
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
                                                                <input class="form-control" type="number" step=0.05 value="0.01" min="0"
                                                                    placeholder="Masukkan Berat" name="data[berat][]"
                                                                    id="barang_berat_1" onchange="remakekodeberat(this, 1)"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-3">
                                                        <div class="col-sm-12"> 
                                                            <label class="form-label">Model</label>
                                                                <select class="form-select" name="data[model][]" id="model_id_1"  onchange="remakekodemodel(this, 1)">
                                                                    <option value="0" selected>--</option>
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
                                                                <input type="file" class="dropify-1" name="pictures[]" id="barang_foto_1"/>
                                                            </div>
                                                        </div> 
                                                        <div class="col-sm-10 form-group">
                                                            <textarea class="form-control mnh-100p" rows="4" id="barang_kondisi_1" name="data[kondisi][]"  placeholder="Kondisi"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-3">
                                                        <div class="form-check form-check-sm mb-3">
                                                            <input type="checkbox" class="form-check-input" id="barang_status_1" name="data[status][]" checked>
                                                            <label class="form-check-label text-muted fs-7" for="logged_in">Aktif</label>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                            <!-- <div class="col-md-1">
                                                <button type="button" id="addBtnTicket" class="btn btn-primary"><i
                                                        class="mdi mdi-plus"></i></button>
                                            </div> -->
                                        </div>
                                        <div class="mt-2">
                                            <button type="button" id="addBtnTicket" class="btn btn-primary" hidden>Tambah Item</button>
                                        </div>
                                    </div>
                                    <div class="modal-footer align-items-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="submitBarang">Simpan</button>
                                    </div> 
                                </form>
                            <!-- coba multi -->
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Barcode Barang --}}
            <div class="modal fade" id="barcodebarangModal" tabindex="-1" role="dialog" aria-labelledby="modalSupplier"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="barangdetailHeading"></h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;"></div>
                            <table class="table">
                                <tr>
                                    <th>Berat Barang</th>
                                    <td>
                                        <div class="centered-content" id="beratbarang" name="beratbarang"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Kadar</th>
                                    <td>
                                        <div class="centered-content" id="kadarbarang" name="kadarbarang"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Model</th>
                                    <td>
                                        <div class="centered-content" id="modelbarang" name="modelbarang"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Barcode</th>
                                    <td style="text-align: center;">
                                        <div class="centered-content2" id="barcodebarang" name="barcodebarang"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Kode Barang</th>
                                    <td>
                                        <div class="centered-content" id="kodebarang" name="kodebarang"></div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer text-center">
                            <a href="" id="generatepdf">
                                <button class="btn btn-primary">Cetak Barcode</button>
                            </a>
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
        @include('layouts.footer')
        <!-- / Page Footer -->

    </div>
    <!-- /Main Content -->
@endsection

@push('script-alt')
    <script>

        // LOAD BERAT
        loadBerat();
        function loadBerat(){
            $.ajax({
                type: "GET",
                url: "{{ route('load.berat') }}",
                dataType: "JSON",
                success: function (response) {
                    var berat = `TOTAL BERAT: <strong>` + response + ` gram</strong>`;
                    $("#load-berat").html(berat)
                }
            });
        }

        // max field dinamis input
        var maxField = 5; //Input fields increment limitation

        // Append Ticket Category Input
        var addButtonTicket = $('#addBtnTicket'); //Add button selector
        var wrapperTicket = $('.ticket_wrapper'); //Input field wrapper accordion item
        var x = 1; //Initial field counter is 1
        
        var itemCounter = 1;
        //Once add button is clicked
        $(addButtonTicket).click(function() {
            // var inputElement = document.getElementById("barang_kode_" + itemCounter);

            // if (inputElement) {
            //     incrementKodeBarang(inputElement);
            //     itemCounter++;
            // }

            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter

                // Generate a unique ID for the new item
                var itemID = "barang_kode_" + x;

                var fieldHTMLTicket =
                `<div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-heading`+x+`">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapse`+x+`" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapse`+x+`">
                            Item `+x+`
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse`+x+`" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-heading`+x+`">
                        <div class="accordion-body"> 
                            <div class="row gx-3">
                                <input type="hidden" id="barang_id_`+x+`" name="data[id][]">
                                <div class="col-sm-12">  
                                    <label class="form-label">Kode Barang</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text"
                                            name="data[kode][]" id="barang_kode_`+x+`" data-index="${x}" data-item="barang_kode"  value="0000000000" disabled/>
                                    </div> 
                                </div>
                                <div class="col-sm-12">  
                                    <label class="form-label">Nama Barang</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Masukkan Nama"
                                            name="data[nama][]" id="barang_nama_`+x+`" />
                                        </div> 
                                </div>
                            </div> 
                            <div class="row gx-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Supplier</label>
                                        <select class="form-select" name="data[supplier][]" id="supplier_id_`+x+`" onchange="remakekodesupplier(this, ${x})">
                                            <option value=""  selected="">--</option>
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
                                        <select class="form-select" name="data[pabrik][]" id="pabrik_id_`+x+`" onchange="remakekodepabrik(this, ${x})">
                                            <option value=""  selected="">--</option>
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
                                        <select class="form-select" name="data[kadar][]" id="kadar_id_`+x+`" onchange="remakekodekadar(this, ${x})">
                                            <option value=""  selected="">--</option>
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
                                            placeholder="Masukkan Berat" name="data[berat][]"
                                            id="barang_berat_`+x+`" onchange="remakekodeberat(this, ${x})"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3">
                                <div class="col-sm-12"> 
                                    <label class="form-label">Model</label>
                                        <select class="form-select" name="data[model][]" id="model_id_`+x+`"  onchange="remakekodemodel(this, ${x})">
                                            <option value=""  selected="">--</option>
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
                                        <input type="file" class="dropify-1 " name="pictures[]" id="barang_foto_`+x+`"/>
                                    </div>
                                </div> 
                                <div class="col-sm-10 form-group">
                                    <textarea class="form-control mnh-100p" rows="4" id="barang_kondisi_`+x+`" name="data[kondisi][]"  placeholder="Kondisi"></textarea>
                                </div>
                            </div>
                            <div class="row gx-3">
                                <div class="form-check form-check-sm mb-3">
                                    <input type="checkbox" class="form-check-input" id="barang_status_`+x+`" name="data[status][]" checked>
                                    <label class="form-check-label text-muted fs-7" for="logged_in">Aktif</label>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>`;

                $(wrapperTicket).append(fieldHTMLTicket);

                // // Increment Kode Barang for the new item
                // var newIndex = x;
                // incrementKodeBarangForItem(newIndex);

                if (x == 5) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Maksimal Input 5 Barang',
                    });
                    // hidden that button
                    $('#addBtnTicket').attr('hidden', true);
                }

                var myElement = document.getElementById('barang_foto_' + x); 
                var dropify = new Dropify(myElement, {
                    messages: {
                        default: 'Upload Photo' 
                    }
                });
            }

            
        });

        //Once remove button is clicked
        $(wrapperTicket).on('click', '.minusTicket', function(e) {
            e.preventDefault();
            $(this).parent('').parent('').remove(); //Remove field html
            x--; //Decrement field counter

            if (x == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ticket category at least 1!',
                })
            }
        });

        // function remakekodenourut(selectElement, i) {  
        //         var inputElement = document.getElementById("barang_kode_"+i).value;   
        //         var datas = @json($barangs);
        //         var kodeBarang = inputElement.slice(0,8);
        //         var countKodeSama = 0;
        //         for (var j in datas) {
        //             var potonganKodeBarang = datas[j]['barang_kode'].slice(0,8);
                     
                    
        //             if(kodeBarang == potonganKodeBarang){
        //                 countKodeSama++;
        //             }
        //             //alert(kodeBarang + " a " + potonganKodeBarang+ " a " +countKodeSama);
        //         }
        //         countKodeSama++;
        //         var nourut = countKodeSama.toString().padStart(5,'0');
                
        //         var newKodeBarang = inputElement.slice(0,8)+nourut;
                
        //         document.getElementById("barang_kode_"+i).value = newKodeBarang; 
        // }

        // Function to find the highest last digit of Kode Barang
        function findHighestLastDigit() {
            var kodeBarangInputs = document.querySelectorAll('input[data-item="barang_kode"]');
            var highestLastDigit = -1; // Initialize to -1 to handle the case when no items exist.

            kodeBarangInputs.forEach(function(inputElement) {
                var currentKodeBarang = inputElement.value;
                var lastDigit = parseInt(currentKodeBarang.charAt(currentKodeBarang.length - 1), 10);
                if (lastDigit > highestLastDigit) {
                    highestLastDigit = lastDigit;
                }
            });

            return highestLastDigit;
        }

        // Function to increment the Kode Barang for a specific item
        function incrementKodeBarangForItem(itemIndex) {
            var kodeBarangInput = document.querySelector('input[data-item="barang_kode"][data-index="' + itemIndex + '"]');
            var currentKodeBarang = kodeBarangInput.value;
            var highestLastDigit = findHighestLastDigit();
            var incrementedLastDigit = (highestLastDigit + 1) % 10; // Ensure it stays within single digits
            var newKodeBarang = currentKodeBarang.slice(0, -1) + incrementedLastDigit;
            kodeBarangInput.value = newKodeBarang;
        }

        // function remakekodesupplier() {   
        //     for (var i = 1; i <= x; i++) {
        //         var comboBox = document.getElementById("supplier_id_"+i);
        //         var selectedOption = comboBox.options[comboBox.selectedIndex];
        //         var selectedKode = selectedOption.getAttribute("data-attribute");
        //         if (selectedKode) {
        //             selectedKode = selectedKode.slice(0,2);
        //             var inputElement = document.getElementById("barang_kode_"+i);  
        //             var newKodeBarang = selectedKode+inputElement.value.slice(1,13);
        //             // alert(newKodeBarang);
        //             inputElement.value = newKodeBarang;
        //             remakekodenourut(i);
        //         } 
        //     }
                
        // }

        // function remakekodesupplier(selectElement, i) {
        //     var selectedOption = selectElement.options[selectElement.selectedIndex];
        //     var selectedKode = selectedOption.getAttribute("data-attribute");
        //     if (selectedKode) {
        //         selectedKode = selectedKode.slice(0, 2);
        //         var inputElement = document.getElementById("barang_kode_" + i);
        //         var newKodeBarang = selectedKode + inputElement.value.slice(1, 13);
        //         inputElement.value = newKodeBarang;
        //     }
        // }

        function remakekodesupplier(selectElement, i) {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var selectedKode = selectedOption.getAttribute("data-attribute");
            var inputElement = document.getElementById("barang_kode_" + i);

            if (selectedKode) {
                if (selectedKode.length === 1) {
                    // If "Kode Supplier" has one digit, set "Kode Barang" to "0X" where X is the single digit
                    inputElement.value = "0" + selectedKode + inputElement.value.substring(2);
                } else if (selectedKode.length >= 2) {
                    // If "Kode Supplier" has two or more digits, replace the first two characters of "Kode Barang" with "Kode Supplier"
                    inputElement.value = selectedKode + inputElement.value.substring(2);
                }
            }
        }

        // function remakekodemodel(selectElement, i) { 
        //     for (var i = 1; i <= x; i++) {
        //         var comboBox = document.getElementById("model_id_"+i);
        //         var selectedOption = comboBox.options[comboBox.selectedIndex];
        //         var selectedKode = selectedOption.getAttribute("data-attribute");

        //         if (selectedKode) {
        //             var inputElement = document.getElementById("barang_kode_"+i); 
        //             var newKodeBarang = inputElement.value.slice(0,1)+selectedKode+inputElement.value.slice(3,13);
                    
        //             inputElement.value = newKodeBarang;
        //             remakekodenourut(i);
        //         }
                
        //     }
                
        // }

        function remakekodemodel(selectElement, i) {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var selectedKode = selectedOption.getAttribute("data-attribute");
            var inputElement = document.getElementById("barang_kode_" + i);
            if (selectedKode) {
                if (selectedKode.length === 1) {
                    // Replace the fourth character of "Kode Barang" with the single digit from "Kode Model"
                    inputElement.value = inputElement.value.substring(0, 2) + "0" + selectedKode + inputElement.value.substring(4);
                } else {
                    if (inputElement.value.length >= 4) {
                        // Replace the third and fourth characters of "Kode Barang" with the first two characters of "Kode Model"
                        inputElement.value = inputElement.value.substring(0, 2) + selectedKode + inputElement.value.substring(4);
                    } else if (inputElement.value.length >= 2) {
                        // If "Kode Barang" has at least two characters, append the "Kode Model" to it
                        inputElement.value = inputElement.value.substring(0, 2) + selectedKode + inputElement.value;
                    } else {
                        // If "Kode Barang" has less than two characters, simply replace it with "Kode Model"
                        inputElement.value = selectedKode;
                    }
                }
            }
        }

        // function remakekodepabrik(selectElement, i) { 
        //     for (var i = 1; i <= x; i++) {
        //         var comboBox = document.getElementById("pabrik_id_"+i);
        //         var selectedOption = comboBox.options[comboBox.selectedIndex];
        //         var selectedKode = selectedOption.getAttribute("data-attribute");

        //         if (selectedKode) {
        //             var inputElement = document.getElementById("barang_kode_"+i); 
        //             var newKodeBarang = inputElement.value.slice(0,3)+selectedKode+inputElement.value.slice(5,13);
                    
        //             inputElement.value = newKodeBarang;
        //             remakekodenourut(i);
        //         }
                
        //     }      
        // }

        function remakekodepabrik(selectElement, i) {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var selectedKode = selectedOption.getAttribute("data-attribute");
            var inputElement = document.getElementById("barang_kode_" + i);
            if (selectedKode) {
                if (selectedKode.length === 1) {
                    // Replace the fourth character of "Kode Barang" with the single digit from "Kode Pabrik"
                    inputElement.value = inputElement.value.substring(0, 4) + "0" + selectedKode + inputElement.value.substring(6);
                } else {
                    if (inputElement.value.length >= 6) {
                        // Replace the third and fourth characters of "Kode Barang" with the first two characters of "Kode Pabrik"
                        inputElement.value = inputElement.value.substring(0, 4) + selectedKode + inputElement.value.substring(6);
                    } else if (inputElement.value.length >= 4) {
                        // If "Kode Barang" has at least two characters, append the "Kode Pabrik" to it
                        inputElement.value = inputElement.value.substring(0, 4) + selectedKode + inputElement.value;
                    } else {
                        // If "Kode Barang" has less than two characters, simply replace it with "Kode Pabrik"
                        inputElement.value = selectedKode;
                    }
                }
            }
        }
        
        // function remakekodekadar(selectElement, i) { 
        //     for (var i = 1; i <= x; i++) {
        //         var comboBox = document.getElementById("kadar_id_"+i);
        //         var selectedOption = comboBox.options[comboBox.selectedIndex];
        //         var selectedKode = selectedOption.getAttribute("data-attribute");
        //         if (selectedKode) {
        //             //kadar kodenya cuma dipake 1 digit
        //             var potonganSelectedKode = selectedKode.slice(0,2);
        //             var inputElement = document.getElementById("barang_kode_"+i); 
        //             var newKodeBarang = inputElement.value.slice(0,5)+potonganSelectedKode+inputElement.value.slice(6,13);
                    
        //             inputElement.value = newKodeBarang;
        //             remakekodenourut(i);
        //         }
                
        //     }      
        // }

        function remakekodekadar(selectElement, i) {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var selectedKode = selectedOption.getAttribute("data-attribute");
            var inputElement = document.getElementById("barang_kode_" + i);
            if (selectedKode) {
                if (selectedKode.length === 1) {
                    // Replace the fourth character of "Kode Barang" with the single digit from "Kode Kadar"
                    inputElement.value = inputElement.value.substring(0, 6) + "0" +selectedKode + inputElement.value.substring(8);
                } else {
                    if (inputElement.value.length >= 8) {
                        // Replace the third and fourth characters of "Kode Barang" with the first two characters of "Kode Kadar"
                        inputElement.value = inputElement.value.substring(0, 6) + selectedKode + inputElement.value.substring(8);
                    } else if (inputElement.value.length >= 6) {
                        // If "Kode Barang" has at least two characters, append the "Kode Kadar" to it
                        inputElement.value = inputElement.value.substring(0, 6) + selectedKode + inputElement.value;
                    } else {
                        // If "Kode Barang" has less than two characters, simply replace it with "Kode Kadar"
                        inputElement.value = selectedKode;
                    }
                }
            }
        }

        // function remakekodeberat(selectElement, i) { 
        //     for (var i = 1; i <= x; i++) {
        //         var beratTemp = document.getElementById("barang_berat_"+i);
        //         beratTemp = "0" + beratTemp.value.slice(0,1);
        //         var inputElement = document.getElementById("barang_kode_"+i); 
        //         console.log(beratTemp)
        //         var newKodeBarang = inputElement.value.slice(0,8)+beratTemp+inputElement.value.slice(10,14);
                
        //         inputElement.value = newKodeBarang;
        //         remakekodenourut(i);
        //     }      
        // }

        // function remakekodeberat(selectElement, i) {
        //     var beratTemp = parseFloat(selectElement.value);  // Parse the berat as a number
        //     console.log(beratTemp)
        //     if (!isNaN(beratTemp)) {
        //         beratTemp = "0" + Math.floor(beratTemp).toString();  // Convert to a string with leading zero
        //         console.log('beratTemp2', beratTemp)
        //         var inputElement = document.getElementById("barang_kode_" + i);
        //         console.log(inputElement)
        //         var newKodeBarang = inputElement.value.substring(0, 8) + beratTemp + inputElement.value.substring(10, 14);
        //         console.log(newKodeBarang)
        //         inputElement.value = newKodeBarang;
        //         remakekodenourut(i);
        //     }
        // }

        // function remakekodeberat(selectElement, i) { 
        //     for (var i = 1; i <= x; i++) {
        //         var beratTemp = document.getElementById("barang_berat_"+i);
        //         beratTemp = "0" + beratTemp.value.slice(0,1);
        //         var inputElement = document.getElementById("barang_kode_"+i); 
        //         var newKodeBarang = inputElement.value.slice(0,8) + beratTemp + inputElement.value.slice(10,13);
                
        //         inputElement.value = newKodeBarang;
        //         remakekodenourut(i);
        //     }
                
        // }

        // function remakekodeberat(selectElement, i) {
        //     var beratTemp = document.getElementById("barang_berat_" + i).value;

        //     // Check if beratTemp is a single-digit number
        //     if (beratTemp.length === 1) {
        //         beratTemp = "0" + beratTemp;
        //     } else if (beratTemp.length > 2) {
        //         // Handle the case where beratTemp is longer than two digits
        //         // You may want to display an error message or handle this differently
        //     }

        //     var inputElement = document.getElementById("barang_kode_" + i);
        //     var kodeBarang = inputElement.value;
            
        //     // Replace the ninth and tenth characters of "Kode Barang" with beratTemp
        //     kodeBarang = kodeBarang.substring(0, 9) + beratTemp + kodeBarang.substring(10);
            
        //     inputElement.value = kodeBarang;
        //     remakekodenourut(i);
        // }

        // function remakekodeberat(selectElement, i) {
        //     for (var i = 1; i <= x; i++) {
        //         var beratTemp = document.getElementById("barang_berat_" + i).value;

        //         // Check if beratTemp is a single-digit number
        //         if (beratTemp.length === 1) {
        //             beratTemp = "0" + beratTemp;
        //         } else if (beratTemp.length > 2) {
        //             // Handle the case where beratTemp is longer than two digits
        //             // You may want to display an error message or handle this differently
        //         }

        //         var inputElement = document.getElementById("barang_kode_" + i);
        //         var newKodeBarang = inputElement.value.slice(0, 8) + beratTemp + inputElement.value.slice(10, 13);

        //         inputElement.value = newKodeBarang;
        //         remakekodenourut(i);
        //     }
        // }

        function remakekodeberat(selectElement, i) {
            var beratTemp = document.getElementById("barang_berat_" + i).value;
            console.log('beratTemp', beratTemp);

            // Remove any commas and convert to a number
            beratTemp = parseFloat(beratTemp.replace(',', '.'));

            console.log('beratTemp2', beratTemp);

            if (!isNaN(beratTemp)) {
                var inputElement = document.getElementById("barang_kode_" + i);
                var kodeBarang = "";
                console.log('inputelement', inputElement);

                if (beratTemp <= 0) {
                    kodeBarang = "00";
                } else if (beratTemp < 10) {
                    // If berat is between 0 and 10, format it as a two-digit string
                    kodeBarang = Math.floor(beratTemp).toString().padStart(2, '0');
                    console.log('kodebarang', kodeBarang);
                } else {
                    // If berat is 10 or more, use the two leading digits
                    kodeBarang = Math.floor(beratTemp).toString().slice(0, 2);
                    console.log('kodebarang2', kodeBarang);
                }

                // Update the ninth and tenth characters of "Kode Barang"
                inputElement.value = inputElement.value.substring(0, 8) + kodeBarang + inputElement.value.substring(10);
                console.log('inputelement value', inputElement.value);
            }
        }

        
        $(document).ready(function() {

             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var datatable = $('#datatable_7').DataTable({
                dom: "<'row'<'col-sm-6'l><'col-sm-3'p><'col-sm-3'f>>" +
                     "<'row'<'col-sm-12'tr>>" +
                     "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                scrollX: true,
                autoWidth: true,
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
                        name: 'barang_nama',
                        className: 'custom-width-column' // Add a class for styling
                    },  
                    {
                        data: 'barang_berat',
                        name: 'barang_berat'
                    },  
                    {
                        data: 'supplier_id',
                        name: 'supplier_id',
                        className: 'custom-width-column2' // Add a class for styling
                    }, 
                    {
                        data: 'model_id',
                        name: 'model_id',
                        className: 'custom-width-column2' // Add a class for styling
                    }, 
                    {
                        data: 'pabrik_id',
                        name: 'pabrik_id',
                        className: 'custom-width-column3' // Add a class for styling
                    },  
                    {
                        data: 'kadar_id',
                        name: 'kadar_id',
                        className: 'custom-width-column3' // Add a class for styling
                    }, 
                    {
                        data: 'barang_lokasi',
                        name: 'barang_lokasi',
                        className: 'custom-width-column4' // Add a class for styling
                    }, 
                    // {
                    //     data: 'barang_kondisi',
                    //     name: 'barang_kondisi'
                    // }, 
                    // {
                    //     data: 'barang_status',
                    //     name: 'barang_status'
                    // }, 
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                pageLength: 100,
                lengthMenu: [10, 20, 50, 100, 1000, 10000, 100000, 1000000],
            });

            // Create Data Barang.
            $('#barang-create').click(function() {
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#barang_id_1').val('');
                $('#barangForm').trigger("reset");
                $('#barangHeading').html("TAMBAH DATA BARANG BARU");
                $('#barangModal').modal('show');
                $('#addBtnTicket').attr('hidden', false);
            });

            $('#submitBarang').on('click', function(e){ 
                for (var i = 1; i <= x; i++) { 
                    var inputElement = document.getElementById("barang_kode_"+i);
                    inputElement.disabled = false;
                }  

                e.preventDefault();

                $(this).html('Sending..');
                 
                 $.ajax({
                    url: "{{ route('barang.store') }}",
                    data: new FormData(this.form),
                    cache: false,
                    processData: false,
                    contentType: false,
                    type: "POST", 
                    dataType: "json",
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

                        } 
                        else{ 
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

                            setInterval(function() {
                                window.location.reload();
                            }, 1000);
                            
                            datatable.draw();
                            loadBerat();

                        }
                    }
                 });

                for (var i = 1; i <= x; i++) { 
                    var inputElement = document.getElementById("barang_kode_"+i);
                    inputElement.disabled = true;
                }  
            });

            // Edit Data Barang
            $('body').on('click', '#barang-edit', function() { 
                // var inputElement = document.getElementById("barang_kode_1");
                // //inputElement.disabled = true;
                // inputElement.disabled = false;
                $('#addBtnTicket').attr('hidden', true);
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
                        $('#barangHeading').html("EDIT DATA BARANG");
                        $('#barangModal').modal('show');
                        $('#barang_kode_1').val(response.barang_kode).attr('disabled', true);
                        $('#barang_id_1').val(response.barang_id);
                        $('#barang_nama_1').val(response.barang_nama);
                        $('#barang_kondisi_1').val(response.barang_kondisi);
                        $('#barang_berat_1').val(response.barang_berat);
                        $('#supplier_id_1').val(response.supplier_id);
                        $('#pabrik_id_1').val(response.pabrik_id);
                        $('#kadar_id_1').val(response.kadar_id);
                        $('#model_id_1').val(response.model_id);
                        $('#barang_status_1').val(response.barang_status); 
                        $('#barang_foto_1').val('');
                    }
                });
                // var inputElement = document.getElementById("barang_kode_1");
                // //inputElement.disabled = true;
                // inputElement.disabled = false;
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
         

                $('.alert').hide();
                $("#detailbarangModal").modal('show')
                barangDetail(barang_id)

            });

            //barang barcode
            $('body').on('click', '#barang-barcode', function() {
                var barang_id = $(this).attr('data-id'); 
                
                $('#barangdetailHeading').html("Barang Id : " + barang_id);

                // Convert the array to a query parameter string
                var queryString = 'data=' + JSON.stringify(barang_id);

                // Create the URL with query parameters
                var url = "{{ route('barang.cetak') }}?" + queryString;

                // Open the PDF in a new tab/window
                var pdfLink = document.getElementById("generatepdf");
                pdfLink.href = url;
                pdfLink.target = "_blank"; // Set the target attribute to "_blank"

                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('barang.barcode') }}",
                    data: {
                        barang_id: barang_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response) 
                        $("#barcodebarangModal").modal('show'); 
        
                        // Insert the barcode HTML into the container element
                        $('#beratbarang').html(response.barang.barang_berat);
                        $('#kadarbarang').html(response.barang.kadar.kadar_nama);
                        $('#modelbarang').html(response.barang.model.model_nama);
                        $('#barcodebarang').html(response.barcode);
                        $('#kodebarang').html(response.barang.barang_kode);
                    }
                }); 

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
