<?php
include('includes/connect.php');
include('function/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website-cart details</title>
    <!-- bootstreap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
  
    </style>

</head>
<body>
    <!-- nevbar -->
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-whit">
  <div class="container-fluid">
    <img src="./img/logo.png" alt="" class="Logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <?php 
        if (isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>My Account</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
        </li>";
        } 
        ?>
        <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup class="fw-bold text-danger"><?php cart_item(); ?></sup></a>
        </li>
      </ul>  
    </div>
  </div>
</nav>
    </div>

    <!-- calling cart function -->
    <?php
    cart();
    ?>

    <!-- secong child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
        <?php
        if (!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
             <a class='nav-link' href='#'>Welcome Guest</a>
          </li>";
       }
          else {
             echo "<li class='nav-item'>
             <a class='nav-link' href='#'>Welcom ".$_SESSION['username']."</a>
          </li>";
       } 

if (!isset($_SESSION['username'])){
   echo "<li class='nav-item'>
      <a class='nav-link' href='./users_area/user_login.php'>Login</a>
   </li>";
}
   else {
      echo "<li class='nav-item'>
      <a class='nav-link' href='./users_area/logout.php'>Logout</a>
   </li>";
} 
?>
        </ul>

    </nav>

    <!-- third child -->
    <div class="bg-light">
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">Communication is at the heart of e-commerce and community</p>
    </div>
    <!-- fourth child-table -->
    <div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">
               
               
                    <!-- php code to display dynamic data -->
                    <?php
                     global $con;
                     $get_ip_add = getIPAddress();
                     $total_price=0;
                     $cart_query="SELECT * FROM `cart_details` where ip_address='$get_ip_add'";
                     $result=mysqli_query($con,$cart_query);
                     $result_count=mysqli_num_rows($result);
                     if($result_count>0){
                        echo " <thead>
                        <tr>
                           <th>Product Title</th>
                           <th>Product Image</th>
                           <th>Quentity</th>
                           <th>Total price</th>
                           <th>Remove</th>
                           <th colspan='2'>Operations</th>
                        </tr>
                    </thead>";
                     

                     
                     while($row=mysqli_fetch_array($result)){
                       $product_id=$row['product_id'];
                       $select_products="SELECT * FROM `products` where product_id='$product_id'";
                       $result_products=mysqli_query($con,$select_products);
                       while($row_products_price=mysqli_fetch_array($result_products)){
                         $product_price=array($row_products_price['product_price']);
                         $price_table=$row_products_price['product_price'];
                         $product_title=$row_products_price['product_title'];
                         $product_image1=$row_products_price['product_image1'];
                         $product_values=array_sum($product_price);
                         $total_price+=$product_values;
                     
                    
                    ?>
                    <tr>
                        <td><?php echo $product_title ?></td>
                        <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                        <td><input type="text" name="qty" id="" class="form-input w-50 "></td>
                        <?php
                         $get_ip_add = getIPAddress();
                         if(isset($_POST['update_cart'])){
                            $quantities=$_POST['qty'];
                            $update_cart="UPDATE `cart_details` set quantity=$quantities WHERE ip_address='$get_ip_add'";
                            $result_products_quantity=mysqli_query($con,$update_cart);
                            $total_price=$total_price*$quantities;
                         }
                        ?>
                        <td><?php echo $price_table ?> /-</td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                        <td>
                           <!-- <button class="bg-success px-3 py-2 border-0 mx-3 text-light" >Update</button> -->
                           <input type="submit" value="Update Cart" class="bg-success px-3 py-2 border-0 mx-3 text-light" name="update_cart">
                           <!-- <button class="bg-success px-3 py-2 border-0 mx-3 text-light">Remove</button> -->
                           <input type="submit" value="Remove Cart" class="bg-success px-3 py-2 border-0 mx-3 text-light" name="remove_cart">
                        </td>

                       


                    </tr>
                    <?php
                       }
                    }
                }

                else{
                    echo "<h2 class='text-center text-danger'>Your Cart is Empty</h2>";
                }

               
                    // echo "<h2>Cart is Emoty</h2>";

                

                    ?>
                </tbody>
            </table>

            <!-- subtotal price -->
            <div class="d-flex mb-5">
                <?php 
                   global $con;
                   $get_ip_add = getIPAddress();
                   $cart_query="SELECT * FROM `cart_details` where ip_address='$get_ip_add'";
                   $result=mysqli_query($con,$cart_query);
                   $result_count=mysqli_num_rows($result);
                   if($result_count>0){
                    echo "
                    <h4 class='px-4'>Subtotal:<strong class='text-success'>$total_price/-</strong> </h4>
                    <input type='submit' value='Continue Shopping' class='bg-success px-3 py-2 border-0 mx-3 text-light' name='continue_shopping'>
                    <button class='bg-info p-3 py-2 border-0'><a href='.//users_area/checkout.php' class='text-dark text-decoration-none' >Checkout</a></button>";
                   }
                   else{
                    echo "<input type='submit' value='Continue Shopping' class='bg-success px-3 py-2 border-0 mx-3 text-light' name='continue_shopping'>";
                   }
                   if(isset($_POST['continue_shopping'])){
                    echo "<script>window.open('index.php','_self') </script>";
                   }
                ?>
            </div>
        </div>
    </div>


    </form>
    <!-- function to remove item -->
    <?php
   function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $removed_id){
                echo $removed_id;
                $delete_query="DELETE FROM `cart_details` WHERE product_id='$removed_id'"; 
               $run_delete=mysqli_query($con,$delete_query);
                if($delete_query){
                    echo "<script>window.open('cart.php','_self')";
                    
                }

            }
        }
        

    }
    

   echo $remove_item = remove_cart_item();
    
   
    ?>




<!-- last child -->
<!-- include footer -->
<?php  include("./includes/footer.php")  ?>
</div>

</body>
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>