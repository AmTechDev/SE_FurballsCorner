<?php
include('db.php');

?>
<?php require_once 'pages/header.php'; ?>
<?php require_once 'pages/sidebar.php'; ?>
<div class="main-content">
            <header>
                <div class="searchwrapper">
                   
                    <input type="search" placeholder="search.."> <i class="fas fa-search"></i>
                </div>
            </header>
            <main>
            
                <section class="table">
                    <h2>Products
                    <span style="margin-left: 30px;">
		   	     <a href="#"><i class="fa fa-plus" data-toggle="modal" data-target="#myModal"></i></a></span>
                </h2>
                <button name="intopdf" class="generatepdf"><i class="fas fa-download"> PDF</i></button>
                <div class="table-res">
                <table class="table table-bordered" >
                    <thead id="tableboot">
                         <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Category</th>
				            <th class="text-center">Image</th>
				            <th class="text-center">Name</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Stock</th>
				            <th class="text-center">Edit</th>
				            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                     <tbody>
                         <?php

                            $get_data = "SELECT * FROM products";
                            $run_data = mysqli_query($con,$get_data);

                            while($row = mysqli_fetch_array($run_data))
                            {   
                                $prod_id = $row['prod_id'];
                                $category_id = $row['category_id'];
                                $image = $row['image'];
                                $prod_name = $row['prod_name'];
                                $prod_description = $row['prod_description'];
                                $prod_price = $row['prod_price'];
                                $prod_stock = $row['prod_stock'];


                                

                                echo "

                                    <tr>
                                    <td class='text-center'>$prod_id</td>
                                    <td class='text-center'>$category_id</td>
                                    <td class='text-center'><img src='image/$image' style='width:50px; height:50px;'></td>
                                    <td class='text-center'>$prod_name</td>
                                    <td class='text-center'>$prod_description</td>
                                    <td class='text-center'>$prod_price</td>
                                    <td class='text-center'>$prod_stock</td>
                                    <td class='text-center'>
                                        <span>
                                            <a href='#'>
                                                <i class='fa fa-edit editcon' data-toggle='modal' data-target='#edit$prod_id' style='' aria-hidden='true'></i>
                                            </a>
                                        </span>
                                        
                                    </td>
                                    <td class='text-center'>
                                        <span>
                                            <a href='#'>
                                                <i class='fa fa-trash deletecon' data-toggle='modal' data-target='#$prod_id' style='' aria-hidden='true'></i>
                                            </a>
                                        </span>
                                        
                                    </td>
                                </tr>


                                ";
                            } 

                            ?>

                
                    </tbody>
                </table>
                </div>
                </section>

                                    <!---Add in modal---->

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content" >
                        <div class="modal-header" id="modal-head">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Add Products</h4>
                        </div>
                        <div class="modal-body" id="body-modal">
                            <form action="prodadd.php" method="POST" enctype="multipart/form-data">


                                <div class="form-group" id="forminput">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id">
                                        <option value="">Select Category</options>
                                        <option value="Options">Select Category</options>
                                        <option value="Options">Select Category</options>
                                        <option value="Options">Select Category</options>
                                        <option value="Options">Select Category</options>
                                        <option value="Options">Select Category</options>
                                     </select>   
                                </div>
                                <div class="form-group" id="forminput">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" >
                                </div>
                                <div class="form-group" id="forminput">
                                    <label>Name</label>
                                    <input type="text" name="prod_name" class="form-control" placeholder="Name of Product.....">
                                </div>
                                <div class="form-group" id="forminput">
                                    <label>Description</label>
                                    <input type="text" name="prod_description" class="form-control" placeholder="Description of product.....">
                                </div>
                                <div class="form-group" id="forminput">
                                    <label>Price</label>
                                    <input type="number" name="prod_price" class="form-control" placeholder="price of product.....">
                                </div>
                                <div class="form-group" id="forminput">
                                    <label>Stocks</label>
                                    <input type="number" name="prod_stock" class="form-control" placeholder="number of stocks.....">
                                </div>

                                
                                
                                <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
                                
                                
                            </form>
                        </div>
                        <div class="modal-footer" id="modal-foot">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </div>

                    </div>
                    </div>


                    <!------DELETE modal---->




                    <!-- Modal -->
                    <?php

                    $get_data = "SELECT * FROM products";
                    $run_data = mysqli_query($con,$get_data);

                    while($row = mysqli_fetch_array($run_data))
                    {
                        $prod_id = $row['prod_id'];
                        echo "

                    <div id='$prod_id' class='modal fade' role='dialog'>
                    <div class='modal-dialog'>

                        <!-- Modal content-->
                        <div class='modal-content'>
                        <div class='modal-header'id='modal-head'>
                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            <h4 class='modal-title text-center'>Are you want to sure?</h4>
                        </div>
                        <div class='modal-body'>
                            <a href='proddelete.php?id=$prod_id' class='btn btn-danger' style='margin-left:250px'>Delete</a>
                        </div>
                        
                        </div>

                    </div>
                    </div>


                        ";
                    }


                    ?>

                    <!----edit Data--->

                    <?php

                    $get_data = "SELECT * FROM products";
                    $run_data = mysqli_query($con,$get_data);

                    while($row = mysqli_fetch_array($run_data))
                    {
                                $prod_id = $row['prod_id'];
                                $category_id = $row['category_id'];
                                $image = $row['image'];
                                $prod_name = $row['prod_name'];
                                $prod_description = $row['prod_description'];
                                $prod_price = $row['prod_price'];
                                $prod_stock = $row['prod_stock'];
                        
                        
                        echo "

                    <div id='edit$prod_id' class='modal fade' role='dialog'>
                    <div class='modal-dialog'>

                        <!-- Modal content-->
                        <div class='modal-content'>
                        <div class='modal-header'id='modal-head'>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                <h4 class='modal-title text-center'>Edit your Data</h4> 
                        </div>

                        <div class='modal-body'>
                            <form action='prodedit.php?id=$prod_id' method='post' enctype='multipart/form-data'>

                                <div class='form-group' id='forminput'>
                                <label>Category</label>
                                <select class='form-control' name='category_id'>
                                    <option value=''>Select Category</options>
                                    <option value='Options'>Accessories</options>
                                    <option value='Options'>Clothes</options>
                                    <option value='Options'>Foods</options>
                                    <option value='Options'>Hygiene</options>
                                     <option value='Options'>Toys</options>
                                 </select>   
                                </div>

                                <div class='form-group' id='forminput'>
                                    <label>Image</label>
                                    <input type='file' name='prod_image' class='form-control' required>
                                    <img src = 'images/$image' style='width:50px; height:50px'>
                                </div>
                                <div class='form-group'id='forminput'>
                                    <label>Name</label>
                                    <input type='text' name='prod_name' class='form-control' value='$prod_name'>
                                </div>
                                <div class='form-group'id='forminput'>
                                    <label>Description</label>
                                    <input type='text' name='prod_description' class='form-control' value='$prod_description'>
                                </div>
                                <div class='form-group'id='forminput'>
                                    <label>Price</label>
                                    <input type='number' name='prod_price' class='form-control' value='$prod_price'>
                                </div>
                                <div class='form-group'id='forminput'>
                                    <label>Stock</label>
                                    <input type='text' name='prod_stock' class='form-control' value='$prod_stock'>
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
            </main>
        </div>
        <?php require_once 'pages/footer.php'; ?>