<?php
include('../includes/connect.php');
// include('../functions/common_functon.php');


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
  
// ini_set("display_errors","1");
// error_reporting(E_ALL);

if(isset($_POST['user_ragister'])){
    $username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contect=$_POST['user_contact'];
    $user_ip=getIPAddress();

    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];

    if($user_password != $conf_user_password){
        echo "<script>alert('Passwords do not match')</script>";
        
    }
    else{

        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

    

        // move images 
        move_uploaded_file($user_image_tmp,"./user_images/ $user_image");
    
        // Check if username already exists
        $select_username_query="SELECT * FROM `user_table` WHERE user_name='$username'";
        $result=mysqli_query($con, $select_username_query);
        $rows_count=mysqli_num_rows($result);
        if($rows_count>0){
            echo "<script>alert('Username already exists')</script>";
           
        }else{
               // Check if email already exists
              $check_email_query = "SELECT * FROM user_table WHERE user_email = '$user_email'";
              $check_email_result = mysqli_query($con, $check_email_query);
                if(mysqli_num_rows($check_email_result) > 0){
                   echo "<script>alert('Email already exists')</script>";
            
               }else{
                        // insert_query
                       $insert_query= "INSERT INTO `user_table`(`user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES ('$username','$user_email','$hashed_password','$user_image','$user_ip','$user_address','$user_contect')";
                       $sql_execute=mysqli_query($con,$insert_query);
                        if($sql_execute){
                        echo "<script>alert('Data Inserted successfully')</script>";
                        }
                        else{
                        echo "<script>alert('Data Not Inserted')</script>";
                        }

                    }
    
       



         }
    
    
       
    }

    // selecting cart item
    $select_cart_item="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $result_cart_item=mysqli_query($con,$select_cart_item);
    $rows_count_cart_item=mysqli_num_rows($result_cart_item);
    if($rows_count_cart_item>0){
        $_SESSION['username']=$username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";

    }
    else{
        echo "<script>window.open('../index.php','_self')</script>";

    }

   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce website-User Registration</title>
    <!-- bootstreap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>


.button{
   background-color:rgb(23, 171, 63);
   text-emphasis-color: black;
   border-radius: 8px;
   transition: 0.5s ease;

}
.button:hover{
    background-color: #8df4d9;
}
    </style>
</head>
<body class="bg-body-secondary">
<div class="container-fluid text-black">
    <h2 class="text-center mt-3 pt-3">New User Registration</h2>
    <div class="row d-flex align-items-center justify-content-center text-dark ">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- username field -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                </div>
                <!-- email field -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email"/>
                </div>
                 <!-- image field -->
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User image</label>
                    <input type="file" id="user_image" class="form-control" required="required" name="user_image"/>
                </div>
                <!-- password field -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                </div>
                <!-- confirm password field -->
                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Coanfirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="Enter your Coanfirm password" autocomplete="off" required="required" name="conf_user_password"/>
                </div>
                <!-- address field -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter your Address" autocomplete="off" required="required" name="user_address"/>
                </div>
                  <!--  contact field -->
                  <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter your Contact" autocomplete="off" required="required" name="user_contact"/>
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="button py-2 px-3 border-0" name="user_ragister" >
                    <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="user_login.php" class="text-danger">Login</a></p>
                </div>
            </form>
        </div>
    </div>
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

<!-- php Code -->
