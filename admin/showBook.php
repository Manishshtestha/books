<?php
require_once "header.php";

$sql="SELECT users.id,users.name,category.*,books.* FROM books
JOIN users ON users.id=books.author_id
JOIN category ON category.cid=books.category_id";
$bookQuery=mysqli_query($conn,$sql);

if(!empty($_GET['bid'])){
    $id=$_GET['bid'];
    $sql="DELETE FROM books WHERE bid='$id'";
    $result=mysqli_query($conn,$sql);
}
?>

<div class="row">
    <div class="col-md-12">
        <h1>Books List</h1>
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
                    <th>Cover</th>
                    <th>No. of Page</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach($bookQuery as $key=>$book){ ?>
            <tbody>
                <tr>
                    <td><?=$book['bid']?></td>
                    <td><?=$book['name']?></td>
                    <td><?=$book['cat_name']?></td>
                    <td><?=$book['title']?></td>
                    <td><?=$book['price']?></td>
                    <td><img src="uploads/<?=$book['image']?>" alt="" width="50"></td>
                    <td><?=$book['page_number']?></td>
                    <td>
                        <a href="" class="btn btn-success">Edit</a>
                        <a href="showBook.php?bid=<?php echo $book["bid"];?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
</div>