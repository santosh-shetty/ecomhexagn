<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecom Hexagn</title>
    <link href="<?= base_url('assets/front/assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/front/assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/front/assets/css/global.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/front/assets/css/index.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/front/assets/css/cart.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/front/assets/css/checkout.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="<?= base_url('assets/front/assets/js/bootstrap.bundle.min.js') ?>">   </script>
    <!-- // Carosel -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous -->
    <link href="<?= base_url('assets/front/css/ClientCarosuel.css') ?>" rel="stylesheet">

</head>

<body>
    <section id="header_top">
        <div class="container-xl">
            <div class="row header_top1">
                <div class="col-md-4">
                    <div class="header_top1l">
                        <h3 class="mb-0">
                            <a class="col_dark" href="<?= base_url() ?>">
                                <i class="fa fa-shopping-cart col_oran fs-1 me-1 align-middle"></i> Ecom Hexagn <br>
                                <span class="col_light">Shopping Here</span>
                            </a>
                        </h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header_top1m">
                        <!-- <select name="categories" class="form-select border-end-0" required="">
                <option value="">All Categories</option>
                <option>Home</option>
                <option>Men</option>
                <option>Women</option>
                <option>Clothes</option>
                <option>Electronics</option>
                <option>Arts</option>
                <option>Accessories</option>
                <option>Electricals</option>
                <option>Telescope</option>
                <option>Education</option>
                <option>Grocery</option>
                <option>Smartphones</option>
                <option>Computer</option>
                <option>Laptops</option>
                <option>Speakers</option>
                <option>Headphones</option>
                <option>Camera</option>
                <option>Health & Beauty</option>
                <option>Home</option>
                <option>Men</option>
                <option>Women</option>
                <option>Clothes</option>
                <option>Electronics</option>
                <option>Arts</option>
                <option>Accessories</option>
                <option>Electricals</option>
                <option>Telescope</option>
                <option>Education</option>
                <option>Grocery</option>
                <option>Smartphones</option>
                <option>Computer</option>
                <option>Laptops</option>
                <option>Speakers</option>
                <option>Headphones</option>
                <option>Camera</option>
                <option>Health & Beauty</option>
              </select> -->
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="header_top1r pull-right">
                        <ul class="mb-0">
                            <li class="nav-item  d-table-cell pe-4">
                                <a class="lang_tab font_12 col_dark" href="<?= base_url('/cart') ?>">
                                    <i class="fa fa-shopping-basket me-1 fs-2 align-middle me-1 col_oran"></i> </a>
                            </li>
                            <!-- <li class="nav-item dropdown d-table-cell pe-4">
                                <a class="dropdown-toggle lang_tab font_12 col_dark" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-shopping-basket me-1 fs-2 align-middle me-1 col_oran"></i> </a>
                                <ul class="dropdown-menu drop_cart" aria-labelledby="navbarDropdown">
                                    <li>
                                        <div class="drop_1i row">
                                            <div class="col-md-6 col-6">
                                                <div class="drop_1il">
                                                    <h5>2 ITEMS</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="drop_1il text-end">
                                                    <h5>
                                                        <a href="<//?= base_url('/cart') ?>">VIEW CART</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="drop_1i1 row">
                                            <div class="col-md-6 col-6">
                                                <div class="drop_1i1l">
                                                    <h6 class="fw-bold">
                                                        <a href="#">Nulla Quis</a>
                                                        <br>
                                                        <span class="fw-normal d-inline-block mt-1">1x - $89.00</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <div class="drop_1i1r">
                                                    <a href="#">
                                                        <img src="img/1.jpg" class="w-100" alt="abc">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-2">
                                                <div class="drop_1i1l text-end">
                                                    <h6>
                                                        <span>
                                                            <i class="fa fa-remove"></i>
                                                        </span>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="drop_1i1 row">
                                            <div class="col-md-6 col-6">
                                                <div class="drop_1i1l">
                                                    <h6 class="fw-bold">
                                                        <a href="#">Eget Nulla</a>
                                                        <br>
                                                        <span class="fw-normal d-inline-block mt-1">1x - $49.00</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <div class="drop_1i1r">
                                                    <a href="#">
                                                        <img src="img/2.jpg" class="w-100" alt="abc">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-2">
                                                <div class="drop_1i1l text-end">
                                                    <h6>
                                                        <span>
                                                            <i class="fa fa-remove"></i>
                                                        </span>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="drop_1i2 row">
                                            <div class="col-md-6 col-6">
                                                <div class="drop_1il">
                                                    <h5>TOTAL</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="drop_1il text-end">
                                                    <h5>$138.00</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="drop_1i3 text-center row">
                                            <div class="col-md-12 col-12">
                                                <h6 class="fw-normal">
                                                    <a class="button d-block" href="checkout.html">CHECKOUT</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li> -->

                            <li class="nav-item dropdown d-table-cell">
                                <a class="dropdown-toggle lang_tab font_12 col_dark" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user me-1 fs-2 align-middle me-1 col_oran"></i> </a>
                                <ul class="dropdown-menu drop_cart" aria-labelledby="navbarDropdown">
                                    <?php if (session()->has('customer_name')): ?>
                                        <li>
                                            <a class="dropdown-item" href="<?= base_url('customer/profile') ?>">
                                                <i class="fa fa-caret-right me-1 col_oran"></i>My Profile</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?= base_url('customer/logout') ?>">
                                                <i class="fa fa-caret-right me-1 col_oran"></i>Log Out</a>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <a class="dropdown-item" href="<?= base_url('customer/login') ?>">
                                                <i class="fa fa-caret-right me-1 col_oran"></i>Log In</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="header" class="bg_dark">
        <nav class="navbar navbar-expand-md navbar-light pt-0 pb-0" id="navbar_sticky">
            <div class="container-xl">
                <a class="navbar-brand text-white" href="<?= base_url() ?>">
                    <i class="fa fa-shopping-cart col_oran fs-1 me-1 align-middle"></i> Ecom Hexagn </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle act_cat nav_hide" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-navicon me-1"></i> ALL CATEGORIES </a>
                            <ul class="dropdown-menu drop_cat" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-male me-2 col_oran"></i> Men </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-female me-2 col_oran"></i> Women </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-car me-2 col_oran"></i> Automative </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-television me-2 col_oran"></i> Electronics </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-gift me-2 col_oran"></i> Supplies & Gifts </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-diamond me-2 col_oran"></i> Accessories </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-desktop me-2 col_oran"></i> Computer </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-camera-retro me-2 col_oran"></i> Cameras & Photo </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-book me-2 col_oran"></i> Education </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-laptop me-2 col_oran"></i> Laptop </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-0" href="#">
                                        <i class="fa fa-shirtsinbulk align-middle me-2 col_oran"></i> Fashion </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"> Product </a>
                            <ul class="dropdown-menu drop_2 drop_cat" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('/allproducts') ?>">
                                        <i class="fa fa-caret-right me-1 col_oran"></i>All Product </a>
                                </li>
                                <li>
                                    <a class="dropdown-item " href="<?= base_url('/top_products') ?>">
                                        <i class="fa fa-caret-right me-1 col_oran"></i> Top Products </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-0" href="<?= base_url('/feature_products') ?>">
                                        <i class="fa fa-caret-right me-1 col_oran"></i> Featured Products </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/about') ?>">About </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/blog') ?>">Blog </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>