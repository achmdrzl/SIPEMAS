@extends('layouts.main')

@section('content')
<div class="invoice-body">
    <div data-simplebar class="nicescroll-bar">
        <div class="container">
            <div class="template-invoice-wrap mt-xxl-5 p-md-5 p-3">
                <div class="row mt-5">
                    <div class="col-lg-3 col-md-5 order-md-0 order-1">
                        <img src="dist/img/logo-light.png" alt="logo">
                    </div>
                    <div class="col-lg-4 offset-lg-5 offset-md-3 col-md-4 mb-md-0 mb-2">
                        <h2 class="d-flex justify-content-md-end mb-0">Faktur Penjualan</h2>
                    </div>	
                </div>	
                <div class="row mt-4">
                    <div class="col-md-4 order-md-0 order-1">
                        <div class="address-wrap">

                            <h6>Bintang Kencana</h6>
                            <p>Toko Emas</p>
                            <p>Jl.Raya Blimbing No. 48</p> 
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-3 mb-4 mb-md-0">
                        <div class="d-flex justify-content-md-end">
                            <div class="text-md-end me-3">
                                <div class="mb-1">No. Faktur</div>
                                <div class="mb-1">Tanggal</div>
                                <div class="mb-1">Jam Transaksi</div> 
                            </div>
                            <div class="text-dark">
                                <div class="mb-1">0001</div>
                                <div class="mb-1">24 MEI 2023</div>
                                <div class="mb-1">14:00</div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator separator-light"></div>
                <div class="row">
                    <div class="col-md-3">
                        <h6 class="text-uppercase fs-7 mb-2">Customer</h6>
                        <div class="Billto-wrap">
                            <h6>Rizal</h6>
                            <p>Jl. Wua-wua No. 108</p>
                            <p>082264551894</p> 
                        </div>
                    </div>
                </div>
                <div class="table-wrap mt-6">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-primary">
                                <tr>
                                    <th>Barang</th>
                                    <th class="text-end">Kadar</th>
                                    <th class="text-end">Berat</th>
                                    <th class="text-end">Harga/g</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-70">
                                        <h6>Liontin Huruf S 6 MT AD</h6>
                                        <p>Barcode</p>
                                    </td>
                                    <td class="text-end text-dark">8K</td>
                                    <td class="w-15 text-end text-dark">2.1</td>
                                    <td class="text-end text-dark">706</td>
                                    <td class="w-20 text-end text-dark">2.140.000</td>
                                </tr>
                                
                                <tr>
                                    <td colspan="2" rowspan="4" class="border-0"></td>
                                    <td colspan="2">Subtotal</td>
                                    <td class="text-end text-dark">2.140.000</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Discount</td>
                                    <td class="text-end text-dark">0</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Extra Discount</td>
                                    <td class="text-end text-dark">$0</td>
                                </tr>
                                <tr class="border-0">
                                    <td colspan="2" class="text-dark border">Total</td>
                                    <td class="text-end text-dark border">$1101.0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>	
                </div>
                <div class="row mt-3">
                    <div class="col-lg-5">
                        <h6>Note to client</h6>
                        <p>thank you for choosing Hencework for design services. If you need more assistance in future here is your discount coupon for future jobs. Just call us and mention the coupon code: "10-springhnc"</p>
                    </div>
                    <div class="col-lg-7 text-lg-end mt-lg-0 mt-3">
                        <h5 class="mt-lg-7">Katherine Zeta Jones</h5>
                        <p>Co-founder, Hencework</p>
                    </div>
                </div>
                <div class="separator separator-light mt-7"></div>
                <div class="row">
                    <div class="col-md-12">
                        <h6>Terms & Conditions</h6>
                        <ol class="ps-3">
                            <li>Please pay within 15 days from the date of invoice, overdue interest @ 14% will be charged on delayed payments.</li>
                            <li>Please quote invoice number when remitting funds.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
