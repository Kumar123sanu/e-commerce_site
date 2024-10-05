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
    <title>E-commerce site</title>
    <!-- bootstreap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- css file -->
    <link rel="stylesheet" href="style.css">

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
        <li class="nav-item">
        <a class="nav-link" href="#">Total Price:<?php total_cart_price(); ?></a>
        </li>
        
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="Search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-success" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
    </div>

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


    <!-- forth child -->
    

           
              <!-- fetching products -->
              <?php
              // getting all functions
              view_details();
              echo '<br>';
              global $con;

              // condition to check isset or not
              if(!isset($_GET['category_id'])){
                 if(!isset($_GET['brand_id'])){         
             $select_query="SELECT * FROM `products` order by rand() limit 0,3";
             $result_query=mysqli_query($con,$select_query);
             while($row=mysqli_fetch_assoc($result_query)){
             $product_id=$row['product_id'];
             $product_title=$row['product_title'];
             $product_description=$row['product_description'];
             $product_image1=$row['product_image1'];
             $product_price=$row['product_price'];
             $category_id=$row['category_id'];
             $brand_id=$row['brand_id'];
             echo "<div class='col-md-4 mb-2'>
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




           get_unique_categories();
           get_unique_brand(); 
              ?>
              </div>
                   
    </div>



        <!-- sidenav -->
        <div class="col-md-2 bg-secondary p-0">
          <!-- brands will be display -->
                  <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-success">
                    <a href="#" class="nav-link text-light"><h4>Company Brands</h4></a>
                    </li>
                    <?php
                   getbrands();
                    ?>
                

                  </ul>
                  <!-- categories will be display -->
                  <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-success">
                    <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>
                    <?php
                   getcategories();
                    ?>
                 
                  </ul>       
        </div>
    </div>
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