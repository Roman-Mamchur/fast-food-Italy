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
												<h2 class="sherah-breadcrumb__title">Update Create</h2>
												<ul class="sherah-breadcrumb__list">
													<li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
													<li class="active"><a href="">Update Create</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                        <form class="sherah-wc__form-main" action="{{route('AdminSlider.update',$sliders->id)}}" method="POST" enctype= multipart/form-data >
                                        @csrf
                                        @method('PUT')
                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- Product Info -->
                                                    <div class="product-form-box sherah-border mg-top-30">
                                                        <h4 class="form-title m-0">Basic Information</h4>
                                                        <div class="row">

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Title</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" type="text" name="title" value="{{$sliders->title}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Description</label>
                                                                    <div class="form-group__input">
                                                                        <textarea cols="30" rows="5"  name="short_description">{{$sliders->short_description}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Existing Image</label>
                                                                    <div class="image-upload-group__single mt-3">
                                                                        <img class="existing_slider" id="preview-img"  src="{{asset($sliders->image)}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Select Image</label>
                                                                    <div class="image-upload-group__single">
                                                                    <input  class="sherah-wc__form-input mt-2" type="file" onchange="PreviewImage(event)" name="image">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Existing Image</label>
                                                                    <div class="image-upload-group__single mt-3">
                                                                        <img class="existing_slider" id="preview-img"  src="{{asset($sliders->image_2)}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Select Image</label>
                                                                    <div class="image-upload-group__single">
                                                                    <input class="sherah-wc__form-input mt-2" type="file" onchange="PreviewImage(event)" name="image_2">
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
    function PreviewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview-img');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    };
</script>


