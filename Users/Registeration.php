<?php
include('../Database/connect.php');
include('../Functions/common_functions.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
</head>
<style>
    #message {
        position: absolute;
        color: black;
        font-size: 15px;
        display: none;
    }

    /* Email Validator */
    .email-validation-container {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 5px;
    }

    #icon {
        display: none;
        font-size: 20px;
    }

    #error-msg {
        display: none;
        color: #ff2851;
        font-size: 14px;
        margin: 0;
    }

    #valid-msg {
        display: none;
        color: green;
        font-size: 14px;
        margin: 0;
    }
</style>

<body>
    <div class="container-fluid">
        <h2 class="text-center my-3"><i class="fa-solid fa-user"></i>Registeration</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Username -->
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username<i
                                class="fa-solid fa-pen-to-square"></i></label>
                        <input type="text" id="username" placeholder="Enter Your Username" class="form-control"
                            required="required" autocomplete="off" name="username" />
                    </div>
                    <!-- Email -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email<i class="fa-solid fa-envelope"></i></label>
                        <input type="email" id="user_email" oninput="checker()" placeholder="Enter Your Email Address" class="form-control"
                            required="required" autocomplete="off" name="user_email" />
                        <div class="email-validation-container">
                            <div id="icon"></div>
                            <p id="error-msg">Please Enter A Valid Email Address</p>
                            <p id="valid-msg">Valid Email Address</p>
                        </div>
                    </div>
                    <!-- Image -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image<i class="fa-solid fa-image"></i></label>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image" />
                    </div>
                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password<i class="fa-solid fa-key"></i></label>
                        <input type="password" id="user_password" placeholder="Enter Your Password" class="form-control"
                            required="required" autocomplete="off" name="user_password" />
                        <p id="message">Password is <span id="strength"></span> </p>
                    </div>
                    <!--Confirm Password -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password<i
                                class="fa-solid fa-lock"></i></label>
                        <input type="password" id="conf_user_password" placeholder="Confirm Your Password"
                            class="form-control" required="required" autocomplete="off" name="conf_user_password" />
                    </div>
                    <!--Address -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address<i
                                class="fa-solid fa-map-location"></i></label>
                        <input type="text" id="user_address" placeholder="Enter Your Address" class="form-control"
                            required="required" autocomplete="off" name="user_address" />
                    </div>
                    <!--Contact -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact<i class="fa-solid fa-phone"></i></label>
                        <input type="text" id="user_contact" placeholder="Enter Your Phone Number" class="form-control"
                            required="required" autocomplete="off" name="user_contact" />
                    </div>
                    <!-- Show Password -->
                    <div>
                        <input type="checkbox" id="show_password">
                        <label for="show_password">Show Password </label>
                    </div>
                    <!-- Register Button -->
                    <div class="text-center">
                        <input type="submit" value="Register" class="btn btn-info mb-3 px-3 py-2" name="user_register">
                    </div>
                    <!-- Already have an account -->
                    <p class="text-center small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="Login.php"
                            class="text-danger"> Login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    //Password Strength Script
    var pass = document.getElementById("user_password");
    var msg = document.getElementById("message");
    var str = document.getElementById("strength");

    pass.addEventListener('input', () => {
        if (pass.value.length > 0) {
            msg.style.display = "block";
        } else {
            msg.style.display = "none";

        }
        if (pass.value.length < 4) {
            str.innerHTML = "Weak";
            pass.style.border = "2px solid red";
            msg.style.color = "red";

        } else if (pass.value.length >= 4 && pass.value.length <= 8) {
            str.innerHTML = "Medium";
            pass.style.border = "2px solid yellow";
            msg.style.color = "yellow";
        } else if (pass.value.length >= 8) {
            str.innerHTML = "Strong";
            pass.style.border = "2px solid green";
            msg.style.color = "green";
        }


    })

    //Show Password Script
    const showPasswordCheckbox = document.getElementById("show_password");
    const passwordField = document.getElementById("user_password");
    const confirmPasswordField = document.getElementById("conf_user_password");

    showPasswordCheckbox.addEventListener("change", function() {
        if (showPasswordCheckbox.checked) {
            passwordField.type = "text";
            confirmPasswordField.type = "text";
        } else {
            passwordField.type = "password"
            confirmPasswordField.type = "password"
        }
    });

    // Email Validator
    let emailid = document.getElementById("user_email");
    let errorMsg = document.getElementById("error-msg");
    let validMsg = document.getElementById("valid-msg");
    let icon = document.getElementById("icon");
    let mailRegex = /^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/;

    function checker() {
        icon.style.display = "inline-block";
        if (emailid.value.match(mailRegex)) {
            icon.innerHTML = '<i class="fas fa-check-circle"></i>';
            icon.style.color = "green";
            validMsg.style.display = "block";
            errorMsg.style.display = "none";
            emailid.style.border = "2px solid green";
        } else if (emailid.value == "") {
            icon.style.display = "none";
            emailid.style.border = "2px solid #d1d3d4";
            validMsg.style.display = "none";
            errorMsg.style.display = "none";
        } else {
            icon.innerHTML = '<i class="fas fa-exclamation-circle"></i>';
            icon.style.color = "red";
            validMsg.style.display = "none";
            errorMsg.style.display = "block";
            emailid.style.border = "2px solid red";
        }
    }
</script>

</html>

<!--PHP Code -->
<?php
if (isset($_POST['user_register'])) {
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_ip = getIpAddress();


    // Check if Username or Email already Exists
    $select_query = "SELECT * FROM `user_table` WHERE username='$username' or user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Username or Email already exists!');</script>";
    } else if ($user_password !== $conf_user_password) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        move_uploaded_file($user_image_tmp, "./UserImages/$user_image");
        $insert_user = "INSERT INTO `user_table` (username, user_email, user_password, user_image, user_ip,  user_address, user_mobile) VALUES ('$username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
        $sql_execute = mysqli_query($con, $insert_user);
        if ($sql_execute) {
            echo "<script>alert('Registration successful!');</script>";
        } else {
            die(mysqli_error($con));
        }
    }

    //Selecting Cart Items
    $select_cart_items = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    if ($rows_count > 0) {
        $_SESSION['username'] = $username;
        echo "<script>alert('Items Present In Cart')</script>";
        echo "<script>window.open('Purchase.php','_self')</script>";
    } else {
        echo "<script>window.open('../Homepage/HomePage.php','_self')</script>";
    }
}


?>