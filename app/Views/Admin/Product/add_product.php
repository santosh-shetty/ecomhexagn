<!-- Include Header -->
<?= $this->include('admin/common_layout/topbar') ?>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- Include Sidebar-->
    <?= $this->include('admin/common_layout/sidebar.php') ?>

    <div class="main-panel">
        <div class="content-wrapper">
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
            <form class="form-sample" action="<?= base_url('admin/product/check_add_product') ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Product</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Product Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="product_name" />
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
                                                <input type="number" placeholder="Product Price" class="form-control" name="product_price" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Quantity</label>
                                            <div class="col-sm-9">
                                                <input type="number" placeholder="Product Quantity" class="form-control" name="quantity" />
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
                                                        <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?>
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
                                                        <input style="margin-right: 10px;" type="radio" name="status" value="1"> Active
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-5">
                                                <div class="form-check mt-0">
                                                    <label class="col-form-label">
                                                        <input style="margin-right: 10px;" type="radio" name="status" value="0"> In Active
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
                                                        <option value="<?= $brand['brand_id'] ?>"><?= $brand['brand_name'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Featured Products</label>
                                            <div class="col-sm-4">
                                                <div class="form-check mt-0">
                                                    <label class="col-form-label">
                                                        <input style="margin-right: 10px;" type="radio" name="feature_product" value="0"> Active
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-check mt-0">
                                                    <label class="col-form-label">
                                                        <input style="margin-right: 10px;" type="radio" name="feature_product" value="1"> In Active
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
                                        <input type="text" class="form-control file-upload-info" id="fileInfo" disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button" id="uploadButton">Upload</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Product Description</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="product_desc"></textarea>
                                            <script>
                                                CKEDITOR.replace('product_desc');
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Add Product</button>
                                    </div>
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