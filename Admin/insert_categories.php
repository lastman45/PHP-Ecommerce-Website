<?php
include('../Database/connect.php');

if (isset($_POST['insert-cat'])) {
  $category_title = $_POST['cat_title'];

  $select_query = "SELECT * FROM `categories` WHERE category_title = '$category_title'"; // prevents reentry of same category
  $result_select = mysqli_query($con, $select_query);

  if (!$result_select) {
    echo "Error: " . mysqli_error($con);
  }

  $number = mysqli_num_rows($result_select);
  if ($number > 0) {
    echo "<script>alert('Category Already Exists')</script>";
  } else {
    $insert_query = "INSERT INTO `categories` (category_title) VALUES ('$category_title')";
    $result = mysqli_query($con, $insert_query);

    if (!$result) {
      echo "Error: " . mysqli_error($con);
    } else {
      echo "<script>alert('Category Inserted')</script>";
    }
  }
}
?>
<h2 class="text-center">Insert Category</h2>
<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="cat_title" placeholder="Insert Category" aria-label="Categories" aria-describedby="basic-addon1">
  </div>
  <div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="bg-info border-0 p-2 my-3 rounded-pill" name="insert-cat" value="Insert Categories">
  </div>
</form>