<?php 
include_once 'components/header.php'; 
?>
<?php
include("connect.php");
include("functions.php");

$user_data = check_login($con);

?>
<div class="loader">
    <img src="assets/dualball.gif" alt="Loading..." />
</div>
<div class="account">
  <div class="profile">
    <div class="profile-image">
      <img src = "assets/usericon.png" style="width:50%">
        <div class="profile-name">
          <h2><?php echo $user_data['firstname']; ?> <?php echo $user_data['lastname']; ?></h2>
        </div>
    </div>
    <div class="profile-info">
      <p><i class="fa fa-id-card info"></i> Personal Information  <a href='#'>
          <i class='fa fa-edit editcon' data-toggle='modal' data-target='#edit$user_id' style='' aria-hidden='true'></i>
    </a></p>
      <p>First Name : <?php echo $user_data['firstname']; ?> </p>
      <p>Last Name : <?php echo $user_data['lastname']; ?> </p>
      <p>Phone Number: <?php echo $user_data['phonenumber']; ?> </p>
      <p> Address : <?php echo $user_data['address']; ?> </p>
      <p>Email: <?php echo $user_data['email']; ?> </p>
      <p>Password: *************************</p>

    </div>
    
  </div> 

  <div class="order">
    <h4>My Order</h4>
    <div class="order-content">
       <p> No order Shop Now</p>
    </div>
   
  </div>
</div>
<!----edit Data Modal--->

<?php

$get_data = "SELECT * FROM users";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
    $id = $row['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    
    
    echo "

<div id='edit$id' class='modal fade' role='dialog'>
<div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
    <div class='modal-header'id='modal-head'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h4 class='modal-title text-center'>Edit your Personal Information</h4> 
    </div>

    <div class='modal-body'>
        <form action='editaccount.php?id=$id' method='post' enctype='multipart/form-data'>

            <div class='form-group'id='forminput'>
                <label>Name</label>
                <input type='text' name='firstname' class='form-control' value='$firstname'>
            </div>
            <div class='form-group'id='forminput'>
                <label>Name</label>
                <input type='text' name='lastname' class='form-control' value='$lastname'>
            </div>
            <div class='form-group'id='forminput'>
                <label>Name</label>
                <input type='text' name='address' class='form-control' value='$address'>
            </div>
            <div class='form-group'id='forminput'>
                <label>Name</label>
                <input type='text' name='phonenumber' class='form-control' value='$phonenumber'>
            </div>
                
            <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
            

        </form>
    </div>

    </div>

</div>
</div>


    ";
}


?>
<?php 
include('components/foot.php'); 
?>
<?php 
include('components/modalscript.php'); 
?>
<?php 
include('components/scripts.php'); 
?>
<?php
include('components/footer.php');
?>