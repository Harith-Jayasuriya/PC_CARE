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

  <title>About Us PC - CARE solutions</title>
</head>

<body>

  <body>
    <!-- Navigation bar start -->
    <?php
    include('includes/navigation-bar.php');
    ?>
    <!-- Navigation bar end -->

    <!-- About Us section start -->
    <div class="col-10 mx-auto mt-5 bg-body-tertiary p-5 ">
      <form>
        <h3><b>About Us</b></h3>
        <p>Step into a world of cutting-edge technology and unparalleled service at PC - CARE Solutions,
      your premier destination for computer hardware and accessories. As Sri Lanka's leading distributor 
      of computer parts, we pride ourselves on offering a curated selection of products designed to meet
        your every computing need. Discover a transformative shopping experience where your technology goals 
        become achievable realities.


</p>
        <h5><b>Our Journey</b></h5>
        <p>Our journey is one of steadfast commitment and an unyielding pursuit of excellence.
           We entered the computer and computer parts market with a bold vision to redefine industry standards. 
           Beyond just offering products, we dedicated ourselves to setting a new benchmark by sourcing directly 
           from manufacturers, guaranteeing unmatched quality and authenticity in every item we offer. This dedication 
           forms the core of our motto at PC - CARE Solutions: "Do it right or not do it at all!!!"
</p>
        <h5><b>Our Mission</b></h5>
        <p>Our commitment has catapulted us to the forefront of Sri Lanka's computer and computer parts market, 
          establishing PC - CARE Solutions as the unrivaled leader in Genuine Computer Hardware and Accessories. 
          However, our mission extends beyond mere product sales. We believe that true success stems from seamlessly
           blending top-tier quality with exceptional customer service. From personalized consultations to thorough 
           post-purchase support, our team of experts is devoted to assisting you on your path to peak performance 
           and technological excellence.</p>
        <p>Choosing PC - CARE Solutions means choosing certainty. Every computer part and accessory undergoes rigorous
           quality control and origin verification to ensure authenticity and performance. We don't just sell products;
            we provide assurance. Rest assured that every purchase is backed by our steadfast commitment to seamless
             verification with the original manufacturers. In a crowded market, we shine as a beacon of trust and excellence, 
             your reliable partner in achieving optimal computing solutions.</p>
        <p>Join us on this transformative journey. Let PC - CARE Solutions be your catalyst, 
          your navigator, and your source of inspiration. Unleash your potential and discover 
          the impact that genuine, high-quality computer parts and accessories can make on your
           computing experience.</p>
      </form>
    </div>
    <!-- About Us section end -->

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