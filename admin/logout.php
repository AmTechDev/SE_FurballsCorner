<?php
session_start();

if(isset($_SESSION['admn_id']))
{
    
    unset($_SESSION['admin_id']);
}


header("Location: loginadmin.php");
die;