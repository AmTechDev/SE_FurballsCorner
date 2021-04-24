<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
     <!--logo-->
     <link rel="shortcut icon" href="assets/fclogo.png"/>
     
     <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0"/>
     <meta
      name="description"
      content="Buy,Shop,Browse and Order Pet Products"
    />
    <meta
      name="keywords"
      content="Pet products, Dog Products, Furballs Corner, Furr Parent, Pet accessories, Pet Clothes, Pet Shop"
    />
   
    <title>Furballs Corner</title>


    <!--Main CSS File -->
    <link type="text/css" rel="stylesheet" href="css/mainstyle.css"/>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <!-----------JSLOADER------------------>
    <script src="js/main.js"></script>

  </head>
  <body>
  <header>
    
    <div class="logo">
        <img src="assets/fclogo.png"/> 
        <a href="index.php">
            <h3>Furballs Corner<h3>
        </a>
    </div>

    <div class="searchwrapper">
                   
                    <input type="search" placeholder="search.."> <button type="submit"><i class="fas fa-search"></i></button>
    </div>

    <div class="bag">
        <a href="bagview.php">
        <i class="fas fa-shopping-bag"></i>
        </a>
    </div>  

   <div class="navigate">
   <input type="checkbox"  class="navbar-toggle">
   <div class="hamburger"></div>
        <div class="menu">
            <a href="index.php" >Home</a>
            <a href="#category">Category</a>
            <?php
                if (isset($_SESSION["user_id"])) {
                    echo "<a href='account.php'>Account</a>";
                    echo "<a href='logout.php'>Logout</a>";
                }
                else {
                    echo "<a href='login.php'>Login</a>";
                    echo "<a href='register.php'>Register</a>";
                }
            ?>

           
        </div>
    </div>
        

</header>

