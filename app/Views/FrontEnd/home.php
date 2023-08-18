<!-- Include Header -->
<?php @include('includes/header.php') ?>


<section id="center" class="center_h pt-3 pb-3">
	<div class="container-xl">
		<div class="row center_h1">
			<div class="row center_h2 mt-3">
				<div class="col-md-9">
					<div class="center_h2l">
						<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
							<!-- Top Carasoul  -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="<?= base_url('assets/front/images/home1.jpg') ?>" class="d-block w-100" height="518" alt="abc">
								</div>
								<div class="carousel-item">
									<img src="<?= base_url('assets/front/images/home2.jpg') ?>" class="d-block w-100" height="518" alt="abc">
								</div>
								<div class="carousel-item">
									<img src="<?= base_url('assets/front/images/home3.jpg') ?>" class="d-block w-100" height="518" alt="abc">
								</div>
							</div>
							<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
						</div>
					</div>
				</div>
				<div class="col-md-3 ps-0">
					<div class="center_h2r">
						<div class="center_h2ri mt-0 clearfix">
							<div class="grid clearfix">
								<figure class="effect-jazz mb-0">
									<a href="#">
										<img src="img/6.jpg" class="w-100" alt="abc">
									</a>
								</figure>
							</div>
						</div>
						<div class="center_h2ri clearfix">
							<div class="grid clearfix">
								<figure class="effect-jazz mb-0">
									<a href="#">
										<img src="img/7.jpg" class="w-100" alt="abc">
									</a>
								</figure>
							</div>
						</div>
						<div class="center_h2ri clearfix">
							<div class="grid clearfix">
								<figure class="effect-jazz mb-0">
									<a href="#">
										<img src="img/8.jpg" class="w-100" alt="abc">
									</a>
								</figure>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row center_h3 mt-4 me-0 ms-0">
				<div class="col-md-3 col-sm-6">
					<div class="center_h3i">
						<span>
							<a class="col_oran fs-1 float-start lh-1 me-3" href="#">
								<i class="fa fa-truck"></i>
							</a>
						</span>
						<h6 class="mb-0">
							<a href="#"> FREE SHIPPING <br> ON ALL ORDER </a>
						</h6>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="center_h3i">
						<span>
							<a class="col_oran fs-1 float-start lh-1 me-3" href="#">
								<i class="fa fa-recycle"></i>
							</a>
						</span>
						<h6 class="mb-0">
							<a href="#"> MONEY BACK <br> GUARANTEE </a>
						</h6>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="center_h3i">
						<span>
							<a class="col_oran fs-1 float-start lh-1 me-3" href="#">
								<i class="fa fa-umbrella"></i>
							</a>
						</span>
						<h6 class="mb-0">
							<a href="#"> SAFE SHOPPING <br> GUARANTEE </a>
						</h6>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="center_h3i border-0">
						<span>
							<a class="col_oran fs-1 float-start lh-1 me-3" href="#">
								<i class="fa fa-shopping-bag"></i>
							</a>
						</span>
						<h6 class="mb-0">
							<a href="#"> BEST OFFER <br> GUARANTEE </a>
						</h6>
					</div>
				</div>
			</div>
		</div>
</section>
<section id="prod_h" class="pt-3 pb-3">
	<div class="container-xl">
		<div class="row prod_h1">
			<div class="col-md-12 mb-3">
				<div class="prod_h1l">
					<h5 class="mb-0">FEATURED PRODUCTS</h5>
				</div>
			</div>
		</div>
		<div class="row prod_h2">
			<div class="tab-content">
				<div class="tab-pane active" id="home">
					<div class="prod_h2m row">
						<?php $i = 0;
						foreach ($products as $product) :
							if ($i == 4) {
								break;
							} ?>
							<div class="col-md-3">
								<div class="prod_h2i1 clearfix position-relative">
									<div class="prod_h2i1i text-center clearfix">
										<div class="grid clearfix">
											<figure class="effect-jazz mb-0">
												<a href="<?= base_url('/product/single_product/' . $product['product_id']) ?>">
													<img src="<?= base_url('assets/images/upload/' . $product['product_image']) ?>" class="w-100 " alt="abc" style="object-fit: cover; height:250px;">
												</a>
											</figure>
										</div>
										<h6 class="text-capitalize mt-3">
											<a href="<?= base_url('/product/single_product/' . $product['product_id']) ?>"><?= $product['product_name'] ?></a>
										</h6>
										<!-- <span class="col_yell">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										</span> -->
										<h5 class="mt-2 col_oran">&#8377;
											<?= $product['product_price'] ?>
										</h5>
										<form action="<?= base_url('/cart/add/' . $product['product_id']) ?>" method="post">
											<h6 class="mb-0 mt-3 pb-3">
												<input type="hidden" value="<?= $product['product_id'] ?>" name="product_id">
												<input type="hidden" value="<?= $product['product_name'] ?>" name="product_name">
												<!-- Check if the customer is logged in -->
												<?php if (session()->has('customer_id')) : ?>
													<input type="hidden" value="<?= session('customer_id') ?>" name="customer_id">
													<input type="hidden" value="<?= session('customer_name') ?>" name="customer_name">
													<button type="submit" class="button_1 p-3 pt-2 pb-2">
														<i class="fa fa-shopping-basket"></i> Add to Cart
													</button>
												<?php else : ?>
													<a href="<?= base_url('customer/login') ?>" class="button_1 p-3 pt-2 pb-2">
														<i class="fa fa-sign-in"></i> Login to Add to Cart
													</a>
												<?php endif; ?>
											</h6>
										</form>
									</div>
									<div class="prod_h2i1i1 pt-2 clearfix position-absolute">
										<h6 class="mb-0 bg_green d-inline-block p-3 pt-2 pb-2 text-white">NEW PRODUCT</h6>
									</div>
									<div class="prod_h2i1i2 position-absolute clearfix">
										<span class="d-inline-block bg-white fs-5">
											<i class="fa fa-heart-o"></i>
										</span>
									</div>
								</div>
							</div>
						<?php $i++;
						endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="offer" class="pt-3 pb-3">
	<div class="container-xl">
		<div class="row prod_h1">
			<div class="col-md-12 mb-3">
				<div class="prod_h1l">
					<h5 class="mb-0">FEATURED CATEGORIES</h5>
				</div>
			</div>
		</div>
		<div class="row offer_1">
			<?php $limit = 1; ?>
			<?php foreach ($categories as $category) : ?>
				<?php if ($limit < 10) { ?>
					<div class="col-md-4">
						<div class="offer_1i">
							<div class="grid clearfix">
								<figure class="effect-jazz mb-0">
									<a href="#">
										<img src="<?= base_url('assets/images/upload/category/' . $category['category_image']); ?>" style=" object-fit: cover; height:250px;">
									</a>
								</figure>
							</div>
						</div>
					</div>
				<?php }
				$limit++; ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<section id=" collection" class="pt-2 pb-3">
	<div class="container-xl">
		<div class="row collection_1">
			<div class="col-md-12">
				<div class="collection_1l">
					<h5 class="mb-0">COLLECTIONS</h5>
				</div>
			</div>
		</div>
		<div class="row collection_2 bg_light1 m-0 mt-3">
			<div class="col-md-2 col-sm-6 p-0">
				<div class="collection_2i text-center pt-3 pb-4 ps-2 pe-2">
					<span class="d-inline-block font_60">
						<a href="#">
							<i class="fa fa-diamond"></i>
						</a>
					</span>
					<h5 class="text-capitalize mb-0 fw-normal">
						<a href="#">jewelry</a>
					</h5>
				</div>
			</div>
			<div class="col-md-2 col-sm-6 p-0">
				<div class="collection_2i text-center pt-3 pb-4 ps-2 pe-2">
					<span class="d-inline-block font_60">
						<a href="#">
							<i class="fa fa-gift"></i>
						</a>
					</span>
					<h5 class="text-capitalize mb-0 fw-normal">
						<a href="#">Gift idea</a>
					</h5>
				</div>
			</div>
			<div class="col-md-2 col-sm-6 p-0">
				<div class="collection_2i text-center pt-3 pb-4 ps-2 pe-2">
					<span class="d-inline-block font_60">
						<a href="#">
							<i class="fa fa-shirtsinbulk"></i>
						</a>
					</span>
					<h5 class="text-capitalize mb-0 fw-normal">
						<a href="#">fashion</a>
					</h5>
				</div>
			</div>
			<div class="col-md-2 p-0 col-sm-6">
				<div class="collection_2i text-center pt-3 pb-4 ps-2 pe-2">
					<span class="d-inline-block font_60">
						<a href="#">
							<i class="fa fa-bed"></i>
						</a>
					</span>
					<h5 class="text-capitalize mb-0 fw-normal">
						<a href="#">furniture</a>
					</h5>
				</div>
			</div>
			<div class="col-md-2 p-0 col-sm-6">
				<div class="collection_2i text-center pt-3 pb-4 ps-2 pe-2">
					<span class="d-inline-block font_60">
						<a href="#">
							<i class="fa fa-bicycle"></i>
						</a>
					</span>
					<h5 class="text-capitalize mb-0 fw-normal">
						<a href="#">outdoor</a>
					</h5>
				</div>
			</div>
			<div class="col-md-2 p-0 col-sm-6">
				<div class="collection_2i text-center pt-3 pb-4 ps-2 pe-2">
					<span class="d-inline-block font_60">
						<a href="#">
							<i class="fa fa-laptop"></i>
						</a>
					</span>
					<h5 class="text-capitalize mb-0 fw-normal">
						<a href="#">laptops</a>
					</h5>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Include Header -->
<?php @include('includes/footer.php') ?>