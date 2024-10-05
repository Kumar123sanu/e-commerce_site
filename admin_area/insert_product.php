<?php
include('../includes/connect.php');
ini_set("Displey_errors","1");
error_reporting(E_ALL);
if(isset($_POST['insert_product'])){

    $product_tile=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';
    //  accessing images 
    $product_image1=$_FILES['product_image1']['name'];
 
    // accessig image tmp name
    $tmp_image1=$_FILES['product_image1']['tmp_name'];
   

    // checking emty condition
    if($product_tile=='' or $description=='' or $product_keywords=='' or $product_category=='' or $product_brands=='' or $product_price=='' or $product_image1=='' ){
         echo "<script>alert('please fill all the available fields) </script>";
        //  exit();
    }
    else{
        move_uploaded_file($tmp_image1,"./product_image/ $product_image1");

        // insert query
        $insert_products = "INSERT INTO `products` (`product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_price`, `date`, `status`) VALUES ('$product_tile','$description','$product_keywords','$product_category','$product_brands','$product_image1','$product_price',NOW(),'$product_status')";
        $insert_products_query=mysqli_query($con,$insert_products);

        if($insert_products_query){
            echo "<script>alert('product has been inserted successfully') </script>";
        }
    }


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product-Admin Dashboard</title>
      <!-- bootstreap css link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- css file -->
    <link rel="stylesheet" href="style.css">

</head>
<body class="bg-light">
        <div class="container mt-3">
            <h1 class="text-center">Insert Products</h1>
            <!-- form -->
            <form action="" method="post" enctype="multipart/form-data">
                <!-- title -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product Title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
                </div>
                <!-- description -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="description" class="form-label">Product Description</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
                </div>
                <!-- keywords -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keywords" class="form-label">Product Keywords</label>
                    <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product keywords" autocomplete="off" required="required">
                </div>
                <!-- categories -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_category" id="" class="form-select">
                        <option value="">select a category</option>
                        <?php
                        $select_query="select * from `categories`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                        ?>
                        
                    </select>
                    </div>

                     <!-- Brands -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_brands" id="" class="form-select">
                        <option value="">select a brands</option>
                        <?php
                        $select_query="select * from `brands`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $brand_title=$row['brand_title'];
                            $brand_id=$row['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                        ?>
                    </select>
                    </div>

                    <!-- image 1 -->
                  <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="form-label">Product Image 1</label>
                    <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
                </div>
                 <!-- price -->
                 <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product Price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
                </div>
                <!-- button -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <input type="Submit" name="insert_product" class="btn btn-success mb-3 px-3" value="Insert Product">
                </div>






            </form>
        </div>
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