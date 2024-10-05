<?php
if (isset($_GET['edit_brands'])) {
    $edit_brands = $_GET['edit_brands'];

    // Fetch data for the specific brand to edit
    $get_brands = "SELECT * FROM `brands` WHERE brand_id = '$edit_brands'";
    $result_brand = mysqli_query($con, $get_brands);
    $row = mysqli_fetch_assoc($result_brand);
    $brand_title = $row['brand_title'];
    

}

if (isset($_POST['edit_brand'])) {  // Changed from 'edit_cat' to 'edit_brand'
    $brands_title = $_POST['brand_title'];

    // Update query to modify the brand title
    $update_query = "UPDATE `brands` SET brand_title = '$brands_title' WHERE brand_id = '$edit_brands'";
    $result_update = mysqli_query($con, $update_query);

    if ($result_update) {
        echo "<script>alert('Brand updated successfully');</script>";
        echo "<script>window.open('./index.php?view_brands','_self');</script>";
    } else {
        echo "<script>alert('Failed to update brand');</script>";
    }
}
?>
 

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Brand</title>
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center text-success">Edit Brand</h1>
        <form action="" method="post" class="text-center">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="brand_title" class="form-label mb-3 mt-3">Brand Title</label>
                <input type="text" name="brand_title" id="brand_title" class="form-control" required="required" value="<?php echo $brand_title;?>">
            </div>
            <input type="submit" value="Update Brand" class="bttn" name="edit_brand">
            
        </form>
    </div>
</body>
</html>
