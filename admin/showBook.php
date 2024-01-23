<?php
require_once "header.php";

$sql = "SELECT * FROM books";
$bookQuery = mysqli_query($conn, $sql);

?>
<div class="row">
    <div class="col-md-12">
        <h1>Books List</h1>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Page Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach ($bookQuery as $key => $book) { ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $book['bid'] ?>
                        </td>
                        <td>
                            <?= $book['author_id'] ?>
                        </td>
                        <td>
                            <?= $book['category_id'] ?>
                        <td>
                            <?= $book['title'] ?>
                        </td>
                        <td>
                            <?= $book['price'] ?>
                        </td>
                        <td><img src="../uploads/<?= $book['image'] ?>" alt="" width="50"></td>
                        <td>
                            <?= $book['page_number'] ?>
                        </td>
                        <td>
                            <a href="" class="btn btn-success">Edit</a>
                            <a href="showBook.php?id=<?php echo $book["bid"]; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>

<?php
require_once "footer.php";
?>