<?php
if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];  // Corrected typo
    $query = "SELECT * FROM products WHERE product_id='$edit_id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    $product_title = $row['product_title'];
    $product_description = $row['product_description']; // Corrected variable name
    $product_keywords = $row['product_keywords']; // Corrected variable name
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    
    // Fetch the category name
    $select_category = "SELECT * FROM `categories` WHERE category_id=$category_id";
    $result_category = mysqli_query($con, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];

    // Fetch the brand name
    $select_brand = "SELECT * FROM `brands` WHERE brand_id=$brand_id";
    $result_brand = mysqli_query($con, $select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $row_brand['brand_title'];
}

// Updating the product
if(isset($_POST['edit_product'])){
    $product_title = $_POST['product_title'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];

    $product_image1 = $_FILES['product_image1']['name'];
    $temp_image1 = $_FILES['product_image1']['tmp_name'];

    // Checking if fields are empty
    if($product_title == '' || $product_desc == '' || $product_keywords == '' || $product_category == '' || $product_brands == '' || $product_price == ''){
        echo "<script>alert('Please fill all the fields')</script>";
    } else {
        if(!empty($product_image1)){
            // Moving uploaded image to the designated folder
            move_uploaded_file($temp_image1, "./product_images/$product_image1");

            // Update query with new image
            $update_product = "UPDATE `products` SET 
                                product_title='$product_title', 
                                product_description='$product_desc', 
                                product_keywords='$product_keywords', 
                                category_id='$product_category', 
                                brand_id='$product_brands', 
                                product_image1='$product_image1', 
                                product_price='$product_price', 
                                date=NOW() 
                                WHERE product_id=$edit_id";
        } else {
            // Update query without changing the image
            $update_product = "UPDATE `products` SET 
                                product_title='$product_title', 
                                product_description='$product_desc', 
                                product_keywords='$product_keywords', 
                                category_id='$product_category', 
                                brand_id='$product_brands', 
                                product_price='$product_price', 
                                date=NOW() 
                                WHERE product_id=$edit_id";
        }

        $result_update_all = mysqli_query($con, $update_product);
        if($result_update_all){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('./insert_product.php','_self')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;            
            overflow-x: hidden;
        }
        .img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" name="product_title" class="form-control" required="required" value="<?php echo $product_title; ?>">
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_desc" class="form-label">Product Description</label>
                <input type="text" id="product_desc" name="product_desc" class="form-control" required="required" value="<?php echo $product_description; ?>">
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" id="product_keywords" name="product_keywords" class="form-control" required="required" value="<?php echo $product_keywords; ?>">
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_category" class="form-label">Product Categories</label>
                <select name="product_category" class="form-select">
                    <option value="<?php echo $category_id;?>"><?php echo $category_title;?></option>
                    <?php 
                    $select_category_all = "SELECT * FROM `categories`";
                    $result_category_all = mysqli_query($con, $select_category_all);
                    while($row_category_all = mysqli_fetch_assoc($result_category_all)){
                        $category_title = $row_category_all['category_title'];
                        $category_id = $row_category_all['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>     
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_brands" class="form-label">Product Brands</label>
                <select name="product_brands" class="form-select">
                    <option value="<?php echo $brand_id; ?>"><?php echo $brand_title; ?></option>
                    <?php
                    $select_brand_all = "SELECT * FROM `brands`";
                    $result_brand_all = mysqli_query($con, $select_brand_all);
                    while($row_brand_all = mysqli_fetch_assoc($result_brand_all)){
                        $brand_title = $row_brand_all['brand_title'];
                        $brand_id = $row_brand_all['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>     
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Product Image</label>
                <div class="d-flex">
                    <input type="file" id="product_image1" name="product_image1" class="form-control">
                    <img src="./product_images/<?php echo $product_image1; ?>" alt="" class="img">
                </div>
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" name="product_price" value="<?php echo $product_price; ?>" class="form-control" required="required">
            </div>

            <div class="text-center my-5">
                <input type="submit" name="edit_product" value="Update Product" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>
