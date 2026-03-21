<?php
include('../Database/connect.php');
include('../Functions/common_functions.php');
// Start session to access session variables
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!--Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!--Font Awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <!--CSS link-->
    <link rel="stylesheet" href="Admin.css">
    <style>
        .admin_image {
            width: 100px;
            height: 100px;
            object-fit: contain;
            display: block;
        }

        .logo {
            width: 7%;
            height: 7%;
        }

        .product_image {
            width: 100px;
            object-fit: contain;
        }

        .admin-welcome {
            color: black;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--First Child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../Images/logo.jpg" alt="S-Class Logo" class="logo">
                <nav class="navbar navbar-expand-lg ">
                    <ul class="navbar-nav ms-auto">
                        <?php
                        if (isset($_SESSION['admin_name'])) {
                            echo "<li class='nav-item'>
                                <a class='nav-link admin-welcome' href='#'>
                                    <i class='fa-solid fa-user-secret'></i>
                                    <span class='nav-text'>Welcome " . htmlspecialchars($_SESSION['admin_name']) . "</span>
                                </a>
                            </li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </nav>

        <!--Second Child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Control Panel</h3>
        </div>

        <!--Third Child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../Images/adminlogo.jpg" alt="AdminLogo" class="admin_image"></a>
                    <?php
                    if (isset($_SESSION['admin_name'])) {
                        echo "<p class='text-light text-center'>" . htmlspecialchars($_SESSION['admin_name']) . "</p>";
                    } else {
                        echo "<p class='text-light text-center'>Admin Name</p>";
                    }
                    ?>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_products.php" class="nav-link text-light bg-info my-1">Insert
                            Products</a>
                    </button><button><a href="Admin.php?view_products" class="nav-link text-light bg-info my-1">View
                            Products</a>
                    </button><button><a href="Admin.php?insert_categories"
                            class="nav-link text-light bg-info my-1">Insert Categories</a>
                    </button><button><a href="Admin.php?view_categories" class="nav-link text-light bg-info my-1">View
                            Categories</a>
                    </button><button><a href="Admin.php?insert_brands" class="nav-link text-light bg-info my-1">Insert
                            Brands</a>
                    </button><button><a href="Admin.php?view_brands" class="nav-link text-light bg-info my-1">View
                            Brands</a>
                    </button><button><a href="./Admin.php?list_orders" class="nav-link text-light bg-info my-1">All
                            Orders</a>
                    </button><button><a href="Admin.php?list_payments" class="nav-link text-light bg-info my-1">All
                            Payments</a>
                    </button><button><a href="Admin.php?list_users" class="nav-link text-light bg-info my-1">List
                            Users</a>
                    </button><button><a href="AdminLogout.php" class="nav-link text-light bg-info my-1">Logout</a>
                    </button>
                </div>
            </div>
        </div>

        <!--Fourth Child-->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_categories'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brands'])) {
                include('insert_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include('ViewProducts.php');
            }
            if (isset($_GET['edit_products'])) {
                include('EditProducts.php');
            }
            if (isset($_GET['delete_products'])) {
                include('./DeleteProduct.php');
            }
            if (isset($_GET['view_categories'])) {
                include('./ViewCategories.php');
            }
            if (isset($_GET['view_brands'])) {
                include('./ViewBrands.php');
            }
            if (isset($_GET['edit_category'])) {
                include('./EditCategory.php');
            }
            if (isset($_GET['delete_category'])) {
                include('./DeleteCategory.php');
            }
            if (isset($_GET['edit_brand'])) {
                include('./EditBrands.php');
            }
            if (isset($_GET['delete_brand'])) {
                include('./DeleteBrands.php');
            }
            if (isset($_GET['list_orders'])) {
                include('./ListOrders.php');
            }
            if (isset($_GET['list_payments'])) {
                include('./ListPayments.php');
            }
            if (isset($_GET['list_users'])) {
                include('./ListUsers.php');
            }
            ?>
        </div>

        <!--Last Child-->
        <?php
        include("../Homepage/footer.php");
        ?>

        <!--Bootstrap JS link-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
            integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1ERo0BZlK"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-3gJwYp4gU1Qn6F6kGZrKzQbM1yQbYw5vYhD3K6pRo3w=" crossorigin="anonymous"></script>
</body>

</html>