<!-- Include Header -->
<?php

use App\Models\Products;

@include('includes/header.php') ?>

<section id="center" class="center_o pt-3 pb-3 bg_light1">
    <div class="container-xl">
        <div class="row center_h1">
            <div class="col-md-12">
                <ul class="mb-0">
                    <li class="d-inline-block font_13 col_light me-2"><a class="pe-1" href="#">Home</a> |</li>
                    <li class="d-inline-block col_oran font_13">Shopping Cart</li>
                </ul>
            </div>
        </div>

    </div>
</section>

<section id="cart_page" class="cart pt-4 pb-4">
    <div class="container-xl">
        <div class="cart_2 row">
            <div class="col-md-6">
                <h5>MY CART</h5>
            </div>
            <div class="col-md-6">
                <h5 class="text-end"><a href="#">Continue Shopping</a></h5>
            </div>
        </div>
        <div class="cart_3 row mt-3">
            <div class="col-md-8">
                <div class="cart_3l">
                    <h5>PRODUCT</h5>
                </div>
                <?php if (session()->has('success')): ?>
                    <div class="alert alert-success">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->has('error')): ?>
                    <div class="alert alert-success">
                        <?= session('error') ?>
                    </div>
                <?php endif; ?>
                <?php foreach ($cartProducts as $cartProduct): ?>
                    <div class="cart_3l1 mt-3 row ms-0 me-0">
                        <div class="col-md-3 ps-0 col-3">
                            <div class="cart_3l1i">
                                <a href="#"><img
                                        src="<?= base_url('assets/images/upload/' . $cartProduct->product_image) ?>"
                                        alt="abc" class="w-100" style="object-fit: cover; height:180px;"></a>
                            </div>
                        </div>
                        <div class="col-md-9 col-9">
                            <div class="cart_3l1i1">
                                <h6 class="fw-bold"><a href="#">
                                        <?= $cartProduct->product_name ?>
                                    </a>
                                </h6>
                                <!-- <h6 class="fw-normal font_12 mt-3">RED / XS</h6>    -->
                                <h5 class="col_oran mt-3">&#8377;
                                    <?= $cartProduct->product_price ?>
                                </h5>
                                <h6 class="font_12 mt-3 mb-3">Quantity</h6>
                            </div>
                            <div class="cart_3l1i2">
                                <form method="post" action="<?= base_url('cart/update/' . $cartProduct->cart_id) ?>">
                                    <input type="number" min="1" value="<?= $cartProduct->quantity ?>" class="form-control"
                                        placeholder="Qty" name="quantity">
                                    <h6><a class="button_1"
                                            href="<?= base_url('cart/remove/' . $cartProduct->cart_id) ?>">REMOVE</a></h6>
                                    <h6><button class="button" type="submit"> UPDATE CART</button></h6>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Store carts detail in session for checkout ussed -->
                    <?php $cartDetails[] = [
                        'product_id' => $cartProduct->product_id,
                        'product_name' => $cartProduct->product_name,
                        'quantity' => $cartProduct->quantity,
                        'total_price' => number_format($totalPrice, 2),
                    ]; ?>
                <?php endforeach; ?>
                <?php if (!empty($cartDetails)): ?>
                    <?php session()->set('cart_details', $cartDetails); ?>
                    <? //php endif; ?>
                <?php else: ?>
                    <h6>No any Product on the cart.</h6>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <div class="cart_3r">
                    <h5 class="head_1">SUBTOTAL</h5>
                    <h5 class="text-center col_oran mt-3"> &#8377;
                        <?= number_format($totalPrice, 2) ?>
                    </h5>
                    <hr>
                    <h6 class="font_13">Additional comments</h6>
                    <textarea class="form-control"></textarea>
                    <h6 class="text-center mt-3"><a class="button" href="<?= base_url('/checkout') ?>">PROCEED TO
                            CHECKOUT</a></h6><br>
                    <!-- <h5>GET SHIPPING ESTIMATES</h5> -->
                    <!-- <hr> -->
                </div>
                <!-- <div class="cart_3r1">
                    <h6 class="font_13">Country</h6>
                    <select class="form-select" id="subject" name="subject">
                        <option>America</option>
                        <option>India</option>
                        <option>England</option>
                        <option>Africa</option>
                    </select><br>
                    <h6 class="font_13">State</h6>
                    <select class="form-select" id="subject_1" name="subject">
                        <option>Delhi</option>
                        <option>Uttar Pradesh</option>
                        <option>Punjab</option>
                        <option>Madhya Pradesh</option>
                    </select><br>
                    <h6 class="font_13">Postal/Zip Code</h6>
                    <input class="form-control" type="text">
                    <h6 class="text-center mt-3"><a class="button" href="#">CALCULATE SHIPPING</a></h6>
                </div> -->
            </div>
        </div>
    </div>
</section>



<!-- Include Header -->
<?php @include('includes/footer.php') ?>