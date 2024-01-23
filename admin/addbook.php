<?php
require_once "header.php";

$catSql = "SELECT * FROM category";
$catResult = mysqli_query($conn, $catSql);

if (!empty($_POST)) {
    $category_id = $_POST["category_id"];
    $author_id = $loginUser['id'];
    $title = $_POST["title"];
    $price = $_POST["price"];
    $page_number = $_POST["page_number"];
    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        if (move_uploaded_file($imageTmpName, "../uploads/".$imageName)) {
            $image = $imageName;
        } else {
            echo "Error uploading image";
        }
    }
    $sql = "INSERT INTO books (category_id,title,price,image,page_number) VALUES ('$category_id','$title','$price','$image','$page_number')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['success'] = "Book Added Successfully";
    } else {
        echo "Error inserting data";
    }
} else {
    echo "Please fill the form";
}
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