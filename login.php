<?php
require_once "header.php";
require_once "connection.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $row;
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid email or password";
    }
}

?>

<div class="row">
    <div class="col-md-12 mt-4 mb-4">
        <h1>Login</h1>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <button type="submit" class="btn btn-success">Login</button>
            </div>
        </form>
    </div>
</div>