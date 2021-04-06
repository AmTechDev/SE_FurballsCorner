<?php
session_start();

if(isset($_SESSION['firstname'])){
    $_SESSION['msg'] = "Not Logged in";
    header("location :login.php")
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['firstname']);
    header("location : index.php");
}
?>

<?php 
include('components/header.php'); 
?>
Welcome <?php echo $_SESSION['firstname']; ?>
<br>
<a href="index.php?action=logout">Logout</a> |
<a href="change_profile.php">Change Profile</a>

<?php 
include('components/footer.php'); 
?>