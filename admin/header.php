<?php
session_start();
require_once "../connection.php";

if(!isset($_SESSION['user']) || $_SESSION['is_login']!=true){
    header("Location: ../login.php");
    exit();
}
$loginUser=$_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>

<div class="container">
    <div class="row mt-2 mb-4">
        <div class="col-md-4">
            <h1>Dashboard</h1>
        </div>
        <div class="col-md-8">
            <h1 class="float-end">Welcome: <?=$loginUser['name']?>
                <a href="../logout.php" class="btn btn-danger">Logout</a>
            </h1>
        </div>
        <div class="col-md-12">
            <a href="user.php">Show Users</a> &ensp;&ensp;
            <a href="">Manage Category</a> &ensp;&ensp;
            <a href="addBook.php">Add Books</a> &ensp;&ensp;
            <a href="">Show Books</a> &ensp;&ensp;
        </div>
        <div class="col-md-12">
            
      