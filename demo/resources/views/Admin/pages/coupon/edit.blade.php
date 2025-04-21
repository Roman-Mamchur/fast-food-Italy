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
												<h2 class="sherah-breadcrumb__title">Edit Coupon</h2>
												<ul class="sherah-breadcrumb__list">
													<li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
													<li class="active"><a>Edit Coupon</a></li>
												</ul>
											</div>
										</div>
									</div>


                                    <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
									<div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                        <form class="sherah-wc__form-main" action="{{route('coupon.update',$coupon->id)}}" method="POST" enctype= multipart/form-data >
                                        @csrf
                                        @method('PUT')
                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    <!-- Product Info -->
                                                    <div class="product-form-box sherah-border mg-top-30">
                                                        <h4 class="form-title m-0">Basic Information</h4>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Name *</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" placeholder="Type here" value="{{$coupon->name}}" type="text" id="name" name="name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Code *</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" placeholder="Type here" value="{{$coupon->code}}" type="text" name="code" id="code">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Number of times *</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" placeholder="Type here" value="{{$coupon->max_quantity}}" type="number" name="number_of_time" id="number_of_time">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Expired Date *</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" placeholder="Type here" value="{{$coupon->expired_date}}" type="date" name="expired_date" id="expired_date">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Minimum Purchase Price *</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" placeholder="Type here" value="{{$coupon->min_purchase_price}}" type="number" name="min_purchase_price" id="min_purchase_price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Offer Type *</label>
                                                                    <select class="form-group__input" aria-label="Default select example" name="offer_type">
                                                                        <option value ="%">Percentage(%)</option>
                                                                        <option value="$">Amount($)</option>
                                                                        <option value ="%" {{$coupon->offer_type == '%' ? 'selected' : ''}}>Percentage(%)</option>
                                                                        <option value="$" {{$coupon->offer_type == '$' ? 'selected' : ''}}>Amount($)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Discount *</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" placeholder="Type here" value="{{$coupon->discount}}" type="number" name="discount" id="discount">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Status*</label>
                                                                    <select class="form-group__input" aria-label="Default select example" name="status">
                                                                        <option value ="active" {{$coupon->status == 'active' ? 'selected' : ''}} >Active</option>
                                                                        <option value="inactive" {{$coupon->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
                                                                    </select>
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


@if(Session::has('msg'))
<script>
        toastr.options = {
             "progressBar" : true,
             "closeButton" : true,
        }
        toastr.success("{{ Session::get('msg') }}");

</script>
@elseif(Session::has('Emsg'))
<script>
        toastr.options = {
             "progressBar" : true,
             "closeButton" : true,
        }
        toastr.error("{{ Session::get('msg') }}");

</script>
@endif

<script>
    "use strict"
    $(document).ready(function() {
    $("#name").on("focusout",function(e){
            $("#slug").val(convertToSlug($(this).val()));
    });
});

function convertToSlug(Text){
        return Text
            .toLowerCase()
            .replace(/[^\w ]+/g,'')
            .replace(/ +/g,'-');
}
function previewThumnailImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview-img');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
