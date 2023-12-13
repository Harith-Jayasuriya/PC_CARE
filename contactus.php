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
    <title>Contact Us-Optimal Nutrition Hub</title>
</head>

<body>
    <!-- Navigation bar start -->
    <nav class="navbar navbar-expand-lg bg-body-secondary  sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-5 me-auto " href="index.php">
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

    <div class="container row my-5 mx-auto ">
        <!-- Conatct Us section start -->
        <div class="col-md-6 mx-auto">
            <div class="text-center bg-body-tertiary p-3 ">
                <form>
                    <h3 class="">Conatct Us</h3>
                    <h3><b></b></h3>
                    <p>&nbsp</p>
                    <h5><b>Location</b></h5>
                    <p>No 58, Galle Road, Colombo 03<br /> </p>
                    <p>&nbsp</p>
                    <h5><b>Get in touch</b></h5>
                    <p>For Product Advice : 077 556 0022</p>
                    <p>For Delivery Information : 077 112 6970</p>
                    <p>Email : optimalnutritionhub@gmail.com</p>
                    <p>&nbsp</p>
                    <h5><b>Opening Hours</b></h5>
                    <p>Mon to Sat : 9.00AM to 7.00PM</p>
                    <p>Sunday : Closed</p>
                </form>
            </div>
        </div>
        <!-- Conatct Us section end -->

        <!-- Inquiry section start -->
        <div class="col-md-6 mx-auto ">
            <div class="text-center bg-body-tertiary p-3 ">
                <form>
                    <h3 class="">Send Your Inquiry</h3>
                    <div class="m-3">
                        <textarea class="form-control rounded-3" id="exampleFormControlTextarea1" rows="8" placeholder="Type Your Inquiry here"></textarea>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-outline-dark  btn-search mt-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Inquiry section end -->
    </div>

    <!-- Footer section start -->
    <?php
    include('footer.php');
    ?>
    <!-- Footer section end -->

    <!--Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>