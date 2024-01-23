<?php
require_once "header.php";

if(!empty($_POST)){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $image='';
    if(!empty($_FILES['image']['name'])){
        $image=$_FILES['image']['name'];
        $tmp=$_FILES['image']['tmp_name'];
        $path='uploads/';
        move_uploaded_file($tmp,$path.$image);
    }
    $sql="INSERT INTO users (name,email,password,image) VALUES ('$name','$email','$password','$image')";
    // echo $sql;
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success']="User Registered Successfully";
    }else{
        echo "Error inserting data";
    }
}

?>

<div class="row">
    <div class="col-md-12 mt-4">
        <h1>Register</h1>
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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label for="name">Name</label>
                <input type="text" name="name" required id="name" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" required id="email" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="name">Password</label>
                <input type="password" name="password" required id="password" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="image">Profile Picturefile</label>
                <input type="file" name="image" required id="image" class="form-control">
            </div>
            <div class="form-group mb-2">
                <button class="btn btn-success">Register</button>
            </div>
        </form>
    </div>
</div>



<?php
require_once "footer.php";
?>