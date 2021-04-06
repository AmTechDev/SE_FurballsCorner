<?php 
include('servers.php'); 
?>

<?php 
include('components/header.php'); 
?>



<form id="form-input" action="register.php" method="post">
  <?php include('errorstyle.php') ?>
    <fieldset>
      <h2 class="form-title">Registration</h2>
      <h3 class="form-subtitle">create an account</h3>
      <input type="text" minlength="2" name="firstname" placeholder="First Name" required />
      <input type="text" minlength="2" name="lastname" placeholder="Last Name" required/>
      <input type="email" name="email" placeholder="Email" required/>
      <input type="password" minlength="6" name="password" placeholder="Password" required/>
      <input type="password" name="cpassword" placeholder="Confirm Password" required/>
      
      <input type="submit" name="registerbtn" class="registerbtn action-button" value="Register" />
      <div class="connect">
        <p>or connect with</p>
      </div>
      <div class="social-links">
        <button class="google-btn">Google Account</button>
        <button class="fb-btn">Facebook Account</button>
      </div>
      <div class="linking">
        <p>Already Have an account? <a href="login.php">login here</a></p>
      </div>
    </fieldset>
  </form>

<?php
include('components/footer.php');
?>