<?php
// Include the database configuration file
include('../database/config.php');
// Check if the form is submitted
if (isset($_POST['categoryAdd'])) {
    // remove spaces and sanitize
    $categoryName = filter_var(trim($_POST['categoryName']), FILTER_SANITIZE_STRING);

    // Check if the category name is empty
    if (!empty($categoryName)) {
        $categoryInsertQuery = "INSERT INTO category(category_name) VALUES('$categoryName');";
        // execute query
        if (mysqli_query($con, $categoryInsertQuery)) {
            // Display alert
            echo "<script>alert('New Category is added Successfully')</script>";
        }
    }
}
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
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/sign-up.css">

    <title>Category Add Form-Optimal Nutrition Hub</title>
</head>

<body style="background-color: lightgray;">
    <!-- Navigation bar start -->
    <?php
    include('admin-navigation-bar.php');
    ?>
    <!-- Navigation bar end -->

    <!-- Category add form section start -->
    <div class="container  row my-5 mx-auto p-5 ">
        <div class="col-md-6 mx-auto">
            <div class="wrapper">
                <form action="#" method="post" id="categoryAddForm">
                    <h2>Add Category</h2>

                    <div class="input-box">
                        <input type="text" name="categoryName" id="categoryName" placeholder="Category Name">
                    </div>
                    <button type="submit" class="btn btn-light" name="categoryAdd">Add</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Category add form section end -->

    <!-- Footer section start -->
    <div class="fixed-bottom ">
        <footer class="bettle">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <p class="copyright-text">Copyright &copy; 2023 Optimal Nutrition Hub | Devoloped by -
                            <a href="#"> BattleShip</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Footer section end -->

    <!--Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>