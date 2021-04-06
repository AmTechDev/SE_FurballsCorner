<?php

include('db.php');

if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$category_id = $_POST['category_id'];
	$prod_name = $_POST['$prod_name'];
    $prod_description = $_POST['prod_description'];
    $prod_price = $_POST['prod_price'];
    $prod_stock = $_POST['prod_stock'];

	//image upload

	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "images/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded";
  	}else{
  		$msg = "Failed upload image";
  	}

  	$insert_data = "INSERT INTO products (prod_id,category_id,image,prod_name,prod_description,prod_price,prod_stock) VALUES ('$prod_id','$category_id','$image','$prod_name','$prod_description', '$prod_price', '$prod_stock')";
  	$run_data = mysqli_query($con,$insert_data);

  	if($run_data){
  		header('location:manageproduct.php');
  	}else{
  		echo "Data didn't insert";
  	}

}

?>