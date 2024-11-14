<?php
session_start();

// Redirect to the login page if user is not logged in as admin
if (!isset($_SESSION['staffId'])) {
    header("location:../home-pages/admin-login.php");
    exit();
}

// Include the database configuration file
include('../../database/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/staff-management.css">

    <title>Customer Reviews Management - PC CARE Solutions</title>
</head>

<body>
    <!-- Navigation bar start -->
    <?php include('../../includes/admin-navigation-bar.php'); ?>
    <!-- Navigation bar end -->

    <!-- Back button -->
    <div class="back-button-container">
        <a href="../home-pages/admin-home.php" class="back-button">Back</a>
    </div>

    <!-- Customer reviews section start -->
    <h2 class="text-center">Customer Reviews</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Review ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Customer Name</th>
                <th>Rating</th>
                <th>Review Text</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $get_reviews = "
                SELECT r.id AS review_id, r.rating, r.review_text, r.created_at,
                       i.item_id, i.item_name,
                       c.cust_username
                FROM product_ratings r
                JOIN item i ON r.fk_item_id = i.item_id
                JOIN customer c ON r.fk_cust_id = c.cust_id
                ORDER BY r.created_at DESC
            ";
            $result = mysqli_query($con, $get_reviews);
            $row_count = mysqli_num_rows($result);

            if ($row_count == 0) {
                echo "<tr><td colspan='8' class='text-center bg-danger text-white'>No reviews yet</td></tr>";
            } else {
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $review_id = $row_data['review_id'];
                    $item_id = $row_data['item_id'];
                    $item_name = $row_data['item_name'];
                    $customer_name = $row_data['cust_username'];
                    $rating = $row_data['rating'];
                    $review_text = $row_data['review_text'];
                    $created_at = date('F j, Y', strtotime($row_data['created_at']));

                    // Display rating as stars
                    $rating_stars = str_repeat("★", $rating) . str_repeat("☆", 5 - $rating);

                    echo "<tr>
                        <td>$review_id</td>
                        <td>$item_id</td>
                        <td>$item_name</td>
                        <td>$customer_name</td>
                        <td>$rating_stars</td>
                        <td>$review_text</td>
                        <td>$created_at</td>
                        <td>
                            <form method='post' action=''>
                                <input type='hidden' name='review_id' value='$review_id'>
                                <button type='submit' name='deleteReview' class='btn btn-danger btn-sm'>Delete</button>
                            </form>
                        </td>
                    </tr>";
                }
            }

            // Handle review deletion
            if (isset($_POST['deleteReview'])) {
                $review_id = $_POST['review_id'];
                mysqli_query($con, "DELETE FROM product_ratings WHERE id = $review_id");
                echo "<meta http-equiv='refresh' content='0'>"; // Refresh the page to update the table
            }
            ?>
        </tbody>
    </table>
    <!-- Customer reviews section end -->

    <!-- Footer section start -->
    <div class="fixed-bottom">
        <footer class="bettle">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <p class="copyright-text">Copyright &copy; 2024 PC CARE Solutions | Developed by -
                            <a href="#">Data Pirates</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Footer section end -->

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
// Close the database connection
mysqli_close($con);
?>
