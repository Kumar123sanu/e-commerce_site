<?php
if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
    // echo $delete_category;

    $delete_query="DELETE from `categories` WHERE category_id=$delete_category";
    $result_query=mysqli_query($con,$delete_query);
    if($result_query){
        echo "<script>alert('Category is been Deleted Successfully');</script>";
        echo "<script>window.open('./index.php?view.categories','_self');</script>";
    } else {
        echo "<script>alert('Failed to delete product. Please try again.');</script>";
    }
    
}
?>