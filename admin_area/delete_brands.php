<?php
if(isset($_GET['delete_brands'])){
    $delete_brands=$_GET['delete_brands'];
    // echo $delete_brands;

    $delete_query="DELETE from `brands` WHERE brand_id=$delete_brands";
    $result_query=mysqli_query($con,$delete_query);
    if($result_query){
        echo "<script>alert('Brands is been Deleted Successfully');</script>";
        echo "<script>window.open('./index.php?view.brands','_self');</script>";
    } else {
        echo "<script>alert('Failed to delete Brands. Please try again.');</script>";
    }
    
}
?>