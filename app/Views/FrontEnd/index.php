<html>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="aha">
        <img src="<?= base_url('assets/front/images/wallpaper.jpeg'); ?>" alt="main.head" style="width:100%;">
        <div class="left">
            <h1>Shopping Center </h1>
        </div>
    </div>

    </div>
    <!-------------------------------------------Featured Category------------------------------------------------>
    <div class="categories">
        <div class="small-container">
            <div class="row">

                <div class="col-3">
                    <img src="<?= base_url('assets/front/images/spotlight-1.jpeg'); ?>">
                </div>

            </div>
        </div>
    </div>

    <!---------------------------------------------Latest Products---------------------------------------------->
    <div class="small-container">
        <h2 class="title">Latest Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="<?= base_url('assets/front/images/product-1.jpeg'); ?>">
                <h4>Nike Air Huarache</h4>
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

        <!---------------------------------------------Featured Products---------------------------------------------->
        <h2 class="title">Featured Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="<?= base_url('assets/front/images/product-5.jpeg'); ?>">
                <h4>Nike Air Zoom-Type Premium</h4>
                <div class="rating">
                    <i class="material-icons">star</i>
                    <i class="material-icons">star</i>
                    <i class="material-icons">star</i>
                    <i class="material-icons">star</i>
                    <i class="material-icons">star_half</i>
                </div>
                <p>Rs.13,495</p>
            </div>
        </div>
        <!-------------------------------------------------------OFFER-------------------------------------------------->
        <div class="offer">
            <div class="footer-container">
                <div class="row">
                    <div class="col-2">
                        <img src="<?= base_url('assets/front/images/exclusive.png'); ?>" class="offer-img">
                    </div>
                    <div class="col-2">
                        <div class="exclusive-text">
                            <p>Exclusively Available On SNEAKERS STOP</p>
                            <h1>YEEZY 500 HIGH</h1>
                            <small>The adidas Yeezy 500 High “Frosted Blue” is an April 2021 colorway of the high-top sneaker by
                                Kanye West.</small>
                            <br>
                            <a href="yeezy-detail.html" class="btn">Buy Now &#8594;</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!------------------------------------------------------------BRANDS-------------------------------------------->
        <div class="brands">
            <div class="small-container">
                <div class="row">

                    <div class="col-5">
                        <img src="<?= base_url('assets/front/images/logo-godrej.png'); ?>">
                    </div>

                </div>
            </div>
        </div>
        <!-----------------------------------------------------Footer----------------------------------------------->
        <?php include 'includes/footer.php'; ?>
</body>

</html>