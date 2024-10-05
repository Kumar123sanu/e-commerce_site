<?php
include('../includes/connect.php');
 
if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];
    // select data from database
    $select_query="SELECT * FROM `brands` WHERE brand_title='$brand_title'";
    $select_query=mysqli_query($con,$select_query);
    $count=mysqli_num_rows($select_query);
    if($count>0){
        echo "<script>alert('This Brands is present inside the database')</script>";
    }else{


    $inser_query="INSERT INTO `brands`(`brand_title`) VALUES ('$brand_title')";
    $result=mysqli_query($con,$inser_query);
    if($result){
        echo "<script>alert('Brand Inserted')</script>";
    }
    }
    
}
?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <!-- <input type="submit" class="form-control bg-success" name="insert_cat" value="Insert Categories"> -->
     <!-- <button class="bg-success p-2 my-3 border-0">Insert Brands</button> -->
     <input type="submit" class="p-2 my-3 border-0 bg-success" name="insert_brand" value="Insert Brands">

    </div>
</form>