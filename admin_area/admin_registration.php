<?php
include('../includes/connect.php');
include('../function/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- bootstreap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x:hidden;
        }
        .bttn{
        background-color: #4CAF50; /* Green background */
            color: white; /* White text */
            padding: 10px 20px; /* Some padding */
            text-align: center; /* Centered text */
            text-decoration: none; /* Remove underline */
            display: inline-block; /* Inline-block element */
            font-size: 16px; /* Increase font size */
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
    <div class="confainer-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <img src="./product_images/logo3.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
               <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter Your Username" required="required" class="form-control">
                    
                </div>
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter Your Email" required="required" class="form-control">
                    
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required="required" class="form-control">
                     
                </div>
                <div class="form-outline mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required="required" class="form-control">
                    
                </div>
                <div class="form-outline mb-4">                 
                    <input type="submit" name="admin_registration" class="bttn" value="Register">
                    <p class="small mt-2 pt-1 fw-bold">Do you already have an account? <a href="admin_login.php" class="text-danger text-decoration-none">Login</a></p>
                    
                </div>
               </form>
            </div>

        </div>
    </div>
</body>
</html>


<?php

if (isset($_POST['admin_registration'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate inputs
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "<script>alert('Please fill all the required fields.')</script>";
    } elseif ($password !== $confirm_password) {
        // Check if passwords match
        echo "<script>alert('Passwords do not match.')</script>";
    } else {
        // Check if username already exists
        $select_username_query = "SELECT * FROM `admin_table` WHERE admin_name='$username'";
        $result = mysqli_query($con, $select_username_query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Username already exists')</script>";
        } else {
            // Check if email already exists
            $check_email_query = "SELECT * FROM `admin_table` WHERE admin_email = '$email'";
            $check_email_result = mysqli_query($con, $check_email_query);
            if (mysqli_num_rows($check_email_result) > 0) {
                echo "<script>alert('Email already exists')</script>";
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert into database
                $insert_query = "INSERT INTO `admin_table`(`admin_name`, `admin_email`, `admin_password`) 
                                VALUES ('$username','$email','$hashed_password')";
                $sql_execute = mysqli_query($con, $insert_query);
                if ($sql_execute) {
                    echo "<script>alert('Data Inserted successfully')</script>";
                    echo "<script>window.open('./index.php', '_self')</script>";
                } else {
                    echo "<script>alert('Data Not Inserted')</script>";
                }
            }
        }
    }
}
?>
