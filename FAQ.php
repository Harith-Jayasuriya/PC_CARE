<?php
session_start();

// Include the database configuration file
include('database/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css">

    <title>FAQ PC - CARE solutions</title>
</head>

<body>
    <!-- Navigation bar start -->
    <?php
    include('includes/navigation-bar.php');
    ?>
    <!-- Navigation bar end -->

    <!-- FAQ section start -->
    <div class="col-10 mx-auto mt-5 bg-body-tertiary p-5 ">
        <form>
            <h3><b>FAQ</b></h3>
            <p>&nbsp</p>
            <h5><b>1. What is the cost and delivery location of PC-Care Solutions?</b></h5>
            <p>PC-Care Solutions delivers only within Colombo, and the shipping cost is Rs.500.00 for deliveries inside the Colombo area.
                 Please refer to our Delivery & Shipping section for more information.</p>
            <p>&nbsp</p>
            <h5><b>2. How long does it typically take for an online order to be shipped?</b></h5>
            <p>We strive to deliver orders within 3-4 working days. Please refer to our Delivery & Shipping section for more information.</p>
            <p>&nbsp</p>
            <h5><b>3. What happens if I'm not around to accept the package?</b></h5>
            <p>Our company will call you before delivering your order. 
                If you are not available to receive the package at the specified delivery address or do 
                not respond to the given contact number, you will need to pick up your package from the PC-Care Solutions store.</p>
            <p>&nbsp</p>
            <h5><b>4. Which online payment options are accepted by you?</b></h5>
            <p>We currently accept only Cash on Delivery.</p>
            <p>&nbsp</p>
            <h5><b>5. Why is registering required in order to make an online purchase?</b></h5>
            <p>Registering with us helps speed up the ordering process for you and allows you to keep track of your orders.
                 It also assists in re-ordering as we maintain a record of your previous purchases.

</p>
        </form>
    </div>
    <!-- FAQ section end -->

    <!-- Footer section start -->
    <?php
    include('includes/footer.php');
    ?>
    <!-- Footer section end -->

    <!--Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<?php
// Close the database connection
mysqli_close($con);
?>