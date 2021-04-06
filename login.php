<?php 
include('servers.php');
?>

<?php 
include('components/header.php'); 
?>



<form id="form-input" ction="login.php" method="post">
    <fieldset>
      <h2 class="form-title">Login</h2>
      <h3 class="form-subtitle">login to your account</h3>
      <input type="email" name="email" placeholder="Email" required/>
      <input type="password" minlength="6" name="password" placeholder="Password" required/>
      <div class="reset"><a href="recovery.php">Reset Password</a></div>
      <input type="submit" name="loginbtn" class="logintbn action-button" value="Login" />
      <div class="connect">
        <p>or connect with</p>
      </div>
      <div class="social-links">
        <button class="google-btn">Google Account</button>
        <button class="fb-btn">Facebook Account</button>
      </div>
      <div class="linking">
        <p>Don't Have an account? <a href="register.php">Register here</a></p>
      </div>
    </fieldset>
  </form>

<?php
include('components/footer.php');
?>