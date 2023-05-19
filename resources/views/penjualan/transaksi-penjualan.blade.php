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
                            <p>Managemen Pengelolaan Data Barang Toko Emas</p>
                        </div> 
                    </div>
                </div>
                <ul class="nav nav-line nav-light nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#">
                            <span class="nav-link-text">Overview</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#">
                            <span class="nav-link-text">Analytics</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#">
                            <span class="nav-link-text">Operations</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /Page Header -->

            <!-- Page Body -->
            <div class="hk-pg-body">
            <div class="invoice-body">
								<div data-simplebar class="nicescroll-bar">
									<div class="container">
										<div class="create-invoice-wrap mt-xxl-5 p-md-5 p-3">
											
											<div class="row mt-5">
												<div class="col-sm">
													<form class="form-inline p-3 bg-grey-light-5 rounded">
														<div class="row gx-3 align-items-center">
															<div class="col-xl-auto mb-xl-0 mb-2">
																<label class="form-label mb-xl-0">Filters</label>
															</div>
															<div class="col-xl-auto mb-xl-0 mb-2">
																<select class="form-select">
																	<option selected="">Number format</option>
																	<option value="1">One</option>
																	<option value="2">Two</option>
																	<option value="3">Three</option>
																</select>
															</div>
															<div class="col-xl-auto mb-xl-0 mb-2">
																<select class="form-select">
																	<option selected="">Add/Remove columns</option>
																	<option value="1">One</option>
																	<option value="2">Two</option>
																	<option value="3">Three</option>
																</select>
															</div>
															<div class="col-xl-auto">
																<select class="form-select">
																	<option selected="">US Dollar ($ USD)</option>
																	<option value="1">One</option>
																	<option value="2">Two</option>
																	<option value="3">Three</option>
																</select>
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
																<th>Item</th>
																<th>Quantity</th>
																<th>Price</th>
																<th colspan="2">Discount</th>
																<th>Amount</th>
															</tr>
														</thead>
														<tbody>
															<tr class="table-row-gap"><td></td></tr>
															<tr>
																<td class="w-70 rounded-top-start border-end-0 border-bottom-0"><input type="text" class="form-control" value="Redesiging of agencyclick.com"></td>
																<td class="border-end-0 border-bottom-0"><input type="text" class="form-control qty" value="1"></td>
																<td class="w-15 border-end-0 border-bottom-0"><input type="text" class="form-control price" value="150.00"></td>
																<td class="border-end-0 border-bottom-0"><input type="text" class="form-control discount w-60p" value="2"></td>
																<td class="border-end-0 border-bottom-0">
																	<select class="form-select disc-type w-70p">
																		<option value="1">%</option>
																		<option value="2">₹</option>
																	</select>
																</td>
																<td class="w-20  rounded-end  bg-primary-light-5 close-over position-relative" rowspan="2"><input type="text" class="form-control bg-transparent border-0 p-0 total" value="" readonly> 
																<button type="button" class="close-row btn-close">
																	<span aria-hidden="true">×</span>
																</button></td>
															</tr>
															<tr>
																<td colspan="5" class="rounded-bottom-start border-end-0"><input type="text" class="form-control" value="This is my project description. if the line do not filt like the sentence is to big the area will start getting bigger"></td>
															</tr>
														</tbody>
													</table>
													<a class="d-inline-flex align-items-center add-new-row" href="#">
														<i class="ri-add-box-line me-1"></i> Add new item
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
																		<td colspan="3" class="rounded-top-start border-end-0 border-bottom-0">Subtotal</td>
																		<td class="rounded-top-end border-bottom-0 w-30 bg-primary-light-5"><input type="text" class="form-control bg-transparent border-0 p-0 gross-total" value="" readonly></td>
																	</tr>
																	<tr>
																		<td colspan="3" class="border-end-0 border-bottom-0">Item Discount</td>
																		<td class="border-bottom-0  bg-primary-light-5"><input type="text" class="form-control bg-transparent border-0 p-0 gross-discount" value="" readonly></td>
																	</tr>
																	<tr>
																		<td class="border-end-0 border-bottom-0">Extra Discount</td>
																		<td class="border-end-0 border-bottom-0 w-25"><input type="text" class="form-control extdiscount" value="0"></td>
																		<td class="border-end-0 border-bottom-0 w-25">
																			<select class="form-select extra-disc-type">
																				<option selected value="1">%</option>
																				<option value="2">₹</option>
																			</select>
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
															<label class="form-label">Note to client</label>
															<small class="text-muted">1400</small>
														</div>
														<textarea class="form-control" rows="6" placeholder="Write an internal note"></textarea>
														<button class="btn btn-outline-light mt-2">Add Note</button>
													</div>
												</div>
												<div class="col-xxl-4 offset-xxl-3 text-xxl-end mb-xxl-0 mb-3">
													<div class="btn btn-light btn-link text-primary btn-file bg-transparent p-0 border-0">
														<span class="d-inline-flex align-items-center">
															<i class="ri-add-box-line me-1"></i> Add signature (Optional)
															<input type="file" class="upload">
														</span>
													</div>
													<div>
														<a class="d-inline-flex align-items-center mt-2" data-bs-toggle="collapse" href="#label_collpase">
															<i class="ri-add-box-line me-1"></i> Add Name & Label
														</a>
													</div>
													<div class="collapse show mt-5" id="label_collpase">
														<div class="form-group close-over">
															<input type="text" class="form-control" value="Katherine Zeta Jones">
															<button type="button" class="close-input btn-close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<div class="form-group close-over">
															<input type="text" class="form-control" value="Co-founder Hencework">
															<button type="button" class="close-input btn-close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
													</div>
												</div>
											</div>	
											<div class="separator separator-light"></div>
											<h6 class="mb-4">Terms & Condition</h6>
											<div class="repeater">
												<ol class="ps-3" data-repeater-list="category-group">
													<li class="form-group close-over">
														<input type="text" class="form-control" value="Please pay within 15 days from the date of invoice, overdue interest @ 14% will be charged on delayed payments.">
														<button type="button" class="close-input btn-close">
															<span aria-hidden="true">×</span>
														</button>
													</li>
													<li class="form-group close-over">
														<input type="text" class="form-control" value="Please quote invoice number when remitting funds.">
														<button type="button" class="close-input btn-close">
															<span aria-hidden="true">×</span>
														</button>
													</li>
													<li data-repeater-item style="display:none;" class="form-group close-over">
														<input type="text" class="form-control">
														<button type="button" class="close-input btn-close">
															<span aria-hidden="true">×</span>
														</button>
													</li>
												</ol>
												<a data-repeater-create class="d-inline-flex align-items-center" href="#">
													<i class="ri-add-box-line me-1"></i> Add New Term Row
												</a>
												
											</div>
											<div class="separator separator-light"></div>
											<div class="btn btn-light btn-file mb-4">
												Attach files
												<input type="file" class="upload">
											</div>
											<div class="my-2">
												<a class="d-inline-flex align-items-center" data-bs-toggle="collapse" href="#memo_collpase">
													<i class="ri-add-box-line me-1"></i> Add a personal memo
												</a>
											</div>
											
											<div class="collapse show" id="memo_collpase">
												<div class="row">
													<div class="col-xxl-5">
														<div class="form-group">
															<div class="form-label-group">
															<label class="form-label">Personal Memo</label>
															<small class="text-muted">1400</small>
															</div>
															<textarea class="form-control" rows="6" placeholder="Write an internal note"></textarea>
															<button class="btn btn-outline-light mt-2">Add Note</button>
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
