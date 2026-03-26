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
    <title><?php echo $_SESSION['username'] ?>-User's Profile</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <!-- CSS link -->
    <link rel="stylesheet" href="Users.css">
</head>
<style>
    .profile_img {
        width: 90%;
        margin: auto;
        display: block;
        object-fit: contain;
    }


    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .logo {
        width: 7%;
        height: 7%;
    }

    .nav-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .nav-list {
        display: flex;
        list-style: none;
    }

    .nav-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .nav-text {
        font-size: 0.8rem;
        font-weight: 500;
    }

    .nav-link {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.4rem;
    }

    .edit_img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .profile-item a {
        text-decoration: none;
        display: flex;
        align-items: center;
        color: #212529;
        font-weight: 600;
        padding: 12px 16px;
        transition: background-color 0.3s ease;
    }

    .profile-item a:hover {
        text-decoration: none;
        background-color: rgba(0, 0, 0, 0.1);
    }

    .profile-item a i {
        font-size: 1.2rem;
        margin-right: 12px;
        width: 20px;
        text-align: center;
    }

    .profile-text {
        font-weight: 600;
        color: #212529;
        margin: 0;
    }

    .nav-item.bg-info a {
        text-decoration: none;
        display: flex;
        align-items: center;
        color: #212529;
        font-weight: 700;
        padding: 12px 16px;
    }

    .nav-item.bg-info a i {
        font-size: 1.3rem;
        margin-right: 12px;
    }

    .nav-item.bg-info h4 {
        margin: 0;
        font-weight: 700;
        color: #212529;
    }

    .navbar-nav .nav-item,
    .navbar-nav .profile-item {
        list-style: none;
    }

    .navbar-nav {
        padding-left: 0;
    }
</style>

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
                            <a class="nav-link active" aria-current="page" href="../Homepage/HomePage.php"><i
                                    class="fa-solid fa-house"></i><span class="nav-text">Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Homepage/ProductsDisplay.php"><i
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
                            <a class="nav-link" href="../Homepage/Cart.php"><i class="fa-solid fa-cart-shopping"></i><span
                                    class="nav-text">Cart</span><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-money-bills"></i><span
                                    class="nav-text">Total: Ksh <?php total_cart_price(); ?></span></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="../Homepage/SearchProduct.php" method="get">
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
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                    <li class="nav-item bg-info">
                        <a href="#"><i class="fa-solid fa-address-card"></i><span class="profile-text">
                                <h4>Profile</h4>
                            </span></a>
                    </li>
                    <?php
                    $username = $_SESSION['username'];
                    $user_image = "SELECT * FROM `user_table` WHERE username='$username'";
                    $user_image = mysqli_query($con, $user_image);
                    $row_image = mysqli_fetch_array($user_image);
                    $user_image = $row_image['user_image'];
                    echo "
                        <li class='profile-item'>
                        <img src='./UserImages/$user_image' class='profile_img my-4' alt=''>
                    </li>";
                    ?>
                    <li class="profile-item">
                        <a href="Profile.php"><i class="fa-solid fa-hourglass-half"></i><span class="profile-text">
                                Pending orders
                            </span></a>
                    </li>
                    <li class="profile-item">
                        <a href="Profile.php?edit_account"><i class="fa-solid fa-sliders"></i><span class="profile-text">
                                Edit Account
                            </span></a>
                    </li>
                    <li class="profile-item">
                        <a href="Profile.php?my_orders"><i class="fa-solid fa-bag-shopping"></i><span class="profile-text">
                                My Orders
                            </span></a>
                    </li>
                    <li class="profile-item">
                        <a href="Profile.php?delete_account"><i class="fa-solid fa-trash-can"></i><span
                                class="profile-text">
                                Delete Account
                            </span></a>
                    </li>
                    <li class="profile-item">
                        <a href="Logout.php"><i class="fa-solid fa-right-from-bracket"></i><span class="profile-text">
                                Logout
                            </span></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php
                get_user_order_details();
                if (isset($_GET['edit_account'])) {
                    include('EditAccount.php');
                }
                if (isset($_GET['my_orders'])) {
                    include('UserOrders.php');
                }
                if (isset($_GET['delete_account'])) {
                    include('DeleteAccount.php');
                }

                ?>
            </div>
        </div>



        <!-- Last Child -->
        <?php include("../Homepage/footer.php") ?>
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>