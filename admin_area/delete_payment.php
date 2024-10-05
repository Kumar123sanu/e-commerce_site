<?php
if(isset($_GET['delete_payment'])){
    $delete_payments=$_GET['delete_payment'];
    // echo $delete_payments;

    $delete_query="DELETE from `user_payments` WHERE payment_id=$delete_payments";
    $result_query=mysqli_query($con,$delete_query);
    if($result_query){
        echo "<script>alert('Payment is been Deleted Successfully');</script>";
        echo "<script>window.open('./index.php?list_payment','_self');</script>";
    } else {
        echo "<script>alert('Failed to delete Order. Please try again.');</script>";
    }
    
}
?>