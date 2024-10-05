<?php
if(isset($_GET['delete_orders'])){
    $delete_orders=$_GET['delete_orders'];
    echo $delete_orders;

    $delete_query="DELETE from `user_orders` WHERE order_id=$delete_orders";
    $result_query=mysqli_query($con,$delete_query);
    if($result_query){
        echo "<script>alert('Order is been Deleted Successfully');</script>";
        echo "<script>window.open('./index.php?list_orders','_self');</script>";
    } else {
        echo "<script>alert('Failed to delete Order. Please try again.');</script>";
    }
    
}
?>
