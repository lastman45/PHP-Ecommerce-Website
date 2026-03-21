<?php
include('../Database/connect.php');
include('../Functions/common_functions.php');
@session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
</head>
<style>
    .form {
        margin: auto;
        margin-top: 50px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-width: 350px;
        padding: 20px;
        border-radius: 20px;
        position: relative;
        background-color: #1a1a1a;
        color: #fff;
        border: 1px solid #333;
    }

    .title {
        font-size: 28px;
        font-weight: 600;
        letter-spacing: -1px;
        position: relative;
        display: flex;
        align-items: center;
        padding-left: 30px;
        color: #00bfff;
    }

    .title::before {
        width: 18px;
        height: 18px;
    }

    .title::after {
        width: 18px;
        height: 18px;
        animation: pulse 1s linear infinite;
    }

    .title::before,
    .title::after {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        border-radius: 50%;
        left: 0px;
        background-color: #00bfff;
    }

    .message,
    .signin {
        font-size: 14.5px;
        color: rgba(255, 255, 255, 0.7);
    }

    .signin {
        text-align: center;
    }

    .signin a:hover {
        text-decoration: underline royalblue;
    }

    .signin a {
        color: #00bfff;
    }

    .flex {
        display: flex;
        width: 100%;
        gap: 6px;
    }

    .form label {
        position: relative;
    }

    .form label .input {
        background-color: #333;
        color: #fff;
        width: 100%;
        padding: 20px 05px 05px 10px;
        outline: 0;
        border: 1px solid rgba(105, 105, 105, 0.397);
        border-radius: 10px;
    }

    .form label .input+span {
        color: rgba(255, 255, 255, 0.5);
        position: absolute;
        left: 10px;
        top: 0px;
        font-size: 0.9em;
        cursor: text;
        transition: 0.3s ease;
    }

    .form label .input:placeholder-shown+span {
        top: 12.5px;
        font-size: 0.9em;
    }

    .form label .input:focus+span,
    .form label .input:valid+span {
        color: #00bfff;
        top: 0px;
        font-size: 0.7em;
        font-weight: 600;
    }

    .input {
        font-size: medium;
    }

    .submit {
        border: none;
        outline: none;
        padding: 10px;
        border-radius: 10px;
        color: #fff;
        font-size: 16px;
        transform: .3s ease;
        background-color: #00bfff;
    }

    .submit:hover {
        background-color: #00bfff96;
    }

    @keyframes pulse {
        from {
            transform: scale(0.9);
            opacity: 1;
        }

        to {
            transform: scale(1.8);
            opacity: 0;
        }
    }
</style>

<body>

    <form method="post" class="form">
        <h2 class="title"><i class="fa-solid fa-user-pen"></i>Admin Login</h2>
        <p class="message">Welcome</p>
        <!-- Username -->
        <label>
            <input class="input" type="text" required="required" autocomplete="off" name="admin_name">
            <span>Adminname<i class="fa-solid fa-pen-to-square"></i></span>
        </label>
        <!-- Password -->
        <label>
            <input class="input" type="password" required="required" autocomplete="off" name="admin_password">
            <span>Password<i class="fa-solid fa-key"></i></span>
        </label>
        <!-- Login Button -->
        <input type="submit" value="Register" class="submit" name="admin_login">
        <!-- Register Button -->
        <p class="signin">Don't have an account ? <a href="AdminRegisteration.php">Register</a> </p>
    </form>

</body>

</html>

<?php
if (isset($_POST['admin_login'])) {
    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];

    //Checking if Admin is present in database
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_name'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $_SESSION['admin_name'] = $admin_name;
    if ($row_count > 0) {
        if (password_verify($admin_password, $row_data['admin_password'])) {
            if ($row_count == 1) { //Admin Present
                $_SESSION['admin_name'] = $admin_name;
                echo "<script>alert('Login Successful'); window.open('Admin.php','_self');</script>";
            } else {
                //Admin & Passwords Mismatch
                echo "<script>alert('Invalid Credentials')</script>";
            }
        } else {
            //No such Admin
            echo "<script>alert('Admin Doesn't Exist')</script>";
        }
    }
}

?>