<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Serial No.</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_brands = "SELECT * FROM `brands`";
        $result = mysqli_query($con, $select_brands);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            $number++;
            ?>
            <tr class="text-center">
                <td><?php echo $number; ?></td>
                <td><?php echo $brand_title; ?></td>
                <td><a href='./Admin.php?edit_brand= <?php echo $brand_id ?>' class='text-dark'><i
                            class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href='./Admin.php?delete_brand' type='button' class='text-dark' data-bs-toggle='modal'
                        data-bs-target='#exampleModal'><i class="fa-solid fa-trash"></i></a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Are You Sure You Sure You Want To Delete This?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a
                        href="./Admin.php?view_brands" class="text-light text-decoration-none">NO</a></button>
                <button type="button" class="btn btn-primary"><a href='./Admin.php?delete_brand'
                        class="text-light text-decoration-none">YES</a></button>
            </div>
        </div>
    </div>
</div>