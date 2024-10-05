<?php
include('../includes/connect.php');
 
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];
    // select data from database
    $select_query="SELECT * FROM `categories` WHERE category_title='$category_title'";
    $select_query=mysqli_query($con,$select_query);
    $count=mysqli_num_rows($select_query);
    if($count>0){
        echo "<script>alert('this category is present inside the database')</script>";
    }else{

        $inser_query="INSERT INTO `categories`(`category_title`) VALUES ('$category_title')";
    $result=mysqli_query($con,$inser_query);
    if($result){
        echo "<script>alert('Category Inserted')</script>";
    }
    }
    
}
?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="p-2 my-3 border-0 bg-success" name="insert_cat" value="Insert Categories">
    </div>
</form>
<?php
