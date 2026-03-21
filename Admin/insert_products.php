<?php 
include('../Database/connect.php');

if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    //Accessing Image Input Fields
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    //Accessing Image Temp Name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //checking for empty input fields
    if($product_title=='' or $product_description=='' or  $product_keyword=='' or $product_category=='' or $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Fill All Fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //Insert Query
        $insert_products="INSERT INTO `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) VALUES ('$product_title','$product_description','$product_keyword','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Product Inserted')</script>";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <!--Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!--Font Awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <!--CSS link-->
    <link rel="stylesheet" href="Admin.css">
</head>
<body class="bg-light">
    <div class="containe mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!--Form-->
        <form action="" method="post" enctype="multipart/form-data">
            <!--Product Title--> 
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>

            <!--Product Description--> 
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
            </div>

            <!--Product Keyword-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product Keyword" autocomplete="off" required="required">
            </div> 

            <!--Categories-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select Category</option>
                    <?php 
                        $select_query="SELECT * FROM `categories`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value ='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div> 

            <!--Brands-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select Brand</option>
                    <?php 
                        $select_query="SELECT * FROM `brands`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $brand_title=$row['brand_title'];
                            $brand_id=$row['brand_id'];
                            echo "<option value ='$brand_id'>$brand_title</option>";
                        }
                    ?>
                </select>
            </div> 

            <!--Image 1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div> 

            <!--Image 2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div> 

            <!--Image 3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div> 

            <!--Price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>

            <!--Product Keyword-->
            <div class="form-outline mb-4 w-50 m-auto">
               <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product"> 
            </div>

        </form>
    </div>



<!--Bootstrap JS link-->  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>