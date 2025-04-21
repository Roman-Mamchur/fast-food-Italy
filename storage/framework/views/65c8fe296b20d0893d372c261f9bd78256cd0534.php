<?php echo $__env->make('Admin.Base.Header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body id="sherah-dark-light">

		<div class="sherah-body-area">
			<?php echo $__env->make('Admin.Base.Sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php echo $__env->make('Admin.Base.Navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
												<h2 class="sherah-breadcrumb__title">Edit Product</h2>
												<ul class="sherah-breadcrumb__list">
													<li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
													<li class="active"><a>Edit Product</a></li>
												</ul>
											</div>
										</div>
									</div>


                                    <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                                        <table class="sherah-table__main sherah-table__main-v3">
                                            <tbody class="sherah-table__body">
                                                <tr>
                                                    <td><div class="sherah-table__status__group">
															<a href="<?php echo e(route('product.edit',$products->id)); ?>" class="sherah-table__action sherah-color2 sherah-color3__bg--opactity">
																<svg class="sherah-color3__fill" xmlns="http://www.w3.org/2000/svg" width="18.29" height="18.252" viewBox="0 0 18.29 18.252">
																	<g id="Group_132" data-name="Group 132" transform="translate(-234.958 -37.876)">
																		<path id="Path_481" data-name="Path 481" d="M242.545,95.779h-5.319a2.219,2.219,0,0,1-2.262-2.252c-.009-1.809,0-3.617,0-5.426q0-2.552,0-5.1a2.3,2.3,0,0,1,2.419-2.419q2.909,0,5.818,0c.531,0,.87.274.9.715a.741.741,0,0,1-.693.8c-.3.026-.594.014-.892.014q-2.534,0-5.069,0c-.7,0-.964.266-.964.976q0,5.122,0,10.245c0,.687.266.955.946.955q5.158,0,10.316,0c.665,0,.926-.265.926-.934q0-2.909,0-5.818a.765.765,0,0,1,.791-.853.744.744,0,0,1,.724.808c.007,1.023,0,2.047,0,3.07s.012,2.023-.006,3.034A2.235,2.235,0,0,1,248.5,95.73a1.83,1.83,0,0,1-.458.048Q245.293,95.782,242.545,95.779Z" transform="translate(0 -39.652)" fill="#09ad95"/>
																		<path id="Path_482" data-name="Path 482" d="M332.715,72.644l2.678,2.677c-.05.054-.119.133-.194.207q-2.814,2.815-5.634,5.625a1.113,1.113,0,0,1-.512.284c-.788.177-1.582.331-2.376.48-.5.093-.664-.092-.564-.589.157-.781.306-1.563.473-2.341a.911.911,0,0,1,.209-.437q2.918-2.938,5.853-5.86A.334.334,0,0,1,332.715,72.644Z" transform="translate(-84.622 -32.286)" fill="#09ad95"/>
																		<path id="Path_483" data-name="Path 483" d="M433.709,42.165l-2.716-2.715a15.815,15.815,0,0,1,1.356-1.248,1.886,1.886,0,0,1,2.579,2.662A17.589,17.589,0,0,1,433.709,42.165Z" transform="translate(-182.038)" fill="#09ad95"/>
																	</g>
																</svg>
															</a>
                                                            <p>Default</p>
														</div>
                                                    </td>
                                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<td class="sherah-table__column-8 sherah-table__data-8">
														<div class="sherah-table__status__group">
															<a href="<?php echo e(route('product.item.language.edit',[$products->id,$language->lang_code])); ?>" class="sherah-table__action sherah-color2 sherah-color3__bg--opactity">
																<svg class="sherah-color3__fill" xmlns="http://www.w3.org/2000/svg" width="18.29" height="18.252" viewBox="0 0 18.29 18.252">
																	<g id="Group_132" data-name="Group 132" transform="translate(-234.958 -37.876)">
																		<path id="Path_481" data-name="Path 481" d="M242.545,95.779h-5.319a2.219,2.219,0,0,1-2.262-2.252c-.009-1.809,0-3.617,0-5.426q0-2.552,0-5.1a2.3,2.3,0,0,1,2.419-2.419q2.909,0,5.818,0c.531,0,.87.274.9.715a.741.741,0,0,1-.693.8c-.3.026-.594.014-.892.014q-2.534,0-5.069,0c-.7,0-.964.266-.964.976q0,5.122,0,10.245c0,.687.266.955.946.955q5.158,0,10.316,0c.665,0,.926-.265.926-.934q0-2.909,0-5.818a.765.765,0,0,1,.791-.853.744.744,0,0,1,.724.808c.007,1.023,0,2.047,0,3.07s.012,2.023-.006,3.034A2.235,2.235,0,0,1,248.5,95.73a1.83,1.83,0,0,1-.458.048Q245.293,95.782,242.545,95.779Z" transform="translate(0 -39.652)" fill="#09ad95"/>
																		<path id="Path_482" data-name="Path 482" d="M332.715,72.644l2.678,2.677c-.05.054-.119.133-.194.207q-2.814,2.815-5.634,5.625a1.113,1.113,0,0,1-.512.284c-.788.177-1.582.331-2.376.48-.5.093-.664-.092-.564-.589.157-.781.306-1.563.473-2.341a.911.911,0,0,1,.209-.437q2.918-2.938,5.853-5.86A.334.334,0,0,1,332.715,72.644Z" transform="translate(-84.622 -32.286)" fill="#09ad95"/>
																		<path id="Path_483" data-name="Path 483" d="M433.709,42.165l-2.716-2.715a15.815,15.815,0,0,1,1.356-1.248,1.886,1.886,0,0,1,2.579,2.662A17.589,17.589,0,0,1,433.709,42.165Z" transform="translate(-182.038)" fill="#09ad95"/>
																	</g>
																</svg>
															</a>
                                                            <p><?php echo e($language->name); ?></p>
														</div>
                                                    </td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php if(!empty($translate_product)): ?>
                                        <div class="alert alert-success" role="alert">
                                            Your edditing mood :  <a href="javascript:;" class="alert-link"><strong><?php echo e($selected_language->name); ?></strong></a>
                                        </div>
                                        <?php else: ?>
                                        <div class="alert alert-success" role="alert">
                                            Your edditing mood :  <a href="javascript:;" class="alert-link"><strong>Default</strong></a>
                                        </div>
                                        <?php endif; ?>
									</div>

                                    <?php if(!empty($translate_product)): ?>
                                    <div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                        <form class="sherah-wc__form-main" action="<?php echo e(route('product.item.language.update',$translate_product->id)); ?>" method="POST" enctype= multipart/form-data >
                                        <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- Product Info -->
                                                    <div class="product-form-box sherah-border mg-top-30">
                                                        <h4 class="form-title m-0">Edit Product Information</h4>
                                                        <div class="row">

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Name</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" value="<?php echo e($translate_product->name); ?>" placeholder="Type here" type="text" id="name" name="name" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Long Description</label>
                                                                    <div class="form-group__input">
                                                                        <textarea class="sherah-wc__form-input summernote" id="description" row="5" placeholder="Type here" type="text" name="long_description"><?php echo e($translate_product->long_description); ?></textarea>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Product Size</label>
                                                                    <div class="checkbox-group">
                                                                        <table class="table table-bordered table-hover" id="dynamic_field">

                                                                            <?php $__currentLoopData = json_decode($translate_product->size, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="text" name="size[]" placeholder="Enter Size" class="form-control name_list" value="<?php echo e($size); ?>" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="number" name="price[]" placeholder="Enter Price" class="form-control name_email" value="<?php echo e($price); ?>" step="0.1" />
                                                                                    </td>
                                                                                    <?php if($loop->first): ?>
                                                                                    <td><button type="button" name="add" id="add" class="btn btn-primary">+</button></td>
                                                                                    <?php else: ?>
                                                                                    <td><button type="button" name="remove" id="1" class="btn btn-danger btn_remove">X</button></td>
                                                                                    <?php endif; ?>
                                                                                </tr>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                          </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Specification</label>
                                                                    <div class="checkbox-group">
                                                                        <table class="table table-bordered table-hover" id="dynamic_field2">
                                                                            <?php $__currentLoopData = json_decode($translate_product->specifaction, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <tr>
                                                                                <td>
                                                                                    <input type="text" name="specifaction[]" value="<?php echo e($name); ?>" placeholder="Enter Single Item" class="form-control name_list1" />
                                                                                </td>
                                                                                <?php if($loop->first): ?>
                                                                                <td><button type="button" name="add1" id="add1" class="btn btn-primary">+</button></td>
                                                                                <?php else: ?>
                                                                                <td><button type="button" name="remove1" id="1" class="btn btn-danger btn_remove1">X</button></td>
                                                                                <?php endif; ?>
                                                                                </tr>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                          </table>
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
                                    <?php else: ?>
									<div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                        <form class="sherah-wc__form-main" action="<?php echo e(route('product.item.update',$products->id)); ?>" method="POST" enctype= multipart/form-data >
                                        <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    <!-- Product Info -->
                                                    <div class="product-form-box sherah-border mg-top-30">
                                                        <h4 class="form-title m-0">Basic Information</h4>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Name</label>
                                                                    <div class="form-group__input">
                                                                        <input class="sherah-wc__form-input" value="<?php echo e($products->translate_product->name); ?>" placeholder="Type here" type="text" id="name" name="name" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="sherah-wc__form-label">Slug</label>
                                                                <div class="form-group__input">
                                                                    <input class="sherah-wc__form-input" value="<?php echo e($products->slug); ?>" placeholder="Type here" type="text" name="slug" id="slug" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Category*</label>
                                                                    <select class="form-group__input" aria-label="Default select example" name="category_id">
                                                                        <option <?php if(true): echo 'readonly'; endif; ?>>Select</option>
                                                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option <?php echo e($categorie->id == $products->category_id ? 'selected' : ' '); ?> value ="<?php echo e($categorie->id); ?>"><?php echo e($categorie->translate_category?->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Price *</label>
                                                                    <input class="sherah-wc__form-input" value="<?php echo e($products->price); ?>" required placeholder="Type here" type="number" name="main_price" id="price" step="0.1">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group"> 
                                                                    <label class="sherah-wc__form-label">Position</label>
                                                                    <input class="sherah-wc__form-input" value="<?php echo e($products->position); ?>" placeholder="Type here" type="position" name="position" id="position">
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Long Description</label>
                                                                    <div class="form-group__input">
                                                                        <textarea class="sherah-wc__form-input summernote" id="description" row="8" placeholder="Type here" type="text" name="long_description"><?php echo e($products->translate_product->long_description); ?></textarea>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label" id="special_instructions">Special instructions</label>
                                                                    <div class="form-group__input">
                                                                        <textarea class="sherah-wc__form-input summernote" id="special_instructions" row="5" placeholder="Special Instructions" type="text" name="special instructions"><?php echo e($products->special_instructions); ?></textarea>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Seo Title *</label>
                                                                    <input class="sherah-wc__form-input" value="<?php echo e($products->seo_titel); ?>" placeholder="Type here" type="text" name="seo_titel" id="seo_titel">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Seo Description *</label>
                                                                    <textarea class="sherah-wc__form-input" id="description" row="8" placeholder="type here" type="text" name="seo_description"><?php echo e($products->seo_description); ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Is Populer *</label>
                                                                    <select class="form-group__input" aria-label="Default select example" name="is_populer">
                                                                        <option <?php echo e($products->is_populer == '1' ? 'selected' :''); ?> value ="1">Yes</option>
                                                                        <option <?php echo e($products->is_populer == '0' ? 'selected' :''); ?> value="0">No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Optional Item</label>
                                                                    <div class="checkbox-group">
                                                                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <div class="checkbox-group__single">
                                                                                <input <?php echo e(in_array($item->id, $selectedIds) ? 'checked' : ''); ?> type="checkbox" value="<?php echo e($item->id); ?>" class="btn-check" name="items[]" id="option<?php echo e($item->id); ?>" autocomplete="off">
                                                                                <label class="checkbox-group__single--label" for="option<?php echo e($item->id); ?>"><?php echo e($item->translate_item->name); ?></label>
                                                                            </div>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-lg-12 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Status*</label>
                                                                    <select class="form-group__input" aria-label="Default select example" name="status">
                                                                        <option <?php echo e($products->status == 'active' ? 'selected' :''); ?> value ="active">Active</option>
                                                                        <option <?php echo e($products->status == 'inactive' ? 'selected' :''); ?> value="inactive">Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="product-form-box sherah-border mg-top-30">
                                                                    <div class="form-group">
                                                                        <label class="sherah-wc__form-label">Thumbnail Image *</label>
                                                                        <div class="image-upload-group">
                                                                            <div class="image-upload-group__single">
                                                                                <img class="product_thumb_img" id="preview-img" src="<?php echo e(asset($products->tumb_image)); ?>">
                                                                            </div>
                                                                            <div class="image-upload-group__single image-upload-group__single--upload">
                                                                                <input type="file" class="btn-check" name="tumb_image" id="input-img1" onchange="previewThumbnailImage('input-img1', 'preview-img')" autocomplete="off" />
                                                                                <label class="image-upload-label" for="input-img1">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="91.787" height="84.116" viewBox="0 0 91.787 84.116">
                                                                                        <g id="Group_1021" data-name="Group 1021" transform="translate(891.292 39.276)">
                                                                                          <path id="Path_536" data-name="Path 536" d="M-891.292,158.124q1.434-5.442,2.867-10.884c1.3-4.961,2.586-9.926,3.9-14.884a2.8,2.8,0,0,1,2.664-2.251,2.654,2.654,0,0,1,2.763,1.848,3.929,3.929,0,0,1,.037,2q-3.073,12-6.226,23.984c-.64,2.452.088,3.739,2.533,4.394q29.033,7.775,58.067,15.543a2.893,2.893,0,0,0,3.97-2.327c.626-2.487,1.227-4.98,1.849-7.468a2.9,2.9,0,0,1,3.436-2.368,2.894,2.894,0,0,1,2.124,3.726c-.627,2.609-1.256,5.219-1.944,7.813A8.547,8.547,0,0,1-826,183.469q-29.3-7.827-58.584-15.682a8.566,8.566,0,0,1-6.552-6.853,1.264,1.264,0,0,0-.16-.3Z" transform="translate(0 -138.958)"/>
                                                                                          <path id="Path_537" data-name="Path 537" d="M-767.966,21.9c-9.648,0-19.3-.062-28.943.029a9.215,9.215,0,0,1-8.88-5.491,7.393,7.393,0,0,1-.451-3.232c-.027-14.606-.053-29.212,0-43.818a8.532,8.532,0,0,1,8.907-8.66q29.346-.008,58.693,0a8.581,8.581,0,0,1,8.877,8.872q.017,21.685,0,43.37a8.551,8.551,0,0,1-8.9,8.923C-748.432,21.915-758.2,21.9-767.966,21.9ZM-773.938.457l4.606-5.528q4.674-5.611,9.345-11.224a6.85,6.85,0,0,1,7.183-2.522c1.734.377,2.87,1.622,3.969,2.909q6.341,7.428,12.7,14.838a6.488,6.488,0,0,1,.426.631l.211-.158v-.789q0-14.429,0-28.857c0-2.179-1.125-3.294-3.316-3.295q-29.216,0-58.432,0c-2.141,0-3.277,1.115-3.278,3.25q-.008,18.865,0,37.73a5.429,5.429,0,0,0,.07.624l.239.127a5.744,5.744,0,0,1,.529-.721Q-794.05,1.826-788.4-3.808c3.131-3.127,7.065-3.129,10.21,0C-776.8-2.422-775.412-1.022-773.938.457Zm-25.649,14.9a3.316,3.316,0,0,0,2.611.808q28.949,0,57.9,0c.239,0,.478,0,.717-.005a2.828,2.828,0,0,0,2.864-2.923c.02-1.195-.052-2.393.023-3.584a2.712,2.712,0,0,0-.78-2.072q-8.569-9.946-17.1-19.927c-1.071-1.25-1.417-1.243-2.489.044q-7.71,9.264-15.424,18.523c-1.468,1.762-3.193,1.826-4.833.189q-3.076-3.071-6.147-6.147c-.963-.962-1.146-.963-2.1-.01q-6.688,6.684-13.377,13.367C-798.31,14.2-798.937,14.753-799.587,15.358Z" transform="translate(-69.752)" />
                                                                                          <path id="Path_538" data-name="Path 538" d="M-734.635,39.893a7.657,7.657,0,0,1-7.659-7.6,7.688,7.688,0,0,1,7.7-7.667,7.682,7.682,0,0,1,7.612,7.663A7.653,7.653,0,0,1-734.635,39.893Zm-.029-5.742a1.9,1.9,0,0,0,1.938-1.906,1.934,1.934,0,0,0-1.886-1.884,1.927,1.927,0,0,0-1.936,1.92A1.9,1.9,0,0,0-734.664,34.151Z" transform="translate(-122.238 -52.421)"/>
                                                                                        </g>
                                                                                    </svg>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="product-form-box sherah-border mg-top-30">
                                                                    <div class="form-group">
                                                                        <label class="sherah-wc__form-label">Video Thumbnail Image *</label>
                                                                        <div class="image-upload-group">
                                                                            <div class="image-upload-group__single">
                                                                                <img class="product_thumb_img" id="preview-img1" src="<?php echo e(asset($products->vedio_tumb_image)); ?>">
                                                                            </div>
                                                                            <div class="image-upload-group__single image-upload-group__single--upload">
                                                                                <input type="file" class="btn-check" name="vedio_tumb_image" id="input-img2" onchange="previewThumbnailImage('input-img2', 'preview-img1')" autocomplete="off" />
                                                                                <label class="image-upload-label" for="input-img2">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="91.787" height="84.116" viewBox="0 0 91.787 84.116">
                                                                                        <g id="Group_1021" data-name="Group 1021" transform="translate(891.292 39.276)">
                                                                                          <path id="Path_536" data-name="Path 536" d="M-891.292,158.124q1.434-5.442,2.867-10.884c1.3-4.961,2.586-9.926,3.9-14.884a2.8,2.8,0,0,1,2.664-2.251,2.654,2.654,0,0,1,2.763,1.848,3.929,3.929,0,0,1,.037,2q-3.073,12-6.226,23.984c-.64,2.452.088,3.739,2.533,4.394q29.033,7.775,58.067,15.543a2.893,2.893,0,0,0,3.97-2.327c.626-2.487,1.227-4.98,1.849-7.468a2.9,2.9,0,0,1,3.436-2.368,2.894,2.894,0,0,1,2.124,3.726c-.627,2.609-1.256,5.219-1.944,7.813A8.547,8.547,0,0,1-826,183.469q-29.3-7.827-58.584-15.682a8.566,8.566,0,0,1-6.552-6.853,1.264,1.264,0,0,0-.16-.3Z" transform="translate(0 -138.958)"/>
                                                                                          <path id="Path_537" data-name="Path 537" d="M-767.966,21.9c-9.648,0-19.3-.062-28.943.029a9.215,9.215,0,0,1-8.88-5.491,7.393,7.393,0,0,1-.451-3.232c-.027-14.606-.053-29.212,0-43.818a8.532,8.532,0,0,1,8.907-8.66q29.346-.008,58.693,0a8.581,8.581,0,0,1,8.877,8.872q.017,21.685,0,43.37a8.551,8.551,0,0,1-8.9,8.923C-748.432,21.915-758.2,21.9-767.966,21.9ZM-773.938.457l4.606-5.528q4.674-5.611,9.345-11.224a6.85,6.85,0,0,1,7.183-2.522c1.734.377,2.87,1.622,3.969,2.909q6.341,7.428,12.7,14.838a6.488,6.488,0,0,1,.426.631l.211-.158v-.789q0-14.429,0-28.857c0-2.179-1.125-3.294-3.316-3.295q-29.216,0-58.432,0c-2.141,0-3.277,1.115-3.278,3.25q-.008,18.865,0,37.73a5.429,5.429,0,0,0,.07.624l.239.127a5.744,5.744,0,0,1,.529-.721Q-794.05,1.826-788.4-3.808c3.131-3.127,7.065-3.129,10.21,0C-776.8-2.422-775.412-1.022-773.938.457Zm-25.649,14.9a3.316,3.316,0,0,0,2.611.808q28.949,0,57.9,0c.239,0,.478,0,.717-.005a2.828,2.828,0,0,0,2.864-2.923c.02-1.195-.052-2.393.023-3.584a2.712,2.712,0,0,0-.78-2.072q-8.569-9.946-17.1-19.927c-1.071-1.25-1.417-1.243-2.489.044q-7.71,9.264-15.424,18.523c-1.468,1.762-3.193,1.826-4.833.189q-3.076-3.071-6.147-6.147c-.963-.962-1.146-.963-2.1-.01q-6.688,6.684-13.377,13.367C-798.31,14.2-798.937,14.753-799.587,15.358Z" transform="translate(-69.752)" />
                                                                                          <path id="Path_538" data-name="Path 538" d="M-734.635,39.893a7.657,7.657,0,0,1-7.659-7.6,7.688,7.688,0,0,1,7.7-7.667,7.682,7.682,0,0,1,7.612,7.663A7.653,7.653,0,0,1-734.635,39.893Zm-.029-5.742a1.9,1.9,0,0,0,1.938-1.906,1.934,1.934,0,0,0-1.886-1.884,1.927,1.927,0,0,0-1.936,1.92A1.9,1.9,0,0,0-734.664,34.151Z" transform="translate(-122.238 -52.421)"/>
                                                                                        </g>
                                                                                    </svg>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Product Size</label>
                                                                    <div class="checkbox-group">
                                                                        <table class="table table-bordered table-hover" id="dynamic_field">
                                                                            <?php $__currentLoopData = json_decode($products->translate_product->size, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <tr class='row_table'>
                                                                                <td>
                                                                                    <input type="text" name="size[]" placeholder="Enter Size" class="form-control name_list" value="<?php echo e($size); ?>" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="number" name="price[]" placeholder="Enter Price" class="form-control name_email" value="<?php echo e($price); ?>" />
                                                                                </td>
                                                                                <?php if($loop->first): ?>
                                                                                <td><button type="button" name="add" id="add" class="btn btn-primary">+</button></td>
                                                                                <?php else: ?>
                                                                                <td><button type="button" name="remove" class="btn btn-danger btn_remove">X</button></td>
                                                                                <?php endif; ?>
                                                                            </tr>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="sherah-wc__form-label">Specification</label>
                                                                    <div class="checkbox-group">
                                                                        <table class="table table-bordered table-hover" id="dynamic_field2">
                                                                            <?php $__currentLoopData = json_decode($products->translate_product->specifaction, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <tr class='row_table1'>
                                                                                <td>
                                                                                    <input type="text" name="specifaction[]" value="<?php echo e($name); ?>" placeholder="Enter Single Item" class="form-control name_list1" />
                                                                                </td>
                                                                                <?php if($loop->first): ?>
                                                                                <td><button type="button" name="add1" id="add1" class="btn btn-primary">+</button></td>
                                                                                <?php else: ?>
                                                                                <td><button type="button" name="remove1" class="btn btn-danger btn_remove1">X</button></td>
                                                                                <?php endif; ?>
                                                                                </tr>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                          </table>
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
                                    <?php endif; ?>
								</div>
								<!-- End Dashboard Inner -->
							</div>
						</div>


					</div>
				</div>
			</section>
			<!-- End sherah Dashboard -->

		</div>
<?php echo $__env->make('Admin.Base.Footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php if(Session::has('msg')): ?>
<script>
        toastr.options = {
             "progressBar" : true,
             "closeButton" : true,
        }
        toastr.success("<?php echo e(Session::get('msg')); ?>");

</script>
<?php elseif(Session::has('Emsg')): ?>
<script>
        toastr.options = {
             "progressBar" : true,
             "closeButton" : true,
        }
        toastr.error("<?php echo e(Session::get('msg')); ?>");

</script>
<?php endif; ?>
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
</script>

<script>
    "use strict"
    function previewThumbnailImage(inputId, imageId) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById(imageId);
            output.src = reader.result;
        }
        reader.readAsDataURL(document.getElementById(inputId).files[0]);
    };
</script>

<script>
    $(document).ready(function() {
        var i = 1;
        $("#add").click(function() {
            $('#dynamic_field').append('<tr class="row_table"><td><input type="text" name="size[]" placeholder="Enter Size" class="form-control name_list"/></td><td><input type="text" name="price[]" placeholder="Enter Price" class="form-control name_email"/></td><td><button type="button" name="remove" class="btn btn-danger btn_remove">X</button></td></tr>');
            i++;
        });

        $(document).on('click', '.btn_remove', function() {
            $(this).closest('.row_table').remove();
        });
    });
</script>
<script>
    "use strict"
    $(document).ready(function(){
      var i = 1;
      $("#add1").click(function(){
          $('#dynamic_field2').append('<tr  class="row_table1"> <td><input type="text" name="specifaction[]" placeholder="Enter Single Item" class="form-control name_list1" /></td><td><button type="button" name="remove1" class="btn btn-danger btn_remove1">X</button></td></tr>');
        });

      $(document).on('click', '.btn_remove1', function(){
            $(this).closest('.row_table1').remove();
        });

      });
   </script>
<?php /**PATH /home/u811877689/domains/midwaykebabish.ie/public_html/resources/views/Admin/pages/product/edit.blade.php ENDPATH**/ ?>