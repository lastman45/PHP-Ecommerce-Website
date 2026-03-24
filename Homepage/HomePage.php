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
    <title>E-Commerce Website-HomePage</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <!-- CSS link -->
    <link rel="stylesheet" href="HomePage.css">
</head>
<style>
    .wrapper {
        perspective: 3000px;
        width: 100%;
        max-width: 270px;
    }

    .card {
        height: 380px;
        transform-style: preserve-3d;
        transition: transform 1s cubic-bezier(0.77, 0, 0.175, 1);
        cursor: pointer;
        border-radius: 24px;
        position: relative;
        box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.22), 0 1.5px 6px 0 rgba(15, 188, 249, 0.08);
        background: rgba(255, 255, 255, 0.02);
        margin-top: 20px;
        margin-bottom: 50px;
    }

    .card:hover {
        transform: rotateY(180deg) scale(1.03);
        box-shadow: 0 40px 80px 0 rgba(0, 0, 0, 0.28), 0 2px 12px 0 rgba(15, 188, 249, 0.12);
    }

    .front-page,
    .back-page {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 24px;
        overflow: hidden;
        transition: box-shadow 0.4s;
    }

    .front-page {
        background: linear-gradient(rgba(0, 0, 0, 0.08), rgba(0, 0, 0, 0.38));
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 40px 40px 40px 40px;
        box-shadow: 0 2px 8px rgba(15, 188, 249, 0.08);

    }

    .front-page::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        z-index: -1;
        filter: blur(1.5px) brightness(0.92);
        transition: filter 0.5s;
    }

    .card-info {
        color: #fff;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.45);
        transform: translateY(30px);
        opacity: 0.92;
        transition: transform 0.6s cubic-bezier(0.77, 0, 0.175, 1), opacity 0.6s;
    }

    .card:hover .card-info {
        transform: translateY(0);
        opacity: 1;
    }

    .card-title {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 12px;
        letter-spacing: 0.5px;
    }

    .card-subtitle {
        font-size: 1.2rem;
        font-weight: 500;
        color: #0fbcf9;
        background: rgba(0, 0, 0, 0.55);
        padding: 8px 18px;
        border-radius: 30px;
        display: inline-block;
        box-shadow: 0 1px 4px rgba(15, 188, 249, 0.10);
    }

    .back-page {
        background: linear-gradient(135deg, #232a34 0%, #0a3d62 100%);
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transform: rotateY(180deg);
        padding: 36px 30px 30px 30px;
        text-align: center;
        box-shadow: 0 2px 8px rgba(15, 188, 249, 0.10);
    }

    .card-content {
        width: 100%;
    }

    .card-content h3 {
        font-size: 1.7rem;
        margin-bottom: 18px;
        position: relative;
        letter-spacing: 0.2px;
    }

    .card-content h3::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 48px;
        height: 3px;
        background: linear-gradient(90deg, #0fbcf9 60%, #00d2d3 100%);
        border-radius: 3px;
    }

    .card-description {
        font-size: 1.05rem;
        color: #ecf0f1;
        margin-bottom: 32px;
        line-height: 1.7;
        opacity: 0.93;
        text-shadow: 0 1px 4px rgba(0, 0, 0, 0.10);
    }

    .button-group {
        display: flex;
        gap: 16px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .card-button {
        background-color: #0fbcf9;
        color: #fff;
        padding: 12px 28px;
        font-size: 1rem;
        border: 2px solid transparent;
        border-radius: 30px;
        cursor: pointer;
        transition:
            background 0.25s cubic-bezier(0.77, 0, 0.175, 1),
            border-color 0.25s,
            box-shadow 0.25s,
            transform 0.25s;
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 500;
        box-shadow: 0 5px 18px rgba(15, 188, 249, 0.18);
        margin-bottom: 10px;
        text-decoration: none;
    }

    .card-button:hover {
        background-color: #fff;
        color: #0fbcf9;
        border-color: #0fbcf9;
        transform: translateY(-2px) scale(1.04);
        box-shadow: 0 8px 24px rgba(15, 188, 249, 0.22);
    }

    .card-button.view {
        background-color: transparent;
        color: #0fbcf9;
        border: 2px solid #0fbcf9;
    }

    .card-button.view:hover {
        background-color: #0fbcf9;
        color: #fff;
    }




    .main_box {
        position: relative;
        height: 40px;
        width: 100%;
    }

    .sidebar_menu {
        position: fixed;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        flex-shrink: 0;
        width: 320px;
        top: 0;
        height: 100vh;
        left: -320px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        transition: left 0.3s ease-in-out;
        z-index: 99;
        background-color: #6c757d;
        overflow-y: auto;
        padding-bottom: 20px;
    }

    .sidebar_menu::after {
        content: '';
        height: var(--footer-height, 80px);
        flex-shrink: 0;
    }

    .logo_side {
        width: 100%;
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 20px 0;
    }

    .logo_side a {
        color: black;
        font-size: 10px;
        font-weight: 500;
        position: absolute;
        left: 50px;
        line-height: 60px;
        text-decoration: none;
    }

    #check {
        display: none;
    }

    .btn_one {
        color: black;
        font-size: 28px;
        font-weight: 700;
        position: absolute;
        left: 16px;
        line-height: 60px;
        cursor: pointer;
        z-index: 101;
        transition: all 0.3s ease;
    }

    .btn_two {
        position: absolute;
        right: 20px;
        top: 15px;
    }

    .btn_two i {
        font-size: 25px;
        cursor: pointer;
        color: white;
    }

    .btn_one i:hover {
        font-size: 29px;
    }

    .btn_two i:hover {
        font-size: 24px;
    }

    #check:checked~.sidebar_menu {
        left: 0px;
    }

    #check:checked~.btn_one {
        opacity: 0;
        pointer-events: none;
    }

    #check:checked~.btn_two i {
        opacity: 1;
    }

    .footer {
        flex-shrink: 0;
        margin-top: auto;
        position: relative;
        bottom: 0;
        width: 100%;
        z-index: 100;

    }

    .nav-items {
        margin: 20px 15px;
        padding: 30px 40px;
        border-radius: 10px;
        background-color: #17a2b8;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }


    .nav-links {
        display: flex;
        align-items: center;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .nav-links:hover {
        transform: translateX(5px);
    }

    .nav-links i {
        font-size: 20px;
        min-width: 25px;
    }

    .nav-texts {
        flex: 1;

    }

    .nav-texts h6 {
        margin: 0;
        font-size: 20px;
        font-weight: 600;
        letter-spacing: 0.3px;
        line-height: 1.2;
    }


    .menu {
        margin: 10px 0;
        padding: 0 20px;
        width: 100%;
        list-style: none;
        color: black;
    }

    .menu li {
        margin: 12px 0;
        padding: 8px 15px;
        transition: all 0.3s ease;
        border-radius: 8px;
    }

    .menu li:hover {
        border-left: 4px solid #17a2b8;
        box-shadow: 0 3px 12px rgba(23, 162, 184, 0.3);
        background-color: rgba(255, 255, 255, 0.15);
        transform: translateX(8px);
    }

    .menu a {
        color: white;
        font-size: 20px;
        text-decoration: none;
        font-weight: 600;
        line-height: 1.4;
    }

    .menu li:hover a {
        color: black;
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
            <!-- Dropdown Sidebar Menu -->
            <div class="navbar-nav me-auto">
                <div class="nav-item ">
                    <div class="dropdown-menu-custom bg-secondary p-2" id="sidebarDropdownMenu">
                        <?php sidenav(); ?>
                    </div>
                </div>
            </div>


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



        <!-- Third Child -->
        <!-- Products -->
        <div class="container-fluid main-content" id="mainContent">
            <div class="row">
                <div class="col-md-12" id="productsSection">
                    <div class="row px-1">
                        <!-- Fetching Inserted Products -->
                        <?php
                        getproducts();
                        get_unique_categories();
                        get_unique_brands();
                        $ip = getIpAddress();
                        ?>
                        <!-- Row end -->
                    </div>
                    <!-- Column End -->
                </div>
            </div>
        </div>
    </div>

    <!-- Last Child -->
    <?php include("footer.php") ?>
    </div>


    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>