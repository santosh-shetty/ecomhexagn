<!-- Include Header -->
<?php @include('includes/header.php') ?>

<form action="<?= base_url('initiatePayment') ?>" method="post">

    <section id="center" class="center_o pt-3 pb-3 bg_light1">
        <div class="container-xl">
            <div class="row center_h1">
                <div class="col-md-12">
                    <ul class="mb-0">
                        <li class="d-inline-block font_13 col_light me-2"><a class="pe-1" href="#">Home</a> |</li>
                        <li class="d-inline-block col_oran font_13">Checkout</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section id="checkout">
        <div class="container-xl">
            <div class="checkout_1 row">
                <div class="col-md-8">
                    <div class="checkout_1l">
                        <h5>Make Your Checkout Here</h5>
                        <p>Please fill out the required information to expedite the checkout process.</p>

                    </div>
                    <div class="checkout_1l1 row">
                        <div class="col-md-6 ps-0">
                            <h6 class="font_13 fw-bold">First Name <span>*</span></h6>
                            <input class="form-control" type="text" required>
                        </div>
                        <div class="col-md-6 ps-0">
                            <h6 class="font_13 fw-bold">Last Name <span>*</span></h6>
                            <input class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="checkout_1l1 row">
                        <div class="col-md-6 ps-0">
                            <h6 class="font_13 fw-bold">Email Address <span>*</span></h6>
                            <input class="form-control" type="email" required>
                        </div>
                        <div class="col-md-6 ps-0">
                            <h6 class="font_13 fw-bold">Phone Number <span>*</span></h6>
                            <input class="form-control" type="number" required>
                        </div>
                    </div>
                    <div class="checkout_1l1 row">
                        <div class="col-md-6 ps-0">
                            <h6 class="font_13 fw-bold">Country <span>*</span></h6>
                            <select class="form-select">
                                <option>India</option>
                                <option>Paksitan</option>
                                <option>Russia</option>
                                <option>England</option>
                                <option>Nepal</option>
                            </select>
                        </div>
                        <div class="col-md-6 ps-0">
                            <h6 class="font_13 fw-bold">State / Divition <span>*</span></h6>
                            <select class="form-select">
                                <option>UP</option>
                                <option>Maharastra</option>
                                <option>MP</option>
                                <option>Bihar</option>
                                <option>Delhi</option>
                                <option>Jharkhand</option>
                            </select>
                        </div>
                    </div>
                    <div class="checkout_1l1 row">
                        <div class="col-md-6 ps-0">
                            <h6 class="font_13 fw-bold">Address Line 1 <span>*</span></h6>
                            <input class="form-control" type="text" required>
                        </div>
                        <div class="col-md-6 ps-0">
                            <h6 class="font_13 fw-bold">Address Line 2 <span>*</span></h6>
                            <input class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="checkout_1l1 row">
                        <div class="col-md-6 ps-0">
                            <h6 class="font_13 fw-bold">Postal Code <span>*</span></h6>
                            <input class="form-control" type="text" required>
                        </div>
                        <!-- <div class="col-md-6 ps-0">
                            <h6 class="font_13 fw-bold">Company <span>*</span></h6>
                            <select class="form-select">
                                <option>Microsoft</option>
                                <option>Xaiomi</option>
                                <option>Apple</option>
                                <option>Samsung</option>
                                <option>Motorola</option>
                            </select>
                        </div> -->
                    </div>
                    <!-- <div class="checkout_1l">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck1">
                            <label class="form-check-label" for="customCheck1"><a href="#">Create an
                                    account?</a></label>
                        </div>
                    </div> -->
                </div>
                <div class="col-md-4">
                    <div class="checkout_1r">
                        <h5>CART TOTALS</h5>
                        <hr class="line">
                        <h6 class="fw-bold font_13">Sub Total <span class="pull-right"> &#8377;<?= number_format($totalPrice, 2) ?>
                            </span></h6>
                        <h6 class="fw-bold mt-3 font_13">(+) Shipping <span class="pull-right">&#8377;0.00</span></h6>
                        <hr>
                        <input type="hidden" value="<?= number_format($totalPrice, 2) ?>" name="totalAmount">
                        <h6 class="fw-bold font_13">Total <span class="pull-right">&#8377;<?= number_format($totalPrice, 2) ?></span></h6><br>
                        <h5>PAYMENTS</h5>
                        <hr class="line">
                        <div class="form-check mt-2">
                            <input type="radio" class="form-check-input" id="cashOnDelivery" name="paymentMethod"
                                value="cash" required>
                            <label class="form-check-label" for="cashOnDelivery">Cash On Delivery</label>
                        </div>
                        <div class="form-check mt-2">
                            <input type="radio" class="form-check-input" id="paypal" name="paymentMethod"
                                value="paypal" required>
                            <label class="form-check-label" for="paypal">Pay with PayPal</label>
                        </div>

                        <button type="submit" class="button mt-3">PROCEED TO CHECKOUT</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<!-- Include Header -->
<?php @include('includes/footer.php') ?>