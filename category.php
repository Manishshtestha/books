<?php
require_once "header.php";

if(!empty($_POST)){
    $name=$_POST["cat_name"];
    $sql="INSERT INTO category (cat_name) VALUES ('$name')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "Data inserted successfully";
    }else{
        echo "Error inserting data";
    }
}

$select="SELECT * FROM category";
$result=mysqli_query($conn,$select);


?>

<div class="row">
    <div class="col-md-12 mt-4">
        <h1>Add Category</h1>   
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label for="name">Category Name</label>
                <input type="text" name="cat_name" required id="name" class="form-control">
            </div>
            <div class="form-group mb-2">
                <button class="btn btn-success">Add Category</button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h1>Category List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach($result as $key){ ?>
            <tbody>
                <tr>
                    <td><?= $key['cid']?></td>
                    <td><?= $key['cat_name']?></td>
                    <td>
                        <a href="update.php?id=<?php echo $key["cid"];?>"><button class="btn btn-success">Edit</button></a>
                        <a href="category.php?id=<?php echo $key["cid"];?>"><button class="btn btn-danger">Delete</button></a>
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