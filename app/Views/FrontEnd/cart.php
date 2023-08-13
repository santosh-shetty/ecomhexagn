<html>

<body>
    <?php include 'includes/header.php'; ?>

    <!--------------------------------------------------cart item deatails-------------------------------------->
    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="<?= base_url('assets/front/images/product-1.jpeg'); ?>">
                        <div>
                            <p>Graphic tee by Puma</p>
                            <small>Price: Rs. 1500</small>
                            <br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="1"></td>
                <td>Rs. 1500</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="<?= base_url('assets/front/images/product-12.png'); ?> ">
                        <div>
                            <p>Graphic tee by Puma</p>
                            <small>Price: Rs. 1500</small>
                            <br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="1"></td>
                <td>Rs. 1500</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="<?= base_url('assets/front/images/product-6.jpeg'); ?>">
                        <div>
                            <p>Graphic tee by Puma</p>
                            <small>Price: Rs. 1500</small>
                            <br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="1"></td>
                <td>Rs. 1500</td>
            </tr>
        </table>
        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>Rs. 3000</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>Rs. 180</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>Rs. 3180</td>
                </tr>
            </table>
        </div>
    </div>
    <!-----------------------------------------------------Footer----------------------------------------------->
    <?php include 'includes/footer.php'; ?>
</body>

</html>