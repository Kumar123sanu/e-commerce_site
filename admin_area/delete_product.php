<?php 
// Check if the delete request is set
if(isset($_GET['delete_product'])){
    // Sanitize the input to prevent SQL injection
    $delete_id = mysqli_real_escape_string($con, $_GET['delete_product']);
    
    // Ensure that delete_id is an integer (assuming product_id is an integer)
    $delete_id = (int)$delete_id;

    // Construct the delete query with the correct column name
    $delete_query = "DELETE FROM products WHERE product_id = '$delete_id'";
    
    // Execute the delete query
    $delete_result = mysqli_query($con, $delete_query);
    
    // Check if the deletion was successful
    if($delete_result){
        echo "<script>alert('Product Deleted Successfully');</script>";
        echo "<script>window.open('./index.php','_self');</script>";
    } else {
        echo "<script>alert('Failed to delete product. Please try again.');</script>";
    }
}
?>
