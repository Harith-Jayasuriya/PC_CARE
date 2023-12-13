<?php
// Include the database configuration file
include('database/config.php');

$categorySelectQuery = "SELECT * FROM category ORDER BY category_name;";
// Execute the query and store the result
$result = mysqli_query($con, $categorySelectQuery);
// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/footer.css">
  <title>Home-Optimal Nutrition Hub</title>
</head>

<body>
  <!-- Navigation bar start -->
  <nav class="navbar navbar-expand-lg bg-body-secondary  sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand ms-5 me-auto " href="#">
        <img src="Images/logo.svg" alt="logo" class="logo ">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left item start -->
        <ul class="navbar-nav me-auto ">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Product</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu">
              <?php
              // Fetch Category names from database
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<li><a class='dropdown-item' href='#'>{$row['category_name']}</a></li>";
                }
              } else {
                // display Not Available Category
                echo "<li><a class='dropdown-item'>Not Available Category</a></li>";
              }
              ?>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="FAQ.php">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.php">Contact us</a>
          </li>
        </ul>
        <!-- Left item end -->
        <!-- Right item start -->
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
            <a class="nav-link" href="sign-up.php">Sign up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><img src="Icons/cart-2-line.svg" alt="" style="width: 32px;"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><img src="Icons/profile-line.svg" alt="" style="width: 32px;"></a>
          </li>
        </ul>
        <!-- Right item end -->
      </div>
    </div>
  </nav>
  <!-- Navigation bar end -->

  <!-- Search bar start -->
  <div class="container col-6">
    <form class="d-flex my-4" role="search">
      <input class="form-control me-2 search-bar fw-semibold py-1 " type="search" placeholder="Search supplement products here" aria-label="Search">
      <button class="btn btn-outline-dark    fw-semibold btn-search py-1" type="submit">Search</button>
    </form>
  </div>
  <!-- Search bar end -->

  <!-- Top Image start -->
  <div class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active ">
        <img src="Images/home.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
  </div>
  <!-- Top Image end -->

  <!-- Latest product section start -->
  <div class="container py-5 mt-5">
    <div class="col-lg-6 m-auto text-center">
      <h1>Latest Products</h1>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-4 col-lg-3 text-center mb-4">
        <div class="card border-0 bg-light ">
          <img src="Images/products/GAT NITRAFLEX 30 SERVING.jpg" class="card-img-top p-2" alt="...">
          <div class="card-body p-0 pb-2">
            <h6>GAT NITRAFLEX 30 SERVING</h6>
            <h6>Rs. 7500</h6>
            <h6 class="text-success fw-bold ">In Stock</h6>
            <a href="#" class="btn btn-outline-warning btn-view btn-sm">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 text-center mb-4">
        <div class="card border-0 bg-light ">
          <img src="Images/products/NUTREX CREATINE DRIVE 300G.jpg" class="card-img-top p-2 " alt="...">
          <div class="card-body p-0 pb-2">
            <h6>NUTREX CREATINE DRIVE</h6>
            <h6>Rs. 7500</h6>
            <h6 class="text-success fw-bold ">In Stock</h6>
            <a href="#" class="btn btn-outline-warning btn-view btn-sm">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 text-center mb-4">
        <div class="card border-0  bg-light">
          <img src="Images/products/USN VIBRANCE COLLAGEN PEPTIDES 30 SERVINGS.jpg" class="card-img-top p-2 " alt="...">
          <div class="card-body p-0 pb-2">
            <h6>USN VIBRANCE COLLAGEN</h6>
            <h6>Rs. 11000</h6>
            <h6 class="text-success fw-bold ">In Stock</h6>
            <a href="#" class="btn btn-outline-warning btn-view btn-sm">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 text-center mb-4">
        <div class="card border-0  bg-light">
          <img src="Images/products/ANIMAL PAK 44 PACKS.jpg" class="card-img-top p-2 " alt="...">
          <div class="card-body p-0 pb-2">
            <h6>ANIMAL PAK 44 PACKS</h6>
            <h6>Rs. 8500</h6>
            <h6 class="text-success fw-bold ">In Stock</h6>
            <a href="#" class="btn btn-outline-warning btn-view btn-sm">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 text-center mb-4">
        <div class="card border-0  bg-light">
          <img src="Images/products/MUSCLETECH MASS-TECH EXTREME 2000 12 LBS.jpg" class="card-img-top p-2 " alt="...">
          <div class="card-body p-0 pb-2">
            <h6>MUSCLETECH MASS-TECH</h6>
            <h6>Rs. 28000</h6>
            <h6 class="text-success fw-bold ">In Stock</h6>
            <a href="#" class="btn btn-outline-warning btn-view btn-sm">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 text-center mb-4">
        <div class="card border-0  bg-light">
          <img src="Images/products/CARNIVOR MASS 10 LBS.jpg" class="card-img-top p-2 " alt="...">
          <div class="card-body p-0 pb-2">
            <h6>CARNIVOR MASS 10 LBS</h6>
            <h6>Rs. 27500</h6>
            <h6 class="text-success fw-bold ">In Stock</h6>
            <a href="#" class="btn btn-outline-warning btn-view btn-sm">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 text-center mb-4">
        <div class="card border-0  bg-light">
          <img src="Images/products/MUSCLETECH MASS-TECH EXTREME 2000 6 LBS.jpg" class="card-img-top p-2 " alt="...">
          <div class="card-body p-0 pb-2">
            <h6>MUSCLETECH MASS-TECH</h6>
            <h6>Rs. 18500</h6>
            <h6 class="text-success fw-bold ">In Stock</h6>
            <a href="#" class="btn btn-outline-warning btn-view btn-sm">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 text-center mb-4">
        <div class="card border-0  bg-light">
          <img src="Images/products/MASS INFUSION 12 LBS.jpg" class="card-img-top p-2 " alt="...">
          <div class="card-body p-0 pb-2">
            <h6>MASS INFUSION 12 LBS</h6>
            <h6>Rs. 22500</h6>
            <h6 class="text-success fw-bold ">In Stock</h6>
            <a href="#" class="btn btn-outline-warning btn-view btn-sm">View</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Latest product section end -->

  <!-- Most demanded product section start -->
  <div class="container py-5">
    <div class="col-lg-6 m-auto text-center">
      <h1>Products with High Demand</h1>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-4 col-lg-3 text-center mb-4">
        <div class="card border-0  bg-light">
          <img src="Images/products/CARNIVOR MASS 6 LBS.jpg" class="card-img-top p-2 " alt="...">
          <div class="card-body p-0 pb-2">
            <h6>CARNIVOR MASS 6 LBS</h6>
            <h6>Rs. 18500</h6>
            <h6 class="text-success fw-bold ">In Stock</h6>
            <a href="#" class="btn btn-outline-warning btn-view btn-sm">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 text-center mb-4">
        <div class="card border-0  bg-light">
          <img src="Images/products/KING MASS XL 15 LBS.jpg" class="card-img-top p-2 " alt="...">
          <div class="card-body p-0 pb-2">
            <h6>KING MASS XL 15 LBS</h6>
            <h6>Rs. 29000</h6>
            <h6 class="text-danger fw-bold ">Out of Stock</h6>
            <a href="#" class="btn btn-outline-warning btn-view btn-sm">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 text-center mb-4">
        <div class="card border-0  bg-light">
          <img src="Images/products/DYMATIZE ISO 100 5 LBS.jpg" class="card-img-top p-2 " alt="...">
          <div class="card-body p-0 pb-2">
            <h6>DYMATIZE ISO 100 5 LBS</h6>
            <h6>Rs. 34500</h6>
            <h6 class="text-success fw-bold ">In Stock</h6>
            <a href="#" class="btn btn-outline-warning btn-view btn-sm">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 text-center mb-4">
        <div class="card border-0  bg-light">
          <img src="Images/products/NITROTECH PERFORMANCE SERIES 4 LBS.jpg" class="card-img-top p-2 " alt="...">
          <div class="card-body p-0 pb-2">
            <h6>NITROTECH PERFORMANCE SERIES</h6>
            <h6>Rs. 23000</h6>
            <h6 class="text-success fw-bold ">In Stock</h6>
            <a href="#" class="btn btn-outline-warning btn-view btn-sm">View</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 text-center mb-4">
        <div class="card border-0  bg-light">
          <img src="Images/products/BPI ISO HD 5 LBS.jpg" class="card-img-top p-2 " alt="...">
          <div class="card-body p-0 pb-2">
            <h6>BPI ISO HD 5 LBS</h6>
            <h6>Rs. 26500</h6>
            <h6 class="text-danger fw-bold ">Out of Stock</h6>
            <a href="#" class="btn btn-outline-warning btn-view btn-sm">View</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Most demanded product section end -->

  <!-- Footer section start -->
  <?php
  include('footer.html');
  ?>
  <!-- Footer section end -->

  <!-- Bootstrap JS link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>