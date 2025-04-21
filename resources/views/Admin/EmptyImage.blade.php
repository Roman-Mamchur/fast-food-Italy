
@include('Admin.Base.Header')
<body id="sherah-dark-light">

		<div class="sherah-body-area">
			<!-- sherah Admin Menu -->
			@include('Admin.Base.Sidebar')
			<!-- End sherah Admin Menu -->

			<!-- Start Header -->
			@include('Admin.Base.Navbar')
			<!-- End Header -->

			<!-- sherah Dashboard -->
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
												<h2 class="sherah-breadcrumb__title">Default Avatar Image</h2>
												<ul class="sherah-breadcrumb__list">
													<li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
													<li class="active">Default Avatar Image</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                        <form class="sherah-wc__form-main" action="{{route('EmptyImage.update',$setting->id)}}" method="POST" enctype= multipart/form-data >
                                        @csrf
                                        @method('PUT')
                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- Product Info -->
                                                    <div class="product-form-box sherah-border mg-top-30">
                                                        <h4 class="form-title m-0">Empty Image Content</h4>
                                                        <div class="row">

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Default Avatar Image</label>
                                                                    <div class="form-group__input">
                                                                        <img class="default_avatar" id="empty-cart-preview-img"  src="{{$setting->empty_cart}}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">New Image</label>
                                                                    <div class="form-group__input">
                                                                        <input name="empty_cart" onchange="previewEmptyCartImage(event)" type="file">
                                                                    </div>
                                                                </div>
                                                            </div>




                                                        </div>
                                                    </div>
                                                    <!-- End Product Info -->
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

<script>
    "use strict"
    function previewErrorPageImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('error-page-preview-img');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    };

    function previewEmptyCartImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('empty-cart-preview-img');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    };
</script>


