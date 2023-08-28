<!-- Include Header -->
<?= $this->include('admin/common_layout/topbar') ?>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- Include Sidebar-->
    <?= $this->include('admin/common_layout/sidebar.php') ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Check if there are any validation errors -->
            <?php if (session()->has('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <!-- Loop through each error message -->
                        <?php foreach (session('errors') as $error): ?>
                            <li>
                                <?= esc($error) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form class="form-sample" action="<?= base_url('admin/category/check_edit_category') ?>" method="post"
                enctype="multipart/form-data">
                <!-- For get id -->
                <input type="hidden" name="category_id" class="form-control" value="<?= $category['category_id'] ?>">
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Update category</h4>
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="category_name" class="form-control"
                                        placeholder="Enter Category name here" aria-label="Username"
                                        value="<?= $category['category_name'] ?>">

                                </div>
                                <!-- Status -->
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-4">
                                        <div class="form-check mt-0">
                                            <label class="col-form-label">
                                                <input style="margin-right: 10px;" type="radio" name="status" value="1"
                                                    <?= $category['status'] == 1 ? "checked" : "" ?>>
                                                Active
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-check mt-0">
                                            <label class="col-form-label">
                                                <input style="margin-right: 10px;" type="radio" name="status" value="0"
                                                    <?= $category['status'] == 0 ? "checked" : "" ?>>
                                                In Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title ">Add Category</h4>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" name="slug" class="form-control"
                                        value="<?= $category['slug'] ?>">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Category Image</label>
                                <input type="file" name="category_image" id="fileInput" class="file-upload-default"
                                    onchange="updateFileName()">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" id="fileInfo" disabled
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button"
                                            id="uploadButton">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Category Description</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="4"
                                            name="category_desc"><?= $category['category_desc'] ?></textarea>
                                        <script>
                                            CKEDITOR.replace('category_desc');
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Update Category</button>
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

    document.getElementById('uploadButton').addEventListener('click', function () {
        document.getElementById('fileInput').click();
    });
</script>