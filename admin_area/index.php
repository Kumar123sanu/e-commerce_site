<?php
include('../includes/connect.php');
include('../function/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

     <!-- bootstreap css link -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x: hidden;
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
              .profile-pic{
                    width: 80px;
                    padding:2px;
                    border-radius: 10%;
                    margin-bottom: 20px;
                    border: 2px solid #bbb;
    
                }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <img src="../img/logo.png" alt="" class="Logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">

                    <?php 
                    if (!isset($_SESSION['admin_name'])){
                        echo " <li class='nav-item'>
                        <a href='#' class='nav-link'>Welcome Guest</a>
                    </li>";
                     }
                        else {
                           echo "<li class='nav-item'>
                           <a href='#' class='nav-link'>Welcome".$_SESSION['admin_name']. "</a>
                       </li>";
                     } 
                    
                    ?>
                       
                    </ul>
                </nav>
            </div>
        </nav>
      <!-- second child -->
      <div class="name">
        <h3 class="text-center p-2">Manage Details</h3>
      </div>
      <!-- third child -->
      <div class="row">
         <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="px-5">
                <a href=""><img src="../img/iphone14pro.png" alt="" class="admin_image"></a>
                <p class="text-light text-center"><?php echo $_SESSION['admin_name'] ?></p>

            </div>
            <div class="butten text-center">
                <button class="bttn mb-2 mx-1 border-0"><a href="insert_product.php" class="text-light text-decoration-none ">Insert Products</a></button>
                <button class="bttn mx-1 border-0"><a href="index.php?view_products" class="text-light text-decoration-none">View Products</a></button>
                <button class="bttn mx-1 border-0"><a href="index.php?insert_category" class="text-light text-decoration-none">Insert Categories</a></button>
                <button class="bttn mx-1 border-0"><a href="index.php?view_categories" class="text-light text-decoration-none">View Categories</a></button>
                <button class="bttn mx-1 border-0"><a href="index.php?insert_brand" class="text-light text-decoration-none">Insert Brands</a></button>
                <button class="bttn mx-1 border-0"><a href="index.php?view_brands" class="text-light text-decoration-none">View Brands</a></button>
                <button class="bttn mx-1 border-0"><a href="index.php?list_orders" class="text-light text-decoration-none">All Order</a></button>
                <button class="bttn mx-1 border-0"><a href="index.php?list_payment" class="text-light text-decoration-none">All Payments</a></button>
                <button class="bttn mx-1 border-0"><a href="index.php?list_users" class="text-light text-decoration-none">List users</a></button>
                <button class="bttn mx-1 border-0"><a href="admin_logout.php" class="text-light text-decoration-none">Logout</a></button>
            </div>
         </div>
      </div>
    </div>
    
    <!-- fouth child -->
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brand'])){
            include('insert_brands.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['view_brands'])){
            include('view_brands.php');
        }
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        }
        if(isset($_GET['edit_brands'])){
            include('edit_brands.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }
        if(isset($_GET['delete_brands'])){
            include('delete_brands.php');
        }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['delete_orders'])){
            include('delete_orders.php');
        }
        if(isset($_GET['list_payment'])){
            include('list_payment.php');
        }
        if(isset($_GET['delete_payment'])){
            include('delete_payment.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        if(isset($_GET['delete_user'])){
            include('delete_user.php');
        }


        ?>
    </div>

    <!-- last child -->
    <?php  include("../includes/footer.php")  ?>


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>