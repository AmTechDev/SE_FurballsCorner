<?php
include('db.php');
$cat_id = $_GET['id'];

if(isset($_POST['submit']))
{
	$cat_name = $_POST['cat_name'];

	$msg = "";
	$cat_image = $_FILES['cat_image']['name'];
	$target = "images/".basename($cat_image);

	if (move_uploaded_file($_FILES['cat_image']['tmp_name'], $target)) {
  		$msg = "Image uploaded";
  	}else{
  		$msg = "Failed upload image";
  	}

	$update = "UPDATE category SET cat_name='$cat_name', cat_image = '$cat_image' WHERE cat_id=$cat_id ";
	$run_update = mysqli_query($con,$update);

	if($run_update){
		header('location:managecategory.php');
	}else{
		echo "Data didn't update";
	}
}
 
?>