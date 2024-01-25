<?php
require_once "header.php";

if (!empty($_GET['bid'])) {
    $id = $_GET['bid'];
    $sql = "SELECT * FROM books WHERE bid='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && $book = mysqli_fetch_assoc($result)) {

        $catSql = "SELECT * FROM category";
        $catResult = mysqli_query($conn, $catSql);

        if ($catResult) {
            ?>
            <div>
                <h1>Edit Book</h1>
            </div>
            <div class="col-md-12">
                <!-- Action khali xa  -->
                <form action="" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="bid" value="<?= $book['bid'] ?>">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" required class="form-control">

                            <?php foreach ($catResult as $cat): ?>
                                <option value="<?= $cat['cid'] ?>" <?= ($cat['cid'] == $book['category_id']) ? 'selected' : '' ?>>
                                    <?= $cat["cat_name"] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="<?= $book['title'] ?>" required class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" value="<?= $book['price'] ?>" required class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <img src="../uploads/<?= $book['image'] ?>" alt="Current Image" width="50">
                    </div>
                    <div class="form-group mb-2">
                        <label for="page_number">Page Number</label>
                        <input type="number" name="page_number" id="page_number" value="<?= $book['page_number'] ?>" required
                            class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit" class="btn btn-success">Update Book</button>
                    </div>
                </form>
            </div>
            <?php
        } else {
            echo "No Categories Found " . mysqli_error($conn);
        }
    } else {
        echo "Book not found!";
    }
}
?>