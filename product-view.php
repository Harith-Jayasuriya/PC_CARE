<?php
session_start();
include('database/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Home PC - CARE Solutions</title>
    <style>
        .star-rating { direction: ltr; font-size: 1.5em; display: inline-flex; }
        .star-rating input { display: none; }
        .star-rating label { color: #ccc; cursor: pointer; }
        .star-rating label:hover, .star-rating label:hover ~ label, .star-rating input:checked ~ label {
            color: #ffc107;
        }
        .review-section { background-color: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 15px; }
        .static-star { color: #ffc107; }
        .empty-star { color: #ccc; }
    </style>
</head>
<body>
    <?php include('includes/navigation-bar.php'); ?>

    <div class="container my-5 px-0 mx-auto">
        <div class="row d-flex mx-auto bg-dark-subtle rounded-4">
            <?php
            if (isset($_GET['productId'])) {
                $itemId = $_GET['productId'];
                $itemResult = mysqli_query($con, "SELECT * FROM item WHERE item_id = $itemId");
                $itemRow = mysqli_fetch_assoc($itemResult);
                $item_image1 = $itemRow['item_image1'];
                $item_image2 = $itemRow['item_image2'];
                $item_discount = (float)$itemRow['item_discount'];
                $item_sell_price = (float)$itemRow['item_sell_price'];
                $item_stock_qty = $itemRow['item_stock_qty'];
                $discountedPrice = $item_sell_price * (100 - $item_discount) / 100;
                $displayNoneForDiscount = ($item_discount == 0) ? 'd-none' : '';
                $availability = ($item_stock_qty == '0') ? 'Out of Stock' : 'In Stock';
                $availabilityColor = ($item_stock_qty == '0') ? 'text-danger' : 'text-success';
                $displayNoneForAvailability = ($item_stock_qty == '0') ? 'd-none' : '';
                $averageRatingResult = mysqli_query($con, "SELECT AVG(rating) AS avg_rating FROM product_ratings WHERE fk_item_id = $itemId");
                $averageRatingRow = mysqli_fetch_assoc($averageRatingResult);
                $averageRating = round($averageRatingRow['avg_rating'], 1);
            ?>
                <div class="col-md-6">
                    <div class="py-3 px-2 text-center">
                        <img class="object-fit-contain" id="mainImage" src="images/products/<?php echo $item_image1; ?>" width="100%" height="400" />
                        <div class="pt-2">
                            <img class="object-fit-contain" onclick="change_image(this)" src="images/products/<?php echo $item_image1; ?>" height="50">
                            <img class="object-fit-contain" onclick="change_image(this)" src="images/products/<?php echo $item_image2; ?>" height="50">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 p-3 bg-body-secondary rounded-4">
                    <h5><?php echo $itemRow['item_name']; ?></h5>
                    <h5 class='text-body-secondary'><?php echo $itemRow['item_brand']; ?></h5>
                    <h5 class='<?php echo $displayNoneForDiscount; ?> text-decoration-line-through text-body-tertiary'>Rs. <?php echo number_format($item_sell_price, 2); ?><span class="badge bg-success ms-2">-<?php echo $item_discount; ?>%</span></h5>
                    <h5 class='fw-bold'>Rs. <?php echo number_format($discountedPrice, 2); ?></h5>
                    <h5 class='<?php echo $availabilityColor; ?> fw-bold'><?php echo $availability; ?></h5>
                    <form action="#" method="post">
                    </form>
                    <p class="mt-3 text-black bg-body-tertiary rounded-3"><?php echo $itemRow['item_description']; ?></p>
                </div>
            <?php } ?>
        </div>

        <div class="rating-container">
    <?php
    if (isset($_SESSION['custId'])) {
        $custId = $_SESSION['custId'];
        $existingReview = mysqli_query($con, "SELECT * FROM product_ratings WHERE fk_item_id = $itemId AND fk_cust_id = $custId");

        if (isset($_POST['submitRating']) && isset($_POST['reviewText'])) {
            $rating = $_POST['rating'];
            $reviewText = mysqli_real_escape_string($con, $_POST['reviewText']);
            if (mysqli_num_rows($existingReview) == 0) {
                mysqli_query($con, "INSERT INTO product_ratings (fk_item_id, fk_cust_id, rating, review_text) VALUES ('$itemId', '$custId', '$rating', '$reviewText')");
            } else {
                mysqli_query($con, "UPDATE product_ratings SET rating = '$rating', review_text = '$reviewText' WHERE fk_item_id = $itemId AND fk_cust_id = $custId");
            }
        }

        if (isset($_POST['deleteReview'])) {
            mysqli_query($con, "DELETE FROM product_ratings WHERE fk_item_id = $itemId AND fk_cust_id = $custId");
        }

        if (mysqli_num_rows($existingReview) == 0) {
    ?>
        <form action="" method="post" class="mt-4">
            <h5 class="mb-3">Add Your Rating</h5>
            <div class="star-rating">
                <input type="radio" name="rating" value="5" id="5"><label for="5">&#9733;</label>
                <input type="radio" name="rating" value="4" id="4"><label for="4">&#9733;</label>
                <input type="radio" name="rating" value="3" id="3"><label for="3">&#9733;</label>
                <input type="radio" name="rating" value="2" id="2"><label for="2">&#9733;</label>
                <input type="radio" name="rating" value="1" id="1"><label for="1">&#9733;</label>
            </div>
            <textarea name="reviewText" class="form-control mb-2" rows="3" placeholder="Write your review..."></textarea>
            <button type="submit" name="submitRating" class="btn btn-primary">Submit</button>
        </form>
    <?php
        } else {
            $existingReviewRow = mysqli_fetch_assoc($existingReview);
    ?>
        <form action="" method="post" class="mt-4">
            <h5 class="mb-3">Edit Your Rating</h5>
            <div class="star-rating">
                <?php for ($i = 5; $i >= 1; $i--): ?>
                    <input type="radio" name="rating" value="<?php echo $i; ?>" id="<?php echo $i; ?>" <?php echo ($existingReviewRow['rating'] == $i) ? 'checked' : ''; ?>>
                    <label for="<?php echo $i; ?>">&#9733;</label>
                <?php endfor; ?>
            </div>
            <textarea name="reviewText" class="form-control mb-2" rows="3"><?php echo $existingReviewRow['review_text']; ?></textarea>
            <button type="submit" name="submitRating" class="btn btn-primary">Update</button>
            <button type="submit" name="deleteReview" class="btn btn-danger">Delete</button>
        </form>
    <?php
        }
    } else {
        echo '<p>Please <a href="login.php">login</a> to add a review.</p>';
    }

    $reviewResult = mysqli_query($con, "
    SELECT r.rating, r.review_text, r.created_at, c.cust_username AS username, c.cust_id
    FROM product_ratings r
    JOIN customer c ON r.fk_cust_id = c.cust_id
    WHERE r.fk_item_id = $itemId
    ORDER BY r.created_at DESC
    ");

    if (mysqli_num_rows($reviewResult) > 0) {
        echo '<h5 class="mt-4">Customer Reviews</h5>';
        $averageRatingResult = mysqli_query($con, "SELECT AVG(rating) AS avg_rating FROM product_ratings WHERE fk_item_id = $itemId");
        $averageRatingRow = mysqli_fetch_assoc($averageRatingResult);
        $averageRating = round($averageRatingRow['avg_rating'], 1);

        echo '<div class="average

-rating mb-3">';
        echo '<div class="star-rating">';
        for ($i = 1; $i <= 5; $i++) {
            echo $i <= $averageRating ? '<span class="static-star">&#9733;</span>' : '<span class="empty-star">&#9733;</span>';
        }
        echo '</div>';
        echo '<p>Average Rating: ' . ($averageRating ? $averageRating : 'No ratings yet') . ' / 5</p>';
        echo '</div>';

        while ($reviewRow = mysqli_fetch_assoc($reviewResult)) {
            echo '<div class="review-section">';
            echo '<p><strong>' . $reviewRow['username'] . '</strong> - ' . date('F j, Y', strtotime($reviewRow['created_at'])) . '</p>';
            echo '<div class="star-rating">';
            for ($i = 1; $i <= 5; $i++) {
                echo $i <= $reviewRow['rating'] ? '<span class="static-star">&#9733;</span>' : '<span class="empty-star">&#9733;</span>';
            }
            echo '</div>';
            echo '<p>' . $reviewRow['review_text'] . '</p>';
            if (isset($_SESSION['custId']) && $_SESSION['custId'] == $reviewRow['cust_id']) {
                echo '<form action="" method="post">';
                echo '<button type="submit" name="editReview" class="btn btn-warning btn-sm me-2">Edit</button>';
                echo '<button type="submit" name="deleteReview" class="btn btn-danger btn-sm">Delete</button>';
                echo '</form>';
            }
            echo '</div>';
        }
    } else {
        echo '<p>No reviews yet.</p>';
    }
    ?>
</div>


    </div>

    <?php include('includes/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function change_image(image) {
            document.getElementById("mainImage").src = image.src;
        }
    </script>
</body>
</html>
```