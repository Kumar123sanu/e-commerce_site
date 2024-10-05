<?php
include('../includes/connect.php');
include('../function/common_function.php');

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    // echo "$user_id";
}

// getting total items and total price of all items 
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query);
$invoice_number = mt_rand();
$status = 'pending';
$count_products = mysqli_num_rows($result_cart_price);

while($row_price = mysqli_fetch_array($result_cart_price)){
    $product_id = $row_price['product_id'];
    $select_query = "SELECT * FROM `products` WHERE product_id='$product_id'";
    $result_product_price = mysqli_query($con, $select_query);
    
    while($row_product_price = mysqli_fetch_array($result_product_price)){
        $product_price = $row_product_price['product_price'];
        $total_price += $product_price;
    }
}

// getting quantity from cart
$get_cart = "SELECT * FROM `cart_details`";
$run_cart = mysqli_query($con, $get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = $get_item_quantity['quantity'];

if($quantity == 0){
    $quantity = 1;
    $subtotal = $total_price;
} else {
    $quantity = $quantity;
    $subtotal = $total_price * $quantity;
}

// insert data in order table 
$insert_orders = "INSERT INTO `user_orders` (`user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES ($user_id, $subtotal, $invoice_number, $count_products, NOW(), '$status')";
$result_query = mysqli_query($con, $insert_orders);

if($result_query){
    echo "<script>alert('Order Placed Successfully')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
}


// order pending 
$insert_pending_orders = "INSERT INTO `orders_pending` (`user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES ($user_id, $invoice_number, $product_id, $quantity, '$status')";
$result_pending_query = mysqli_query($con, $insert_pending_orders);

// delete item from cart 
$empty_cart="DELETE FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_delete = mysqli_query($con, $empty_cart);


?>
