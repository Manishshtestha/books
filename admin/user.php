<?php
require_once "header.php";

$sql="SELECT * FROM users";
$userQuery=mysqli_query($conn,$sql);

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM users WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success']="User Deleted Successfully";
    }else{
    echo "Error Deleting data";
    }

}
?>

<div class="row">
    <div class="col-md-12">
        <h1>User List</h1>
        <?php if(isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success'] ?>
            </div>
        <?php 
            unset($_SESSION['success']);
            endif;
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach($userQuery as $key=>$user){ ?>
            <tbody>
                <tr>
                    <td><?=$user['id']?></td>
                    <td><?=$user['name']?></td>
                    <td><?=$user['email']?></td>
                    <td><img src="../uploads/<?=$user['image']?>" alt="" width="50"></td>
                    <td>
                        <a href="" class="btn btn-success">Edit</a>
                        <a href="user.php?id=<?php echo $user["id"];?>" class="btn btn-danger">Delete</a>
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