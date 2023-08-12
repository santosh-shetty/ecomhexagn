<html>

<body>

  <!--------------------------------------------------products------------------------------------------------------------------>
  <?php include 'includes/header.php'; ?>
  <div class="small-container">
    <div class="row row-2">
      <h2> All Products </h2>
      <select>
        <option>Default Sorting</option>
        <option>Sort By Price</option>
        <option>Sort By Popularity</option>
        <option>Sort By Rating</option>
      </select>
    </div>

    <div class="row">
      <div class="col-4">
        <img src="<?= base_url('assets/front/images/product-1.jpeg');?>">
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
  <?php include 'includes/footer.php'; ?>
</body>

</html>