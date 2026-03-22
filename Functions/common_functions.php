<?php
include('../Database/connect.php');


//Getting Products Function
function getproducts()
{
    global $con;

    //Condition to Check if Isset OR Not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "SELECT * FROM `products` ORDER BY rand() LIMIT 0,9";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "
    <div class='wrapper'>
        <div class='card'>
            <div class='front-page'>
                <div class='card-info'>
                 <img src='../Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                 <h2 class='card-title'>$product_title</h2>
                 <p class='card-subtitle'>Price: ksh $product_price</p>
                </div>
         </div>
            <div class='back-page'>
                <div class='card-content'>
                    <h3>$product_title</h3>
                    <p class='card-description'>$product_description</p>
                    <a href='HomePage.php?add_to_cart=$product_id' class='card-button'><i class='fa-solid fa-cart-shopping'></i><span class='nav-text'> Add to Cart</span></a>
                    <a href='ProductDetails.php?product_id=$product_id' class='card-button'><i class='fa-solid fa-basket-shopping'></i><span class='nav-text'> View More</span></a>
                </div>
            </div>

        </div>
    </div>
                 ";
            }
        }
    }
}
//Getting All Products
function get_all_products()
{
    global $con;

    //Condition to Check if Isset OR Not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "SELECT * FROM `products` ORDER BY rand()";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "
    <div class='wrapper'>
        <div class='card'>
            <div class='front-page'>
                <div class='card-info'>
                 <img src='../Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                 <h2 class='card-title'>$product_title</h2>
                 <p class='card-subtitle'>Price: ksh $product_price</p>
                </div>
         </div>
            <div class='back-page'>
                <div class='card-content'>
                    <h3>$product_title</h3>
                    <p class='card-description'>$product_description</p>
                    <a href='HomePage.php?add_to_cart=$product_id' class='card-button'><i class='fa-solid fa-cart-shopping'></i><span class='nav-text'> Add to Cart</span></a>
                    <a href='ProductDetails.php?product_id=$product_id' class='card-button'><i class='fa-solid fa-basket-shopping'></i><span class='nav-text'> View More</span></a>
                </div>
            </div>

        </div>
    </div>
                 ";
            }
        }
    }
}

//Getting Unique Categories
function get_unique_categories()
{
    global $con;

    //Condition to Check if Isset OR Not
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM `products` WHERE category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h1 class='text-center'><i class='fa-solid fa-hourglass-half'></i><span class='nav-text'><h2>Re-Stocking Category</h2></span></h1>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo "
    <div class='wrapper'>
        <div class='card'>
            <div class='front-page'>
                <div class='card-info'>
                 <img src='../Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                 <h2 class='card-title'>$product_title</h2>
                 <p class='card-subtitle'>Price: ksh $product_price</p>
                </div>
         </div>
            <div class='back-page'>
                <div class='card-content'>
                    <h3>$product_title</h3>
                    <p class='card-description'>$product_description</p>
                    <a href='HomePage.php?add_to_cart=$product_id' class='card-button'><i class='fa-solid fa-cart-shopping'></i><span class='nav-text'> Add to Cart</span></a>
                    <a href='ProductDetails.php?product_id=$product_id' class='card-button'><i class='fa-solid fa-basket-shopping'></i><span class='nav-text'> View More</span></a>
                </div>
            </div>

        </div>
    </div>
                 ";
        }
    }
}


//Getting Unique Brands
function get_unique_brands()
{
    global $con;

    //Condition to Check if Isset OR Not
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM `products` WHERE brand_id=$brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h1 class='text-center'><i class='fa-solid fa-hourglass-half'></i><span class='nav-text'><h2>Re-Stocking Brand</h2></span></h1>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo "
    <div class='wrapper'>
        <div class='card'>
            <div class='front-page'>
                <div class='card-info'>
                 <img src='../Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                 <h2 class='card-title'>$product_title</h2>
                 <p class='card-subtitle'>Price: ksh $product_price</p>
                </div>
         </div>
            <div class='back-page'>
                <div class='card-content'>
                    <h3>$product_title</h3>
                    <p class='card-description'>$product_description</p>
                    <a href='HomePage.php?add_to_cart=$product_id' class='card-button'><i class='fa-solid fa-cart-shopping'></i><span class='nav-text'> Add to Cart</span></a>
                    <a href='ProductDetails.php?product_id=$product_id' class='card-button'><i class='fa-solid fa-basket-shopping'></i><span class='nav-text'> View More</span></a>
                </div>
            </div>

        </div>
    </div>
                 ";
        }
    }
}

//Displaying Brands
function getbrands()
{
    global $con;
    $select_brands = "SELECT * FROM `brands`";
    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];

        echo "<li class='sidenav-items'>
    <a href='Homepage.php?brand=$brand_id' class='sidenav-link'>$brand_title</a><br>
</li>";
    }
}


//Displaying Categories
function getcategories()
{
    global $con;
    $select_categories = "SELECT * FROM `categories`";
    $result_categories = mysqli_query($con, $select_categories);
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];

        echo "<li class='sidenav-items'>
                             <a href='Homepage.php?category=$category_id' class='sidenav-link'>$category_title</a><br>
                         </li>";
    }
}

function sidenav()
{
    echo "
    <div class='main_box'>
        <input type='checkbox' id='check'>
        <div class='btn_one'>
            <label for='check'>
                <i class='fas fa-bars'></i>
            </label>
        </div>
        <div class='sidebar_menu'>
            <div class='logo_side'>
                <li class='nav-items bg-info'>
                    <a  class='nav-links'><i class='fa-solid fa-truck'></i>
                        <span class='nav-texts'>
                            <h6>Delivery Brands</h6>
                        </span>
                    </a>
                </li>
                <ul class='menu'>
                    ";
    getbrands();
    echo "
                </ul>
                <li class='nav-items bg-info'>
                    <a href='#' class='nav-links'><i class='fa-solid fa-filter'></i>
                        <span class='nav-texts'>
                            <h6>Categories</h6>
                        </span>
                    </a>
                </li>
                <ul class='menu'>
                    ";
    getcategories();
    echo "
                </ul>
            </div>
            <div class='btn_two'>
                <label for='check'>
                    <i class='fas fa-times'></i>
                </label>
            </div>
        </div>
    </div>
    ";
}


//Search Products Function

function search_products()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h1 class='text-center'><i class='fa-solid fa-gears'></i></i><span class='nav-text'>Can You Give More Specifics or Search For an Alternative</span></h1>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "
    <div class='wrapper'>
        <div class='card'>
            <div class='front-page'>
                <div class='card-info'>
                 <img src='../Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                 <h2 class='card-title'>$product_title</h2>
                 <p class='card-subtitle'>Price: ksh $product_price</p>
                </div>
         </div>
            <div class='back-page'>
                <div class='card-content'>
                    <h3>$product_title</h3>
                    <p class='card-description'>$product_description</p>
                    <a href='HomePage.php?add_to_cart=$product_id' class='card-button'><i class='fa-solid fa-cart-shopping'></i><span class='nav-text'> Add to Cart</span></a>
                    <a href='ProductDetails.php?product_id=$product_id' class='card-button'><i class='fa-solid fa-basket-shopping'></i><span class='nav-text'> View More</span></a>
                </div>
            </div>

        </div>
    </div>
                 ";
        }
    }
}


//View Details Function
function view_details()
{
    global $con;

    //Condition to Check if Isset OR Not
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $select_query = "SELECT * FROM `products` WHERE product_id=$product_id";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo "
    <div class='wrapper'>
        <div class='card'>
            <div class='front-page'>
                <div class='card-info'>
                 <img src='../Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                 <h2 class='card-title'>$product_title</h2>
                 <p class='card-subtitle'>Price: ksh $product_price</p>
                </div>
         </div>
            <div class='back-page'>
                <div class='card-content'>
                    <h3>$product_title</h3>
                    <p class='card-description'>$product_description</p>
                    <a href='HomePage.php?add_to_cart=$product_id' class='card-button'><i class='fa-solid fa-cart-shopping'></i><span class='nav-text'> Add to Cart</span></a>
                    <a href='ProductDetails.php?product_id=$product_id' class='card-button'><i class='fa-solid fa-basket-shopping'></i><span class='nav-text'> View More</span></a>
                </div>
            </div>

        </div>
    </div>
                    
                    <div class='wrapper'>
        <div class='card'>
            <div class='front-page'>
                <div class='card-info'>
                 <img src='../Admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                 <h2 class='card-title'>$product_title</h2>
                 <p class='card-subtitle'>Price: ksh $product_price</p>
                </div>
         </div>
            <div class='back-page'>
                <div class='card-content'>
                    <h3>$product_title</h3>
                    <p class='card-description'>$product_description</p>
                    <a href='HomePage.php?add_to_cart=$product_id' class='card-button'><i class='fa-solid fa-cart-shopping'></i><span class='nav-text'> Add to Cart</span></a>
                    <a href='ProductDetails.php?product_id=$product_id' class='card-button'><i class='fa-solid fa-basket-shopping'></i><span class='nav-text'> View More</span></a>
                </div>
            </div>

        </div>
    </div>
                            <div class='wrapper'>
        <div class='card'>
            <div class='front-page'>
                <div class='card-info'>
                 <img src='../Admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                 <h2 class='card-title'>$product_title</h2>
                 <p class='card-subtitle'>Price: ksh $product_price</p>
                </div>
         </div>
            <div class='back-page'>
                <div class='card-content'>
                    <h3>$product_title</h3>
                    <p class='card-description'>$product_description</p>
                    <a href='HomePage.php?add_to_cart=$product_id' class='card-button'><i class='fa-solid fa-cart-shopping'></i><span class='nav-text'> Add to Cart</span></a>
                    <a href='ProductDetails.php?product_id=$product_id' class='card-button'><i class='fa-solid fa-basket-shopping'></i><span class='nav-text'> View More</span></a>
                </div>
            </div>

        </div>
    </div>";
                }
            }
        }
    }
}

//Getting IP Address
function getIpAddress()
{
    $ip = '';

    // Check for HTTP_CLIENT_IP (often set by proxies)
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    // Check for HTTP_X_FORWARDED_FOR (common for proxies and load balancers)
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        // HTTP_X_FORWARDED_FOR can contain multiple IPs separated by commas.
        // The first IP in the list is typically the original client IP.
        $ip_array = explode(',', $ip);
        $ip = trim($ip_array[0]);
    }
    // Fallback to REMOTE_ADDR (the most direct connection IP)
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

// Example usage:
//$ip = getIpAddress();
//echo "Your IP Address: " . $ip;



//Cart Function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_address = getIpAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address' AND product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('Item Already inside Cart')</script>";
            echo "<script>window.open('HomePage.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO `cart_details` (product_id,ip_address,quantity) VALUES ($get_product_id,'$get_ip_address',0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('Item Added to Cart')</script>";
            echo "<script>window.open('HomePage.php','_self')</script>";
        }
    }
}

//Function for getting Cart Items Numbers
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_address = getIpAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip_address = getIpAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

//Function to get Total Price
function total_cart_price()
{
    global $con;
    $get_ip_address = getIpAddress();
    $total_price = 0;
    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        //Getting price from a different table
        $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
        $result_products = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}

//Getting User Order Details
function get_user_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details = "SELECT * FROM `user_table` WHERE username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_orders = "SELECT * FROM `user_orders` WHERE user_id= $user_id AND order_status='pending'";
                    $result_orders_query = mysqli_query($con, $get_orders);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if ($row_count > 0) {
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You Have <span class='text-danger'>$row_count</span> Pending Orders</h3>
                        <p class='text-center'><a href='Profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                    } else {
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You Have No Pending Orders</h3>
                        <p class='text-center'><a href='../Homepage/HomePage.php'>Order Products</a></p>";
                    }
                }
            }
        }
    }
}
