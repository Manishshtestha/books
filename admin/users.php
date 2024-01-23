<?php
require_once "header.php";

$sql = "SELECT * FROM users";
$userQuery = mysqli_query($conn, $sql);
?>

<div class="row">
    <div class="col-md-12">
        <h1>Users List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Users Name</th>
                    <th>Users Email</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach ($userQuery as $key) { ?>
                <tbody>
                    <tr>
                        <td><?= $key['id'] ?></td>
                        <td><?= $key['name'] ?></td>
                        <td><?= $key['email'] ?></td>
                        <td><img src="../uploads/<?= $key['image'] ?>" alt="" width="50"></td>
                        <td>
                            <a href="update.php?id=<?php echo $key["id"]; ?>"><button class="btn btn-success">Edit</button></a>
                            <a href="category.php?id=<?php echo $key["id"]; ?>"><button class="btn btn-danger">Delete</button></a>
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