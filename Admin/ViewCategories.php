<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Serial No.</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_categories = "SELECT * FROM `categories`";
        $result = mysqli_query($con, $select_categories);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;
            ?>
            <tr class="text-center">
                <td><?php echo $number; ?></td>
                <td><?php echo $category_title; ?></td>
                <td><a href='./Admin.php?edit_category= <?php echo $category_id ?>' class='text-dark'><i
                            class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href='/Admin.php?delete_category= <?php echo $category_id ?>' class='text-dark'><i
                            class="fa-solid fa-trash"></i></a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>

</table>