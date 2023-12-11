<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">
    <style>
        .admin_image {
            width: 100px;
            object-fit: contain;
        }
    </style>
    <title>Admin Dashboard</title>
</head>

<body>

    <body>
        <!-- Navigation bar start -->
        <nav class="navbar navbar-expand-lg bg-body-secondary  sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand ms-5 me-auto " href="index.html">
                    <img src="../Images/logo.svg" alt="logo" class="logo ">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right item start -->
                    <ul class="navbar-nav ms-auto ">

                        <li class="nav-item">
                            <a class="nav-link" href="#"><img src="../Icons/profile-line.svg" alt=""
                                    style="width: 32px;"></a>
                        </li>
                    </ul>
                    <!-- Right item end -->
                </div>
            </div>
        </nav>
        <!-- Navigation bar end -->
        <!-- Manage Details section start -->
        <div class="bg-body-tertiary">
            <h3 class="text-center p-2">Manage Category & Item Details</h3>
        </div>
        <!-- Manage Details section end -->
        <!-- Category & Item Details section start -->
        <div class="row">
            <div class="col-md-12 bg-body-tertiary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="images/user.png" alt="" class="admin_image"></a>
                    <p class="text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-2"><a href="category_&_item_management.php?create_category" class="nav-link text-light bg-info my-1">Create Category</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Category</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Create Item</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Item</a></button>
                </div>
            </div>
        </div>
        <!-- Category & Item Details section end -->
        <!-- Create Category section start -->
        <div class="container my-5">
            <?php
        if(isset($_GET['create_category'])){
            include('create_category.php');
        }
        ?>
        </div>
        <!-- Create Category section end -->
 
        <!--Bootstrap JS link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    </body>

</html>