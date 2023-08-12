<html>

<body>
<?php include 'includes/header.php'; ?>
    <!----------------------------------------single product deatails-------------------------------------->
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="<?= base_url('assets/front/images/product-7.jpeg');?>" width="100%" id="ProductImg">

                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="<?= base_url('assets/front/images/product-7.jpeg');?>" width="100%" class="SmallImg">
                    </div>
                    <div class="small-img-col">
                        <img src="<?= base_url('assets/front/images/jordan-2.png');?>" width="100%" class="SmallImg">
                    </div>
                    <div class="small-img-col">
                        <img src="<?= base_url('assets/front/images/jordan-3.png');?>" width="100%" class="SmallImg">
                    </div>
                    <div class="small-img-col">
                        <img src="<?= base_url('assets/front/images/jordan-4.png');?>" width="100%" class="SmallImg">
                    </div>
                </div>
            </div>
            <div class="col-2">
                <h1>Jordan 'Why Not?' Zer0.4</h1>
                <h4>Rs. 15,398</h4>
                <select>
                    <option>Select Size US-Men</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                </select>
                <input type="number" value="1">
                <a href="" class="btn">Add to Cart</a>
                <h3>Product Details</h3>
                <p>Cue the Jordan 'Why Not?' Zer0.4, the first to feature double-stacked Zoom in the forefoot. It's
                    an extra-responsive cushioning system that's designed to help him transform speed into force and
                    focus his attack. </p>
            </div>
        </div>
    </div>
    <!--------------------------------------------------title-------------------------------------------------->
    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <p>View More</p>
        </div>
    </div>
    <!--------------------------------------------------products-------------------------------------------------->
    <div class="small-container">
        <div class="row">
            <div class="col-4">
                <img src="<?= base_url('assets/front/images/product-3.jpeg');?>">
                <h4>Red Graphic T-shirt</h4>
                <div class="rating">
                    <i class="material-icons">star</i>
                    <i class="material-icons">star</i>
                    <i class="material-icons">star</i>
                    <i class="material-icons">star</i>
                    <i class="material-icons">star_half</i>
                </div>
                <p>Rs.10,290</p>
            </div>
        </div>
    </div>
    <!-----------------------------------------------------Footer----------------------------------------------->
<?php include 'includes/footer.php';?>
</body>

</html>