<!-- Include Header -->
<? //php @include('../FrontEnd/includes/header.php') ?>

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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="<?= base_url('assets/front/assets/js/bootstrap.bundle.min.js') ?>">
    </script>
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
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Product name here...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary bg_oran" type="button"> Search </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="header_top1r pull-right">
                        <ul class="mb-0">
                            <li class="nav-item dropdown d-table-cell pe-4">
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
                                                        <a href="<?= base_url('/cart') ?>">VIEW CART</a>
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
                            </li>

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
    <!-- Content Start -->
    <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center" style="max-width: 600px;">
        <tr bgcolor="#d7d7d7">
            <td height="50"
                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
            </td>
        </tr>

        <!-- This encapsulation is required to ensure correct rendering on Windows 10 Mail app. -->
        <tr bgcolor="#d7d7d7">
            <td
                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                <!-- Seperator Start -->
                <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center"
                    style="max-width: 600px; width: 100%;">
                    <tr bgcolor="#d7d7d7">
                        <td height="30"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                    </tr>
                </table>
                <!-- Seperator End -->

                <!-- Generic Pod Left Aligned with Price breakdown Start -->
                <table align="center" cellpadding="0" cellspacing="0" cols="3" bgcolor="white"
                    class="bordered-left-right"
                    style="border-left: 10px solid #d7d7d7; border-right: 10px solid #d7d7d7; max-width: 600px; width: 100%;">
                    <tr height="50">
                        <td colspan="3"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                    </tr>
                    <tr align="center">
                        <td width="36"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                        <td class="text-primary"
                            style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                            <img src="http://dgtlmrktng.s3.amazonaws.com/go/emails/generic-email-template/tick.png"
                                alt="GO" width="50"
                                style="border: 0; font-size: 0; margin: 0; max-width: 100%; padding: 0;">
                        </td>
                        <td width="36"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                    </tr>
                    <tr height="17">
                        <td colspan="3"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                    </tr>
                    <tr align="center">
                        <td width="36"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                        <td class="text-primary"
                            style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                            <h1
                                style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 30px; font-weight: 700; line-height: 34px; margin-bottom: 0; margin-top: 0;">
                                Payment received</h1>
                        </td>
                        <td width="36"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                    </tr>
                    <tr height="30">
                        <td colspan="3"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                    </tr>
                    <tr align="left">
                        <td width="36"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                        <td
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                            <p
                                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                Hii <?= $customer_name ?>
                            </p>
                        </td>
                        <td width="36"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                    </tr>
                    <tr height="10">
                        <td colspan="3"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                    </tr>
                    <tr align="left">
                        <td width="36"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                        <td
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                            <p
                                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                Your transaction was successful!</p>
                            <br>
                            <p
                                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0; ">
                                <strong>Payment Details:</strong><br />

                                Payment ID :
                                <?= $payment_id ?><br>
                                Product Name :
                                <?= $product_name ?><br>
                                Total Amount :
                                <?= $total_amount ?><br>
                            </p>
                            <br>
                            <p
                                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                <a  class="button " href="<?= base_url('/allproducts') ?>">Continue Shopping</a><br />
                            </p>
                        </td>
                        <td width="36"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                    </tr>
                    <tr height="30">
                        <td
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                        <td
                            style="border-bottom: 1px solid #D3D1D1; color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                        <td
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                    </tr>
                    <tr height="30">
                        <td colspan="3"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                    </tr>
                    <tr align="center">
                        <td width="36"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                        <td
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                            <p
                                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                                <strong>Transaction reference:
                                    <?= $payment_id ?>
                                </strong>
                            </p>
                            <p
                                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                            
                            <p
                                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                            </p>
                        </td>
                        <td width="36"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                    </tr>

                    <tr height="50">
                        <td colspan="3"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                    </tr>

                </table>
                <!-- Generic Pod Left Aligned with Price breakdown End -->

                <!-- Seperator Start -->
                <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center"
                    style="max-width: 600px; width: 100%;">
                    <tr bgcolor="#d7d7d7">
                        <td height="50"
                            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        </td>
                    </tr>
                </table>
                <!-- Seperator End -->

            </td>
        </tr>
    </table>
    <!-- Content End -->

    <!-- Include Footer -->
    <?php @include('../FrontEnd/includes/footer.php') ?>