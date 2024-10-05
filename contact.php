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
    <title>Document</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <!-- bootstreap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style 2.css">
    <style>


.Logo{
    width:60px;
    height: 60px;
    margin-left: 10px;
    margin-right: 10px;

}
.Logo:hover{
    width: 65px;
    height: auto;
    cursor: pointer;

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
     <!-- calling cart function -->
     <?php
    cart();
    ?>

    <section id="page-header" class="about-header bg-success">
      
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you! </p>
    </section>
    <section id="contact-details" class="section-p1">
        <div class="details">
            <span> GET IN TOUCH</span>
            <h2>Visit one of our agency locations or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                   <i class="fal fa-map"></i>
                   <p>56 Glassford Street Glasgow G1 1UL New York</p>
                </11>
                <li>
                    <i class="far fa=envelope"></i>
                    <p>contact@example.com </p>
                </11>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <p>contact@example.com </p>
                </11>
                <li>
                    <i class="far fa-clock"></i>
                    <p>Monday to Saturday: 9.00am to 16.pm</p>
                </li>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3490.7029648401876!2d80.17698096883021!3d28.96653343661867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39a1ac075797cc6f%3A0xbcce63956a1798a3!2sRastriya%20Banijya%20Bank%20Ltd.%2C%20Mahendranagar%20Branch!5e0!3m2!1sen!2snp!4v1705113743168!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </section>


    <section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
        <h4>Sign Up For Newsletters</h4>
        <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>

    </div>
    <div class="form">
        <input type="text" placeholder="Your email address">
        <button class="normal">Sign Up</button>

    </div>
    </section>
    <section id="form-details">
        <form action="">
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" placeholder="Your Name ">
            <input type="text" placeholder="E-mail">
            <input type="text" placeholder="Subject">
            <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
            <button class="normal">Submit</button>
        </form>
        <div class="people">
            <div>
                <img src="./img/people/1.png" alt="">
                <p><span>Ram Kumar</span> Senior Marketing Manager <br> Phone: + 000 123 000 77 88 <br>Email: contact@example.com</p>
            </div>
            <div>
                <img src="./img/people/2.png" alt="">
                <p><span>Depandra Bhatt</span> Senior Teacher <br> Phone: + 000 123 000 77 88 <br>Email: contact@example.com</p>
            </div>
            <div>
                <img src="./img/people/3.png" alt="">
                <p><span>Sunita Magar</span> Senior HOD fo FWU in Education <br> Phone: + 000 123 000 77 88 <br>Email: contact@example.com</p>
            </div>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="/img/logo.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address: </strong>355 Madan Chock, Mahendranagar, Kanchanpur</p>
            <p><strong>Phone: </strong>+01 2344 234/(+977) 9809458562</p>
            <p><strong>Hours: </strong>10:00 - 18:00, Sunday - friday</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About Us</h4>
            <a href="#">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Teams & Conditions </a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Vishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Helps</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google PlaySore</p>
            <div class="row">
                <img src="./img/pay/app.jpg" alt="">
                <img src="./img/pay/play.jpg" alt="">
            </div>
            <p>From App Store or Google PlaySore</p>
            <img src="./img/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p>© 2024, Tech2 etc - HTML CSS Ecommerce Templatek</p>
        </div>
    </footer>

  <script src="html/javascript/style.js"></script>  
</body>
</html>