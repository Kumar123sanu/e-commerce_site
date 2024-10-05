<?php  
include('../includes/connect.php');
include('../function/common_function.php');
@session_start();

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
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <img src="./product_images/logo1.jpeg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
               <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter Your Username" required="required" class="form-control">
                    
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required="required" class="form-control">
                     
                </div>
                <div class="form-outline mb-4">                 
                    <input type="submit" name="admin_login" class="bttn" value="Login">
                    <p class="small mt-2 pt-1 fw-bold">Don't you have an account? <a href="admin_registration.php" class="text-danger text-decoration-none">Register</a></p>
                    
                </div>
               </form>
            </div>

        </div>
    </div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username exists in the admin table
    $query = "SELECT * FROM `admin_table` WHERE admin_name = '$username'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $row['admin_password'])) {
            // Password is correct, start a session
            session_start();
            $_SESSION['admin_name'] = $row['admin_name'];
            $_SESSION['admin_id'] = $row['admin_id'];

            echo "<script>alert('Login successful');</script>";
            echo "<script>window.open('./index.php', '_self');</script>";
        } else {
            echo "<script>alert('Incorrect password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('No account found with that username. Please try again.');</script>";
    }
}
?>