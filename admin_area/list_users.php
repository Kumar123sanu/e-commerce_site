<h3 class="text-center text-success mt-4">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php 
        $get_uesr="SELECT * FROM `user_table`";
        $run_user=mysqli_query($con,$get_uesr);
        $count_user=mysqli_num_rows($run_user);
        echo "  <tr class='text-center'>
        <th>Sl No</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>User Image</th>     
        <th>User Address</th>
        <th>User Mobile</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody>";
        
        if($count_user==0){
            echo "<h2 class='text-danger text-center mt-5'>No Users yet</h2>";
        }else{
            $number=0;
            while($row_data=mysqli_fetch_assoc($run_user)){
                
                $user_id=$row_data['user_id'];
                $user_name=$row_data['user_name'];
                $user_email=$row_data['user_email'];
                $user_image=$row_data['user_image'];
                $user_address=$row_data['user_address'];
                $user_mobile=$row_data['user_mobile'];
                $number++;

                echo "<tr class='text-center'>
                <td>$number</td>
                <td>$user_name</td>
                <td>$user_email</td>
                <td><img src='../users_area/user_images/$user_image' alt='$user_name' class='profile-pic'/></td>
                <td>$user_address</td>
                <td>$user_mobile</td>
                ";
                ?>
                <td><a href='index.php?delete_user=<?php echo $user_id ?>'type="button" class="text-dark" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash text-dark'></i></a></td>
            </tr>
            <?php 
            }

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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_users" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_user=<?php echo $user_id?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>