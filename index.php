<?php 
include_once 'components/header.php'; 
?>
<?php 
include('connect.php'); 
?>

<div class="loader">
    <img src="assets/dualball.gif" alt="Loading..." />
</div>
<section class="section-main">
            <h2>...</h2>

</section>
<section class="section-category">
<div class="categories" id="category">
         <h2>Categories</h2>
     </div>
    <ul id="cat" class="catbox">
    <li class="item">
            <div class="category-box">
                <a href="#">
                    <img src="assets/all.png"/>
                </a> 
                
            </div>
            <span>All</span>
        </li>
    <li class="item">
        <div class="category-box">
            <a href="">
                 <img src="assets/1.png"/>
             </a> 
        </div>
         <span>Accessories</span>
    </li>
    <li class="item">
        <div class="category-box">
            <a href="">
                 <img src="assets/2.png"/>
             </a> 
        </div>
        <span>Clothes</span>
    </li>
    <li class="item">
        <div class="category-box">
            <a href="">
                 <img src="assets/3.png"/>
             </a> 
        </div>
        <span>Foods</span>
    </li>
    <li class="item">
        <div class="category-box">
            <a href="">
                 <img src="assets/4.png"/>
             </a> 
        </div>
        <span>Hygiene</span>
    </li>
    <li class="item">
        <div class="category-box">
            <a href="">
                 <img src="assets/5.png"/>
             </a> 
        </div>
        <span>Toys</span>
    </li>
</ul>
</section>
<?php 
include('components/foot.php'); 
?>
<?php 
include('components/scripts.php'); 
?>

<?php
include('components/footer.php');
?>
