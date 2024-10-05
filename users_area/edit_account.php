<?php 
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="SELECT * FROM `user_table` WHERE user_name='$user_session_name'";
    $select_result=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($select_result);
    $user_id=$row_fetch['user_id'];
    $user_names=$row_fetch['user_name'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];
  }
    // update account query
    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $user_namen=$_POST['user_name'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['temp_name'];
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");

        // update query

        $update_data="UPDATE `user_table` SET user_email='$user_email', user_image='$user_image', user_address='$user_address', user_mobile='$user_mobile' WHERE user_id=$update_id";
        $update_result=mysqli_query($con,$update_data);
        if($update_result){
            echo "<script>alert('Account updated successfully')</script>";
            echo "<script> window.open('logout.php','_self')</script>";
        }
    }
    



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
        .profile_pic{
            width: 100px;
            margin:10px;
            padding:4px;
            border-radius:50%;
            border: 2px solid #bbb;

        }
        .bttn{
            
          background-color: #4CAF50; /* Green background */
          color: white; /* White text */
          padding: 15px 32px; /* Some padding */
          text-align: center; /* Centered text */
          text-decoration: none; /* Remove underline */
          display: inline-block; /* Inline-block element */
          font-size: 16px; /* Increase font size */
          border: none; /* Remove borders */
          border-radius: 5px 5px;
          cursor: pointer; /* Pointer/hand icon on hover */
          transition: background-color 0.3s ease; /* Smooth transition */
        }

        .bttn:hover {
               background:linear-gradient(45deg,#4d42ff,#00d4ff);

            }

    </style>
</head>
<body>
    <h3 class="text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_names ?>" name="user_username">
      </div>  
      <div class="form-outline mb-4">
        <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email">
      </div> 
      <div class="form-outline mb-4 d-flex w-50 m-auto">
        <input type="file" class="form-control" name="user_image">
        <img src="./user_images/<?php echo $user_image ?>" alt="" class="profile_pic">
      </div> 
      <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
      </div> 
      <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>" name="user_mobile">
      </div> 
      <input type="submit" value="Update" class="bttn py-2 px-4 border-0" name="user_update">

    </form>
    
</body>
</html>