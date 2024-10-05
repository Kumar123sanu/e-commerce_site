<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .table{
        width: 100%;
        background:#4d42ff;
    }
</style>
</head>
<body>
    <h3 class="text-center text-success">All Brands</h3>
    <table class="table table-bordered mt-5">
        <thead class="text-center">
            <tr>
                <th>Sl on</th>
                <th>Brand Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondsry text-light">
            <?php
            $select_cat="SELECT * FROM `brands`";
            $run_cat=mysqli_query($con,$select_cat);
            $i=0;
            while($row=mysqli_fetch_assoc($run_cat)){
                $brand_id=$row['brand_id'];
                $brand_title=$row['brand_title'];
                $i++;
                 ?>
                <tr class="text-center">
                <td><?php echo $i ?></td>
                <td><?php echo $brand_title ?></td>
                <td><a href='index.php?edit_brands=<?php echo $brand_id?>'class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_orders=<?php echo $brand_id?>'type="button" class="text-dark" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            
            <?php

            }

            
            
            ?>
           
        </tbody>
    </table>

    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
      <div class="modal-body">
        <h5>Are you sure you want to delete this?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brands=<?php echo $brand_id?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>
</body>
</html>