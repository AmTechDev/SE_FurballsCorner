<?php
session_start();

$firstname = "";
$lastname = "";
$email = "";

$errors = array();

$db = mysqli_connect('localhost','root','','furballsdb');

$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);

if(empty($firstname)) {array_push($errors, "firstname is required")};
if(empty($lastname)) {array_push($errors, "lastname is required")};
if(empty($email)) {array_push($errors, "email is required")};
if(empty($password)) {array_push($errors, "password is required")};
if($password != $cpassword){array_push($errors, "Passwords didn't match")};

$users_check_query = "SELECT * FROM users WHERE firstname = '$firstname' or lastname = '$lastname' or email = '$email' LIMIT 1";

$results = mysqli_query($db, $users_check_query);
$emailuser = mysqli_fetch_assoc($results);

if($emailuser){
    if($emailuser['email'] === $email){array_push,"Email already exists from other account"};
}

if(count($errors) == 0)
{
    $password = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO users (firstname, lastname, email, password) VALUES('$firstname', '$lastname', '$email', '$password')";
    if(mysqli_query($db, $query))
    {
        $_SESSION['firstname'] = $firstname;
        $_SESSION['success'] = "You are now logged in";
        echo '<script>alert("Successfully Registered")</script>';
        header("location:welcome.php");

    }
}

?>