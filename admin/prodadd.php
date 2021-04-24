<?php

include('db.php');

if(isset($_POST['submit'])){
	$prod_id = $_POST['prod_id'];
    $cat_id = $_POST['cat_id'];
    $prod_name = $_POST['prod_name'];
    $prod_desc = $_POST['prod_desc'];
    $prod_size = $_POST['prod_size'];
    $prod_material = $_POST['prod_material'];

	//image upload

	$msg = "";
	$prod_image = $_FILES['prod_image']['name'];
	$target = "images/".basename($prod_image);

	if (move_uploaded_file($_FILES['prod_image']['tmp_name'], $target)) {
  		$msg = "Image uploaded";
  	}else{
  		$msg = "Failed upload image";
  	}

  	$insert_data = "INSERT INTO product (prod_id,cat_id,prod_name,prod_image,prod_desc,prod_size,prod_material VALUES ('$prod_id','$cat_id','$prod_name','$prod_image','$prod_desc', '$prod_size', '$prod_material')";
  	$run_data = mysqli_query($con,$insert_data);

  	if($run_data){
  		header('location:manageproduct.php');
  	}else{
  		echo "Data didn't insert";
  	}

}

?>