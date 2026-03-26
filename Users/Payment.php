<?php
include('../Database/connect.php');
include('../Functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<style>
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

    .navbar-navs {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
        list-style: none;
        margin: 0;
    }

    .navbar-navs li {
        width: 100%;
        max-width: 400px;
        margin-bottom: 15px;
    }

    .navbar-navs a {
        text-decoration: none;
        display: flex;
        align-items: center;
        color: #212529;
        font-weight: 600;
        padding: 12px 16px;
        transition: background-color 0.3s ease;
        border-radius: 8px;
        border: 1px solid #dee2e6;
    }

    .navbar-navs a:hover {
        text-decoration: none;
        background-color: rgba(0, 123, 255, 0.1);
        border-color: #007bff;
    }

    .navbar-navs i {
        font-size: 1.2rem;
        margin-right: 12px;
        width: 20px;
        text-align: center;
        color: black;
    }

    .payment-text {
        font-weight: 600;
        color: #212529;
        margin: 0;
        font-size: 1rem;
    }

    .payment-header {
        font-size: 1.5rem;
        color: black;
        margin-bottom: 30px;
        text-decoration: underline;
    }

    .order-section {
        margin: auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        max-width: 400px;
    }

    .order-section a {
        color: black;
        text-decoration: none;
        font-weight: 600;
    }

    .order-section a:hover {
        color: black;
        text-decoration: none;
    }
</style>

<body>
    <!-- PHP Code To Access User Id -->
    <?php
    $user_ip = getIpAddress();
    $get_user = "SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="navbar-navs">
                    <!-- Header -->
                    <li class="nav-item">
                        <h4 class="payment-header">
                            <i class="fa-solid fa-wallet"></i> Payment Methods
                        </h4>
                    </li>

                    <!-- PayPal -->
                    <li class="nav-item">
                        <a href="https://www.paypal.com/signin">
                            <i class="fa-brands fa-paypal"></i>
                            <span class="payment-text">PayPal</span>
                        </a>
                    </li>

                    <!-- M-Pesa -->
                    <li class="nav-item">
                        <a href="#">
                            <i class="fa-solid fa-money-bill-wave"></i>
                            <span class="payment-text">M-Pesa</span>
                        </a>
                    </li>

                    <!-- Airtel Money -->
                    <li class="nav-item">
                        <a href="#">
                            <i class="fa-solid fa-money-bill-wave"></i>
                            <span class="payment-text">Airtel Money</span>
                        </a>
                    </li>

                    <!-- Door Payment -->
                    <li class="nav-item">
                        <a href="#">
                            <i class="fa-solid fa-people-carry-box"></i>
                            <span class="payment-text">Door Payment</span>
                        </a>
                    </li>

                    <!-- Order Section -->
                    <li class="nav-item">
                        <div class="order-section text-center">
                            <a href="Order.php?user_id=<?php echo $user_id ?>">
                                <h3>Complete Order</h3>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>