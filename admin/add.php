<?php

include('db.php');

if(isset($_POST['submit'])){
	$cat_id = $_POST['cat_id'];
	$cat_name = $_POST['cat_name'];

	//image upload

	$msg = "";
	$cat_image = $_FILES['cat_image']['name'];
	$target = "images/".basename($cat_image);

	if (move_uploaded_file($_FILES['cat_image']['tmp_name'], $target)) {
  		$msg = "Image uploaded";
  	}else{
  		$msg = "Failed upload image";
  	}

  	$insert_data = "INSERT INTO category (cat_id,cat_name,cat_image) VALUES ('$cat_id','$cat_name','$cat_image')";
  	$run_data = mysqli_query($con,$insert_data);

  	if($run_data){
  		header('location:managecategory.php');
  	}else{
  		echo "Data didn't insert";
  	}

}

?>
