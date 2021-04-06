<?php
include('db.php');
$prod_id = $_GET['id'];

if(isset($_POST['submit']))
{
	
    $category_id = $_POST['category_id'];
	$prod_name = $_POST['$prod_name'];
    $prod_description = $_POST['prod_description'];
    $prod_price = $_POST['prod_price'];
    $prod_stock = $_POST['prod_stock'];

	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "images/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded";
  	}else{
  		$msg = "Failed upload image";
  	}

	$update = "UPDATE category SET category_id='$category_id', image = '$image', prod_name='$prod_name', prod_description='$prod_description', prod_price='$prod_price', prod_stock='$prod_stock' WHERE prod_id=$prod_id";
	$run_update = mysqli_query($con,$update);

	if($run_update){
		header('location:manageproduct.php');
	}else{
		echo "Data didn't update";
	}
}

?>