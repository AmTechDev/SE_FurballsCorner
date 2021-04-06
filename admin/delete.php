<?php

include('db.php');
$cat_id = $_GET['id'];
$delete = "DELETE FROM category WHERE cat_id = $cat_id";
$run_data = mysqli_query($con,$delete);

if($run_data){
	header('location:managecategory.php');
}else{
	echo "Didn't Delete";
}


?>