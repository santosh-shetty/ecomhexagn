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
									<img src="<?= base_url('assets/front/images/home1.jpg') ?>" class="d-block w-100"
										height="518" alt="abc">
								</div>
								<div class="carousel-item">
									<img src="<?= base_url('assets/front/images/home2.jpg') ?>" class="d-block w-100"
										height="518" alt="abc">
								</div>
								<div class="carousel-item">
									<img src="<?= base_url('assets/front/images/home3.jpg') ?>" class="d-block w-100"
										height="518" alt="abc">
								</div>
							</div>
							<button class="carousel-control-prev" type="button"
								data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button"
								data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
						</div>
					</div>
				</div>
				<!-- generate-description -->
				<!-- <form action="<//?= base_url('generate-description') ?>" method="post">
					<button type="submit" class="button ">Click</button>
				</form> -->
				<div class="col-md-3 ps-0">
					<div class="center_h2r">
						<?php $limit = 1; ?>
						<?php foreach ($categories as $category): ?>
							<?php if ($limit <= 3) { ?>
								<div class="center_h2ri mt-0 clearfix"  style="margin-bottom: 15px;">
									<div class="grid clearfix">
										<figure class="effect-jazz mb-0">
											<a href="#">
												<img class="w-100"
													src="<?= base_url('assets/images/upload/category/' . $category['category_image']); ?>"
													style=" object-fit: cover; height:160px;">
											</a>
										</figure>
									</div>
								</div>
							<?php }
							$limit++; ?>
						<?php endforeach; ?>
						<!-- <div class="center_h2ri clearfix">
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
						</div> -->
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
<!-- START FEATURED PRODUCTS -->
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
						foreach ($products as $product):
							if ($i == 4) {
								break;
							} ?>
							<div class="col-md-3">
								<div class="prod_h2i1 clearfix position-relative">
									<div class="prod_h2i1i text-center clearfix">
										<div class="grid clearfix">
											<figure class="effect-jazz mb-0">
												<a
													href="<?= base_url('/product/single_product/' . $product->product_id) ?>">
													<img src="<?= base_url('assets/images/upload/' . $product->product_image) ?>"
														class="w-100 " alt="abc" style="object-fit: cover; height:250px;">
												</a>
											</figure>
										</div>
										<h6 class="text-capitalize mt-3">
											<a href="<?= base_url('/product/single_product/' . $product->product_id) ?>"><?= $product->product_name ?></a>
										</h6>
										<h5 class="mt-2 col_oran">&#8377;
											<?= $product->product_price ?>
										</h5>
										<form action="<?= base_url('/cart/add/' . $product->product_id) ?>" method="post">
											<h6 class="mb-0 mt-3 pb-3">
												<input type="hidden" value="<?= $product->product_id ?>" name="product_id">
												<input type="hidden" value="<?= $product->product_name ?>"
													name="product_name">
												<!-- Check if the customer is logged in -->
												<?php if (session()->has('customer_id')): ?>
													<input type="hidden" value="<?= session('customer_id') ?>"
														name="customer_id">
													<input type="hidden" value="<?= session('customer_name') ?>"
														name="customer_name">
													<button type="submit" class="button_1 p-3 pt-2 pb-2">
														<i class="fa fa-shopping-basket"></i> Add to Cart
													</button>
												<?php else: ?>
													<a href="<?= base_url('customer/login') ?>" class="button_1 p-3 pt-2 pb-2">
														<i class="fa fa-sign-in"></i> Login to Add to Cart
													</a>
												<?php endif; ?>
											</h6>
										</form>
									</div>
									<div class="prod_h2i1i1 pt-2 clearfix position-absolute">
										<h6 class="mb-0 bg_green d-inline-block p-3 pt-2 pb-2 text-white">
											<?= $product->category_name ?>
										</h6>
									</div>
									<!-- <div class="prod_h2i1i2 position-absolute clearfix">
										<span class="d-inline-block bg-white fs-5">
											<i class="fa fa-heart-o"></i>
										</span>
									</div>
									<div class="prod_h2i1i3 clearfix position-absolute w-100 text-center">
										<span class="d-inline-block bg_oran fs-5">
											<a href="<? //= ?>">
												<i class="fa fa-search text-white"></i>
											</a>
										</span>
									</div> -->
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
<!-- END FEATURED PRODUCTS -->

<!-- START FEATURED CATEGORIES -->
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
			<?php foreach ($categories as $category): ?>
				<?php if ($limit <= 3) { ?>
					<div class="col-md-4">
						<div class="offer_1i">
							<div class="grid clearfix">
								<figure class="effect-jazz mb-0">
									<a href="#">
										<img src="<?= base_url('assets/images/upload/category/' . $category['category_image']); ?>"
											style=" object-fit: cover; height:250px;">
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
<!-- END FEATURED CATEGORIES -->


<!--Start LATEST Products -->
<section id="offer" class="pt-3 pb-3">
	<div class="container-xl">
		<div class="row prod_h1">
			<div class="col-md-12 mb-3">
				<div class="prod_h1l">
					<h5 class="mb-0">LATEST PRODUCTS</h5>
				</div>
			</div>
		</div>
		<div class="row prod_h2">
			<div class="tab-content">
				<div class="tab-pane active" id="home">
					<div class="prod_h2m row">
						<?php $i = 0;
						foreach ($latestProducts as $product):
							if ($i == 4) {
								break;
							} ?>
							<div class="col-md-3">
								<div class="prod_h2i1 clearfix position-relative">
									<div class="prod_h2i1i text-center clearfix">
										<div class="grid clearfix">
											<figure class="effect-jazz mb-0">
												<a
													href="<?= base_url('/product/single_product/' . $product->product_id) ?>">
													<img src="<?= base_url('assets/images/upload/' . $product->product_image) ?>"
														class="w-100 " alt="abc" style="object-fit: cover; height:250px;">
												</a>
											</figure>
										</div>
										<h6 class="text-capitalize mt-3">
											<a href="<?= base_url('/product/single_product/' . $product->product_id) ?>"><?= $product->product_name ?></a>
										</h6>
										<!-- <span class="col_yell">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										</span> -->
										<h5 class="mt-2 col_oran">&#8377;
											<?= $product->product_price ?>
										</h5>
										<form action="<?= base_url('/cart/add/' . $product->product_id) ?>" method="post">
											<h6 class="mb-0 mt-3 pb-3">
												<input type="hidden" value="<?= $product->product_id ?>" name="product_id">
												<input type="hidden" value="<?= $product->product_name ?>"
													name="product_name">
												<!-- Check if the customer is logged in -->
												<?php if (session()->has('customer_id')): ?>
													<input type="hidden" value="<?= session('customer_id') ?>"
														name="customer_id">
													<input type="hidden" value="<?= session('customer_name') ?>"
														name="customer_name">
													<button type="submit" class="button_1 p-3 pt-2 pb-2">
														<i class="fa fa-shopping-basket"></i> Add to Cart
													</button>
												<?php else: ?>
													<a href="<?= base_url('customer/login') ?>" class="button_1 p-3 pt-2 pb-2">
														<i class="fa fa-sign-in"></i> Login to Add to Cart
													</a>
												<?php endif; ?>
											</h6>
										</form>
									</div>
									<div class="prod_h2i1i1 pt-2 clearfix position-absolute">
										<h6 class="mb-0 bg_green d-inline-block p-3 pt-2 pb-2 text-white">
											<?= $product->category_name ?>
										</h6>
									</div>
									<!-- <div class="prod_h2i1i2 position-absolute clearfix">
										<span class="d-inline-block bg-white fs-5">
											<i class="fa fa-heart-o"></i>
										</span>
									</div>
									<div class="prod_h2i1i3 clearfix position-absolute w-100 text-center">
										<span class="d-inline-block bg_oran fs-5">
											<a href="<? //= ?>">
												<i class="fa fa-search text-white"></i>
											</a>
										</span>
									</div> -->
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
<!--End LATEST Products -->


<!-- START CLIENT SECTION -->
<section id="offer" class="pt-5 pb-3">
	<div class="container-xl">
		<div class="row prod_h1">
			<div class="col-md-12 mb-3">
				<div class="prod_h1l">
					<h5 class="mb-0">OUR CLIENTS</h5>
				</div>
			</div>
		</div>
		<section class="trigger section gutter-horizontal bg-gray gutter-vertical--m gutter-horizontal">
			<div class="customer-logos slider">
				<div class="slide-in-right slide"><img
						src="https://camo.githubusercontent.com/e4923bf90c04345e43aada42486ebc4f9a3e56eb/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f677265656e732d666f6f642d737570706c696572732e737667"
						alt="Kinderhotel Aschauerhof" height="150" width="150"></a></div>
				<div class="slide-in-right slide"><img
						src="https://camo.githubusercontent.com/1c89cd43ff20ebfdae6d7dfc615bed22897d4f2c/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f6175746f2d73706565642e737667"
						height="150" width="150"></a></div>
				<div class="slide-in-right slide"><img
						src="https://camo.githubusercontent.com/e7141f1aa02b6721a702b44a3b14b7383e4539ed/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f63726f6674732d6163636f756e74616e74732e737667"
						height="150" width="150"></a></div>
				<div class="slide-in-right slide"><img
						src="https://camo.githubusercontent.com/339edd4ba206d97f2bc7c03f7b7fd5a1b5c97111/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f63686573686972652d636f756e74792d68796769656e652d73657276696365732e737667"
						height="150" width="150"></a></div>
				<div class="slide-in-right slide"><img
						src="https://camo.githubusercontent.com/b9d65aaf5e5d1769f8bb0e04247ff6cfa0efa2ab/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f666173742d62616e616e612e737667"
						height="150" width="150" alt="Tannenmuehle"></a></div>
				<div class="slide-in-right slide"><img
						src="https://camo.githubusercontent.com/8d4fa451b4f47d2d10ff585a78f7fbd88f8f5530/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f73706163652d637562652e737667"
						height="150" width="150" alt="Loeffele"></a></div>
				<div class="slide-in-right slide"><img
						src="https://camo.githubusercontent.com/1e0d6f19906c869766d638227e7e3936aa9295c7/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f6265617574792d626f782e737667"
						alt="Krone" height="150" width="150"></a></div>
				<div class="slide-in-right slide"><img
						src="https://camo.githubusercontent.com/0072b8f37157c7e0238342d8105dcc2c9b1e2217/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f626162792d7377696d2e737667"
						alt="Obereggen" height="150" width="150"></a></div>
				<div class="slide-in-right slide"><img
						src="https://camo.githubusercontent.com/6b4aa115c3423ecbad9da2dba885d2d43084acfa/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f7468652d64616e63652d73747564696f2e737667"
						alt="Ortnerhof" height="150" width="150"></a></div>
				<div class="slide-in-right slide"><img
						src="https://camo.githubusercontent.com/b0e5c1e174dcb2911bc712f240f7163fe597628c/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f6a616d65732d616e642d736f6e732e737667"
						alt="Ottonenhof" height="150" width="150"></a></div>
				<div class="slide-in-right slide"><img
						src="https://camo.githubusercontent.com/370291c50b74eeab6fe66ccc9e6ca410fc117ed9/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f7468652d7765622d776f726b732e737667"
						alt="Leiners" height="150" width="150"></a></div>
				<div class="slide-in-right slide"><img
						src="https://camo.githubusercontent.com/0112d20015b4dad56fbb07088e76552042539151/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f70657465732d626c696e64732e737667"
						alt="Seitenalm" height="150" width="150"></a>
				</div>
				<div class="slide-in-right slide"><img
						src="https://camo.githubusercontent.com/e4eb289d352d7c4cbb8493d6a212448036e3e2d2/687474703a2f2f7069676d656e742e6769746875622e696f2f66616b652d6c6f676f732f6c6f676f732f766563746f722f636f6c6f722f796f67612d626162792e737667"
						alt="Testerhof" height="150" width="150"></a>
				</div>
		</section>
	</div>
</section>
<!-- END CLIENT SECTION -->


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


<!-- END Client SECTION -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script>
	$(document).ready(function () {
		$('.customer-logos').slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			autoplay: false,
			autoplaySpeed: 1500,
			arrows: true,
			dots: false,
			pauseOnHover: false,
			prevArrow: '<i class="slick-prev fa fa-angle-left"></i>',
			nextArrow: '<i class="slick-next fa fa-angle-right"></i>',
			responsive: [{
				breakpoint: 768,
				settings: {
					slidesToShow: 3
				}
			}, {
				breakpoint: 520,
				settings: {
					slidesToShow: 2
				}
			}]
		});
	});
</script>
<!-- START Client SECTION -->
<!-- Include Header -->
<?php @include('includes/footer.php') ?>