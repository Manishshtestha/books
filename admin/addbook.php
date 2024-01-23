<?php
require_once "header.php";

$catSql = "SELECT * FROM category";
$catResult = mysqli_query($conn, $catSql);
?>
<div>
    <h1>Add Books</h1>
</div>
<div class="col-md-12">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" id="category" required class="form-control">
                <option value="">Select Category</option>
                <?php foreach ($catResult as $cat): ?>
                    <option value="<?= $cat['cid'] ?>">
                        <?= $cat["cat_name"] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required class="form-control">
        </div>
        <div class="form-group mb-2">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" required class="form-control">
        </div>
        <div class="form-group mb-2">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" required class="form-control">
        </div>
        <div class="form-group mb-2">
            <label for="page_number">Page Number</label>
            <input type="number" name="page_number" id="page_number" required class="form-control">
        </div>
        <div class="form-group mb-2">
            <button class="btn btn-success">Add Book</button>
    </form>
</div>