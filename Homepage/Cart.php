<?php
include('../Database/connect.php');
include('../Functions/common_functions.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website-Cart</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <!-- CSS link -->
    <link rel="stylesheet" href="HomePage.css">
    <style>
        .cart_image {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <!-- First Child -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../Images//logo.jpg" alt="S-Class Logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="HomePage.php"><i
                                    class="fa-solid fa-house"></i><span class="nav-text">Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ProductsDisplay.php"><i
                                    class="fa-solid fa-cubes-stacked"></i><span class="nav-text">Products</span></a>
                        </li>
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "
                             <li class='nav-item'>
                            <a class='nav-link'href='../Users/Profile.php'><i class='fa-solid fa-user-tie'></i><span class='nav-text'>Account</span></a>
                        </li>";
                        } else {
                            echo "
                             <li class='nav-item'>
                            <a class='nav-link'href='../Users/Registeration.php'><i
                                    class='fa-solid fa-user-plus'></i><span class='nav-text'>Register</span></a>
                        </li>";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-message"></i><span
                                    class="nav-text">Contact Us</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Cart.php"><i class="fa-solid fa-cart-shopping"></i><span
                                    class="nav-text">Cart</span><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-money-bills"></i><span
                                    class="nav-text">Total: Ksh <?php total_cart_price(); ?></span></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="SearchProduct.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data" />
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- Calling Cart Function -->
        <?php
        cart();
        ?>


        <!-- Second Child -->
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <!--User Status & Logout -->
            <ul class="navbar-nav ms-auto">
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome Guest</a>
            </li>";
                } else {
                    echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
            </li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                <a class='nav-link' href='../Users/Login.php'><i class='fa-solid fa-right-to-bracket'></i><span
                        class='nav-text'>Login</span></a>
            </li>";
                } else {
                    echo "<li class='nav-item'>
                <a class='nav-link' href='../Users/Logout.php'><i class='fa-solid fa-right-from-bracket'></i><span
                        class='nav-text'>Logout</span></a>
            </li>";
                }
                ?>
            </ul>

            <!-- Center Content -->
            <div class="mx-auto position-absolute start-50 translate-middle-x">
                <h3 class="text-center">S-Class</h3>
                <p class="text-center">No Worries we've got you Covered</p>
            </div>
        </nav>

        <!-- Fourth Child -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center" style="margin-top: 20px;">
                        <!-- PHP code to fetch cart items -->
                        <?php
                        $get_ip_address = getIpAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo " 
                                 <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                        </thead>
                        <tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                //Getting price from a different table
                                $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
                                $result_products = mysqli_query($con, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values;

                        ?>
                                    <tr>
                                        <td><?php echo $product_title ?></td>
                                        <td><img src="../Admin/product_images/<?php echo $product_image1 ?>" alt=""
                                                class="cart_image"></td>
                                        <td><input type="text" name="qty" class="form-input w-50"></td>
                                        <?php
                                        $get_ip_address = getIpAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['qty'];
                                            $update_cart = "UPDATE `cart_details` SET quantity=$quantities WHERE ip_address='$get_ip_address'";
                                            $result_products_quantity = mysqli_query($con, $update_cart);
                                            $total_price = $total_price * $quantities;
                                        }

                                        ?>
                                        <td><?php echo 'Ksh ' . $price_table; ?></td>
                                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                        <td>
                                            <input type="submit" value="Update Cart" name="update_cart"
                                                class="bg-info px-3 py-2 border-0 text-light rounded-pill">
                                            <input type="submit" value="Remove Cart" name="remove_cart"
                                                class="bg-info px-3 py-2 border-0 text-light rounded-pill">
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'>Your cart is empty</h2>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <!-- Subtotal Section -->
                    <div class="d-flex mb-5">
                        <?php
                        $get_ip_address = getIpAddress();
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "
                                <h4 class='px-3'>Subtotal: <strong
                                class='text-info'>Ksh $total_price</strong>
                        </h4>
                        <input type='submit' value='Continue Shopping' name='continue_shopping'
                                                class='bg-info px-3 py-2 border-0 mx-3 text-light rounded-pill'>
                       <button class='bg-secondary p-3 py-2 border-0  rounded-pill '><a href='../Users/Purchase.php' class='text-light text-decoration-none'>Purchase</a></button>";
                        } else {
                            echo "<input type='submit' value='Continue Shopping' name='continue_shopping'
                                                class='bg-info px-3 py-2 border-0 mx-3 text-light rounded-pill'>";
                        }
                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('HomePage.php', '_self')</script>";
                        }

                        ?>

                    </div>
            </div>
        </div>
        </form>

        <!-- Remove Items Functions -->
        <?php
        function remove_cart_item()
        {
            global $con;
            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "DELETE FROM `cart_details` WHERE product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('Cart.php', '_self')</script>";
                    }
                }
            }
        }
        echo $remove_item = remove_cart_item();


        ?>

        <!-- Last Child -->
        <?php include("footer.php") ?>
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>