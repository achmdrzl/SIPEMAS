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
                                                                    name="data[kode][]" id="barang_kode_1"  value="0000000000001" disabled/>
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
                                                                <select class="form-select" name="data[supplier][]" id="supplier_id_1" onchange="remakekodesupplier()">
                                                                    <option value="" selected="">--</option>
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
                                                                <select class="form-select" name="data[pabrik][]" id="pabrik_id_1" onchange="remakekodepabrik()">
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
                                                                <select class="form-select" name="data[kadar][]" id="kadar_id_1" onchange="remakekodekadar()">
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
                                                                    id="barang_berat_1" onchange="remakekodeberat()"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-3">
                                                        <div class="col-sm-12"> 
                                                            <label class="form-label">Model</label>
                                                                <select class="form-select" name="data[model][]" id="model_id_1"  onchange="remakekodemodel()">
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
                                            <button type="button" id="addBtnTicket" class="btn btn-primary">Tambah Item</button>
                                        </div>
                                    </div>
                                    <div class="modal-footer align-items-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" id="submitBarang">Simpan</button>
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
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                style="display: none;" style="color: red">
                            </div> 
                              
                            <div style=" 
                            position: absolute; 
                            top: 30%;
                            left: 50%;
                            transform: translate(-50%, -50%); "
                            id="barcodebarang" name="barcodebarang"></div> 
                            <br><br><br>
                            <a href="" id="generatepdf">
                                <button class="btn btn-primary">Generate PDF</button>
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
        ////////////////coba multi


        // max field dinamis input
        var maxField = 10; //Input fields increment limitation

        // Append Ticket Category Input
        var addButtonTicket = $('#addBtnTicket'); //Add button selector
        var wrapperTicket = $('.ticket_wrapper'); //Input field wrapper accordion item
        var x = 1; //Initial field counter is 1
        

        //Once add button is clicked
        $(addButtonTicket).click(function() {

            //Ambil value seluruh data sebelumnya
            var kodeBarang = document.getElementById('barang_kode_'+x).value;

            var namaBarang = document.getElementById('barang_nama_'+x).value;

            var selectElement = document.getElementById('supplier_id_'+x);
            var selectedIndex = selectElement.selectedIndex;
            var supplierBarang = selectElement.options[selectedIndex].value;  
 
            var selectElement = document.getElementById('pabrik_id_'+x);
            var selectedIndex = selectElement.selectedIndex;
            var pabrikBarang = selectElement.options[selectedIndex].value; 
 
            var selectElement = document.getElementById('kadar_id_'+x);
            var selectedIndex = selectElement.selectedIndex;
            var kadarBarang = selectElement.options[selectedIndex].value; 

            var beratBarang = document.getElementById('barang_berat_'+x).value;
 
            var selectElement = document.getElementById('model_id_'+x);
            var selectedIndex = selectElement.selectedIndex;
            var modelBarang = selectElement.options[selectedIndex].value; 

            var kondisiBarang = document.getElementById('barang_kondisi_'+x).value;

            //cari supplier yang sama dengan input sebelumnya
            var dynamicJsArray = <?php echo json_encode($suppliers); ?>;
            var optionSupplier =``;
            for (var i = 0; i < dynamicJsArray.length; i++) { 
                var nama = dynamicJsArray[i]['supplier_nama'] ; 
                var id = dynamicJsArray[i]['supplier_id'] ;  
                var kode = dynamicJsArray[i]['supplier_kode'] ;  
                console.log(id);  
                if(id == supplierBarang){
                    optionSupplier +=  `<option value='`+id+`' data-attribute='`+kode+`' selected>`+nama+` </option> `
                }
                else{
                    optionSupplier +=  `<option value='`+id+`' data-attribute='`+kode+`'>`+nama+` </option> `
                }
            }
            //cari pabrik yang sama dengan input sebelumnya
            var dynamicJsArray = <?php echo json_encode($pabriks); ?>;
            var optionPabrik =``;
            for (var i = 0; i < dynamicJsArray.length; i++) { 
                var nama = dynamicJsArray[i]['pabrik_nama'] ; 
                var id = dynamicJsArray[i]['pabrik_id'] ;  
                var kode = dynamicJsArray[i]['pabrik_kode'] ;  
                console.log(id);  
                if(id == pabrikBarang){
                    optionPabrik +=  `<option value='`+id+`' data-attribute='`+kode+`' selected>`+nama+` </option> `
                }
                else{
                    optionPabrik +=  `<option value='`+id+`' data-attribute='`+kode+`'>`+nama+` </option> `
                }
            }
            //cari kadar yang sama dengan input sebelumnya
            var dynamicJsArray = <?php echo json_encode($kadars); ?>;
            var optionKadar =``;
            for (var i = 0; i < dynamicJsArray.length; i++) { 
                var nama = dynamicJsArray[i]['kadar_nama'] ; 
                var id = dynamicJsArray[i]['kadar_id'] ;  
                var kode = dynamicJsArray[i]['kadar_kode'] ;  
                console.log(id);  
                if(id == kadarBarang){
                    optionKadar +=  `<option value='`+id+`' data-attribute='`+kode+`' selected>`+nama+` </option> `
                }
                else{
                    optionKadar +=  `<option value='`+id+`' data-attribute='`+kode+`'>`+nama+` </option> `
                }
            }
            //cari supplier yang sama dengan input sebelumnya
            var dynamicJsArray = <?php echo json_encode($models); ?>;
            var optionModel =``;
            for (var i = 0; i < dynamicJsArray.length; i++) { 
                var nama = dynamicJsArray[i]['model_nama'] ; 
                var id = dynamicJsArray[i]['model_id'] ;  
                var kode = dynamicJsArray[i]['model_kode'] ;  
                console.log(id);  
                if(id == modelBarang){
                    optionModel +=  `<option value='`+id+`' data-attribute='`+kode+`' selected>`+nama+` </option> `
                }
                else{
                    optionModel +=  `<option value='`+id+`' data-attribute='`+kode+`'>`+nama+` </option> `
                }
            } 
            
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                var fieldHTMLTicket =
                `<div class="accordion-item" id="container`+x+`">
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
                                            name="data[kode][]" id="barang_kode_`+x+`"  value="`+kodeBarang+`" disabled/>
                                        </div> 
                                </div>
                                <div class="col-sm-12">  
                                    <label class="form-label">Nama Barang</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Masukkan Nama"
                                            name="data[nama][]" id="barang_nama_`+x+`" value="`+namaBarang+`"/>
                                        </div> 
                                </div>
                            </div> 
                            <div class="row gx-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Supplier</label>
                                        <select class="form-select" name="data[supplier][]" id="supplier_id_`+x+`" onchange="remakekodesupplier()">
                                            <option value="" ="">--</option>
                                            `+optionSupplier+`
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Pabrik</label>
                                        <select class="form-select" name="data[pabrik][]" id="pabrik_id_`+x+`" onchange="remakekodepabrik()">
                                            <option value=""  ="">--</option>
                                            `+optionPabrik+`
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            <div class="row gx-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Kadar</label>
                                        <select class="form-select" name="data[kadar][]" id="kadar_id_`+x+`" onchange="remakekodekadar()">
                                            <option value=""   ="">--</option>
                                            `+optionKadar+`
                                    </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Berat</label>
                                        <input class="form-control" type="number" step=0.01 value="`+beratBarang+`" min="0"
                                            placeholder="Masukkan Berat" name="data[berat][]"
                                            id="barang_berat_`+x+`" onchange="remakekodeberat()"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3">
                                <div class="col-sm-12"> 
                                    <label class="form-label">Model</label>
                                        <select class="form-select" name="data[model][]" id="model_id_`+x+`"  onchange="remakekodemodel()">
                                            <option value=""   ="">--</option>
                                            `+optionModel+`
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
                                    <textarea class="form-control mnh-100p" rows="4" id="barang_kondisi_`+x+`" name="data[kondisi][]"  placeholder="Kondisi"  >`+kondisiBarang+`</textarea>
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
                if (x == 10) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Maksimal Multi Input Adalah 10 Barang',
                    })
                }
                var myElement = document.getElementById('barang_foto_'+x); 
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

 

         function remakekodenourut(i) {  
                var inputElement = document.getElementById("barang_kode_"+i).value;   
                var datas = @json($barangs);
                var kodeBarang = inputElement.slice(0,8);
                var countKodeSama = 0;
                for (var j in datas) {
                    var potonganKodeBarang = datas[j]['barang_kode'].slice(0,8);
                     
                    
                    if(kodeBarang == potonganKodeBarang){
                        countKodeSama++;
                    }
                    //alert(kodeBarang + " a " + potonganKodeBarang+ " a " +countKodeSama);
                }
                countKodeSama++;
                var nourut = countKodeSama.toString().padStart(5,'0');
                
                var newKodeBarang = inputElement.slice(0,8)+nourut;
                
                document.getElementById("barang_kode_"+i).value = newKodeBarang; 
        }

        function remakekodesupplier() {   
            for (var i = 1; i <= x; i++) {
                var comboBox = document.getElementById("supplier_id_"+i);
                var selectedOption = comboBox.options[comboBox.selectedIndex];
                var selectedKode = selectedOption.getAttribute("data-attribute");
                if (selectedKode) {
                    selectedKode = selectedKode.slice(1,2);
                    var inputElement = document.getElementById("barang_kode_"+i);  
                    var newKodeBarang = selectedKode+inputElement.value.slice(1,13);
                    //alert(newKodeBarang);
                    inputElement.value = newKodeBarang;
                    remakekodenourut(i);
                } 
            }
                
        }

        function remakekodemodel() { 
            for (var i = 1; i <= x; i++) {
                var comboBox = document.getElementById("model_id_"+i);
                var selectedOption = comboBox.options[comboBox.selectedIndex];
                var selectedKode = selectedOption.getAttribute("data-attribute");

                if (selectedKode) {
                    var inputElement = document.getElementById("barang_kode_"+i); 
                    var newKodeBarang = inputElement.value.slice(0,1)+selectedKode+inputElement.value.slice(3,13);
                    
                    inputElement.value = newKodeBarang;
                    remakekodenourut(i);
                }
                
            }
                
        }
        
        function remakekodepabrik() { 
            for (var i = 1; i <= x; i++) {
                var comboBox = document.getElementById("pabrik_id_"+i);
                var selectedOption = comboBox.options[comboBox.selectedIndex];
                var selectedKode = selectedOption.getAttribute("data-attribute");

                if (selectedKode) {
                    var inputElement = document.getElementById("barang_kode_"+i); 
                    var newKodeBarang = inputElement.value.slice(0,3)+selectedKode+inputElement.value.slice(5,13);
                    
                    inputElement.value = newKodeBarang;
                    remakekodenourut(i);
                }
                
            }
                
        }
        
        function remakekodekadar() { 
            for (var i = 1; i <= x; i++) {
                var comboBox = document.getElementById("kadar_id_"+i);
                var selectedOption = comboBox.options[comboBox.selectedIndex];
                var selectedKode = selectedOption.getAttribute("data-attribute");
                if (selectedKode) {
                    //kadar kodenya cuma dipake 1 digit
                    var potonganSelectedKode = selectedKode.slice(1,2);
                    var inputElement = document.getElementById("barang_kode_"+i); 
                    var newKodeBarang = inputElement.value.slice(0,5)+potonganSelectedKode+inputElement.value.slice(6,13);
                    
                    inputElement.value = newKodeBarang;
                    remakekodenourut(i);
                }
                
            }
                
        }

        function remakekodeberat() { 
            for (var i = 1; i <= x; i++) {
                var beratTemp = document.getElementById("barang_berat_"+i);
                beratTemp = "0" + beratTemp.value.slice(0,1);
                var inputElement = document.getElementById("barang_kode_"+i); 
                var newKodeBarang = inputElement.value.slice(0,6)+beratTemp+inputElement.value.slice(8,13);
                
                inputElement.value = newKodeBarang;
                remakekodenourut(i);
            }
                
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
                //kasih kembali button yang dikasih hilang setelah edit
                var buttonTambah = document.getElementById("addBtnTicket");
                buttonTambah.style.visibility = 'visible';

                //kasih kosong id biar tidak masuk di controller edit
                var tempx = x;
                while (tempx >=1) { 
                    $('#barang_id_'+tempx).val('');
                    tempx--;
                }
                $('.alert').hide();
                $('#saveBtn').val("create-barang");
                $('#barangForm').trigger("reset");
                $('#barangHeading').html("TAMBAH DATA BARANG BARU");
                $('#barangModal').modal('show');
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

                            datatable.draw();
                        }
                    }
                 });

                for (var i = 1; i <= x; i++) { 
                    var inputElement = document.getElementById("barang_kode_"+i);
                    inputElement.disabled = true;
                }  
            });


            // Edit Data Barang
            $('body').on('click', '#user-edit', function() { 
                var inputElement = document.getElementById("barang_kode_1");
                //inputElement.disabled = true;
                inputElement.disabled = false;


                //hapus semua item tambahan
                var buttonTambah = document.getElementById("addBtnTicket");
                buttonTambah.style.visibility = 'hidden';

                while (x > 1) {
                    var hapus = document.getElementById("container"+x);

                    if (hapus) { 
                        var parentElement = hapus.parentNode;
 
                        parentElement.removeChild(hapus);
                        x--;
                    }
                }

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
                        $('#barang_kode_1').val(response.barang_kode);
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
                var inputElement = document.getElementById("barang_kode_1");
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
                 

                $('.alert').hide();
                $("#detailbarangModal").modal('show')
                barangDetail(barang_id)

            });

            //generate PDF
            // $('body').on('click', '#generatepdf', function() {
            //     var barang_id = $(this).attr('data-id');
            //     //alert("masuk di js");
            //     $('.alert').hide();
            //     $.ajax({
            //         type: "get",
            //         url: "/generatepdf/"+barang_id,  
            //         success: function(response) {
  
            //             console.log(response);


            //             // $("#barcodebarangModal").modal('show'); 
        
            //             // // Insert the barcode HTML into the container element
            //             // //document.getElementById("barcodeContainer").innerHTML = barcodeHTML;
            //             // $('#barcodebarang').html(response); 
 
                        
            //         }
            //     }); 

            // });

            //barang barcode
            $('body').on('click', '#barang-barcode', function() {
                var barang_id = $(this).attr('data-id'); 
                
                $('#barangdetailHeading').html("Barang Id: "+barang_id);
                document.getElementById("generatepdf").href="/generatepdf/"+barang_id; 

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
                        //document.getElementById("barcodeContainer").innerHTML = barcodeHTML;
                        $('#barcodebarang').html(response); 

                        
                        
                    }
                }); 
                //barangDetail(barang_id)

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
