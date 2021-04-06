<?php

include('db.php');
$prod_id = $_GET['id'];
$delete = "DELETE FROM products WHERE prod_id = $prod_id";
$run_data = mysqli_query($con,$delete);

if($run_data){
	header('location:manageproduct.php');
}else{
	echo "Didn't Delete";
}


?>