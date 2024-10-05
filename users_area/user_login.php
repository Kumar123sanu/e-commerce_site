<?php
include('../includes/connect.php');
// include('../function/common_functon.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce website-user Login</title>
    <!-- bootstreap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- css file -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
body{
    overflow-x:hidden;
}

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
    <h2 class="text-center mt-3 pt-3">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center text-dark ">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post">
                <!-- username feield -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                </div>
                <!-- password feield -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="button py-2 px-3 border-0" name="user_login" >
                    <p class="small fw-bold mt-2 pt-1">Don't have an account? <a href="user_registration.php" class="text-danger">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
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

  if(isset($_POST['user_login'])){
    $username = $_POST['user_username'];
    $password = $_POST['user_password'];

    // sql query
    $select_query="SELECT * FROM `user_table` WHERE user_name='$username'";
    $select_query_result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($select_query_result);
    $row_data=mysqli_fetch_assoc($select_query_result);
    $user_ip=getIPAddress();

    // cart item
    $cart_item_query="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $cart_item_query_result=mysqli_query($con,$cart_item_query);
    $cart_item_count=mysqli_num_rows($cart_item_query_result);

    if($row_count>0){
        $_SESSION['username']=$username;
        if(password_verify($password,$row_data['user_password'])){
            // echo "<script>alert('Login Successful')</script>";
            if($row_count==1 and $cart_item_count==0){
                $_SESSION['username']=$username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }
            else{
                $_SESSION['username']=$username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
            }
            


        }else{
            echo "<script>alert('Invalid Password')</script>";
        }
        
    }
    else{
        echo "<script>alert('Invalid Credentials')</script>";
    }




?>






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