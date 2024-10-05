<?php
include('../includes/connect.php');
include('../function/common_function.php');
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
    <link rel="stylesheet" href="../style.css">
 <style>
  body{
        overflow-x: hidden;
      }

.sidebar {
    width: 230px;
    background:linear-gradient(180deg,#4d42ff,#fb70dd,#7af798,#00d4ff);

    color: #000;
    padding: 20px;
}
    .profile {
    text-align: center;
    margin-bottom: 30px;
}

   .profile-pic{
    width: 190px;
    padding:2px;
    border-radius: 50%;
    margin-bottom: 20px;
    border: 2px solid #bbb;
    
   }

.profile h2 {
    font-size: 20px;
    margin-bottom: 5px;
}
.profile p {
    font-size: 14px;
    color: #000;
}
.sidebar nav ul {
    list-style: none;
    width: 100%;
    text-align: left;
    
}
.sidebar nav ul li {
    margin-bottom: 15px;
}

.sidebar nav ul li a {
    color: #000;
    background:#FFFACD;
    text-decoration: none;
    display: block;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.4s;
    
}
.sidebar nav ul li a:hover,
.sidebar nav ul li a.active {
    background-color: #007bff;
}



 </style>
</head>
<body>
    <!-- nevbar -->
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-whit">
  <div class="container-fluid">
    <img src="../img/logo.png" alt="" class="Logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="../contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup class="fw-bold text-danger"><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:<?php total_cart_price(); ?></a>
        </li>
        
      </ul>
      <form class="d-flex" action="../search_product.php" method="get">
        <input class="form-control me-2" type="Search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-success" name="search_data_product">
      </form>
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
      <a class='nav-link' href='user_login.php'>Login</a>
   </li>";
}
   else {
      echo "<li class='nav-item'>
      <a class='nav-link' href='logout.php'>Logout</a>
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
<!-- fourth child -->
<div class="row">
<div class="col-md-2">
<div class="dashboard-container">
        <aside class="sidebar">
            <div class="profile">
            <?php
            $username=$_SESSION['username'];
            $user_details="SELECT * FROM `user_table` WHERE user_name='$username'";
            $run_user_details=mysqli_query($con,$user_details);
            $row=mysqli_fetch_array($run_user_details);
            $user_id=$row['user_id'];
            $user_name=$row['user_name'];
            $user_email=$row['user_email'];
            $user_image=$row['user_image'];

            echo "<img src='./user_images/$user_image' alt='User Profile Picture' class='profile-pic'>
            <h2>$user_name</h2>
            <p>$user_email</p>";

            ?>
                
            </div>
            <nav>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="profile.php" >Pending Orders</a></li>
                    <li class="nav-item"><a href="profile.php?edit_account">Edit Account</a></li>
                    <li class="nav-item"><a href="profile.php?my_orders">My Orders</a></li>
                    <li class="nav-item"><a href="profile.php?delete_account">Delete Account</a></li>
                    <li class="nav-item"><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>
     </div>
    
</div>
<div class="col-md-10 text-center">
  <!-- include the function of order detail -->
  <?php get_user_order_details();
  // include account 
  if(isset($_GET['edit_account'])){
    include 'edit_account.php';

  }
  if(isset($_GET['my_orders'])){
    include 'user_orders.php';

  }
  if(isset($_GET['delete_account'])){
    include 'delete_account.php';

  }
  
  ?>
</div>
</div>




<!-- last child -->
<!-- include footer -->
<?php  include("../includes/footer.php")  ?>
</div>

<script>
        function showSection(sectionId) {
    const sections = document.querySelectorAll('.section');
    const navLinks = document.querySelectorAll('.sidebar nav ul li a');
    
    sections.forEach(section => {
        section.classList.remove('active');
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
    });

    const activeSection = document.getElementById(sectionId);
    activeSection.classList.add('active');

    const activeLink = document.querySelector(`a[href='#']`);
    activeLink.classList.add('active');
}

// Show the overview section by default
document.addEventListener('DOMContentLoaded', () => {
    showSection('overview');
});

    </script>

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