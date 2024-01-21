<?php

    require_once "header.php";
    require_once "./connection.php";

?>

<div class="row">
    <div class="col-md-12 mt-4 mb-4">
        <h3>Register</h3>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label for="image">Profile Picture:</label>
                <input type="file" name="image" name="image" class="form-control">
            </div>
            <div class="form-group mb-2">
                <button class="btn btn-success" name="register">Register</button>
            </div>
        </form>
    </div>
</div>


<?php

    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $image = '';
        if(!empty($_FILES['image']['name'])){
            $imageName = $_FILES['image']['name'];
            $imageTmpName = $_FILES['image']['tmp_name'];
            if(move_uploaded_file($imageTmpName, "uploads/".$imageName)){
                $image .= "uploads/".$imageName;
            }else{
                echo "Error uploading image";
            }
        }

        $sql = "INSERT INTO users (name, email, password, image) VALUES ('$name', '$email', '$password', '$image')";
        $res = mysqli_query($conn, $sql);

        if($res){
            echo "User registered successfully";
        }else{
            echo "Error" . $sql . "<br>" . mysqli_errno($conn);
        }
        
    }

?>