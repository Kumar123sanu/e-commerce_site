<?php
// including connect file 
// include('./includes/connect.php');

// getting product
function getproducts(){
    global $con;

     // condition to check isset or not
     if(!isset($_GET['category_id'])){
        if(!isset($_GET['brand_id'])){         
    $select_query="SELECT * FROM `products` order by rand() limit 0,9";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo " <div class='col-md-4 mb-2'>
    <div class='card'>
       <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
       <div class='card-body'>
         <h4 class='card-title'>$product_title</h4>
         <p class='card-text'>$product_description</p>
         <h5 class='card-text'>Rs: $product_price /-</h5>
         <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
         <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
     </div>
    </div>
  </div> ";

    }
}
}
}
// getting all product
function get_all_products(){
  global $con;
   // condition to check isset or not
   if(!isset($_GET['category_id'])){
    if(!isset($_GET['brand_id'])){         
$select_query="SELECT * FROM `products` order by rand()";
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_description=$row['product_description'];
$product_image1=$row['product_image1'];
$product_price=$row['product_price'];
$category_id=$row['category_id'];
$brand_id=$row['brand_id'];
echo " <div class='col-md-4 mb-2'>
<div class='card'>
   <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
   <div class='card-body'>
     <h5 class='card-title'>$product_title</h5>
     <p class='card-text'>$product_description</p>
     <h5 class='card-text'>Rs: $product_price /-</h5>
     <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
 </div>
</div>
</div> ";

}
}
}
}



// getting unique categories
function get_unique_categories(){
    global $con;
     // condition to check isset or not
     if(isset($_GET['category_id'])){ 
        $category_id=$_GET['category_id'];
    $select_query="SELECT * FROM `products` where category_id=$category_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No Stock for this Category</h2>";
    }
    // $row=mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo " <div class='col-md-4 mb-2'>
    <div class='card'>
       <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
       <div class='card-body'>
         <h5 class='card-title'>$product_title</h5>
         <p class='card-text'>$product_description</p>
         <h5 class='card-text'>Rs: $product_price /-</h5>
         <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
         <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
     </div>
    </div>
  </div> ";

  }
}
}

// getting unique brands
function get_unique_brand(){
    global $con;

     // condition to check isset or not

     if(isset($_GET['brand_id'])){ 
        $brands_id=$_GET['brand_id'];
    $select_query="SELECT * FROM `products` where  brand_id=$brands_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>This Brand is not available for Service</h2>";
    }
    // $row=mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo " <div class='col-md-4 mb-2'>
    <div class='card'>
       <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
       <div class='card-body'>
         <h5 class='card-title'>$product_title</h5>
         <p class='card-text'>$product_description</p>
         <h5 class='card-text'>Rs: $product_price /-</h5>
         <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
         <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
     </div>
    </div>
  </div> ";

  }
}
}


// displaying brands in sidenav
function getbrands(){
    global $con;
   

    $select_brands="SELECT * FROM `brands`";
    $result_brands=mysqli_query($con,$select_brands);
    while($row_data=mysqli_fetch_assoc($result_brands)){
      $brand_title=$row_data['brand_title'];
      $brand_id=$row_data['brand_id'];
      echo " <li class='nav-item'>
      <a href='index.php?brand_id=$brand_id' class='nav-link text-light'>$brand_title</a>
      </li>";

    }
}

// displaying categories in sidenav
function getcategories(){
    global $con;
    $select_categories="SELECT * FROM `categories`";
    $result_categories=mysqli_query($con,$select_categories);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title'];
    while($row_data=mysqli_fetch_assoc($result_categories)){
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      echo " <li class='nav-item'>
      <a href='index.php?category_id=$category_id' class='nav-link text-light'>$category_title</a>
      </li>";

    }
}
// searching products function
function search_product(){
  global $con; 
   if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];
    $seach_query="SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
    $result_query=mysqli_query($con,$seach_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No Product found</h2>";
    }
    
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo " <div class='col-md-4 mb-2'>
    <div class='card'>
       <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
       <div class='card-body'>
         <h5 class='card-title'>$product_title</h5>
         <p class='card-text'>$product_description</p>
         <h5 class='card-text'>Rs: $product_price /-</h5>
         <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
         <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
     </div>
    </div>
  </div> ";

    }
}
}  


// view details function
 function view_details(){
  global $con;

  // condition to check isset or not
  if(isset($_GET['product_id'])){
  if(!isset($_GET['category_id'])){
     if(!isset($_GET['brand_id'])){   
            $product_id=$_GET['product_id'];
 $select_query="SELECT * FROM `products` where product_id=$product_id";
 $result_query=mysqli_query($con,$select_query);
 while($row=mysqli_fetch_assoc($result_query)){
 $product_id=$row['product_id'];
 $product_title=$row['product_title'];
 $product_description=$row['product_description'];
 $product_image1=$row['product_image1'];
 $product_price=$row['product_price'];
 $category_id=$row['category_id'];
 $brand_id=$row['brand_id'];
 echo " <div class='row px-1'>
 <div class='col-md-10 '>

      <!-- products -->
      
      <div class='row p-5' >
       <!-- cards -->

         <div class='col-md-4 '>
             <img src='./admin_area/product_images/$product_image1'alt='' height='300px' width='auto'>
         </div>
         <div class='col-md-8 px-5'>
            <div class='row'>
             <div class='col-md-12 px-5 m-3 '>
             <h3 class='text-success'>Product Infomestion</h3>
             <br>
             <h2>$product_title</h2>
             <p class='card-text'>$product_description</p>
             <h4>Rs. $product_price</h4>
             </div>
            </div>

         </div> ";

 }
}
}
 }
 }

 //getting IP address function
 function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

  // cart function
  function cart(){
     if(isset($_GET['add_to_cart'])){
      global $con;
      $get_ip_add = getIPAddress();
      $get_product_id = $_GET['add_to_cart'];
      $select_query="SELECT * FROM `cart_details` where ip_address='$get_ip_add'and product_id=$get_product_id";
      $result_query=mysqli_query($con,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
        echo "<script>alert('This item is already persent inside cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    else{
      $insert_query="INSERT INTO `cart_details` (product_id,ip_address,quantity) VALUES ($get_product_id,'$get_ip_add',0) ";
      $result_query=mysqli_query($con,$insert_query);
      echo "<script>alert('Item is added to cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }

     }
  }

 
  
  // function to get cart item numbers
  function cart_item(){
    if(isset($_GET['add_to_cart'])){
      global $con;
      $get_ip_add = getIPAddress();
      $select_query="SELECT * FROM `cart_details` where ip_address='$get_ip_add'";
      $result_query=mysqli_query($con,$select_query);
      $count_cart_item=mysqli_num_rows($result_query);
    }
    else{
      global $con;
      $get_ip_add = getIPAddress();
      $select_query="SELECT * FROM `cart_details` where ip_address='$get_ip_add'";
      $result_query=mysqli_query($con,$select_query);
      $count_cart_item=mysqli_num_rows($result_query);
    }
    echo $count_cart_item;

     }

     // total price function
     function total_cart_price(){
      global $con;
      $get_ip_add = getIPAddress();
      $total_price=0;
      $cart_query="SELECT * FROM `cart_details` where ip_address='$get_ip_add'";
      $result=mysqli_query($con,$cart_query);
      while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="SELECT * FROM `products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_products_price=mysqli_fetch_array($result_products)){
          $product_price=array($row_products_price['product_price']);
          $product_values=array_sum($product_price);
          $total_price+=$product_values;
        }
        
      }
      echo $total_price;

     }

    //  get user order details
    // Function to get user order details
function get_user_order_details(){
  global $con;
  $username = $_SESSION['username'];

  // Get user ID based on username
  $get_details = "SELECT * FROM `user_table` WHERE user_name='$username'";
  $result = mysqli_query($con, $get_details);

  while($row_query = mysqli_fetch_array($result)){
      $user_id = $row_query['user_id'];

      // Only proceed if no other GET parameters are set
      if(!isset($_GET['edit_account']) && !isset($_GET['my_orders']) && !isset($_GET['delete_account'])){
          
          // Get pending orders for the user
          $get_orders = "SELECT * FROM `user_orders` WHERE user_id=$user_id AND order_status='pending'";
          $result_orders_query = mysqli_query($con, $get_orders);
          $row_count = mysqli_num_rows($result_orders_query);

          // If there are pending orders, display a message
          if($row_count > 0){
              echo "<h3 class='text-center my-5'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
              <div class='text-center my-2'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></div> ";

          } else {
              echo "<h3 class='text-center my-4 text-success'>You have Zero pending orders</h3>
              <div class='text-center my-2'><a href='../index.php' class='text-dark'>Explore Products</a></div> ";
          }
      }
  }
}

    // function get_user_order_details(){
    //   global $con;
    //   $username=$_SESSION['username'];
    //   $get_details="SELECT * FROM `user_table` WHERE user_name='$username'";
    //   $result=mysqli_query($con,$get_details);
    //   while($row_query=mysqli_fetch_array($get_details)){
    //     $user_id=$row_query['user_id'];
    //     if(!isset($_GET['edit_account'])){
    //       if(!isset($_GET['my_orders'])){
    //         if(!isset($_GET['delete_account'])){
    //           $get_orders="SELECT * FROM `user_orders` where user_id=$user_id and order_status='pending'";
    //           $result_orders_query=mysqli_query($con,$get_orders);
    //           $row_count=mysqli_num_rows($result_orders_query);
    //           if($row_count>0){
    //             echo "<h3 class='text-center'>You have <span class='text-denger'>$row_count</span>pending orders</h3>"

    //           }
          
    //         }          
    //       }            
    //     }

    //   }
    // }
  
?>