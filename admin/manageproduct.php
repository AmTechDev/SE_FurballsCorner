<?php
include('db.php');

?>
<?php 
include('pages/header.php'); 
?>
<?php 
include('pages/sidebar.php'); 
?>
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
				         <th class="text-center">Name</th>
                         <th class="text-center">Image</th>
                         <th class="tet-center">Price</th>
				         <th class="text-center">Description</th>
				         <th class="text-center">Size</th>
                         <th class="text-center">Material</th>
                         <th class="text-center">Edit</th>
				         <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                     <tbody>
                         <?php

                            $get_data = "SELECT * FROM product";
                            $run_data = mysqli_query($con,$get_data);

                            while($row = mysqli_fetch_array($run_data))
                            {   
                                $prod_id = $row['prod_id'];
                                $cat_id = $row['cat_id'];
                                $prod_name = $row['prod_name'];
                                $prod_image = $row['prod_image'];
                                $prod_price = $row['prod_price'];
                                $prod_desc = $row['prod_desc'];
                                $prod_size = $row['prod_size'];
                                $prod_material = $row['prod_material'];


                                echo "

                                    <tr>
                                    <td class='text-center'>$prod_id</td>
                                    <td class='text-center'>$cat_id</td>
                                    <td class='text-center'>$prod_name</td>
                                    <td class='text-center'><img src='images/$prod_image' style='width:50px; height:50px;'></td>
                                    <td class='text-center'>$prod_price</td>
                                    <td class='text-center'>$prod_desc</td>
                                    <td class='text-center'>$prod_size</td>
                                    <td class='text-center'>$prod_material</td>
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

                <!---------------------------Add modal----------------------------------------------->

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content" >
                        <div class="modal-header" id="modal-head">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Add Product</h4>
                        </div>
                        <div class="modal-body" id="body-modal">
                            <form action="prodadd.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group" id="forminput">
                                    <label>Category</label>
                                    <select class="form-control" name="cat_id" id="select_category">
                                    <option value="">Select Category</option> 

                                    <?php
                                     $query=mysqli_query($con,"select * from category");
                                     while($row=mysqli_fetch_array($query))
                                     {?>
                                     
                                     <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                                     <?php } 
                                   // $get_data = "SELECT * FROM category";
                                   // $run_data = mysqli_query($con,$get_data);
        
                                    //while($row = mysqli_fetch_array($run_data))
                                   // {   
                                    //    $category_id = $row['cat_id'];
                                    //    echo "
                                    //            <option value='".$row['cat_id']."' ".$selected.">".$row['cat_name']."</option>
                                    //        ";
                                   // }
                                    ?>
                      
                                     </select>
                            </div>


                      
                                <div class="form-group" id="forminput">
                                    <label>Name</label>
                                    <input type="text" name="prod_name" class="form-control" placeholder="Name of Product.....">
                                </div>

                                <div class="form-group" id="forminput">
                                    <label>Image</label>
                                    <input type="file" name="prod_image" class="form-control" >
                                </div>
                                <div class="form-group" id="forminput">
                                    <label>Price</label>
                                    <input type="text" name="prod_price" class="form-control" placeholder="Price of Product.....">
                                </div>
                                <div class="form-group" id="forminput">
                                    <label>Description</label>
                                    <input type="text" name="prod_desc" class="form-control" placeholder="Description of Product.....">
                                </div>
                                <div class="form-group" id="forminput">
                                    <label>Size</label>
                                    <input type="text" name="prod_size" class="form-control" placeholder="Size of Product.....">
                                </div>
                                <div class="form-group" id="forminput">
                                    <label>Material</label>
                                    <input type="text" name="prod_material" class="form-control" placeholder="Material of Product.....">
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

                    $get_data = "SELECT * FROM product";
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

                    $get_data = "SELECT * FROM product";
                    $run_data = mysqli_query($con,$get_data);

                    while($row = mysqli_fetch_array($run_data))
                    {
                        $prod_id = $row['prod_id'];
                        $cat_id = $row['cat_id'];
                        $prod_name = $row['prod_name'];
                        $prod_image = $row['prod_image'];
                        $prod_desc = $row['prod_desc'];
                        $prod_size = $row['prod_size'];
                        $prod_material = $row['prod_material'];
                         
                        
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
                                    <select class='form-control' name='cat_id' id='select_category'>
                                    <option value='0'>Select Category</option>
                                    
                                   
                    
                                    </select>
                                     </div>
                                <div class='form-group'id='forminput'>
                                    <label>Name</label>
                                    <input type='text' name='prod_name' class='form-control' value='$prod_name'>
                                </div>
                                <div class='form-group' id='forminput'>
                                    <label>Image</label>
                                    <input type='file' name='cat_image' class='form-control' required>
                                    <img src = 'images/$prod_image' style='width:50px; height:50px'>
                                </div>
                                <div class='form-group'id='forminput'>
                                    <label>Description</label>
                                    <input type='text' name='prod_desc' class='form-control' value='$prod_desc'>
                                </div>
                                <div class='form-group'id='forminput'>
                                    <label>Size</label>
                                    <input type='text' name='prod_size' class='form-control' value='$prod_material'>
                                </div>
                                <div class='form-group'id='forminput'>
                                    <label>Material</label>
                                    <input type='text' name='prod_material' class='form-control' value='$prod_material'>
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
<?php 
include('pages/footer.php'); 
?>