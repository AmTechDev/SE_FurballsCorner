<?php 
include('components/header.php'); 
?>
<?php 
include('components/navbar.php'); 
?>

<div class="bag-view">
  <div class="bag-title">
    <h1>YOUR BAG</h1>
    <div class="bag-table">
    <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>action</th>
          <th>Image</th>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td>Empty</td>
          <td>Bag</td>
          <td></td>
          <td></td>
          
         
        </tr>
        <tr>
          <td class="totalp" colspan="7"> </td>
        </tr>
      </tbody>
    </table>
  </div>
    </div>
  </div>
</div>
<div class="message">
  <h3>You need to <a href="login.php">Login</a> to checkout.</h3>
</div>
<?php 
include('components/foot.php'); 
?>
<?php 
include('components/scripts.php'); 
?>
<?php
include('components/footer.php');
?>