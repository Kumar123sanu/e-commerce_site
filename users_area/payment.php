<?php
include('../includes/connect.php');
include('../function/common_function.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce website-checkout page</title>
    <!-- bootstreap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- css file -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link rel="stylesheet" href="./users_area/style.css"> -->
    <style>
        body{
            margin:0;
            padding: 0;
            overflow-x:hidden;
        }
        .container{
            width: 90%;
            margin: 0 auto;
            padding: 10px;

        }
    </style>

</head>
<body>
    <!-- php code to access uesr id  -->
    <?php
    $user_ip=getIPAddress();
    $get_user="SELECT * FROM `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_assoc($result);
    $user_id=$run_query['user_id'];
    
    ?>


   <div class="container">
    <h2 class="text-center text-success mt-4 pb-4">Payment Options</h2>
   <center>

   <div class="offline_pay">
    <a href="order.php" class="text-success fw-bold"> Pay Online</a>

   </div>
    </center>
   <br>
    <div class="row">
        <div class="col-md-6">
            <a href="#"><img src="./img/banks-logo.jpg" alt="" style="width: 600px; height:400px;"></a>
        </div>
        <div class="col-md-6 d-flex ">

        <div class="card mx-1" style="width: 15rem;">
  <img src="./img/esewa.jpg" class="card-img-top" alt="..." style="width: 170px;">
  <div class="card-body">
    <h5 class="card-title">E-Sewa</h5>
    <p class="card-text">eSewa is a digital wallet based in Nepal providing instant online payment solutions. Recharge your mobile,pay for electricity (NEA)</p>
    <a href="#" class="btn btn-primary">Pay nows</a>
  </div>
</div>

<div class="card mx-1" style="width: 15rem;">
  <img src="./img/ime_pay.jpg" class="card-img-top" alt="..." style="width: 170px; height:90px;">
  <div class="card-body">
    <h5 class="card-title">Ime Pay</h5>
    <p class="card-text">Send or request payments to friends & family anytime, anywhere. It's fast and free, and a mobile number is all you need to get started.</p>
    <a href="#" class="btn btn-primary">Pay nows</a>
  </div>
</div>

<div class="card mx-1" style="width: 15rem;">
  <img src="./img/fonepay.jpg" class="card-img-top" alt="..."style="width: 170px; height:90px;">
  <div class="card-body">
    <h5 class="card-title">Fone Pay</h5>
    <p class="card-text">Fonepay facilitates safe & secure mobile payments by connecting consumers, banks and merchants in an interoperable network.</p>
    <a href="#" class="btn btn-primary">Pay nows</a>
  </div>
</div>


</div>
    

</div>
   </div>
   <br>
   <br>
   <br>
   <center>

   <div class="offline_pay bg-success py-3 my-4">
    <a href="order.php?user_id=<?php echo $user_id ?>" class="text-light my-4 fw-bold "><h2>Pay Offline</h2></a>

   </div>
    </center>
   <br>
   <br>

   <!-- last child
  <div class="bg-success p-3 text-center">
        <p>All right reserved ©- Designed by Kiran Kumar-2024 </p>
    </div> -->

    
</body>
</html>