<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <style>
        body{
            /* background:linear-gradient(180deg,#4d42ff,#fb70dd,#7af798,#00d4ff); */

        }
          .bttn{
            
            background-color: #4CAF50; /* Green background */
            color: #000; /* White text */
            padding: 10px 32px; /* Some padding */
            text-align: center; /* Centered text */
            text-decoration: none; /* Remove underline */
            display: inline-block; /* Inline-block element */
            font-size: 16px; /* Increase font size */
            box-shadow: 2px 2px 2px 2px #9e9ea3, -0.5em 0 .6em olive;
            border: none; /* Remove borders */
            border-radius: 4px;
            cursor: pointer; /* Pointer/hand icon on hover */
            transition: background-color 0.3s ease; /* Smooth transition */
          }
  
          .bttn:hover {
                 background:linear-gradient(45deg,#4d42ff,#00d4ff);
  
              }
    </style>
</head>
<body>
    <h3 class="text-debger mb-4">Deleting Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline w-50 mb-4 m-auto">
            <input type="submit" class="bttn form-control w-50 m-auto" name="delete" value="Delete Account">
        </div>
        <div class="form-outline w-50 m-auto">
            <input type="submit" class="bttn form-control w-50 m-auto" name="dont_delete" value="Don't Delete Account">
        </div>
    </form>
</body>
</html>
<?php
$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query="DELETE FROM `user_table` WHERE user_name='$username_session'";
    $result=mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Account Deleted Successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
}
if(isset($_POST['dont_delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
}



?>