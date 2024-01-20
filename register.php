<?php
require_once "header.php";
require_once "connection.php";
if(!empty($_POST)){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $image="";
    if(!empty($_FILES['image']['name'])){
        $imageName=$_FILES['image']['name'];
        $imageTmpName=$_FILES['image']['tmp_name'];
        if(move_uploaded_file($imageTmpName,"uploads/".$imageName)){
            $image .="uploads/".$imageName;
        }else{
            echo"Error in uploading image";
        }
    }
    
    $sql="INSERT INTO users(name,email,password,image)VALUES('$name','$email','$password','$image')";
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success']="User registered successfully";

    }else{
        echo "Error".$sql."<br>".mysqli_error($conn);
    }

}
?>
<div class="row">
    <div class="col-md-12" mt-4 mb-4>
        <h1>Register</h1>
        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success']; ?>
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
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="image">profile picture</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="name">Register</label>
                <button class="btn btn-success">Register</button>
            </div>
        </form>
    </div>
</div>