<!-- Include Header -->
<?= $this->include('admin/common_layout/topbar') ?>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- Include Sidebar-->
    <?= $this->include('admin/common_layout/sidebar.php') ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Check if there are any validation errors -->
            <form class="form-sample" action="<?= base_url('/admin/product/check_edit_product') ?>" method="post" enctype="multipart/form-data">
                <!-- Check if there are any validation errors -->
                <?php if (session()->has('errors')) : ?>
                    <div class="alert alert-danger">
                        <ul>
                            <!-- Loop through each error message -->
                            <?php foreach (session('errors') as $error) : ?>
                                <li>
                                    <?= esc($error) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <input type="hidden" value="<?= $product->product_id ?>" name="product_id">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Product</h4>

                            <p class="card-description">
                                Product Detail
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $product->product_name ?>" name="product_name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" placeholder="Product Price" class="form-control" value="<?= $product->product_price ?>" name="product_price" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="number" placeholder="Product Quantity" class="form-control" value="<?= $product->quantity ?>" name="quantity" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="category_id">
                                                <?php foreach ($categories as $category) : ?>
                                                    <option value="<?= $category['category_id'] ?>" <?= $product->category_id == $category['category_id'] ? "selected" : ""; ?>>
                                                        <?= $category['category_name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Status</label>

                                        <div class="col-sm-4">
                                            <div class="form-check mt-0">
                                                <label class="col-form-label">
                                                    <input style="margin-right: 10px;" type="radio" name="status" value="1" <?= $product->status == 1 ? "checked" : "" ?>> Active
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-5">
                                            <div class="form-check mt-0">
                                                <label class="col-form-label">
                                                    <input style="margin-right: 10px;" type="radio" name="status" value="0" <?= $product->status == 0 ? "checked" : "" ?>> In Active
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Brand</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="brand_id">
                                                <?php foreach ($brands as $brand) : ?>
                                                    <option value="<?= $brand['brand_id'] ?>" <?= $product->brand_id == $brand['brand_id'] ? "selected" : "" ?>><?= $brand['brand_name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Featured Products</label><!-- 0-active,1-inactive -->

                                        <div class="col-sm-4">
                                            <div class="form-check mt-0">
                                                <label class="col-form-label">
                                                    <input style="margin-right: 10px;" type="radio" name="feature_product" value="0" <?= $product->feature_product == 0 ? "checked" : "" ?>> Active
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-5">
                                            <div class="form-check mt-0">
                                                <label class="col-form-label">
                                                    <input style="margin-right: 10px;" type="radio" name="feature_product" value="1" <?= $product->feature_product == 1 ? "checked" : "" ?>> In Active
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="product_image" id="fileInput" class="file-upload-default" onchange="updateFileName()">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" id="fileInfo" disabled placeholder="<?= $product->product_image ?>" value=" <?= $product->product_image ?> ">
                                    <span class=" input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button" id="uploadButton">Upload</button>
                                    </span>
                                </div>
                                <img class="img-thumbnail mt-2" src="<?= base_url('/assets/images/upload/') . $product->product_image ?>" alt="" srcset="">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Product Discription</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="product_desc"><?= $product->product_desc ?></textarea>
                                        <script>
                                            CKEDITOR.replace('product_desc');
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>


<!-- Include Header -->
<?= $this->include('admin/common_layout/footer') ?>

<!-- Script for file upload  -->
<script>
    function updateFileName() {
        const fileInput = document.getElementById('fileInput');
        const fileInfo = document.getElementById('fileInfo');

        if (fileInput.files.length > 0) {
            fileInfo.value = fileInput.files[0].name;
        }
    }

    document.getElementById('uploadButton').addEventListener('click', function() {
        document.getElementById('fileInput').click();
    });
</script>