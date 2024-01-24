<?php

require_once "header.php";

require_once "connection.php";


$sqlCategory = "SELECT * FROM category";
$catResult = mysqli_query($conn, $sqlCategory);

$sqlBooks = "SELECT * FROM books";
$result = mysqli_query($conn, $sqlBooks);

?>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://picsum.photos/seed/picsum/200/300" style="height: 400px" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://picsum.photos/200/300?grayscale" style="height: 400px" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://picsum.photos/id/237/200/300" style="height: 400px" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1>Books List</h1>
    </div>
  </div>
  <div class="row">
    <?php foreach ($result as $book): ?>
      <div class="col-md-3">
        <div class="card" >
          <img src="uploads/<?= $book['image'] ?>" style="width:100%; height:35vh;" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">
              <?= $book['title'] ?>
            </h5>
            <p>Price:
              <?= $book['price'] ?>
            </p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</div>

<?php require_once "footer.php"; ?>