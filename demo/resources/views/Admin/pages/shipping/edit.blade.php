@include('Admin.Base.Header')
<body id="sherah-dark-light">

		<div class="sherah-body-area">
			@include('Admin.Base.Sidebar')
			@include('Admin.Base.Navbar')
			<section class="sherah-adashboard sherah-show">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="sherah-body">
								<!-- Dashboard Inner -->
								<div class="sherah-dsinner">
									<div class="row">
										<div class="col-12">
											<div class="sherah-breadcrumb mg-top-30">
												<h2 class="sherah-breadcrumb__title">Edit Shipping Rule</h2>
												<ul class="sherah-breadcrumb__list">
													<li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
													<li class="active"><a>Edit Shipping Rule</a></li>
												</ul>
											</div>
										</div>
									</div>


                                    <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
									<div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                        <form class="sherah-wc__form-main" action="{{route('shipping.update',$shipping->id)}}" method="POST" enctype= multipart/form-data >
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-12">
                                                <div class="form-group">
                                                    <label class="sherah-wc__form-label">City / Delivery Area *</label>
                                                    <select class="form-group__input" aria-label="Default select example" name="city_id">
                                                        <option @required(true)>Select Area</option>
                                                        @foreach($cities as $city)
                                                            <option value ="{{$city->id}}" @if($shipping->city_id == $city->id) selected @endif>{{$city->name}} - {{ $city->state->name }}, {{ $city->country->name }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="sherah-wc__form-label">Shipping Rule *</label>
                                                    <div class="form-group__input">
                                                        <input class="sherah-wc__form-input" value="{{$shipping->shipping_rule}}" placeholder="Type here" type="text" id="shipping_rule" name="shipping_rule">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="sherah-wc__form-label">Condition From *</label>
                                                    <div class="form-group__input">
                                                        <input class="sherah-wc__form-input" value="{{$shipping->condition_from}}" placeholder="Type here" type="number" id="condition_from" name="condition_from">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="sherah-wc__form-label">Condition To *</label>
                                                    <div class="form-group__input">
                                                        <input class="sherah-wc__form-input" value="{{$shipping->condition_to}}" placeholder="Type here" type="number" id="condition_to" name="condition_to">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="sherah-wc__form-label">Shipping Fee *</label>
                                                    <div class="form-group__input">
                                                        <input class="sherah-wc__form-input" placeholder="Type here" value="{{$shipping->shipping_fee}}" type="number" name="shipping_fee" id="shipping_fee">
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                            <div class=" mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                                <button type="submit" class="sherah-btn sherah-btn__primary">Update</button>
                                            </div>
                                        </form>
									</div>
								</div>
								<!-- End Dashboard Inner -->
							</div>
						</div>


					</div>
				</div>
			</section>
			<!-- End sherah Dashboard -->

		</div>
@include('Admin.Base.Footer')



