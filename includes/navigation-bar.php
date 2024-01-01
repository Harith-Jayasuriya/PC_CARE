<nav class="navbar navbar-expand-lg bg-body-secondary  sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand ms-5 me-auto " href="index.php">
            <img src="images/logo.svg" alt="logo" class="logo ">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left item start -->
            <ul class="navbar-nav me-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="product.php">Product</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu">
                        <?php

                        $categorySelectQuery = "SELECT * FROM category ORDER BY category_name;";
                        // Execute the query and store the result
                        $result = mysqli_query($con, $categorySelectQuery);

                        // Fetch Category from database
                        if (mysqli_num_rows($result) > 0) {
                            $textBgDark = "";
                            while ($row = mysqli_fetch_assoc($result)) {

                                // Apply background class if the category is selected
                                if (isset($_GET['categoryId'])) {
                                    if ($_GET['categoryId'] == $row['category_id']) {
                                        $textBgDark = 'text-bg-dark';
                                    } else {
                                        $textBgDark = "";   // remove background class
                                    }
                                }
                                // Display category
                                echo "<li><a class='dropdown-item $textBgDark' href='index.php?categoryId={$row['category_id']}'>{$row['category_name']}</a></li>";
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
                    <a class="nav-link position-relative " href="#"><img src="icons/cart-2-line.svg" alt="" style="width: 32px;">
                        <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            0
                        </span> -->
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="icons/profile-line.svg" alt="" style="width: 32px;"></a>
                </li>
            </ul>
            <!-- Right item end -->
        </div>
    </div>
</nav>