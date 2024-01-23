<?php
require_once "header.php";

if(!empty($_POST)){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    $user=mysqli_num_rows($result);
    if($user>0){
        $user=mysqli_fetch_assoc($result);
        $_SESSION['user']=$user;
        $_SESSION['is_login']='true';
        header("Location: admin/index.php");
    }else{
        $_SESSION['error']="Email or Password Incorrect";
    }
}

?>

<div class="row">
    <div class="col-md-12">
        <h1>Login</h1>
    </div>
    <?php if(isset($_SESSION['error'])) :?>
        <div class="alert alert-danger">
                <?php echo $_SESSION['error'] ?>
            </div>
    <?php 
        unset($_SESSION['error']);
        endif;
    ?>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="" method="post">
            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" required id="email" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="password">Password</label>
                <input type="password" name="password" required id="password" class="form-control">
            </div>
            <div class="form-group mb-2">
                <button class="btn btn-success">Login</button>
            </div>
        </form>
    </div>
</div>
