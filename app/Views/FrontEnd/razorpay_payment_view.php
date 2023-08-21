<!-- Include Header -->
<?php @include('includes/header.php') ?>

<!-- Your existing HTML content -->

<section id="checkout">
    <div class="container-xl">
        <!-- Your existing checkout content -->

        <div class="checkout_1r">
            <!-- Your existing cart totals and payment options -->

            <!-- Razorpay payment button -->
            <form action="<?= base_url('razorpay/processPayment') ?>" method="POST">
                <script
                    src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="<?= $order->id ?>" 
                    data-amount="<?= $order->amount ?>"
                    data-currency="INR"
                    data-order_id="<?= $order->id ?>"
                    data-buttontext="Pay with Razorpay"
                >
                </script>
            </form>
        </div>
    </div>
</section>

<!-- Include Footer -->
<?php @include('includes/footer.php') ?>
