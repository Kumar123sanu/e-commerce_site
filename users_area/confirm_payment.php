<?php
include('../includes/connect.php');
session_start();
if (isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    // echo $order_id;
    $select_data="SELECT * FROM `user_orders` where order_id=$order_id";
    $run_data=mysqli_query($con,$select_data);
    $row=mysqli_fetch_assoc($run_data);
    $invoice_number=$row['invoice_number'];
    $amount_due=$row['amount_due'];


}
if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    // insert query 
    $insert_query="INSERT INTO `user_payments`(`order_id`, `invoice_number`, `amount`, `payment_mode`) VALUES ('$order_id','$invoice_number','$amount','$payment_mode')";
    $run_query=mysqli_query($con,$insert_query);
    if($run_query){
        echo "<script>alert('Successfully completed the payment')</script>";
        echo "<script> window.open('profile.php?my_orders','_self')</script>";
    }
     $update_orders="UPDATE `user_orders` set order_status='Complete' where order_id=$order_id";
     $run_orders=mysqli_query($con,$update_orders);


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstreap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- css file -->
    <title>payment page</title>
    <style>
         .bttn{
            
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
            padding: 15px 32px; /* Some padding */
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
    </style>
</head>
<body class="bg-secondary">
    <div class="container my-5">
    <h1 class="text-center text-light mt-5">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
               <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
               <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                 <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Select Payment Mode</option>
                    <option>Netbanking</option>
                    <option>E-Sewa</option>
                    <option>IME Pay</option> 
                    <option>fone Pay</option>
                    <option>Cash on Delivery</option>
                    <option>Pay Offline</option>
                 </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
               <input type="submit" class="bttn py-2 px-3 border-0" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
    
</body>
</html>