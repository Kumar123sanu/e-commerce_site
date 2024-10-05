<?php
if(isset($_GET['delete_user'])){
    $delete_user=$_GET['delete_user'];
    echo $delete_user;

    $delete_query="DELETE from `user_table` WHERE user_id=$delete_user";
    $result_query=mysqli_query($con,$delete_query);
    if($result_query){
        echo "<script>alert('User is been Deleted Successfully');</script>";
        echo "<script>window.open('./index.php?list_users','_self');</script>";
    } else {
        echo "<script>alert('Failed to delete Order. Please try again.');</script>";
    }
    
}
?>