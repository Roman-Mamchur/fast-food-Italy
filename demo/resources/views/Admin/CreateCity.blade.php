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
												<h2 class="sherah-breadcrumb__title">Create City</h2>
												<ul class="sherah-breadcrumb__list">
													<li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                    <form class="sherah-wc__form-main" action="{{route('cities.store')}}" method="POST" enctype= "multipart/form-data" >
                                                @csrf
                                            <div class="variant">
                                                    <div class="row">
                                                        <div class="col-12">            <!-- Product Info -->
                                                            <div class="product-form-box">
                                                            <h4 class="form-title m-0" id="Vinfo">City Information</h4>
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-12">
                                                                        <div class="form-group">
                                                                            <label class="sherah-wc__form-label">Country *</label>
                                                                            <select class="form-group__input select2" aria-label="Default select example" name="country_id" id="country_id">
                                                                                <option value=" ">Select Country</option>
                                                                                @foreach($countries as $country)
                                                                                <option value ="{{$country['id']}}">{{$country->translate_country?->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-12 col-md-12 col-12">
                                                                        <div class="form-group">
                                                                            <label class="sherah-wc__form-label">State *</label>
                                                                            <select class="form-group__input select2" aria-label="Default select example" name="state_id" id="state">
                                                                                <option value=" ">Select State</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12" id="variant_name">
                                                                        <div class="form-group">
                                                                            <label class="sherah-wc__form-label">Name *</label>
                                                                            <div class="form-group__input">
                                                                                <input class="sherah-wc__form-input" name="name" type="text" placeholder="Type here" id="name">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12" id="item_name">
                                                                        <div class="form-group">
                                                                            <label class="sherah-wc__form-label">Slug *</label>
                                                                            <div class="form-group__input">
                                                                                <input class="sherah-wc__form-input" placeholder="Type here" type="text" name="slug" id="slug">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12" id="is_dafult">
                                                                        <div class="form-group">
                                                                        <label class="sherah-wc__form-label">Status *</label>
                                                                            <select class="form-group__input" aria-label="Default select example"  name="status">
                                                                                <option value ="active">Active</option>
                                                                                <option value="inactive">Inactive</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12" id="CreateItemButton">
                                                                        <div class="form-group">
                                                                        <button type="submit" class="sherah-btn sherah-btn__primary">Create</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Product Info -->
                                                    </div>
                                            </div>
                                        </div>
                                    </form>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</section>

		</div>
@include('Admin.Base.Footer')

<script>
    "use strict"
       $('#country_id').change(function() {
        var country_id = $(this).val();
        $('#state').empty();
        if(country_id) {
            $.ajax({
                url: "{{ route('cities.show', ':id') }}".replace(':id',country_id),
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#state').append('<option value="">Select State</option>');
                    $.each(data.state, function(key, value) {
                        $('#state').append('<option value="'+value.id+'">'+value.translate_state.name+'</option>');
                    });
                }
            });
        }
    });

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
</script>
